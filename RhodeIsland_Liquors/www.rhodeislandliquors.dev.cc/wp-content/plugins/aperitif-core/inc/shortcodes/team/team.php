<?php

if ( ! function_exists( 'aperitif_core_add_team_shortcode' ) ) {
	/**
	 * Function that add shortcode into shortcodes list for registration
	 *
	 * @param $shortcodes array
	 *
	 * @return array
	 */
	function aperitif_core_add_team_shortcode( $shortcodes ) {
		$shortcodes[] = 'AperitifCoreTeamShortcode';
		
		return $shortcodes;
	}
	
	add_filter( 'aperitif_core_filter_register_shortcodes', 'aperitif_core_add_team_shortcode' );
}

if ( class_exists( 'AperitifCoreShortcode' ) ) {
	class AperitifCoreTeamShortcode extends AperitifCoreShortcode {
		
		public function __construct() {
			$this->set_layouts( apply_filters( 'aperitif_core_filter_team_layouts', array() ) );
			$this->set_extra_options( apply_filters( 'aperitif_core_filter_team_extra_options', array() ) );
			
			parent::__construct();
		}
		
		public $no_of_icons = 5;
		
		public function map_shortcode() {
			$this->set_shortcode_path( APERITIF_CORE_SHORTCODES_URL_PATH . '/team' );
			$this->set_base( 'aperitif_core_team' );
			$this->set_name( esc_html__( 'Team', 'aperitif-core' ) );
			$this->set_description( esc_html__( 'Shortcode that adds team element', 'aperitif-core' ) );
			$this->set_category( esc_html__( 'Aperitif Core', 'aperitif-core' ) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'custom_class',
				'title'      => esc_html__( 'Custom Class', 'aperitif-core' ),
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
				'field_type' => 'image',
				'name'       => 'image',
				'title'      => esc_html__( 'Image', 'aperitif-core' ),
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'link',
				'title'      => esc_html__( 'Custom Link', 'aperitif-core' ),
			) );
			$this->set_option( array(
				'field_type'    => 'select',
				'name'          => 'target',
				'title'         => esc_html__( 'Custom Link Target', 'aperitif-core' ),
				'options'       => aperitif_core_get_select_type_options_pool( 'link_target' ),
				'default_value' => '_self',
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'name',
				'title'      => esc_html__( 'Name', 'aperitif-core' ),
				'group'      => esc_html__( 'Content', 'aperitif-core' )
			) );
			$this->set_option( array(
				'field_type'    => 'select',
				'name'          => 'name_tag',
				'title'         => esc_html__( 'Name Tag', 'aperitif-core' ),
				'options'       => aperitif_core_get_select_type_options_pool( 'title_tag' ),
				'default_value' => 'h5',
				'group'         => esc_html__( 'Content', 'aperitif-core' )
			) );
			$this->set_option( array(
				'field_type' => 'color',
				'name'       => 'name_color',
				'title'      => esc_html__( 'Name Color', 'aperitif-core' ),
				'group'      => esc_html__( 'Content', 'aperitif-core' )
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'position',
				'title'      => esc_html__( 'Position', 'aperitif-core' ),
				'group'      => esc_html__( 'Content', 'aperitif-core' )
			) );
			$this->set_option( array(
				'field_type' => 'color',
				'name'       => 'position_color',
				'title'      => esc_html__( 'Position Color', 'aperitif-core' ),
				'group'      => esc_html__( 'Content', 'aperitif-core' )
			) );
			$this->set_option( array(
				'field_type' => 'textarea',
				'name'       => 'text',
				'title'      => esc_html__( 'Text', 'aperitif-core' ),
				'group'      => esc_html__( 'Content', 'aperitif-core' )
			) );
			$this->set_option( array(
				'field_type' => 'color',
				'name'       => 'text_color',
				'title'      => esc_html__( 'Text Color', 'aperitif-core' ),
				'group'      => esc_html__( 'Content', 'aperitif-core' )
			) );
			for ( $i = 1; $i <= $this->no_of_icons; $i ++ ) {
				$this->set_option(
					array(
						'field_type' => 'iconpack',
						'name'       => 'main_icon_' . $i,
						'title'      => sprintf( esc_html__( 'Icon %s', 'aperitif-core' ), $i ),
						'group'      => esc_html__( 'Social icons', 'aperitif-core' )
					)
				);
				$this->set_option(
					array(
						'field_type' => 'text',
						'name'       => 'link_' . $i,
						'title'      => sprintf( esc_html__( 'Link %s', 'aperitif-core' ), $i ),
						'group'      => esc_html__( 'Social icons', 'aperitif-core' )
					)
				);
				$this->set_option(
					array(
						'field_type'    => 'select',
						'name'          => 'target_' . $i,
						'title'         => sprintf( esc_html__( 'Link %s Target' ), $i ),
						'options'       => aperitif_core_get_select_type_options_pool( 'link_target', false ),
						'default_value' => '_blank',
						'group'         => esc_html__( 'Social icons', 'aperitif-core' )
					)
				);
			}
			
			$this->map_extra_options();
		}
		
		public function render( $options, $content = null ) {
			parent::render( $options );
			$atts = $this->get_atts();
			
			$atts['holder_classes']  = $this->get_holder_classes( $atts );
			$atts['name_styles']     = $this->get_name_styles( $atts );
			$atts['position_styles'] = $this->get_position_styles( $atts );
			$atts['text_styles']     = $this->get_text_styles( $atts );
			$atts['icon_params']     = $this->icon_params( $atts );
			
			return aperitif_core_get_template_part( 'shortcodes/team', 'variations/' . $atts['layout'] . '/templates/' . $atts['layout'], '', $atts );
		}
		
		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();
			
			$holder_classes[] = 'qodef-team';
			$holder_classes[] = ! empty ( $atts['layout'] ) ? 'qodef-layout--' . $atts['layout'] : '';
			
			return implode( ' ', $holder_classes );
		}
		
		private function get_name_styles( $atts ) {
			$styles = array();
			
			if ( ! empty( $atts['name_color'] ) ) {
				$styles[] = 'color: ' . $atts['name_color'];
			}
			
			return $styles;
		}
		
		private function get_position_styles( $atts ) {
			$styles = array();
			
			if ( ! empty( $atts['position_color'] ) ) {
				$styles[] = 'color: ' . $atts['postion_color'];
			}
			
			return $styles;
		}
		
		private function get_text_styles( $atts ) {
			$styles = array();
			
			if ( ! empty( $atts['text_color'] ) ) {
				$styles[] = 'color: ' . $atts['text_color'];
			}
			
			return $styles;
		}
		
		private function icon_params( $atts ) {
			
			$icon_params = array();
			
			for ( $i = 1; $i <= $this->no_of_icons; $i ++ ) {
				$selected_icon_pack = str_replace( '-', '_', $atts[ 'main_icon_' . $i ] );
				if ( ! empty( $atts[ 'main_icon_' . $i . '_' . $selected_icon_pack ] ) ) {
					$params = array(
						'main_icon'                        => $atts[ 'main_icon_' . $i ],
						'main_icon_' . $selected_icon_pack => $atts[ 'main_icon_' . $i . '_' . $selected_icon_pack ],
						'link'                             => $atts[ 'link_' . $i ],
						'target'                           => $atts[ 'target_' . $i ],
						'custom_size'                      => '14px',
						'icon_layout'                      => 'square',
						'shape_size'                       => '35px',
					);
					
					$icon_params[] = $params;
				}
			}
			
			return $icon_params;
			
		}
		
	}
}
