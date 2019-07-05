										<aside class="sidebar sidebar_projects" role="complementary">

											<!-- Вывод Деталей Проекта, если они есть -->

											<?php $detail_usr = get_field( 'detail_usr' ); ?>
											<?php $detail_cst = get_field( 'detail_cst' ); ?>
											<?php $detail_plc = get_field( 'detail_plc' ); ?>
											<?php $detail_sqr = get_field( 'detail_sqr' ); ?>
											<?php $detail_prd = get_field( 'detail_prd' ); ?>

											<?php if ( (has_term( '', 'projects_categories' )) || ($detail_usr) || ($detail_cst) || ($detail_prd) ) : ?>

												<div class="sidebar_box sidebar_projects_details">
													<h2 class="title">Детали работы</h2>
													<ul class="sidebar_projects_details_list">
														<?php if ( has_term( '', 'projects_categories' ) ) : ?>
														<li class="detail_cat">
															<b>Категория</b>: <span class="categories"><?php the_terms( $post->ID, 'projects_categories' ); ?></span>
														</li>
														<?php endif; ?>
														<?php if( $detail_usr ) : echo '<li class="detail_usr"><b>Заказчик</b>: '.$detail_usr.'</li>'; endif; ?>
														<?php if( $detail_cst ) : echo '<li class="detail_cst"><b>Стоимость работы</b>: '.$detail_cst.'</li>'; endif; ?>
														<?php if( $detail_prd ) : echo '<li class="detail_prd"><b>Затраченное время</b>: '.$detail_prd.'</li>'; endif; ?>
													</ul>
												</div> <!-- /.sidebar_projects_details -->

											<?php endif; ?>

											<!-- Вывод Списка Категорий Проектов, если они есть -->

											<?php if ( get_terms( 'projects_categories' ) ) { ?>

											<div class="sidebar_box sidebar_categories">
												<h2 class="title">Категории работ</h2>
												<?php $args = array( 'title_li' => '', 'taxonomy'  => 'projects_categories' );
												echo '<ul class="list">';
													wp_list_categories( $args );
												echo '</ul>';
												?>
											</div> <!-- /.sidebar_categories -->

											<?php } ?>

											<!-- Вывод Блока Прайс-лист, если он включен -->

											<?php $site_options_price_btn = get_field( 'site_options_price_btn', 'option' ); ?>
											<?php $site_options_price_btn_file = get_field( 'site_options_price_btn_file', 'option' ); ?>

											<?php if( $site_options_price_btn ) : echo '<div class="sidebar_box sidebar_services_price_btn"><a href="'.$site_options_price_btn_file.'"><span class="span">'.$site_options_price_btn.'</span></a></div>'; endif; ?>

											<!-- Вывод Маленького Баннера, если он включен -->

											<?php $site_options_big_banner = get_field( 'site_options_big_banner', 'option' ); ?>
											<?php $site_options_big_banner_btn = get_field( 'site_options_big_banner_btn', 'option' ); ?>
											<?php $site_options_big_banner_btn_link = get_field( 'site_options_big_banner_btn_link', 'option' ); ?>
											<?php $site_options_big_banner_bg = get_field( 'site_options_big_banner_bg', 'option' ); ?>

											<?php if( $site_options_big_banner ) : ?>

											<div class="sidebar_box sidebar_banner_big">
												<div class="block_content">
													<?php echo $site_options_big_banner; ?>
													<?php if( $site_options_big_banner_btn ) : echo '<a href="'.$site_options_big_banner_btn_link.'" class="btn btn_fill">'.$site_options_big_banner_btn.'<i class="zmdi zmdi-arrow-right"></i></a>'; endif; ?>
												</div> <!-- /.block_content -->
												<div class="block_bg" <?php if( $site_options_big_banner_bg ) : echo 'style="background-image: url(\''.$site_options_big_banner_bg.'\');"'; endif; ?>></div>
											</div> <!-- /.sidebar_banner_big -->

											<?php endif; ?>

											<!-- Вывод Виджетов, если они есть -->

											<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('projects_widget_area'))  ?>

											<!-- Вывод Навигации по Проектам -->

											<div class="sidebar_box sidebar_projects_nav">
												<div class="text_links prev">
													<?php $prev_post = get_adjacent_post( false, '', true, 'projects_categories' );
													if(!empty($prev_post)) {
														echo '<a href="' . get_permalink($prev_post->ID) . '" title="' . $prev_post->post_title . '"><i class="zmdi zmdi-arrow-left"></i>Предыдущая<br>работа</a>'; }
													?>
												</div> <!-- /.prev_project_wrp -->
												<div class="all">
													<a href="/projects/"><i class="zmdi zmdi-apps" title="Все работы"></i></a>
												</div> <!-- /.prev_link_wrp -->
												<div class="text_links next">
													<?php $next_post = get_adjacent_post( false, '', false, 'projects_categories' );
													if(!empty($next_post)) {
														echo '<a href="' . get_permalink($next_post->ID) . '" title="' . $next_post->post_title . '">Следующая<i class="zmdi zmdi-arrow-right"></i><br>работа</a>'; }
													?>
												</div> <!-- /.next_project_wrp -->
											</div> <!-- /.sidebar_projects_nav -->

										</aside> <!-- /.sidebar -->
