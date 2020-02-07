<?php if ( ! empty( $name ) ) { ?>
	<<?php echo esc_attr( $name_tag ); ?> class="qodef-m-name" <?php qode_framework_inline_style( $name_styles ); ?>>
	<?php echo esc_html( $name ); ?>
	</<?php echo esc_attr( $name_tag ); ?>>
<?php } ?>
<?php if ( ! empty( $position ) ) { ?>
	<var class="qodef-m-position" <?php qode_framework_inline_style( $position_styles ); ?>><?php echo esc_html( $position ); ?></var>
<?php } ?>
<?php if ( ! empty( $text ) ) { ?>
	<p class="qodef-m-text" <?php qode_framework_inline_style( $text_styles ); ?>><?php echo esc_html( $text ); ?></p>
<?php } ?>
