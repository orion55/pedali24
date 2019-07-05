			<?php get_header(); ?>

			<div class="inside_pages_content <?php if( (get_field( 'site_options_articles_view', 'option' ) == 'view2') || (get_field( 'site_options_articles_view', 'option' ) == 'view3') ) : echo 'with_sidebar'; endif ?>">

				<div class="page_header">
					<div class="block_content">
						<div class="container">
							<div class="breadcrumbs">
								<?php if( function_exists('kama_breadcrumbs') ) kama_breadcrumbs(); ?>
							</div> <!-- /.breadcrumbs -->
							<h1 class="main_title"><?php single_post_title() ?></h1>
						</div>
					</div> <!-- /.block_content -->
					<?php $site_options_header_title_bg = get_field( 'site_options_header_title_bg', 'option' ); ?>
					<div class="block_bg" <?php if( $site_options_header_title_bg ) : echo 'style="background-image: url(\''.$site_options_header_title_bg.'\');"'; endif; ?>></div>
				</div> <!-- /.page_header -->

				<?php if( (get_field( 'site_options_articles_view', 'option' ) == 'view2') || (get_field( 'site_options_articles_view', 'option' ) == 'view3') ) : ?>

					<div class="articles_page">

						<div class="container">

							<!-- Вывод Описания Раздела "Блог", если оно есть -->
							
							<?php $site_options_blog_description = get_field( 'site_options_blog_description', 'option' ); ?>
							<?php if( $site_options_blog_description ) : echo '<div class="section_subtext">'.$site_options_blog_description.'</div>'; endif; ?>

							<div class="top_margin">
								<div class="row">
									<div class="col-lg-9 col-md-8">

										<div class="section_articles section_articles_inside">

											<!-- Вывод Списка Постов, если они есть -->

											<?php get_template_part('article_view'); ?>

											<?php get_template_part('pagination'); ?>

										</div> <!-- /.section_articles-->

									</div>
									<div class="col-lg-3 col-md-4">

										<!-- Вывод Сайдбара -->

										<?php get_sidebar(); ?>

									</div>
								</div>
							</div>

						</div>

					</div> <!-- /.articles_page -->

				<?php else : ?>

					<div class="articles_page">

						<div class="section_articles section_articles_inside">
							<div class="container">

								<!-- Вывод Описания Раздела "Блог", если оно есть -->
								
								<?php $site_options_blog_description = get_field( 'site_options_blog_description', 'option' ); ?>
								<?php if( $site_options_blog_description ) : echo '<div class="section_subtext">'.$site_options_blog_description.'</div>'; endif; ?>

								<!-- Вывод Списка Категорий, если они есть -->

								<?php if ( get_terms( 'category' ) ) { ?>

								<div class="cats_list articles_cats_list">

								<?php

									echo 'Выберите категорию:';
									wp_dropdown_categories( array(
										'class'			   => 'custom_select',
								    	'hierarchical'     => 1,
								    	'show_option_none' => 'Все категории'
									));

								?>

								<script>
									var dropdown = document.getElementById("cat");
									function onCatChange() {
										if ( dropdown.options[dropdown.selectedIndex].value > 0 ) {
											location.href = "<?php echo get_option('home'); ?>/?cat="+dropdown.options[dropdown.selectedIndex].value;
										}
									}
									dropdown.onchange = onCatChange;
								</script>

								</div> <!-- /.articles_cats_list -->

								<?php } ?>

								<!-- Вывод Списка Постов, если они есть -->

								<div class="top_margin">
									<?php get_template_part('article_view'); ?>
								</div>

								<?php get_template_part('pagination'); ?>

							</div>
						</div> <!-- /.section_articles-->

					</div> <!-- /.articles_page -->

				<?php endif ?>

			</div> <!-- /.inside_pages_content -->

			<?php get_footer(); ?>
