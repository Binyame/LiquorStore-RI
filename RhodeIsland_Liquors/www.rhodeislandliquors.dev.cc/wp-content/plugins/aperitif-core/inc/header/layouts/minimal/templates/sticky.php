<div class="qodef-header-sticky">
	<div class="qodef-header-sticky-inner <?php echo apply_filters( 'aperitif_filter_header_inner_class', '' ); ?>">
		<?php aperitif_core_get_header_logo_image(); ?>
		<a href="javascript:void(0)"
		   class="qodef-fullscreen-menu-opener <?php echo aperitif_core_get_open_close_icon_class( 'qodef_fullscreen_menu_icon_source', 'qodef-fullscreen-menu-opener' ) ?>">
            <span class="qodef-open-icon">
                <?php echo aperitif_core_get_fullscreen_icon_html(); ?>
            </span>
			<span class="qodef-close-icon">
                <?php echo aperitif_core_get_fullscreen_icon_html( true ); ?>
            </span>
		</a>
	</div>
</div>