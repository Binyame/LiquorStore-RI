<?php

if ( ! function_exists( 'aperitif_core_set_general_typography_styles' ) ) {
	/**
	 * Function that generates p typography styles
	 *
	 * @param $style string
	 *
	 * @return string
	 */
	function aperitif_core_set_general_typography_styles( $style ) {
		$scope = APERITIF_CORE_OPTIONS_NAME;
		
		$p_styles          = aperitif_core_get_typography_styles( $scope, 'qodef_p' );
		$h1_styles         = aperitif_core_get_typography_styles( $scope, 'qodef_h1' );
		$h2_styles         = aperitif_core_get_typography_styles( $scope, 'qodef_h2' );
		$h3_styles         = aperitif_core_get_typography_styles( $scope, 'qodef_h3' );
		$h4_styles         = aperitif_core_get_typography_styles( $scope, 'qodef_h4' );
		$h5_styles         = aperitif_core_get_typography_styles( $scope, 'qodef_h5' );
		$h6_styles         = aperitif_core_get_typography_styles( $scope, 'qodef_h6' );
		$link_styles       = aperitif_core_get_typography_styles( $scope, 'qodef_link' );
		$link_hover_styles = aperitif_core_get_typography_hover_styles( $scope, 'qodef_link' );
		
		if ( ! empty( $p_styles ) ) {
			$style .= qode_framework_dynamic_style( 'p', $p_styles );
		}
		
		if ( ! empty( $h1_styles ) ) {
			$style .= qode_framework_dynamic_style( 'h1', $h1_styles );
		}
		
		if ( ! empty( $h2_styles ) ) {
			$style .= qode_framework_dynamic_style( 'h2', $h2_styles );
		}
		
		if ( ! empty( $h3_styles ) ) {
			$style .= qode_framework_dynamic_style( 'h3', $h3_styles );
		}
		
		if ( ! empty( $h4_styles ) ) {
			$style .= qode_framework_dynamic_style( 'h4', $h4_styles );
		}
		
		if ( ! empty( $h5_styles ) ) {
			$style .= qode_framework_dynamic_style( 'h5', $h5_styles );
		}
		
		if ( ! empty( $h6_styles ) ) {
			$style .= qode_framework_dynamic_style( 'h6', $h6_styles );
		}
		
		if ( ! empty( $link_styles ) ) {
			$style .= qode_framework_dynamic_style( array( 'a', 'p a' ), $link_styles );
		}
		
		if ( ! empty( $link_hover_styles ) ) {
			$style .= qode_framework_dynamic_style( array( 'a:hover', 'p a:hover' ), $link_hover_styles );
		}
		
		return $style;
	}
	
	add_filter( 'aperitif_filter_add_inline_style', 'aperitif_core_set_general_typography_styles' );
}

if ( ! function_exists( 'aperitif_core_set_general_typography_responsive_1024_styles' ) ) {
	/**
	 * Function that generates p typography styles
	 *
	 * @param $style string
	 *
	 * @return string
	 */
	function aperitif_core_set_general_typography_responsive_1024_styles( $style ) {
		$scope = APERITIF_CORE_OPTIONS_NAME;
		
		$p_styles  = aperitif_core_get_typography_styles( $scope, 'qodef_p_responsive_1024' );
		$h1_styles = aperitif_core_get_typography_styles( $scope, 'qodef_h1_responsive_1024' );
		$h2_styles = aperitif_core_get_typography_styles( $scope, 'qodef_h2_responsive_1024' );
		$h3_styles = aperitif_core_get_typography_styles( $scope, 'qodef_h3_responsive_1024' );
		$h4_styles = aperitif_core_get_typography_styles( $scope, 'qodef_h4_responsive_1024' );
		$h5_styles = aperitif_core_get_typography_styles( $scope, 'qodef_h5_responsive_1024' );
		$h6_styles = aperitif_core_get_typography_styles( $scope, 'qodef_h6_responsive_1024' );
		
		if ( ! empty( $p_styles ) ) {
			$style .= qode_framework_dynamic_style( 'p', $p_styles );
		}
		
		if ( ! empty( $h1_styles ) ) {
			$style .= qode_framework_dynamic_style( 'h1', $h1_styles );
		}
		
		if ( ! empty( $h2_styles ) ) {
			$style .= qode_framework_dynamic_style( 'h2', $h2_styles );
		}
		
		if ( ! empty( $h3_styles ) ) {
			$style .= qode_framework_dynamic_style( 'h3', $h3_styles );
		}
		
		if ( ! empty( $h4_styles ) ) {
			$style .= qode_framework_dynamic_style( 'h4', $h4_styles );
		}
		
		if ( ! empty( $h5_styles ) ) {
			$style .= qode_framework_dynamic_style( 'h5', $h5_styles );
		}
		
		if ( ! empty( $h6_styles ) ) {
			$style .= qode_framework_dynamic_style( 'h6', $h6_styles );
		}
		
		return $style;
	}
	
	add_filter( 'aperitif_core_filter_add_responsive_1024_inline_style', 'aperitif_core_set_general_typography_responsive_1024_styles' );
}

if ( ! function_exists( 'aperitif_core_set_general_typography_responsive_768_styles' ) ) {
	/**
	 * Function that generates p typography styles
	 *
	 * @param $style string
	 *
	 * @return string
	 */
	function aperitif_core_set_general_typography_responsive_768_styles( $style ) {
		$scope = APERITIF_CORE_OPTIONS_NAME;
		
		$p_styles  = aperitif_core_get_typography_styles( $scope, 'qodef_p_responsive_768' );
		$h1_styles = aperitif_core_get_typography_styles( $scope, 'qodef_h1_responsive_768' );
		$h2_styles = aperitif_core_get_typography_styles( $scope, 'qodef_h2_responsive_768' );
		$h3_styles = aperitif_core_get_typography_styles( $scope, 'qodef_h3_responsive_768' );
		$h4_styles = aperitif_core_get_typography_styles( $scope, 'qodef_h4_responsive_768' );
		$h5_styles = aperitif_core_get_typography_styles( $scope, 'qodef_h5_responsive_768' );
		$h6_styles = aperitif_core_get_typography_styles( $scope, 'qodef_h6_responsive_768' );
		
		if ( ! empty( $p_styles ) ) {
			$style .= qode_framework_dynamic_style( 'p', $p_styles );
		}
		
		if ( ! empty( $h1_styles ) ) {
			$style .= qode_framework_dynamic_style( 'h1', $h1_styles );
		}
		
		if ( ! empty( $h2_styles ) ) {
			$style .= qode_framework_dynamic_style( 'h2', $h2_styles );
		}
		
		if ( ! empty( $h3_styles ) ) {
			$style .= qode_framework_dynamic_style( 'h3', $h3_styles );
		}
		
		if ( ! empty( $h4_styles ) ) {
			$style .= qode_framework_dynamic_style( 'h4', $h4_styles );
		}
		
		if ( ! empty( $h5_styles ) ) {
			$style .= qode_framework_dynamic_style( 'h5', $h5_styles );
		}
		
		if ( ! empty( $h6_styles ) ) {
			$style .= qode_framework_dynamic_style( 'h6', $h6_styles );
		}
		
		return $style;
	}
	
	add_filter( 'aperitif_core_filter_add_responsive_768_1024_inline_style', 'aperitif_core_set_general_typography_responsive_768_styles' );
}

if ( ! function_exists( 'aperitif_core_set_general_typography_responsive_680_styles' ) ) {
	/**
	 * Function that generates p typography styles
	 *
	 * @param $style string
	 *
	 * @return string
	 */
	function aperitif_core_set_general_typography_responsive_680_styles( $style ) {
		$scope = APERITIF_CORE_OPTIONS_NAME;
		
		$p_styles  = aperitif_core_get_typography_styles( $scope, 'qodef_p_responsive_680' );
		$h1_styles = aperitif_core_get_typography_styles( $scope, 'qodef_h1_responsive_680' );
		$h2_styles = aperitif_core_get_typography_styles( $scope, 'qodef_h2_responsive_680' );
		$h3_styles = aperitif_core_get_typography_styles( $scope, 'qodef_h3_responsive_680' );
		$h4_styles = aperitif_core_get_typography_styles( $scope, 'qodef_h4_responsive_680' );
		$h5_styles = aperitif_core_get_typography_styles( $scope, 'qodef_h5_responsive_680' );
		$h6_styles = aperitif_core_get_typography_styles( $scope, 'qodef_h6_responsive_680' );
		
		if ( ! empty( $p_styles ) ) {
			$style .= qode_framework_dynamic_style( 'p', $p_styles );
		}
		
		if ( ! empty( $h1_styles ) ) {
			$style .= qode_framework_dynamic_style( 'h1', $h1_styles );
		}
		
		if ( ! empty( $h2_styles ) ) {
			$style .= qode_framework_dynamic_style( 'h2', $h2_styles );
		}
		
		if ( ! empty( $h3_styles ) ) {
			$style .= qode_framework_dynamic_style( 'h3', $h3_styles );
		}
		
		if ( ! empty( $h4_styles ) ) {
			$style .= qode_framework_dynamic_style( 'h4', $h4_styles );
		}
		
		if ( ! empty( $h5_styles ) ) {
			$style .= qode_framework_dynamic_style( 'h5', $h5_styles );
		}
		
		if ( ! empty( $h6_styles ) ) {
			$style .= qode_framework_dynamic_style( 'h6', $h6_styles );
		}
		
		return $style;
	}
	
	add_filter( 'aperitif_core_filter_add_responsive_680_inline_style', 'aperitif_core_set_general_typography_responsive_680_styles' );
}