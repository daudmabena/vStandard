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
// Scripts and Styles
function vstandard_scripts() {
    wp_enqueue_style('style',get_stylesheet_uri());
 
    if(is_singular() && comments_open() && get_option('thread_comments')){
        wp_enqueue_script('comment-reply');
    } 
    wp_enqueue_script('small-menu', get_template_directory_uri() . '/js/small-menu.js', array('jquery'), '20120206', true );
    if (is_singular() && wp_attachment_is_image()){
        wp_enqueue_script('keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array('jquery'),'20120202');
    }
}
add_action('wp_enqueue_scripts', 'vstandard_scripts');
/**
 * Register widgetized area and update sidebar with default widgets
 *
 * @since vstandard 1.0
 */
function vstandard_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Primary Widget Area', 'vstandard' ),
        'id' => 'sidebar-1',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h1 class="widget-title">',
        'after_title' => '</h1>',
    ) );
 
    register_sidebar( array(
        'name' => __( 'Secondary Widget Area', 'vstandard' ),
        'id' => 'sidebar-2',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h1 class="widget-title">',
        'after_title' => '</h1>',
    ) );
	
	register_sidebar(array(
            'name' => __('Home Widget 1', 'vstandard'),
            'description' => __('Area 6 - sidebar-home.php', 'vstandard'),
            'id' => 'home-widget-1',
            'before_title' => '<div id="widget-title-one" class="widget-title-home"><h3>',
            'after_title' => '</h3></div>',
            'before_widget' => '<div id="%1$s" class="widget-wrapper %2$s">',
            'after_widget' => '</div>'
        ));

        register_sidebar(array(
            'name' => __('Home Widget 2', 'vstandard'),
            'description' => __('Area 7 - sidebar-home.php', 'vstandard'),
            'id' => 'home-widget-2',
            'before_title' => '<div id="widget-title-two" class="widget-title-home"><h3>',
            'after_title' => '</h3></div>',
            'before_widget' => '<div id="%1$s" class="widget-wrapper %2$s">',
            'after_widget' => '</div>'
        ));

        register_sidebar(array(
            'name' => __('Home Widget 3', 'vstandard'),
            'description' => __('Area 8 - sidebar-home.php', 'vstandard'),
            'id' => 'home-widget-3',
            'before_title' => '<div id="widget-title-three" class="widget-title-home"><h3>',
            'after_title' => '</h3></div>',
            'before_widget' => '<div id="%1$s" class="widget-wrapper %2$s">',
            'after_widget' => '</div>'
        ));
}
add_action( 'widgets_init', 'vstandard_widgets_init' );
/**
 * Setup the WordPress core custom background feature.
 *
 * Use add_theme_support to register support for WordPress 3.4+
 * as well as provide backward compatibility for previous versions.
 * Use feature detection of wp_get_theme() which was introduced
 * in WordPress 3.4.
 *
 * Hooks into the after_setup_theme action.
 *
 */
function vstandard_register_custom_background() {
    $args = array(
        'default-color' => 'EFEFEF',
    );
 
    $args = apply_filters('vstandard_custom_background_args', $args);
 
    if(function_exists('wp_get_theme')){
        add_theme_support('custom-background',$args);
    }else{
        define('BACKGROUND_COLOR', $args['default-color']);
        define('BACKGROUND_IMAGE', $args['default-image']);
        add_custom_background();
    }
}
add_action('after_setup_theme', 'vstandard_register_custom_background');
/**
 * Implement the Custom Header feature
 */
require(get_template_directory() . '/includes/custom-header.php');
//Adjusted from Dimos
function vstandard_breadcrumb_lists() {
  
    $chevron = '<span class="chevron">&#8250;</span>';
    $home = __('Home','vstandard'); // text for the 'Home' link
    $before = '<span class="breadcrumb-current">'; // tag before the current crumb
    $after = '</span>'; // tag after the current crumb
 
        if ( !is_home() && !is_front_page() || is_paged() ) {
 
            echo '<div class="breadcrumb-list">';
 
            global $post;
            $homeLink = home_url();
            
			echo '<a href="' . $homeLink . '">' . $home . '</a> ' . $chevron . ' ';
 
        if ( is_category() ) {
            global $wp_query;
			
            $cat_obj = $wp_query->get_queried_object();
            $thisCat = $cat_obj->term_id;
            $thisCat = get_category($thisCat);
            $parentCat = get_category($thisCat->parent);
      
	  if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $chevron . ' '));
      
	      echo $before; printf( __( 'Archive for %s', 'vstandard' ), single_cat_title('', false) ); $after;
 
      } elseif ( is_day() ) {
      
	      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $chevron . ' ';
          echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $chevron . ' ';
          echo $before . get_the_time('d') . $after;
 
      } elseif ( is_month() ) {
     
	      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $chevron . ' ';
          echo $before . get_the_time('F') . $after;
 
      } elseif ( is_year() ) {
		  
          echo $before . get_the_time('Y') . $after;
 
      } elseif ( is_single() && !is_attachment() ) {
      
	  if ( get_post_type() != 'post' ) {
          $post_type = get_post_type_object(get_post_type());
          $slug = $post_type->rewrite;
        
		  echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a> ' . $chevron . ' ';
          echo $before . get_the_title() . $after;
		  
      } else {
		  
          $cat = get_the_category(); $cat = $cat[0];
          
		  echo get_category_parents($cat, TRUE, ' ' . $chevron . ' ');
          echo $before . get_the_title() . $after;
      }
 
      } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
      
	      $post_type = get_post_type_object(get_post_type());
          
		  echo $before . $post_type->labels->singular_name . $after;
 
      } elseif ( is_attachment() ) {
      
	      $parent = get_post($post->post_parent);
          $cat = get_the_category($parent->ID); $cat = $cat[0];
      
	      echo get_category_parents($cat, TRUE, ' ' . $chevron . ' ');
          echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a> ' . $chevron . ' ';
          echo $before . get_the_title() . $after;
 
      } elseif ( is_page() && !$post->post_parent ) {
          
		  echo $before . get_the_title() . $after;
 
      } elseif ( is_page() && $post->post_parent ) {
      
	      $parent_id  = $post->post_parent;
          $breadcrumbs = array();
      
	  while ($parent_id) {
          $page = get_page($parent_id);
          $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
          $parent_id  = $page->post_parent;
      }
	  
          $breadcrumbs = array_reverse($breadcrumbs);
      
	  foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $chevron . ' ';
	  
          echo $before . get_the_title() . $after;
 
      } elseif ( is_search() ) {
          
		  echo $before; printf( __( 'Search results for: %s', 'vstandard' ), get_search_query() ); $after;
 
      } elseif ( is_tag() ) {
          
		  echo $before; printf( __( 'Posts tagged %s', 'vstandard' ), single_tag_title('', false) ); $after;
 
      } elseif ( is_author() ) {
          
		  global $author;
      
	      $userdata = get_userdata($author);
          
		  echo $before; printf( __( 'View all posts by %s', 'vstandard' ), $userdata->display_name ); $after;
 
      } elseif ( is_404() ) {
          echo $before . __('Error 404 ','vstandard') . $after;
      }
 
      if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
      
	      echo __('Page','vstandard') . ' ' . get_query_var('paged');
      
	  if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
      }
 
        echo '</div>';
 
      }
    }
function vstandard_post_meta_data() {
	printf( __( '<span class="%1$s">Posted on </span>%2$s<span class="%3$s"> by </span> by %4$s', 'vstandard' ),
	'meta-prep meta-prep-author posted', 
	sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="timestamp">%3$s</span></a>',
		get_permalink(),
		esc_attr( get_the_time() ),
		get_the_date()
	),
	'byline',
	sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
		get_author_posts_url( get_the_author_meta( 'ID' ) ),
		sprintf( esc_attr__( 'View all posts by %s', 'vstandard' ), get_the_author() ),
		get_the_author()
	    )
	);
}
/**
 * Sets the post excerpt length to 40 words.
 * Adopted from Coraline
 */
function vstandard_excerpt_length($length) {
    return 40;
}

add_filter('excerpt_length', 'vstandard_excerpt_length');

/**
 * Returns a "Read more" link for excerpts
 */
function vstandard_read_more() {
    return '<div class="read-more"><a href="' . get_permalink() . '">' . __('Read more &#8250;', 'vstandard') . '</a></div><!-- end of .read-more -->';
}

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and vstandard_read_more_link().
 */
function vstandard_auto_excerpt_more($more) {
    return '<span class="ellipsis">&hellip;</span>' . vstandard_read_more();
}

add_filter('excerpt_more', 'vstandard_auto_excerpt_more');

/**
 * Adds a pretty "Read more" link to custom post excerpts.
 */
function vstandard_custom_excerpt_more($output) {
    if (has_excerpt() && !is_attachment()) {
        $output .= vstandard_read_more();
    }
    return $output;
}

add_filter('get_the_excerpt', 'vstandard_custom_excerpt_more');
function vstandard_widgets() {
    do_action('vstandard_widgets');
}

/**
 * Just after closing </div><!-- end of #widgets -->
 *
 * @see sidebar.php
 */
function vstandard_widgets_end() {
    do_action('vstandard_widgets_end');
}
function vstandard_customize_register($wp_customize) {
	$wp_customize->add_section(
	//ID
	'footer_section',
	//Arguments Array
	array(
		'title' => __('Footer Credits', 'vstandard'),
		'capability' => 'edit_theme_options',
		'description' => __('Allows you to show or hide the footer credits', 'vstandard')
		)
	);
	$wp_customize->add_section(
	// ID
	'layout_section',
	// Arguments array
	array(
		'title' => __('Layout', 'vstandard'),
		'capability' => 'edit_theme_options',
		'description' => __('Allows you to edit your theme\'s layout.', 'vstandard')
		)
	);
	$wp_customize->add_setting(
		//ID
		'vstandard_settings[footer_section]',
		//Argument array
		array(
			'default' => 'content-sidebar',
			'type' => 'option'
			)
	);
	$wp_customize->add_setting(
	// ID
	'vstandard_settings[layout_setting]',
	// Arguments array
	array(
		'default' => 'content-sidebar',
		'type' => 'option'
		)
	);
	$wp_customize->add_control(
		//ID
		'footer_control',
		//Arguments array
		array(
			'type' => 'radio',
			'label' => __('Show Footer Credits', 'vstandard'),
			'section' => 'footer_section',
			'choices' => array(
							'Yes' => __('Yes','vstandard'),
							'No' => __('No','vstandard')
							),
			'settings' => 'vstandard_settings[footer_section]'
			)
	);
	$wp_customize->add_control(
	// ID
	'layout_control',
	// Arguments array
	array(
		'type' => 'radio',
		'label' => __( 'Theme layout', 'vstandard' ),
		'section' => 'layout_section',
		'choices' => array(
			'content-sidebar' =>         __('Content Sidebar', 'vstandard'),
			'content-sidebar-sidebar' => __('Content Sidebar Sidebar', 'vstandard'),
			'sidebar-content' =>         __('Sidebar Content', 'vstandard'),
			'sidebar-content-sidebar' => __('Sidebar Content Sidebar', 'vstandard'),
			'sidebar-sidebar-content' => __('Sidebar Sidebar Content', 'vstandard')
			),
		// This last one must match setting ID from above
		'settings' => 'vstandard_settings[layout_setting]'
		)
	);
}
add_action('customize_register', 'vstandard_customize_register');
add_filter( 'body_class', 'my_theme_body_classes' );
function my_theme_body_classes($classes) {

	/*
	 * Since we used 'option' in add_setting arguments array
	 * we retrieve the value by using get_option function
	 */
	$vstandard_settings = get_option( 'vstandard_settings' );	
	$classes[] = $vstandard_settings['layout_setting'];
	
	return $classes;

}