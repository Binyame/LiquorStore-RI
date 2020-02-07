<?php
$item_id     = get_the_ID();
$price       = get_post_meta( $item_id, 'qodef_restaurant_menu_item_price', true );
$description = get_post_meta( $item_id, 'qodef_restaurant_menu_item_description', true );
?>
<div <?php qode_framework_class_attribute( $item_classes ); ?>>
	<div class="qodef-e-inner">
		<div class="qodef-e-heading">
			<h6 class="qodef-e-heading-title">
				<?php the_title(); ?>
			</h6>
			<div class="qodef-e-heading-line"></div>
			<?php if ( ! empty( $price ) ) : ?>
				<h6 class="qodef-e-heading-price"><?php echo esc_html( $price ); ?></h6>
			<?php endif; ?>
		</div>
		
		<?php if ( ! empty ( $description ) ) : ?>
			<p class="qodef-e-description">
				<?php echo esc_html( $description ); ?>
			</p>
		<?php endif; ?>
	</div>
</div>

