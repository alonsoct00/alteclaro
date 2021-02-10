<?php

if ( ! function_exists( 'banquet_include_comments_in_templates' ) ) {
	/**
	 * Function which includes comments templates on pages/posts
	 */
	function banquet_include_comments_in_templates() {
		
		// Include comments template
		comments_template();
	}
	
	add_action( 'banquet_action_after_page_content', 'banquet_include_comments_in_templates', 100 ); // permission 100 is set to comments template be at the last place
	add_action( 'banquet_action_after_blog_post_item', 'banquet_include_comments_in_templates', 100 );
}

if ( ! function_exists( 'banquet_is_page_comments_enabled' ) ) {
	/**
	 * Function that check is module enabled
	 */
	function banquet_is_page_comments_enabled() {
		$is_enabled = apply_filters( 'banquet_filter_enable_page_comments', true );
		
		return $is_enabled;
	}
}

if ( ! function_exists( 'banquet_load_page_comments' ) ) {
	/**
	 * Function which loads page template module
	 */
	function banquet_load_page_comments() {
		
		if ( banquet_is_page_comments_enabled() ) {
			banquet_template_part( 'comments', 'templates/comments' );
		}
	}
	
	add_action( 'banquet_action_page_comments_template', 'banquet_load_page_comments' );
}

if ( ! function_exists( 'banquet_get_comments_list_template' ) ) {
	/**
	 * Function which modify default wordpress comments list template
	 *
	 * @param $comment object
	 * @param $args array
	 * @param $depth int
	 *
	 * @return string that contains comments list html
	 */
	function banquet_get_comments_list_template( $comment, $args, $depth ) {
		global $post;
		$GLOBALS['comment'] = $comment;
		
		$classes = array();
		
		$is_author_comment = $post->post_author == $comment->user_id;
		if ( $is_author_comment ) {
			$classes[] = 'qodef-comment--author';
		}
		
		$is_specific_comment = $comment->comment_type == 'pingback' || $comment->comment_type == 'trackback';
		if ( $is_specific_comment ) {
			$classes[] = 'qodef-comment--no-avatar';
			$classes[] = 'qodef-comment--' . esc_attr( $comment->comment_type );
		}
		?>
		<li class="qodef-comment-item qodef-e <?php echo esc_attr( implode( ' ', $classes ) ); ?>">
		<div id="comment-<?php comment_ID(); ?>" class="qodef-e-inner">
			<?php if ( ! $is_specific_comment ) { ?>
				<div class="qodef-e-image"><?php echo get_avatar( $comment, 76 ); ?></div>
			<?php } ?>
			<div class="qodef-e-content">
				<h6 class="qodef-e-title vcard"><?php echo sprintf( '<span class="fn">%s%s</span>', $is_specific_comment ? sprintf( '%s: ', esc_attr( ucwords( $comment->comment_type ) ) ) : '', get_comment_author_link() ); ?>
					<div class="qodef-e-links">
						<?php
						comment_reply_link( array_merge( $args, array(
							'reply_text' => esc_html__( 'Reply', 'banquet' ),
							'depth'      => $depth,
							'max_depth'  => $args['max_depth']
						) ) );
						
						edit_comment_link( esc_html__( 'Edit', 'banquet' ) ); ?>
					</div>
				</h6>
				<?php if ( ! $is_specific_comment ) { ?>
					<p class="qodef-e-text"><?php echo strip_tags( get_comment_text() ); ?>
				<?php } ?>
				
			</div>
		</div>
		<?php //li tag will be closed by WordPress after looping through child elements ?>
		<?php
	}
}