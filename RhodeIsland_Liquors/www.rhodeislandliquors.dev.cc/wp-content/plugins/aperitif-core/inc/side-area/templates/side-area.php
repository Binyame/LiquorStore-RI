<?php if ( is_active_sidebar( 'qodef-side-area' ) ) { ?>
	<div id="qodef-side-area" <?php qode_framework_class_attribute( $classes ); ?>>
		<a id="qodef-side-area-close"
		   class="<?php echo aperitif_core_get_open_close_icon_class( 'qodef_side_area_icon_source', 'qodef-side-area-close' ); ?>"
		   href="javascript:void(0)">
			<?php echo aperitif_core_get_side_area_icon_html( true ); ?>
		</a>
		<div id="qodef-side-area-inner">
			<?php dynamic_sidebar( 'qodef-side-area' ); ?>
		</div>
	</div>
<?php } ?>