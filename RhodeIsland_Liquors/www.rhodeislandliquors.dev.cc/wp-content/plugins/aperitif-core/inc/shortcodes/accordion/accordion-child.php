<?php

if ( ! function_exists( 'aperitif_core_add_accordion_child_shortcode' ) ) {
	/**
	 * Function that add shortcode into shortcodes list for registration
	 *
	 * @param $shortcodes array
	 *
	 * @return array
	 */
	function aperitif_core_add_accordion_child_shortcode( $shortcodes ) {
		$shortcodes[] = 'AperitifCoreAccordionChildShortcode';
		
		return $shortcodes;
	}
	
	add_filter( 'aperitif_core_filter_register_shortcodes', 'aperitif_core_add_accordion_child_shortcode' );
}

if ( class_exists( 'AperitifCoreShortcode' ) ) {
	class AperitifCoreAccordionChildShortcode extends AperitifCoreShortcode {
		
		public function map_shortcode() {
			$this->set_shortcode_path( APERITIF_CORE_SHORTCODES_URL_PATH . '/accordion' );
			$this->set_base( 'aperitif_core_accordion_child' );
			$this->set_name( esc_html__( 'Accordion Child', 'aperitif-core' ) );
			$this->set_description( esc_html__( 'Shortcode that adds accordion child to accordion holder', 'aperitif-core' ) );
			$this->set_category( esc_html__( 'Aperitif Core', 'aperitif-core' ) );
			$this->set_is_child_shortcode( true );
			$this->set_parent_elements( array(
				'aperitif_core_accordion'
			) );
			$this->set_is_parent_shortcode( true );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'title',
				'title'      => esc_html__( 'Title', 'aperitif-core' ),
			) );
			$this->set_option( array(
				'field_type'    => 'select',
				'name'          => 'title_tag',
				'title'         => esc_html__( 'Title Tag', 'aperitif-core' ),
				'options'       => aperitif_core_get_select_type_options_pool( 'title_tag' ),
				'default_value' => 'h6'
			) );
			$this->set_option( array(
				'field_type'    => 'text',
				'name'          => 'layout',
				'title'         => esc_html__( 'Layout', 'aperitif-core' ),
				'default_value' => '',
				'visibility'    => array( 'map_for_page_builder' => false )
			) );
		}
		
		public function render( $options, $content = null ) {
			parent::render( $options );
			$atts            = $this->get_atts();
			$atts['content'] = $content;
			
			return aperitif_core_get_template_part( 'shortcodes/accordion', 'variations/' . $atts['layout'] . '/templates/child', '', $atts );
		}
	}
}