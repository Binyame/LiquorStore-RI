<?php if ( ! empty( $text ) ) { ?>
	<div class="qodef-m-text" <?php qode_framework_inline_style( $text_styles ); ?>><?php echo wp_kses( $text, array( 'p' => array() ) ) ?></div>
<?php } ?>