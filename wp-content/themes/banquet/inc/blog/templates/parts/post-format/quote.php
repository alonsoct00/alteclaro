<?php
$quote_meta = get_post_meta( get_the_ID(), 'qodef_post_format_quote_text', true );
$quote_text = ! empty( $quote_meta ) ? $quote_meta : get_the_title();

if ( ! empty( $quote_text ) ) {
	$quote_author     = get_post_meta( get_the_ID(), 'qodef_post_format_quote_author', true );
	$title_tag        = isset( $title_tag ) && ! empty( $title_tag ) ? $title_tag : 'h4';
	$author_title_tag = isset( $author_title_tag ) && ! empty( $author_title_tag ) ? $author_title_tag : 'span';
	?>
	<div class="qodef-e-quote">
		<div class="qodef-e-quote-svg-holder">
			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="48.162px" height="42.019px" viewBox="0 0 48.162 42.019" enable-background="new 0 0 48.162 42.019" xml:space="preserve">
				<g>
					<path fill="#D1D0CE" d="M20.738,0c0.354,0,0.665,0.242,0.902,0.723c0.236,0.491,0.176,0.854-0.179,1.089
						c-4.483,3.396-7.977,6.825-10.461,10.28c-2.487,3.455-4.03,7.188-4.64,11.186c-0.248,1.456-0.363,2.483-0.363,3.092
						c0,1.097,0.191,2.124,0.548,3.096c1.096-1.214,2.738-1.822,4.915-1.822c2.179,0,3.906,0.707,5.184,2.098
						c1.27,1.394,1.9,3.063,1.9,4.998c0,2.3-0.756,4.097-2.265,5.37c-1.524,1.272-3.612,1.907-6.275,1.907
						c-3.038,0-5.465-0.998-7.282-3.004C0.902,37.013,0,34.193,0,30.551C0,20.006,6.737,9.881,20.189,0.176
						C20.311,0.059,20.486,0,20.738,0z M47.102,0c0.371,0,0.668,0.242,0.917,0.723c0.238,0.491,0.18,0.854-0.176,1.089
						c-4.5,3.396-7.98,6.825-10.467,10.28c-2.487,3.455-4.023,7.188-4.632,11.186c-0.258,1.456-0.371,2.483-0.371,3.092
						c0,1.097,0.18,2.124,0.547,3.096c1.093-1.214,2.725-1.822,4.918-1.822c2.175,0,3.906,0.707,5.179,2.098
						c1.276,1.394,1.91,3.063,1.91,5.002c0,2.304-0.755,4.097-2.273,5.369c-1.511,1.273-3.602,1.907-6.279,1.907
						c-3.021,0-5.449-0.997-7.272-3.003c-1.815-2.003-2.725-4.823-2.725-8.465c0-10.545,6.719-20.67,20.193-30.375
						C46.688,0.059,46.863,0,47.102,0z"/>
				</g>
			</svg>
		</div>
	<<?php echo esc_attr( $title_tag ); ?> class="qodef-e-quote-text"><?php echo esc_html( $quote_text ); ?></<?php echo esc_attr( $title_tag ); ?>>
		<?php if ( ! is_single() ) { ?>
			<a itemprop="url" class="qodef-e-quote-url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"></a>
		<?php } ?>
	</div>
<?php } ?>