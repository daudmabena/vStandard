<?php
/**
 * The Template for displaying all single posts.
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
				<?php get_template_part('content', 'single');	?>
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