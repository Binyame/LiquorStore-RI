<div class="qodef-m-image">
	<?php if ( $image_action === 'open-popup' ) { ?>
	<a class="qodef-magnific-popup qodef-popup-item" itemprop="image"
	   href="<?php echo esc_url( $image_params['url'] ); ?>" data-type="image"
	   title="<?php echo esc_attr( $image_params['alt'] ); ?>">
		<?php } else if ( $image_action === 'custom-link' && ! empty( $link ) ) { ?>
		<a href="<?php echo esc_url( $link ); ?>" target="<?php echo esc_attr( $target ); ?>">
			<?php } ?>
			<?php if ( is_array( $image_params['image_size'] ) && count( $image_params['image_size'] ) ) {
				echo qode_framework_generate_thumbnail( $image_params['image_id'], $image_params['image_size'][0], $image_params['image_size'][1] );
			} else {
				echo wp_get_attachment_image( $image_params['image_id'], $image_params['image_size'] );
			} ?>
			<?php if ( $image_action === 'open-popup' || $image_action === 'custom-link' ) { ?>
		</a>
	<?php } ?>
</div>