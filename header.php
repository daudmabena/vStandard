<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package vStandard
 * @since vStandard 2.0
 */
?>
<!DOCTYPE html>
<!-- HTML5 Boilerplate -->
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
	<head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta http-equiv="cleartype" content="on">
		<!-- Responsive and mobile friendly stuff -->
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
		<title><?php
		/*
		* Print the <title> tag based on what is being viewed.
		*/
		global $page, $paged;
 
		wp_title('|',true,'right');
 
		// Add the blog name.
		bloginfo('name');
 
		// Add the blog description for the home/front page.
		$site_description = get_bloginfo('description','display');
		if($site_description && (is_home() || is_front_page())){
			echo " | $site_description";
		}
		// Add a page number if necessary:
		if($paged >= 2 || $page >= 2){
			echo ' | ' . sprintf( __( 'Page %s', 'shape' ), max( $paged, $page ) );
		}
		?></title>
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<?php wp_head(); ?>
	</head>
    <body <?php body_class(); ?>>
    	<div id="wrapper">
    		<div id="headcontainer">
    			<header>
	    			<div class="section group">
	    				<div class="col span_1_of_3">
								<h1><a href="<?php echo home_url('/'); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
								<h2 class="site-description"><?php bloginfo('description'); ?></h2>
						</div>
						<div class="col span_2_of_3">
							<nav role="navigation" class="navigation">
			     				<?php get_template_part('navigation','index'); ?>
							</nav><!-- /navigation -->
						</div>
					</div>
				</header>		
			</div><!-- /headcontainer -->
			<div id="maincontentcontainer">
				<div id="maincontent">