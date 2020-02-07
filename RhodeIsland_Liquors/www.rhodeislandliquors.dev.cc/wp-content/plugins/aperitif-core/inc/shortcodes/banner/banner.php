<?php

if ( ! function_exists( 'aperitif_core_add_banner_shortcode' ) ) {
	/**
	 * Function that add shortcode into shortcodes list for registration
	 *
	 * @param $shortcodes array
	 *
	 * @return array
	 */
	function aperitif_core_add_banner_shortcode( $shortcodes ) {
		$shortcodes[] = 'AperitifCoreBannerShortcode';
		
		return $shortcodes;
	}
	
	add_filter( 'aperitif_core_filter_register_shortcodes', 'aperitif_core_add_banner_shortcode' );
}

if ( class_exists( 'AperitifCoreShortcode' ) ) {
	class AperitifCoreBannerShortcode extends AperitifCoreShortcode {
		public function __construct() {
			$this->set_layouts( apply_filters( 'aperitif_core_filter_banner_layouts', array() ) );
			$this->set_extra_options( apply_filters( 'aperitif_core_filter_banner_extra_options', array() ) );
			
			parent::__construct();
		}
		
		public function map_shortcode() {
			$this->set_shortcode_path( APERITIF_CORE_SHORTCODES_URL_PATH . '/banner' );
			$this->set_base( 'aperitif_core_banner' );
			$this->set_name( esc_html__( 'Banner', 'aperitif-core' ) );
			$this->set_description( esc_html__( 'Shortcode that adds banner element', 'aperitif-core' ) );
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
				'name'       => 'link_url',
				'title'      => esc_html__( 'Link', 'aperitif-core' )
			) );
			$this->set_option( array(
				'field_type'    => 'select',
				'name'          => 'link_target',
				'title'         => esc_html__( 'Link Target', 'aperitif-core' ),
				'options'       => aperitif_core_get_select_type_options_pool( 'link_target' ),
				'default_value' => '_self'
			) );
			$this->set_option( array(
				'field_type' => 'select',
				'name'       => 'link_appearance',
				'title'      => esc_html__( 'Link Appearance', 'aperitif-core' ),
				'options'    => array(
					'link-overlay' => esc_html__( 'Overlay', 'aperitif-core' ),
					'link-button'  => esc_html__( 'Button', 'aperitif-core' ),
				),
			) );
			$this->set_option( array(
				'field_type' => 'image',
				'name'       => 'hover_image',
				'title'      => esc_html__( 'Hover Image', 'aperitif-core' ),
				'additional_params' => array(
					'dependency' => array(
						'show' => array(
							'link_appearance' => array(
								'values' => 'link-overlay',
							)
						)
					),
				)
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'title',
				'title'      => esc_html__( 'Title', 'aperitif-core' ),
				'group'      => esc_html__( 'Content', 'aperitif-core' )
			) );
			$this->set_option( array(
				'field_type'    => 'select',
				'name'          => 'title_tag',
				'title'         => esc_html__( 'Title Tag', 'aperitif-core' ),
				'options'       => aperitif_core_get_select_type_options_pool( 'title_tag' ),
				'default_value' => 'h5',
				'group'         => esc_html__( 'Content', 'aperitif-core' )
			) );
			$this->set_option( array(
				'field_type' => 'color',
				'name'       => 'title_color',
				'title'      => esc_html__( 'Title Color', 'aperitif-core' ),
				'group'      => esc_html__( 'Content', 'aperitif-core' )
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'title_margin_top',
				'title'      => esc_html__( 'Title Margin Top', 'aperitif-core' ),
				'group'      => esc_html__( 'Content', 'aperitif-core' )
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'subtitle',
				'title'      => esc_html__( 'Subtitle', 'aperitif-core' ),
				'group'      => esc_html__( 'Content', 'aperitif-core' )
			) );
			$this->set_option( array(
				'field_type'    => 'select',
				'name'          => 'subtitle_tag',
				'title'         => esc_html__( 'Subtitle Tag', 'aperitif-core' ),
				'options'       => aperitif_core_get_select_type_options_pool( 'title_tag' ),
				'default_value' => 'h4',
				'group'         => esc_html__( 'Content', 'aperitif-core' )
			) );
			$this->set_option( array(
				'field_type' => 'color',
				'name'       => 'subtitle_color',
				'title'      => esc_html__( 'Subtitle Color', 'aperitif-core' ),
				'group'      => esc_html__( 'Content', 'aperitif-core' )
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'subtitle_margin_top',
				'title'      => esc_html__( 'Subtitle Margin Top', 'aperitif-core' ),
				'group'      => esc_html__( 'Content', 'aperitif-core' )
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'text_field',
				'title'      => esc_html__( 'Text', 'aperitif-core' ),
				'group'      => esc_html__( 'Content', 'aperitif-core' )
			) );
			$this->set_option( array(
				'field_type'    => 'select',
				'name'          => 'text_tag',
				'title'         => esc_html__( 'Text Tag', 'aperitif-core' ),
				'options'       => aperitif_core_get_select_type_options_pool( 'title_tag' ),
				'default_value' => 'p',
				'group'         => esc_html__( 'Content', 'aperitif-core' )
			) );
			$this->set_option( array(
				'field_type' => 'color',
				'name'       => 'text_color',
				'title'      => esc_html__( 'Text Color', 'aperitif-core' ),
				'group'      => esc_html__( 'Content', 'aperitif-core' )
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'text_margin_top',
				'title'      => esc_html__( 'Text Margin Top', 'aperitif-core' ),
				'group'      => esc_html__( 'Content', 'aperitif-core' )
			) );
			$this->import_shortcode_options( array(
				'shortcode_base'    => 'aperitif_core_button',
				'exclude'           => array( 'custom_class', 'link', 'target' ),
				'additional_params' => array(
					'group'      => esc_html__( 'Button', 'aperitif-core' ),
					'dependency' => array(
						'show' => array(
							'link_appearance' => array(
								'values' => 'link-button',
							)
						)
					),
				)
			) );
			
			$this->map_extra_options();
		}
		
		public function render( $options, $content = null ) {
			parent::render( $options );
			$atts = $this->get_atts();
			
			$atts['holder_classes']  = $this->get_holder_classes( $atts );
			$atts['title_styles']    = $this->get_title_styles( $atts );
			$atts['subtitle_styles'] = $this->get_subtitle_styles( $atts );
			$atts['text_styles']     = $this->get_text_styles( $atts );
			$atts['button_params']   = $this->generate_button_params( $atts );

			return aperitif_core_get_template_part( 'shortcodes/banner', 'variations/' . $atts['layout'] . '/templates/' . $atts['layout'], '', $atts );
		}
		
		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();
			
			$holder_classes[] = 'qodef-banner';
			$holder_classes[] = ! empty ( $atts['layout'] ) ? 'qodef-layout--' . $atts['layout'] : '';
			
			return implode( ' ', $holder_classes );
		}
		
		private function get_title_styles( $atts ) {
			$styles = array();
			
			if ( $atts['title_margin_top'] !== '' ) {
				$styles[] = 'margin-top: ' . intval( $atts['title_margin_top'] ) . 'px';
			}
			
			if ( ! empty( $atts['title_color'] ) ) {
				$styles[] = 'color: ' . $atts['title_color'];
			}
			
			return $styles;
		}
		
		private function get_subtitle_styles( $atts ) {
			$styles = array();
			
			if ( $atts['subtitle_margin_top'] !== '' ) {
				$styles[] = 'margin-top: ' . intval( $atts['subtitle_margin_top'] ) . 'px';
			}
			
			if ( ! empty( $atts['subtitle_color'] ) ) {
				$styles[] = 'color: ' . $atts['subtitle_color'];
			}
			
			return $styles;
		}
		
		private function get_text_styles( $atts ) {
			$styles = array();
			
			if ( $atts['text_margin_top'] !== '' ) {
				$styles[] = 'margin-top: ' . intval( $atts['text_margin_top'] ) . 'px';
			}
			
			if ( ! empty( $atts['text_color'] ) ) {
				$styles[] = 'color: ' . $atts['text_color'];
			}
			
			return $styles;
		}
		
		private function generate_button_params( $atts ) {
			$params = $this->populate_imported_shortcode_atts( array(
				'shortcode_base' => 'aperitif_core_button',
				'exclude'        => array( 'custom_class', 'link', 'target' ),
				'atts'           => $atts,
			) );
			
			$params['link']   = ! empty( $atts['link_url'] ) ? $atts['link_url'] : '';
			$params['target'] = ! empty( $atts['link_target'] ) ? $atts['link_target'] : '';
			
			return $params;
		}
	}
}