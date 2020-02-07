<?php

if ( ! function_exists( 'aperitif_core_add_icon_list_item_shortcode' ) ) {
	/**
	 * Function that add shortcode into shortcodes list for registration
	 *
	 * @param $shortcodes array
	 *
	 * @return array
	 */
	function aperitif_core_add_icon_list_item_shortcode( $shortcodes ) {
		$shortcodes[] = 'AperitifCoreIconListItemShortcode';
		
		return $shortcodes;
	}
	
	add_filter( 'aperitif_core_filter_register_shortcodes', 'aperitif_core_add_icon_list_item_shortcode' );
}

if ( class_exists( 'AperitifCoreShortcode' ) ) {
	class AperitifCoreIconListItemShortcode extends AperitifCoreShortcode {
		
		public function map_shortcode() {
			$this->set_shortcode_path( APERITIF_CORE_SHORTCODES_URL_PATH . '/icon-list-item' );
			$this->set_base( 'aperitif_core_icon_list_item' );
			$this->set_name( esc_html__( 'Icon List Item', 'aperitif-core' ) );
			$this->set_description( esc_html__( 'Shortcode that adds icon list item element', 'aperitif-core' ) );
			$this->set_category( esc_html__( 'Aperitif Core', 'aperitif-core' ) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'item_margin_bottom',
				'title'      => esc_html__( 'Item Margin Bottom', 'aperitif-core' )
			) );
			$this->set_option( array(
				'field_type'    => 'text',
				'name'          => 'link',
				'title'         => esc_html__( 'Link', 'aperitif-core' ),
				'default_value' => ''
			) );
			$this->set_option( array(
				'field_type'    => 'select',
				'name'          => 'target',
				'title'         => esc_html__( 'Link Target', 'aperitif-core' ),
				'options'       => aperitif_core_get_select_type_options_pool( 'link_target' ),
				'default_value' => '_self'
			) );
			$this->set_option( array(
				'field_type'    => 'select',
				'name'          => 'icon_type',
				'title'         => esc_html__( 'Icon Type', 'aperitif-core' ),
				'options'       => array(
					'icon-pack'   => esc_html__( 'Icon Pack', 'aperitif-core' ),
					'custom-icon' => esc_html__( 'Custom Icon', 'aperitif-core' )
				),
				'default_value' => 'icon-pack'
			) );
			$this->set_option( array(
				'field_type' => 'image',
				'name'       => 'custom_icon',
				'title'      => esc_html__( 'Custom Icon', 'aperitif-core' ),
				'dependency' => array(
					'show' => array(
						'icon_type' => array(
							'values'        => 'custom-icon',
							'default_value' => 'icon-pack'
						)
					)
				)
			) );
			$this->import_shortcode_options( array(
				'shortcode_base'    => 'aperitif_core_icon',
				'exclude'           => array( 'link', 'target', 'margin' ),
				'additional_params' => array(
					'group'      => esc_html__( 'Icon', 'aperitif-core' ),
					'dependency' => array(
						'show' => array(
							'icon_type' => array(
								'values'        => 'icon-pack',
								'default_value' => 'icon-pack'
							)
						)
					)
				)
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'title',
				'title'      => esc_html__( 'Title', 'aperitif-core' ),
				'group'      => esc_html__( 'Title', 'aperitif-core' )
			) );
			$this->set_option( array(
				'field_type'    => 'select',
				'name'          => 'title_tag',
				'title'         => esc_html__( 'Title Tag', 'aperitif-core' ),
				'options'       => aperitif_core_get_select_type_options_pool( 'title_tag' ),
				'default_value' => 'p',
				'group'         => esc_html__( 'Title', 'aperitif-core' )
			) );
			$this->set_option( array(
				'field_type' => 'color',
				'name'       => 'title_color',
				'title'      => esc_html__( 'Title Color', 'aperitif-core' ),
				'group'      => esc_html__( 'Title', 'aperitif-core' )
			) );
		}
		
		public function render( $options, $content = null ) {
			parent::render( $options );
			$atts = $this->get_atts();
			
			$atts['holder_classes'] = $this->get_holder_classes( $atts );
			$atts['holder_styles']  = $this->get_holder_styles( $atts );
			$atts['title_styles']   = $this->get_title_styles( $atts );
			$atts['icon_params']    = $this->generate_icon_params( $atts );
			
			return aperitif_core_get_template_part( 'shortcodes/icon-list-item', 'templates/icon-list-item', '', $atts );
		}
		
		private function get_holder_classes( $atts ) {
			$holder_classes = array();
			
			$holder_classes[] = 'qodef-icon-list-item';
			$holder_classes[] = ! empty( $atts['icon_type'] ) ? 'qodef-icon--' . $atts['icon_type'] : '';
			
			return implode( ' ', $holder_classes );
		}
		
		private function get_holder_styles( $atts ) {
			$styles = array();
			
			if ( $atts['item_margin_bottom'] !== '' ) {
				$styles[] = 'margin-bottom: ' . intval( $atts['item_margin_bottom'] ) . 'px';
			}
			
			return $styles;
		}
		
		private function get_title_styles( $atts ) {
			$styles = array();
			
			if ( ! empty( $atts['title_color'] ) ) {
				$styles[] = 'color: ' . $atts['title_color'];
			}
			
			return $styles;
		}
		
		private function generate_icon_params( $atts ) {
			$params = $this->populate_imported_shortcode_atts( array(
				'shortcode_base' => 'aperitif_core_icon',
				'exclude'        => array( 'link', 'target', 'margin' ),
				'atts'           => $atts,
			) );
			
			return $params;
		}
	}
}