<?php

class AperitifCoreStandardTitle extends AperitifCoreTitle {
	private static $instance;
	
	public function __construct() {
		$this->slug = 'standard';
		
		// Add title area inline styles
		add_filter( 'aperitif_filter_add_inline_style', array( $this, 'add_inline_styles' ) );
	}
	
	public static function get_instance() {
		if ( self::$instance == null ) {
			self::$instance = new self();
		}
		
		return self::$instance;
	}
	
	function add_inline_styles( $style ) {
		$styles = array();
		
		$color      = aperitif_core_get_post_value_through_levels( 'qodef_page_title_subtitle_color' );
		$top_margin = aperitif_core_get_post_value_through_levels( 'qodef_page_title_subtitle_top_margin' );
		
		if ( ! empty( $color ) ) {
			$styles['color'] = $color;
		}
		
		if ( $top_margin !== '' ) {
			$styles['margin-top'] = intval( $top_margin ) . 'px';
		}
		
		if ( ! empty( $styles ) ) {
			$style .= qode_framework_dynamic_style( '.qodef-page-title.qodef-title--standard .qodef-m-subtitle', $styles );
		}
		
		return $style;
	}
}