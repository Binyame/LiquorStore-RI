<?php

if ( ! function_exists( 'aperitif_core_include_blog_single_author_info_template' ) ) {
	/**
	 * Function which includes additional module on single posts page
	 */
	function aperitif_core_include_blog_single_author_info_template() {
		if ( is_single() ) {
			include_once 'templates/author-info.php';
		}
	}
	
	add_action( 'aperitif_action_after_blog_post_item', 'aperitif_core_include_blog_single_author_info_template', 15 );  // permission 15 is set to define template position
}

if ( ! function_exists( 'aperitif_core_get_author_social_networks' ) ) {
	/**
	 * Function which includes author info templates on single posts page
	 */
	function aperitif_core_get_author_social_networks( $user_id ) {
		$icons           = array();
		$social_networks = array(
			'facebook',
			'twitter',
			'linkedin',
			'instagram',
			'pinterest'
		);
		
		foreach ( $social_networks as $network ) {
			$network_meta = get_the_author_meta( 'qodef_user_' . $network, $user_id );
			
			if ( ! empty( $network_meta ) ) {
				$$network = array(
					'url'   => $network_meta,
					'icon'  => 'social_' . $network,
					'class' => 'qodef-user-social-' . $network
				);
				
				$icons[ $network ] = $$network;
			}
		}
		
		return $icons;
	}
}