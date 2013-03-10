<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package vStandard
 * @since vStandard 1.0
 */
 
get_header(); ?>
				 <div id="featured" class="grid col-940">
				 	<div class="grid col-460">
				 	</div><!-- end of .col-460 -->
				 </div><!-- end of #featured -->
<?php get_sidebar('home'); ?>
<?php get_footer(); ?>