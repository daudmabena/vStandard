<?php
/**
* The template for displaying the footer.
*
* Contains the closing of the id=main div and all content after
*
* @package vStandard
* @since vStandard 1.0
*/
?>
 
</div><!-- #main .site-main -->
<footer id="colophon" class="site-footer" role="contentinfo">
    <div class="site-info">
        <?php do_action('vstandard_credits'); ?>
        <a href="http://wordpress.org/" title="<?php esc_attr_e( 'A Semantic Personal Publishing Platform', 'vstandard' ); ?>" rel="generator"><?php printf( __( 'Proudly powered by %s', 'vstandard'), 'WordPress'); ?></a>
        <span class="sep"> | </span>
        <?php printf( __('Theme: %1$s by %2$s.', 'vstandard' ), 'vStandard', '<a href="http://www.rstandley.co.uk/" rel="designer">Rory Standley</a>'); ?>
    </div><!-- .site-info -->
</footer><!-- #colophon .site-footer -->
</div><!-- #page .hfeed .site -->
<?php wp_footer(); ?>
</body>
</html>