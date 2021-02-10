<?php

include_once 'team-list.php';

foreach ( glob( BANQUET_CORE_CPT_PATH . '/team/shortcodes/team-list/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}