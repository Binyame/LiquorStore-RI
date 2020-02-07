<form id="qodef-membership-register-modal-part" class="qodef-m" method="POST">
	<div class="qodef-membership-register-modal-holder">
		<div class="qodef-m-fields">
			<h4><?php esc_html_e('Register', 'aperitif-membership') ?></h4>
			<label class="qodef-m-user-name-label required"><?php esc_html_e( 'Username', 'aperitif-membership' ) ?></label>
			<input type="text" class="qodef-m-user-name" name="user_name" value="" required pattern=".{3,}" autocomplete="username"/>
			<label class="qodef-m-user-email-label required"><?php esc_html_e( 'Email', 'aperitif-membership' ) ?></label>
			<input type="email" class="qodef-m-user-email" name="user_email" value="" required autocomplete="email"/>
			<label class="qodef-m-user-password-label required"><?php esc_html_e( 'Password', 'aperitif-membership' ) ?></label>
			<input type="password" class="qodef-m-user-password" name="user_password" required pattern=".{5,}" autocomplete="new-password"/>
			<label class="qodef-m-user-confirm-password-label required"><?php esc_html_e( 'Confirm Password', 'aperitif-membership' ) ?></label>
			<input type="password" class="qodef-m-user-confirm-password" name="user_confirm_password" required pattern=".{5,}" autocomplete="new-password"/>
		</div>

		<div class="qodef-m-action">
			<?php
			$register_button_params = array(
				'custom_class' => 'qodef-m-action-button',
				'html_type'    => 'submit',
				'text'         => esc_html__( 'Register', 'aperitif-membership' )
			);

			echo AperitifCoreButtonShortcode::call_shortcode( $register_button_params );

			aperitif_membership_template_part( 'login-modal', 'templates/parts/spinner' ); ?>
		</div>
	</div>

	<?php aperitif_membership_template_part( 'login-modal', 'templates/parts/response' ); ?>
	<?php aperitif_membership_template_part( 'login-modal', 'templates/parts/hidden-fields', '', array( 'response_type' => 'register' ) ); ?>
</form>