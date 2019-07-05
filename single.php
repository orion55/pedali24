			<?php get_header(); ?>

			<div class="inside_pages_content with_sidebar">

				<div class="page_header">
					<div class="block_content">
						<div class="container">
							<div class="breadcrumbs">
								<?php if( function_exists('kama_breadcrumbs') ) kama_breadcrumbs(); ?>
							</div> <!-- /.breadcrumbs -->
							<h1 class="main_title"><?php single_post_title(); ?></h1>
						</div>
					</div> <!-- /.block_content -->
					<?php $site_options_header_title_bg = get_field( 'site_options_header_title_bg', 'option' ); ?>
					<div class="block_bg" <?php if( $site_options_header_title_bg ) : echo 'style="background-image: url(\''.$site_options_header_title_bg.'\');"'; endif; ?>></div>
				</div> <!-- /.page_header -->

				<div class="article_page top_padding">
					<div class="container">
						<div class="row">
							<div class="col-lg-9 col-md-8">
								<div class="section_articles_inside" role="main">

								<?php if (have_posts()): while (have_posts()) : the_post(); ?>

									<article class="article_one">
										<?php if ( has_post_thumbnail() ) { ?>
										<div class="article_thumbnail">
											<?php the_post_thumbnail('main_size', 'alt=' . the_title_attribute('echo=0')); ?>
										</div> <!-- /.article_thumbnail -->
										<?php } ?>
										<div class="article_meta_primary">
											<span class="date"><?php the_time('d/m/Y'); ?></span><span class="divider">|</span><span class="author"><?php echo get_the_author(); ?></span><?php if (comments_open( get_the_ID() ) ) { ?><span class="divider">|</span><span class="comments"><a href="<?php comments_link(); ?>">комментарии (<?php comments_number('0', '1', '%'); ?>)</a></span><?php } ?><span class="divider">|</span><span class="categories"><?php the_category(', '); ?></span>
										</div> <!-- /.article_meta_primary -->
										<div class="article_content">
											<?php the_content(); ?>
											<?php edit_post_link('Редактировать', '<p class="edit_link_p">', '</p>'); ?>
										</div> <!-- /.article_content -->
										<div class="article_meta_secondary">
											<div class="meta_wrp">
												<?php if ( has_tag() ) { ?>
													<span class="tags"><?php the_tags( '', ', ', '' ); ?></span>
												<?php } ?>
											</div> <!-- /.meta_wrp -->
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
									</article> <!-- /.article_one -->

								<?php endwhile; ?>

								<?php else: ?>

									<article class="empty_post">
										<h2>Ничего не найдено!</h2>
										<p>Перейти на <a href="/">главную</a>.</p>
									</article> <!-- /.empty_post -->

								<?php endif; ?>

								<div class="similar_posts">

									<?php

									global $post;
									$related_tax = 'category';
									$cats_tags_or_taxes = wp_get_object_terms( $post->ID, $related_tax, array( 'fields' => 'ids' ) );
									$args = array(
										'posts_per_page' => 3,
										'post__not_in'   => array($post->ID),
										'tax_query' 	 => array(
											array(
												'taxonomy' => $related_tax,
												'field' => 'id',
												'include_children' => false,
												'terms' => $cats_tags_or_taxes,
												'operator' => 'IN'
											)
										)
									);

									$similar = new WP_Query( $args );
									 
									if( $similar->have_posts() ) : ?>
									 
										<h2 class="subtitle">Похожие статьи</h2>

										<ul class="list">

											<?php while ( $similar->have_posts() ) : $similar->the_post(); ?>

											<li>
												<?php if ( has_post_thumbnail() ) { ?>
												<div class="img_wrp">
													<a href="<?php the_permalink(); ?>">
														<?php the_post_thumbnail('medium_size', 'alt=' . the_title_attribute('echo=0')); ?>
													</a>
												</div> <!-- /.img_wrp -->
												<?php } ?>
												<div class="content">
													<h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
													<div class="date"><?php the_time('d/m/Y'); ?></div>
												</div> <!-- /.content -->
											</li>

											<?php endwhile; ?>

										</ul>
									 
									<?php else: ?>

										<div class="empty_articles">
											<h2 class="subtitle">Нет похожих статей!</h2>
										</div> <!-- /.empty_articles -->

									<?php endif; ?>

									<?php wp_reset_query(); ?>

								</div> <!-- /.similar_posts -->

								<?php comments_template(); ?>

								</div>
							</div>
							<div class="col-lg-3 col-md-4">
								<?php get_sidebar(); ?>
							</div>
						</div>
					</div>
				</div> <!-- /.article_page -->

				<?php setPostViews(get_the_ID()); ?>

			</div> <!-- /.inside_pages_content -->

			<?php get_footer(); ?>