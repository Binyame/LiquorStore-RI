<?php if ( ! post_password_required() ) { ?>
	<div class="qodef-e-read-more">
		<?php
		$button_params = array(
			'link' => get_the_permalink(),
			'text' => esc_html__( 'Read More', 'aperitif-core' )
		);
		
		echo AperitifCoreButtonShortcode::call_shortcode( $button_params ); ?>
	</div>
<?php } ?>