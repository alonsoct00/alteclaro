<?php

if ( ! function_exists( 'banquet_core_add_page_social_share_options' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function banquet_core_add_page_social_share_options() {
		$qode_framework = qode_framework_get_framework_root();
		
		$page = $qode_framework->add_options_page(
			array(
				'scope'       => BANQUET_CORE_OPTIONS_NAME,
				'type'        => 'admin',
				'slug'        => 'social-share',
				'icon'        => 'fa fa-book',
				'title'       => esc_html__( 'Social Share', 'banquet-core' ),
				'description' => esc_html__( 'Global settings related to social networks', 'banquet-core' )
			)
		);
		
		if ( $page ) {
			$social_networks = banquet_core_social_networks_list();
			
			foreach ( $social_networks as $network => $params ) {
				$page->add_field_element(
					array(
						'field_type'    => 'yesno',
						'name'          => 'qodef_enable_share_' . $network,
						'title'         => sprintf( esc_html__( 'Enable %s Share', 'banquet-core' ), $params['label'] ),
						'default_value' => 'yes'
					)
				);
				
				if( $network == 'twitter' ) {
					$page->add_field_element(
						array(
							'field_type'    => 'text',
							'name'          => 'qodef_twitter_via',
							'title'         => esc_html__( 'Twitter Via Text', 'banquet-core' ),
							'dependency' => array(
								'show' => array(
									'qodef_enable_share_twitter' => array(
										'values'        => 'yes',
										'default_value' => 'yes'
									)
								)
							)
						)
					);
				}
			}

			// Hook to include additional options after module options
			do_action( 'banquet_core_action_after_social_share_options_map', $page );
		}
	}
	
	add_action( 'banquet_core_action_default_options_init', 'banquet_core_add_page_social_share_options', banquet_core_get_admin_options_map_position( 'social-share' ) );
}