<?php
$link_url_meta  = get_post_meta( get_the_ID(), 'qodef_post_format_link', true );
$link_url       = ! empty( $link_url_meta ) ? $link_url_meta : get_the_permalink();
$link_text_meta = get_post_meta( get_the_ID(), 'qodef_post_format_link_text', true );

if ( ! empty( $link_url ) ) {
	$link_text = ! empty( $link_text_meta ) ? $link_text_meta : get_the_title();
	$title_tag = isset( $title_tag ) && ! empty( $title_tag ) ? $title_tag : 'h4';
	?>
<div>
	<div class="blog-media">
		<?php
		// Include post media
		banquet_template_part( 'blog', 'templates/parts/post-info/media' );
		?>
	</div>
    <h3>
        <?php the_title(); ?>
    </h3>
    <p>
        <?php the_excerpt(); ?>
    </p>
    <div class="qodef-e-link">
        <<?php echo esc_attr( $title_tag ); ?> class="qodef-e-link-text"><?php echo esc_html( $link_text ); ?></<?php echo esc_attr( $title_tag ); ?>>
		<a itemprop="url" class="qodef-e-link-url" href="<?php echo esc_url( $link_url ); ?>" target="_blank"></a>
    </div>
</div>
<!--<div class="qodef-e-link">
		<div class="qodef-e-link-svg-holder">
			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="42.986px" height="42.991px" viewBox="-0.5 -0.5 42.986 42.991" enable-background="new -0.5 -0.5 42.986 42.991" xml:space="preserve">
				<g>
					<path fill="#D1D0CE" stroke="#D1D0CE" stroke-miterlimit="10" d="M21.731,24.026c0.386,0.824,0.574,1.783,0.574,2.871
						c0,1.588-0.493,3.035-1.475,4.35v0.084l-7.877,7.791c-1.473,1.911-3.391,2.869-5.735,2.869c-1.969,0-3.662-0.71-5.087-2.131
						C0.714,38.543,0,36.851,0,34.776c0-1.916,0.714-3.58,2.132-5.01l8.614-8.609c1.312-0.983,2.76-1.472,4.341-1.472
						c1.096,0,2.054,0.191,2.873,0.574l-0.492,1.236c-0.711-0.339-1.504-0.497-2.381-0.497c-1.254,0-2.433,0.385-3.526,1.146
						l-8.441,8.527c-1.204,1.204-1.807,2.57-1.807,4.105c0,1.529,0.575,2.918,1.725,4.178c1.146,1.145,2.541,1.72,4.183,1.72
						c2.021,0,3.607-0.788,4.754-2.376v-0.082l7.875-7.794c0.766-1.087,1.15-2.264,1.15-3.524c0-0.819-0.164-1.612-0.494-2.377
						L21.731,24.026z M26.407,14.598l-11.811,11.81l0.986,0.981l11.813-11.809L26.407,14.598z M39.859,2.136
						c1.417,1.313,2.128,3.006,2.128,5.08c0,1.587-0.488,3.036-1.476,4.35v0.081l-7.873,7.79c-1.476,1.915-3.39,2.869-5.735,2.869
						c-1.094,0-2.054-0.188-2.878-0.574l0.49-1.23c0.714,0.326,1.507,0.489,2.388,0.489c1.908,0,3.495-0.788,4.751-2.377v-0.078
						l7.875-7.788c0.757-1.096,1.142-2.269,1.142-3.53c0-1.531-0.571-2.921-1.721-4.183c-1.146-1.146-2.539-1.72-4.179-1.72
						c-1.258,0-2.43,0.381-3.526,1.149L22.8,10.99c-1.201,1.199-1.808,2.57-1.808,4.1c0,0.82,0.169,1.616,0.493,2.378l-0.573,0.247
						l0.578-0.247c0,0.058,0.026,0.108,0.082,0.163l-1.154,0.578c-0.053,0-0.081-0.058-0.081-0.167l-0.081-0.082
						c-0.38-0.819-0.571-1.777-0.571-2.87c0-1.854,0.707-3.557,2.132-5.086l8.613-8.529C31.677,0.493,33.133,0,34.771,0
						C36.744,0,38.436,0.711,39.859,2.136z"/>
				</g>
				</svg>
		</div>
		<<?php echo esc_attr( $title_tag ); ?> class="qodef-e-link-text"><?php echo esc_html( $link_text ); ?></<?php echo esc_attr( $title_tag ); ?>>
		<a itemprop="url" class="qodef-e-link-url" href="<?php echo esc_url( $link_url ); ?>" target="_blank"></a>
	</div>-->
<?php } ?>