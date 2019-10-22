<?php

namespace App;

/**
 * Add <body> classes
 */
add_filter('body_class', function (array $classes) {
    /** Add page slug if it doesn't exist */
    if (is_single() || is_page() && !is_front_page()) {
        if (!in_array(basename(get_permalink()), $classes)) {
            $classes[] = basename(get_permalink());
        }
    }

    /** Add class if sidebar is active */
    if (display_sidebar()) {
        $classes[] = 'sidebar-primary';
    }

    /** Clean up class names for custom templates */
    $classes = array_map(function ($class) {
        return preg_replace(['/-blade(-php)?$/', '/^page-template-views/'], '', $class);
    }, $classes);

    return array_filter($classes);
});

/**
 * Add "… Read more" to the excerpt
 */
add_filter('excerpt_more', function () {
    return ' &hellip; <a href="' . get_permalink() . '"><!--:nl-->Lees meer<!--:--><!--:en-->Read more<!--:--></a>';
});

/**
 * Template Hierarchy should search for .blade.php files
 */
collect([
    'index', '404', 'archive', 'author', 'category', 'tag', 'taxonomy', 'date', 'home',
    'frontpage', 'page', 'paged', 'search', 'single', 'singular', 'attachment', 'embed'
])->map(function ($type) {
    add_filter("{$type}_template_hierarchy", __NAMESPACE__.'\\filter_templates');
});

/**
 * Render page using Blade
 */
add_filter('template_include', function ($template) {
    collect(['get_header', 'wp_head'])->each(function ($tag) {
        ob_start();
        do_action($tag);
        $output = ob_get_clean();
        remove_all_actions($tag);
        add_action($tag, function () use ($output) {
            echo $output;
        });
    });
    $data = collect(get_body_class())->reduce(function ($data, $class) use ($template) {
        return apply_filters("sage/template/{$class}/data", $data, $template);
    }, []);
    if ($template) {
        echo template($template, $data);
        return get_stylesheet_directory().'/index.php';
    }
    return $template;
}, PHP_INT_MAX);

/**
 * Render comments.blade.php
 */
add_filter('comments_template', function ($comments_template) {
    $comments_template = str_replace(
        [get_stylesheet_directory(), get_template_directory()],
        '',
        $comments_template
    );

    $data = collect(get_body_class())->reduce(function ($data, $class) use ($comments_template) {
        return apply_filters("sage/template/{$class}/data", $data, $comments_template);
    }, []);

    $theme_template = locate_template(["views/{$comments_template}", $comments_template]);

    if ($theme_template) {
        echo template($theme_template, $data);
        return get_stylesheet_directory().'/index.php';
    }

    return $comments_template;
}, 100);


// Set default excerpt max words to 26
add_filter('excerpt_length', function($length) {
    return 26;
});

// Custom FacetWP facet for the projects page. It facets on the pages which
// have the four theme pages or the events page as their parent (we select
// those using their page id).
add_filter('facetwp_index_row', function($params) {
    if ('projects' == $params['facet_name']) {
        $post_id = (int) $params['post_id'];
        $parent_id = wp_get_post_parent_id($post_id);
        if ($parent_id) {
            $parent_post = get_post($parent_id);
            if (in_array($parent_post->ID, Array(9113, 9116, 9118, 9120, 9122))) {
              $params['facet_value'] = $parent_post->post_name;
              $params['facet_display_value'] = $parent_post->post_title;
            } else {
                // empty the facet's value
                $params['facet_value'] = '';
            }
        } else {
            // empty the facet's value
            $params['facet_value'] = '';
        }
    }
    return $params;
});

// Integrate facet output of FacetWP with our WP_Query results
add_filter('facetwp_is_main_query', function($bool, $query) {
    return (true === $query->get('facetwp')) ? true : $bool;
}, 10, 2);

// Custom sort order for 'projects' facet
add_filter('facetwp_facet_orderby', function($orderby, $facet) {
    if ('projects' == $facet['name']) {
        $orderby = "FIELD(f.facet_value, 'elections', 'decisions', 'finances', 'results', 'events')";
    }
    return $orderby;
}, 10, 2);

// Change parenthesis to brackets
add_filter('facetwp_facet_html', function($output, $params) {
    if ('projects' == $params['facet']['name']) {
        $output = preg_replace('/\(([0-9]+)\)/', '[$1]', $output);
    }
    return $output;
}, 10, 2);

// FacetWP automagically adds '<!--fwp-loop-->\n' to the output of
// WordPress queries. This also happens in the breadcrumb and adds an
// extra space there which is ugly, so we explicitly tell FacetWP here
// to not look for a query loop if 'no-facetwp' is specified.
add_filter('facetwp_is_main_query', function($is_main_query, $query) {
    if ($query->get('no-facetwp')) {
        $is_main_query = false;
    }
    return $is_main_query;
}, 10, 2 );
