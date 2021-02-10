<?php

include_once 'call-to-action.php';

foreach ( glob( BANQUET_CORE_SHORTCODES_PATH . '/call-to-action/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}