<?php

if ( ! function_exists( 'banquet_core_is_boxed_enabled' ) ) {
	function banquet_core_is_boxed_enabled() {
		return banquet_core_get_post_value_through_levels( 'qodef_boxed' ) === 'yes';
	}
}

if ( ! function_exists( 'banquet_core_is_passepartout_enabled' ) ) {
	function banquet_core_is_passepartout_enabled() {
		return banquet_core_get_post_value_through_levels( 'qodef_passepartout' ) === 'yes';
	}
}

if ( ! function_exists( 'banquet_core_are_borders_enabled' ) ) {
	function banquet_core_are_borders_enabled() {
		return banquet_core_get_post_value_through_levels( 'qodef_page_borders' ) === 'yes';
	}
}

if ( ! function_exists( 'banquet_core_add_general_options_body_classes' ) ) {
	function banquet_core_add_general_options_body_classes( $classes ) {
		$content_width         = banquet_core_get_post_value_through_levels( 'qodef_content_width' );
		$content_behind_header = banquet_core_get_post_value_through_levels( 'qodef_content_behind_header' );

		$classes[] = banquet_core_is_boxed_enabled() ? 'qodef--boxed' : '';
		$classes[] = 'qodef-content-grid-' . $content_width;
		$classes[] = $content_behind_header == 'yes' ? 'qodef-content-behind-header' : '';
		$classes[] = banquet_core_are_borders_enabled() ? 'qodef--page-has-borders' : '';
		$classes[] = banquet_core_is_passepartout_enabled() ? 'qodef--passepartout' : '';
		
		return $classes;
	}
	
	add_filter( 'body_class', 'banquet_core_add_general_options_body_classes' );
}

if ( ! function_exists( 'banquet_core_add_boxed_wrapper_classes' ) ) {
	function banquet_core_add_boxed_wrapper_classes( $classes ) {
		
		if ( banquet_core_is_boxed_enabled() ) {
			$classes .= ' qodef-content-grid';
		}
		
		return $classes;
	}
	
	add_filter( 'banquet_filter_page_wrapper_classes', 'banquet_core_add_boxed_wrapper_classes' );
}

if ( ! function_exists( 'banquet_core_set_general_styles' ) ) {
	/**
	 * Function that generates general inline styles
	 *
	 * @param $style string
	 *
	 * @return string
	 */
	function banquet_core_set_general_styles( $style ) {
		$styles = array();
		
		$background_color      = banquet_core_get_post_value_through_levels( 'qodef_page_background_color' );
		$background_image      = banquet_core_get_post_value_through_levels( 'qodef_page_background_image' );
		$background_repeat     = banquet_core_get_post_value_through_levels( 'qodef_page_background_repeat' );
		$background_size       = banquet_core_get_post_value_through_levels( 'qodef_page_background_size' );
		$background_attachment = banquet_core_get_post_value_through_levels( 'qodef_page_background_attachment' );
		
		if ( ! empty( $background_color ) ) {
			$styles['background-color'] = $background_color;
		}
		
		if ( ! empty( $background_image ) ) {
			$styles['background-image'] = 'url(' . esc_url( wp_get_attachment_image_url( $background_image, 'full' ) ) . ')';
		}
		
		if ( ! empty( $background_repeat ) ) {
			$styles['background-repeat'] = $background_repeat;
		}
		
		if ( ! empty( $background_size ) ) {
			$styles['background-size'] = $background_size;
		}
		
		if ( ! empty( $background_attachment ) ) {
			$styles['background-attachment'] = $background_attachment;
		}
		
		if ( ! empty( $styles ) ) {
			$selector = banquet_core_is_passepartout_enabled() ? '.qodef--passepartout #qodef-page-wrapper' : 'body';
			$style    .= qode_framework_dynamic_style( $selector, $styles );
		}
		
		if ( banquet_core_is_boxed_enabled() ) {
			$boxed_styles = array();
			
			$boxed_background_color = banquet_core_get_post_value_through_levels( 'qodef_boxed_background_color' );
			
			if ( ! empty( $boxed_background_color ) ) {
				$boxed_styles['background-color'] = $boxed_background_color;
			}
			
			if ( ! empty( $boxed_styles ) ) {
				$style .= qode_framework_dynamic_style( '.qodef--boxed #qodef-page-wrapper', $boxed_styles );
			}
		}
		
		if ( banquet_core_is_passepartout_enabled() ) {
			$passepartout_styles = array();
			$passepartout_color  = banquet_core_get_post_value_through_levels( 'qodef_passepartout_color' );
			$passepartout_image  = banquet_core_get_post_value_through_levels( 'qodef_passepartout_image' );
			$passepartout_size   = banquet_core_get_post_value_through_levels( 'qodef_passepartout_size' );
			
			if ( ! empty( $passepartout_color ) ) {
				$passepartout_styles['background-color'] = $passepartout_color;
			}
			
			if ( ! empty( $passepartout_image ) ) {
				$passepartout_styles['background-image'] = 'url(' . esc_url( wp_get_attachment_image_url( $passepartout_image, 'full' ) ) . ')';
			}
			
			if ( ! empty( $passepartout_size ) ) {
				
				if ( qode_framework_string_ends_with_space_units( $passepartout_size ) ) {
					$passepartout_styles['padding'] = $passepartout_size;
				} else {
					$passepartout_styles['padding'] = intval( $passepartout_size ) . 'px';
				}
			}
			
			if ( ! empty( $passepartout_styles ) ) {
				$style .= qode_framework_dynamic_style( '.qodef--passepartout', $passepartout_styles );
			}
			
			$passepartout_responsive_styles = array();
			$passepartout_size_responsive   = banquet_core_get_post_value_through_levels( 'qodef_passepartout_size_responsive' );
			
			if ( ! empty( $passepartout_size_responsive ) ) {
				if ( qode_framework_string_ends_with_space_units( $passepartout_size_responsive ) ) {
					$passepartout_responsive_styles['padding'] = $passepartout_size_responsive;
				} else {
					$passepartout_responsive_styles['padding'] = intval( $passepartout_size_responsive ) . 'px';
				}
			}
			
			if ( ! empty( $passepartout_responsive_styles ) ) {
				$style .= qode_framework_dynamic_style_responsive( '.qodef--passepartout', $passepartout_responsive_styles, '', '1024' );
			}
		}
		if ( banquet_core_are_borders_enabled() ) {
			$offset_styles = array();
			$border_left_styles = array();
			$border_right_styles = array();
			$border_color = banquet_core_get_post_value_through_levels('qodef_page_borders_color');
			$border_offset = banquet_core_get_post_value_through_levels('qodef_page_borders_offset');

			$selectors = array(
                '.qodef--page-has-borders #qodef-page-header-inner .qodef-header-logo-wrapper',
                '.qodef--page-has-borders #qodef-page-header-inner .qodef-last-widget-wrapper',
                '.qodef--page-has-borders #qodef-page-header-inner .qodef-fullscreen-menu-opener-outer',
                '.qodef-content-side'
            );

			if ( !empty( $border_color ) ) {
				$border_left_styles['background-color'] = $border_color;
				$border_right_styles['background-color'] = $border_color;
			}

			if ( ! empty( $border_offset ) ) {

				if ( qode_framework_string_ends_with_space_units( $border_offset ) ) {
					$border_left_styles['left'] = $border_offset;
					$border_right_styles['right'] = $border_offset;
					$offset_styles['width'] = $border_offset;
				} else {
					$border_left_styles['left'] = intval( $border_offset ) . 'px';
					$border_right_styles['right'] = intval( $border_offset ) . 'px';
					$offset_styles['width'] = intval( $border_offset ) . 'px';
				}
			}

			if ( ! empty( $border_left_styles ) ) {
				$style .= qode_framework_dynamic_style('.qodef-page-border--left', $border_left_styles);
			}

			if ( ! empty( $border_right_styles ) ) {
				$style .= qode_framework_dynamic_style('.qodef-page-border--right', $border_right_styles);
			}

			if ( ! empty( $offset_styles ) ) {
				$style .= qode_framework_dynamic_style($selectors, $offset_styles);
			}
		}

		$page_content_style = array();
		
		$page_content_padding = banquet_core_get_post_value_through_levels( 'qodef_page_content_padding' );
		if ( ! empty ( $page_content_padding ) ) {
			$page_content_style['padding'] = $page_content_padding;
		}
		
		if ( ! empty( $page_content_style ) ) {
			$style .= qode_framework_dynamic_style( '#qodef-page-inner', $page_content_style );
		}
		
		$page_content_style_mobile = array();
		
		$page_content_padding_mobile = banquet_core_get_post_value_through_levels( 'qodef_page_content_padding_mobile' );
		if ( ! empty ( $page_content_padding_mobile ) ) {
			$page_content_style_mobile['padding'] = $page_content_padding_mobile;
		}
		
		if ( ! empty( $page_content_style_mobile ) ) {
			$style .= qode_framework_dynamic_style_responsive( '#qodef-page-inner', $page_content_style_mobile, '', '1024' );
		}
		
		return $style;
	}
	
	add_filter( 'banquet_filter_add_inline_style', 'banquet_core_set_general_styles' );
}

if ( ! function_exists( 'banquet_core_set_general_main_color_styles' ) ) {
	/**
	 * Function that generates general main color inline styles
	 *
	 * @param $style string
	 *
	 * @return string
	 */
	function banquet_core_set_general_main_color_styles( $style ) {
		$main_color = banquet_core_get_post_value_through_levels( 'qodef_main_color' );
		
		if ( ! empty( $main_color ) ) {
			
			// Include main color selectors
			include_once 'main-color/main-color.php';
			
			$allowed_selectors = array(
				'color',
				'color_important',
				'background_color',
				'background_color_important',
				'border_color',
				'border_color_important',
				'fill_color',
				'fill_color_important',
				'stroke_color',
				'stroke_color_important',
			);
			
			foreach ( $allowed_selectors as $allowed_selector ) {
				$selector = $allowed_selector . '_selector';
				
				if ( isset( $$selector ) && ! empty( $$selector ) ) {
					
					if ( strpos( $selector, '_important' ) !== false ) {
						$attribute = str_replace( '_important', '', $allowed_selector );
						$color     = $main_color . '!important';
					} else {
						$attribute = $allowed_selector;
						$color     = $main_color;
					}
					
					$style .= qode_framework_dynamic_style( $$selector, array( str_replace( '_', '-', $attribute ) => $color ) );
				}
			}
		}
		
		return $style;
	}
	
	add_filter( 'banquet_filter_add_inline_style', 'banquet_core_set_general_main_color_styles' );
}

if ( ! function_exists('banquet_core_add_page_borders') ) {
	function banquet_core_add_page_borders(){
		if ( banquet_core_are_borders_enabled() ) { ?>
			<div class="qodef-page-border--left"></div>
			<div class="qodef-page-border--right"></div>
		<?php }
	}
	add_action('banquet_action_before_page_content_holder','banquet_core_add_page_borders');
	add_action('banquet_action_before_404_page_content','banquet_core_add_page_borders');
	add_action('woocommerce_before_main_content','banquet_core_add_page_borders');
}


if ( ! function_exists( 'banquet_core_register_page_content_side_widget_areas' ) ) {
	/**
	 * Register content side area sidebar
	 */
	function banquet_core_register_page_content_side_widget_areas() {
        register_sidebar(
            array(
                'id' => 'qodef-content-side-area-left',
                'name' => esc_html__('Content - Left Side Area', 'banquet-core'),
                'description' => esc_html__('Widgets added here will appear on the left side of content', 'banquet-core'),
                'before_widget' => '<div id="%1$s" class="widget %2$s" data-area="content-side-area">',
                'after_widget' => '</div>'
            )
        );

        register_sidebar(
            array(
                'id' => 'qodef-content-side-area-right',
                'name' => esc_html__('Content - Right Side Area', 'banquet-core'),
                'description' => esc_html__('Widgets added here will appear on the right side of content', 'banquet-core'),
                'before_widget' => '<div id="%1$s" class="widget %2$s" data-area="content-side-area">',
                'after_widget' => '</div>'
            )
        );
	}

	add_action( 'widgets_init', 'banquet_core_register_page_content_side_widget_areas' );

}


if ( ! function_exists( 'banquet_core_get_content_widget_area' ) ) {
	function banquet_core_get_content_widget_area( $widget_area = 'left' ) {
		$page_id = qode_framework_get_page_id();

		$widget_area_map = array(
			'page_id'             => $page_id,
			'is_enabled'          => get_post_meta( $page_id, 'qodef_show_content_side_widget_areas', true ) !== 'no',
			'default_widget_area' => 'qodef-content-side-area-' . esc_attr( $widget_area ),
			'custom_widget_area'  => get_post_meta( $page_id, 'qodef_content_custom_widget_area_' . esc_attr( $widget_area ), true )
		);

		extract( $widget_area_map );

		if ( $is_enabled ) {
			if ( is_active_sidebar( $default_widget_area ) && empty( $custom_widget_area ) ) { ?>
                <div class="qodef-content--<?php echo esc_attr($widget_area);?>-side qodef-content-side">
                    <div class="qodef-content-side-holder-outer">
                        <?php dynamic_sidebar( $default_widget_area ); ?>
                    </div>
                </div>
            <?php
			} else if ( ! empty( $custom_widget_area ) && is_active_sidebar( $custom_widget_area ) ) { ?>
                <div class="qodef-content--<?php echo esc_attr($widget_area);?>-side qodef-content-side">
                    <div class="qodef-content-side-holder-outer">
                        <?php dynamic_sidebar( $custom_widget_area ); ?>
                    </div>
                </div>
				<?php
			}
		}
	}
}


if ( ! function_exists( 'banquet_core_content_widget_area_action' ) ) {
	function banquet_core_content_widget_area_action()	{
		banquet_core_get_content_widget_area('left');
		banquet_core_get_content_widget_area('right');
	}
	add_action( 'banquet_action_before_page_content_holder', 'banquet_core_content_widget_area_action' );
	add_action('banquet_action_before_404_page_content','banquet_core_content_widget_area_action');
}
