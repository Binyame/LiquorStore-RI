<?php

if ( function_exists( 'woocommerce_template_loop_add_to_cart' ) ) {
	woocommerce_template_loop_add_to_cart();
	do_action( 'aperitif_core_action_woo_yith_buttons' );
}