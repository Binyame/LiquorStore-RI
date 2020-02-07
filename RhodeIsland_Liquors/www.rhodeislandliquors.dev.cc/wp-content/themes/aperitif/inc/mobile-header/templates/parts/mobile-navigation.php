<?php if ( has_nav_menu( 'mobile-navigation' ) || has_nav_menu( 'main-navigation' ) ) { ?>
	<nav id="qodef-mobile-header-navigation" class="qodef-m" role="navigation"
	     aria-label="<?php esc_attr_e( 'Mobile Menu', 'aperitif' ); ?>">
		<?php
		// Set main navigation menu as mobile if mobile navigation is not set
		$theme_location = has_nav_menu( 'mobile-navigation' ) ? 'mobile-navigation' : 'main-navigation';
		
		wp_nav_menu( array(
			'theme_location'  => $theme_location,
			'container_class' => 'qodef-m-inner',
			'menu_id'         => 'qodef-mobile-header-navigation-menu',
			'menu_class'      => 'qodef-content-grid',
			'link_before'     => '<span class="qodef-menu-item-inner">',
			'link_after'      => '</span>'
		) );
		?>
	</nav>
<?php } ?>