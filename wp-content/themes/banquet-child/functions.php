<?php

if ( ! function_exists( 'banquet_child_theme_enqueue_scripts' ) ) {
	/**
	 * Function that enqueue theme's child style
	 */
	function banquet_child_theme_enqueue_scripts() {
		$main_style = 'banquet-main';
		
		wp_enqueue_style( 'banquet-child-style', get_stylesheet_directory_uri() . '/style.css', array( $main_style ) );
	}
	
	add_action( 'wp_enqueue_scripts', 'banquet_child_theme_enqueue_scripts' );
}