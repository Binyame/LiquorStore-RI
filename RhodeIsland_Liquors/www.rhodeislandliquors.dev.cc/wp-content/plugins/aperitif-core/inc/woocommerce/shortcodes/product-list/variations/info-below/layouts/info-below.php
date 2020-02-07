<div <?php wc_product_class( $item_classes ); ?>>
	<div class="qodef-woo-product-inner">
		<?php if ( has_post_thumbnail() ) { ?>
			<div class="qodef-woo-product-image">
				<?php aperitif_core_template_part( 'woocommerce/shortcodes/product-list', 'templates/post-info/on-sale' ); ?>
				<?php aperitif_core_template_part( 'woocommerce/shortcodes/product-list', 'templates/post-info/image', '', $params ); ?>
				<div class="qodef-woo-product-image-inner">
					<div class="qodef-woo-product-button-holder">
						<?php aperitif_core_template_part( 'woocommerce/shortcodes/product-list', 'templates/post-info/add-to-cart' ); ?>
					</div>
				</div>
			</div>
		<?php } ?>
		<div class="qodef-woo-product-content">
			<?php aperitif_core_template_part( 'woocommerce/shortcodes/product-list', 'templates/post-info/tag', '', $params ); ?>
			<?php aperitif_core_template_part( 'woocommerce/shortcodes/product-list', 'templates/post-info/title', '', $params ); ?>
			<?php aperitif_core_template_part( 'woocommerce/shortcodes/product-list', 'templates/post-info/rating', '', $params ); ?>
			<?php aperitif_core_template_part( 'woocommerce/shortcodes/product-list', 'templates/post-info/price', '', $params ); ?>
		</div>
		<?php aperitif_core_template_part( 'woocommerce/shortcodes/product-list', 'templates/post-info/link' ); ?>
	</div>
</div>