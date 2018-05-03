<?php
/**
 * Author: Drum Creative
 * URL: http://drumcreative.com
 *
 * drumroll functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @package DrumRoll
 * @since DrumRoll 1.0.0
 */
// Global variables
$dimensions = get_theme_mod('featured_dimensions');
$GLOBALS['featured_image_size'] = intval($dimensions['width']) . ' x ' . intval($dimensions['height']);
$home_dimensions = get_theme_mod('home_featured_dimensions');
$GLOBALS['home_featured_image_size'] = intval($home_dimensions['width']) . ' x ' . intval($home_dimensions['height']);

// Add ScrollReveal class to body
add_filter( 'body_class','sr_class' );
function sr_class( $classes ) {
    if ( false == get_theme_mod( 'sr_toggle', true ) ) {
	    $classes[] = 'no-sr';
	}
    return $classes;
}

/** Mobile Detect http://mobiledetect.net/ */
require_once('library/Mobile_Detect.php');

/** Various clean up functions */
require_once( 'library/cleanup.php' );

/** Required for Foundation to work properly */
require_once( 'library/foundation.php' );

/** Register all navigation menus */
require_once( 'library/navigation.php' );

/** Create widget areas in sidebar and footer */
require_once( 'library/widget-areas.php' );

/** Return entry meta information for posts */
require_once( 'library/entry-meta.php' );

/** Enqueue scripts */
require_once( 'library/enqueue-scripts.php' );

/** Add theme support */
require_once( 'library/theme-support.php' );

/** Add Drum's functions */
require_once('library/drum-functions.php');

/** Add Drum's plugins */
require_once('library/drum-plugins.php');

/** Add Customizer Panels/Controls */
require_once('library/customizer.php');

/** Add TGM Plugin Activation - http://tgmpluginactivation.com/ */
require_once('library/class-tgm-plugin-activation.php');

add_filter('acf/settings/load_json', 'my_acf_json_load_point');

// Specify Local JSON folder. This was added on 7/19/17 because of a bug preventing the JSON from saving.
function my_acf_json_load_point( $paths ) {
    unset($paths[0]);    
    $paths[] = get_stylesheet_directory() . '/acf-json';
    return $paths;
}

function cptui_register_my_cpts_newsletters() {

	/**
	 * Post Type: Newsletters.
	 */

	$labels = array(
		"name" => __( "Newsletters", "" ),
		"singular_name" => __( "Newsletter", "" ),
  'add_new' => 'Add Newsletter',
  'add_new_item' => 'Add New Newsletter',
  'edit' => 'Edit',
  'edit_item' => 'Edit Newsletter',
  'new_item' => 'New Newsletter',
  'view' => 'View Newsletter',
  'view_item' => 'View Newsletter',
  'search_items' => 'Search Newsletters',
  'not_found' => 'No Newsletters Found',
  'not_found_in_trash' => 'No Newsletters Found in Trash',
		
	);

	$args = array(
		"label" => __( "Newsletters", "" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		'menu_icon' => 'dashicons-id-alt',
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "newsletters", "with_front" => true ),
		"query_var" => true,
		"supports" => array( "title", "thumbnail" ),
	);

	register_post_type( "newsletters", $args );
}

add_action( 'init', 'cptui_register_my_cpts_newsletters' );
