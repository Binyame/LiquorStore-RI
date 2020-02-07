<?php if ( has_nav_menu( 'main-navigation' ) ) : ?>
	<nav class="qodef-header-navigation" role="navigation"
	     aria-label="<?php esc_attr_e( 'Top Menu', 'aperitif-core' ); ?>">
		<?php wp_nav_menu( array(
			'theme_location' => 'main-navigation',
			'menu_id'        => isset( $menu_id ) && ! empty( $menu_id ) ? esc_attr( $menu_id ) : 'qodef-main-navigation-menu',
			'container'      => '',
			'link_before'    => '<span class="qodef-menu-item-text">',
			'link_after'     => '</span>',
			'walker'         => new AperitifCoreRootMainMenuWalker()
		) ); ?>
	</nav>
<?php endif; ?>