<?php

include_once 'accordion.php';
include_once 'accordion-child.php';

foreach ( glob( BANQUET_CORE_SHORTCODES_PATH . '/accordion/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}