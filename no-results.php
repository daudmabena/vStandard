<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package vStandard
 * @since vStandard 2.0
 */
?>
<?php get_header() ?>
<div class="section group">
	<div class="col span_5_of_8">
		<h2 class="entry-title"><?php _e( 'Nothing Found', 'shape' ); ?></h2>
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
			<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'shape' ), admin_url( 'post-new.php' ) ); ?></p>
 	    <?php elseif ( is_search() ) : ?>
 	    	<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'shape' ); ?></p>
            <?php get_search_form(); ?>
        <?php else : ?>
 			<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'shape' ); ?></p>
        	<?php get_search_form(); ?>
        <?php endif; ?>
	</div>
	<?php get_template_part("sidebar"); ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
