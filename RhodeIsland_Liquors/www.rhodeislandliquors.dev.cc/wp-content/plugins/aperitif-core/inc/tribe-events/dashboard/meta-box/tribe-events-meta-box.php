<?php

if ( ! function_exists( 'aperitif_core_add_tribe_events_single_meta_box' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function aperitif_core_add_tribe_events_single_meta_box() {
		$qode_framework = qode_framework_get_framework_root();
		
		$page = $qode_framework->add_options_page(
			array(
				'scope' => array( 'tribe_events' ),
				'type'  => 'meta',
				'slug'  => 'tribe-events',
				'title' => esc_html__( 'Tribe Events', 'aperitif-core' ),
				'layout' => 'tabbed'
			)
		);
		
		if ( $page ) {
			// Hook to include additional options after module options
			do_action( 'aperitif_core_action_after_tribe_events_single_meta_box_map', $page );
		}
	}
	
	add_action( 'aperitif_core_action_default_meta_boxes_init', 'aperitif_core_add_tribe_events_single_meta_box' );
}