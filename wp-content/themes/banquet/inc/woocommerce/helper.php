<?php

if ( ! function_exists( 'banquet_is_woo_page' ) ) {
	/**
	 * Function that check WooCommerce pages
	 *
	 * @param $page string
	 *
	 * @return bool
	 */
	function banquet_is_woo_page( $page ) {
		switch ( $page ) {
			case 'shop':
				return function_exists( 'is_shop' ) && is_shop();
				break;
			case 'single':
				return is_singular( 'product' );
				break;
			case 'cart':
				return function_exists( 'is_cart' ) && is_cart();
				break;
			case 'checkout':
				return function_exists( 'is_checkout' ) && is_checkout();
				break;
			case 'account':
				return function_exists( 'is_account_page' ) && is_account_page();
				break;
			case 'category':
				return function_exists( 'is_product_category' ) && is_product_category();
				break;
			case 'tag':
				return function_exists( 'is_product_tag' ) && is_product_tag();
				break;
			case 'any':
				return (
					function_exists( 'is_shop' ) && is_shop() ||
					is_singular( 'product' ) ||
					function_exists( 'is_cart' ) && is_cart() ||
					function_exists( 'is_checkout' ) && is_checkout() ||
					function_exists( 'is_account_page' ) && is_account_page() ||
					function_exists( 'is_product_category' ) && is_product_category() ||
					function_exists( 'is_product_tag' ) && is_product_tag()
				);
				break;
			default:
				return false;
		}
	}
}

if ( ! function_exists( 'banquet_get_post_value_through_levels' ) ) {
	/**
	 * Function that check WooCommerce pages
	 *
	 * @param string $page
	 *
	 * @return bool
	 */
	function banquet_get_post_value_through_levels( $page ) {
		switch ( $page ) {
			case 'shop':
				return function_exists( 'is_shop' ) && is_shop();
				break;
			case 'single':
				return is_singular( 'product' );
				break;
			case 'cart':
				return function_exists( 'is_cart' ) && is_cart();
				break;
			case 'checkout':
				return function_exists( 'is_checkout' ) && is_checkout();
				break;
			case 'account':
				return function_exists( 'is_account_page' ) && is_account_page();
				break;
			case 'category':
				return function_exists( 'is_product_category' ) && is_product_category();
				break;
			case 'tag':
				return function_exists( 'is_product_tag' ) && is_product_tag();
				break;
			case 'any':
				return (
					function_exists( 'is_shop' ) && is_shop() ||
					is_singular( 'product' ) ||
					function_exists( 'is_cart' ) && is_cart() ||
					function_exists( 'is_checkout' ) && is_checkout() ||
					function_exists( 'is_account_page' ) && is_account_page() ||
					function_exists( 'is_product_category' ) && is_product_category() ||
					function_exists( 'is_product_tag' ) && is_product_tag()
				);
				break;
			default:
				return false;
		}
	}
}

if ( ! function_exists( 'banquet_get_woo_main_page_classes' ) ) {
	/**
	 * Function that return current WooCommerce page class name
	 *
	 * @return string
	 */
	function banquet_get_woo_main_page_classes() {
		$classes = array();

		if ( banquet_is_woo_page( 'shop' ) ) {
			$classes[] = 'qodef--list';
		}

		if ( banquet_is_woo_page( 'single' ) ) {
			$classes[] = 'qodef--single';

			if ( banquet_get_post_value_through_levels( 'qodef_woo_single_enable_image_lightbox' ) === 'photo-swipe' ) {
				$classes[] = 'qodef-popup--photo-swipe';
			}

			if ( banquet_get_post_value_through_levels( 'qodef_woo_single_enable_image_lightbox' ) === 'magnific-popup' ) {
				$classes[] = 'qodef-popup--magnific-popup';
				// add classes to initialize lightbox from theme
				$classes[] = 'qodef-magnific-popup';
				$classes[] = 'qodef-popup-gallery';
			}
		}

		if ( banquet_is_woo_page( 'cart' ) ) {
			$classes[] = 'qodef--cart';
		}

		if ( banquet_is_woo_page( 'checkout' ) ) {
			$classes[] = 'qodef--checkout';
		}

		if ( banquet_is_woo_page( 'account' ) ) {
			$classes[] = 'qodef--account';
		}

		return apply_filters( 'banquet_filter_main_page_classes', implode( ' ', $classes ) );
	}
}

if ( ! function_exists( 'banquet_woo_get_global_product' ) ) {
	/**
	 * Function that return global WooCommerce object
	 *
	 * @return object
	 */
	function banquet_woo_get_global_product() {
		global $product;

		return $product;
	}
}

if ( ! function_exists( 'banquet_woo_get_main_shop_page_id' ) ) {
	/**
	 * Function that return main shop page ID
	 *
	 * @return int
	 */
	function banquet_woo_get_main_shop_page_id() {
		// Get page id from options table
		$shop_id = get_option( 'woocommerce_shop_page_id' );

		if ( ! empty( $shop_id ) ) {
			return $shop_id;
		}

		return false;
	}
}

if ( ! function_exists( 'banquet_woo_set_main_shop_page_id' ) ) {
	/**
	 * Function that set main shop page ID for get_post_meta options
	 *
	 * @param $post_id int
	 *
	 * @return int
	 */
	function banquet_woo_set_main_shop_page_id( $post_id ) {

		if ( banquet_is_woo_page( 'shop' ) || banquet_is_woo_page( 'single' ) || banquet_is_woo_page( 'category' ) || banquet_is_woo_page( 'tag' ) ) {
			$shop_id = banquet_woo_get_main_shop_page_id();

			if ( ! empty( $shop_id ) ) {
				$post_id = $shop_id;
			}
		}

		return $post_id;
	}

	add_filter( 'banquet_filter_page_id', 'banquet_woo_set_main_shop_page_id' );
	add_filter( 'qode_framework_filter_page_id', 'banquet_woo_set_main_shop_page_id' );
}

if ( ! function_exists( 'banquet_woo_set_page_title_text' ) ) {
	/**
	 * Function that returns current page title text for WooCommerce pages
	 *
	 * @param $title string
	 *
	 * @return string
	 */
	function banquet_woo_set_page_title_text( $title ) {

		if ( banquet_is_woo_page( 'shop' ) || banquet_is_woo_page( 'single' ) ) {
			$shop_id = banquet_woo_get_main_shop_page_id();

			$title = ! empty( $shop_id ) ? get_the_title( $shop_id ) : esc_html__( 'Shop', 'banquet' );
		} else if ( banquet_is_woo_page( 'category' ) || banquet_is_woo_page( 'tag' ) ) {
			$taxonomy_slug = banquet_is_woo_page( 'tag' ) ? 'product_tag' : 'product_cat';
			$taxonomy      = get_term( get_queried_object_id(), $taxonomy_slug );

			if ( ! empty( $taxonomy ) ) {
				$title = esc_html( $taxonomy->name );
			}
		}

		return $title;
	}

	add_filter( 'banquet_filter_page_title_text', 'banquet_woo_set_page_title_text' );
}

if ( ! function_exists( 'banquet_woo_breadcrumbs_title' ) ) {
	function banquet_woo_breadcrumbs_title( $wrap_child, $settings ) {
		
		if ( banquet_is_woo_page( 'category' ) || banquet_is_woo_page( 'tag' ) ) {
			$wrap_child    = '';
			$taxonomy_slug = banquet_is_woo_page( 'tag' ) ? 'product_tag' : 'product_cat';
			$taxonomy      = get_term( get_queried_object_id(), $taxonomy_slug );
			
			if ( isset( $taxonomy->parent ) && $taxonomy->parent !== 0 ) {
				$parent     = get_term( $taxonomy->parent );
				$wrap_child .= sprintf( $settings['link'], get_term_link( $parent->term_id ), $parent->name ) . $settings['separator'];
			}
			
			if ( ! empty( $taxonomy ) ) {
				$wrap_child .= sprintf( $settings['current_item'], esc_attr( $taxonomy->name ) );
			}
			
		} elseif ( banquet_is_woo_page( 'shop' ) ) {
			$shop_id    = banquet_woo_get_main_shop_page_id();
			$shop_title = ! empty( $shop_id ) ? get_the_title( $shop_id ) : esc_html__( 'Shop', 'banquet' );
			
			$wrap_child .= sprintf( $settings['current_item'], $shop_title );
			
		} elseif ( banquet_is_woo_page( 'single' ) ) {
			$wrap_child = '';
			$categories = wp_get_post_terms( get_the_ID(), 'product_cat' );
			
			if ( ! empty ( $categories ) ) {
				$category = $categories[0];
				if ( isset( $category->parent ) && $category->parent !== 0 ) {
					$parent     = get_term( $category->parent );
					$wrap_child .= sprintf( $settings['link'], get_term_link( $parent->term_id ), $parent->name ) . $settings['separator'];
				}
				$wrap_child .= sprintf( $settings['link'], get_term_link( $category ), $category->name ) . $settings['separator'];
			}
			
			$wrap_child .= sprintf( $settings['current_item'], get_the_title() );
		}
		
		return $wrap_child;
	}
	
	add_filter( 'banquet_core_filter_breadcrumbs_content', 'banquet_woo_breadcrumbs_title', 10, 2 );
}

if ( ! function_exists( 'banquet_woo_single_add_theme_supports' ) ) {
	/**
	 * Function that add native WooCommerce supports
	 */
	function banquet_woo_single_add_theme_supports() {
		// Add featured image zoom functionality on product single page
		$is_zoom_enabled = banquet_get_post_value_through_levels( 'qodef_woo_single_enable_image_zoom' ) !== 'no';

		if ( $is_zoom_enabled ) {
			add_theme_support( 'wc-product-gallery-zoom' );
		}

		// Add photo swipe lightbox functionality on product single images page
		$is_photo_swipe_enabled = banquet_get_post_value_through_levels( 'qodef_woo_single_enable_image_lightbox' ) === 'photo-swipe';

		if ( $is_photo_swipe_enabled ) {
			add_theme_support( 'wc-product-gallery-lightbox' );
		}
	}

	add_action( 'wp_loaded', 'banquet_woo_single_add_theme_supports', 11 ); // permission 11 is set because options are init with permission 10 inside framework plugin
}

if ( ! function_exists( 'banquet_woo_single_disable_page_title' ) ) {
	/**
	 * Function that disable page title area for single product page
	 *
	 * @param $enable_page_title bool
	 *
	 * @return bool
	 */
	function banquet_woo_single_disable_page_title( $enable_page_title ) {
		$is_enabled = banquet_get_post_value_through_levels( 'qodef_woo_single_enable_page_title' ) !== 'no';

		if ( ! $is_enabled && banquet_is_woo_page( 'single' ) ) {
			$enable_page_title = false;
		}

		return $enable_page_title;
	}

	add_filter( 'banquet_filter_enable_page_title', 'banquet_woo_single_disable_page_title' );
}

if ( ! function_exists( 'banquet_woo_single_thumb_images_position' ) ) {
	/**
	 * Function that changes the layout of thumbnails on single product page
	 */
	function banquet_woo_single_thumb_images_position( $classes ) {
		$product_thumbnail_position = banquet_is_installed( 'core' ) ? banquet_get_post_value_through_levels( 'qodef_woo_single_thumb_images_position' ) : 'below';

		if ( ! empty( $product_thumbnail_position ) ) {
			$classes[] = 'qodef-position--' . $product_thumbnail_position;
		}

		return $classes;
	}

	add_filter( 'woocommerce_single_product_image_gallery_classes', 'banquet_woo_single_thumb_images_position' );
}

if ( ! function_exists( 'banquet_set_woo_custom_sidebar_name' ) ) {
	/**
	 * Function that return sidebar name
	 *
	 * @param $sidebar_name string
	 *
	 * @return string
	 */
	function banquet_set_woo_custom_sidebar_name( $sidebar_name ) {
	
		if ( banquet_is_woo_page( 'shop' ) || banquet_is_woo_page( 'category' ) || banquet_is_woo_page( 'tag' ) ) {
			$option = banquet_get_post_value_through_levels( 'qodef_woo_product_list_custom_sidebar' );
			
			if ( isset( $option ) && ! empty( $option ) ) {
				$sidebar_name = $option;
			}
		}

		return $sidebar_name;
	}

	add_filter( 'banquet_filter_sidebar_name', 'banquet_set_woo_custom_sidebar_name' );
}

if ( ! function_exists( 'banquet_set_woo_sidebar_layout' ) ) {
	/**
	 * Function that return sidebar layout
	 *
	 * @param $layout string
	 *
	 * @return string
	 */
	function banquet_set_woo_sidebar_layout( $layout ) {
		
		if ( banquet_is_woo_page( 'shop' ) || banquet_is_woo_page( 'category' ) || banquet_is_woo_page( 'tag' ) ) {
			$option = banquet_get_post_value_through_levels( 'qodef_woo_product_list_sidebar_layout' );

			if ( isset( $option ) && ! empty( $option ) ) {
				$layout = $option;
			}
		}

		return $layout;
	}

	add_filter( 'banquet_filter_sidebar_layout', 'banquet_set_woo_sidebar_layout' );
}

if ( ! function_exists( 'banquet_set_woo_sidebar_grid_gutter_classes' ) ) {
	/**
	 * Function that returns grid gutter classes
	 *
	 * @param $classes string
	 *
	 * @return string
	 */
	function banquet_set_woo_sidebar_grid_gutter_classes( $classes ) {
		
		if ( banquet_is_woo_page( 'shop' ) || banquet_is_woo_page( 'category' ) || banquet_is_woo_page( 'tag' ) ) {
			$option = banquet_get_post_value_through_levels( 'qodef_woo_product_list_sidebar_grid_gutter' );
			
			if ( isset( $option ) && ! empty( $option ) ) {
				$classes = 'qodef-gutter--' . esc_attr( $option );
			}
		}

		return $classes;
	}

	add_filter( 'banquet_filter_grid_gutter_classes', 'banquet_set_woo_sidebar_grid_gutter_classes' );
}