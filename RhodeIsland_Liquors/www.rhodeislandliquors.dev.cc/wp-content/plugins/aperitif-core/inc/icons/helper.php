<?php

if ( ! function_exists( 'aperitif_core_include_icons' ) ) {
	/**
	 * Function that includes icons
	 */
	function aperitif_core_include_icons() {
		foreach ( glob( APERITIF_CORE_INC_PATH . '/icons/*/include.php' ) as $icon_pack ) {
			include_once $icon_pack;
		}
	}
	
	add_action( 'qode_framework_action_before_icons_register', 'aperitif_core_include_icons' );
}