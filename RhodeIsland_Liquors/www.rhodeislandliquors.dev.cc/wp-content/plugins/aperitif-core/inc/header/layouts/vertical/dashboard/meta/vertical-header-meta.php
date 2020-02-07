<?php

if ( ! function_exists( 'aperitif_core_add_vertical_header_meta' ) ) {
	function aperitif_core_add_vertical_header_meta( $page ) {
		
		$section = $page->add_section_element(
			array(
				'name'       => 'qodef_vertical_header_section',
				'title'      => esc_html__( 'Vertical Header', 'aperitif-core' ),
				'dependency' => array(
					'show' => array(
						'qodef_header_layout' => array(
							'values'        => 'vertical',
							'default_value' => ''
						)
					)
				)
			)
		);
		
		$section->add_field_element(
			array(
				'field_type'  => 'color',
				'name'        => 'qodef_vertical_header_background_color',
				'title'       => esc_html__( 'Header Background Color', 'aperitif-core' ),
				'description' => esc_html__( 'Enter header background color', 'aperitif-core' )
			)
		);
		
	}
	
	add_action( 'aperitif_core_action_after_page_header_meta_map', 'aperitif_core_add_vertical_header_meta' );
}