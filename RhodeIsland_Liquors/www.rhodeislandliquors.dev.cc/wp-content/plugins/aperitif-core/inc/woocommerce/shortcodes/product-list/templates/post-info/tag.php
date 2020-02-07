<?php

$tags = aperitif_core_woo_get_product_tags();

if ( ! empty( $tags ) ) { ?>
	<div class="qodef-woo-product-tags"><?php echo wp_kses_post( $tags ); ?></div>
<?php } ?>