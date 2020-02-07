<?php

include_once 'banner.php';
foreach ( glob( APERITIF_CORE_INC_PATH . '/shortcodes/banner/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}