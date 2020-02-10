<?php

if ( ! function_exists( 'aperitif_register_required_plugins' ) ) {
	/**
	 * Function that registers theme required and optional plugins. Hooks to tgmpa_register hook
	 */
	function aperitif_register_required_plugins() {
		$plugins = array(
			array(
				'name'               => esc_html__( 'Qode Framework', 'aperitif' ),
				'slug'               => 'qode-framework',
				'source'             => APERITIF_INC_ROOT_DIR . '/plugins/qode-framework.zip',
				'version'            => '1.0',
				'required'           => true,
				'force_activation'   => false,
				'force_deactivation' => false
			),
			array(
				'name'               => esc_html__( 'Aperitif Core', 'aperitif' ),
				'slug'               => 'aperitif-core',
				'source'             => APERITIF_INC_ROOT_DIR . '/plugins/aperitif-core.zip',
				'version'            => '1.0',
				'required'           => true,
				'force_activation'   => false,
				'force_deactivation' => false
			),
			array(
				'name'               => esc_html__( 'Aperitif Membership', 'aperitif' ),
				'slug'               => 'aperitif-membership',
				'source'             => APERITIF_INC_ROOT_DIR . '/plugins/aperitif-membership.zip',
				'version'            => '1.0',
				'required'           => true,
				'force_activation'   => false,
				'force_deactivation' => false
			),
			array(
				'name'               => esc_html__( 'WPBakery Visual Composer', 'aperitif' ),
				'slug'               => 'js_composer',
				'source'             => APERITIF_INC_ROOT_DIR . '/plugins/js_composer.zip',
				'version'            => '6.0.5',
				'required'           => true,
				'force_activation'   => false,
				'force_deactivation' => false
			),
			array(
				'name'               => esc_html__( 'Revolution Slider', 'aperitif' ),
				'slug'               => 'revslider',
				'source'             => APERITIF_INC_ROOT_DIR . '/plugins/revslider.zip',
				'version'            => '6.1.5',
				'required'           => true,
				'force_activation'   => false,
				'force_deactivation' => false
			),
			array(
				'name'     => esc_html__( 'The Events Calendar', 'aperitif' ),
				'slug'     => 'the-events-calendar',
				'required' => false
			),
			array(
				'name'     => esc_html__( 'WooCommerce Plugin', 'aperitif' ),
				'slug'     => 'woocommerce',
				'required' => false
			),
			array(
				'name'     => esc_html__( 'Contact Form 7', 'aperitif' ),
				'slug'     => 'contact-form-7',
				'required' => false
			),
			array(
				'name'     => esc_html__( 'Custom Twitter Feeds', 'aperitif' ),
				'slug'     => 'custom-twitter-feeds',
				'required' => false
			),
			array(
				'name'     => esc_html__( 'Instagram Feed', 'aperitif' ),
				'slug'     => 'instagram-feed',
				'required' => false
			),
			array(
				'name'     => esc_html__( 'Envato Market', 'aperitif' ),
				'slug'     => 'envato-market',
				'source'   => 'https://envato.github.io/wp-envato-market/dist/envato-market.zip',
				'required' => false
			),
			array(
				'name'     => esc_html__( 'YITH WooCommerce Quick View', 'aperitif' ),
				'slug'     => 'yith-woocommerce-quick-view',
				'required' => false
			),
			array(
				'name'     => esc_html__( 'YITH WooCommerce Wishlist', 'aperitif' ),
				'slug'     => 'yith-woocommerce-wishlist',
				'required' => false
			)
		);
		
		$config = array(
			'domain'       => 'aperitif',
			'default_path' => '',
			'parent_slug'  => 'themes.php',
			'capability'   => 'edit_theme_options',
			'menu'         => 'install-required-plugins',
			'has_notices'  => true,
			'is_automatic' => false,
			'message'      => '',
			'strings'      => array(
				'page_title'                      => esc_html__( 'Install Required Plugins', 'aperitif' ),
				'menu_title'                      => esc_html__( 'Install Plugins', 'aperitif' ),
				'installing'                      => esc_html__( 'Installing Plugin: %s', 'aperitif' ),
				'oops'                            => esc_html__( 'Something went wrong with the plugin API.', 'aperitif' ),
				'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'aperitif' ),
				'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'aperitif' ),
				'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'aperitif' ),
				'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'aperitif' ),
				'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'aperitif' ),
				'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'aperitif' ),
				'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'aperitif' ),
				'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'aperitif' ),
				'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'aperitif' ),
				'activate_link'                   => _n_noop( 'Activate installed plugin', 'Activate installed plugins', 'aperitif' ),
				'return'                          => esc_html__( 'Return to Required Plugins Installer', 'aperitif' ),
				'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'aperitif' ),
				'complete'                        => esc_html__( 'All plugins installed and activated successfully. %s', 'aperitif' ),
				'nag_type'                        => 'updated'
			)
		);
		
		tgmpa( $plugins, $config );
	}
	
	add_action( 'tgmpa_register', 'aperitif_register_required_plugins' );
}