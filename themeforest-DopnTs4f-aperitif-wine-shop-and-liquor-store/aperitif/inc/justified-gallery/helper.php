<?php

if ( ! function_exists( 'aperitif_include_justified_gallery_scripts' ) ) {
	/**
	 * Function that enqueue modules 3rd party scripts
	 *
	 * @param $atts
	 */
	function aperitif_include_justified_gallery_scripts( $atts ) {
		
		if ( isset( $atts['behavior'] ) && $atts['behavior'] == 'justified-gallery' ) {
			wp_enqueue_script( 'justified-gallery', APERITIF_INC_ROOT . '/justified-gallery/assets/js/plugins/jquery.justifiedGallery.min.js', array( 'jquery' ), true );
		}
	}
	
	add_action( 'aperitif_core_action_list_shortcodes_load_assets', 'aperitif_include_justified_gallery_scripts' );
}
