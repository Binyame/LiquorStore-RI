<?php if ( ! empty( $text ) ) { ?>
	<?php if ( ! empty( $link ) ) : ?>
		<a itemprop="url" href="<?php echo esc_url( $link ); ?>" target="<?php echo esc_attr( $target ); ?>">
	<?php endif; ?>
	<p class="qodef-m-text" <?php qode_framework_inline_style( $text_styles ); ?>><?php echo esc_html( $text ); ?></p>
	<?php if ( ! empty( $link ) ) : ?>
		</a>
	<?php endif; ?>
<?php } ?>