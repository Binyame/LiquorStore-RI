<?php
$icon_params = array(
	'custom_class'           => 'qodef-m-action-spinner fa-spin',
	'main_icon'              => 'font-awesome',
	'main_icon_font_awesome' => 'fa fa-spinner'
);

echo AperitifCoreIconShortcode::call_shortcode( $icon_params );