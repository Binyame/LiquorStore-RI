<?php

include_once 'hover-animations.php';
foreach ( glob( APERITIF_CORE_INC_PATH . '/post-types/clients/shortcodes/clients-list/variations/image-only/hover-animations/*/include.php' ) as $animation ) {
	include_once $animation;
}