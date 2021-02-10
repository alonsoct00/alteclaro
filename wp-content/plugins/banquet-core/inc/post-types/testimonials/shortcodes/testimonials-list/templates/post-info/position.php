<?php
$author_job = get_post_meta( get_the_ID(), 'qodef_testimonials_author_job', true );

if ( ! empty ( $author_job ) ) { ?>
	<p class="qodef-e-author-job">
		<?php echo esc_html( $author_job ); ?>
	</p>
<?php }