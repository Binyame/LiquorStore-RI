<?php

if ( ! function_exists( 'aperitif_core_add_subscribe_popup_options' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function aperitif_core_add_subscribe_popup_options() {
		$qode_framework = qode_framework_get_framework_root();
		
		$page = $qode_framework->add_options_page(
			array(
				'scope'       => APERITIF_CORE_OPTIONS_NAME,
				'type'        => 'admin',
				'slug'        => 'subscribe-popup',
				'icon'        => 'fa fa-envelope',
				'title'       => esc_html__( 'Subscribe Popup', 'aperitif-core' ),
				'description' => esc_html__( 'Subscribe popup settings', 'aperitif-core' )
			)
		);
		
		if ( $page ) {
			$cf7 = get_posts( 'post_type="wpcf7_contact_form"&numberposts=-1' );
			
			$contact_forms = array();
			if ( $cf7 ) {
				foreach ( $cf7 as $cform ) {
					$contact_forms[ $cform->ID ] = $cform->post_title;
				}
			} else {
				$contact_forms[0] = esc_html__( 'No contact forms found', 'aperitif-core' );
			}
			
			$page->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_enable_subscribe_popup',
					'title'         => esc_html__( 'Enable Subscribe Popup', 'aperitif-core' ),
					'description'   => esc_html__( 'Use this option to enable/disable subscribe popup', 'aperitif-core' ),
					'default_value' => 'no'
				)
			);
			
			$subscribe_popup_section = $page->add_section_element(
				array(
					'name'       => 'qodef_subscribe_popup_section',
					'title'      => esc_html__( 'Subscribe Popup', 'aperitif-core' ),
					'dependency' => array(
						'hide' => array(
							'qodef_enable_subscribe_popup' => array(
								'values'        => 'no',
								'default_value' => ''
							)
						)
					)
				)
			);
			
			$subscribe_popup_section->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_subscribe_popup_title',
					'title'       => esc_html__( 'Title', 'aperitif-core' ),
					'description' => esc_html__( 'Enter subscribe popup window title ', 'aperitif-core' )
				)
			);
			
			$subscribe_popup_section->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_subscribe_popup_subtitle',
					'title'       => esc_html__( 'Subtitle', 'aperitif-core' ),
					'description' => esc_html__( 'Enter subscribe popup window subtitle', 'aperitif-core' )
				)
			);
			
			$subscribe_popup_section->add_field_element(
				array(
					'field_type' => 'image',
					'name'       => 'qodef_subscribe_popup_background_image',
					'title'      => esc_html__( 'Background Image', 'aperitif-core' )
				)
			);
			
			$subscribe_popup_section->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_subscribe_popup_contact_form',
					'title'       => esc_html__( 'Select Contact Form', 'aperitif-core' ),
					'description' => esc_html__( 'Choose contact form to display in subscribe popup window', 'aperitif-core' ),
					'options'     => $contact_forms,
				)
			);
			
			$subscribe_popup_section->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_enable_subscribe_popup_prevent',
					'title'         => esc_html__( 'Enable Subscribe Popup Prevent', 'aperitif-core' ),
					'default_value' => 'no',
				)
			);
			
			$subscribe_popup_section->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_subscribe_popup_prevent_behavior',
					'title'       => esc_html__( 'Subscribe Popup Prevent Behavior', 'aperitif-core' ),
					'description' => esc_html__( 'Choose how to manage popup prevent', 'aperitif-core' ),
					'options'     => array(
						'session' => esc_html__( 'by Current Session', 'aperitif-core' ),
						'cookies' => esc_html__( 'by Browser Cookies', 'aperitif-core' )
					),
					'dependency'  => array(
						'show' => array(
							'qodef_enable_subscribe_popup_prevent' => array(
								'values'        => 'yes',
								'default_value' => ''
							)
						)
					),
				)
			);
			
			// Hook to include additional options after module options
			do_action( 'aperitif_core_action_after_subscribe_popup_options_map', $subscribe_popup_section );
		}
	}
	
	add_action( 'aperitif_core_action_default_options_init', 'aperitif_core_add_subscribe_popup_options', aperitif_core_get_admin_options_map_position( 'subscribe-popup' ) );
}