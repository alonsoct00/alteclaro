<?php

include_once 'button.php';

foreach ( glob( BANQUET_CORE_SHORTCODES_PATH . '/button/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}