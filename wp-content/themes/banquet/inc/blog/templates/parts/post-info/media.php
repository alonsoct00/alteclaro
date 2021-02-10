<div class="qodef-e-media">
	<?php switch ( get_post_format() ) {
		case 'gallery':
			banquet_template_part( 'blog', 'templates/parts/post-format/gallery' );
			break;
		case 'video':
			banquet_template_part( 'blog', 'templates/parts/post-format/video' );
			break;
		case 'audio':
			banquet_template_part( 'blog', 'templates/parts/post-format/audio' );
			break;
		default:
			banquet_template_part( 'blog', 'templates/parts/post-info/image' );
			break;
	} ?>
</div>