<?php

include_once 'custom-font.php';
foreach ( glob( APERITIF_CORE_INC_PATH . '/shortcodes/custom-font/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}