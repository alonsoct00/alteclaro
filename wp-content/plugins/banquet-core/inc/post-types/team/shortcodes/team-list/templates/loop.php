<?php if ( $query_result->have_posts() ) {
	while ( $query_result->have_posts() ) : $query_result->the_post();
		
		banquet_core_list_sc_template_part( 'post-types/team/shortcodes/team-list', 'layouts/' . $layout, '', $params );
	endwhile; // End of the loop.
} else {
	banquet_core_template_part( 'post-types/team/shortcodes/team-list', 'templates/posts-not-found' );
}

wp_reset_postdata();