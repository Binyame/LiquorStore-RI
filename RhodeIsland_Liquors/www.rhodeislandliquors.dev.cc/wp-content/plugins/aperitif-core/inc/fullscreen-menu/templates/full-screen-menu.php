<div class="qodef-fullscreen-menu-holder">
	<?php if ( $fullscreen_menu_in_grid ) : ?>
	<div class="qodef-content-grid">
		<?php endif; ?>
		<div class="qodef-fullscreen-menu-holder-inner">
			<?php if ( has_nav_menu( 'fullscreen-menu-navigation' ) ) : ?>
				<nav class="qodef-fullscreen-menu">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'fullscreen-menu-navigation',
							'menu_id'        => 'qodef-fullscreen-menu-navigation-menu',
							'walker'         => new AperitifCoreRootMainMenuWalker()
						)
					);
					?>
				</nav>
			<?php endif; ?>
			<div class="qodef-fullscreen-widget-holder">
				<div class="qodef-fullscreen-widget-inner">
					<?php aperitif_core_get_header_widget_area(); ?>
				</div>
			</div>
		</div>
		<?php if ( $fullscreen_menu_in_grid ) : ?>
	</div>
<?php endif; ?>
</div>