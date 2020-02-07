<div class="qodef-m-social-icons-group">
	<?php
	if ( ! empty( $icon_params ) ) {
		foreach ( $icon_params as $icon_param ) {
			echo AperitifCoreIconShortcode::call_shortcode( $icon_param );
		}
	}
	?>
</div>