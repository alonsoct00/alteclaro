<?php
if ( ! function_exists( 'banquet_core_register_fullscreen_search_layout' ) ) {
	function banquet_core_register_fullscreen_search_layout( $search_layouts ) {
		$search_layout = array(
			'fullscreen' => 'FullscreenSearch'
		);

		$search_layouts = array_merge( $search_layouts, $search_layout );

		return $search_layouts;
	}

	add_filter( 'banquet_core_filter_register_search_layouts', 'banquet_core_register_fullscreen_search_layout');
}