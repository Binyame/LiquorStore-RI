<?php

if ( ! function_exists( 'aperitif_core_include_working_hours_shortcodes' ) ) {
	/**
	 * Function that includes shortcodes
	 */
	function aperitif_core_include_working_hours_shortcodes() {
		foreach ( glob( APERITIF_CORE_INC_PATH . '/working-hours/shortcodes/*/include.php' ) as $shortcode ) {
			include_once $shortcode;
		}
	}
	
	add_action( 'qode_framework_action_before_shortcodes_register', 'aperitif_core_include_working_hours_shortcodes' );
}

if ( ! function_exists( 'aperitif_core_include_working_hours_widgets' ) ) {
	/**
	 * Function that includes widgets
	 */
	function aperitif_core_include_working_hours_widgets() {
		foreach ( glob( APERITIF_CORE_INC_PATH . '/working-hours/shortcodes/*/widget/include.php' ) as $widget ) {
			include_once $widget;
		}
	}
	
	add_action( 'qode_framework_action_before_widgets_register', 'aperitif_core_include_working_hours_widgets' );
}

if ( ! function_exists( 'aperitif_core_set_working_hours_template_params' ) ) {
	/**
	 * Function that set working hours area content parameters
	 *
	 * @param $params array
	 *
	 * @return array
	 */
	function aperitif_core_set_working_hours_template_params( $params ) {
		$days = array(
			'monday',
			'tuesday',
			'wednesday',
			'thursday',
			'friday',
			'saturday',
			'sunday'
		);
		
		foreach ( $days as $day ) {
			$option = aperitif_core_get_post_value_through_levels( 'qodef_working_hours_' . $day );
			
			$params[ $day ] = ! empty( $option ) ? esc_attr( $option ) : '';
		}
		
		return $params;
	}
	
	add_filter( 'aperitif_filter_working_hours_template_params', 'aperitif_core_set_working_hours_template_params' );
}

if ( ! function_exists( 'aperitif_core_set_working_hours_special_template_params' ) ) {
	/**
	 * Function that set working hours area special content parameters
	 *
	 * @param $params array
	 *
	 * @return array
	 */
	function aperitif_core_set_working_hours_special_template_params( $params ) {
		$special_days = aperitif_core_get_post_value_through_levels( 'qodef_working_hours_special_days' );
		$special_text = aperitif_core_get_post_value_through_levels( 'qodef_working_hours_special_text' );
		
		if ( ! empty( $special_days ) ) {
			$special_days = array_filter( (array) $special_days, 'strlen' );
		}
		
		$params['special_days'] = $special_days;
		$params['special_text'] = esc_attr( $special_text );
		
		return $params;
	}
	
	add_filter( 'aperitif_filter_working_hours_special_template_params', 'aperitif_core_set_working_hours_special_template_params' );
}