<?php
if ( 'link-button' === $link_appearance ) { ?>
	<div class="qodef-m-button">
		<?php echo AperitifCoreButtonShortcode::call_shortcode( $button_params ); ?>
	</div>
<?php }