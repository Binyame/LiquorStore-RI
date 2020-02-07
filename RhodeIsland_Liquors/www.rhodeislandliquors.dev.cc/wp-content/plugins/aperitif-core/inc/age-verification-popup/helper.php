<?php

if ( ! function_exists( 'aperitif_core_get_age_verification_popup' ) ) {
	/**
	 * Loads age-verification HTML
	 */
	function aperitif_core_get_age_verification_popup() {
		if ( aperitif_core_get_post_value_through_levels( 'qodef_enable_age_verification_popup' ) === 'yes' ) {
			aperitif_core_load_age_verification_popup_template();
		}
	}
	
	// Get age-verification HTML
	add_action( 'aperitif_action_before_page_header', 'aperitif_core_get_age_verification_popup' );
}

if ( ! function_exists( 'aperitif_core_load_age_verification_popup_template' ) ) {
	/**
	 * Loads HTML template with params
	 */
	function aperitif_core_load_age_verification_popup_template() {
		$params                     = array();
		$params['title']            = aperitif_core_get_option_value( 'admin', 'qodef_age_verification_popup_title' );
		$params['subtitle']         = aperitif_core_get_option_value( 'admin', 'qodef_age_verification_popup_subtitle' );
		$params['note']             = aperitif_core_get_option_value( 'admin', 'qodef_age_verification_popup_note' );
		$params['link']             = aperitif_core_get_option_value( 'admin', 'qodef_age_verification_popup_link' );
		$background_image           = aperitif_core_get_option_value( 'admin', 'qodef_age_verification_popup_background_image' );
		$params['content_style']    = ! empty( $background_image ) ? 'background-image: url(' . esc_url( wp_get_attachment_url( $background_image ) ) . ')' : '';
		$params['prevent_behavior'] = aperitif_core_get_option_value( 'admin', 'qodef_age_verification_popup_prevent_behavior' );

		$holder_classes           = array();
		$holder_classes[]         = ! empty( $params['prevent_behavior'] ) ? 'qodef-avp-prevent-' . $params['prevent_behavior'] : 'qodef-avp-prevent-session';
		$params['holder_classes'] = implode( ' ', $holder_classes );

		echo aperitif_core_get_template_part( 'age-verification-popup', 'templates/age-verification-popup', '', $params );
	}
}