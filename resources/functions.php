<?php

/**
 * Do not edit anything in this file unless you know what you're doing
 */

use Roots\Sage\Config;
use Roots\Sage\Container;

/**
 * Helper function for prettying up errors
 * @param string $message
 * @param string $subtitle
 * @param string $title
 */
$sage_error = function ($message, $subtitle = '', $title = '') {
    $title = $title ?: __('Sage &rsaquo; Error', 'sage');
    $footer = '<a href="https://roots.io/sage/docs/">roots.io/sage/docs/</a>';
    $message = "<h1>{$title}<br><small>{$subtitle}</small></h1><p>{$message}</p><p>{$footer}</p>";
    wp_die($message, $title);
};

/**
 * Ensure compatible version of PHP is used
 */
if (version_compare('7.1', phpversion(), '>=')) {
    $sage_error(__('You must be using PHP 7.1 or greater.', 'sage'), __('Invalid PHP version', 'sage'));
}

/**
 * Ensure compatible version of WordPress is used
 */
if (version_compare('4.7.0', get_bloginfo('version'), '>=')) {
    $sage_error(__('You must be using WordPress 4.7.0 or greater.', 'sage'), __('Invalid WordPress version', 'sage'));
}

/**
 * Ensure dependencies are loaded
 */
if (!class_exists('Roots\\Sage\\Container')) {
    if (!file_exists($composer = __DIR__.'/../vendor/autoload.php')) {
        $sage_error(
            __('You must run <code>composer install</code> from the Sage directory.', 'sage'),
            __('Autoloader not found.', 'sage')
        );
    }
    require_once $composer;
}

/**
 * Sage required files
 *
 * The mapped array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 */
array_map(function ($file) use ($sage_error) {
    $file = "../app/{$file}.php";
    if (!locate_template($file, true, true)) {
        $sage_error(sprintf(__('Error locating <code>%s</code> for inclusion.', 'sage'), $file), 'File not found');
    }
}, ['helpers', 'setup', 'filters', 'admin']);

/**
 * Here's what's happening with these hooks:
 * 1. WordPress initially detects theme in themes/sage/resources
 * 2. Upon activation, we tell WordPress that the theme is actually in themes/sage/resources/views
 * 3. When we call get_template_directory() or get_template_directory_uri(), we point it back to themes/sage/resources
 *
 * We do this so that the Template Hierarchy will look in themes/sage/resources/views for core WordPress themes
 * But functions.php, style.css, and index.php are all still located in themes/sage/resources
 *
 * This is not compatible with the WordPress Customizer theme preview prior to theme activation
 *
 * get_template_directory()   -> /srv/www/example.com/current/web/app/themes/sage/resources
 * get_stylesheet_directory() -> /srv/www/example.com/current/web/app/themes/sage/resources
 * locate_template()
 * ├── STYLESHEETPATH         -> /srv/www/example.com/current/web/app/themes/sage/resources/views
 * └── TEMPLATEPATH           -> /srv/www/example.com/current/web/app/themes/sage/resources
 */
array_map(
    'add_filter',
    ['theme_file_path', 'theme_file_uri', 'parent_theme_file_path', 'parent_theme_file_uri'],
    array_fill(0, 4, 'dirname')
);
Container::getInstance()
    ->bindIf('config', function () {
        return new Config([
            'assets' => require dirname(__DIR__).'/config/assets.php',
            'theme' => require dirname(__DIR__).'/config/theme.php',
            'view' => require dirname(__DIR__).'/config/view.php',
        ]);
    }, true);

// Function to add class to menu items to make them buttons
function add_specific_menu_location_atts( $atts, $item, $args ) {
    // check if the item is in the primary menu
    if( $args->theme_location == 'top_navigation' ) {
      // add the desired attributes:
      $atts['class'] = 'btn btn-primary';
    }
    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'add_specific_menu_location_atts', 10, 3 );

// Add categories to pages
function add_taxonomies_to_pages() {
  register_taxonomy_for_object_type('post_tag', 'page');
  register_taxonomy_for_object_type('category', 'page');
}
add_action('init', 'add_taxonomies_to_pages');

// Add excerpt character counter to excerpt box when creating a post
function excerpt_count_js(){
    echo '
        <script>
            $(document).ready(function(){
                if ($("#excerpt").length) {
                    $("#postexcerpt .handlediv").after("<div style=\"position:absolute;top:5px;right:50px;color:#666;\"><small>Samenvatting lengte (max. 200 karakters!): </small><input type=\"text\" value=\"0\" maxlength=\"3\" size=\"3\" id=\"excerpt_counter\" readonly=\"\" style=\"background:#fff;\"> <small>karakter(s).</small></div>");
                    $("#excerpt_counter").val($("#excerpt").val().length);
                    $("#excerpt").keyup( function() {
                      $("#excerpt_counter").val($("#excerpt").val().length);
                    });
                };
            });
        </script>';
}
add_action('admin_head-post.php', 'excerpt_count_js');
add_action('admin_head-post-new.php', 'excerpt_count_js');

// Set the number of results to return on the search page to 50
function set_posts_per_page($query) {
  if (is_search()) {
    $query->set('posts_per_page', 50);
  }

  return $query;
}
add_action('pre_get_posts', 'set_posts_per_page');

// Allow videos and SVG to be uploaded
add_filter('mime_types', 'extend_mime_types');
function extend_mime_types( $existing_mimes=array() ) {
    // Add webm, mp4, OGG and SVG to the list of mime types;
    // Some mime types can/must also be set via
    // My Sites -> Network Admin -> Settings
    $existing_mimes['webm'] = 'video/webm';
    $existing_mimes['mp4']  = 'video/mp4';
    $existing_mimes['ogg']  = 'video/ogg';
    $existing_mimes['svg']  = 'image/svg+xml';

    // Return an array now including our added mime types
    return $existing_mimes;
}

// Some custom code for Kieswijzerposts
// https://openstate.eu/nl/2023/11/open-overheid-kieswijzer-2023/
// https://openstate.eu/nl/2024/05/open-europees-parlementskieswijzer-2024/
function ti_custom_javascript() {
    if (is_single ('11830') || is_single('12253')) {
        remove_filter('the_content', 'wptexturize');
        ?>
            <script type="text/javascript">
                jQuery(function () {
                    jQuery('[data-toggle="tooltip"]').tooltip({
                        html: true,
                        animation: false,
                        placement: 'bottom',
                        template: '<div class="tooltip" role="tooltip"><div class="arrow"></div><div class="tooltip-inner" style="max-width: 450px; text-align: start"></div></div>',
                        sanitize: false
                    });
                });
            </script>
        <?php
    }
}
add_action('wp_head', 'ti_custom_javascript');
