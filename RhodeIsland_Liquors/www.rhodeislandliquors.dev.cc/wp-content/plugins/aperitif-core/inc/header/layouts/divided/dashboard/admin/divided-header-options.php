<?php

if ( ! function_exists( 'aperitif_core_add_divided_header_options' ) ) {
	function aperitif_core_add_divided_header_options( $page ) {
		
		$section = $page->add_section_element(
			array(
				'name'       => 'qodef_divided_header_section',
				'title'      => esc_html__( 'Divided Header', 'aperitif-core' ),
				'dependency' => array(
					'show' => array(
						'qodef_header_layout' => array(
							'values'        => 'divided',
							'default_value' => ''
						)
					)
				)
			)
		);
		$section->add_field_element(
			array(
				'field_type'    => 'yesno',
				'name'          => 'qodef_divided_header_in_grid',
				'title'         => esc_html__( 'Content in Grid', 'aperitif-core' ),
				'description'   => esc_html__( 'Set content to be in grid', 'aperitif-core' ),
				'default_value' => 'no',
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		$section->add_field_element(
			array(
				'field_type'  => 'text',
				'name'        => 'qodef_divided_header_height',
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
				'name'        => 'qodef_divided_header_background_color',
				'title'       => esc_html__( 'Header Background Color', 'aperitif-core' ),
				'description' => esc_html__( 'Enter header background color', 'aperitif-core' ),
				'args'        => array(
					'suffix' => 'px'
				)
			)
		);
		
	}
	
	add_action( 'aperitif_core_action_after_header_options_map', 'aperitif_core_add_divided_header_options' );
}