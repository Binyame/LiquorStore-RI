<?php
$sticky_boxed = aperitif_core_get_post_value_through_levels( 'qodef_boxed' ) === 'yes' ? 'qodef-content-grid' : '';
?>
<div class="qodef-header-sticky <?php echo esc_attr( $sticky_boxed ) ?> ">
	<div class="qodef-header-sticky-inner <?php echo apply_filters( 'aperitif_filter_header_inner_class', '' ); ?>">
		<?php
		aperitif_core_get_header_logo_image();
		aperitif_core_template_part( 'header', 'templates/parts/navigation', '', array( 'menu_id' => 'qodef-sticky-navigation-menu' ) );
		?>
		<div class="qodef-widget-holder">
			<?php aperitif_core_get_header_widget_area( 'sticky' ); ?>
		</div>
		
		<?php do_action( 'aperitif_core_action_after_sticky_header' ); ?>
	</div>
</div>