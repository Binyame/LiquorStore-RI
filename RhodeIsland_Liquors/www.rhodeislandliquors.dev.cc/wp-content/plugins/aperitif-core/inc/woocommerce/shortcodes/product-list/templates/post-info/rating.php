<?php

$product = aperitif_core_woo_get_global_product();

if ( ! empty( $product ) && get_option( 'woocommerce_enable_review_rating' ) !== 'no' ) {
	$rating = $product->get_average_rating();
	
	if ( ! empty( $rating ) ) {
		echo aperitif_core_woo_product_get_rating_html( '', $rating, 0 );
	}
}