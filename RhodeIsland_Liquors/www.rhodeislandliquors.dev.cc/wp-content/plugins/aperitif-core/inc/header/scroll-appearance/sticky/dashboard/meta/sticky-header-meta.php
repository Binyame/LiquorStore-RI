<?php

if ( ! function_exists( 'aperitif_core_add_sticky_header_meta_options' ) ) {
	function aperitif_core_add_sticky_header_meta_options( $page, $custom_sidebars ) {
		
		if ( $page ) {
			
			$page->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_sticky_header_scroll_amount',
					'title'       => esc_html__( 'Sticky Scroll Amount', 'aperitif-core' ),
					'description' => esc_html__( 'Enter scroll amount for sticky header to appear', 'aperitif-core' ),
					'args'        => array(
						'suffix' => 'px'
					),
					'dependency'  => array(
						'show' => array(
							'qodef_header_scroll_appearance' => array(
								'values'        => 'sticky',
								'default_value' => ''
							)
						)
					)
				)
			);
			
			$page->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_sticky_header_custom_widget_area_one',
					'title'       => esc_html__( 'Choose Custom Sticky Header Widget Area One', 'aperitif-core' ),
					'description' => esc_html__( 'Choose custom widget area to display in sticky header widget area one', 'aperitif-core' ),
					'options'     => $custom_sidebars,
					'dependency'  => array(
						'show' => array(
							'qodef_header_scroll_appearance' => array(
								'values'        => 'sticky',
								'default_value' => ''
							)
						)
					)
				)
			);
			
			$page->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_sticky_header_custom_widget_area_two',
					'title'       => esc_html__( 'Choose Custom Sticky Header Widget Area Two', 'aperitif-core' ),
					'description' => esc_html__( 'Choose custom widget area to display in sticky header widget area two', 'aperitif-core' ),
					'options'     => $custom_sidebars,
					'dependency'  => array(
						'show' => array(
							'qodef_header_scroll_appearance' => array(
								'values'        => 'sticky',
								'default_value' => ''
							)
						)
					)
				)
			);
		}
	}
	
	add_action( 'aperitif_core_action_after_custom_widget_area_header_meta_map', 'aperitif_core_add_sticky_header_meta_options', 10, 2 );
}