<?php
$current_user = wp_get_current_user();
?>
<div class="qodef-logged-in-user qodef-m">
	<a itemprop="url" href="<?php echo apply_filters( 'aperitif_membership_filter_user_link', esc_url( get_edit_user_link() ) ); ?>">
		<div class="qodef-m-user">
			<span class="qodef-m-user-name">
				<?php echo esc_html_e( 'Welcome', 'aperitif-membership' ) . ', ' . esc_html( $current_user->display_name ); ?>
			</span>
			<?php
			$current_user_id = $current_user->ID;
			$user_image      = get_avatar( $current_user_id, 25 );
			
			if ( ! empty( $user_image ) ) { ?>
				<span class="qodef-m-user-image"><?php echo get_avatar( $current_user_id, 25 ); ?></span>
			<?php } ?>
		</div>
	</a>
	<ul class="qodef-m-navigation-items">
		<?php
		$dashboard_url = aperitif_membership_get_dashboard_page_url();
		$nav_items     = aperitif_membership_get_dashboard_navigation_pages();
		
		if ( ! empty( $dashboard_url ) ) {
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
				<?php
			}
		} else { ?>
			<li class="qodef-m-navigation-item qodef-e">
				<a class="qodef-e-link" href="<?php echo esc_url( $nav_items['log-out']['url'] ); ?>">
					<?php if ( isset( $nav_items['log-out']['icon'] ) && ! empty( $nav_items['log-out']['icon'] ) ) { ?>
						<span class="qodef-e-icon"><?php echo wp_kses_post( $nav_items['log-out']['icon'] ); ?></span>
					<?php } ?>
					<span class="qodef-e-label"><?php echo esc_html( $nav_items['log-out']['text'] ); ?></span>
				</a>
			</li>
		<?php } ?>
	</ul>
</div>