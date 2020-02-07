<?php

if ( ! function_exists( 'aperitif_core_get_search_icon_html' ) ) {
	/**
	 * Returns html for icon sources
	 *
	 * @param bool $is_close_icon
	 *
	 * @return string/html
	 */
	function aperitif_core_get_search_icon_html( $is_close_icon = false ) {
		$html = '';
		
		$icon_source         = aperitif_core_get_option_value( 'admin', 'qodef_search_icon_source' );
		$icon_pack           = aperitif_core_get_option_value( 'admin', 'qodef_search_icon_pack' );
		$icon_svg_path       = aperitif_core_get_option_value( 'admin', 'qodef_search_icon_svg_path' );
		$close_icon_svg_path = aperitif_core_get_option_value( 'admin', 'qodef_search_close_icon_svg_path' );
		
		if ( $icon_source === 'icon_pack' && isset( $icon_pack ) ) {
			if ( $is_close_icon ) {
				$html .= qode_framework_icons()->get_specific_icon_from_pack( 'close', $icon_pack );
			} else {
				$html .= qode_framework_icons()->get_specific_icon_from_pack( 'search', $icon_pack );
			}
		} else if ( ( isset( $icon_svg_path ) && ! empty( $icon_svg_path ) ) || ( isset( $close_icon_svg_path ) && ! empty( $close_icon_svg_path ) ) ) {
			if ( $is_close_icon ) {
				$html .= $close_icon_svg_path;
			} else {
				$html .= $icon_svg_path;
			}
		}
		
		return $html;
	}
}