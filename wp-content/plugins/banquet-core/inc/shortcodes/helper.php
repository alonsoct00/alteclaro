<?php

if ( ! function_exists( 'banquet_core_include_shortcodes_classes' ) ) {
	/**
	 * Function that includes shortcodes
	 */
	function banquet_core_include_shortcodes_classes() {
		include_once 'shortcode.php';
		include_once 'list-shortcode.php';
	}
	
	add_action( 'qode_framework_action_before_shortcodes_register', 'banquet_core_include_shortcodes_classes', 5 );
}

if ( ! function_exists( 'banquet_core_include_shortcodes' ) ) {
	/**
	 * Function that includes shortcodes
	 */
	function banquet_core_include_shortcodes() {
		foreach ( glob( BANQUET_CORE_SHORTCODES_PATH . '/*/include.php' ) as $shortcode ) {
			include_once $shortcode;
		}
	}
	
	add_action( 'qode_framework_action_before_shortcodes_register', 'banquet_core_include_shortcodes' );
}

if ( ! function_exists( 'banquet_core_register_shortcodes' ) ) {
	/**
	 * Function that register shortcodes
	 */
	function banquet_core_register_shortcodes() {
		$qode_framework = qode_framework_get_framework_root();
		$shortcodes     = apply_filters( 'banquet_core_filter_register_shortcodes', $shortcodes = array() );
		
		if ( ! empty( $shortcodes ) ) {
			foreach ( $shortcodes as $shortcode ) {
				$qode_framework->add_shortcode( new $shortcode() );
			}
		}
	}
	
	add_action( 'qode_framework_action_before_shortcodes_register', 'banquet_core_register_shortcodes', 11 ); // Priority 11 set because include of files is called on default action 10
}

if ( ! function_exists( 'banquet_core_include_shortcode_widgets' ) ) {
	/**
	 * Function that includes widgets
	 */
	function banquet_core_include_shortcode_widgets() {
		foreach ( glob( BANQUET_CORE_SHORTCODES_PATH . '/*/widget/include.php' ) as $widget ) {
			include_once $widget;
		}
	}
	
	add_action( 'qode_framework_action_before_widgets_register', 'banquet_core_include_shortcode_widgets' );
}

if ( ! function_exists( 'banquet_core_include_shortcode_media_fields' ) ) {
	/**
	 * Function that includes widgets
	 */
	function banquet_core_include_shortcode_media_fields() {
		foreach ( glob( BANQUET_CORE_SHORTCODES_PATH . '/*/media-custom-fields.php' ) as $media ) {
			include_once $media;
		}
	}
	
	add_action( 'qode_framework_action_custom_media_fields', 'banquet_core_include_shortcode_media_fields' );
}

if ( ! function_exists( 'banquet_core_get_list_shortcode_item_image' ) ) {
	/**
	 * Function that generates thumbnail img tag for list shortcodes
	 *
	 * @param $image_dimension string
	 * @param $attachment_id int
	 * @param $custom_image_width int
	 * @param $custom_image_height int
	 *
	 * @return string generated img tag
	 *
	 * @see qode_framework_generate_thumbnail()
	 */
	function banquet_core_get_list_shortcode_item_image( $image_dimension, $attachment_id = 0, $custom_image_width = 0, $custom_image_height = 0 ) {
		$item_id = get_the_ID();
		
		if ( $image_dimension !== 'custom' ) {
			if ( ! empty( $attachment_id ) ) {
				$html = wp_get_attachment_image( $attachment_id, $image_dimension );
			} else {
				$html = get_the_post_thumbnail( $item_id, $image_dimension );
			}
		} else {
			if ( ! empty( $custom_image_width ) && ! empty( $custom_image_height ) ) {
				if ( ! empty( $attachment_id ) ) {
					$html = qode_framework_generate_thumbnail( intval( $attachment_id ), $custom_image_width, $custom_image_height );
				} else {
					$html = qode_framework_generate_thumbnail( intval( get_post_thumbnail_id( $item_id ) ), $custom_image_width, $custom_image_height );
				}
			} else {
				$html = get_the_post_thumbnail( $item_id, $image_dimension );
			}
		}
		
		return apply_filters( 'banquet_core_filter_list_shortcode_item_image', $html, $attachment_id );
	}
}

if ( ! function_exists( 'banquet_core_get_list_shortcode_item_image_url' ) ) {
	/**
	 * Function that return thumbnail img url for list shortcodes
	 *
	 * @param $image_dimension string
	 * @param $attachment_id int
	 *
	 * @return string
	 */
	function banquet_core_get_list_shortcode_item_image_url( $image_dimension, $attachment_id = 0 ) {
		
		if ( ! empty ( $attachment_id ) ) {
			$image = wp_get_attachment_image_src( intval( $attachment_id ), $image_dimension );
			$url   = $image[0];
		} else {
			$url = get_the_post_thumbnail_url( get_the_ID(), $image_dimension );
		}
		
		return $url;
	}
}