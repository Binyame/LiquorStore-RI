<?php

if ( ! function_exists( 'aperitif_core_add_highlight_shortcode' ) ) {
	/**
	 * Function that add shortcode into shortcodes list for registration
	 *
	 * @param $shortcodes array
	 *
	 * @return array
	 */
	function aperitif_core_add_highlight_shortcode( $shortcodes ) {
		$shortcodes[] = 'AperitifCoreHighlightShortcode';
		
		return $shortcodes;
	}
	
	add_filter( 'aperitif_core_filter_register_shortcodes', 'aperitif_core_add_highlight_shortcode' );
}

if ( class_exists( 'AperitifCoreShortcode' ) ) {
	class AperitifCoreHighlightShortcode extends AperitifCoreShortcode {
		
		public function map_shortcode() {
			$this->set_shortcode_path( APERITIF_CORE_SHORTCODES_URL_PATH . '/highlight' );
			$this->set_base( 'aperitif_core_highlight' );
			$this->set_name( esc_html__( 'Highlight', 'aperitif-core' ) );
			$this->set_description( esc_html__( 'Shortcode that displays highlight with provided parameters', 'aperitif-core' ) );
			$this->set_category( esc_html__( 'Aperitif Core', 'aperitif-core' ) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'custom_class',
				'title'      => esc_html__( 'Custom Class', 'aperitif-core' ),
			) );
			$this->set_option( array(
				'field_type' => 'textarea',
				'name'       => 'text',
				'title'      => esc_html__( 'Text', 'aperitif-core' )
			) );
			$this->set_option( array(
				'field_type'    => 'select',
				'name'          => 'text_tag',
				'title'         => esc_html__( 'Text Tag', 'aperitif-core' ),
				'options'       => aperitif_core_get_select_type_options_pool( 'title_tag' ),
				'default_value' => 'p',
			) );
			$this->set_option( array(
				'field_type' => 'color',
				'name'       => 'text_color',
				'title'      => esc_html__( 'Text Color', 'aperitif-core' )
			) );
			$this->set_option( array(
				'field_type'  => 'text',
				'name'        => 'line_break_positions',
				'title'       => esc_html__( 'Positions of Line Break', 'aperitif-core' ),
				'description' => esc_html__( 'Enter the positions of the words after which you would like to create a line break. Separate the positions with commas (e.g. if you would like the first, third, and fourth word to have a line break, you would enter "1,3,4")', 'aperitif-core' )
			) );
			$this->set_option( array(
				'field_type'    => 'select',
				'name'          => 'disable_title_break_words',
				'title'         => esc_html__( 'Disable Title Line Break', 'aperitif-core' ),
				'description'   => esc_html__( 'Enabling this option will disable title line breaks for screen size 1024 and lower', 'aperitif-core' ),
				'options'       => aperitif_core_get_select_type_options_pool( 'no_yes', false ),
				'default_value' => 'no'
			) );
			$this->set_option( array(
				'field_type'  => 'text',
				'name'        => 'highlight_position',
				'title'       => esc_html__( 'Highlight Text Position', 'aperitif-core' ),
				'description' => esc_html__( 'Enter the positions of the words you would like to display as "highlight" text. Separate start and end positions with commas (e.g. if you would like to wrap from fifth to ninth words, you would enter "5,9") or if you want to highlight whole text fill -1', 'aperitif-core' ),
			) );
			$this->set_option( array(
				'field_type' => 'color',
				'name'       => 'highlight_color',
				'title'      => esc_html__( 'Highlight Text Color', 'aperitif-core' )
			) );
			$this->set_option( array(
				'field_type' => 'color',
				'name'       => 'highlight_background_color',
				'title'      => esc_html__( 'Highlight Text Background Color', 'aperitif-core' )
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
		}
		
		public function render( $options, $content = null ) {
			parent::render( $options );
			$atts = $this->get_atts();
			
			$atts['holder_classes'] = $this->get_holder_classes( $atts );
			$atts['holder_styles']  = $this->get_holder_styles( $atts );
			$atts['text']           = $this->get_modified_title( $atts );
			
			return aperitif_core_get_template_part( 'shortcodes/highlight', 'templates/highlight', '', $atts );
		}
		
		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();
			
			$holder_classes[] = 'qodef-highlight';
			$holder_classes[] = $atts['disable_title_break_words'] === 'yes' ? 'qodef-title-break--disabled' : '';
			
			return implode( ' ', $holder_classes );
		}
		
		private function get_holder_styles( $atts ) {
			$styles = array();
			
			if ( ! empty( $atts['text_color'] ) ) {
				$styles[] = 'color: ' . $atts['text_color'];
			}
			
			return $styles;
		}
		
		private function get_modified_title( $atts ) {
			$text = $atts['text'];
			
			if ( ! empty( $text ) && ! empty( $atts['highlight_position'] ) ) {
				
				$highlight_styles   = $this->get_highlight_styles( $atts );
				$highlight_position = $atts['highlight_position'];
				$text_prefix        = '<span class="qodef-highlight-text" ' . qode_framework_get_inline_style( $highlight_styles ) . '>';
				$text_suffix        = '</span>';
				$text_break         = '<br>';
				
				if ( $highlight_position === '-1' ) {
					
					if ( ! empty( $atts['line_break_positions'] ) ) {
						$split_title          = explode( ' ', $text );
						$line_break_positions = explode( ',', str_replace( ' ', '', $atts['line_break_positions'] ) );
						
						foreach ( $line_break_positions as $position ) {
							if ( isset( $split_title[ $position - 1 ] ) && ! empty( $split_title[ $position - 1 ] ) ) {
								$split_title[ $position - 1 ] = $split_title[ $position - 1 ] . $text_break;
							}
						}
						
						$text = implode( ' ', $split_title );
					}
					
					$text = $text_prefix . $text . $text_suffix;
				} else {
					$split_text           = explode( ' ', $text );
					$highlight_position   = explode( ',', str_replace( ' ', '', $atts['highlight_position'] ) );
					$line_break_positions = explode( ',', str_replace( ' ', '', $atts['line_break_positions'] ) );
					$positions            = array_filter( array(
						'start' => isset( $highlight_position[0] ) ? $highlight_position[0] : '',
						'end'   => isset( $highlight_position[1] ) ? $highlight_position[1] : ''
					) );
					$positions            = array_merge( $positions, $line_break_positions );
					asort( $positions );
					if ( ! empty( $positions ) ) {
						foreach ( $positions as $key => $value ) {
							$text_prefix_html = $key === 'start' ? $text_prefix : '';
							$text_suffix_html = $key === 'end' ? $text_suffix : '';
							$text_break_html  = in_array( $value, $line_break_positions ) && $key !== 'start' && $key !== 'end' ? $text_break : '';
							if ( isset( $split_text[ $value - 1 ] ) && ! empty( $split_text[ $value - 1 ] ) ) {
								$split_text[ $value - 1 ] = $text_prefix_html . $split_text[ $value - 1 ] . $text_suffix_html . $text_break_html;
							}
						}
						
						$text = implode( ' ', $split_text );
					}
				}
			} else {
				$text_break = '<br>';
				if ( ! empty( $atts['line_break_positions'] ) ) {
					$split_title          = explode( ' ', $text );
					$line_break_positions = explode( ',', str_replace( ' ', '', $atts['line_break_positions'] ) );
					
					foreach ( $line_break_positions as $position ) {
						if ( isset( $split_title[ $position - 1 ] ) && ! empty( $split_title[ $position - 1 ] ) ) {
							$split_title[ $position - 1 ] = $split_title[ $position - 1 ] . $text_break;
						}
					}
					
					$text = implode( ' ', $split_title );
				}
			}
			
			return $text;
		}
		
		private function get_highlight_styles( $atts ) {
			$styles = array();
			
			if ( ! empty( $atts['highlight_color'] ) ) {
				$styles[] = 'color: ' . $atts['highlight_color'];
			}
			
			if ( ! empty( $atts['highlight_background_color'] ) ) {
				$styles[] = 'background-color: ' . $atts['highlight_background_color'];
			}
			
			return $styles;
		}
	}
}
