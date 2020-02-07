<?php

include_once APERITIF_CORE_INC_PATH . '/core-dashboard/core-dashboard.php';

if ( ! function_exists( 'aperitif_core_dashboard_load_files' ) ) {
	function aperitif_core_dashboard_load_files() {
		include_once APERITIF_CORE_INC_PATH . '/core-dashboard/rest/include.php';
		include_once APERITIF_CORE_INC_PATH . '/core-dashboard/registration-rest.php';
		include_once APERITIF_CORE_INC_PATH . '/core-dashboard/sub-pages/sub-page.php';
		
		foreach ( glob( APERITIF_CORE_INC_PATH . '/core-dashboard/sub-pages/*/load.php' ) as $subpages ) {
			include_once $subpages;
		}
	}
	
	add_action( 'after_setup_theme', 'aperitif_core_dashboard_load_files' );
}