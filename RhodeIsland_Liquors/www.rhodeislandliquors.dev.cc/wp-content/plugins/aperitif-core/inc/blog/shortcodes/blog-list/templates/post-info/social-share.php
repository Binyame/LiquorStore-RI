<?php if ( class_exists( 'AperitifCoreSocialShareShortcode' ) ) { ?>
	<div class="qodef-e-info-item qodef-e-info-social-share">
		<?php
		$params           = array();
		$params['layout'] = 'dropdown';
		
		echo AperitifCoreSocialShareShortcode::call_shortcode( $params ); ?>
	</div>
<?php } ?>