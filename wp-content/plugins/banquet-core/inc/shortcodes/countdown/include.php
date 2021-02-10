<?php

include_once 'countdown.php';

foreach ( glob( BANQUET_CORE_SHORTCODES_PATH . '/countdown/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}