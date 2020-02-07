<?php
if ( ! function_exists( 'aperitif_core_filter_clients_list_image_only_animation_options' ) ) {
	function aperitif_core_filter_clients_list_image_only_animation_options( $options ) {
		$hover_option  = array();
		$option_filter = apply_filters( 'aperitif_core_filter_clients_list_image_only_animation_options', array() );
		$options_map   = aperitif_core_get_variations_options_map( $option_filter );
		
		$option = array(
			'field_type'    => 'select',
			'name'          => 'hover_animation_image-only',
			'title'         => esc_html__( 'Hover Animation', 'aperitif-core' ),
			'options'       => $option_filter,
			'default_value' => $options_map['default_value'],
			'dependency'    => array(
				'show' => array(
					'layout' => array(
						'values'        => 'image-only',
						'default_value' => ''
					)
				)
			),
			'group'         => esc_html__( 'Layout', 'aperitif-core' ),
			'visibility'    => array( 'map_for_page_builder' => $options_map['visibility'] )
		);
		
		$hover_option[] = $option;
		
		return array_merge( $options, $hover_option );
	}
	
	add_filter( 'aperitif_core_filter_clients_list_hover_animation_options', 'aperitif_core_filter_clients_list_image_only_animation_options' );
}
