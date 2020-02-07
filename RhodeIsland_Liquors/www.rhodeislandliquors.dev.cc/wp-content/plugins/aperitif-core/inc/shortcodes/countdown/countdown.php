<?php

if ( ! function_exists( 'aperitif_core_add_countdown_shortcode' ) ) {
	/**
	 * Function that add shortcode into shortcodes list for registration
	 *
	 * @param $shortcodes array
	 *
	 * @return array
	 */
	function aperitif_core_add_countdown_shortcode( $shortcodes ) {
		$shortcodes[] = 'AperitifCoreCountdownShortcode';
		
		return $shortcodes;
	}
	
	add_filter( 'aperitif_core_filter_register_shortcodes', 'aperitif_core_add_countdown_shortcode' );
}

if ( class_exists( 'AperitifCoreShortcode' ) ) {
	class AperitifCoreCountdownShortcode extends AperitifCoreShortcode {
		
		public function __construct() {
			$this->set_layouts( apply_filters( 'aperitif_core_filter_countdown_layouts', array() ) );
			
			parent::__construct();
		}
		
		public function map_shortcode() {
			$this->set_shortcode_path( APERITIF_CORE_SHORTCODES_URL_PATH . '/countdown' );
			$this->set_base( 'aperitif_core_countdown' );
			$this->set_name( esc_html__( 'Countdown', 'aperitif-core' ) );
			$this->set_description( esc_html__( 'Shortcode that displays countdown with provided parameters', 'aperitif-core' ) );
			$this->set_category( esc_html__( 'Aperitif Core', 'aperitif-core' ) );
			
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
				'field_type'  => 'date',
				'name'        => 'date',
				'title'       => esc_html__( 'Date', 'aperitif-core' ),
				'description' => esc_html__( 'Format: Y/m/d', 'aperitif-core' )
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'date_hour',
				'title'      => esc_html__( 'Hour', 'aperitif-core' )
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'date_minute',
				'title'      => esc_html__( 'Minute', 'aperitif-core' )
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'week_label',
				'title'      => esc_html__( 'Week Label', 'aperitif-core' )
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'week_label_plural',
				'title'      => esc_html__( 'Week Label Plural', 'aperitif-core' )
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'day_label',
				'title'      => esc_html__( 'Day Label', 'aperitif-core' )
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'day_label_plural',
				'title'      => esc_html__( 'Day Label Plural', 'aperitif-core' )
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'minute_label',
				'title'      => esc_html__( 'Minute Label', 'aperitif-core' )
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'minute_label_plural',
				'title'      => esc_html__( 'Minute Label Plural', 'aperitif-core' )
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'second_label',
				'title'      => esc_html__( 'Second Label', 'aperitif-core' )
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'second_label_plural',
				'title'      => esc_html__( 'Second Label Plural', 'aperitif-core' )
			) );
			$this->set_option( array(
				'field_type' => 'select',
				'name'       => 'skin',
				'title'      => esc_html__( 'Skin', 'aperitif-core' ),
				'options'    => array(
					''      => esc_html__( 'Default', 'aperitif-core' ),
					'light' => esc_html__( 'Light', 'aperitif-core' )
				)
			) );
		}
		
		public function load_assets() {
			wp_enqueue_script( 'countdown', APERITIF_CORE_INC_URL_PATH . '/shortcodes/countdown/assets/js/plugins/jquery.countdown.min.js', array( 'jquery' ), true );
		}
		
		public function render( $options, $content = null ) {
			parent::render( $options );
			$atts = $this->get_atts();
			
			$atts['data_attrs']     = $this->get_data_attrs( $atts );
			$atts['holder_classes'] = $this->get_holder_classes( $atts );
			
			return aperitif_core_get_template_part( 'shortcodes/countdown', 'variations/' . $atts['layout'] . '/templates/countdown', '', $atts );
		}
		
		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();
			
			$holder_classes[] = 'qodef-countdown';
			$holder_classes[] = 'qodef-show--5';
			
			$holder_classes[] = ! empty( $atts['skin'] ) ? 'qodef-countdown--' . $atts['skin'] : '';
			$holder_classes[] = ! empty( $atts['layout'] ) ? 'qodef-layout--' . $atts['layout'] : '';
			
			return implode( ' ', $holder_classes );
		}
		
		private function get_data_attrs( $atts ) {
			$data = array();
			
			if ( ! empty( $atts['date'] ) ) {
				$date              = $atts['date'];
				$date_formatted    = date( 'Y/m/d', strtotime( $date ) );
				$hour              = ! empty ( $atts['date_hour'] ) ? $atts['date_hour'] : '00';
				$minute            = ! empty ( $atts['date_minute'] ) ? $atts['date_minute'] : '00';
				$date              = $date_formatted . ' ' . $hour . ':' . $minute . ':00';
				$data['data-date'] = $date;
			}
			
			if ( ! empty( $atts['week_label'] ) ) {
				$data['data-week-label'] = $atts['week_label'];
			} else {
				$data['data-week-label'] = esc_html__( 'Week', 'aperitif-core' );
			}
			
			if ( ! empty( $atts['week_label_plural'] ) ) {
				$data['data-week-label-plural'] = $atts['week_label_plural'];
			} else {
				$data['data-week-label-plural'] = esc_html__( 'Weeks', 'aperitif-core' );
			}
			
			if ( ! empty( $atts['day_label'] ) ) {
				$data['data-day-label'] = $atts['day_label'];
			} else {
				$data['data-day-label'] = esc_html__( 'Day', 'aperitif-core' );
			}
			
			if ( ! empty( $atts['day_label_plural'] ) ) {
				$data['data-day-label-plural'] = $atts['day_label_plural'];
			} else {
				$data['data-day-label-plural'] = esc_html__( 'Days', 'aperitif-core' );
			}
			
			if ( ! empty( $atts['hour_label'] ) ) {
				$data['data-hour-label'] = $atts['hour_label'];
			} else {
				$data['data-hour-label'] = esc_html__( 'Hour', 'aperitif-core' );
			}
			
			if ( ! empty( $atts['hour_label_plural'] ) ) {
				$data['data-hour-label-plural'] = $atts['hour_label_plural'];
			} else {
				$data['data-hour-label-plural'] = esc_html__( 'Hours', 'aperitif-core' );
			}
			
			if ( ! empty( $atts['minute_label'] ) ) {
				$data['data-minute-label'] = $atts['minute_label'];
			} else {
				$data['data-minute-label'] = esc_html__( 'Minute', 'aperitif-core' );
			}
			
			if ( ! empty( $atts['minute_label_plural'] ) ) {
				$data['data-minute-label-plural'] = $atts['minute_label_plural'];
			} else {
				$data['data-minute-label-plural'] = esc_html__( 'Minutes', 'aperitif-core' );
			}
			
			if ( ! empty( $atts['second_label'] ) ) {
				$data['data-second-label'] = $atts['second_label'];
			} else {
				$data['data-second-label'] = esc_html__( 'Second', 'aperitif-core' );
			}
			
			if ( ! empty( $atts['second_label_plural'] ) ) {
				$data['data-second-label-plural'] = $atts['second_label_plural'];
			} else {
				$data['data-second-label-plural'] = esc_html__( 'Seconds', 'aperitif-core' );
			}
			
			return $data;
		}
	}
}