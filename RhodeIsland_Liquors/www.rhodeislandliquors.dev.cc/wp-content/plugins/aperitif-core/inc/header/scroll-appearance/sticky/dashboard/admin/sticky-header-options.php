<?php

if ( ! function_exists( 'aperitif_core_add_sticky_header_options' ) ) {
	function aperitif_core_add_sticky_header_options( $page ) {
		
		$page->add_field_element(
			array(
				'field_type'  => 'text',
				'name'        => 'qodef_sticky_header_scroll_amount',
				'title'       => esc_html__( 'Sticky Scroll Amount', 'aperitif-core' ),
				'description' => esc_html__( 'Enter scroll amount for sticky header to appear', 'aperitif-core' ),
				'args'        => array(
					'suffix' => 'px'
				),
				'dependency'  => array(
					'show' => array(
						'qodef_header_scroll_appearance' => array(
							'values'        => 'sticky',
							'default_value' => ''
						)
					)
				)
			)
		);
	}
	
	add_action( 'aperitif_core_action_after_header_options_map', 'aperitif_core_add_sticky_header_options', 9 );
}