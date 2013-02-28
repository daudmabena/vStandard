<?php
/**
 * vStandard functions and definitions
 *
 * @package vStandard
 * @since vStandard 1.0
 */
 
 /**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since vStandard 1.0
 */
if (!isset( $content_width)){
	$content_width = 654; /* width of the contet area in pixels */
}

if (!function_exists('vstandard_setup')){
	function vstandard_setup(){
		// Custom template tags for this theme.
     	require(get_template_directory() . '/includes/template-tags.php');
 		// Custom functions that act independently of the theme templates
     	require(get_template_directory() . '/includes/tweaks.php');
 		/**
     	* Make theme available for translation
     	* Translations can be filed in the /languages/ directory
     	*/
    	load_theme_textdomain('vstandard', get_template_directory() . '/languages' );
    	// Add default posts and comments RSS feed links to head
     	add_theme_support('automatic-feed-links');
 		// Enable support for the Aside Post Format
 		add_theme_support('post-formats', array('aside'));
		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(array('primary' => __('Primary Menu','vstandard'),));
	}
}


add_action('after_setup_theme', 'vstandard_setup');