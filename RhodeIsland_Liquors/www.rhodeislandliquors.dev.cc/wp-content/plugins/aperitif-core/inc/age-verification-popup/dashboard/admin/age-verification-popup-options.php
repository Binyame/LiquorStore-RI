<?php

if ( ! function_exists( 'aperitif_core_add_age_verification_popup_options' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function aperitif_core_add_age_verification_popup_options() {
		$qode_framework = qode_framework_get_framework_root();
		
		$page = $qode_framework->add_options_page(
			array(
				'scope'       => APERITIF_CORE_OPTIONS_NAME,
				'type'        => 'admin',
				'slug'        => 'age-verification',
				'icon'        => 'fa fa-envelope',
				'title'       => esc_html__( 'Age Verification', 'aperitif-core' ),
				'description' => esc_html__( 'Age Verification Settings', 'aperitif-core' )
			)
		);
		
		if ( $page ) {
			
			$page->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_enable_age_verification_popup',
					'title'         => esc_html__( 'Enable Age Verification', 'aperitif-core' ),
					'description'   => esc_html__( 'Use this option to enable/disable Age Verification', 'aperitif-core' ),
					'default_value' => 'no'
				)
			);
			
			$age_verification_popup_section = $page->add_section_element(
				array(
					'name'       => 'qodef_ae_verification_popup_section',
					'title'      => esc_html__( 'Age Verification Popup', 'aperitif-core' ),
					'dependency' => array(
						'hide' => array(
							'qodef_enable_age_verification_popup' => array(
								'values'        => 'no',
								'default_value' => ''
							)
						)
					)
				)
			);
			
			$age_verification_popup_section->add_field_element(
				array(
					'field_type'    => 'text',
					'name'          => 'qodef_age_verification_popup_title',
					'title'         => esc_html__( 'Title', 'aperitif-core' ),
					'description'   => esc_html__( 'Enter Age Verification window title', 'aperitif-core' ),
					'default_value' => esc_html__( 'Are You Over 18?', 'aperitif-core' )
				)
			);
			
			$age_verification_popup_section->add_field_element(
				array(
					'field_type'    => 'text',
					'name'          => 'qodef_age_verification_popup_subtitle',
					'title'         => esc_html__( 'Subtitle', 'aperitif-core' ),
					'description'   => esc_html__( 'Enter Age Verification window subtitle', 'aperitif-core' ),
					'default_value' => esc_html__( 'By entering this site you agree to our Privacy Policy', 'aperitif-core' )
				)
			);
			
			$age_verification_popup_section->add_field_element(
				array(
					'field_type'    => 'text',
					'name'          => 'qodef_age_verification_popup_note',
					'title'         => esc_html__( 'Note', 'aperitif-core' ),
					'description'   => esc_html__( 'Enter Age Verification window note', 'aperitif-core' ),
					'default_value' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lectus arcu bibendum at varius. Ut porttitor leo a diam. Penatibus et magnis dis. Ut enim ad minim veniam.', 'aperitif-core' )
				)
			);
			
			$age_verification_popup_section->add_field_element(
				array(
					'field_type'    => 'text',
					'name'          => 'qodef_age_verification_popup_link',
					'title'         => esc_html__( 'Link for Negative Action', 'aperitif-core' ),
					'description'   => esc_html__( 'Enter Age Verification link for negative action', 'aperitif-core' ),
					'default_value' => esc_html__( 'https://www.google.com', 'aperitif-core' )
				)
			);
			
			$age_verification_popup_section->add_field_element(
				array(
					'field_type' => 'image',
					'name'       => 'qodef_age_verification_popup_background_image',
					'title'      => esc_html__( 'Background Image', 'aperitif-core' )
				)
			);
			
			$age_verification_popup_section->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_age_verification_popup_prevent_behavior',
					'title'       => esc_html__( 'Age Verification Behavior', 'aperitif-core' ),
					'description' => esc_html__( 'Choose how to manage popup', 'aperitif-core' ),
					'options'     => array(
						'session' => esc_html__( 'by Current Session', 'aperitif-core' ),
						'cookies' => esc_html__( 'by Browser Cookies', 'aperitif-core' )
					)
				)
			);
			
			// Hook to include additional options after module options
			do_action( 'aperitif_core_action_after_age_verification_popup_options_map', $age_verification_popup_section );
		}
	}
	
	add_action( 'aperitif_core_action_default_options_init', 'aperitif_core_add_age_verification_popup_options', aperitif_core_get_admin_options_map_position( 'age-verification' ) );
}