<?php if ( $icon_type == 'custom-icon' && ! empty ( $custom_icon ) ) { ?>
	<?php echo wp_get_attachment_image( $custom_icon, 'full' ); ?>
<?php }