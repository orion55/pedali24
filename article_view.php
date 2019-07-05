							<?php if ( have_posts() ) : ?>

								<?php if( get_field( 'site_options_articles_view', 'option' ) == 'view1' ) : ?>
									
									<ul class="articles_list articles_list_view1">

										<?php while ( have_posts() ) : the_post(); ?>

										<li class="one_article">
											<?php if ( has_post_thumbnail() ) { ?>
											<div class="img_wrp">
												<a href="<?php the_permalink(); ?>">
													<?php the_post_thumbnail('medium_size', 'alt=' . the_title_attribute('echo=0')); ?>
												</a>
											</div> <!-- /.img_wrp -->
											<?php } ?>
											<div class="content">
												<h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
												<div class="meta">
													<span class="date"><?php the_time('d/m/Y'); ?></span><span class="divider">|</span><span class="author"><?php echo get_the_author(); ?></span><?php if (comments_open( get_the_ID() ) ) { ?><span class="divider">|</span><span class="comments"><a href="<?php comments_link(); ?>">комментарии (<?php comments_number('0', '1', '%'); ?>)</a></span><?php } ?><span class="divider">|</span><span class="categories"><?php the_category(', '); ?></span>
												</div> <!-- /.meta -->
												<div class="anons">
													<?php the_content(''); ?>
												</div> <!-- /.anons -->
											</div> <!-- /.content -->
										</li>

										<?php endwhile; ?>

									</ul> <!-- /.articles_list_view1 -->

								<?php elseif( get_field( 'site_options_articles_view', 'option' ) == 'view2' ) : ?>

									<ul class="articles_list articles_list_view2">

										<?php while ( have_posts() ) : the_post(); ?>

										<li class="one_article">
											<?php if ( has_post_thumbnail() ) { ?>
											<div class="img_wrp">
												<a href="<?php the_permalink(); ?>">
													<?php the_post_thumbnail('main_size', 'alt=' . the_title_attribute('echo=0')); ?>
												</a>
											</div> <!-- /.img_wrp -->
											<?php } ?>
											<div class="content">
												<h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
												<div class="meta">
													<span class="date"><?php the_time('d/m/Y'); ?></span><span class="divider">|</span><span class="author"><?php echo get_the_author(); ?></span><?php if (comments_open( get_the_ID() ) ) { ?><span class="divider">|</span><span class="comments"><a href="<?php comments_link(); ?>">комментарии (<?php comments_number('0', '1', '%'); ?>)</a></span><?php } ?><span class="divider">|</span><span class="categories"><?php the_category(', '); ?></span>
												</div> <!-- /.meta -->
												<div class="anons">
													<?php the_content('Подробнее'); ?>
												</div> <!-- /.anons -->
											</div> <!-- /.content -->
										</li>

										<?php endwhile; ?>

									</ul> <!-- /.articles_list_view2 -->
									
								<?php elseif( get_field( 'site_options_articles_view', 'option' ) == 'view3' ) : ?>

									<ul class="articles_list articles_list_view3">

										<?php while ( have_posts() ) : the_post(); ?>

										<li class="one_article">
											<?php if ( has_post_thumbnail() ) { ?>
											<div class="img_wrp">
												<a href="<?php the_permalink(); ?>">
													<?php the_post_thumbnail('medium_size_square_sm', 'alt=' . the_title_attribute('echo=0')); ?>
												</a>
											</div> <!-- /.img_wrp -->
											<?php } ?>
											<div class="content">
												<h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
												<div class="meta">
													<span class="date"><?php the_time('d/m/Y'); ?></span><span class="divider">|</span><span class="author"><?php echo get_the_author(); ?></span><?php if (comments_open( get_the_ID() ) ) { ?><span class="divider">|</span><span class="comments"><a href="<?php comments_link(); ?>">комментарии (<?php comments_number('0', '1', '%'); ?>)</a></span><?php } ?><span class="divider">|</span><span class="categories"><?php the_category(', '); ?></span>
												</div> <!-- /.meta -->
												<div class="anons">
													<?php the_content('Подробнее'); ?>
												</div> <!-- /.anons -->
											</div> <!-- /.content -->
										</li>

										<?php endwhile; ?>

									</ul> <!-- /.articles_list_view3 -->
									
								<?php endif; ?>

							<?php else : ?>

								<div class="empty_cat">
									<h2 class="subtitle">Нет постов для отображения!</h2>
									<p>Воспользуйтесь поиском или вернитесь на <a href="/">главную</a>.</p>
									<div class="sidebar_box sidebar_search">
										<?php get_template_part('searchform'); ?>
									</div> <!-- /.sidebar_search -->
								</div> <!-- /.empty_cat -->

							<?php endif; ?>