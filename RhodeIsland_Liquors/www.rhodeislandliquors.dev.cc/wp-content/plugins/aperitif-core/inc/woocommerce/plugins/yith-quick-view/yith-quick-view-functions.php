<?php

if ( ! function_exists( 'aperitif_core_is_yith_quickview_installed' ) ) {
	/**
	 * Function that check if quick view plugin is installed
	 *
	 * @return bool
	 */
	function aperitif_core_is_yith_quickview_installed() {
		return defined( 'YITH_WCQV_INIT' );
	}
}

if ( aperitif_core_is_yith_quickview_installed() ) {
	if ( ! function_exists( 'aperitif_core_woo_get_yith_quickview_link' ) ) {
		/**
		 * Function that returns quick view link
		 */
		function aperitif_core_woo_get_yith_quickview_link() {
			global $product;
			
			echo '<a href="#" class="button yith-wcqv-button" data-product_id="' . $product->get_id() . '"></a>';
		}
		
		add_action( 'aperitif_core_action_woo_yith_buttons', 'aperitif_core_woo_get_yith_quickview_link', 2 );
	}
}