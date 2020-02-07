<?php
// Include mobile logo
aperitif_core_get_mobile_header_logo_image();

// Include mobile haeder widget area
dynamic_sidebar( 'qodef-mobile-header-widget-area' );
?>

<a href="javascript:void(0)"
   class="qodef-fullscreen-menu-opener <?php echo aperitif_core_get_open_close_icon_class( 'qodef_fullscreen_menu_icon_source', 'qodef-fullscreen-menu-opener' ) ?>">
	<span class="qodef-open-icon">
		<?php echo aperitif_core_get_fullscreen_icon_html(); ?>
	</span>
	<span class="qodef-close-icon">
		<?php echo aperitif_core_get_fullscreen_icon_html( true ); ?>
	</span>
</a>