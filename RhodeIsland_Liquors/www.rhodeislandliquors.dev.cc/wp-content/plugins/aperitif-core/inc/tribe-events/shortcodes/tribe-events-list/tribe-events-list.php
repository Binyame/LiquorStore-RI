<?php

if ( ! function_exists( 'aperitif_core_add_tribe_events_list_shortcode' ) ) {
	/**
	 * Function that is adding shortcode into shortcodes list for registration
	 *
	 * @param array $shortcodes - Array of registered shortcodes
	 *
	 * @return array
	 */
	function aperitif_core_add_tribe_events_list_shortcode( $shortcodes ) {
		$shortcodes[] = 'AperitifCoreTribeEventsListShortcode';
		
		return $shortcodes;
	}
	
	add_filter( 'aperitif_core_filter_register_shortcodes', 'aperitif_core_add_tribe_events_list_shortcode' );
}

if ( class_exists( 'AperitifCoreListShortcode' ) ) {
	class AperitifCoreTribeEventsListShortcode extends AperitifCoreListShortcode {
		
		public function __construct() {
			$this->set_post_type( 'tribe_events' );
			$this->set_layouts( apply_filters( 'aperitif_core_filter_tribe_events_list_layouts', array() ) );
			
			parent::__construct();
		}
		
		public function map_shortcode() {
			$this->set_shortcode_path( APERITIF_CORE_INC_URL_PATH . '/tribe-events/shortcodes/tribe-events-list' );
			$this->set_base( 'aperitif_core_tribe_events_list' );
			$this->set_name( esc_html__( 'Tribe Events List', 'aperitif-core' ) );
			$this->set_description( esc_html__( 'Shortcode that displays tribe events list', 'aperitif-core' ) );
			$this->set_category( esc_html__( 'Aperitif Core', 'aperitif-core' ) );
			
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'custom_class',
				'title'      => esc_html__( 'Custom Class', 'aperitif-core' )
			) );
			$this->map_list_options( array(
				'exclude_behavior' => array( 'masonry', 'justified-gallery', 'slider' ),
				'default_columns'  => '2',
			) );
			$this->map_query_options( array( 'post_type' => $this->get_post_type() ) );
			$this->map_layout_options( array(
				'layouts' => $this->get_layouts()
			) );
			$this->map_extra_options();
		}
		
		public function render( $options, $content = null ) {
			parent::render( $options );
			
			$atts = $this->get_atts();
			
			$atts['post_type'] = $this->get_post_type();
			
			// Additional query args
			$atts['additional_query_args'] = $this->get_additional_query_args( $atts );
			
			$atts['holder_classes'] = $this->get_holder_classes( $atts );
			$atts['item_classes']   = $this->get_item_classes( $atts );
			
			$atts['query_result'] = new \WP_Query( aperitif_core_get_query_params( $atts ) );
			
			$atts['this_shortcode'] = $this;
			
			return aperitif_core_get_template_part( 'tribe-events/shortcodes/tribe-events-list', 'templates/content', '', $atts );
		}
		
		private function get_holder_classes( $atts ) {
			$holder_classes   = $this->init_holder_classes();
			$holder_classes[] = 'qodef-events-list';
			
			$holder_classes[] = ! empty( $atts['custom_class'] ) ? esc_attr( $atts['custom_class'] ) : '';
			
			$list_classes   = $this->get_list_classes( $atts );
			$holder_classes = array_merge( $holder_classes, $list_classes );
			
			return implode( ' ', $holder_classes );
		}
		
		public function get_item_classes( $atts ) {
			$item_classes = $this->init_item_classes();
			
			$list_item_classes = $this->get_list_item_classes( $atts );
			$item_classes      = array_merge( $item_classes, $list_item_classes );
			
			return implode( ' ', $item_classes );
		}
		
		public function get_title_styles( $atts ) {
			$styles = array();
			
			if ( ! empty( $atts['text_transform'] ) ) {
				$styles[] = 'text-transform: ' . $atts['text_transform'];
			}
			
			return $styles;
		}
		
	}
}