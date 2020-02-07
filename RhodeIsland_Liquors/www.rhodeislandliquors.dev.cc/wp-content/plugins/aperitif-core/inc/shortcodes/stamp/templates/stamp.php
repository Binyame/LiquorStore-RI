<div <?php qode_framework_class_attribute( $holder_classes ); ?>  <?php echo qode_framework_get_inline_style( $holder_styles ); ?> <?php echo qode_framework_get_inline_attrs( $holder_data, true ); ?>>
	<div class="qodef-m-text"
	     data-count="<?php echo esc_attr( $text_data['count'] ); ?>"><?php echo wp_kses_post( $text_data['text'] ); ?></div>
	<?php if ( ! empty( $centered_text ) ) { ?>
		<div class="qodef-m-centered-text" <?php echo qode_framework_get_inline_style( $centered_text_styles ); ?>>
			<?php echo esc_html( $centered_text ); ?>
		</div>
	<?php } ?>
	<?php if ( ! empty( $svg_source ) ) { ?>
		<div class="qodef-m-signature" <?php echo qode_framework_get_inline_style( $svg_styles ); ?> >
			<?php echo urldecode( base64_decode( $svg_source ) ); ?>
		</div>
	<?php } ?>
</div>