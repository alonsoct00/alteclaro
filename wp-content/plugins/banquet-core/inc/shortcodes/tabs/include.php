<?php

include_once 'tab.php';
include_once 'tab-child.php';

foreach ( glob( BANQUET_CORE_SHORTCODES_PATH . '/tabs/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}