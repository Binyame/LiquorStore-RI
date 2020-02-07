<?php

include_once 'clients-list.php';

foreach ( glob( APERITIF_CORE_INC_PATH . '/post-types/clients/shortcodes/clients-list/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}