<?php
if ( ! function_exists( 'aperitif_core_dependency_for_top_area_options' ) ) {
	function aperitif_core_dependency_for_top_area_options() {
		$dependency_options = apply_filters( 'aperitif_core_filter_top_area_hide_option', $hide_dep_options = array() );
		
		return $dependency_options;
	}
}

if ( ! function_exists( 'aperitif_core_register_top_area_header_areas' ) ) {
	function aperitif_core_register_top_area_header_areas() {
		register_sidebar(
			array(
				'id'            => 'qodef-top-area-left',
				'name'          => esc_html__( 'Header Top Area - Left', 'aperitif-core' ),
				'description'   => esc_html__( 'Widgets added here will appear on the left side in top header area', 'aperitif-core' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s qodef-top-bar-widget">',
				'after_widget'  => '</div>'
			)
		);
		
		register_sidebar(
			array(
				'id'            => 'qodef-top-area-right',
				'name'          => esc_html__( 'Header Top Area - Right', 'aperitif-core' ),
				'description'   => esc_html__( 'Widgets added here will appear on the right side in top header area', 'aperitif-core' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s qodef-top-bar-widget">',
				'after_widget'  => '</div>'
			)
		);
	}
	
	add_action( 'aperitif_core_action_additional_header_widgets_area', 'aperitif_core_register_top_area_header_areas' );
}

if ( ! function_exists( 'aperitif_core_set_top_area_header_widget_area' ) ) {
	function aperitif_core_set_top_area_header_widget_area( $widget_area_map ) {
		
		if ( $widget_area_map['header_layout'] === 'top-area-left' ) {
			$widget_area_map['is_enabled']          = true;
			$widget_area_map['default_widget_area'] = 'qodef-top-area-left';
			$widget_area_map['custom_widget_area']  = '';
		} else if ( $widget_area_map['header_layout'] === 'top-area-right' ) {
			$widget_area_map['is_enabled']          = true;
			$widget_area_map['default_widget_area'] = 'qodef-top-area-right';
			$widget_area_map['custom_widget_area']  = '';
		}
		
		return $widget_area_map;
	}
	
	add_filter( 'aperitif_core_filter_header_widget_area', 'aperitif_core_set_top_area_header_widget_area' );
}