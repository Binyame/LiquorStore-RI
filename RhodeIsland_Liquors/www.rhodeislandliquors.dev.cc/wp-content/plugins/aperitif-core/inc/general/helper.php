<?php

if ( ! function_exists( 'aperitif_core_is_boxed_enabled' ) ) {
	function aperitif_core_is_boxed_enabled() {
		return aperitif_core_get_post_value_through_levels( 'qodef_boxed' ) === 'yes';
	}
}

if ( ! function_exists( 'aperitif_core_is_passepartout_enabled' ) ) {
	function aperitif_core_is_passepartout_enabled() {
		return aperitif_core_get_post_value_through_levels( 'qodef_passepartout' ) === 'yes';
	}
}

if ( ! function_exists( 'aperitif_core_add_general_options_body_classes' ) ) {
	function aperitif_core_add_general_options_body_classes( $classes ) {
		$content_width         = aperitif_core_get_post_value_through_levels( 'qodef_content_width' );
		$content_behind_header = aperitif_core_get_post_value_through_levels( 'qodef_content_behind_header' );
		
		$classes[] = aperitif_core_is_boxed_enabled() ? 'qodef--boxed' : '';
		$classes[] = 'qodef-content-grid-' . $content_width;
		$classes[] = $content_behind_header == 'yes' ? 'qodef-content-behind-header' : '';
		$classes[] = aperitif_core_is_passepartout_enabled() ? 'qodef--passepartout' : '';
		
		return $classes;
	}
	
	add_filter( 'body_class', 'aperitif_core_add_general_options_body_classes' );
}

if ( ! function_exists( 'aperitif_core_add_boxed_wrapper_classes' ) ) {
	function aperitif_core_add_boxed_wrapper_classes( $classes ) {
		
		if ( aperitif_core_is_boxed_enabled() ) {
			$classes .= ' qodef-content-grid';
		}
		
		return $classes;
	}
	
	add_filter( 'aperitif_filter_page_wrapper_classes', 'aperitif_core_add_boxed_wrapper_classes' );
}

if ( ! function_exists( 'aperitif_core_set_general_styles' ) ) {
	/**
	 * Function that generates general inline styles
	 *
	 * @param $style string
	 *
	 * @return string
	 */
	function aperitif_core_set_general_styles( $style ) {
		$styles = array();
		
		$background_color      = aperitif_core_get_post_value_through_levels( 'qodef_page_background_color' );
		$background_image      = aperitif_core_get_post_value_through_levels( 'qodef_page_background_image' );
		$background_repeat     = aperitif_core_get_post_value_through_levels( 'qodef_page_background_repeat' );
		$background_size       = aperitif_core_get_post_value_through_levels( 'qodef_page_background_size' );
		$background_attachment = aperitif_core_get_post_value_through_levels( 'qodef_page_background_attachment' );
		
		if ( ! empty( $background_color ) ) {
			$styles['background-color'] = $background_color;
		}
		
		if ( ! empty( $background_image ) ) {
			$styles['background-image'] = 'url(' . esc_url( wp_get_attachment_image_url( $background_image, 'full' ) ) . ')';
		}
		
		if ( ! empty( $background_repeat ) ) {
			$styles['background-repeat'] = $background_repeat;
		}
		
		if ( ! empty( $background_size ) ) {
			$styles['background-size'] = $background_size;
		}
		
		if ( ! empty( $background_attachment ) ) {
			$styles['background-attachment'] = $background_attachment;
		}
		
		if ( ! empty( $styles ) && ! aperitif_core_is_passepartout_enabled() ) {
			$style .= qode_framework_dynamic_style( 'body', $styles );
		} else {
			$style .= qode_framework_dynamic_style( '.qodef--passepartout #qodef-page-wrapper', $styles );
		}
		
		if ( aperitif_core_is_boxed_enabled() ) {
			$boxed_styles = array();
			
			$boxed_background_color = aperitif_core_get_post_value_through_levels( 'qodef_boxed_background_color' );
			
			if ( ! empty( $boxed_background_color ) ) {
				$boxed_styles['background-color'] = $boxed_background_color;
			}
			
			if ( ! empty( $boxed_styles ) ) {
				$style .= qode_framework_dynamic_style( '.qodef--boxed #qodef-page-wrapper', $boxed_styles );
			}
		}
		
		if ( aperitif_core_is_passepartout_enabled() ) {
			$passepartout_styles            = array();
			$passepartout_responsive_styles = array();
			$passepartout_details_padding   = array();
			$passepartout_details_border    = array();
			
			$passepartout_color           = aperitif_core_get_post_value_through_levels( 'qodef_passepartout_color' );
			$passepartout_image           = aperitif_core_get_post_value_through_levels( 'qodef_passepartout_image' );
			$passepartout_size            = aperitif_core_get_post_value_through_levels( 'qodef_passepartout_size' );
			$passepartout_size_responsive = aperitif_core_get_post_value_through_levels( 'qodef_passepartout_size_responsive' );
			$passepartout_details         = aperitif_core_get_post_value_through_levels( 'qodef_passepartout_details' );
			
			if ( ! empty( $passepartout_color ) ) {
				$passepartout_styles['background-color'] = $passepartout_color;
			}
			
			if ( ! empty( $passepartout_image ) ) {
				$passepartout_styles['background-image'] = 'url(' . esc_url( wp_get_attachment_image_url( $passepartout_image, 'full' ) ) . ')';
			}
			
			if ( ! empty( $passepartout_size ) ) {
				if ( qode_framework_string_ends_with( $passepartout_size, 'px' ) || qode_framework_string_ends_with( $passepartout_size, '%' ) ) {
					$passepartout_styles['padding'] = $passepartout_size;
				} else {
					$passepartout_styles['padding'] = intval( $passepartout_size ) . 'px';
				}
			}
			
			if ( ! empty( $passepartout_size_responsive ) ) {
				if ( qode_framework_string_ends_with( $passepartout_size_responsive, 'px' ) || qode_framework_string_ends_with( $passepartout_size_responsive, '%' ) ) {
					$passepartout_responsive_styles['padding'] = $passepartout_size_responsive;
				} else {
					$passepartout_responsive_styles['padding'] = intval( $passepartout_size_responsive ) . 'px';
				}
			}
			
			if ( $passepartout_details === 'yes' ) {
				$passepartout_details_padding['padding'] = '5px';
				$passepartout_details_border['border']   = '1px solid #dfdede';
			}
			
			if ( ! empty( $passepartout_styles ) ) {
				$style .= qode_framework_dynamic_style( '.qodef--passepartout', $passepartout_styles );
			}
			
			if ( ! empty( $passepartout_responsive_styles ) ) {
				$style .= qode_framework_dynamic_style_responsive( '.qodef--passepartout', $passepartout_responsive_styles, '', '1024' );
			}
			
			if ( ! empty( $passepartout_details_padding ) ) {
				$style .= qode_framework_dynamic_style( '.qodef--passepartout #qodef-page-wrapper', $passepartout_details_padding );
			}
			
			if ( ! empty( $passepartout_details_border ) ) {
				$style .= qode_framework_dynamic_style( '.qodef--passepartout #qodef-page-wrapper-inner', $passepartout_details_border );
			}
		}
		
		$page_content_style = array();
		
		$page_content_padding = aperitif_core_get_post_value_through_levels( 'qodef_page_content_padding' );
		if ( ! empty ( $page_content_padding ) ) {
			$page_content_style['padding'] = $page_content_padding;
		}
		
		if ( ! empty( $page_content_style ) ) {
			$style .= qode_framework_dynamic_style( '#qodef-page-inner', $page_content_style );
		}
		
		$page_content_style_mobile = array();
		
		$page_content_padding_mobile = aperitif_core_get_post_value_through_levels( 'qodef_page_content_padding_mobile' );
		if ( ! empty ( $page_content_padding_mobile ) ) {
			$page_content_style_mobile['padding'] = $page_content_padding_mobile;
		}
		
		if ( ! empty( $page_content_style_mobile ) ) {
			$style .= qode_framework_dynamic_style_responsive( '#qodef-page-inner', $page_content_style_mobile, '', '1024' );
		}
		
		return $style;
	}
	
	add_filter( 'aperitif_filter_add_inline_style', 'aperitif_core_set_general_styles' );
}

if ( ! function_exists( 'aperitif_core_set_general_main_color_styles' ) ) {
	/**
	 * Function that generates general main color inline styles
	 *
	 * @param $style string
	 *
	 * @return string
	 */
	function aperitif_core_set_general_main_color_styles( $style ) {
		$main_color = aperitif_core_get_post_value_through_levels( 'qodef_main_color' );
		
		if ( ! empty( $main_color ) ) {
			
			// Include main color selectors
			include_once 'main-color/main-color.php';
			
			$allowed_selectors = array(
				'color',
				'color_important',
				'background_color',
				'background_color_important',
				'border_color',
				'border_color_important',
				'fill_color',
				'fill_color_important',
				'stroke_color',
				'stroke_color_important',
			);
			
			foreach ( $allowed_selectors as $allowed_selector ) {
				$selector = $allowed_selector . '_selector';
				
				if ( isset( $$selector ) && ! empty( $$selector ) ) {
					
					if ( strpos( $selector, '_important' ) !== false ) {
						$attribute = str_replace( '_important', '', $allowed_selector );
						$color     = $main_color . '!important';
					} else {
						$attribute = $allowed_selector;
						$color     = $main_color;
					}
					
					$style .= qode_framework_dynamic_style( $$selector, array( str_replace( '_', '-', $attribute ) => $color ) );
				}
			}
		}
		
		return $style;
	}
	
	add_filter( 'aperitif_filter_add_inline_style', 'aperitif_core_set_general_main_color_styles' );
}

if ( ! function_exists( 'aperitif_core_set_general_main_color_hover_styles' ) ) {
	/**
	 * Function that generates general main color inline styles
	 *
	 * @param $style string
	 *
	 * @return string
	 */
	function aperitif_core_set_general_main_color_hover_styles( $style ) {
		$main_color_hover = aperitif_core_get_post_value_through_levels( 'qodef_main_color_hover' );
		
		if ( ! empty( $main_color_hover ) ) {
			
			// Include main color hover selectors
			include_once 'main-color/main-color-hover.php';
			
			$allowed_selectors = array(
				'color',
				'color_important',
				'background_color',
				'background_color_important',
				'border_color',
				'border_color_important',
				'fill_color',
				'fill_color_important',
				'stroke_color',
				'stroke_color_important',
			);
			
			foreach ( $allowed_selectors as $allowed_selector ) {
				$selector = $allowed_selector . '_selector';
				
				if ( isset( $$selector ) && ! empty( $$selector ) ) {
					
					if ( strpos( $selector, '_important' ) !== false ) {
						$attribute = str_replace( '_important', '', $allowed_selector );
						$color     = $main_color_hover . '!important';
					} else {
						$attribute = $allowed_selector;
						$color     = $main_color_hover;
					}
					
					$style .= qode_framework_dynamic_style( $$selector, array( str_replace( '_', '-', $attribute ) => $color ) );
				}
			}
		}
		
		return $style;
	}
	
	add_filter( 'aperitif_filter_add_inline_style', 'aperitif_core_set_general_main_color_hover_styles' );
}