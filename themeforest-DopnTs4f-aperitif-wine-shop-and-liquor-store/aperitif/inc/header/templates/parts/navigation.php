<?php if ( has_nav_menu( 'main-navigation' ) ) : ?>
	<nav class="qodef-header-navigation qodef-header-navigation-initial" role="navigation"
	     aria-label="<?php esc_attr_e( 'Top Menu', 'aperitif' ); ?>">
		<?php wp_nav_menu( array(
			'theme_location' => 'main-navigation',
			'menu_id'        => 'qodef-main-navigation-menu',
			'container'      => '',
			'link_before'    => '<span class="qodef-menu-item-inner">',
			'link_after'     => '</span>'
		) ); ?>
	</nav>
<?php endif; ?>