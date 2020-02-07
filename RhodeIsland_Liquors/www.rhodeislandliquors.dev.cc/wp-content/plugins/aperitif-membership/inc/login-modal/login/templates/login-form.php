<form id="qodef-membership-login-modal-part" class="qodef-m" method="GET">
	<div class="qodef-membership-login-modal-holder">
		<div class="qodef-m-fields">
			<h4><?php esc_html_e('Login', 'aperitif-membership') ?></h4>
			<label class="qodef-m-user-name-label required"><?php esc_html_e( 'Username', 'aperitif-membership' ) ?></label>
			<input type="text" class="qodef-m-user-name" name="user_name" value="" required pattern=".{3,}" autocomplete="username"/>
			<label class="qodef-m-user-password-label required"><?php esc_html_e( 'Password', 'aperitif-membership' ) ?></label>
			<input type="password" class="qodef-m-user-password" name="user_password" required autocomplete="current-password" />
		</div>
		<div class="qodef-m-links">
			<div class="qodef-m-links-remember-me">
				<input type="checkbox" id="qodef-m-links-remember" class="qodef-m-links-remember" name="remember" value="forever" />
				<label for="qodef-m-links-remember" class="qodef-m-links-remember-label"><?php esc_html_e( 'Remember me', 'aperitif-membership' ) ?></label>
			</div>
			<a href="#" class="qodef-m-links-reset-password">
				<p class="qodef-m-links-reset-password-text"><?php esc_html_e( 'Forgot your password?', 'aperitif-membership' ) ?></p>
			</a>
		</div>
		<div class="qodef-m-action">
			<?php
			$login_button_params = array(
				'custom_class' => 'qodef-m-action-button',
				'html_type'    => 'submit',
				'text'         => esc_html__( 'Login', 'aperitif-membership' )
			);

			echo AperitifCoreButtonShortcode::call_shortcode( $login_button_params );

			aperitif_membership_template_part( 'login-modal', 'templates/parts/spinner' ); ?>

			<p class="qodef-m-links-not-a-member-text"><?php esc_html_e('Not a member yet?', 'aperitif-membership') ?></p>
			<a href="#" class="qodef-m-links-register">
				<p class="qodef-m-links-not-a-member-text-link"><?php esc_html_e('Register Now', 'aperitif-membership') ?></p>
			</a>
		</div>
	</div>

	<div class="qodef-m-bottom">
		<h5><?php esc_html_e('Connect With Social Networks!', 'aperitif-membership') ?></h5>
		<?php do_action('aperitif_membership_action_login_form_template'); ?>
	</div>

	<?php aperitif_membership_template_part( 'login-modal', 'templates/parts/response' ); ?>
	<?php aperitif_membership_template_part( 'login-modal', 'templates/parts/hidden-fields', '', array( 'response_type' => 'login' ) ); ?>
</form>




