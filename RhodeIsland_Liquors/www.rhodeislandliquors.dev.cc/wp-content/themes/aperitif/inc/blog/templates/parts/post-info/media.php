<div class="qodef-e-media">
	<?php switch ( get_post_format() ) {
		case 'gallery':
			aperitif_template_part( 'blog', 'templates/parts/post-format/gallery' );
			break;
		case 'video':
			aperitif_template_part( 'blog', 'templates/parts/post-format/video' );
			break;
		case 'audio':
			aperitif_template_part( 'blog', 'templates/parts/post-format/audio' );
			break;
		default:
			aperitif_template_part( 'blog', 'templates/parts/post-info/image' );
			break;
	} ?>
</div>