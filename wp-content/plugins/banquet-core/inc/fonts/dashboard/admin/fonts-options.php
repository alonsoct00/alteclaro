<?php

if ( ! function_exists( 'banquet_core_add_fonts_options' ) ) {
	/**
	 * Function that add options for this module
	 */
	function banquet_core_add_fonts_options() {
		$qode_framework = qode_framework_get_framework_root();
		
		$page = $qode_framework->add_options_page(
			array(
				'scope'       => BANQUET_CORE_OPTIONS_NAME,
				'type'        => 'admin',
				'slug'        => 'fonts',
				'title'       => esc_html__( 'Fonts', 'banquet-core' ),
				'description' => esc_html__( 'General Fonts Options', 'banquet-core' ),
				'icon'        => 'fa fa-cog'
			)
		);
		
		if ( $page ) {
			$page->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_enable_google_fonts',
					'title'         => esc_html__( 'Enable Google Fonts', 'banquet-core' ),
					'default_value' => 'yes',
					'args'          => array(
						'custom_class' => 'qodef-enable-google-fonts'
					)
				)
			);
			
			$google_fonts_section = $page->add_section_element(
				array(
					'name'       => 'qodef_google_fonts_section',
					'title'      => esc_html__( 'Google Fonts Options', 'banquet-core' ),
					'dependency' => array(
						'show' => array(
							'qodef_enable_google_fonts' => array(
								'values'        => 'yes',
								'default_value' => ''
							)
						)
					)
				)
			);
			
			$page_repeater = $google_fonts_section->add_repeater_element(
				array(
					'name'        => 'qodef_choose_google_fonts',
					'title'       => esc_html__( 'Google Fonts To Include', 'banquet-core' ),
					'description' => esc_html__( 'Choose google fonts which you want to use on your website', 'banquet-core' ),
					'button_text' => esc_html__( 'Add New Google Font', 'banquet-core' )
				)
			);
			
			$page_repeater->add_field_element( array(
				'field_type'  => 'googlefont',
				'name'        => 'qodef_choose_google_font',
				'title'       => esc_html__( 'Google Font', 'banquet-core' ),
				'description' => esc_html__( 'Choose google font', 'banquet-core' ),
				'args'        => array(
					'include' => 'google-fonts'
				)
			) );
			
			$google_fonts_section->add_field_element(
				array(
					'field_type'  => 'checkbox',
					'name'        => 'qodef_google_fonts_weight',
					'title'       => esc_html__( 'Google Fonts Style & Weight', 'banquet-core' ),
					'description' => esc_html__( 'Choose a default Google font weights for your site. Impact on page load time', 'banquet-core' ),
					'options'     => array(
						'100'  => esc_html__( '100 Thin', 'banquet-core' ),
						'100i' => esc_html__( '100 Thin Italic', 'banquet-core' ),
						'200'  => esc_html__( '200 Extra-Light', 'banquet-core' ),
						'200i' => esc_html__( '200 Extra-Light Italic', 'banquet-core' ),
						'300'  => esc_html__( '300 Light', 'banquet-core' ),
						'300i' => esc_html__( '300 Light Italic', 'banquet-core' ),
						'400'  => esc_html__( '400 Regular', 'banquet-core' ),
						'400i' => esc_html__( '400 Regular Italic', 'banquet-core' ),
						'500'  => esc_html__( '500 Medium', 'banquet-core' ),
						'500i' => esc_html__( '500 Medium Italic', 'banquet-core' ),
						'600'  => esc_html__( '600 Semi-Bold', 'banquet-core' ),
						'600i' => esc_html__( '600 Semi-Bold Italic', 'banquet-core' ),
						'700'  => esc_html__( '700 Bold', 'banquet-core' ),
						'700i' => esc_html__( '700 Bold Italic', 'banquet-core' ),
						'800'  => esc_html__( '800 Extra-Bold', 'banquet-core' ),
						'800i' => esc_html__( '800 Extra-Bold Italic', 'banquet-core' ),
						'900'  => esc_html__( '900 Ultra-Bold', 'banquet-core' ),
						'900i' => esc_html__( '900 Ultra-Bold Italic', 'banquet-core' )
					)
				)
			);
			
			$google_fonts_section->add_field_element(
				array(
					'field_type'  => 'checkbox',
					'name'        => 'qodef_google_fonts_subset',
					'title'       => esc_html__( 'Google Fonts Style & Weight', 'banquet-core' ),
					'description' => esc_html__( 'Choose a default Google font weights for your site. Impact on page load time', 'banquet-core' ),
					'options'     => array(
						'latin'        => esc_html__( 'Latin', 'banquet-core' ),
						'latin-ext'    => esc_html__( 'Latin Extended', 'banquet-core' ),
						'cyrillic'     => esc_html__( 'Cyrillic', 'banquet-core' ),
						'cyrillic-ext' => esc_html__( 'Cyrillic Extended', 'banquet-core' ),
						'greek'        => esc_html__( 'Greek', 'banquet-core' ),
						'greek-ext'    => esc_html__( 'Greek Extended', 'banquet-core' ),
						'vietnamese'   => esc_html__( 'Vietnamese', 'banquet-core' )
					)
				)
			);
			
			$page_repeater = $page->add_repeater_element(
				array(
					'name'        => 'qodef_custom_fonts',
					'title'       => esc_html__( 'Custom Fonts', 'banquet-core' ),
					'description' => esc_html__( 'Add Custom Fonts', 'banquet-core' ),
					'button_text' => esc_html__( 'Add New Custom Font', 'banquet-core' )
				)
			);
			
			$page_repeater->add_field_element( array(
				'field_type' => 'file',
				'name'       => 'qodef_custom_font_ttf',
				'title'      => esc_html__( 'Custom Font TTF', 'banquet-core' ),
				'args'       => array(
					'allowed_type' => 'font/ttf'
				)
			) );
			
			$page_repeater->add_field_element( array(
				'field_type' => 'file',
				'name'       => 'qodef_custom_font_otf',
				'title'      => esc_html__( 'Custom Font OTF', 'banquet-core' ),
				'args'       => array(
					'allowed_type' => 'font/otf'
				)
			) );
			
			$page_repeater->add_field_element( array(
				'field_type' => 'file',
				'name'       => 'qodef_custom_font_woff',
				'title'      => esc_html__( 'Custom Font WOFF', 'banquet-core' ),
				'args'       => array(
					'allowed_type' => 'font/woff'
				)
			) );
			
			$page_repeater->add_field_element( array(
				'field_type' => 'file',
				'name'       => 'qodef_custom_font_woff2',
				'title'      => esc_html__( 'Custom Font WOFF2', 'banquet-core' ),
				'args'       => array(
					'allowed_type' => 'font/woff2'
				)
			) );
			
			$page_repeater->add_field_element( array(
				'field_type' => 'text',
				'name'       => 'qodef_custom_font_name',
				'title'      => esc_html__( 'Custom Font Name', 'banquet-core' ),
			) );
			
			// Hook to include additional options after module options
			do_action( 'banquet_core_action_after_page_fonts_options_map', $page );
		}
	}
	
	add_action( 'banquet_core_action_default_options_init', 'banquet_core_add_fonts_options', banquet_core_get_admin_options_map_position( 'fonts' ) );
}