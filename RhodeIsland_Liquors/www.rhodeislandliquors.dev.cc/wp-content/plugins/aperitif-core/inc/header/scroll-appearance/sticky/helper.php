<?php
if ( ! function_exists( 'aperitif_core_add_sticky_header_option' ) ) {
	/**
	 * This function set header scrolling appearance value for global header option map
	 */
	function aperitif_core_add_sticky_header_option( $header_scroll_appearance_options ) {
		$header_scroll_appearance_options['sticky'] = esc_html__( 'Sticky', 'aperitif-core' );
		
		return $header_scroll_appearance_options;
	}
	
	add_filter( 'aperitif_core_filter_header_scroll_appearance_option', 'aperitif_core_add_sticky_header_option' );
}

if ( ! function_exists( 'aperitif_core_sticky_header_global_js_var' ) ) {
	function aperitif_core_sticky_header_global_js_var( $global_variables ) {
		$header_scroll_appearance = aperitif_core_get_post_value_through_levels( 'qodef_header_scroll_appearance' );
		
		if ( $header_scroll_appearance == 'sticky' ) {
			$sticky_scroll_amount_meta = aperitif_core_get_post_value_through_levels( 'qodef_sticky_header_scroll_amount' );
			$sticky_scroll_amount      = $sticky_scroll_amount_meta !== '' ? intval( $sticky_scroll_amount_meta ) : 0;
			
			$global_variables['qodefStickyHeaderScrollAmount'] = $sticky_scroll_amount;
		}
		
		return $global_variables;
	}
	
	add_filter( 'aperitif_filter_localize_main_js', 'aperitif_core_sticky_header_global_js_var' );
}

if ( ! function_exists( 'aperitif_core_register_sticky_header_areas' ) ) {
	/**
	 * Function that registers widget area for sticky header
	 */
	function aperitif_core_register_sticky_header_areas() {
		register_sidebar(
			array(
				'id'            => 'qodef-sticky-header-widget-area-one',
				'name'          => esc_html__( 'Sticky Header - Area One', 'aperitif-core' ),
				'description'   => esc_html__( 'Widgets added here will appear in sticky header widget area one', 'aperitif-core' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s qodef-sticky-header-widget-area-one">',
				'after_widget'  => '</div>'
			)
		);
		
		register_sidebar(
			array(
				'id'            => 'qodef-sticky-header-widget-area-two',
				'name'          => esc_html__( 'Sticky Header - Area Two', 'aperitif-core' ),
				'description'   => esc_html__( 'Widgets added here will appear in sticky header widget area two', 'aperitif-core' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s qodef-sticky-header-widget-area-two">',
				'after_widget'  => '</div>'
			)
		);
	}
	
	add_action( 'aperitif_core_action_additional_header_widgets_area', 'aperitif_core_register_sticky_header_areas' );
}