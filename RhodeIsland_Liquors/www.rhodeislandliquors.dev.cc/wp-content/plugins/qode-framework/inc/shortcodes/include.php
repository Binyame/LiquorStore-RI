<?php

require_once 'shortcodes.php';
require_once 'shortcode.php';

foreach ( glob( QODE_FRAMEWORK_SHORTCODES_PATH . '/translators/*/*-translator.php' ) as $translator ) {
	require_once $translator;
}