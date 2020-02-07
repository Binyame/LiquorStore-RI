<?php

if ( ! function_exists( 'aperitif_core_add_minimal_mobile_header_global_option' ) ) {
	/**
	 * This function set header type value for global header option map
	 */
	function aperitif_core_add_minimal_mobile_header_global_option( $header_layout_options ) {
		$header_layout_options['minimal'] = array(
			'image' => APERITIF_CORE_HEADER_LAYOUTS_URL_PATH . '/minimal/assets/img/minimal-header.png',
			'label' => esc_html__( 'Minimal', 'aperitif-core' )
		);
		
		return $header_layout_options;
	}
	
	add_filter( 'aperitif_core_filter_mobile_header_layout_option', 'aperitif_core_add_minimal_mobile_header_global_option' );
}

if ( ! function_exists( 'aperitif_core_register_minimal_mobile_header_layout' ) ) {
	function aperitif_core_register_minimal_mobile_header_layout( $mobile_header_layouts ) {
		$mobile_header_layout = array(
			'minimal' => 'MinimalMobileHeader'
		);
		
		$mobile_header_layouts = array_merge( $mobile_header_layouts, $mobile_header_layout );
		
		return $mobile_header_layouts;
	}
	
	add_filter( 'aperitif_core_filter_register_mobile_header_layouts', 'aperitif_core_register_minimal_mobile_header_layout' );
}

if ( ! function_exists( 'aperitif_core_get_mobile_header_logo_light_image' ) ) {
	function aperitif_core_get_mobile_header_logo_light_image() {
		$logo_height         = aperitif_core_get_post_value_through_levels( 'qodef_logo_height' );
		$logo_dark_image_id  = aperitif_core_get_post_value_through_levels( 'qodef_logo_dark' );
		$logo_light_image_id = aperitif_core_get_post_value_through_levels( 'qodef_logo_light' );
		$customizer_logo     = aperitif_core_get_customizer_logo();
		
		$parameters = array(
			'logo_height'      => ! empty( $logo_height ) ? 'height:' . intval( $logo_height ) . 'px' : '',
			'logo_dark_image'  => '',
			'logo_light_image' => '',
		);
		
		if ( ! empty( $logo_dark_image_id ) ) {
			$logo_dark_image_attr = array(
				'class'    => 'qodef-header-logo-image qodef--dark',
				'itemprop' => 'image',
				'alt'      => esc_attr__( 'logo dark', 'aperitif-core' )
			);
			
			$image      = wp_get_attachment_image( $logo_light_image_id, 'full', false, $logo_dark_image_attr );
			$image_html = ! empty( $image ) ? $image : qode_framework_get_image_html_from_src( $logo_dark_image_id, $logo_dark_image_attr );
			
			$parameters['logo_dark_image'] = $image_html;
		}
		
		if ( ! empty( $logo_light_image_id ) ) {
			$logo_light_image_attr = array(
				'class'    => 'qodef-header-logo-image qodef--light',
				'itemprop' => 'image',
				'alt'      => esc_attr__( 'logo light', 'aperitif-core' )
			);
			
			$image      = wp_get_attachment_image( $logo_light_image_id, 'full', false, $logo_light_image_attr );
			$image_html = ! empty( $image ) ? $image : qode_framework_get_image_html_from_src( $logo_light_image_id, $logo_light_image_attr );
			
			$parameters['logo_light_image'] = $image_html;
		}
		
		if ( ! empty( $logo_dark_image_id ) || ! empty( $logo_light_image_id ) ) {
			aperitif_core_template_part( 'mobile-header/layouts/minimal/templates', 'parts/mobile-logo-light-dark', '', $parameters );
		} else if ( ! empty( $customizer_logo ) ) {
			echo qode_framework_wp_kses_html( 'html', $customizer_logo );
		}
	}
	
	add_action( 'aperitif_core_after_mobile_header_logo_image', 'aperitif_core_get_mobile_header_logo_light_image' );
}