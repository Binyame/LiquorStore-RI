<?php

include_once 'team.php';
foreach ( glob( APERITIF_CORE_INC_PATH . '/shortcodes/team/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}