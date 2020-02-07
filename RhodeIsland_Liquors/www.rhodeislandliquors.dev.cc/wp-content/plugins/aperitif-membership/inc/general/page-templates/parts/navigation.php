<ul class="qodef-m-navigation-items">
	<?php
	$nav_items = aperitif_membership_get_dashboard_navigation_pages();
	
	if ( ! empty( $nav_items ) ) {
		$user_action = isset( $_GET['user-action'] ) ? sanitize_text_field( $_GET['user-action'] ) : 'profile';
		
		foreach ( $nav_items as $nav_item ) {
			$active_class = $nav_item['user_action'] === $user_action ? 'qodef--active' : '';
			?>
			<li class="qodef-m-navigation-item qodef-e <?php echo esc_attr( $active_class ); ?>">
				<a class="qodef-e-link" href="<?php echo esc_url( $nav_item['url'] ); ?>">
					<?php if ( isset( $nav_item['icon'] ) && ! empty( $nav_item['icon'] ) ) { ?>
						<span class="qodef-e-icon"><?php echo wp_kses_post( $nav_item['icon'] ); ?></span>
					<?php } ?>
					<span class="qodef-e-label"><?php echo esc_html( $nav_item['text'] ); ?></span>
				</a>
			</li>
		<?php }
	} ?>
</ul>