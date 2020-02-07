<?php

if ( ! function_exists( 'aperitif_core_add_standard_mobile_header_global_option' ) ) {
	/**
	 * This function set header type value for global header option map
	 */
	function aperitif_core_add_standard_mobile_header_global_option( $header_layout_options ) {
		$header_layout_options['standard'] = array(
			'image' => APERITIF_CORE_HEADER_LAYOUTS_URL_PATH . '/standard/assets/img/standard-header.png',
			'label' => esc_html__( 'Standard', 'aperitif-core' )
		);
		
		return $header_layout_options;
	}
	
	add_filter( 'aperitif_core_filter_mobile_header_layout_option', 'aperitif_core_add_standard_mobile_header_global_option' );
}

if ( ! function_exists( 'aperitif_core_register_standard_mobile_header_layout' ) ) {
	function aperitif_core_register_standard_mobile_header_layout( $mobile_header_layouts ) {
		$mobile_header_layout = array(
			'standard' => 'StandardMobileHeader'
		);
		
		$mobile_header_layouts = array_merge( $mobile_header_layouts, $mobile_header_layout );
		
		return $mobile_header_layouts;
	}
	
	add_filter( 'aperitif_core_filter_register_mobile_header_layouts', 'aperitif_core_register_standard_mobile_header_layout' );
}

if ( ! function_exists( 'aperitif_core_standard_mobile_header_general_styles' ) ) {
	function aperitif_core_standard_mobile_header_general_styles( $style ) {
		$styles           = array();
		$background_image = aperitif_core_get_option_value( 'admin', 'qodef_standard_mobile_header_background_image' );
		
		if ( ! empty( $background_image ) ) {
			$styles['background-image'] = 'url(' . esc_url( wp_get_attachment_image_url( $background_image, 'full' ) ) . ')';
		}
		
		if ( ! empty( $styles ) ) {
			$style .= qode_framework_dynamic_style( '#qodef-mobile-header-navigation .qodef-m-inner', $styles );
		}
		
		return $style;
		
	}
	
	add_filter( 'aperitif_filter_add_inline_style', 'aperitif_core_standard_mobile_header_general_styles' );
	
}