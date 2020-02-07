<<?php echo esc_attr( $text_tag ); ?> <?php qode_framework_class_attribute( $holder_classes ); ?> <?php qode_framework_inline_style( $holder_styles ); ?>>
<?php if ( ! empty( $link ) ) : ?>
<a itemprop="url" href="<?php echo esc_url( $link ); ?>" target="<?php echo esc_attr( $target ); ?>">
	<?php endif; ?>
	<?php echo wp_kses_post( $text ); ?>
	<?php if ( ! empty( $link ) ) : ?>
</a>
<?php endif; ?>
</<?php echo esc_attr( $text_tag ); ?>>