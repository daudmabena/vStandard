<?php
/**
 * The 404 template file.
 *
 * @package vStandard
 * @since vStandard 2.0
 *
 */
get_header(); ?>	
	<div class="section group">
		<div class="col span_5_of_8">
			<h2><?php _e( 'This is somewhat embarrassing, isn’t it?', 'vstandard' ); ?></h2>
			<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'vstandard' ); ?></p>
			<?php get_search_form(); ?>
		</div>
		<?php get_template_part("sidebar"); ?>
	</div>
	<br class="breaker"/>
<?php get_sidebar(); ?>
<?php get_footer(); ?>