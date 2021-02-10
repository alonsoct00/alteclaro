<?php

if ( ! function_exists( 'banquet_core_add_team_single_meta_box' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function banquet_core_add_team_single_meta_box() {
		$qode_framework = qode_framework_get_framework_root();
		$has_single     = banquet_core_team_has_single();
		
		$page = $qode_framework->add_options_page(
			array(
				'scope' => array( 'team' ),
				'type'  => 'meta',
				'slug'  => 'team',
				'title' => esc_html__( 'Team Single', 'banquet-core' )
			)
		);
		
		if ( $page ) {
			$section = $page->add_section_element(
				array(
					'name'        => 'qodef_team_general_section',
					'title'       => esc_html__( 'General Settings', 'banquet-core' ),
					'description' => esc_html__( 'General information about team member.', 'banquet-core' )
				)
			);
			
			if ( $has_single ) {
				$section->add_field_element( array(
					'field_type'  => 'select',
					'name'        => 'qodef_team_single_layout',
					'title'       => esc_html__( 'Single Layout', 'banquet-core' ),
					'description' => esc_html__( 'Choose default layout for team single', 'banquet-core' ),
					'options'     => array(
						'' => esc_html__( 'Default', 'banquet-core' )
					)
				) );
			}
			
			$section->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_team_member_role',
					'title'       => esc_html__( 'Role', 'banquet-core' ),
					'description' => esc_html__( 'Enter team member role', 'banquet-core' ),
				)
			);

			$section->add_field_element( array(
				'field_type'  => 'textarea',
				'name'        => 'qodef_team_member_brief_info',
				'title'       => esc_html__( 'Brief Info', 'banquet-core' ),
				'description' => esc_html__( 'Input a short description for this team member', 'banquet-core' ),
			) );
			
			$social_icons_repeater = $section->add_repeater_element(
				array(
					'name'        => 'qodef_team_member_social_links',
					'title'       => esc_html__( 'Social Networks', 'banquet-core' ),
					'description' => esc_html__( 'Populate team member social networks info', 'banquet-core' ),
					'button_text' => esc_html__( 'Add New Network', 'banquet-core' )
				)
			);

			$social_icons_repeater->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_team_member_social_link_text',
					'title'      => esc_html__( 'Link Text', 'banquet-core' )
				)
			);
			
			$social_icons_repeater->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_team_member_social_link',
					'title'      => esc_html__( 'Link', 'banquet-core' )
				)
			);
			
			$social_icons_repeater->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_team_member_social_link_target',
					'title'      => esc_html__( 'Icon Target', 'banquet-core' ),
					'options'    => banquet_core_get_select_type_options_pool( 'link_target' )
				)
			);
			
			if ( $has_single ) {
				$section->add_field_element( array(
					'field_type'  => 'date',
					'name'        => 'qodef_team_member_birth_date',
					'title'       => esc_html__( 'Birth Date', 'banquet-core' ),
					'description' => esc_html__( 'Enter team member birth date', 'banquet-core' ),
				) );
				
				$section->add_field_element( array(
					'field_type'  => 'text',
					'name'        => 'qodef_team_member_email',
					'title'       => esc_html__( 'E-mail', 'banquet-core' ),
					'description' => esc_html__( 'Enter team member e-mail address', 'banquet-core' ),
				) );
				
				$section->add_field_element( array(
					'field_type'  => 'text',
					'name'        => 'qodef_team_member_address',
					'title'       => esc_html__( 'Address', 'banquet-core' ),
					'description' => esc_html__( 'Enter team member address', 'banquet-core' ),
				) );
				
				$section->add_field_element( array(
					'field_type'  => 'text',
					'name'        => 'qodef_team_member_education',
					'title'       => esc_html__( 'Education', 'banquet-core' ),
					'description' => esc_html__( 'Enter team member education', 'banquet-core' ),
				) );
				
				$section->add_field_element( array(
					'field_type'  => 'file',
					'name'        => 'qodef_team_member_resume',
					'title'       => esc_html__( 'Resume', 'banquet-core' ),
					'description' => esc_html__( 'Upload team member resume', 'banquet-core' ),
					'args'        => array(
						'allowed_type' => '[application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document]'
					)
				) );
			}
			
			// Hook to include additional options after module options
			do_action( 'banquet_core_action_after_team_meta_box_map', $page, $has_single );
		}
	}
	
	add_action( 'banquet_core_action_default_meta_boxes_init', 'banquet_core_add_team_single_meta_box' );
}