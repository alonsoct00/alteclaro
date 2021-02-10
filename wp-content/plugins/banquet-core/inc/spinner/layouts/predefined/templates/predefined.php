<?php
	$spinner_text = banquet_core_get_post_value_through_levels( 'qodef_page_spinner_text' );

	if ( ! function_exists( 'banquet_str_split_unicode' ) ) {
		function banquet_str_split_unicode( $str ) {
			return preg_split( '~~u', html_entity_decode( $str ), - 1, PREG_SPLIT_NO_EMPTY );
		}
	}
	
	if ( ! function_exists( 'banquet_get_split_text' ) ) {
		function banquet_get_split_text( $text ) {
			if ( ! empty( $text ) ) {
				$split_text = banquet_str_split_unicode( $text );
				
				foreach ( $split_text as $key => $value ) {
					$split_text[ $key ] = '<span class="qodef-e-character">' . $value . '</span>';
				}
				
				return implode( ' ', $split_text );
			}
			
			return $text;
		}
	}

	$split_spinner_text = banquet_get_split_text($spinner_text);
?>

<div class="qodef-m-predefined">
	<div class="qodef-predefined-spinner-text">
		<?php echo $split_spinner_text; ?>
	</div>
</div>