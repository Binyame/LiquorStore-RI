<?php

if ( ! function_exists( 'aperitif_core_add_image_shortcode_media_options' ) ) {
	function aperitif_core_add_image_shortcode_media_options() {
		$qode_framework = qode_framework_get_framework_root();
		
		$page = $qode_framework->add_options_page(
			array(
				'scope' => 'image',
				'type'  => 'attachment',
				'slug'  => 'qodef_image_gallery',
			)
		);
		
		if ( $page ) {
			$page->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_image_gallery_custom_link',
					'title'       => esc_html__( 'Custom Link URL', 'aperitif-core' ),
					'description' => esc_html__( 'Enter url where image should navigate to if custom link option is selected in image gallery shortcode', 'aperitif-core' ),
				)
			);
			
			$page->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_image_gallery_masonry_size',
					'title'       => esc_html__( 'Image Size', 'aperitif-core' ),
					'description' => esc_html__( 'Choose image size for list shortcode item if masonry layout > fixed image size is selected in image gallery shortcode', 'aperitif-core' ),
					'options'     => aperitif_core_get_select_type_options_pool( 'masonry_image_dimension' )
				)
			);
		}
	}
	
	add_action( 'qode_framework_action_custom_media_fields', 'aperitif_core_add_image_shortcode_media_options', 11 );
}