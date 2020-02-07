<?php

include_once 'helper.php';

foreach ( glob( APERITIF_CORE_INC_PATH . '/post-types/*/include.php' ) as $include ) {
	include_once $include;
}