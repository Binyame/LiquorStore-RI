<?php

if ( ! function_exists( 'aperitif_core_add_age_verification_popup_single_meta_box' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function aperitif_core_add_age_verification_popup_single_meta_box( $page ) {
		
		if ( $page ) {
			
			$age_verification_popup_tab = $page->add_tab_element(
				array(
					'name'        => 'tab-age-verification',
					'icon'        => 'fa fa-cog',
					'title'       => esc_html__( 'Age Verification Popup Settings', 'aperitif-core' ),
					'description' => esc_html__( 'Age Verification Popup Settings', 'aperitif-core' )
				)
			);
			
			$age_verification_popup_tab->add_field_element(
				array(
					'field_type'  => 'select',
					'name'          => 'qodef_enable_age_verification_popup',
					'title'         => esc_html__( 'Enable Age Verification', 'aperitif-core' ),
					'description'   => esc_html__( 'Use this option to enable/disable Age Verification', 'aperitif-core' ),
					'options'     => aperitif_core_get_select_type_options_pool( 'no_yes' )
				)
			);
			
			// Hook to include additional options after module options
			do_action( 'aperitif_core_action_after_page_age_verification_popop_meta_box_map', $age_verification_popup_tab );
		}
	}
	
	add_action( 'aperitif_core_action_after_general_meta_box_map', 'aperitif_core_add_age_verification_popup_single_meta_box' );
}