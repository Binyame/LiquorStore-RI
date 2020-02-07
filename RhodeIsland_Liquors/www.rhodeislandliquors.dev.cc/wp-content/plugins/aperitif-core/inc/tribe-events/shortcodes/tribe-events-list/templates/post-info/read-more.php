<?php if ( ! post_password_required() ) { ?>
	<div class="qodef-e-button-holder">
		<?php
		$button_params = array(
			'link'          => tribe_get_event_link(),
			'text'          => esc_html__( 'See More', 'aperitif-core' ),
			'button_layout' => 'textual',
		);
		echo AperitifCoreButtonShortcode::call_shortcode( $button_params ); ?>
	</div>
<?php } ?>