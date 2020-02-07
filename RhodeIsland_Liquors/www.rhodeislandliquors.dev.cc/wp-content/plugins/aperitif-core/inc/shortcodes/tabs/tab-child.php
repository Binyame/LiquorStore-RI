<?php

if ( ! function_exists( 'aperitif_core_add_tabs_child_shortcode' ) ) {
	/**
	 * Function that add shortcode into shortcodes list for registration
	 *
	 * @param $shortcodes array
	 *
	 * @return array
	 */
	function aperitif_core_add_tabs_child_shortcode( $shortcodes ) {
		$shortcodes[] = 'AperitifCoreTabsChildShortcode';
		
		return $shortcodes;
	}
	
	add_filter( 'aperitif_core_filter_register_shortcodes', 'aperitif_core_add_tabs_child_shortcode' );
}

if ( class_exists( 'AperitifCoreShortcode' ) ) {
	class AperitifCoreTabsChildShortcode extends AperitifCoreShortcode {
		
		public function map_shortcode() {
			$this->set_shortcode_path( APERITIF_CORE_SHORTCODES_URL_PATH . '/tabs' );
			$this->set_base( 'aperitif_core_tabs_child' );
			$this->set_name( esc_html__( 'Tabs Child', 'aperitif-core' ) );
			$this->set_description( esc_html__( 'Shortcode that adds tab child to tabs holder', 'aperitif-core' ) );
			$this->set_category( esc_html__( 'Aperitif Core', 'aperitif-core' ) );
			$this->set_is_child_shortcode( true );
			$this->set_parent_elements( array(
				'aperitif_core_tabs'
			) );
			$this->set_is_parent_shortcode( true );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'tab_title',
				'title'      => esc_html__( 'Title', 'aperitif-core' ),
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
			$atts = $this->get_atts();
			
			$rand_number       = rand( 0, 1000 );
			$atts['tab_title'] = $atts['tab_title'] . '-' . $rand_number;
			$atts['content']   = $content;
			
			return aperitif_core_get_template_part( 'shortcodes/tabs', 'variations/' . $atts['layout'] . '/templates/child', '', $atts );
		}
	}
}