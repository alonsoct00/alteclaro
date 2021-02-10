<?php
$author = get_post_meta( get_the_ID(), 'qodef_testimonials_author', true );

if ( ! empty ( $author ) ) { ?>
	<p class="qodef-e-author-name">
		<?php echo esc_html( $author ); ?>
	</p>
<?php }