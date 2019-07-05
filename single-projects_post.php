			<?php get_header(); ?>

			<div class="inside_pages_content">

				<div class="page_header">
					<div class="block_content">
						<div class="container">
							<div class="breadcrumbs">
								<?php if( function_exists('kama_breadcrumbs') ) kama_breadcrumbs(); ?>
							</div> <!-- /.breadcrumbs -->
							<h1 class="main_title"><?php the_title(); ?></h1>
						</div>
					</div> <!-- /.block_content -->
					<?php $site_options_header_title_bg = get_field( 'site_options_header_title_bg', 'option' ); ?>
					<div class="block_bg" <?php if( $site_options_header_title_bg ) : echo 'style="background-image: url(\''.$site_options_header_title_bg.'\');"'; endif; ?>></div>
				</div> <!-- /.page_header -->

				<div class="section_one_project top_padding">

					<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>

						<article class="article_one article_one_project">
							<div class="container">
								<div class="row">
									<div class="col-md-12">
										<?php if ( has_post_thumbnail() ) { ?>
										<div class="article_thumbnail">
											<?php the_post_thumbnail('main_size', 'alt=' . the_title_attribute('echo=0')); ?>
										</div> <!-- /.article_thumbnail -->
										<?php } ?>
									</div>
								</div>
								<div class="row">
									<div class="col-md-7">
										<div class="left_col_project" role="main">

											<div class="article_content">
												<?php the_content(); ?>
												<?php edit_post_link('Редактировать', '<p class="edit_link_p">', '</p>'); ?>
											</div> <!-- /.article_content -->
											<div class="article_meta_secondary">
												<div class="share">
													<ul class="share_list">
														<li><span class="social_share vk" data-type="vk" title="Поделиться в Вконтакте"></span></li>
														<li><span class="social_share fb" data-type="fb" title="Поделиться в FaceBook"></span></li>
														<li><span class="social_share tw" data-type="tw" title="Поделиться в Twitter"></span></li>
														<li><span class="social_share gp" data-type="gp" title="Поделиться в Google Plus"></span></li>
														<li><span class="social_share mr" data-type="mr" title="Поделиться в Mail.ru"></span></li>
														<li><span class="social_share ok" data-type="ok" title="Поделиться в Одноклассниках"></span></li>
														<li><span class="social_share lj" data-type="lj" title="Поделиться в Живом Журнале"></span></li>
													</ul>
												</div> <!-- /.share -->
											</div> <!-- /.article_meta_secondary -->

										</div> <!-- /.left_col_project -->
									</div>
									<div class="col-md-5">
										<?php get_sidebar('projects'); ?>
									</div>
								</div>
							</div>
						</article> <!-- /.article_one_project -->

					<?php endwhile; ?>

					<?php else: ?>

						<div class="empty_post">
							<h2>Ничего не найдено!</h2>
							<p>Перейти на <a href="/">главную</a>.</p>
						</div> <!-- /.empty_post -->

					<?php endif; ?>

				</div> <!-- /.section_one_project -->

			</div> <!-- /.inside_pages_content -->

			<?php get_footer(); ?>