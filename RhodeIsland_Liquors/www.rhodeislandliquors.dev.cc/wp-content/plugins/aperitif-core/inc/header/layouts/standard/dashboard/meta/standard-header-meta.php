<?php

if ( ! function_exists( 'aperitif_core_add_standard_header_meta' ) ) {
	function aperitif_core_add_standard_header_meta( $page ) {
		$section = $page->add_section_element(
			array(
				'name'       => 'qodef_standard_header_section',
				'title'      => esc_html__( 'Standard Header', 'aperitif-core' ),
				'dependency' => array(
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
				'field_type'    => 'select',
				'name'          => 'qodef_standard_header_in_grid',
				'title'         => esc_html__( 'Content in Grid', 'aperitif-core' ),
				'description'   => esc_html__( 'Set content to be in grid', 'aperitif-core' ),
				'default_value' => '',
				'options'       => aperitif_core_get_select_type_options_pool( 'no_yes' )
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
					''       => esc_html__( 'Default', 'aperitif-core' ),
					'left'   => esc_html__( 'Left', 'aperitif-core' ),
					'center' => esc_html__( 'Center', 'aperitif-core' ),
					'right'  => esc_html__( 'Right', 'aperitif-core' ),
				)
			)
		);
		
		$section->add_field_element(
			array(
				'field_type'    => 'select',
				'name'          => 'qodef_standard_header_padding',
				'title'         => esc_html__( 'Enable Header Padding', 'aperitif-core' ),
				'description'   => esc_html__( 'Set header to have padding', 'aperitif-core' ),
				'default_value' => '',
				'options'       => aperitif_core_get_select_type_options_pool( 'no_yes' )
			)
		);
	}
	
	add_action( 'aperitif_core_action_after_page_header_meta_map', 'aperitif_core_add_standard_header_meta' );
}