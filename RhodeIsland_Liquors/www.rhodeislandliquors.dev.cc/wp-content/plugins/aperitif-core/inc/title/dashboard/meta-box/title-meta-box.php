<?php

if ( ! function_exists( 'aperitif_core_add_page_title_meta_box' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function aperitif_core_add_page_title_meta_box( $page ) {
		
		if ( $page ) {
			
			$title_tab = $page->add_tab_element(
				array(
					'name'        => 'tab-title',
					'icon'        => 'fa fa-cog',
					'title'       => esc_html__( 'Title Settings', 'aperitif-core' ),
					'description' => esc_html__( 'Title layout settings', 'aperitif-core' )
				)
			);
			
			$title_tab->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_enable_page_title',
					'title'       => esc_html__( 'Enable Page Title', 'aperitif-core' ),
					'description' => esc_html__( 'Use this option to enable/disable page title', 'aperitif-core' ),
					'options'     => aperitif_core_get_select_type_options_pool( 'no_yes' )
				)
			);
			
			$page_title_section = $title_tab->add_section_element(
				array(
					'name'       => 'qodef_page_title_section',
					'title'      => esc_html__( 'Title Area', 'aperitif-core' ),
					'dependency' => array(
						'hide' => array(
							'qodef_enable_page_title' => array(
								'values'        => 'no',
								'default_value' => ''
							)
						)
					)
				)
			);
			
			$page_title_section->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_title_layout',
					'title'       => esc_html__( 'Title Layout', 'aperitif-core' ),
					'description' => esc_html__( 'Choose title layout to set for your site', 'aperitif-core' ),
					'options'     => apply_filters( 'aperitif_core_filter_title_layout_options', $layouts = array( '' => esc_html__( 'Default', 'aperitif-core' ) ) )
				)
			);
			
			$page_title_section->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_title_hide_info',
					'title'         => esc_html__( 'Hide Text Info', 'aperitif-core' ),
					'description'   => esc_html__( 'Hide title and breadcrumbs, only image left', 'aperitif-core' ),
					'options'     => aperitif_core_get_select_type_options_pool( 'no_yes' )
				)
			);
			
			$page_title_section->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_set_page_title_area_in_grid',
					'title'       => esc_html__( 'Page Title In Grid', 'aperitif-core' ),
					'description' => esc_html__( 'Enabling this option will set page title area to be in grid', 'aperitif-core' ),
					'options'     => aperitif_core_get_select_type_options_pool( 'no_yes' )
				)
			);
			
			$page_title_section->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_page_title_height',
					'title'       => esc_html__( 'Height', 'aperitif-core' ),
					'description' => esc_html__( 'Enter title height', 'aperitif-core' ),
					'args'        => array(
						'suffix' => 'px'
					)
				)
			);
			
			$page_title_section->add_field_element(
				array(
					'field_type'  => 'color',
					'name'        => 'qodef_page_title_background_color',
					'title'       => esc_html__( 'Background Color', 'aperitif-core' ),
					'description' => esc_html__( 'Enter page title area background color', 'aperitif-core' )
				)
			);
			
			$page_title_section->add_field_element(
				array(
					'field_type'  => 'image',
					'name'        => 'qodef_page_title_background_image',
					'title'       => esc_html__( 'Background Image', 'aperitif-core' ),
					'description' => esc_html__( 'Enter page title area background image', 'aperitif-core' )
				)
			);
			
			$page_title_section->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_page_title_background_image_behavior',
					'title'      => esc_html__( 'Background Image Behavior', 'aperitif-core' ),
					'options'    => array(
						''           => esc_html__( 'Default', 'aperitif-core' ),
						'responsive' => esc_html__( 'Set Responsive Image', 'aperitif-core' ),
						'parallax'   => esc_html__( 'Set Parallax Image', 'aperitif-core' )
					)
				)
			);
			
			$page_title_section->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_page_title_background_image_disable_parallax_mobile',
					'title'         => esc_html__( 'Disable Parallax on Mobile', 'aperitif-core' ),
					'description'   => esc_html__( 'Enabling this option will disable parallax on mobile', 'aperitif-core' ),
					'default_value' => 'yes',
					'dependency'    => array(
						'hide' => array(
							'qodef_page_title_background_image_behavior' => array(
								'values'        => 'responsive',
								'default_value' => ''
							)
						)
					)
				)
			);
			
			$page_title_section->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_page_title_color',
					'title'      => esc_html__( 'Title Color', 'aperitif-core' )
				)
			);
			
			$page_title_section->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_page_title_vertical_text_alignment',
					'title'         => esc_html__( 'Vertical Text Alignment', 'aperitif-core' ),
					'options'       => array(
						''              => esc_html__( 'Default', 'aperitif-core' ),
						'header-bottom' => esc_html__( 'From Bottom of Header', 'aperitif-core' ),
						'window-top'    => esc_html__( 'From Window Top', 'aperitif-core' )
					),
					'default_value' => ''
				)
			);
			
			// Hook to include additional options after module options
			do_action( 'aperitif_core_action_after_page_title_meta_box_map', $page_title_section );
		}
	}
	
	add_action( 'aperitif_core_action_after_general_meta_box_map', 'aperitif_core_add_page_title_meta_box' );
	add_action( 'aperitif_core_action_after_portfolio_meta_box_map', 'aperitif_core_add_page_title_meta_box' );
	add_action( 'aperitif_core_action_after_tribe_events_single_meta_box_map', 'aperitif_core_add_page_title_meta_box' );
}