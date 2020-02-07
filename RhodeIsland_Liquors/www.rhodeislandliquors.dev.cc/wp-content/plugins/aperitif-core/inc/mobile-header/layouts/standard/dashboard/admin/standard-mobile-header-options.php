<?php

if ( ! function_exists( 'aperitif_core_add_standard_mobile_header_options' ) ) {
	function aperitif_core_add_standard_mobile_header_options( $page ) {
		
		$section = $page->add_section_element(
			array(
				'name'       => 'qodef_standard_mobile_header_section',
				'title'      => esc_html__( 'Standard Mobile Header', 'aperitif-core' ),
				'dependency' => array(
					'show' => array(
						'qodef_mobile_header_layout' => array(
							'values'        => 'standard',
							'default_value' => ''
						)
					)
				)
			)
		);
		
		$section->add_field_element(
			array(
				'field_type' => 'image',
				'name'       => 'qodef_standard_mobile_header_background_image',
				'title'      => esc_html__( 'Mobile Menu Background Image', 'aperitif-core' )
			)
		);
		
		$section->add_field_element(
			array(
				'field_type'  => 'text',
				'name'        => 'qodef_standard_mobile_header_height',
				'title'       => esc_html__( 'Header Height', 'aperitif-core' ),
				'description' => esc_html__( 'Enter header height', 'aperitif-core' ),
				'args'        => array(
					'suffix' => 'px'
				)
			)
		);
		
		$section->add_field_element(
			array(
				'field_type'  => 'color',
				'name'        => 'qodef_standard_mobile_header_background_color',
				'title'       => esc_html__( 'Header Background Color', 'aperitif-core' ),
				'description' => esc_html__( 'Enter header background color', 'aperitif-core' ),
				'args'        => array(
					'suffix' => 'px'
				)
			)
		);
	}
	
	add_action( 'aperitif_core_action_after_mobile_header_options_map', 'aperitif_core_add_standard_mobile_header_options' );
}