<div class="qodef-m-content-inner qodef--<?php echo esc_attr( isset( $action ) && ! empty( $action ) ? $action : 'dashboard' ); ?>">
	<?php if ( isset( $profile_image ) && ! empty( $profile_image ) ) { ?>
		<div class="qodef-m-image">
			<?php echo wp_kses_post( $profile_image ); ?>
		</div>
	<?php } ?>
	<?php if ( isset( $first_name ) && ! empty( $first_name ) ) { ?>
		<p class="qodef-m-text qodef--first-name">
			<span class="qodef-m-text-label"><?php esc_html_e( 'First Name:', 'aperitif-membership' ); ?></span>
			<span class="qodef-m-text-value"><?php echo wp_kses_post( $first_name ); ?></span>
		</p>
	<?php } ?>
	<?php if ( isset( $last_name ) && ! empty( $last_name ) ) { ?>
		<p class="qodef-m-text qodef--last-name">
			<span class="qodef-m-text-label"><?php esc_html_e( 'Last Name:', 'aperitif-membership' ); ?></span>
			<span class="qodef-m-text-value"><?php echo wp_kses_post( $last_name ); ?></span>
		</p>
	<?php } ?>
	<?php if ( isset( $email ) && ! empty( $email ) ) { ?>
		<p class="qodef-m-text qodef--email">
			<span class="qodef-m-text-label"><?php esc_html_e( 'Email:', 'aperitif-membership' ); ?></span>
			<span class="qodef-m-text-value"><a itemprop="url" href="mailto:<?php echo sanitize_email( $email ); ?>"><?php echo sanitize_email( $email ); ?></a></span>
		</p>
	<?php } ?>
	<?php if ( isset( $website ) && ! empty( $website ) ) { ?>
		<p class="qodef-m-text qodef--website">
			<span class="qodef-m-text-label"><?php esc_html_e( 'Website:', 'aperitif-membership' ); ?></span>
			<span class="qodef-m-text-value"><a itemprop="url" href="<?php echo esc_url( $website ); ?>"><?php echo esc_url( $website ); ?></a></span>
		</p>
	<?php } ?>
	<?php if ( isset( $description ) && ! empty( $description ) ) { ?>
		<p class="qodef-m-text qodef--description">
			<span class="qodef-m-text-label"><?php esc_html_e( 'Description:', 'aperitif-membership' ); ?></span>
			<span class="qodef-m-text-value"><?php echo wp_kses_post( $description ); ?></span>
		</p>
	<?php } ?>
	<?php
	// Hook to include additional content
	do_action( 'aperitif_membership_action_additional_profile_page_content' ); ?>
</div>