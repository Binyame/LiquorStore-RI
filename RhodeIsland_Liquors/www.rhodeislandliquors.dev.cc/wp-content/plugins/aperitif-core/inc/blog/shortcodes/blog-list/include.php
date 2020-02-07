<?php

include_once 'blog-list.php';

foreach ( glob( APERITIF_CORE_INC_PATH . '/blog/shortcodes/blog-list/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}