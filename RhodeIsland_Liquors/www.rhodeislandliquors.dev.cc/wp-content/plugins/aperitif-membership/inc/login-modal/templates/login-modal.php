<div id="qodef-membership-login-modal">
	<div class="qodef-membership-login-modal-overlay"></div>
	<div class="qodef-membership-login-modal-content">
		<ul class="qodef-membership-login-modal-navigation qodef-m">
			<?php
			/**
			 * Hook to include additional navigation items inside modal
			 *
			 * @hooked aperitif_membership_include_login_navigation_item - 10
			 * @hooked aperitif_membership_include_register_navigation_item - 15
			 * @hooked aperitif_membership_include_reset_password_navigation_item- 20
			 */
			do_action( 'aperitif_membership_action_login_modal_navigation_item' );	?>
		</ul>
		<?php
		/**
		 * Hook to include additional content inside modal
		 *
		 * @hooked aperitif_membership_include_login_template - 10
		 * @hooked aperitif_membership_include_register_template - 15
		 * @hooked aperitif_membership_include_reset_password_template - 20
		 */
		do_action( 'aperitif_membership_action_login_modal_content' );	?>
	</div>
</div>