<?php

if ( ! class_exists( 'BanquetCoreWooCommerce' ) ) {
	class BanquetCoreWooCommerce {
		private static $instance;
		
		public function __construct() {
			
			if ( qode_framework_is_installed( 'woocommerce' ) ) {
				// Include files
				$this->include_files();
			}
		}
		
		public static function get_instance() {
			if ( ! isset( self::$instance ) && ! ( self::$instance instanceof self ) ) {
				self::$instance = new self();
			}
			
			return self::$instance;
		}
		
		function include_files() {
			
			// Include helper functions
			include_once 'helper.php';
			
			// Include options
			include_once 'dashboard/admin/woocommerce-options.php';
			
			// Include meta boxes
			include_once 'dashboard/meta-box/product-meta-box.php';
			
			// Include shortcodes
			add_action( 'qode_framework_action_before_shortcodes_register', array( $this, 'include_shortcodes' ) );
			
			// Include widgets
			add_action( 'qode_framework_action_before_widgets_register', array( $this, 'include_widgets' ) );
			
			// Set product list layout
			add_action( 'qode_framework_action_after_options_init_' . BANQUET_CORE_OPTIONS_NAME, array( $this, 'set_product_list_layout' ) );
		}
		
		function include_shortcodes() {
			foreach ( glob( BANQUET_CORE_INC_PATH . '/woocommerce/shortcodes/*/include.php' ) as $shortcode ) {
				include_once $shortcode;
			}
		}
		
		function include_widgets() {
			foreach ( glob( BANQUET_CORE_INC_PATH . '/woocommerce/widgets/*/include.php' ) as $widget ) {
				include_once $widget;
			}
		}
		
		function set_product_list_layout() {
			/**
			 * Shop page templates hooks
			 */
			$list_item_layouts = apply_filters( 'banquet_core_filter_product_list_layouts', array() );
			$options_map       = banquet_core_get_variations_options_map( $list_item_layouts );
			
			if ( $options_map['visibility'] ) {
				$options_map['default_value'] = banquet_core_get_option_value( 'admin', 'qodef_product_list_item_layout', $options_map['default_value'] );
			}
			
			do_action( 'banquet_core_action_shop_list_item_layout_' . $options_map['default_value'] );
		}
	}
	
	BanquetCoreWooCommerce::get_instance();
}