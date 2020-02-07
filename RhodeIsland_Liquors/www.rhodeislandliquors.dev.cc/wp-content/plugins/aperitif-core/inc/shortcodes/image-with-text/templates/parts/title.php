<?php if ( ! empty( $title ) ) { ?>
	<<?php echo esc_attr( $title_tag ); ?> class="qodef-m-title" <?php qode_framework_inline_style( $title_styles ); ?>>
	<?php if ( ! empty( $link ) ) : ?>
		<a href="<?php echo esc_url( $link ); ?>" target="<?php echo esc_attr( $target ); ?>">
	<?php endif; ?>
	<?php echo esc_html( $title ); ?>
	<?php if ( ! empty( $link ) ) : ?>
		</a>
	<?php endif; ?>
	</<?php echo esc_attr( $title_tag ); ?>>
<?php } ?>