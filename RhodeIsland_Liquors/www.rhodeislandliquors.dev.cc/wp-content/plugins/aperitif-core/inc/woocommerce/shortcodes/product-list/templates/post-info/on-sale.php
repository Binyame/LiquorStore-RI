<?php

$product = aperitif_core_woo_get_global_product();

if ( ! empty( $product ) && $product->is_on_sale() ) {
	echo aperitif_core_woo_sale_flash();
}

if ( ! empty( $product ) && ! $product->is_in_stock() ) {
	echo aperitif_core_get_out_of_stock_mark();
}

if ( ! empty( $product ) && $product->get_id() !== '' ) {
	echo aperitif_core_get_new_mark( $product->get_id() );
}