<?php

include_once APERITIF_MEMBERSHIP_LOGIN_MODAL_PATH . '/social-login/helper.php';
include_once APERITIF_MEMBERSHIP_LOGIN_MODAL_PATH . '/social-login/dashboard/admin/social-login-options.php';

foreach ( glob( APERITIF_MEMBERSHIP_LOGIN_MODAL_PATH . '/social-login/*/include.php' ) as $module ) {
	include_once $module;
}