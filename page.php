<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
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
