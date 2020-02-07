<?php

if ( ! function_exists( 'aperitif_core_add_standard_header_options' ) ) {
	function aperitif_core_add_standard_header_options( $page ) {
		
		$section = $page->add_section_element(
			array(
				'name'        => 'qodef_standard_header_section',
				'title'       => esc_html__( 'Standard Header', 'aperitif-core' ),
				'description' => esc_html__( 'Standard header settings', 'aperitif-core' ),
				'dependency'  => array(
					'show' => array(
						'qodef_header_layout' => array(
							'values'        => 'standard',
							'default_value' => ''
						)
					)
				)
			)
		);
		
		$section->add_field_element(
			array(
				'field_type'    => 'yesno',
				'name'          => 'qodef_standard_header_in_grid',
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
				'name'        => 'qodef_standard_header_height',
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
				'name'        => 'qodef_standard_header_background_color',
				'title'       => esc_html__( 'Header Background Color', 'aperitif-core' ),
				'description' => esc_html__( 'Enter header background color', 'aperitif-core' )
			)
		);
		
		$section->add_field_element(
			array(
				'field_type'    => 'select',
				'name'          => 'qodef_standard_header_menu_position',
				'title'         => esc_html__( 'Menu position', 'aperitif-core' ),
				'default_value' => 'right',
				'options'       => array(
					'left'   => esc_html__( 'Left', 'aperitif-core' ),
					'center' => esc_html__( 'Center', 'aperitif-core' ),
					'right'  => esc_html__( 'Right', 'aperitif-core' ),
				)
			)
		);
		
		$section->add_field_element(
			array(
				'field_type'    => 'yesno',
				'name'          => 'qodef_standard_header_padding',
				'title'         => esc_html__( 'Enable Header Padding', 'aperitif-core' ),
				'description'   => esc_html__( 'Set header to have padding', 'aperitif-core' ),
				'default_value' => 'no'
			)
		);
	}
	
	add_action( 'aperitif_core_action_after_header_options_map', 'aperitif_core_add_standard_header_options' );
}