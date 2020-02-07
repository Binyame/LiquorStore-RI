<?php

if ( ! function_exists( 'aperitif_membership_is_google_social_login_enabled' ) ) {
	function aperitif_membership_is_google_social_login_enabled() {
		return aperitif_core_get_option_value( 'admin', 'qodef_enable_google_social_login' ) === 'yes';
	}
}

if ( ! function_exists( 'aperitif_membership_include_google_login_template' ) ) {
	/**
	 * Render form for google login
	 */
	function aperitif_membership_include_google_login_template() {
		if ( aperitif_membership_is_google_social_login_enabled() ) {
			aperitif_membership_template_part( 'login-modal/social-login', 'google/templates/button' );
		}
	}
	
	add_action( 'aperitif_membership_action_social_login_content', 'aperitif_membership_include_google_login_template', 10 );
}

if ( ! function_exists( 'aperitif_membership_localize_main_script_with_google_app_id' ) ) {
	/**
	 * Render form for google login
	 */
	function aperitif_membership_localize_main_script_with_google_app_id( $global ) {
		$app_id = aperitif_core_get_option_value( 'admin', 'qodef_google_social_login_api_id' );
		
		if ( aperitif_membership_is_google_social_login_enabled() && ! empty( $app_id ) ) {
			$global['googleAppId'] = esc_attr( $app_id );
		}
		
		return $global;
	}
	
	add_filter( 'aperitif_membership_filter_localize_main_js', 'aperitif_membership_localize_main_script_with_google_app_id' );
}

if ( ! function_exists( 'aperitif_membership_include_required_scripts_for_google_social_login' ) ) {
	function aperitif_membership_include_required_scripts_for_google_social_login() {
		if ( aperitif_membership_is_google_social_login_enabled() ) {
			wp_enqueue_script( 'aperitif-membership-google-plus-api', 'https://apis.google.com/js/platform.js', array(), null, false );
		}
	}
	
	add_action( 'aperitif_membership_action_before_main_js', 'aperitif_membership_include_required_scripts_for_google_social_login' );
}

if ( ! function_exists( 'aperitif_membership_init_rest_api_google_login' ) ) {
	function aperitif_membership_init_rest_api_google_login() {
		
		if ( isset( $_GET ) && ! empty( $_GET ) && isset( $_GET['options']['social_response'] ) && ! empty( $_GET['options']['social_response'] ) ) {
			$user_data = $_GET['options']['social_response'];
			$user_email = isset( $user_data['email'] ) && is_email( $user_data['email'] ) ? sanitize_email( $user_data['email'] ) : '';
		
			if ( ! empty ( $user_email ) ) {
				if ( email_exists( $user_email ) ) {
					//User already exist, log in user
					aperitif_membership_login_current_user_by_meta( $user_email );
				} else {
					// Register new user
					$user_meta = array(
						'user_login'            => str_replace( '-', '_', sanitize_title( $user_data['name'] ) ) . '_google',
						'user_email'            => $user_email,
						'user_password'         => $user_data['id'],
						'user_confirm_password' => $user_data['id'],
						'social_login'          => 'google'
					);
					
					aperitif_membership_init_rest_api_register( $user_meta );
				}
			} else {
				qode_framework_get_ajax_status( 'error', esc_html__( 'Email address is invalid.', 'aperitif-membership' ) );
			}
		}
	}
}