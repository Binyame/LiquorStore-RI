<?php

if ( ! function_exists( 'aperitif_core_add_spinners_options' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function aperitif_core_add_spinners_options( $page ) {
		
		if ( $page ) {
			$page->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_page_enable_loader',
					'title'         => esc_html__( 'Enable Page Loader', 'aperitif-core' ),
					'description'   => esc_html__( 'Enable Page Loader Effect', 'aperitif-core' ),
					'default_value' => 'no'
				)
			);

			$page->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_page_spinners',
					'title'       => esc_html__( 'Select Page Spinner Effect', 'aperitif-core' ),
					'description' => esc_html__( 'Choose a loader spinner animation style', 'aperitif-core' ),
					'options'     => array(
						''       				=> esc_html__( 'Default', 'aperitif-core' ),
						'aperitif_spinner'      => esc_html__( 'Aperitif Spinner', 'aperitif-core' ),
						'rotate_circles'        => esc_html__( 'Rotate Circles', 'aperitif-core' ),
						'pulse'                 => esc_html__( 'Pulse', 'aperitif-core' ),
						'double_pulse'          => esc_html__( 'Double Pulse', 'aperitif-core' ),
						'cube'                  => esc_html__( 'Cube', 'aperitif-core' ),
						'rotating_cubes'        => esc_html__( 'Rotating Cubes', 'aperitif-core' ),
						'stripes'               => esc_html__( 'Stripes', 'aperitif-core' ),
						'wave'                  => esc_html__( 'Wave', 'aperitif-core' ),
						'two_rotating_circles'  => esc_html__( '2 Rotating Circles', 'aperitif-core' ),
						'five_rotating_circles' => esc_html__( '5 Rotating Circles', 'aperitif-core' ),
						'atom'                  => esc_html__( 'Atom', 'aperitif-core' ),
						'clock'                 => esc_html__( 'Clock', 'aperitif-core' ),
						'mitosis'               => esc_html__( 'Mitosis', 'aperitif-core' ),
						'lines'                 => esc_html__( 'Lines', 'aperitif-core' ),
						'fussion'               => esc_html__( 'Fussion', 'aperitif-core' ),
						'wave_circles'          => esc_html__( 'Wave Circles', 'aperitif-core' ),
						'pulse_circles'         => esc_html__( 'Pulse Circles', 'aperitif-core' )
					),
					'dependency' => array(
						'hide' => array(
							'qodef_page_enable_loader' => array(
								'values'        => 'no',
								'default_value' => ''
							)
						)
					)
				)
			);

			$page->add_field_element(
				array(
					'field_type'  => 'color',
					'name'        => 'qodef_page_spinner_background_color',
					'title'       => esc_html__( 'Spinner Background Color', 'aperitif-core' ),
					'description' => esc_html__( 'Choose the spinner background color', 'aperitif-core' ),
					'dependency' => array(
						'hide' => array(
							'qodef_page_enable_loader' => array(
								'values'        => 'no',
								'default_value' => ''
							)
						)
					)
				)
			);

			$page->add_field_element(
				array(
					'field_type'  => 'color',
					'name'        => 'qodef_page_spinner_color',
					'title'       => esc_html__( 'Spinner Color', 'aperitif-core' ),
					'description' => esc_html__( 'Choose the spinner color', 'aperitif-core' ),
					'dependency' => array(
						'hide' => array(
							'qodef_page_enable_loader' => array(
								'values'        => 'no',
								'default_value' => ''
							)
						)
					)
				)
			);
		}
	}
	
	add_action( 'aperitif_core_action_after_general_options_map', 'aperitif_core_add_spinners_options' );
	add_action( 'aperitif_core_action_after_general_page_meta_box_map', 'aperitif_core_add_spinners_options', 9 );
}