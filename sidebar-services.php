								<aside class="sidebar sidebar_services" role="complementary">

									<!-- Вывод Меню Услуг, если оно есть -->

									<?php $site_options_services_menu_title = get_field( 'site_options_services_menu_title', 'option' ); ?>

									<?php if( has_nav_menu('services_side_menu') ) { ?>

										<div class="sidebar_box sidebar_services_menu">
											<?php if( $site_options_services_menu_title ) : echo '<h2 class="title">'.$site_options_services_menu_title.'</h2>'; endif; ?>
											<?php ninjatheme_services_nav(); ?>
										</div> <!-- /.sidebar_services_menu -->

									<?php } ?>

									<!-- Вывод Списка Категорий Услуг, если они есть -->

									<?php if ( get_terms( 'services_categories' ) ) { ?>

									<div class="sidebar_box sidebar_categories">
										<h2 class="title">Категории услуг</h2>
										<?php $args = array( 'title_li' => '', 'taxonomy'  => 'services_categories' );
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

									<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('services_widget_area')) ?>

								</aside> <!-- /.sidebar -->
