<?php
$tags = get_the_tags();

if ( $tags ) { ?>
	<div class="qodef-e-info-item qodef-e-info-tags">
		<span class="qodef-e-tags-title"><?php esc_html_e( 'Tags:', 'aperitif' ); ?></span>
		
		<?php the_tags( '', '', '' ); ?>
	</div>
<?php } ?>