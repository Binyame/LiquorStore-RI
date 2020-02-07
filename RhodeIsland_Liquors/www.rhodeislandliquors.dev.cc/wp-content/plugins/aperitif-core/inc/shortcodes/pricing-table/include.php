<?php

include_once 'pricing-table.php';
foreach ( glob( APERITIF_CORE_INC_PATH . '/shortcodes/pricing-table/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}