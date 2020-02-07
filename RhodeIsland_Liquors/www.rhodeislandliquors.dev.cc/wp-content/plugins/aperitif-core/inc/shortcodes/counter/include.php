<?php

include_once 'counter.php';
foreach ( glob( APERITIF_CORE_INC_PATH . '/shortcodes/counter/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}