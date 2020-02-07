<?php

if ( ! function_exists( 'aperitif_core_dropdown_item_classes' ) ) {
	function aperitif_core_dropdown_item_classes( $classes, $item, $args, $depth ) {
		
		if ( $depth == 0 && in_array( 'menu-item-has-children', $item->classes ) ) {
			$mega_menu   = aperitif_core_get_option_value( 'nav-menu', 'qodef-enable-mega-menu', '', $item->ID );
			$mega_menu_e = is_array( $mega_menu ) && in_array( 'enable', $mega_menu );
			
			if ( $mega_menu_e ) {
				$classes   = array_diff( $classes, array( 'qodef-menu-item--narrow' ) );
				$classes[] = "qodef-menu-item--wide";
				
				add_filter( 'aperitif_core_filter_drop_down_second_inner_classes', function ( $innerClasses ) {
					$grid_class = false;
					$full_width = aperitif_core_get_post_value_through_levels( 'qodef_wide_dropdown_full_width' );
					$grid       = aperitif_core_get_post_value_through_levels( 'qodef_wide_dropdown_content_grid' );
					
					if ( $grid == 'yes' || $full_width == 'no' ) {
						$grid_class = true;
					}
					
					$grid_class = apply_filters( 'aperitif_core_filter_drop_down_grid', $grid_class );
					
					if ( $grid_class ) {
						$innerClasses[] = 'qodef-content-grid';
					}
					
					return $innerClasses;
				} );
			} else {
				
				add_filter( 'aperitif_core_filter_drop_down_second_inner_classes', function ( $innerClasses ) {
					$innerClasses = array_diff( $innerClasses, array( 'qodef-content-grid' ) );
					
					return $innerClasses;
				} );
			}
		}
		
		return $classes;
	}
	
	add_filter( 'nav_menu_css_class', 'aperitif_core_dropdown_item_classes', 11, 4 );
}

if ( ! function_exists( 'aperitif_core_add_nav_menu_body_classes' ) ) {
	function aperitif_core_add_nav_menu_body_classes( $classes ) {
		$full_width = aperitif_core_get_post_value_through_levels( 'qodef_wide_dropdown_full_width' );
		$appearance = aperitif_core_get_post_value_through_levels( 'qodef_dropdown_appearance' );
		
		if ( $full_width == 'yes' ) {
			$classes[] = 'qodef-drop-down-second--full-width';
		}
		
		if ( $appearance == 'yes' ) {
			$classes[] = 'qodef-drop-down-second--animate-height';
		}
		
		return $classes;
	}
	
	add_filter( 'body_class', 'aperitif_core_add_nav_menu_body_classes' );
}

if ( ! function_exists( 'aperitif_core_set_nav_menu_typography_styles' ) ) {
	/**
	 * Function that generates p typography styles
	 *
	 * @param $style string
	 *
	 * @return string
	 */
	function aperitif_core_set_nav_menu_typography_styles( $style ) {
		$scope = APERITIF_CORE_OPTIONS_NAME;
		
		$first_lvl_styles       = aperitif_core_get_typography_styles( $scope, 'qodef_nav_1st_lvl' );
		$first_lvl_hover_styles = aperitif_core_get_typography_hover_styles( $scope, 'qodef_nav_1st_lvl' );
		$second_lvl_styles      = aperitif_core_get_typography_styles( $scope, 'qodef_nav_2nd_lvl' );
		$second_lvl_wide_styles = aperitif_core_get_typography_styles( $scope, 'qodef_nav_2nd_lvl_wide' );
		$third_lvl_wide_styles  = aperitif_core_get_typography_styles( $scope, 'qodef_nav_3rd_lvl_wide' );
		
		if ( ! empty( $first_lvl_styles ) ) {
			$style .= qode_framework_dynamic_style( '.qodef-header-navigation>ul>li>a', $first_lvl_styles );
		}
		
		if ( ! empty( $first_lvl_hover_styles ) ) {
			$style .= qode_framework_dynamic_style( '.qodef-header-navigation>ul>li:hover>a', $first_lvl_hover_styles );
		}
		
		if ( ! empty( $second_lvl_styles ) ) {
			$style .= qode_framework_dynamic_style( '.qodef-menu-item--narrow .qodef-drop-down-second ul li a', $second_lvl_styles );
		}
		
		if ( ! empty( $second_lvl_wide_styles ) ) {
			$style .= qode_framework_dynamic_style( '.qodef-menu-item--wide .qodef-drop-down-second .qodef-drop-down-second-inner > ul > li > a', $second_lvl_wide_styles );
		}
		
		if ( ! empty( $third_lvl_wide_styles ) ) {
			$style .= qode_framework_dynamic_style( '.qodef-menu-item--wide .qodef-drop-down-second ul li ul li a', $third_lvl_wide_styles );
		}
		
		$first_lvl_active_color = aperitif_core_get_option_value( 'admin', 'qodef_nav_1st_lvl_active_color' );
		
		if ( ! empty( $first_lvl_active_color ) ) {
			$first_lvl_active_styles = array(
				'color' => $first_lvl_active_color
			);
			
			$style .= qode_framework_dynamic_style( array(
				'.qodef-header-navigation > ul >li.current-menu-ancestor > a',
				'.qodef-header-navigation > ul >li.current-menu-item > a'
			), $first_lvl_active_styles );
		}
		
		$second_lvl_active_color = aperitif_core_get_option_value( 'admin', 'qodef_nav_2nd_lvl_active_color' );
		
		if ( ! empty( $second_lvl_active_color ) ) {
			$second_lvl_active_styles = array(
				'color' => $second_lvl_active_color
			);
			
			$style .= qode_framework_dynamic_style( array(
				'.qodef-menu-item--narrow .qodef-drop-down-second ul li.current-menu-ancestor > a',
				'.qodef-menu-item--narrow .qodef-drop-down-second ul li.current-menu-item > a'
			), $second_lvl_active_styles );
		}
		
		$second_lvl_wide_active_color = aperitif_core_get_option_value( 'admin', 'qodef_nav_2nd_lvl_wide_active_color' );
		
		if ( ! empty( $second_lvl_wide_active_color ) ) {
			$second_lvl_wide_active_styles = array(
				'color' => $second_lvl_wide_active_color
			);
			
			$style .= qode_framework_dynamic_style( array(
				'.qodef-menu-item--wide .qodef-drop-down-second .qodef-drop-down-second-inner > ul > li.current-menu-ancestor > a',
				'.qodef-menu-item--wide .qodef-drop-down-second .qodef-drop-down-second-inner > ul > li.current-menu-item > a'
			), $second_lvl_wide_active_styles );
		}
		
		$third_lvl_wide_active_color = aperitif_core_get_option_value( 'admin', 'qodef_nav_3rd_lvl_wide_active_color' );
		
		if ( ! empty( $third_lvl_wide_active_color ) ) {
			$third_lvl_wide_active_styles = array(
				'color' => $third_lvl_wide_active_color
			);
			
			$style .= qode_framework_dynamic_style( array(
				'.qodef-menu-item--wide .qodef-drop-down-second ul li ul li.current-menu-ancestor > a',
				'.qodef-menu-item--wide .qodef-drop-down-second ul li ul li.current-menu-item > a'
			), $third_lvl_wide_active_styles );
		}
		
		return $style;
	}
	
	add_filter( 'aperitif_filter_add_inline_style', 'aperitif_core_set_nav_menu_typography_styles' );
}
if ( ! function_exists( 'aperitif_core_nav_menu_general_styles' ) ) {
	function aperitif_core_nav_menu_general_styles( $style ) {
		$styles           = array();
		$background_image = aperitif_core_get_option_value( 'admin', 'qodef_nav_menu_background_image' );
		
		if ( ! empty( $background_image ) ) {
			$styles['background-image'] = 'url(' . esc_url( wp_get_attachment_image_url( $background_image, 'full' ) ) . ')';
		}
		
		if ( ! empty( $styles ) ) {
			$style .= qode_framework_dynamic_style( '.qodef-header-navigation .qodef-menu-item--narrow .qodef-drop-down-second > .qodef-drop-down-second-inner ul', $styles );
		}
		
		return $style;
		
	}
	
	add_filter( 'aperitif_filter_add_inline_style', 'aperitif_core_nav_menu_general_styles' );
	
}
if ( ! function_exists( 'aperitif_core_nav_menu_wide_general_styles' ) ) {
	function aperitif_core_nav_menu_wide_general_styles( $style ) {
		$styles           = array();
		$background_image = aperitif_core_get_option_value( 'admin', 'qodef_nav_menu_background_image' );
		
		if ( ! empty( $background_image ) ) {
			$styles['background-image'] = 'url(' . esc_url( wp_get_attachment_image_url( $background_image, 'full' ) ) . ')';
			$styles['background-size']  = 'cover';
		}
		
		if ( ! empty( $styles ) ) {
			$style .= qode_framework_dynamic_style( '.qodef-header-navigation .qodef-menu-item--wide .qodef-drop-down-second', $styles );
		}
		
		return $style;
		
	}
	
	add_filter( 'aperitif_filter_add_inline_style', 'aperitif_core_nav_menu_wide_general_styles' );
	
}