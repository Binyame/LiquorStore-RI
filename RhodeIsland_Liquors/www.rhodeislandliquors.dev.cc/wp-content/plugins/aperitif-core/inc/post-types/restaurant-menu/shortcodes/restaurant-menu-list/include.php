<?php

include_once 'restaurant-menu-list.php';

foreach ( glob( APERITIF_CORE_INC_PATH . '/post-types/restaurant-menu/shortcodes/restaurant-menu-list/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}