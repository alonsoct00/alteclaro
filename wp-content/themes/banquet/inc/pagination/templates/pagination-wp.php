<?php if ( get_the_posts_pagination() !== '' ): ?>

    <div class="qodef-m-pagination qodef--wp">
		<?php
		// Load posts pagination (in order to override template use navigation_markup_template filter hook)
		the_posts_pagination( array(
			'prev_text'          => banquet_get_icon( 'icon-arrows-left', 'linea-icons', esc_html__( '< Prev', 'banquet' ) ),
			'next_text'          => banquet_get_icon( 'icon-arrows-right', 'linea-icons', esc_html__( 'Next >', 'banquet' ) ),
			'before_page_number' => '0'
		) ); ?>
    </div>

<?php endif; ?>