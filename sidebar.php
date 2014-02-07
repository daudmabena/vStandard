<?php
/**
* The Sidebar containing the main widget areas.
*
* @package vStandard
* @since vStandard 2.0
*/
?>
<div class="col span_3_of_8">
	<?php vstandard_widgets(); // above widgets hook ?>
        <?php if (!dynamic_sidebar('side-bar')) : ?>
        <?php endif; //end of footer-3 ?>
    <?php vstandard_widgets_end(); // after widgets hook ?>
    <br class="breaker" />
</div>