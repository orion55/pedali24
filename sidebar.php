								<aside class="sidebar sidebar_articles" role="complementary">

									<!-- Вывод Формы Поиска -->

									<div class="sidebar_box sidebar_search">
										<?php get_template_part('searchform'); ?>
									</div> <!-- /.sidebar_search -->

									<!-- Вывод Списка Категорий Блога -->

									<?php if ( get_terms( 'category' ) ) : ?>

										<div class="sidebar_box sidebar_categories">
											<h2 class="title">Категории</h2>
											<?php $args = array( 'title_li' => '', 'taxonomy'  => 'category' );
											echo '<ul class="list">';
												wp_list_categories( $args );
											echo '</ul>';
											?>
										</div> <!-- /.sidebar_categories -->

									<?php endif; ?>

									<!-- Вывод Популярных Записей Блога -->

									<div class="sidebar_box sidebar_popular">
										<h2 class="title">Популярные записи</h2>

										<?php $popular = new WP_Query(array( 'posts_per_page' => 5, 'meta_key' => 'post_views_count', 'orderby' => 'meta_value_num', 'order' => 'DESC', 'post_type' => 'post' ));

										if ( $popular->have_posts() ) : ?>

											<ul class="list">

												<?php while ( $popular->have_posts() ) : $popular->the_post(); ?>

												<li>
													<?php if ( has_post_thumbnail() ) { ?>
													<div class="img_wrp">
														<a href="<?php the_permalink(); ?>">
															<?php the_post_thumbnail('small_size_square', 'alt=' . the_title_attribute('echo=0')); ?>
														</a>
													</div> <!-- /.img_wrp -->
													<?php } ?>
													<div class="content">
														<h3 class="article_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
														<div class="date"><?php the_time('d/m/Y'); ?></div>
													</div> <!-- /.content -->
												</li>

												<?php endwhile; ?>

											</ul> <!-- /.articles_list -->

										<?php endif; ?>

										<?php wp_reset_query(); ?>

									</div> <!-- /.sidebar_popular -->

									<!-- Вывод Тегов, если они есть -->

									<?php if ( function_exists('wp_tag_cloud') ) : ?>

										<div class="sidebar_box sidebar_tags">
											<h2 class="title">Теги</h2>
											<?php wp_tag_cloud('smallest=15&largest=15&unit=px&format=list'); ?>
										</div> <!-- /.sidebar_tags -->
										
									<?php endif; ?>

									<!-- Вывод Блока Прайс-лист, если он включен -->

									<?php $site_options_price_btn = get_field( 'site_options_price_btn', 'option' ); ?>
									<?php $site_options_price_btn_file = get_field( 'site_options_price_btn_file', 'option' ); ?>

									<?php if( $site_options_price_btn ) : echo '<div class="sidebar_box sidebar_services_price_btn"><a href="'.$site_options_price_btn_file.'"><span class="span">'.$site_options_price_btn.'</span></a></div>'; endif; ?>

									<!-- Вывод Маленького Баннера, если он включен -->

									<?php $site_options_small_banner = get_field( 'site_options_small_banner', 'option' ); ?>
									<?php $site_options_small_banner_btn = get_field( 'site_options_small_banner_btn', 'option' ); ?>
									<?php $site_options_small_banner_btn_link = get_field( 'site_options_small_banner_btn_link', 'option' ); ?>
									<?php $site_options_small_banner_bg = get_field( 'site_options_small_banner_bg', 'option' ); ?>

									<?php if( $site_options_small_banner ) : ?>

									<div class="sidebar_box sidebar_banner_small">
										<div class="block_content">
											<?php echo $site_options_small_banner; ?>
											<?php if( $site_options_small_banner_btn ) : echo '<a href="'.$site_options_small_banner_btn_link.'" class="btn btn_fill">'.$site_options_small_banner_btn.'<i class="zmdi zmdi-arrow-right"></i></a>'; endif; ?>
										</div> <!-- /.block_content -->
										<div class="block_bg" <?php if( $site_options_small_banner_bg ) : echo 'style="background-image: url(\''.$site_options_small_banner_bg.'\');"'; endif; ?>></div>
									</div> <!-- /.sidebar_banner_small -->

									<?php endif; ?>

									<!-- Вывод Виджетов, если они есть -->

									<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('blog_widget_area')) ?>

								</aside> <!-- /.sidebar -->