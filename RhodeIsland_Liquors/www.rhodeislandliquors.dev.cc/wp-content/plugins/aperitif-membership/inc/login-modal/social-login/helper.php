<?php

if ( ! function_exists( 'aperitif_membership_is_social_login_enabled' ) ) {
	function aperitif_membership_is_social_login_enabled() {
		return aperitif_core_get_option_value( 'admin', 'qodef_enable_social_login' ) === 'yes';
	}
}

if ( ! function_exists( 'aperitif_membership_include_social_login_template' ) ) {
	/**
	 * Render form for twitter login
	 */
	function aperitif_membership_include_social_login_template() {
		
		if ( aperitif_membership_is_social_login_enabled() ) {
			aperitif_membership_template_part( 'login-modal/social-login', 'templates/holder' );
		}
	}
	
	add_action( 'aperitif_membership_action_login_form_template', 'aperitif_membership_include_social_login_template' );
}

if ( ! function_exists( 'aperitif_membership_social_login_set_admin_options_map_position' ) ) {
	/**
	 * Function that set dashboard admin options map position for this module
	 *
	 * @param $position int
	 * @param $map string
	 *
	 * @return int
	 */
	function aperitif_membership_social_login_set_admin_options_map_position( $position, $map ) {
		
		if ( $map === 'social-login' ) {
			$position = 80;
		}
		
		return $position;
	}
	
	add_filter( 'aperitif_core_filter_admin_options_map_position', 'aperitif_membership_social_login_set_admin_options_map_position', 10, 2 );
}

if ( ! function_exists( 'aperitif_membership_include_social_login_rest_api_callbacks' ) ) {
	/**
	 * Add additional callback functions if social login is enabled
	 */
	function aperitif_membership_include_social_login_rest_api_callbacks( $options ) {
		
		if ( aperitif_membership_is_social_login_enabled() && isset( $options['social_login'] ) && ! empty( $options['social_login'] ) ) {
			$social_callback = "aperitif_membership_init_rest_api_{$options['social_login']}_login";
			
			if ( function_exists( $social_callback ) ) {
				$social_callback();
			}
		}
	}
	
	add_action( 'aperitif_membership_action_before_rest_api_login', 'aperitif_membership_include_social_login_rest_api_callbacks' );
}