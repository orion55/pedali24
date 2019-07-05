				<?php if( $wp_query->max_num_pages > 1 ) { ?>

				<div class="pagination">
					<div class="pagination_content clearfix">
						<?php kama_pagenavi(); ?>
					</div> <!-- /.pagination_content -->
				</div> <!-- /.pagination -->

				<?php } ?>