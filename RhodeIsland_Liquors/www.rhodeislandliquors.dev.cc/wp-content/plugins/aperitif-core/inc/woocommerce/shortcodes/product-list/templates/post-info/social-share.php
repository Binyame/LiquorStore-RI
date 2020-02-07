<?php if ( class_exists( 'AperitifCoreSocialShareShortcode' ) ) { ?>
	<div class="qodef-woo-product-social-share">
		<?php
		$params          = array();
		$params['title'] = esc_html__( 'Share:', 'aperitif-core' );
		
		echo AperitifCoreSocialShareShortcode::call_shortcode( $params ); ?>
	</div>
<?php } ?>