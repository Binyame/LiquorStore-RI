<?php

include_once 'accordion.php';
include_once 'accordion-child.php';
foreach ( glob( APERITIF_CORE_INC_PATH . '/shortcodes/accordion/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}