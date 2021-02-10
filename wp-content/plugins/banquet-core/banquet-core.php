<?php
/*
Plugin Name: Banquet Core
Description: Plugin that adds portfolio post type, shortcodes and other modules
Author: Qode Themes
Version: 1.1
*/
if ( ! class_exists( 'BanquetCore' ) ) {
	class BanquetCore {
		private static $instance;
		
		function __construct() {
			$this->require_core();
			
			add_filter( 'qode_framework_filter_register_admin_options', array( $this, 'create_core_options' ) );
			
			add_action( 'qode_framework_action_before_options_init_' . BANQUET_CORE_OPTIONS_NAME, array( $this, 'init_core_options' ) );
			
			add_action( 'qode_framework_action_populate_meta_box', array( $this, 'init_core_meta_boxes' ) );
			
			// Include plugin assets
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_assets' ) );
			
			// Make plugin available for translation
			add_action( 'plugins_loaded', array( $this, 'load_plugin_textdomain' ) );
			
			// Add plugin's body classes
			add_filter( 'body_class', array( $this, 'add_body_classes' ) );
			
			// Hook to include additional modules when plugin loaded
			do_action( 'banquet_core_action_plugin_loaded' );
		}
		
		public static function get_instance() {
			if ( null == self::$instance ) {
				self::$instance = new self;
			}
			
			return self::$instance;
		}
		
		function require_core() {
			require_once 'constants.php';
			require_once BANQUET_CORE_ABS_PATH . '/helpers/helper.php';
			
			// Hook to include additional files before modules inclusion
			do_action( 'banquet_core_action_before_include_modules' );

			foreach ( glob( BANQUET_CORE_INC_PATH . '/*/include.php' ) as $module ) {
				include_once $module;
			}
			
			// Hook to include additional files after modules inclusion
			do_action( 'banquet_core_action_after_include_modules' );
		}
		
		function create_core_options( $options ) {
			$banquet_core_options_admin = new QodeFrameworkOptionsAdmin(
				BANQUET_CORE_MENU_NAME,
				BANQUET_CORE_OPTIONS_NAME,
				array(
					'label' => esc_html__( 'Banquet Core Options', 'banquet-core' )
				)
			);
			$options[] = $banquet_core_options_admin;
			
			return $options;
		}
		
		function init_core_options() {
			$qode_framework = qode_framework_get_framework_root();
			
			if ( ! empty( $qode_framework ) ) {
				$page = $qode_framework->add_options_page(
					array(
						'scope'       => BANQUET_CORE_OPTIONS_NAME,
						'type'        => 'admin',
						'slug'        => 'general',
						'title'       => esc_html__( 'General', 'banquet-core' ),
						'description' => esc_html__( 'General Core Options', 'banquet-core' ),
						'icon'        => 'fa fa-cog'
					)
				);
				
				// Hook to include additional options after default options
				do_action( 'banquet_core_action_default_options_init', $page );
			}
		}
		
		function init_core_meta_boxes() {
			do_action( 'banquet_core_action_default_meta_boxes_init' );
		}
		
		function enqueue_assets() {
			// CSS and JS dependency variables
			$style_dependency_array  = apply_filters( 'banquet_core_filter_style_dependencies', array( 'banquet-main' ) );
			$script_dependency_array = apply_filters( 'banquet_core_filter_script_dependencies', array( 'banquet-main-js' ) );
			
			// Hook to include additional scripts before plugin's main style
			do_action( 'banquet_core_action_before_main_css' );
			
			// Enqueue plugin's main style
			wp_enqueue_style( 'banquet-core-style', BANQUET_CORE_URL_PATH . 'assets/css/banquet-core.min.css', $style_dependency_array );
			
			// Enqueue plugin's 3rd party scripts
			wp_enqueue_script( 'jquery-ui-core' );
			wp_enqueue_script( 'jquery-easing-1.3', BANQUET_CORE_URL_PATH . 'assets/plugins/jquery/jquery.easing.1.3.js', array( 'jquery' ), false, true );
			wp_enqueue_script( 'modernizr', BANQUET_CORE_URL_PATH . 'assets/plugins/modernizr/modernizr.js', array( 'jquery' ), false, true );
			
			// Hook to include additional scripts before plugin's main script
			do_action( 'banquet_core_action_before_main_js' );
			
			// Enqueue plugin's main script
			wp_enqueue_script( 'banquet-core-script', BANQUET_CORE_URL_PATH . 'assets/js/banquet-core.min.js', $script_dependency_array, false, true );
		}
		
		function load_plugin_textdomain() {
			load_plugin_textdomain( 'banquet-core', false, BANQUET_CORE_REL_PATH . '/languages' );
		}
		
		function add_body_classes( $classes ) {
			$classes[] = 'banquet-core-' . BANQUET_CORE_VERSION;
			
			return $classes;
		}
	}
}

if ( ! function_exists( 'banquet_core_instantiate_plugin' ) ) {
	function banquet_core_instantiate_plugin() {
		BanquetCore::get_instance();
	}
	
	add_action( 'qode_framework_action_load_dependent_plugins', 'banquet_core_instantiate_plugin' );
}

if( ! function_exists( 'banquet_core_check_requirements' ) ) {
	function banquet_core_check_requirements() {
		if ( ! defined( 'QODE_FRAMEWORK_VERSION' ) ) {
			add_action( 'admin_notices', 'banquet_core_admin_notice_content' );
		}
	}
	
	add_action( 'plugins_loaded', 'banquet_core_check_requirements' );
}

if( ! function_exists( 'banquet_core_admin_notice_content' ) ) {
	function banquet_core_admin_notice_content() {
		echo sprintf( '<div class="notice notice-error"><p>%s</p></div>', esc_html__( 'Qode Framework plugin is required for Banquet Core plugin to work properly. Please install/activate it first.', 'banquet-core' ) );
		
		if ( function_exists( 'deactivate_plugins' ) ) {
			deactivate_plugins( plugin_basename( __FILE__ ) );
		}
	}
}