<div id="qodef-page-comments">
	<?php if ( have_comments() ) {
		$comments_number = '';
		?>
		<div id="qodef-page-comments-list" class="qodef-m">
			<h4 class="qodef-m-title"><?php echo sprintf( _n( '%s Comment', '%s Comments', $comments_number, 'banquet' ), $comments_number ); ?></h4>
			<ul class="qodef-m-comments">
				<?php wp_list_comments( array_unique( array_merge( array( 'callback' => 'banquet_get_comments_list_template' ), apply_filters( 'banquet_filter_comments_list_template_callback', array() ) ) ) ); ?>
			</ul>
			
			<?php if ( get_comment_pages_count() > 1 ) { ?>
				<div class="qodef-m-pagination qodef--wp">
					<?php the_comments_pagination( array(
						'prev_text'          => banquet_get_icon( 'icon-arrows-left', 'linea-icons', esc_html__( '< Prev', 'banquet' ) ),
						'next_text'          => banquet_get_icon( 'icon-arrows-right', 'linea-icons', esc_html__( 'Next >', 'banquet' ) ),
						'before_page_number' => '0'
					) ); ?>
				</div>
			<?php } ?>
		</div>
	<?php } ?>
	<?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) { ?>
		<p class="qodef-page-comments-not-found"><?php esc_html_e( 'Comments are closed.', 'banquet' ); ?></p>
	<?php } ?>
	
	<div id="qodef-page-comments-form">
		<?php
		
		$qodef_commenter = wp_get_current_commenter();
		$qodef_req       = get_option( 'require_name_email' );
		$qodef_aria_req  = ( $qodef_req ? " aria-required='true'" : '' );
		$qodef_consent   = empty( $qodef_commenter['comment_author_email'] ) ? '' : ' checked="checked"';
		
		$args = array(
			'title_reply_before' => '<h4 id="reply-title" class="comment-reply-title">',
			'title_reply_after'  => '</h4>',
			'cancel_reply_link'  =>  esc_attr__( 'Cancel', 'banquet' ),
			'fields'             => apply_filters( 'banquet_filter_comment_form_default_fields', array(
				'author'  => '<input id="author" name="author" placeholder="' . esc_attr__( 'Your name', 'banquet' ) . '" type="text" value="' . esc_attr( $qodef_commenter['comment_author'] ) . '" ' . $qodef_aria_req . ' />',
				'email'   => '<input id="email" name="email" placeholder="' . esc_attr__( 'Your email', 'banquet' ) . '" type="text" value="' . esc_attr( $qodef_commenter['comment_author_email'] ) . '" ' . $qodef_aria_req . ' />',
				'cookies' => '<p class="comment-form-cookies-consent"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes" ' . $qodef_consent . ' />' .
				             '<label for="wp-comment-cookies-consent">' . esc_html__( 'Save my name, email, and website in this browser for the next time I comment.', 'banquet' ) . '</label></p>',
			) ),
			'comment_field'      => apply_filters( 'banquet_filter_comment_form_textarea_field',
				'<textarea id="comment" placeholder="' . esc_attr__( 'Your comment', 'banquet' ) . '" name="comment" cols="45" rows="5" aria-required="true"></textarea>' ),
		);
		
		comment_form( apply_filters( 'banquet_filter_comment_form_args', $args ) ); ?>
	</div>
</div>