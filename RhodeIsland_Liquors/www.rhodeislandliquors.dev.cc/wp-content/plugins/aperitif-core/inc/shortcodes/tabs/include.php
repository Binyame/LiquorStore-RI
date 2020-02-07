<?php

include_once 'tab.php';
include_once 'tab-child.php';
foreach ( glob( APERITIF_CORE_INC_PATH . '/shortcodes/tabs/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}