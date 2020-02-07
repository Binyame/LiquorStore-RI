<?php

foreach ( glob( APERITIF_CORE_CPT_PATH . '/restaurant-menu/dashboard/meta-box/*.php' ) as $module ) {
	include_once $module;
}