<?php

include_once 'search.php';
include_once 'helper.php';

include_once 'dashboard/admin/search-options.php';
foreach ( glob( APERITIF_CORE_INC_PATH . '/search/layouts/*/include.php' ) as $layout ) {
	include_once $layout;
}
