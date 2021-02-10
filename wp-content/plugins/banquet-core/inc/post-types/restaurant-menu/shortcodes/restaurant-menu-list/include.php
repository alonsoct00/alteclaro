<?php

include_once 'restaurant-menu-list.php';

foreach ( glob( BANQUET_CORE_CPT_PATH . '/restaurant-menu/shortcodes/restaurant-menu-list/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}