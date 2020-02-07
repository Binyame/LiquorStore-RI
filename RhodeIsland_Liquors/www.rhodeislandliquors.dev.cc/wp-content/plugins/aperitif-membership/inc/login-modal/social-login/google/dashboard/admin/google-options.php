<?php

if ( ! function_exists( 'aperitif_membership_add_social_login_google_options' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function aperitif_membership_add_social_login_google_options( $page, $social_login_network_section ) {
		
		if ( $social_login_network_section ) {
			$social_login_network_section->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_enable_google_social_login',
					'title'         => esc_html__( 'Enable Google Social Login', 'aperitif-membership' ),
					'description'   => esc_html__( 'Enabling this option will allow login from google social network', 'aperitif-membership' ),
					'default_value' => 'no'
				)
			);
			
			$social_login_network_section->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_google_social_login_api_id',
					'title'       => esc_html__( 'Google App ID', 'aperitif-membership' ),
					'description' => esc_html__( 'Copy your Client ID form created Google Application', 'aperitif-membership' ),
					'dependency'  => array(
						'show' => array(
							'qodef_enable_google_social_login' => array(
								'values'        => 'yes',
								'default_value' => ''
							)
						)
					)
				)
			);
		}
	}
	
	add_action( 'aperitif_membership_action_after_social_login_options_map', 'aperitif_membership_add_social_login_google_options', 10, 2 );
}