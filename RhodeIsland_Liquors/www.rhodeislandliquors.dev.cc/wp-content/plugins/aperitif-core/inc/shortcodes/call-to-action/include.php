<?php

include_once 'call-to-action.php';
foreach ( glob( APERITIF_CORE_INC_PATH . '/shortcodes/call-to-action/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}