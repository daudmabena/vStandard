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
 * @since vStandard 2.0
 */
 
get_header(); ?>
<div class="section group">
	<div class="col span_5_of_8">
		<?php if(have_posts()) : ?>
			<?php /* Start the Loop */ ?>
			<?php while (have_posts()) : the_post(); ?>
				<?php get_template_part('content', get_post_format());	?>
				<?php comments_template('', true); ?>
			<?php endwhile; ?>
		<?php else : ?>
 			<?php //get_template_part('no-results','index'); ?>
		<?php endif; ?>
	</div>
	<?php get_template_part("sidebar"); ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
