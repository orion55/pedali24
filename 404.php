			<?php get_header(); ?>

			<div class="inside_pages_content">

				<div class="page_header">
					<div class="block_content">
						<div class="container">
							<div class="breadcrumbs">
								<?php if( function_exists('kama_breadcrumbs') ) kama_breadcrumbs(); ?>
							</div> <!-- /.breadcrumbs -->
							<h1 class="main_title">Ошибка 404: страница не найдена!</h1>
						</div>
					</div> <!-- /.block_content -->
					<?php $site_options_header_title_bg = get_field( 'site_options_header_title_bg', 'option' ); ?>
					<div class="block_bg" <?php if( $site_options_header_title_bg ) : echo 'style="background-image: url(\''.$site_options_header_title_bg.'\');"'; endif; ?>></div>
				</div> <!-- /.page_header -->

				<div class="article_page top_padding">
					<div class="container">
						<div class="section_articles_inside" role="main">

							<img src="<?php echo get_template_directory_uri(); ?>/img/404.jpg" alt="Ошибка 404: страница не найдена!" class="_404">

							<p>
								Страница, которую Вы ищете, не существует или была удалена.<br>
								Вернуться на <a href="<?php echo home_url(); ?>">главную</a>.
							</p>

						</div>
					</div>
				</div> <!-- /.article_page -->

			</div> <!-- /.inside_pages_content -->

			<?php get_footer(); ?>