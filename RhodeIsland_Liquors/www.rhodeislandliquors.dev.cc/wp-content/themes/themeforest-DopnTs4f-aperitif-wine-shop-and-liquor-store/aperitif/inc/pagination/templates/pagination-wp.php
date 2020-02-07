<div class="qodef-m-pagination qodef--wp">
	<?php
	// Load posts pagination (in order to override template use navigation_markup_template filter hook)
	the_posts_pagination( array(
		'prev_text'          => aperitif_get_icon( 'icon-arrows-slim-left', 'elegant-icons', esc_html__( '< Prev', 'aperitif' ) ),
		'next_text'          => aperitif_get_icon( 'icon-arrows-slim-right', 'elegant-icons', esc_html__( 'Next >', 'aperitif' ) ),
		'before_page_number' => '0'
	) ); ?>
</div>