<?php

include_once 'clients-list.php';

foreach ( glob( BANQUET_CORE_CPT_PATH . '/clients/shortcodes/clients-list/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}