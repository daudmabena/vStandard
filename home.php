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
				 		<?php $vstandard_settings = get_option('vstandard_settings');
						// First let's check if title was set
						if($vstandard_settings['home_page_title']){
                    		echo '<h1 class="featured-title">'; 
				    		echo $vstandard_settings['home_page_title'];
				    		echo '</h1>'; 
						// If not display dummy headline for preview purposes
			      		}else{
			      			echo '<h1 class="featured-title">';
				    		echo __('Hello, World!','vstandard');
				    		echo '</h1>';
				  		}
						// First let's check if sub-title was set
						if($vstandard_settings['home_page_sub_title']){
                    		echo '<h2 class="featured-subtitle">'; 
				    		echo $vstandard_settings['home_page_sub_title'];
				    		echo '</h2>'; 
						// If not display dummy headline for preview purposes
			      		}else{
			      			echo '<h2 class="featured-subtitle">';
				    		echo __('Your H2 sub-title here','vstandard');
				    		echo '</h2>';
				  		}
						// First let's check if content is in place
			    		if(!empty($vstandard_settings['home_content'])){
                    		echo '<p>'; 
							// The end user is able to add plugin short codes to this area
							echo do_shortcode($vstandard_settings['home_content']);
				    		echo '</p>'; 
						// If not let's show dummy content for demo purposes
			      		}else{
			      			echo '<p>';
				    		echo __('Your title, subtitle and this very content is editable from Theme Option. Call to Action button and its destination link as well. Image on your right can be an image or even YouTube video if you like.','vstandard');
				    		echo '</p>';
				  		}
						?>
						<div class="call-to-action">
            				<?php
            				// First let's check if headline was set
			    			if(!empty($vstandard_settings['home_content_cta_url']) && $vstandard_settings['home_content_cta_text']){
								echo '<a href="'.$vstandard_settings['home_content_cta_url'].'" class="blue button">'; 
								echo $vstandard_settings['home_content_cta_text'];
				    			echo '</a>';
								// If not display dummy headline for preview purposes
			      			}else{ 
								echo '<a href="#nogo" class="blue button">'; 
								echo __('Call to Action','vstandard');
				    			echo '</a>';
				  			}
								?>
						</div><!-- end of .call-to-action -->
				 	</div><!-- end of .col-460 -->
				 	<div id="featured-image" class="grid col-460 fit"> 
                           
            <?php
			// First let's check if image was set
			    if (!empty($vstandard_settings['home_page_image'])) {
					?>
					<img src="<?php echo do_shortcode($vstandard_settings['home_page_image']); ?>" alt="Home Page Advertising Image" class="aligncenter" />
					<?php
		    // If not display dummy image for preview purposes
			      } else {             
                    echo '<img class="aligncenter" src="'.get_site_url().'/wp-content/themes/vStandard/images/time.png" alt="Home Page Advertising Image" />'; 
 				  }
			?> 
                                   
        </div><!-- end of #featured-image -->
				 </div><!-- end of #featured -->
<?php get_sidebar('home'); ?>
<?php get_footer(); ?>