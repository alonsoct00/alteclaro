<?php

include_once 'counter.php';

foreach ( glob( BANQUET_CORE_SHORTCODES_PATH . '/counter/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}