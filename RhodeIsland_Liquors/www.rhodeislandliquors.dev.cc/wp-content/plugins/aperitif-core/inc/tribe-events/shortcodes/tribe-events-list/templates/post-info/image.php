<?php
$has_image = has_post_thumbnail();

if ( $has_image ) {
	$image_dimension     = isset( $image_dimension ) && ! empty( $image_dimension ) ? esc_attr( $image_dimension['size'] ) : 'full';
	$custom_image_width  = isset( $custom_image_width ) && $custom_image_width !== '' ? intval( $custom_image_width ) : 0;
	$custom_image_height = isset( $custom_image_height ) && $custom_image_height !== '' ? intval( $custom_image_height ) : 0;
	?>
	<div class="qodef-e-image">
		<a itemprop="url" href="<?php echo esc_url( tribe_get_event_link() ); ?>"
		   title="<?php the_title_attribute(); ?>">
			<?php echo aperitif_core_get_list_shortcode_item_image( $image_dimension, '', $custom_image_width, $custom_image_height ); ?>
		</a>
	</div>
<?php } ?>