<?php

if ( ! function_exists( 'banquet_core_include_core_is_installed' ) ) {
	/**
	 * Function that set case is installed element for framework functionality
	 *
	 * @param $installed bool
	 * @param $plugin string - plugin name
	 *
	 * @return bool
	 */
	function banquet_core_include_core_is_installed( $installed, $plugin ) {
		
		if ( $plugin === 'core' ) {
			return class_exists( 'BanquetCore' );
		}
		
		return $installed;
	}
	
	add_filter( 'qode_framework_filter_is_plugin_installed', 'banquet_core_include_core_is_installed', 10, 2 );
}

if ( ! function_exists( 'banquet_core_list_sc_template_part' ) ) {
	/**
	 * Echo module template part.
	 *
	 * @param string $module name of the module from inc folder
	 * @param string $template full path of the template to load
	 * @param string $slug
	 * @param array  $params array of parameters to pass to template
	 */
	function banquet_core_list_sc_template_part( $module, $template, $slug = '', $params = array() ) {
		echo banquet_core_get_list_sc_template_part( $module, $template, $slug, $params );
	}
}

if ( ! function_exists( 'banquet_core_get_list_sc_template_part' ) ) {
	/**
	 * Echo module template part.
	 *
	 * @param string $module name of the module from inc folder
	 * @param string $template full path of the template to load
	 * @param string $slug
	 * @param array  $params array of parameters to pass to template
	 *
	 * @return string - string containing html of template
	 */
	function banquet_core_get_list_sc_template_part( $module, $template, $slug = '', $params = array() ) {
		$root = BANQUET_CORE_INC_PATH;
		
		return qode_framework_get_list_sc_template_part( $root, $module, $template, $slug, $params );
	}
}

if ( ! function_exists( 'banquet_core_template_part' ) ) {
	/**
	 * Echo module template part.
	 *
	 * @param string $module name of the module from inc folder
	 * @param string $template full path of the template to load
	 * @param string $slug
	 * @param array  $params array of parameters to pass to template
	 *
	 */
	function banquet_core_template_part( $module, $template, $slug = '', $params = array() ) {
		echo banquet_core_get_template_part( $module, $template, $slug, $params );
	}
}

if ( ! function_exists( 'banquet_core_get_template_part' ) ) {
	/**
	 * Loads module template part.
	 *
	 * @param string $module name of the module from inc folder
	 * @param string $template full path of the template to load
	 * @param string $slug
	 * @param array  $params array of parameters to pass to template
	 *
	 * @return string - string containing html of template
	 */
	function banquet_core_get_template_part( $module, $template, $slug = '', $params = array() ) {
		$root = BANQUET_CORE_INC_PATH;
		
		return qode_framework_get_template_part( $root, $module, $template, $slug, $params );
	}
}

if ( ! function_exists( 'banquet_core_theme_template_part' ) ) {
	/**
	 * Function that echo module template part.
	 *
	 * @param string $module name of the module from inc folder
	 * @param string $template full path of the template to load
	 * @param string $slug
	 * @param array  $params array of parameters to pass to template
	 */
	function banquet_core_theme_template_part( $module, $template, $slug = '', $params = array() ) {
		echo banquet_core_get_theme_template_part( $module, $template, $slug, $params );
	}
}

if ( ! function_exists( 'banquet_core_get_theme_template_part' ) ) {
	/**
	 * Function that load module template part.
	 *
	 * @param string $module name of the module from inc folder
	 * @param string $template full path of the template to load
	 * @param string $slug
	 * @param array  $params array of parameters to pass to template
	 *
	 * @return string - string containing html of template
	 */
	function banquet_core_get_theme_template_part( $module, $template, $slug = '', $params = array() ) {
		return qode_framework_is_installed( 'theme' ) ? banquet_get_template_part( $module, $template, $slug, $params ) : '';
	}
}

if ( ! function_exists( 'banquet_core_get_option_value' ) ) {
	/**
	 * Function that returns option value using framework function but providing it's own scope
	 *
	 * @param string $type option type
	 * @param string $name name of option
	 * @param string $default_value option default value
	 * @param int    $post_id id of
	 *
	 * @return string value of option
	 */
	function banquet_core_get_option_value( $type, $name, $default_value = '', $post_id = null ) {
		$scope = BANQUET_CORE_OPTIONS_NAME;
		
		return qode_framework_get_option_value( $scope, $type, $name, $default_value, $post_id );
	}
}

if ( ! function_exists( 'banquet_core_get_post_value_through_levels' ) ) {
	/**
	 * Function that returns meta value if exists, otherwise global value using framework function but providing it's own scope
	 *
	 * @param string $name name of option
	 * @param int    $post_id id of
	 *
	 * @return string value of option
	 */
	function banquet_core_get_post_value_through_levels( $name, $post_id = null ) {
		$scope = BANQUET_CORE_OPTIONS_NAME;
		
		return qode_framework_get_post_value_through_levels( $scope, $name, $post_id );
	}
}

if ( ! function_exists( 'banquet_core_get_query_params' ) ) {
	/**
	 * Function that return query parameters
	 *
	 * @param $atts array - options value
	 *
	 * @return array
	 */
	function banquet_core_get_query_params( $atts ) {
		return qode_framework_is_installed( 'theme' ) ? banquet_get_query_params( $atts ) : array();
	}
}

if ( ! function_exists( 'banquet_core_get_pagination_data' ) ) {
	/**
	 * Function that return pagination data
	 *
	 * @param $plugin string - plugin name
	 * @param $module string - module name
	 * @param $shortcode string - shortcode name
	 * @param $post_type string - post type value
	 * @param $params array - shortcode params
	 *
	 * @return array
	 */
	function banquet_core_get_pagination_data( $plugin, $module, $shortcode, $post_type, $params ) {
		return qode_framework_is_installed( 'theme' ) ? banquet_get_pagination_data( $plugin, $module, $shortcode, $post_type, $params ) : array();
	}
}

if ( ! function_exists( 'banquet_core_get_page_content_sidebar_classes' ) ) {
	/**
	 * Function that returns classes for the content when sidebar is enabled
	 *
	 * @return string
	 */
	function banquet_core_get_page_content_sidebar_classes() {
		return qode_framework_is_installed( 'theme' ) ? banquet_get_page_content_sidebar_classes() : '';
	}
}

if ( ! function_exists( 'banquet_core_get_grid_gutter_classes' ) ) {
	/**
	 * Function that returns classes for the gutter when sidebar is enabled
	 *
	 * @return string
	 */
	function banquet_core_get_grid_gutter_classes() {
		return qode_framework_is_installed( 'theme' ) ? banquet_get_grid_gutter_classes() : '';
	}
}

if ( ! function_exists( 'banquet_core_get_custom_sidebars' ) ) {
	/**
	 * Function that return custom sidebars
	 *
	 * @return array
	 */
	function banquet_core_get_custom_sidebars() {
		$sidebars = array();
		
		if ( class_exists( 'QodeFrameworkCustomSidebar' ) ) {
			$qode_framework = qode_framework_get_framework_root();
			
			$sidebars = $qode_framework->get_custom_sidebars()->get_custom_sidebars();
		}
		
		return $sidebars;
	}
}

if ( ! function_exists( 'banquet_core_get_customizer_logo' ) ) {
	/**
	 * Function that returns customizer image
	 *
	 * @return string that contains html for logo image
	 */
	function banquet_core_get_customizer_logo() {
		$customizer_image = '';
		$customizer_logo  = get_custom_logo();
		
		if ( ! empty( $customizer_logo ) ) {
			$customizer_logo_id = get_theme_mod( 'custom_logo' );
			
			if ( $customizer_logo_id ) {
				$customizer_logo_id_attr = array(
					'class'    => 'qodef-header-logo-image qodef--main qodef--customizer',
					'itemprop' => 'logo',
				);
				
				$image_alt = get_post_meta( $customizer_logo_id, '_wp_attachment_image_alt', true );
				if ( empty( $image_alt ) ) {
					$customizer_logo_id_attr['alt'] = get_bloginfo( 'name', 'display' );
				}
				
				$customizer_image = wp_get_attachment_image( $customizer_logo_id, 'full', false, $customizer_logo_id_attr );
			}
		}
		
		return $customizer_image;
	}
}

if ( ! function_exists( 'banquet_core_get_open_close_icon_class' ) ) {
	/**
	 * Returns class for icon sources
	 *
	 * @param string $option_name
	 * @param string $class_prefix
	 *
	 * @return string
	 */
	function banquet_core_get_open_close_icon_class( $option_name, $class_prefix = '' ) {
		$class = '';
		
		if ( ! empty( $class_prefix ) ) {
			$icon_source = banquet_core_get_option_value( 'admin', $option_name );
			
			if ( $icon_source === 'icon_pack' ) {
				$class = $class_prefix . '--icon-pack';
			} else if ( $icon_source === 'svg_path' ) {
				$class = $class_prefix . '--svg-path';
			} else if ( $icon_source === 'predefined' ) {
				$class = $class_prefix . '--predefined';
			}
		}
		
		return $class;
	}
}

if ( ! function_exists( 'banquet_core_add_responsive_inline_style' ) ) {
	function banquet_core_add_responsive_inline_style( $style ) {
		$full_style = '';
		
		$responsive_range_sizes = array( '1024_1366', '768_1024', '680_768' );
		foreach ( $responsive_range_sizes as $responsive_range_size ) {
			$responsive_style = apply_filters( 'banquet_core_filter_add_responsive_' . $responsive_range_size . '_inline_style', $responsive_style = '' );
			$responsive_range = explode( '_', $responsive_range_size );
			
			if ( ! empty( $responsive_style ) ) {
				$responsive_string = '@media only screen and (min-width: ' . ( intval( $responsive_range[0] ) + 1 ) . 'px) and (max-width: ' . $responsive_range[1] . 'px){';
				$responsive_string .= $responsive_style;
				$responsive_string .= '}';
				$full_style        .= $responsive_string;
			}
		}
		
		$responsive_sizes = array( '1366', '1024', '768', '680' );
		foreach ( $responsive_sizes as $responsive_size ) {
			$responsive_style = apply_filters( 'banquet_core_filter_add_responsive_' . $responsive_size . '_inline_style', $responsive_style = '' );
			
			if ( ! empty( $responsive_style ) ) {
				$responsive_string = '@media only screen and (max-width: ' . $responsive_size . 'px){';
				$responsive_string .= $responsive_style;
				$responsive_string .= '}';
				$full_style        .= $responsive_string;
			}
		}
		
		if ( ! empty( $full_style ) ) {
			$style = $style . $full_style;
		}
		
		return $style;
	}
	
	add_filter( 'banquet_filter_add_inline_style', 'banquet_core_add_responsive_inline_style' );
}

if ( ! function_exists( 'banquet_core_print_custom_css_in_footer' ) ) {
	function banquet_core_print_custom_css_in_footer() {
		$full_style = '';
		
		$responsive_range_sizes = array( '1366_1440', '1280_1366', '1024_1280', '768_1024', '680_768' );
		foreach ( $responsive_range_sizes as $responsive_range_size ) {
			$responsive_style = apply_filters( 'banquet_core_filter_add_responsive_' . $responsive_range_size . '_inline_style_in_footer', $responsive_style = '' );
			$responsive_range = explode( '_', $responsive_range_size );
			
			if ( ! empty( $responsive_style ) ) {
				$responsive_string = '@media only screen and (min-width: ' . ( intval( $responsive_range[0] ) + 1 ) . 'px) and (max-width: ' . $responsive_range[1] . 'px){';
				$responsive_string .= $responsive_style;
				$responsive_string .= '}';
				$full_style        .= $responsive_string;
			}
		}
		
		$responsive_sizes = array( '1440', '1366', '1280', '1024', '768', '680' );
		foreach ( $responsive_sizes as $responsive_size ) {
			$responsive_style = apply_filters( 'banquet_core_filter_add_responsive_' . $responsive_size . '_inline_style_in_footer', $responsive_style = '' );
			
			if ( ! empty( $responsive_style ) ) {
				$responsive_string = '@media only screen and (max-width: ' . $responsive_size . 'px){';
				$responsive_string .= $responsive_style;
				$responsive_string .= '}';
				$full_style        .= $responsive_string;
			}
		}
		
		if ( $full_style != '' ) {
			echo '<div id="banquet-core-page-inline-style" data-style="' . esc_attr( $full_style ) . '"></div>';
		}
	}
	
	add_action( 'wp_footer', 'banquet_core_print_custom_css_in_footer', 999 ); // 999 permission is set in order to add inline style been at the last place
}

if ( ! function_exists( 'banquet_core_get_admin_options_map_position' ) ) {
	/**
	 * Function that set dashboard admin options map position
	 *
	 * @param $map string
	 *
	 * @return int
	 */
	function banquet_core_get_admin_options_map_position( $map ) {
		$position = 10;
		
		switch ( $map ) {
			case 'general':
				$position = 1;
				break;
			case 'logo':
				$position = 2;
				break;
			case 'fonts':
				$position = 4;
				break;
			case 'typography':
				$position = 6;
				break;
			case 'header':
				$position = 8;
				break;
			case 'mobile-header':
				$position = 10;
				break;
			case 'fullscreen-menu':
				$position = 12;
				break;
			case 'title':
				$position = 14;
				break;
			case 'sidebar':
				$position = 16;
				break;
			case 'footer':
				$position = 18;
				break;
			case 'search':
				$position = 20;
				break;
			case 'side-area':
				$position = 22;
				break;
			case 'blog':
				$position = 24;
				break;
			case 'social-share':
				$position = 26;
				break;
			case 'maps':
				$position = 28;
				break;
			case 'subscribe-popup':
				$position = 99;
				break;
			case '404':
				$position = 100;
				break;
		}
		
		return apply_filters( 'banquet_core_filter_admin_options_map_position', $position, $map );
	}
}

if ( ! function_exists( 'banquet_core_get_variations_options_map' ) ) {
	/**
	 * Function that return options map for module variations
	 *
	 * @param $variations array
	 * @param $default_empty boolean
	 *
	 * @return array
	 */
	function banquet_core_get_variations_options_map( $variations, $default_empty = false ) {
		$map = array();
		
		if ( ! empty( $variations ) ) {
			$map['visibility'] = sizeof( $variations ) > 1;
			
			reset( $variations );
			$map['default_value'] = key( $variations );
			
			if ( $default_empty ) {
				$map['default_value'] = '';
			}
			
		} else {
			$map['visibility']    = false;
			$map['default_value'] = '';
		}
		
		return $map;
	}
}

if ( ! function_exists( 'banquet_core_get_select_type_options_pool' ) ) {
	/**
	 * Function that returns array with pool of options for select fields in framework
	 *
	 *
	 * @param $type string - type of select field
	 * @param $enable_default boolean - add first element empty for default value
	 * @param $exclude - array of items to exclude
	 * @param $include - array of items to include
	 *
	 * @return array escaped output
	 */
	function banquet_core_get_select_type_options_pool( $type, $enable_default = true, $exclude = array(), $include = array() ) {
		$options = array();
		if ( $enable_default ) {
			$options[''] = esc_html__( 'Default', 'banquet-core' );
		}
		switch ( $type ) {
			case 'content_width':
				$options['1300'] = esc_html__( '1300px', 'banquet-core' );
				$options['1200'] = esc_html__( '1200px', 'banquet-core' );
				$options['1100'] = esc_html__( '1100px', 'banquet-core' );
				$options['1000'] = esc_html__( '1000px', 'banquet-core' );
				$options['800']  = esc_html__( '800px', 'banquet-core' );
				break;
			case 'title_tag':
				$options['h1'] = 'H1';
				$options['h2'] = 'H2';
				$options['h3'] = 'H3';
				$options['h4'] = 'H4';
				$options['h5'] = 'H5';
				$options['h6'] = 'H6';
				$options['p']  = 'P';
				break;

			case 'link_target':
				$options['_self']  = esc_html__( 'Same Window', 'banquet-core' );
				$options['_blank'] = esc_html__( 'New Window', 'banquet-core' );
				break;
			case 'border_style':
				$options['solid']  = esc_html__( 'Solid', 'banquet-core' );
				$options['dashed'] = esc_html__( 'Dashed', 'banquet-core' );
				$options['dotted'] = esc_html__( 'Dotted', 'banquet-core' );
				break;
			case 'font_weight':
				$options['100'] = esc_html__( 'Thin (100)', 'banquet-core' );
				$options['200'] = esc_html__( 'Extra Light (200)', 'banquet-core' );
				$options['300'] = esc_html__( 'Light (300)', 'banquet-core' );
				$options['400'] = esc_html__( 'Normal (400)', 'banquet-core' );
				$options['500'] = esc_html__( 'Medium (500)', 'banquet-core' );
				$options['600'] = esc_html__( 'Semi Bold (600)', 'banquet-core' );
				$options['700'] = esc_html__( 'Bold (700)', 'banquet-core' );
				$options['800'] = esc_html__( 'Extra Bold (800)', 'banquet-core' );
				$options['900'] = esc_html__( 'Black (900)', 'banquet-core' );
				break;
			case 'font_style':
				$options['normal']  = esc_html__( 'Normal', 'banquet-core' );
				$options['italic']  = esc_html__( 'Italic', 'banquet-core' );
				$options['oblique'] = esc_html__( 'Oblique', 'banquet-core' );
				$options['initial'] = esc_html__( 'Initial', 'banquet-core' );
				$options['inherit'] = esc_html__( 'Inherit', 'banquet-core' );
				break;
			case 'text_transform':
				$options['none']       = esc_html__( 'None', 'banquet-core' );
				$options['capitalize'] = esc_html__( 'Capitalize', 'banquet-core' );
				$options['uppercase']  = esc_html__( 'Uppercase', 'banquet-core' );
				$options['lowercase']  = esc_html__( 'Lowercase', 'banquet-core' );
				$options['initial']    = esc_html__( 'Initial', 'banquet-core' );
				$options['inherit']    = esc_html__( 'Inherit', 'banquet-core' );
				break;
				break;
			case 'text_decoration':
				$options['none']         = esc_html__( 'None', 'banquet-core' );
				$options['underline']    = esc_html__( 'Underline', 'banquet-core' );
				$options['overline']     = esc_html__( 'Overline', 'banquet-core' );
				$options['line-through'] = esc_html__( 'Line-Through', 'banquet-core' );
				$options['initial']      = esc_html__( 'Initial', 'banquet-core' );
				$options['inherit']      = esc_html__( 'Inherit', 'banquet-core' );
				break;
			case 'list_behavior':
				$options['columns']           = esc_html__( 'Gallery', 'banquet-core' );
				$options['masonry']           = esc_html__( 'Masonry', 'banquet-core' );
				$options['slider']            = esc_html__( 'Slider', 'banquet-core' );
				$options['justified-gallery'] = esc_html__( 'Justified Gallery', 'banquet-core' );
				break;
			case 'columns_number':
				$options['1'] = esc_html__( 'One', 'banquet-core' );
				$options['2'] = esc_html__( 'Two', 'banquet-core' );
				$options['3'] = esc_html__( 'Three', 'banquet-core' );
				$options['4'] = esc_html__( 'Four', 'banquet-core' );
				$options['5'] = esc_html__( 'Five', 'banquet-core' );
				$options['6'] = esc_html__( 'Six', 'banquet-core' );
				break;
			case 'items_space':
				$options['huge']   = esc_html__( 'Huge (40)', 'banquet-core' );
				$options['large']  = esc_html__( 'Large (25)', 'banquet-core' );
				$options['medium'] = esc_html__( 'Medium (20)', 'banquet-core' );
				$options['normal'] = esc_html__( 'Normal (15)', 'banquet-core' );
				$options['small']  = esc_html__( 'Small (10)', 'banquet-core' );
				$options['tiny']   = esc_html__( 'Tiny (5)', 'banquet-core' );
				$options['no']     = esc_html__( 'No (0)', 'banquet-core' );
				break;
			case 'order_by':
				$options['date']       = esc_html__( 'Date', 'banquet-core' );
				$options['ID']         = esc_html__( 'ID', 'banquet-core' );
				$options['menu_order'] = esc_html__( 'Menu Order', 'banquet-core' );
				$options['name']       = esc_html__( 'Post Name', 'banquet-core' );
				$options['rand']       = esc_html__( 'Random', 'banquet-core' );
				$options['title']      = esc_html__( 'Title', 'banquet-core' );
				break;
			case 'order':
				$options['DESC'] = esc_html__( 'Descending', 'banquet-core' );
				$options['ASC']  = esc_html__( 'Ascending', 'banquet-core' );
				break;
			case 'pagination_type':
				$options['no-pagination']   = esc_html__( 'No Pagination', 'banquet-core' );
				$options['standard']        = esc_html__( 'Standard', 'banquet-core' );
				$options['load-more']       = esc_html__( 'Load More', 'banquet-core' );
				$options['infinite-scroll'] = esc_html__( 'Infinite Scroll', 'banquet-core' );
				break;
			case 'columns_responsive':
				$options['predefined'] = esc_html__( 'Predefined', 'banquet-core' );
				$options['custom']     = esc_html__( 'Custom', 'banquet-core' );
				break;
			case 'yes_no':
				$options['yes'] = esc_html__( 'Yes', 'banquet-core' );
				$options['no']  = esc_html__( 'No', 'banquet-core' );
				break;
			case 'no_yes':
				$options['no']  = esc_html__( 'No', 'banquet-core' );
				$options['yes'] = esc_html__( 'Yes', 'banquet-core' );
				break;
			case 'sidebar_layouts':
				$options['no-sidebar']       = esc_html__( 'No Sidebar', 'banquet-core' );
				$options['sidebar-33-right'] = esc_html__( 'Sidebar 1/3 Right', 'banquet-core' );
				$options['sidebar-25-right'] = esc_html__( 'Sidebar 1/4 Right', 'banquet-core' );
				$options['sidebar-33-left']  = esc_html__( 'Sidebar 1/3 Left', 'banquet-core' );
				$options['sidebar-25-left']  = esc_html__( 'Sidebar 1/4 Left', 'banquet-core' );
				break;
			case 'icon_source':
				$options['icon_pack']  = esc_html__( 'Icon Pack', 'banquet-core' );
				$options['svg_path']   = esc_html__( 'SVG Path', 'banquet-core' );
				$options['predefined'] = esc_html__( 'Predefined', 'banquet-core' );
				break;
			case 'list_image_dimension':
				$options['full']      = esc_html__( 'Original', 'banquet-core' );
				$options['thumbnail'] = esc_html__( 'Thumbnail', 'banquet-core' );
				$options['medium']    = esc_html__( 'Medium', 'banquet-core' );
				$options['large']     = esc_html__( 'Large', 'banquet-core' );
				$options['custom']    = esc_html__( 'Custom', 'banquet-core' );
				$options              = apply_filters( 'qode_framework_filter_pool_list_image_dimension', $options );
				break;
		}
		
		if ( ! empty( $exclude ) ) {
			foreach ( $exclude as $e ) {
				if ( array_key_exists( $e, $options ) ) {
					unset( $options[ $e ] );
				}
			}
		}
		
		if ( ! empty( $include ) ) {
			foreach ( $include as $key => $value ) {
				if ( ! array_key_exists( $key, $options ) ) {
					$options[ $key ] = $value;
				}
			}
		}
		
		return apply_filters( 'banquet_core_filter_select_type_option', $options, $type, $enable_default, $exclude );
	}
}

if ( ! function_exists( 'banquet_core_get_space_value' ) ) {
	/**
	 * Function that returns spacing value based on selected option
	 *
	 * @param $text_value string - textual value of spacing
	 *
	 * @return int
	 */
	function banquet_core_get_space_value( $text_value ) {
		switch ( $text_value ) {
			case 'huge':
				return 40;
				break;
			case 'large':
				return 25;
				break;
			case 'medium':
				return 20;
				break;
			case 'normal':
				return 15;
				break;
			case 'small':
				return 10;
				break;
			case 'tiny':
				return 5;
				break;
			default:
				return 0;
				break;
		}
	}
}

if ( ! function_exists( 'banquet_core_get_typography_styles' ) ) {
	/**
	 * Generates typography styles
	 *
	 * @param $scope string
	 * @param $field_name string
	 *
	 * @return array
	 */
	function banquet_core_get_typography_styles( $scope, $field_name ) {
		$color           = qode_framework_get_option_value( $scope, 'admin', $field_name . '_color' );
		$font_family     = qode_framework_get_option_value( $scope, 'admin', $field_name . '_font_family' );
		$font_size       = qode_framework_get_option_value( $scope, 'admin', $field_name . '_font_size' );
		$line_height     = qode_framework_get_option_value( $scope, 'admin', $field_name . '_line_height' );
		$letter_spacing  = qode_framework_get_option_value( $scope, 'admin', $field_name . '_letter_spacing' );
		$font_weight     = qode_framework_get_option_value( $scope, 'admin', $field_name . '_font_weight' );
		$text_transform  = qode_framework_get_option_value( $scope, 'admin', $field_name . '_text_transform' );
		$font_style      = qode_framework_get_option_value( $scope, 'admin', $field_name . '_font_style' );
		$text_decoration = qode_framework_get_option_value( $scope, 'admin', $field_name . '_text_decoration' );
		$margin_top      = qode_framework_get_option_value( $scope, 'admin', $field_name . '_margin_top' );
		$margin_bottom   = qode_framework_get_option_value( $scope, 'admin', $field_name . '_margin_bottom' );
		
		$styles = array();
		
		if ( ! empty( $color ) ) {
			$styles['color'] = $color;
		}
		
		if ( isset( $font_family ) && $font_family !== false && $font_family !== '-1' && $font_family !== '' ) {
			$styles['font-family'] = qode_framework_get_formatted_font_family( $font_family );
		}
		
		if ( ! empty( $font_size ) ) {
			if ( qode_framework_string_ends_with_typography_units( $font_size ) ) {
				$styles['font-size'] = $font_size;
			} else {
				$styles['font-size'] = intval( $font_size ) . 'px';
			}
		}
		
		if ( ! empty( $line_height ) ) {
			if ( qode_framework_string_ends_with_typography_units( $line_height ) ) {
				$styles['line-height'] = $line_height;
			} else {
				$styles['line-height'] = intval( $line_height ) . 'px';
			}
		}
		
		if ( ! empty( $font_style ) ) {
			$styles['font-style'] = $font_style;
		}
		
		if ( ! empty( $font_weight ) ) {
			$styles['font-weight'] = $font_weight;
		}
		
		if ( ! empty( $text_decoration ) ) {
			$styles['text-decoration'] = $text_decoration;
		}
		
		if ( $letter_spacing !== '' ) {
			if ( qode_framework_string_ends_with_typography_units( $letter_spacing ) ) {
				$styles['letter-spacing'] = $letter_spacing;
			} else {
				$styles['letter-spacing'] = intval( $letter_spacing ) . 'px';
			}
		}
		
		if ( ! empty( $text_transform ) ) {
			$styles['text-transform'] = $text_transform;
		}
		
		if ( ! empty( $margin_top ) ) {
			if ( qode_framework_string_ends_with_space_units( $margin_top, true ) ) {
				$styles['margin-top'] = $margin_top;
			} else {
				$styles['margin-top'] = intval( $margin_top ) . 'px';
			}
		}
		
		if ( ! empty( $margin_bottom ) ) {
			if ( qode_framework_string_ends_with_space_units( $margin_bottom, true ) ) {
				$styles['margin-bottom'] = $margin_bottom;
			} else {
				$styles['margin-bottom'] = intval( $margin_bottom ) . 'px';
			}
		}
		
		return $styles;
	}
}

if ( ! function_exists( 'banquet_core_get_typography_hover_styles' ) ) {
	/**
	 * Generates hover typography styles
	 *
	 * @param $scope string
	 * @param $field_name string
	 *
	 * @return array
	 */
	function banquet_core_get_typography_hover_styles( $scope, $field_name ) {
		$hover_color           = qode_framework_get_option_value( $scope, 'admin', $field_name . '_hover_color' );
		$hover_text_decoration = qode_framework_get_option_value( $scope, 'admin', $field_name . '_hover_text_decoration' );
		
		$styles = array();
		
		if ( ! empty( $hover_color ) ) {
			$styles['color'] = $hover_color;
		}
		
		if ( ! empty( $hover_text_decoration ) ) {
			$styles['text-decoration'] = $hover_text_decoration;
		}
		
		return $styles;
	}
}