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

// Add credit to an image
function add_credit_to_image($matches, $featured_image=false, $post_thumbnail_id='') {
	if ($featured_image) {
		$return = $matches;
	} else {
		$return = $matches[0];
		preg_match('/wp-image-([0-9]+)/', $return, $match);
		$post_thumbnail_id = $match[1];
	}
	$return_block = '';

	if (get_post_meta($post_thumbnail_id, 'license_url', true)) {
		$license_url     = get_post_meta( $post_thumbnail_id, 'license_url', true );
		$license_url     = strtolower( $license_url );
		$attribution_url = get_post_meta( $post_thumbnail_id, 'attribution_url', true );
		$source_work_url = get_post_meta( $post_thumbnail_id, 'source_work_url', true );
		$extras_url      = get_post_meta( $post_thumbnail_id, 'extra_permissions_url', true );
		// Unfiltered.
		$meta   = wp_get_attachment_metadata( $post_thumbnail_id, true );
		$credit = get_post_meta( $post_thumbnail_id, 'attribution_name', true );
		if ( ( ! $credit )
			&& isset( $image_metadata['credit'] )
		) {
			$credit = $meta['image_meta']['credit'];
		}
		$title = get_the_title( $post_thumbnail_id );
		if ( ! $title ) {
			$title = $meta['image_meta']['title'];
		}
		if ( ! $title ) {
			$title = $fallback_title;
		}
		if ( strpos( $license_url, 'creativecommons' ) ) {
			if ( substr( $license_url, -1 ) != '/' ) {
				$license_url = $license_url . '/';
			}
		}
		if ( $license_url ) {
			$license_name = \CreativeCommonsImage::license_name( $license_url );
			$button_url   = \CreativeCommonsImage::license_button_url( $license_url );
		}
		// RDF stuff.
		if ( $license_url ) {
			$license_button_url = \CreativeCommonsImage::license_button_url( $license_url );
			$l                  = \CreativeCommons::get_instance();
			$html_rdfa = $l->license_html_rdfa(
				$license_url,
				$license_name,
				$license_button_url,
				$title,
				true, // is_singular.
				$attribution_url,
				$credit,
				$source_work_url,
				$extras_url,
				'',
				'',
				'',
				$credit,
				$attribution_url
			); // warning_text.
			//$button = \CreativeCommonsButton::get_instance()->markup(
			//	$html_rdfa,
			//	false,
			//	31,
			//	false
			//);
			$block = $button;
			$block = '<!-- RDFa! -->' . $html_rdfa . '<!-- end of RDFa! -->';
		} else {
			if ( $title ) {
				if ( $credit ) {
					$block .= '<p>( ' . $title . ' by ' . $credit . ')</p>';
				} else {
					$block .= '<p>( ' . $title . ')</p>';
				}
			}
		}
		$return_block .= $block;

		$modal = '
		<button type="button" class="btn btn-primary image-credit" data-toggle="modal" data-target="#creditModal' . $match[1] .'">
		  i
		</button>

		<div class="text-left modal fade" id="creditModal' . $match[1] . '" tabindex="-1" role="dialog" aria-labelledby="creditModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-body">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      ' . $return_block . '
		      </div>
		    </div>
		  </div>
		</div>';

		$return = '<div class="image-credit-div text-right">' . $return . $modal . '</div>';
	}

	return $return;
}

// Add credits to images in post/page content
add_filter('the_content', function($content) {
	if (class_exists('CreativeCommons')) {
		return preg_replace_callback(
			'/(<\s*img[^>]+)(src\s*=\s*"[^"]+")([^>]+>)/i',
			'\App\add_credit_to_image',
			$content
		);
	} else {
		return $content;
	}
}, 10, 2);

function in_array_any($needles, $haystack) {
    return (bool)array_intersect($needles, $haystack);
}

// Add credits to featured images, excluding some pages
add_filter('post_thumbnail_html', function($html, $post_id, $post_thumbnail_id, $size, $attr) {
	$classes = get_body_class();
	if (in_array_any(array('home', 'search', 'page-news-archive-data', 'page-template-projects'), $classes)) {
		return $html;
	} elseif (class_exists('CreativeCommons')) {
		return add_credit_to_image($html, true, $post_thumbnail_id);
	} else {
		return $html;
	}
}, 10, 5);

// Catch Mollie donation webhook, request payment details from their API and send an email to us
add_action('do_parse_request', function($do_parse, $wp) {
    $current_path = esc_url_raw(add_query_arg([]));

    if (strpos($current_path, 'dmm-webhook')) {
        $apikey = get_option('dmm_mollie_apikey');

        $args = array(
            'headers' => array(
                'Authorization' => 'Bearer ' . $apikey
            )
        );
        $payment_response = wp_remote_get('https://api.mollie.com/v2/payments/' . $_POST['id'], $args);
        $payment_json = json_decode(wp_remote_retrieve_body($payment_response));

        $customer_response = wp_remote_get('https://api.mollie.com/v2/customers/' . $payment_json->customerId, $args);        $customer_json = json_decode(wp_remote_retrieve_body($customer_response));

        wp_mail(get_option('admin_email'), 'Donatie aan Open State Foundation', "Donatie aan Open State Foundation\n\nStatus: $payment_json->status\nEenmalig/periodiek: $payment_json->sequenceType\nBedrag (€): " . $payment_json->amount->value . "\nBericht: $payment_json->description\nNaam: " . $customer_json->name . "\nE-mail: " . $customer_json->email . "\nPayment ID: $payment_json->id");
    }

    return $do_parse;
}, 30, 2);
