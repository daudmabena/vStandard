<?php
/**
 * @package vStandard
 * @since vStandard 1.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if ( is_search() ) : // Only display Excerpts for Search ?>
    <div class="entry-summary">
    	<h2 class="post-title"><?php the_title(); ?> - -</h2>
        <?php the_excerpt(); ?>
    </div><!-- .entry-summary -->
    <?php else : ?>
    <div class="entry-content">
    	<h2 class="post-title"><?php the_title(); ?> - -</h2>
        <?php the_content(); ?>
    </div><!-- .entry-content -->
    <?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->