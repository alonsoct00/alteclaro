<?php

include_once 'social-share.php';

foreach ( glob( BANQUET_CORE_INC_PATH . '/social-share/shortcodes/social-share/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}