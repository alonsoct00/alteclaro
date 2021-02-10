<?php

include_once 'stacked-images.php';

foreach ( glob( BANQUET_CORE_SHORTCODES_PATH . '/stacked-images/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}