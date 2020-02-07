<?php

if ( ! function_exists( 'aperitif_core_add_fonts_options' ) ) {
	/**
	 * Function that add options for this module
	 */
	function aperitif_core_add_fonts_options() {
		$qode_framework = qode_framework_get_framework_root();
		
		$page = $qode_framework->add_options_page(
			array(
				'scope'       => APERITIF_CORE_OPTIONS_NAME,
				'type'        => 'admin',
				'slug'        => 'fonts',
				'title'       => esc_html__( 'Fonts', 'aperitif-core' ),
				'description' => esc_html__( 'General Fonts Options', 'aperitif-core' ),
				'icon'        => 'fa fa-cog'
			)
		);
		
		if ( $page ) {
			$page->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_enable_google_fonts',
					'title'         => esc_html__( 'Enable Google Fonts', 'aperitif-core' ),
					'default_value' => 'yes',
					'args'          => array(
						'custom_class' => 'qodef-enable-google-fonts'
					)
				)
			);
			
			$google_fonts_section = $page->add_section_element(
				array(
					'name'       => 'qodef_google_fonts_section',
					'title'      => esc_html__( 'Google Fonts Options', 'aperitif-core' ),
					'dependency' => array(
						'show' => array(
							'qodef_enable_google_fonts' => array(
								'values'        => 'yes',
								'default_value' => ''
							)
						)
					)
				)
			);
			
			$page_repeater = $google_fonts_section->add_repeater_element(
				array(
					'name'        => 'qodef_choose_google_fonts',
					'title'       => esc_html__( 'Google Fonts To Include', 'aperitif-core' ),
					'description' => esc_html__( 'Choose google fonts which you want to use on your website', 'aperitif-core' ),
					'button_text' => esc_html__( 'Add New Google Font', 'aperitif-core' )
				)
			);
			
			$page_repeater->add_field_element( array(
				'field_type'  => 'googlefont',
				'name'        => 'qodef_choose_google_font',
				'title'       => esc_html__( 'Google Font', 'aperitif-core' ),
				'description' => esc_html__( 'Choose google font', 'aperitif-core' ),
				'args'        => array(
					'include' => 'google-fonts'
				)
			) );
			
			$google_fonts_section->add_field_element(
				array(
					'field_type'  => 'checkbox',
					'name'        => 'qodef_google_fonts_weight',
					'title'       => esc_html__( 'Google Fonts Style & Weight', 'aperitif-core' ),
					'description' => esc_html__( 'Choose a default Google font weights for your site. Impact on page load time', 'aperitif-core' ),
					'options'     => array(
						'100'  => esc_html__( '100 Thin', 'aperitif-core' ),
						'100i' => esc_html__( '100 Thin Italic', 'aperitif-core' ),
						'200'  => esc_html__( '200 Extra-Light', 'aperitif-core' ),
						'200i' => esc_html__( '200 Extra-Light Italic', 'aperitif-core' ),
						'300'  => esc_html__( '300 Light', 'aperitif-core' ),
						'300i' => esc_html__( '300 Light Italic', 'aperitif-core' ),
						'400'  => esc_html__( '400 Regular', 'aperitif-core' ),
						'400i' => esc_html__( '400 Regular Italic', 'aperitif-core' ),
						'500'  => esc_html__( '500 Medium', 'aperitif-core' ),
						'500i' => esc_html__( '500 Medium Italic', 'aperitif-core' ),
						'600'  => esc_html__( '600 Semi-Bold', 'aperitif-core' ),
						'600i' => esc_html__( '600 Semi-Bold Italic', 'aperitif-core' ),
						'700'  => esc_html__( '700 Bold', 'aperitif-core' ),
						'700i' => esc_html__( '700 Bold Italic', 'aperitif-core' ),
						'800'  => esc_html__( '800 Extra-Bold', 'aperitif-core' ),
						'800i' => esc_html__( '800 Extra-Bold Italic', 'aperitif-core' ),
						'900'  => esc_html__( '900 Ultra-Bold', 'aperitif-core' ),
						'900i' => esc_html__( '900 Ultra-Bold Italic', 'aperitif-core' )
					)
				)
			);
			
			$google_fonts_section->add_field_element(
				array(
					'field_type'  => 'checkbox',
					'name'        => 'qodef_google_fonts_subset',
					'title'       => esc_html__( 'Google Fonts Style & Weight', 'aperitif-core' ),
					'description' => esc_html__( 'Choose a default Google font weights for your site. Impact on page load time', 'aperitif-core' ),
					'options'     => array(
						'latin'        => esc_html__( 'Latin', 'aperitif-core' ),
						'latin-ext'    => esc_html__( 'Latin Extended', 'aperitif-core' ),
						'cyrillic'     => esc_html__( 'Cyrillic', 'aperitif-core' ),
						'cyrillic-ext' => esc_html__( 'Cyrillic Extended', 'aperitif-core' ),
						'greek'        => esc_html__( 'Greek', 'aperitif-core' ),
						'greek-ext'    => esc_html__( 'Greek Extended', 'aperitif-core' ),
						'vietnamese'   => esc_html__( 'Vietnamese', 'aperitif-core' )
					)
				)
			);
			
			$page_repeater = $page->add_repeater_element(
				array(
					'name'        => 'qodef_custom_fonts',
					'title'       => esc_html__( 'Custom Fonts', 'aperitif-core' ),
					'description' => esc_html__( 'Add Custom Fonts', 'aperitif-core' ),
					'button_text' => esc_html__( 'Add New Custom Font', 'aperitif-core' )
				)
			);
			
			$page_repeater->add_field_element( array(
				'field_type' => 'file',
				'name'       => 'qodef_custom_font_ttf',
				'title'      => esc_html__( 'Custom Font TTF', 'aperitif-core' ),
				'args'       => array(
					'allowed_type' => 'font/ttf'
				)
			) );
			
			$page_repeater->add_field_element( array(
				'field_type' => 'file',
				'name'       => 'qodef_custom_font_otf',
				'title'      => esc_html__( 'Custom Font OTF', 'aperitif-core' ),
				'args'       => array(
					'allowed_type' => 'font/otf'
				)
			) );
			
			$page_repeater->add_field_element( array(
				'field_type' => 'file',
				'name'       => 'qodef_custom_font_woff',
				'title'      => esc_html__( 'Custom Font WOFF', 'aperitif-core' ),
				'args'       => array(
					'allowed_type' => 'font/woff'
				)
			) );
			
			$page_repeater->add_field_element( array(
				'field_type' => 'file',
				'name'       => 'qodef_custom_font_woff2',
				'title'      => esc_html__( 'Custom Font WOFF2', 'aperitif-core' ),
				'args'       => array(
					'allowed_type' => 'font/woff2'
				)
			) );
			
			$page_repeater->add_field_element( array(
				'field_type' => 'text',
				'name'       => 'qodef_custom_font_name',
				'title'      => esc_html__( 'Custom Font Name', 'aperitif-core' ),
			) );
			
			// Hook to include additional options after module options
			do_action( 'aperitif_core_action_after_page_fonts_options_map', $page );
		}
	}
	
	add_action( 'aperitif_core_action_default_options_init', 'aperitif_core_add_fonts_options', aperitif_core_get_admin_options_map_position( 'fonts' ) );
}