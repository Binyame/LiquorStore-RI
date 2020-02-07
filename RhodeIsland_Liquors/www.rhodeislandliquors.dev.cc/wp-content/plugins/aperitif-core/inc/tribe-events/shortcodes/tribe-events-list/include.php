<?php

include_once 'tribe-events-list.php';

foreach ( glob( APERITIF_CORE_INC_PATH . '/tribe-events/shortcodes/tribe-events-list/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}