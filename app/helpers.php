<?php

namespace App;

use Roots\Sage\Container;

/**
 * Get the sage container.
 *
 * @param string $abstract
 * @param array  $parameters
 * @param Container $container
 * @return Container|mixed
 */
function sage($abstract = null, $parameters = [], Container $container = null)
{
    $container = $container ?: Container::getInstance();
    if (!$abstract) {
        return $container;
    }
    return $container->bound($abstract)
        ? $container->makeWith($abstract, $parameters)
        : $container->makeWith("sage.{$abstract}", $parameters);
}

/**
 * Get / set the specified configuration value.
 *
 * If an array is passed as the key, we will assume you want to set an array of values.
 *
 * @param array|string $key
 * @param mixed $default
 * @return mixed|\Roots\Sage\Config
 * @copyright Taylor Otwell
 * @link https://github.com/laravel/framework/blob/c0970285/src/Illuminate/Foundation/helpers.php#L254-L265
 */
function config($key = null, $default = null)
{
    if (is_null($key)) {
        return sage('config');
    }
    if (is_array($key)) {
        return sage('config')->set($key);
    }
    return sage('config')->get($key, $default);
}

/**
 * @param string $file
 * @param array $data
 * @return string
 */
function template($file, $data = [])
{
    return sage('blade')->render($file, $data);
}

/**
 * Retrieve path to a compiled blade view
 * @param $file
 * @param array $data
 * @return string
 */
function template_path($file, $data = [])
{
    return sage('blade')->compiledPath($file, $data);
}

/**
 * @param $asset
 * @return string
 */
function asset_path($asset)
{
    return sage('assets')->getUri($asset);
}

/**
 * @param string|string[] $templates Possible template files
 * @return array
 */
function filter_templates($templates)
{
    $paths = apply_filters('sage/filter_templates/paths', [
        'views',
        'resources/views'
    ]);
    $paths_pattern = "#^(" . implode('|', $paths) . ")/#";

    return collect($templates)
        ->map(function ($template) use ($paths_pattern) {
            /** Remove .blade.php/.blade/.php from template names */
            $template = preg_replace('#\.(blade\.?)?(php)?$#', '', ltrim($template));

            /** Remove partial $paths from the beginning of template names */
            if (strpos($template, '/')) {
                $template = preg_replace($paths_pattern, '', $template);
            }

            return $template;
        })
        ->flatMap(function ($template) use ($paths) {
            return collect($paths)
                ->flatMap(function ($path) use ($template) {
                    return [
                        "{$path}/{$template}.blade.php",
                        "{$path}/{$template}.php",
                    ];
                })
                ->concat([
                    "{$template}.blade.php",
                    "{$template}.php",
                ]);
        })
        ->filter()
        ->unique()
        ->all();
}

/**
 * @param string|string[] $templates Relative path to possible template files
 * @return string Location of the template
 */
function locate_template($templates)
{
    return \locate_template(filter_templates($templates));
}

/**
 * Determine whether to show the sidebar
 * @return bool
 */
function display_sidebar()
{
    static $display;
    isset($display) || $display = apply_filters('sage/display_sidebar', false);
    return $display;
}

/**
 * Recursive function to get all parents for the breadcrumb
 */
function get_parent_recursive($post_id) {
    $post = get_post($post_id);
    if ($post->post_parent) {
        get_parent_recursive($post->post_parent);
        echo "&nbsp;&nbsp;>&nbsp;&nbsp;";
        // Don't link to the actual theme page (those are empty), but link to
        // the projects page filtered on this theme
        if (in_array($post->post_parent, Array(9113, 9116, 9118, 9120, 9122))) {
            $post_parent = get_post($post->post_parent);
            if (get_bloginfo("language") == 'en-US') {
              echo '<a href="/en/projects-tools-data/?_projects=' . $post_parent->post_name . '">' . get_the_title($post->post_parent) . '</a>';
            } else {
              echo '<a href="/nl/projecten-tools-data/?_projects=' . $post_parent->post_name . '">' . get_the_title($post->post_parent) . '</a>';
            }
        } else {
            echo '<a href="' . get_permalink($post->post_parent) . '">' . get_the_title($post->post_parent) . '</a>';
        }
    }
}

/**
 * Generate breadcrumbs
 * @return breadcrumb HTML
 */
function breadcrumbs() {
    wp_reset_query();
    global $post;

    echo '<div class="breadcrumbs font-italic text-uppercase">';
    echo '<a href="' . home_url() . '" rel="nofollow">Home</a>';
    if (is_category() || is_single()) {
        $categories = get_the_category();
        if (!empty($categories)) {
          $cat = esc_html($categories[0]->term_id);
        }

        $args = array(
          'post_type' => 'page',
          'posts_per_page' => 1,
          'cat' => $cat,
        );

        $the_query = new \WP_Query($args);

        $project_url = '';
        while ($the_query->have_posts()) {
            $the_query->the_post();
            $project_url = get_permalink();
        }

        echo "&nbsp;&nbsp;>&nbsp;&nbsp;";
        echo "<a href='" . $project_url . "'>";
        echo _e(get_the_category()[0]->name);
        echo "</a>";
    } elseif(is_page()) {
        get_parent_recursive($post->ID);
    }
    echo '</div>';
    wp_reset_query();
}
