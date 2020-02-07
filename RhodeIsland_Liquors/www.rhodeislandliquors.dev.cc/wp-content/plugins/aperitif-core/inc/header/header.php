<?php

abstract class AperitifCoreHeader {
	public $overriding_whole_header = false;
	public $slug;
	public $search_layout;
	protected $default_header_height;
	protected $header_height;
	
	public function __construct() {
		$this->set_header_height();
		
		add_filter( 'aperitif_core_action_before_main_css', array( $this, 'enqueue_assets' ) );
		add_filter( 'aperitif_core_action_before_main_css', array( $this, 'enqueue_additional_assets' ) );
		add_filter( 'aperitif_filter_localize_main_js', array( $this, 'set_global_javascript_variables' ) );
		add_filter( 'aperitif_core_filter_content_margin', array( $this, 'get_content_margin' ) );
		add_filter( 'aperitif_core_filter_title_padding', array( $this, 'get_title_padding' ) );
		add_filter( 'aperitif_filter_add_inline_style', array( $this, 'set_inline_header_styles' ) );
		add_filter( 'aperitif_filter_header_inner_class', array( $this, 'set_grid_class' ) );
	}
	
	public function load_template( $parameters = array() ) {
		$parameters = apply_filters( 'aperitif_core_filter_header_template', $parameters );
		
		return aperitif_core_get_template_part( 'header/layouts/' . $this->slug, 'templates/' . $this->slug, '', $parameters );
	}
	
	public function enqueue_assets() {
		wp_enqueue_script( 'hoverIntent' );
	}
	
	public function enqueue_additional_assets() {
		return false;
	}
	
	public function set_global_javascript_variables( $global_vars ) {
		$global_vars['headerHeight'] = $this->header_height;
		
		return $global_vars;
	}
	
	public function get_header_transparency() {
		$background_color = aperitif_core_get_post_value_through_levels( 'qodef_' . $this->slug . '_header_background_color' );
		
		if ( ! empty( $background_color ) ) {
			return ! preg_match( '/^#[a-f0-9]{6}$/i', $background_color ); // hex color is valid
		}
		
		return false;
	}
	
	public function content_behind_header() {
		$content_behind_header = aperitif_core_get_post_value_through_levels( 'qodef_content_behind_header' );
		
		return $content_behind_header == 'yes' ? true : false;
	}
	
	public function get_content_margin( $margin ) {
		
		if ( $this->get_header_transparency() || $this->content_behind_header() ) {
			$margin += $this->header_height;
		}
		
		return $margin;
	}
	
	public function get_title_padding( $padding ) {
		
		if ( $this->get_header_transparency() || $this->content_behind_header() ) {
			$padding += $this->header_height;
		}
		
		return $padding;
	}
	
	function set_header_height() {
		$header_height = aperitif_core_get_post_value_through_levels( 'qodef_' . $this->slug . '_header_height' );
		$header_height = ! empty( $header_height ) ? intval( $header_height ) : $this->default_header_height;
		
		$this->header_height = apply_filters( 'aperitif_core_filter_set_header_height', $header_height );
	}
	
	function set_grid_class( $class ) {
		$class .= aperitif_core_get_post_value_through_levels( 'qodef_' . $this->slug . '_header_in_grid' ) == 'yes' ? 'qodef-content-grid' : '';
		
		return $class;
	}
	
	public function set_inline_header_styles( $style ) {
		$styles = array();
		
		$height           = aperitif_core_get_post_value_through_levels( 'qodef_' . $this->slug . '_header_height' );
		$background_color = aperitif_core_get_post_value_through_levels( 'qodef_' . $this->slug . '_header_background_color' );
		
		if ( $height !== '' ) {
			$styles['height'] = intval( $height ) . 'px';
		}
		
		if ( ! empty( $background_color ) ) {
			$styles['background-color'] = $background_color;
		}
		
		if ( ! empty( $styles ) ) {
			$style .= qode_framework_dynamic_style( '.qodef-header--' . $this->slug . ' #qodef-page-header', $styles );
		}
		
		return $style;
	}
}