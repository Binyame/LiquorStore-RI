<?php

include_once 'countdown.php';
foreach ( glob( APERITIF_CORE_INC_PATH . '/shortcodes/countdown/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}