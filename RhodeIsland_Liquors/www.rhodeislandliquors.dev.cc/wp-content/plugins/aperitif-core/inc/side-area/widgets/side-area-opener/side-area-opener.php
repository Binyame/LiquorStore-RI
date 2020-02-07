<?php

if ( ! function_exists( 'aperitif_core_add_side_area_opener_widget' ) ) {
	/**
	 * Function that add widget into widgets list for registration
	 *
	 * @param $widgets array
	 *
	 * @return array
	 */
	function aperitif_core_add_side_area_opener_widget( $widgets ) {
		$widgets[] = 'AperitifCoreSideAreaOpenerWidget';
		
		return $widgets;
	}
	
	add_filter( 'aperitif_core_filter_register_widgets', 'aperitif_core_add_side_area_opener_widget' );
}

if ( class_exists( 'QodeFrameworkWidget' ) ) {
	class AperitifCoreSideAreaOpenerWidget extends QodeFrameworkWidget {
		
		public function map_widget() {
			$this->set_base( 'aperitif_core_side_area_opener' );
			$this->set_name( esc_html__( 'Aperitif Side Area Opener', 'aperitif-core' ) );
			$this->set_description( esc_html__( 'Display a "hamburger" icon that opens the side area', 'aperitif-core' ) );
			$this->set_widget_option(
				array(
					'field_type'  => 'text',
					'name'        => 'sidea_area_opener_margin',
					'title'       => esc_html__( 'Opener Margin', 'aperitif-core' ),
					'description' => esc_html__( 'Insert margin in format: top right bottom left', 'aperitif-core' )
				)
			);
			$this->set_widget_option(
				array(
					'field_type' => 'color',
					'name'       => 'side_area_opener_color',
					'title'      => esc_html__( 'Opener Color', 'aperitif-core' )
				)
			);
			$this->set_widget_option(
				array(
					'field_type' => 'color',
					'name'       => 'side_area_opener_hover_color',
					'title'      => esc_html__( 'Opener Hover Color', 'aperitif-core' )
				)
			);
		}
		
		public function render( $atts ) {
			$styles = array();
			
			if ( ! empty( $atts['side_area_opener_color'] ) ) {
				$styles[] = 'color: ' . $atts['side_area_opener_color'] . ';';
			}
			
			if ( ! empty( $atts['sidea_area_opener_margin'] ) ) {
				$styles[] = 'margin: ' . $atts['sidea_area_opener_margin'];
			}
			?>
			<a itemprop="url"
			   class="qodef-side-area-opener <?php echo aperitif_core_get_open_close_icon_class( 'qodef_side_area_icon_source', 'qodef-side-area-opener' ); ?>" <?php qode_framework_inline_attr( $atts['side_area_opener_hover_color'], 'data-hover-color' ); ?> <?php qode_framework_inline_style( $styles ); ?>
			   href="#">
				<?php echo aperitif_core_get_side_area_icon_html(); ?>
			</a>
			<?php
		}
	}
}