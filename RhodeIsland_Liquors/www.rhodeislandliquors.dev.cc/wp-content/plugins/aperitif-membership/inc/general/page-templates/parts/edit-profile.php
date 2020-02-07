<?php

if ( ! function_exists( 'aperitif_membership_dashboard_edit_profile_fields' ) ) {
	function aperitif_membership_dashboard_edit_profile_fields( $params ) {
		$qode_framework = qode_framework_get_framework_root();
		
		$page = $qode_framework->add_options_page(
			array(
				'type'         => 'front-end',
				'slug'         => 'edit-profile-page',
				'title'        => esc_html__( 'Edit Profile', 'aperitif-membership' ),
				'form_id'      => 'qodef-membership-edit-profile',
				'form_action'  => 'aperitif_membership_action_update_user_profile',
				'name'         => 'edit_profile_form',
				'method'       => 'POST',
				'button_label' => esc_html__( 'Update Profile', 'aperitif-membership' ),
				'button_args'  => array(
					'data-updating-text' => esc_html__( 'Updating Profile', 'aperitif-membership' ),
					'data-updated-text'  => esc_html__( 'Profile Updated', 'aperitif-membership' ),
				)
			)
		);
		
		if ( $page ) {
			extract( $params );
			
			$page->add_field_element(
				array(
					'field_type'    => 'text',
					'name'          => 'first_name',
					'title'         => esc_html__( 'First Name', 'aperitif-membership' ),
					'default_value' => $first_name
				)
			);
			
			$page->add_field_element(
				array(
					'field_type'    => 'text',
					'name'          => 'last_name',
					'title'         => esc_html__( 'Last Name', 'aperitif-membership' ),
					'default_value' => $last_name
				)
			);
			
			$page->add_field_element(
				array(
					'field_type'    => 'text',
					'name'          => 'user_email',
					'title'         => esc_html__( 'Email', 'aperitif-membership' ),
					'default_value' => $email
				)
			);
			
			$page->add_field_element(
				array(
					'field_type'    => 'text',
					'name'          => 'user_url',
					'title'         => esc_html__( 'Website', 'aperitif-membership' ),
					'default_value' => $website
				)
			);
			
			$page->add_field_element(
				array(
					'field_type'    => 'text',
					'name'          => 'description',
					'title'         => esc_html__( 'Description', 'aperitif-membership' ),
					'default_value' => $description
				)
			);

			$page->add_field_element(
				array(
					'field_type' => 'password',
					'name'       => 'user_password',
					'title'      => esc_html__( 'Password', 'aperitif-membership' )
				)
			);

			$page->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'user_confirm_password',
					'title'      => esc_html__( 'Repeat Password', 'aperitif-membership' )
				)
			);
			
			$page->render();
		}
	}
}
?>
<div class="qodef-m-content-inner qodef--<?php echo esc_attr( isset( $action ) && ! empty( $action ) ? $action : 'dashboard' ); ?>">
	<?php aperitif_membership_dashboard_edit_profile_fields( $params ); ?>
</div>