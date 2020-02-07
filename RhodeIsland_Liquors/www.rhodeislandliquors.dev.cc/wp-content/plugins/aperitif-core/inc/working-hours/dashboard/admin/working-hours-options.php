<?php

if ( ! function_exists( 'aperitif_core_add_working_hours_options' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function aperitif_core_add_working_hours_options() {
		$qode_framework = qode_framework_get_framework_root();
		
		$page = $qode_framework->add_options_page(
			array(
				'scope'       => APERITIF_CORE_OPTIONS_NAME,
				'type'        => 'admin',
				'slug'        => 'working-hours',
				'icon'        => 'fa fa-book',
				'title'       => esc_html__( 'Working Hours', 'aperitif-core' ),
				'description' => esc_html__( 'Global settings related to working hours', 'aperitif-core' )
			)
		);
		
		if ( $page ) {
			
			$page->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_working_hours_monday',
					'title'      => esc_html__( 'Working Hours For Monday', 'aperitif-core' )
				)
			);
			
			$page->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_working_hours_tuesday',
					'title'      => esc_html__( 'Working Hours For Tuesday', 'aperitif-core' )
				)
			);
			
			$page->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_working_hours_wednesday',
					'title'      => esc_html__( 'Working Hours For Wednesday', 'aperitif-core' )
				)
			);
			
			$page->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_working_hours_thursday',
					'title'      => esc_html__( 'Working Hours For Thursday', 'aperitif-core' )
				)
			);
			
			$page->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_working_hours_friday',
					'title'      => esc_html__( 'Working Hours For Friday', 'aperitif-core' )
				)
			);
			
			$page->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_working_hours_saturday',
					'title'      => esc_html__( 'Working Hours For Saturday', 'aperitif-core' )
				)
			);
			
			$page->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_working_hours_sunday',
					'title'      => esc_html__( 'Working Hours For Sunday', 'aperitif-core' )
				)
			);
			
			$page->add_field_element(
				array(
					'field_type' => 'checkbox',
					'name'       => 'qodef_working_hours_special_days',
					'title'      => esc_html__( 'Special Days', 'aperitif-core' ),
					'options'    => array(
						'monday'    => esc_html__( 'Monday', 'aperitif-core' ),
						'tuesday'   => esc_html__( 'Tuesday', 'aperitif-core' ),
						'wednesday' => esc_html__( 'Wednesday', 'aperitif-core' ),
						'thursday'  => esc_html__( 'Thursday', 'aperitif-core' ),
						'friday'    => esc_html__( 'Friday', 'aperitif-core' ),
						'saturday'  => esc_html__( 'Saturday', 'aperitif-core' ),
						'sunday'    => esc_html__( 'Sunday', 'aperitif-core' ),
					)
				)
			);
			
			$page->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_working_hours_special_text',
					'title'      => esc_html__( 'Featured Text For Special Days', 'aperitif-core' )
				)
			);
			
			// Hook to include additional options after module options
			do_action( 'aperitif_core_action_after_working_hours_options_map', $page );
		}
	}
	
	add_action( 'aperitif_core_action_default_options_init', 'aperitif_core_add_working_hours_options', aperitif_core_get_admin_options_map_position( 'working-hours' ) );
}