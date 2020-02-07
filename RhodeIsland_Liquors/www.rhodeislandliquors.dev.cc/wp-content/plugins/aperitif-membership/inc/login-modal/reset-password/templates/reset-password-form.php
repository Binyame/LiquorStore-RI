<form id="qodef-membership-reset-password-modal-part" class="qodef-m" method="POST">
	<div class="qodef-membership-reset-password-modal-holder">
		<div class="qodef-m-fields">
			<h4><?php esc_html_e('Reset Password', 'aperitif-membership') ?></h4>
			<label class="qodef-m-user-login-label required"><?php esc_html_e( 'Username or Email', 'aperitif-membership' ); ?></label>
			<input type="text" class="qodef-m-user-login" name="user_login" value="" required />
		</div>
		<div class="qodef-m-action">
			<?php
			$reset_button_params = array(
				'custom_class' => 'qodef-m-action-button',
				'html_type'    => 'submit',
				'text'         => esc_html__( 'Reset Password', 'aperitif-membership' )
			);

			echo AperitifCoreButtonShortcode::call_shortcode( $reset_button_params );

			aperitif_membership_template_part( 'login-modal', 'templates/parts/spinner' ); ?>

			<p class="qodef-m-links-not-a-member-text"><?php esc_html_e('You will receive a link to create a new password via email.', 'aperitif-membership') ?></p>
		</div>
	</div>

	<?php aperitif_membership_template_part( 'login-modal', 'templates/parts/response' ); ?>
	<?php aperitif_membership_template_part( 'login-modal', 'templates/parts/hidden-fields', '', array( 'response_type' => 'reset-password' ) ); ?>
</form>