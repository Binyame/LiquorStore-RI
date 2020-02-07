<?php

if ( ! function_exists( 'aperitif_core_add_h1_typography_options' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function aperitif_core_add_h1_typography_options( $page ) {
		
		if ( $page ) {
			$h1_tab = $page->add_tab_element(
				array(
					'name'        => 'tab-h1',
					'icon'        => 'fa fa-cog',
					'title'       => esc_html__( 'H1 Typography', 'aperitif-core' ),
					'description' => esc_html__( 'Set values for Heading 1 html element', 'aperitif-core' )
				)
			);
			
			$h1_typography_section = $h1_tab->add_section_element(
				array(
					'name'  => 'qodef_h1_typography_section',
					'title' => esc_html__( 'General Typography', 'aperitif-core' )
				)
			);
			
			$h1_typography_row = $h1_typography_section->add_row_element(
				array(
					'name' => 'qodef_h1_typography_row',
				)
			);
			
			$h1_typography_row->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_h1_color',
					'title'      => esc_html__( 'Color', 'aperitif-core' ),
					'args'       => array(
						'col_width' => 3
					)
				)
			);
			
			$h1_typography_row->add_field_element(
				array(
					'field_type' => 'font',
					'name'       => 'qodef_h1_font_family',
					'title'      => esc_html__( 'Font Family', 'aperitif-core' ),
					'args'       => array(
						'col_width' => 3
					)
				)
			);
			
			$h1_typography_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h1_font_size',
					'title'      => esc_html__( 'Font Size', 'aperitif-core' ),
					'args'       => array(
						'col_width' => 3
					)
				)
			);
			
			$h1_typography_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h1_line_height',
					'title'      => esc_html__( 'Line Height', 'aperitif-core' ),
					'args'       => array(
						'col_width' => 3
					)
				)
			);
			
			$h1_typography_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h1_letter_spacing',
					'title'      => esc_html__( 'Letter Spacing', 'aperitif-core' ),
					'args'       => array(
						'col_width' => 3
					)
				)
			);
			
			$h1_typography_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_h1_font_weight',
					'title'      => esc_html__( 'Font Weight', 'aperitif-core' ),
					'options'    => aperitif_core_get_select_type_options_pool( 'font_weight' ),
					'args'       => array(
						'col_width' => 3
					)
				)
			);
			
			$h1_typography_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_h1_text_transform',
					'title'      => esc_html__( 'Text Transform', 'aperitif-core' ),
					'options'    => aperitif_core_get_select_type_options_pool( 'text_transform' ),
					'args'       => array(
						'col_width' => 3
					)
				)
			);
			
			$h1_typography_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_h1_font_style',
					'title'      => esc_html__( 'Font Style', 'aperitif-core' ),
					'options'    => aperitif_core_get_select_type_options_pool( 'font_style' ),
					'args'       => array(
						'col_width' => 3
					)
				)
			);
			
			$h1_typography_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h1_margin_top',
					'title'      => esc_html__( 'Margin Top', 'aperitif-core' ),
					'args'       => array(
						'col_width' => 3
					)
				)
			);
			
			$h1_typography_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h1_margin_bottom',
					'title'      => esc_html__( 'Margin Bottom', 'aperitif-core' ),
					'args'       => array(
						'col_width' => 3
					)
				)
			);
			
			/* 1024 styles */
			$h1_1024_typography_section = $h1_tab->add_section_element(
				array(
					'name'  => 'qodef_responsive_1024_typography_h1',
					'title' => esc_html__( 'Responsive 1024 Typography', 'aperitif-core' )
				)
			);
			
			$responsive_1024_typography_h1_row = $h1_1024_typography_section->add_row_element(
				array(
					'name' => 'qodef_responsive_1024_h1_typography_row'
				)
			);
			
			$responsive_1024_typography_h1_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h1_responsive_1024_font_size',
					'title'      => esc_html__( 'Font Size', 'aperitif-core' ),
					'args'       => array(
						'col_width' => 4
					)
				)
			);
			
			$responsive_1024_typography_h1_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h1_responsive_1024_line_height',
					'title'      => esc_html__( 'Line Height', 'aperitif-core' ),
					'args'       => array(
						'col_width' => 4
					)
				)
			);
			
			$responsive_1024_typography_h1_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h1_responsive_1024_letter_spacing',
					'title'      => esc_html__( 'Letter Spacing', 'aperitif-core' ),
					'args'       => array(
						'col_width' => 4
					)
				)
			);
			
			/* 768 styles */
			$h1_768_typography_section = $h1_tab->add_section_element(
				array(
					'name'  => 'qodef_responsive_768_typography_h1',
					'title' => esc_html__( 'Responsive 768 Typography', 'aperitif-core' )
				)
			);
			
			$responsive_768_typography_h1_row = $h1_768_typography_section->add_row_element(
				array(
					'name' => 'qodef_responsive_768_h1_typography_row'
				)
			);
			
			$responsive_768_typography_h1_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h1_responsive_768_font_size',
					'title'      => esc_html__( 'Font Size', 'aperitif-core' ),
					'args'       => array(
						'col_width' => 4
					)
				)
			);
			
			$responsive_768_typography_h1_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h1_responsive_768_line_height',
					'title'      => esc_html__( 'Line Height', 'aperitif-core' ),
					'args'       => array(
						'col_width' => 4
					)
				)
			);
			
			$responsive_768_typography_h1_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h1_responsive_768_letter_spacing',
					'title'      => esc_html__( 'Letter Spacing', 'aperitif-core' ),
					'args'       => array(
						'col_width' => 4
					)
				)
			);
			
			/* 680 styles */
			$h1_680_typography_section = $h1_tab->add_section_element(
				array(
					'name'  => 'qodef_responsive_680_typography_h1',
					'title' => esc_html__( 'Responsive 680 Typography', 'aperitif-core' )
				)
			);
			
			$responsive_680_typography_h1_row = $h1_680_typography_section->add_row_element(
				array(
					'name' => 'qodef_responsive_680_h1_typography_row'
				)
			);
			
			$responsive_680_typography_h1_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h1_responsive_680_font_size',
					'title'      => esc_html__( 'Font Size', 'aperitif-core' ),
					'args'       => array(
						'col_width' => 4
					)
				)
			);
			
			$responsive_680_typography_h1_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h1_responsive_680_line_height',
					'title'      => esc_html__( 'Line Height', 'aperitif-core' ),
					'args'       => array(
						'col_width' => 4
					)
				)
			);
			
			$responsive_680_typography_h1_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h1_responsive_680_letter_spacing',
					'title'      => esc_html__( 'Letter Spacing', 'aperitif-core' ),
					'args'       => array(
						'col_width' => 4
					)
				)
			);
		}
	}
	
	add_action( 'aperitif_core_action_after_typography_options_map', 'aperitif_core_add_h1_typography_options' );
}