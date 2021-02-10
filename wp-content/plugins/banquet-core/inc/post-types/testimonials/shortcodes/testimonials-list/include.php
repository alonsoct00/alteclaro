<?php

include_once 'testimonials-list.php';

foreach ( glob( BANQUET_CORE_CPT_PATH . '/testimonials/shortcodes/testimonials-list/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}