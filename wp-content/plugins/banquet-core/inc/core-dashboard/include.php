<?php

include_once BANQUET_CORE_INC_PATH . '/core-dashboard/core-dashboard.php';

if ( ! function_exists( 'banquet_core_dashboard_load_files' ) ) {
	function banquet_core_dashboard_load_files() {
		include_once BANQUET_CORE_INC_PATH . '/core-dashboard/rest/include.php';
		include_once BANQUET_CORE_INC_PATH . '/core-dashboard/registration-rest.php';
		include_once BANQUET_CORE_INC_PATH . '/core-dashboard/sub-pages/sub-page.php';
		
		foreach ( glob( BANQUET_CORE_INC_PATH . '/core-dashboard/sub-pages/*/load.php' ) as $subpages ) {
			include_once $subpages;
		}
	}
	
	add_action( 'after_setup_theme', 'banquet_core_dashboard_load_files' );
}