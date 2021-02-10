<?php

include_once 'pricing-table.php';

foreach ( glob( BANQUET_CORE_SHORTCODES_PATH . '/pricing-table/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}