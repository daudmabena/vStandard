<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;
?>  
    <div id="widgets" class="home-widgets">
        <div class="grid col-300">
        <?php vstandard_widgets(); // above widgets hook ?>
            
            <?php if (!dynamic_sidebar('footer-widget-1')) : ?>
            
			<?php endif; //end of home-widget-1 ?>

        <?php vstandard_widgets_end(); // vstandard after widgets hook ?>
        </div><!-- end of .col-300 -->

        <div class="grid col-300">
        <?php vstandard_widgets(); // vstandard above widgets hook ?>
            
			<?php if (!dynamic_sidebar('footer-widget-2')) : ?>
            
			<?php endif; //end of home-widget-2 ?>
            
        <?php vstandard_widgets_end(); // after widgets hook ?>
        </div><!-- end of .col-300 -->

        <div class="grid col-300 fit">
        <?php vstandard_widgets(); // above widgets hook ?>
            
			<?php if (!dynamic_sidebar('footer-widget-3')) : ?>
            
			<?php endif; //end of home-widget-3 ?>
            
        <?php vstandard_widgets_end(); // after widgets hook ?>
        </div><!-- end of .col-300 fit -->
    </div><!-- end of #widgets -->