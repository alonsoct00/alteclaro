<div <?php qode_framework_class_attribute( $item_classes ); ?>>
	<div class="qodef-e-inner">
        <div class="qodef-e-image-content">
            <div class="qodef-e-image">
                <?php banquet_core_list_sc_template_part( 'post-types/team/shortcodes/team-list', 'post-info/image', '', $params ); ?>
            </div>
            <div class="qodef-e-hover-content">
                <?php banquet_core_list_sc_template_part( 'post-types/team/shortcodes/team-list', 'post-info/brief-info', '', $params ); ?>
                <?php banquet_core_list_sc_template_part( 'post-types/team/shortcodes/team-list', 'post-info/social-icons', '', $params ); ?>
            </div>
        </div>
        <div class="qodef-e-content" <?php qode_framework_inline_style($this_shortcode->get_content_styles($params))?>>
			<?php banquet_core_list_sc_template_part( 'post-types/team/shortcodes/team-list', 'post-info/role', '', $params ); ?>
			<?php banquet_core_list_sc_template_part( 'post-types/team/shortcodes/team-list', 'post-info/title', '', $params ); ?>
		</div>
	</div>
</div>