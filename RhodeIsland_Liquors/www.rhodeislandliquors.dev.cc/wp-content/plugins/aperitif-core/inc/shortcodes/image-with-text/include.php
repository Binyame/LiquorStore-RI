<?php

include_once 'image-with-text.php';
foreach ( glob( APERITIF_CORE_INC_PATH . '/shortcodes/image-with-text/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}