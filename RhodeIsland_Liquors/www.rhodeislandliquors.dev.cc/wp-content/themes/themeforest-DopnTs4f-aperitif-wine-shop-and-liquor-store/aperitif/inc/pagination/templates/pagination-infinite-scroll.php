<?php if ( isset( $query_result ) && intval( $query_result->max_num_pages ) > 1 ) { ?>
	<div class="qodef-m-pagination qodef--infinite-scroll">
		<?php aperitif_render_icon( 'qodef-infinite-scroll-spinner fa fa-spinner fa-spin', 'font-awesome', '' ); ?>
	</div>
<?php } ?>