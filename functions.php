<?php
define("THEMEVER", "2.0.0");
function vstandard_enqueue_style(){
	wp_enqueue_style( "html5reset", get_bloginfo("template_directory")."/css/html5reset.css", array(), THEMEVER, $media = 'all' );
	wp_enqueue_style( "col", get_bloginfo("template_directory")."/css/col.css", array(), THEMEVER, $media = 'all' );
	wp_enqueue_style( "2cols", get_bloginfo("template_directory")."/css/2cols.css", array(), THEMEVER, $media = 'all' );
	wp_enqueue_style( "3cols", get_bloginfo("template_directory")."/css/3cols.css", array(), THEMEVER, $media = 'all' );
	wp_enqueue_style( "4cols", get_bloginfo("template_directory")."/css/4cols.css", array(), THEMEVER, $media = 'all' );
	wp_enqueue_style( "5cols", get_bloginfo("template_directory")."/css/5cols.css", array(), THEMEVER, $media = 'all' );
	wp_enqueue_style( "6cols", get_bloginfo("template_directory")."/css/6cols.css", array(), THEMEVER, $media = 'all' );
	wp_enqueue_style( "7cols", get_bloginfo("template_directory")."/css/7cols.css", array(), THEMEVER, $media = 'all' );
	wp_enqueue_style( "8cols", get_bloginfo("template_directory")."/css/8cols.css", array(), THEMEVER, $media = 'all' );
	wp_enqueue_style( "9cols", get_bloginfo("template_directory")."/css/9cols.css", array(), THEMEVER, $media = 'all' );
	wp_enqueue_style( "10cols", get_bloginfo("template_directory")."/css/10cols.css", array(), THEMEVER, $media = 'all' );
	wp_enqueue_style( "11cols", get_bloginfo("template_directory")."/css/11cols.css", array(), THEMEVER, $media = 'all' );
	wp_enqueue_style( "12cols", get_bloginfo("template_directory")."/css/12cols.css", array(), THEMEVER, $media = 'all' );
	wp_enqueue_style( "1024", get_bloginfo("template_directory")."/css/1024.css", array(), THEMEVER, $media = 'only screen and (max-width: 1024px) and (min-width: 769px)' );
	wp_enqueue_style( "768", get_bloginfo("template_directory")."/css/768.css", array(), THEMEVER, $media = 'only screen and (max-width: 768px) and (min-width: 481px)' );
	wp_enqueue_style( "480", get_bloginfo("template_directory")."/css/480.css", array(), THEMEVER, $media = 'only screen and (max-width: 480px)' );
	wp_enqueue_style("style",get_stylesheet_uri());
}
add_action("wp_enqueue_scripts", "vstandard_enqueue_style");

function vstandard_enqueue_scripts(){
	wp_enqueue_script("modernizr", get_bloginfo("template_directory")."/js/modernizr-2.5.3-min.js", array("jquery"), THEMEVER, "false");
}
add_action("wp_enqueue_scripts", "vstandard_enqueue_scripts");

if (!function_exists('vstandard_setup')){
	function vstandard_setup(){
    	// Add default posts and comments RSS feed links to head
     	add_theme_support('automatic-feed-links');
		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(array('primary' => __('Primary Menu','vstandard'),));
	}
}
add_action('after_setup_theme', 'vstandard_setup');

function vstandard_widgets() {
    do_action('vstandard_widgets');
}

function vstandard_widgets_end() {
    do_action('vstandard_widgets_end');
}

function vstandard_widgets_init() {

    register_sidebar( array(
        'name' => __( 'Footer Widget Area 1', 'vstandard' ),
        'id' => 'footer-1',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h1 class="widget-title">',
        'after_title' => '</h1>',
    ));
 
    register_sidebar( array(
        'name' => __( 'Footer Widget Area 2', 'vstandard' ),
        'id' => 'footer-2',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h1 class="widget-title">',
        'after_title' => '</h1>',
    ));

    register_sidebar( array(
        'name' => __( 'Footer Widget Area 3', 'vstandard' ),
        'id' => 'footer-3',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h1 class="widget-title">',
        'after_title' => '</h1>',
    ));

    register_sidebar( array(
        'name' => __( 'Small Print', 'vstandard' ),
        'id' => 'small-print',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h1 class="widget-title">',
        'after_title' => '</h1>',
    ));

    register_sidebar( array(
        'name' => __( 'Side Bar', 'vstandard' ),
        'id' => 'side-bar',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h1 class="widget-title">',
        'after_title' => '</h1>',
    ));

}
add_action( 'widgets_init', 'vstandard_widgets_init' );