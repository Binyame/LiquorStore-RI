<?php

if ( ! function_exists( 'aperitif_core_is_yith_wishlist_installed' ) ) {
	/**
	 * Function that check if wishlist plugin is installed
	 *
	 * @return bool
	 */
	function aperitif_core_is_yith_wishlist_installed() {
		return defined( 'YITH_WCWL' );
	}
}

if ( aperitif_core_is_yith_wishlist_installed() ) {
	if ( ! function_exists( 'aperitif_core_woo_get_yith_wishlist_shortcode' ) ) {
		/**
		 * Function that add wishlist shortcode
		 */
		function aperitif_core_woo_get_yith_wishlist_shortcode() {
			
			echo '<div class="qodef-woo-product-wishlist-holder">' . do_shortcode( '[yith_wcwl_add_to_wishlist]' ) . '</div>';
		}
		
		add_action( 'aperitif_core_action_woo_yith_buttons', 'aperitif_core_woo_get_yith_wishlist_shortcode', 1 );
	}
}