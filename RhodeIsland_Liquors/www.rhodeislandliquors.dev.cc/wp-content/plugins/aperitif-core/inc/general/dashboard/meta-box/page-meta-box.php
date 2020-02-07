<?php

if ( ! function_exists( 'aperitif_core_add_general_page_meta_box' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function aperitif_core_add_general_page_meta_box( $page ) {
		
		$general_tab = $page->add_tab_element(
			array(
				'name'        => 'tab-page',
				'icon'        => 'fa fa-cog',
				'title'       => esc_html__( 'Page Settings', 'aperitif-core' ),
				'description' => esc_html__( 'General page layout settings', 'aperitif-core' )
			)
		);
		
		$general_tab->add_field_element(
			array(
				'field_type'  => 'color',
				'name'        => 'qodef_page_background_color',
				'title'       => esc_html__( 'Page Background Color', 'aperitif-core' ),
				'description' => esc_html__( 'Set Background Color for Website', 'aperitif-core' )
			)
		);
		
		$general_tab->add_field_element(
			array(
				'field_type'  => 'image',
				'name'        => 'qodef_page_background_image',
				'title'       => esc_html__( 'Page Background Image', 'aperitif-core' ),
				'description' => esc_html__( 'Set Background Image for Website', 'aperitif-core' )
			)
		);
		
		$general_tab->add_field_element(
			array(
				'field_type'  => 'select',
				'name'        => 'qodef_page_background_repeat',
				'title'       => esc_html__( 'Page Background Repeat', 'aperitif-core' ),
				'description' => esc_html__( 'Set Background Repeat for Website', 'aperitif-core' ),
				'options'     => array(
					''          => esc_html__( 'Default', 'aperitif-core' ),
					'no-repeat' => esc_html__( 'No Repeat', 'aperitif-core' ),
					'repeat'    => esc_html__( 'Repeat', 'aperitif-core' ),
					'repeat-x'  => esc_html__( 'Repeat-x', 'aperitif-core' ),
					'repeat-y'  => esc_html__( 'Repeat-y', 'aperitif-core' )
				)
			)
		);
		
		$general_tab->add_field_element(
			array(
				'field_type'  => 'select',
				'name'        => 'qodef_page_background_size',
				'title'       => esc_html__( 'Page Background Size', 'aperitif-core' ),
				'description' => esc_html__( 'Set Background Size for Website', 'aperitif-core' ),
				'options'     => array(
					''        => esc_html__( 'Default', 'aperitif-core' ),
					'contain' => esc_html__( 'Contain', 'aperitif-core' ),
					'cover'   => esc_html__( 'Cover', 'aperitif-core' )
				)
			)
		);
		
		$general_tab->add_field_element(
			array(
				'field_type'  => 'select',
				'name'        => 'qodef_page_background_attachment',
				'title'       => esc_html__( 'Page Background Attachment', 'aperitif-core' ),
				'description' => esc_html__( 'Set Background Attachment for Website', 'aperitif-core' ),
				'options'     => array(
					''       => esc_html__( 'Default', 'aperitif-core' ),
					'fixed'  => esc_html__( 'Fixed', 'aperitif-core' ),
					'scroll' => esc_html__( 'Scroll', 'aperitif-core' )
				)
			)
		);
		
		$general_tab->add_field_element(
			array(
				'field_type'  => 'text',
				'name'        => 'qodef_page_content_padding',
				'title'       => esc_html__( 'Page Content Padding', 'aperitif-core' ),
				'description' => esc_html__( 'Set padding that will be applied for page content in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'aperitif-core' )
			)
		);
		
		$general_tab->add_field_element(
			array(
				'field_type'  => 'text',
				'name'        => 'qodef_page_content_padding_mobile',
				'title'       => esc_html__( 'Page Content Padding Mobile', 'aperitif-core' ),
				'description' => esc_html__( 'Set padding that will be applied for page content on mobile screens (1024px and below) in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'aperitif-core' )
			)
		);
		
		$general_tab->add_field_element(
			array(
				'field_type'    => 'yesno',
				'name'          => 'qodef_boxed',
				'title'         => esc_html__( 'Boxed Layout', 'aperitif-core' ),
				'description'   => esc_html__( 'Set Boxed Layout', 'aperitif-core' ),
				'default_value' => 'no'
			)
		);
		
		$boxed_section = $general_tab->add_section_element(
			array(
				'name'       => 'qodef_boxed_section',
				'title'      => esc_html__( 'Boxed Layout Section', 'aperitif-core' ),
				'dependency' => array(
					'hide' => array(
						'qodef_boxed' => array(
							'values'        => 'no',
							'default_value' => ''
						)
					)
				)
			)
		);
		
		$boxed_section->add_field_element(
			array(
				'field_type'  => 'color',
				'name'        => 'qodef_boxed_background_color',
				'title'       => esc_html__( 'Boxed Background Color', 'aperitif-core' ),
				'description' => esc_html__( 'Set Boxed Background Color', 'aperitif-core' )
			)
		);
		
		$general_tab->add_field_element(
			array(
				'field_type'    => 'yesno',
				'name'          => 'qodef_passepartout',
				'title'         => esc_html__( 'Passepartout', 'aperitif-core' ),
				'description'   => esc_html__( 'Enabling this option will display passepartout around site content', 'aperitif-core' ),
				'default_value' => 'no'
			)
		);
		
		$passepartout_section = $general_tab->add_section_element(
			array(
				'name'       => 'qodef_passepartout_section',
				'dependency' => array(
					'show' => array(
						'qodef_passepartout' => array(
							'values'        => 'yes',
							'default_value' => 'no'
						)
					)
				)
			)
		);
		
		$passepartout_section->add_field_element(
			array(
				'field_type'  => 'color',
				'name'        => 'qodef_passepartout_color',
				'title'       => esc_html__( 'Passepartout Color', 'aperitif-core' ),
				'description' => esc_html__( 'Choose passepartout color', 'aperitif-core' )
			)
		);
		
		$passepartout_section->add_field_element(
			array(
				'field_type'  => 'image',
				'name'        => 'qodef_passepartout_image',
				'title'       => esc_html__( 'Passepartout Background Image', 'aperitif-core' ),
				'description' => esc_html__( 'Set Background Image for Passepartout', 'aperitif-core' )
			)
		);
		
		$passepartout_section->add_field_element(
			array(
				'field_type'  => 'text',
				'name'        => 'qodef_passepartout_size',
				'title'       => esc_html__( 'Passepartout Size', 'aperitif-core' ),
				'description' => esc_html__( 'Enter size amount for passepartout', 'aperitif-core' ),
				'args'        => array(
					'suffix' => 'px or %'
				)
			)
		);
		
		$passepartout_section->add_field_element(
			array(
				'field_type'  => 'text',
				'name'        => 'qodef_passepartout_size_responsive',
				'title'       => esc_html__( 'Passepartout Responsive Size', 'aperitif-core' ),
				'description' => esc_html__( 'Enter size amount for passepartout for smaller screens (1024px and below)', 'aperitif-core' ),
				'args'        => array(
					'suffix' => 'px or %'
				)
			)
		);
		
		$passepartout_section->add_field_element(
			array(
				'field_type'    => 'yesno',
				'name'          => 'qodef_passepartout_details',
				'title'         => esc_html__( 'Passepartout Details', 'aperitif-core' ),
				'description'   => esc_html__( 'Enabling this option will display passepartout special details around', 'aperitif-core' ),
				'default_value' => 'no'
			)
		);
		
		$general_tab->add_field_element(
			array(
				'field_type'  => 'select',
				'name'        => 'qodef_content_width',
				'title'       => esc_html__( 'Initial Width of Content', 'aperitif-core' ),
				'description' => esc_html__( 'Choose the initial width of content which is in grid (Applies to pages set to "Default Template" and rows set to "In Grid")', 'aperitif-core' ),
				'options'     => aperitif_core_get_select_type_options_pool( 'content_width' )
			)
		);
		
		$general_tab->add_field_element( array(
			'field_type'    => 'yesno',
			'default_value' => 'no',
			'name'          => 'qodef_content_behind_header',
			'title'         => esc_html__( 'Always put content behind header', 'aperitif-core' ),
			'description'   => esc_html__( 'Enabling this option will put page content behind page header', 'aperitif-core' ),
		) );
		
		// Hook to include additional options after module options
		do_action( 'aperitif_core_action_after_general_page_meta_box_map', $general_tab );
	}
	
	add_action( 'aperitif_core_action_after_general_meta_box_map', 'aperitif_core_add_general_page_meta_box', 9 );
	add_action( 'aperitif_core_action_after_portfolio_meta_box_map', 'aperitif_core_add_general_page_meta_box' );
}