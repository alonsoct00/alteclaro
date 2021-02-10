<div class="qodef-fullscreen-search-holder">
	<a class="qodef-search-close <?php echo banquet_core_get_open_close_icon_class('qodef_search_icon_source','qodef-search-close'); ?>" href="javascript:void(0)">
		<?php echo banquet_core_get_search_icon_html(true); ?>
	</a>
    <div class="qodef-fullscreen-search-inner">
        <form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="qodef-fullscreen-search-form" method="get">
            <div class="qodef-form-holder">

                <div class="qodef-field-holder">
                    <input type="text" placeholder="<?php esc_attr_e( 'Search for...', 'banquet-core' ); ?>" name="s" class="qodef-search-field" autocomplete="off" required />
                </div>
                <button type="submit" class="qodef-search-submit <?php echo banquet_core_get_open_close_icon_class('qodef_search_icon_source','qodef-search-submit'); ?>">
                    <?php echo banquet_core_get_search_icon_html(); ?>
                </button>
                <div class="qodef-line"></div>

            </div>
        </form>
    </div>
</div>