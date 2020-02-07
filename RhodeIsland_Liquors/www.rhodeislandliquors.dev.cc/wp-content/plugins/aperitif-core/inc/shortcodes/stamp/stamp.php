<?php

if ( ! function_exists( 'aperitif_core_add_stamp_shortcode' ) ) {
	/**
	 * Function that add shortcode into shortcodes list for registration
	 *
	 * @param $shortcodes array
	 *
	 * @return array
	 */
	function aperitif_core_add_stamp_shortcode( $shortcodes ) {
		$shortcodes[] = 'AperitifCoreStampShortcode';
		
		return $shortcodes;
	}
	
	add_filter( 'aperitif_core_filter_register_shortcodes', 'aperitif_core_add_stamp_shortcode' );
}

if ( class_exists( 'AperitifCoreShortcode' ) ) {
	class AperitifCoreStampShortcode extends AperitifCoreShortcode {
		
		public function map_shortcode() {
			$this->set_shortcode_path( APERITIF_CORE_SHORTCODES_URL_PATH . '/stamp' );
			$this->set_base( 'aperitif_core_stamp' );
			$this->set_name( esc_html__( 'Stamp', 'aperitif-core' ) );
			$this->set_description( esc_html__( 'Shortcode that adds stamp element', 'aperitif-core' ) );
			$this->set_category( esc_html__( 'Aperitif Core', 'aperitif-core' ) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'custom_class',
				'title'      => esc_html__( 'Custom Class', 'aperitif-core' ),
			) );
			$this->set_option( array(
				'field_type' => 'textfield',
				'name'       => 'text',
				'title'      => esc_html__( 'Stamp Text', 'aperitif-core' )
			) );
			$this->set_option( array(
				'field_type' => 'color',
				'name'       => 'text_color',
				'title'      => esc_html__( 'Text Color', 'aperitif-core' ),
				'dependency' => array( 'element' => 'text', 'not_empty' => true )
			) );
			$this->set_option( array(
				'field_type' => 'textfield',
				'name'       => 'text_font_size',
				'title'      => esc_html__( 'Text Font Size (px)', 'aperitif-core' ),
				'dependency' => array( 'element' => 'text', 'not_empty' => true )
			) );
			$this->set_option( array(
				'field_type' => 'textfield',
				'name'       => 'centered_text',
				'title'      => esc_html__( 'Centered Text', 'aperitif-core' )
			) );
			$this->set_option( array(
				'field_type' => 'color',
				'name'       => 'centered_text_color',
				'title'      => esc_html__( 'Centered Text Color', 'aperitif-core' ),
				'dependency' => array( 'element' => 'centered_text', 'not_empty' => true )
			) );
			$this->set_option( array(
				'field_type' => 'textfield',
				'name'       => 'centered_text_font_size',
				'title'      => esc_html__( 'Centered Text Font Size (px)', 'aperitif-core' ),
				'dependency' => array( 'element' => 'centered_text', 'not_empty' => true )
			) );
			$this->set_option( array(
				'field_type'  => 'textfield',
				'name'        => 'stamp_size',
				'title'       => esc_html__( 'Stamp Size (px)', 'aperitif-core' ),
				'description' => esc_html__( 'Default value is 114', 'aperitif-core' ),
				'dependency'  => array( 'element' => 'text', 'not_empty' => true )
			) );
			
			$this->set_option( array(
				'field_type' => 'select',
				'name'       => 'disable_stamp',
				'title'      => esc_html__( 'Disable Stamp', 'aperitif-core' ),
				'dependency' => array( 'element' => 'text', 'not_empty' => true ),
				'group'      => esc_html__( 'Visibility', 'aperitif-core' ),
				'options'    => array(
					''     => esc_html__( 'Never', 'aperitif-core' ),
					'1440' => esc_html__( 'Below 1440px', 'aperitif-core' ),
					'1280' => esc_html__( 'Below 1280px', 'aperitif-core' ),
					'1024' => esc_html__( 'Below 1024px', 'aperitif-core' ),
					'768'  => esc_html__( 'Below 768px', 'aperitif-core' ),
					'680'  => esc_html__( 'Below 680px', 'aperitif-core' ),
					'480'  => esc_html__( 'Below 480px', 'aperitif-core' ),
				)
			) );
			$this->set_option( array(
				'field_type'  => 'textfield',
				'name'        => 'appearing_delay',
				'title'       => esc_html__( 'Appearing Delay (ms)', 'aperitif-core' ),
				'description' => esc_html__( 'Default value is 0', 'aperitif-core' ),
				'dependency'  => array( 'element' => 'text', 'not_empty' => true ),
				'group'       => esc_html__( 'Visibility', 'aperitif-core' )
			) );
			$this->set_option( array(
				'field_type' => 'select',
				'name'       => 'absolute_position',
				'title'      => esc_html__( 'Enable Absolute Position', 'aperitif-core' ),
				'options'    => aperitif_core_get_select_type_options_pool( 'no_yes', false ),
				'dependency' => array( 'element' => 'text', 'not_empty' => true ),
				'group'      => esc_html__( 'Visibility', 'aperitif-core' )
			) );
			$this->set_option( array(
				'field_type' => 'textfield',
				'name'       => 'top_position',
				'title'      => esc_html__( 'Top Position (px or %)', 'aperitif-core' ),
				'dependency' => array( 'element' => 'absolute_position', 'value' => array( 'yes' ) ),
				'group'      => esc_html__( 'Visibility', 'aperitif-core' )
			) );
			$this->set_option( array(
				'field_type' => 'textfield',
				'name'       => 'bottom_position',
				'title'      => esc_html__( 'Bottom Position (px or %)', 'aperitif-core' ),
				'dependency' => array( 'element' => 'absolute_position', 'value' => array( 'yes' ) ),
				'group'      => esc_html__( 'Visibility', 'aperitif-core' )
			) );
			$this->set_option( array(
				'field_type' => 'textfield',
				'name'       => 'left_position',
				'title'      => esc_html__( 'Left Position (px or %)', 'aperitif-core' ),
				'dependency' => array( 'element' => 'absolute_position', 'value' => array( 'yes' ) ),
				'group'      => esc_html__( 'Visibility', 'aperitif-core' )
			) );
			$this->set_option( array(
				'field_type' => 'textfield',
				'name'       => 'right_position',
				'title'      => esc_html__( 'Right Position (px or %)', 'aperitif-core' ),
				'dependency' => array( 'element' => 'absolute_position', 'value' => array( 'yes' ) ),
				'group'      => esc_html__( 'Visibility', 'aperitif-core' )
			) );
			
			$this->set_option( array(
				'field_type' => 'svg',
				'name'       => 'signature_svg_code',
				'title'      => esc_html__( 'SVG Signature', 'aperitif-core' ),
				'group'      => esc_html__( 'Signature', 'aperitif-core' )
			) );
			$this->set_option( array(
				'field_type' => 'textfield',
				'name'       => 'signature_svg_bottom',
				'title'      => esc_html__( 'Bottom Position (px or %)', 'aperitif-core' ),
				'group'      => esc_html__( 'Signature', 'aperitif-core' )
			) );
			$this->set_option( array(
				'field_type' => 'textfield',
				'name'       => 'signature_svg_left',
				'title'      => esc_html__( 'Left Position (px or %)', 'aperitif-core' ),
				'group'      => esc_html__( 'Signature', 'aperitif-core' )
			) );
		}
		
		public function render( $options, $content = null ) {
			parent::render( $options );
			$atts = $this->get_atts();
			
			$atts['holder_classes']       = $this->getHolderClasses( $atts );
			$atts['holder_styles']        = $this->getHolderStyles( $atts );
			$atts['centered_text_styles'] = $this->getCenteredTextStyles( $atts );
			$atts['holder_data']          = $this->getHolderData( $atts );
			$atts['text_data']            = $this->getModifiedText( $atts );
			$atts['svg_source']           = $this->getSVGParameters( $atts );
			$atts['svg_styles']           = $this->getSignatureStyles( $atts );
			
			return aperitif_core_get_template_part( 'shortcodes/stamp', 'templates/stamp', '', $atts );
		}
		
		private function getHolderClasses( $atts ) {
			$holder_classes = $this->init_holder_classes();
			
			$holder_classes[] = 'qodef-stamp';
			$holderClasses[]  = ! empty( $atts['custom_class'] ) ? esc_attr( $atts['custom_class'] ) : '';
			
			$holder_classes[] = ! empty( $atts['disable_stamp'] ) ? 'qodef-hide-on--' . $atts['disable_stamp'] : '';
			$holder_classes[] = $atts['absolute_position'] === 'yes' ? 'qodef--abs' : '';
			
			return implode( ' ', $holder_classes );
		}
		
		private function getHolderStyles( $atts ) {
			$styles = array();
			
			if ( ! empty( $atts['text_color'] ) ) {
				$styles[] = 'color: ' . $atts['text_color'];
			}
			
			if ( ! empty( $atts['text_font_size'] ) ) {
				$styles[] = 'font-size: ' . intval( $atts['text_font_size'] ) . 'px';
			}
			if ( ! empty( $atts['text_color'] ) ) {
				$styles[] = 'color: ' . $atts['text_color'];
			}
			
			if ( ! empty( $atts['stamp_size'] ) ) {
				$styles[] = 'width: ' . intval( $atts['stamp_size'] ) . 'px';
				$styles[] = 'height: ' . intval( $atts['stamp_size'] ) . 'px';
			}
			
			if ( $atts['top_position'] !== '' ) {
				$styles[] = 'top: ' . $atts['top_position'];
			}
			if ( $atts['bottom_position'] !== '' ) {
				$styles[] = 'bottom: ' . $atts['bottom_position'];
			}
			
			if ( $atts['left_position'] !== '' ) {
				$styles[] = 'left: ' . $atts['left_position'];
			}
			
			if ( $atts['right_position'] !== '' ) {
				$styles[] = 'right: ' . $atts['right_position'];
			}
			
			return implode( ';', $styles );
		}
		
		private function getCenteredtextStyles( $atts ) {
			$styles = array();
			
			if ( ! empty( $atts['centered_text_font_size'] ) ) {
				$styles[] = 'font-size: ' . intval( $atts['centered_text_font_size'] ) . 'px';
			}
			if ( ! empty( $atts['centered_text_color'] ) ) {
				$styles[] = 'color: ' . $atts['centered_text_color'];
			}
			
			return implode( ';', $styles );
		}
		
		private function getHolderData( $atts ) {
			$slider_data = array();
			
			$slider_data['data-appearing-delay'] = ! empty( $atts['appearing_delay'] ) ? intval( $atts['appearing_delay'] ) : 0;
			
			return $slider_data;
		}
		
		private function getModifiedText( $atts ) {
			$text = $atts['text'];
			$data = array(
				'text'  => $this->get_split_text( $text ),
				'count' => count( $this->str_split_unicode( $text ) )
			);
			
			return $data;
		}
		
		private function get_split_text( $text ) {
			if ( ! empty( $text ) ) {
				$split_text = $this->str_split_unicode( $text );
				
				foreach ( $split_text as $key => $value ) {
					$split_text[ $key ] = '<span class="qodef-m-character">' . $value . '</span>';
				}
				
				return implode( ' ', $split_text );
			}
			
			return $text;
		}
		
		function str_split_unicode( $str ) {
			mb_internal_encoding( 'UTF-8' );
			$str = html_entity_decode( $str, ENT_QUOTES, "UTF-8" );
			$len = mb_strlen( $str );
			
			for ( $i = 0; $i < $len; $i ++ ) {
				$result[] = mb_substr( $str, $i, 1, 'UTF-8' );
			}
			
			return $result;
		}
		
		private function getSVGParameters( $atts ) {
			
			if ( ! empty( $atts['signature_svg_code'] ) ) {
				$svg_code = $atts['signature_svg_code'];
			} else {
				$svg_code = '';
			}
			
			return $svg_code;
		}
		
		private function getSignatureStyles( $atts ) {
			$styles = array();
			
			if ( $atts['signature_svg_bottom'] !== '' ) {
				$styles[] = 'bottom: ' . $atts['signature_svg_bottom'];
			}
			
			if ( $atts['signature_svg_left'] !== '' ) {
				$styles[] = 'left: ' . $atts['signature_svg_left'];
			}
			
			return implode( ';', $styles );
		}
	}
}