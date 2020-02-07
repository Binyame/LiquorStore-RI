<?php

if ( ! function_exists( 'aperitif_core_add_accordion_shortcode' ) ) {
	/**
	 * Function that add shortcode into shortcodes list for registration
	 *
	 * @param $shortcodes array
	 *
	 * @return array
	 */
	function aperitif_core_add_accordion_shortcode( $shortcodes ) {
		$shortcodes[] = 'AperitifCoreAccordionShortcode';
		
		return $shortcodes;
	}
	
	add_filter( 'aperitif_core_filter_register_shortcodes', 'aperitif_core_add_accordion_shortcode' );
}

if ( class_exists( 'AperitifCoreShortcode' ) ) {
	class AperitifCoreAccordionShortcode extends AperitifCoreShortcode {
		
		public function __construct() {
			$this->set_layouts( apply_filters( 'aperitif_core_filter_accordion_layouts', array() ) );
			
			parent::__construct();
		}
		
		public function map_shortcode() {
			$this->set_shortcode_path( APERITIF_CORE_SHORTCODES_URL_PATH . '/accordion' );
			$this->set_base( 'aperitif_core_accordion' );
			$this->set_name( esc_html__( 'Accordion', 'aperitif-core' ) );
			$this->set_description( esc_html__( 'Shortcode that adds accordion holder', 'aperitif-core' ) );
			$this->set_category( esc_html__( 'Aperitif Core', 'aperitif-core' ) );
			$this->set_is_parent_shortcode( true );
			$this->set_child_elements( array(
				'aperitif_core_accordion_child'
			) );
			
			$options_map = aperitif_core_get_variations_options_map( $this->get_layouts() );
			
			$this->set_option( array(
				'field_type'    => 'select',
				'name'          => 'layout',
				'title'         => esc_html__( 'Layout', 'aperitif-core' ),
				'options'       => $this->get_layouts(),
				'default_value' => $options_map['default_value'],
				'visibility'    => array( 'map_for_page_builder' => $options_map['visibility'] )
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'custom_class',
				'title'      => esc_html__( 'Custom Class', 'aperitif-core' ),
			) );
			$this->set_option( array(
				'field_type'    => 'select',
				'name'          => 'behavior',
				'title'         => esc_html__( 'Behavior', 'aperitif-core' ),
				'options'       => array(
					'accordion' => esc_html__( 'Accordion', 'aperitif-core' ),
					'toggle'    => esc_html__( 'Toggle', 'aperitif-core' )
				),
				'default_value' => 'accordion'
			) );
		}
		
		public function load_assets() {
			wp_enqueue_script( 'jquery-ui-accordion' );
		}
		
		public function render( $options, $content = null ) {
			parent::render( $options );
			$atts                   = $this->get_atts();
			$atts['holder_classes'] = $this->get_holder_classes( $atts );
			$atts['content']        = preg_replace( '/\[aperitif_core_accordion_child/i', '[aperitif_core_accordion_child layout="' . $atts['layout'] . '"', $content );
			
			return aperitif_core_get_template_part( 'shortcodes/accordion', 'variations/' . $atts['layout'] . '/templates/holder', '', $atts );
		}
		
		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();
			
			$holder_classes[] = 'qodef-accordion';
			$holder_classes[] = 'clear';
			$holder_classes[] = ! empty( $atts['behavior'] ) ? 'qodef-behavior--' . $atts['behavior'] : '';
			$holder_classes[] = ! empty( $atts['layout'] ) ? 'qodef-layout--' . $atts['layout'] : '';
			
			return implode( ' ', $holder_classes );
		}
	}
}