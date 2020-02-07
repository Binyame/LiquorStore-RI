<?php

if ( ! function_exists( 'aperitif_core_get_fullscreen_icon_html' ) ) {
	/**
	 * Returns html for icon sources
	 *
	 * @param bool $is_close_icon
	 *
	 * @return string/html
	 */
	function aperitif_core_get_fullscreen_icon_html( $is_close_icon = false ) {
		$html = '';
		
		$icon_source         = aperitif_core_get_option_value( 'admin', 'qodef_fullscreen_menu_icon_source' );
		$icon_pack           = aperitif_core_get_option_value( 'admin', 'qodef_fullscreen_menu_icon_pack' );
		$icon_svg_path       = aperitif_core_get_option_value( 'admin', 'qodef_fullscreen_menu_icon_svg_path' );
		$close_icon_svg_path = aperitif_core_get_option_value( 'admin', 'qodef_fullscreen_menu_close_icon_svg_path' );
		
		if ( $icon_source === 'icon_pack' && ! empty( $icon_pack ) ) {
			if ( $is_close_icon ) {
				$html .= qode_framework_icons()->get_specific_icon_from_pack( 'close', $icon_pack );
				
			} else {
				$html .= qode_framework_icons()->get_specific_icon_from_pack( 'menu', $icon_pack );
			}
			
		} else if ( $icon_source === 'svg_path' && ( ( isset( $icon_svg_path ) && ! empty( $icon_svg_path ) ) || ( isset( $close_icon_svg_path ) && ! empty( $close_icon_svg_path ) ) ) ) {
			
			if ( $is_close_icon ) {
				$html .= $close_icon_svg_path;
			} else {
				$html .= $icon_svg_path;
			}
			
		} else if ( $icon_source === 'predefined' ) {
			$html .= '<span class="qodef-lines">';
			$html .= '<span class="qodef-line qodef-line-1"></span>';
			$html .= '<span class="qodef-line qodef-line-2"></span>';
			$html .= '<span class="qodef-line qodef-line-3"></span>';
			$html .= '</span>';
		}
		
		return $html;
	}
}
if ( ! function_exists( 'aperitif_core_fullscreen_menu_general_styles' ) ) {
	function aperitif_core_fullscreen_menu_general_styles( $style ) {
		$styles           = array();
		$background_image = aperitif_core_get_option_value( 'admin', 'qodef_fullscreen_menu_background_image' );
		
		if ( ! empty( $background_image ) ) {
			$styles['background-image'] = 'url(' . esc_url( wp_get_attachment_image_url( $background_image, 'full' ) ) . ')';
		}
		
		if ( ! empty( $styles ) ) {
			$style .= qode_framework_dynamic_style( '.qodef-fullscreen-menu-holder', $styles );
		}
		
		return $style;
		
	}
	
	add_filter( 'aperitif_filter_add_inline_style', 'aperitif_core_fullscreen_menu_general_styles' );
	
}

if ( ! function_exists( 'aperitif_core_register_fullscreen_menu' ) ) {
	function aperitif_core_register_fullscreen_menu( $menus ) {
		
		$menus['fullscreen-menu-navigation'] = esc_html__( 'Fullscreen Navigation', 'aperitif-core' );
		
		return $menus;
	}
	
	add_filter( 'aperitif_filter_register_navigation_menus', 'aperitif_core_register_fullscreen_menu' );
}