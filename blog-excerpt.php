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
 * Template Name: Blog Excerpt (summary)
 */
get_header(); ?>	
<div id="primary" class="content-area">
	<?php echo vstandard_breadcrumb_lists(); ?>
	<div id="content" class="site-content" role="main">
		<?php if(have_posts()) : ?>
			<?php //vstandard_content_nav('nav-above'); ?>
			<?php /* Start the Loop */ ?>
			<?php
    			if(get_query_var('paged')){
    				$paged = get_query_var('paged');
    			}elseif(get_query_var('page')){
    				$paged = get_query_var('page');
    			}else 
					$paged = 1;
					query_posts("post_type=post&paged=$paged"); 
			?> 
			<?php if (have_posts()) : ?>
				<?php while (have_posts()) : the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'vstandard' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
                
                <div class="post-meta">
                <?php vstandard_post_meta_data(); ?>
                
				    <?php if ( comments_open() ) : ?>
                        <span class="comments-link">
                        <span class="mdash">&mdash;</span>
                    <?php comments_popup_link(__('No Comments &darr;', 'vstandard'), __('1 Comment &darr;', 'vstandard'), __('% Comments &darr;', 'vstandard')); ?>
                        </span>
                    <?php endif; ?> 
                </div><!-- end of .post-meta -->
                
                <div class="post-entry">
                    <?php if ( has_post_thumbnail()) : ?>
                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
                    <?php the_post_thumbnail(); ?>
                        </a>
                    <?php endif; ?>
                    <?php the_excerpt(); ?>
                    <?php wp_link_pages(array('before' => '<div class="pagination">' . __('Pages:', 'vstandard'), 'after' => '</div>')); ?>
                </div><!-- end of .post-entry -->
                
                <div class="post-data">
				    <?php the_tags(__('Tagged with:', 'vstandard') . ' ', ', ', '<br />'); ?> 
					<?php printf(__('Posted in %s', 'vstandard'), get_the_category_list(', ')); ?> 
                </div><!-- end of .post-data -->             

            <div class="post-edit"><?php edit_post_link(__('Edit', 'vstandard')); ?></div>               
            </article><!-- end of #post-<?php the_ID(); ?> -->
            
        <?php endwhile; ?> 
        
        <?php if (  $wp_query->max_num_pages > 1 ) : ?>
        <div class="navigation">
			<div class="previous"><?php next_posts_link( __( '&#8249; Older posts', 'vstandard' ) ); ?></div>
            <div class="next"><?php previous_posts_link( __( 'Newer posts &#8250;', 'vstandard' ) ); ?></div>
		</div><!-- end of .navigation -->
        <?php endif; ?>

	    <?php else : ?>

        <h1 class="title-404"><?php _e('404 &#8212; Fancy meeting you here!', 'vstandard'); ?></h1>
                    
        <p><?php _e('Don&#39;t panic, we&#39;ll get through this together. Let&#39;s explore our options here.', 'vstandard'); ?></p>
                    
        <h6><?php printf( __('You can return %s or search for the page you were looking for.', 'vstandard'),
	            sprintf( '<a href="%1$s" title="%2$s">%3$s</a>',
		            esc_url( get_home_url() ),
		            esc_attr__('Home', 'vstandard'),
		            esc_attr__('&larr; Home', 'vstandard')
	                )); 
			 ?></h6>
                    
        <?php get_search_form(); ?>
        
<?php endif; ?>  
							<?php vstandard_content_nav('nav-below'); ?>
						<?php else : ?>
     						<?php get_template_part('no-results','index'); ?>
						<?php endif; ?>
					</div><!-- #content .site-content -->
				</div><!-- #primary .content-area -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>