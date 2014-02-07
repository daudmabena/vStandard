<?php wp_nav_menu(); ?>
<script>
(function ( $ ) {
	"use strict";

	$(function () {
		$('#responsive-select').on('change', function() {
			top.location = this.value;
		});
	});
}(jQuery));
</script>
<select id="responsive-select" size="1">
	<option value="" selected="selected">Main Menu</option>
	<?php
	$items = wp_get_nav_menu_items('main');
	// var_dump($items);
	foreach ( (array) $items as $key => $menu_item ) {
	    $title = $menu_item->title;
	    $url = $menu_item->url;
	    ?>
	    <option value="<?php echo $url; ?>"><?php echo $title; ?></option>
	    <?php
	}
	?>
</select>