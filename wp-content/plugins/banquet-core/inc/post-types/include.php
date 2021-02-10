<?php

include_once 'helper.php';

foreach ( glob( BANQUET_CORE_CPT_PATH . '/*/include.php' ) as $include ) {
	include_once $include;
}