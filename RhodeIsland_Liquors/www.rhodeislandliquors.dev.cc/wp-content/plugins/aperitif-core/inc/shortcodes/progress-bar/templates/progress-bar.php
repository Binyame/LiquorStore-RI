<div <?php qode_framework_class_attribute( $holder_classes ); ?> <?php qode_framework_inline_attrs( $data_attrs ); ?>>
	<div class="qodef-m-inner">
		<?php if ( ! empty( $title ) ) { ?>
		<<?php echo esc_attr( $title_tag ); ?>
		class="qodef-m-title" <?php qode_framework_inline_style( $title_styles ); ?>>
		<?php echo esc_html( $title ); ?>
	</<?php echo esc_attr( $title_tag ); ?>>
	<?php } ?>
	<div class="qodef-m-canvas" id="qodef-m-canvas-<?php echo esc_attr( $rand_number ); ?>"></div>
	<?php if ( isset( $layout ) && $layout === 'custom' && ! empty( $custom_shape ) ) { ?>
		<div id="qodef-m-custom-canvas">
			<?php echo qode_framework_wp_kses_html( 'svg', $custom_shape ); ?>
		</div>
	<?php } ?>

</div>
</div>