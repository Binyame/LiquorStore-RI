<?php

/**
 * Change path for overridden templates
 */
if ( function_exists( 'vc_set_shortcodes_templates_dir' ) ) {
	$dir = APERITIF_CORE_INC_PATH . '/wpbakery/templates';
	vc_set_shortcodes_templates_dir( $dir );
}

if ( ! function_exists( 'aperitif_core_vc_row_map' ) ) {
	/**
	 * Map VC Row shortcode
	 * Hooks on vc_after_init action
	 */
	function aperitif_core_vc_row_map() {
		
		/******* VC Row shortcode - begin *******/
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'dropdown',
				'param_name' => 'row_content_width',
				'heading'    => esc_html__( 'Row Content Width', 'aperitif-core' ),
				'value'      => array(
					esc_html__( 'Full Width', 'aperitif-core' ) => 'full-width',
					esc_html__( 'In Grid', 'aperitif-core' )    => 'grid'
				),
				'group'      => esc_html__( 'Aperitif Core Settings', 'aperitif-core' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'dropdown',
				'param_name' => 'content_text_alignment',
				'heading'    => esc_html__( 'Content Alignment', 'aperitif-core' ),
				'value'      => array(
					esc_html__( 'Default', 'aperitif-core' ) => '',
					esc_html__( 'Left', 'aperitif-core' )    => 'left',
					esc_html__( 'Center', 'aperitif-core' )  => 'center',
					esc_html__( 'Right', 'aperitif-core' )   => 'right'
				),
				'group'      => esc_html__( 'Aperitif Core Settings', 'aperitif-core' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'dropdown',
				'param_name' => 'custom_border',
				'heading'    => esc_html__( 'Custom Border', 'aperitif-core' ),
				'value'      => array(
					esc_html__( 'Default', 'aperitif-core' ) => '',
					esc_html__( 'Yes', 'aperitif-core' )     => 'yes',
					esc_html__( 'No', 'aperitif-core' )      => 'no',
				),
				'group'      => esc_html__( 'Aperitif Core Settings', 'aperitif-core' )
			)
		);
		
		do_action( 'aperitif_core_action_additional_vc_row_params' );
		
		/******* VC Row shortcode - end *******/
		
		/******* VC Row Inner shortcode - begin *******/
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'       => 'dropdown',
				'param_name' => 'row_content_width',
				'heading'    => esc_html__( 'Row Content Width', 'aperitif-core' ),
				'value'      => array(
					esc_html__( 'Full Width', 'aperitif-core' ) => 'full-width',
					esc_html__( 'In Grid', 'aperitif-core' )    => 'grid'
				),
				'group'      => esc_html__( 'Aperitif Core Settings', 'aperitif-core' )
			)
		);
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'       => 'dropdown',
				'param_name' => 'content_text_alignment',
				'heading'    => esc_html__( 'Content Alignment', 'aperitif-core' ),
				'value'      => array(
					esc_html__( 'Default', 'aperitif-core' ) => '',
					esc_html__( 'Left', 'aperitif-core' )    => 'left',
					esc_html__( 'Center', 'aperitif-core' )  => 'center',
					esc_html__( 'Right', 'aperitif-core' )   => 'right'
				),
				'group'      => esc_html__( 'Aperitif Core Settings', 'aperitif-core' )
			)
		);
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'       => 'dropdown',
				'param_name' => 'custom_border',
				'heading'    => esc_html__( 'Custom Border', 'aperitif-core' ),
				'value'      => array(
					esc_html__( 'Default', 'aperitif-core' ) => '',
					esc_html__( 'Yes', 'aperitif-core' )     => 'yes',
					esc_html__( 'No', 'aperitif-core' )      => 'no',
				),
				'group'      => esc_html__( 'Aperitif Core Settings', 'aperitif-core' )
			)
		);
		
		/******* VC Row Inner shortcode - end *******/
		
	}
	
	add_action( 'vc_after_init', 'aperitif_core_vc_row_map' );
}

if ( ! function_exists( 'aperitif_core_vc_column_map' ) ) {
	/**
	 * Map VC Column shortcode
	 * Hooks on vc_after_init action
	 */
	function aperitif_core_vc_column_map() {
		
		/******* VC Column shortcode - begin *******/
		
		vc_add_param( 'vc_column',
			array(
				'type'       => 'textfield',
				'param_name' => 'column_responsive_padding_1440',
				'heading'    => esc_html__( 'Responsive Padding Under 1440', 'aperitif-core' ),
				'group'      => esc_html__( 'Aperitif Core Settings', 'aperitif-core' )
			)
		);
		
		vc_add_param( 'vc_column',
			array(
				'type'       => 'textfield',
				'param_name' => 'column_responsive_padding_1366',
				'heading'    => esc_html__( 'Responsive Padding Under 1366', 'aperitif-core' ),
				'group'      => esc_html__( 'Aperitif Core Settings', 'aperitif-core' )
			)
		);
		
		vc_add_param( 'vc_column',
			array(
				'type'       => 'textfield',
				'param_name' => 'column_responsive_padding_1280',
				'heading'    => esc_html__( 'Responsive Padding Under 1280', 'aperitif-core' ),
				'group'      => esc_html__( 'Aperitif Core Settings', 'aperitif-core' )
			)
		);
		
		vc_add_param( 'vc_column',
			array(
				'type'       => 'textfield',
				'param_name' => 'column_responsive_padding_1024',
				'heading'    => esc_html__( 'Responsive Padding Under 1024', 'aperitif-core' ),
				'group'      => esc_html__( 'Aperitif Core Settings', 'aperitif-core' )
			)
		);
		
		vc_add_param( 'vc_column',
			array(
				'type'       => 'textfield',
				'param_name' => 'column_responsive_padding_768',
				'heading'    => esc_html__( 'Responsive Padding Under 768', 'aperitif-core' ),
				'group'      => esc_html__( 'Aperitif Core Settings', 'aperitif-core' )
			)
		);
		vc_add_param( 'vc_column',
			array(
				'type'       => 'textfield',
				'param_name' => 'column_responsive_padding_680',
				'heading'    => esc_html__( 'Responsive Padding Under 680', 'aperitif-core' ),
				'group'      => esc_html__( 'Aperitif Core Settings', 'aperitif-core' )
			)
		);
		
		/******* VC Column Inner shortcode - begin *******/
		
		vc_add_param( 'vc_column_inner',
			array(
				'type'       => 'textfield',
				'param_name' => 'column_responsive_padding_1440',
				'heading'    => esc_html__( 'Responsive Padding Under 1440', 'aperitif-core' ),
				'group'      => esc_html__( 'Aperitif Core Settings', 'aperitif-core' )
			)
		);
		
		vc_add_param( 'vc_column_inner',
			array(
				'type'       => 'textfield',
				'param_name' => 'column_responsive_padding_1366',
				'heading'    => esc_html__( 'Responsive Padding Under 1366', 'aperitif-core' ),
				'group'      => esc_html__( 'Aperitif Core Settings', 'aperitif-core' )
			)
		);
		
		vc_add_param( 'vc_column_inner',
			array(
				'type'       => 'textfield',
				'param_name' => 'column_responsive_padding_1280',
				'heading'    => esc_html__( 'Responsive Padding Under 1280', 'aperitif-core' ),
				'group'      => esc_html__( 'Aperitif Core Settings', 'aperitif-core' )
			)
		);
		
		vc_add_param( 'vc_column_inner',
			array(
				'type'       => 'textfield',
				'param_name' => 'column_responsive_padding_1024',
				'heading'    => esc_html__( 'Responsive Padding Under 1024', 'aperitif-core' ),
				'group'      => esc_html__( 'Aperitif Core Settings', 'aperitif-core' )
			)
		);
		
		vc_add_param( 'vc_column_inner',
			array(
				'type'       => 'textfield',
				'param_name' => 'column_responsive_padding_768',
				'heading'    => esc_html__( 'Responsive Padding Under 768', 'aperitif-core' ),
				'group'      => esc_html__( 'Aperitif Core Settings', 'aperitif-core' )
			)
		);
		vc_add_param( 'vc_column_inner',
			array(
				'type'       => 'textfield',
				'param_name' => 'column_responsive_padding_680',
				'heading'    => esc_html__( 'Responsive Padding Under 680', 'aperitif-core' ),
				'group'      => esc_html__( 'Aperitif Core Settings', 'aperitif-core' )
			)
		);
		
	}
	
	add_action( 'vc_after_init', 'aperitif_core_vc_column_map' );
}

if ( ! function_exists( 'aperitif_core_add_html_before_wrapper_open' ) ) {
	function aperitif_core_add_html_before_wrapper_open( $html, $atts ) {
		
		if ( $atts['row_content_width'] === 'grid' ) {
			$html .= '<div class="qodef-content-grid">';
		}
		
		return $html;
	}
	
	add_filter( 'aperitif_core_filter_vc_row_before_wrapper_open', 'aperitif_core_add_html_before_wrapper_open', 10, 2 );
	add_filter( 'aperitif_core_filter_vc_row_inner_before_wrapper_open', 'aperitif_core_add_html_before_wrapper_open', 10, 2 );
}

if ( ! function_exists( 'aperitif_core_add_html_after_wrapper_close' ) ) {
	function aperitif_core_add_html_after_wrapper_close( $html, $atts ) {
		
		if ( $atts['row_content_width'] === 'grid' ) {
			$html .= '</div>';
		}
		
		return $html;
	}
	
	add_filter( 'aperitif_core_filter_vc_row_after_wrapper_close', 'aperitif_core_add_html_after_wrapper_close', 10, 2 );
	add_filter( 'aperitif_core_filter_vc_row_inner_after_wrapper_close', 'aperitif_core_add_html_after_wrapper_close', 10, 2 );
}

if ( ! function_exists( 'aperitif_core_add_additional_classes_on_row' ) ) {
	function aperitif_core_add_additional_classes_on_row( $classes, $base, $atts ) {
		if ( $base == 'vc_row' || $base == 'vc_row_inner' ) {
			if ( $atts['content_text_alignment'] != '' ) {
				$classes .= ' qodef-content-alignment-' . $atts['content_text_alignment'];
			}
		}
		
		return $classes;
	}
	
	add_filter( 'vc_shortcodes_css_class', 'aperitif_core_add_additional_classes_on_row', 10, 3 );
}

if ( ! function_exists( 'aperitif_core_init_vc_column_class' ) ) {
	function aperitif_core_init_vc_column_class( $classes, $base, $atts ) {
		if ( $base == 'vc_column' || $base == 'vc_column_inner' ) {
			if ( isset( $atts['css'] ) ) {
				$css_custom_class = current( explode( '{', $atts['css'] ) );
				$screen_sizes     = array( '1440', '1366', '1280', '1024', '768', '680' );
				
				foreach ( $screen_sizes as $screen_size ) {
					if ( isset( $atts[ 'column_responsive_padding_' . $screen_size ] ) && $atts[ 'column_responsive_padding_' . $screen_size ] !== '' ) {
						$padding = $atts[ 'column_responsive_padding_' . $screen_size ];
						
						add_filter( 'aperitif_core_filter_add_responsive_' . $screen_size . '_inline_style_in_footer', function ( $style ) use ( $css_custom_class, $padding ) {
							$styles = array();
							
							if ( ! empty( $padding ) ) {
								$styles['padding'] = $padding . '!important';
							}
							
							$style .= qode_framework_dynamic_style( $css_custom_class, $styles );
							
							return $style;
						} );
					}
				}
			}
		}
		
		return $classes;
	}
	
	add_filter( 'vc_shortcodes_css_class', 'aperitif_core_init_vc_column_class', 10, 3 );
}