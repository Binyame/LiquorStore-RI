<?php

include_once APERITIF_MEMBERSHIP_LOGIN_MODAL_PATH . '/helper.php';

foreach ( glob( APERITIF_MEMBERSHIP_LOGIN_MODAL_PATH . '/*/include.php' ) as $module ) {
	include_once $module;
}