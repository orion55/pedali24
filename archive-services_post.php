			<?php get_header(); ?>

			<div class="inside_pages_content">

				<div class="page_header">
					<div class="block_content">
						<div class="container">
							<div class="breadcrumbs">
								<?php if( function_exists('kama_breadcrumbs') ) kama_breadcrumbs(); ?>
							</div> <!-- /.breadcrumbs -->
							<h1 class="main_title"><?php post_type_archive_title(); ?></h1>
						</div>
					</div> <!-- /.block_content -->
					<?php $site_options_header_title_bg = get_field( 'site_options_header_title_bg', 'option' ); ?>
					<div class="block_bg" <?php if( $site_options_header_title_bg ) : echo 'style="background-image: url(\''.$site_options_header_title_bg.'\');"'; endif; ?>></div>
				</div> <!-- /.page_header -->

				<div role="main">
					<div class="section_services">
						<div class="container">

							<!-- Вывод Описания Раздела Услуг, если оно есть -->

							<?php $site_options_services_description = get_field( 'site_options_services_description', 'option' ); ?>
							<?php if( $site_options_services_description ) : echo '<div class="section_subtext">'.$site_options_services_description.'</div>'; endif; ?>

							<!-- Вывод Списка Категорий Услуг, если они есть -->

							<?php if ( get_terms( 'services_categories' ) ) { ?>

							<div class="cats_list services_cats_list">

							<?php

								$term_slug = get_query_var('term');
								$taxonomy = 'services_categories';
								$term = get_term_by( 'slug', $term_slug, $taxonomy );
								$termParent = ($term->parent == 0) ? $term : get_term($term->parent, $taxonomy);
								echo 'Выберите категорию:';
								wp_dropdown_categories( array(
									'class'			   => 'custom_select',
							    	'hierarchical'     => 1,
							    	'name'             => 'services_categories_list',
							    	'taxonomy'         => 'services_categories',
							    	'value_field'      => 'slug',
							    	'show_option_none' => 'Все категории'
								));

							?>

							<script>
							    $("#services_categories_list option[value='0']").val('<?php echo $termParent->slug; ?>');
							    $('#services_categories_list option[value="<?php echo $term->slug; ?>"]').prop('selected', true);
							    var dropdown = document.getElementById("services_categories_list");
							    function onCatChange() {
							        if ( dropdown.options[dropdown.selectedIndex].value != 0 ) {
							            location.href = "<?php echo get_option('home') . "/?" . $taxonomy . "="; ?>" +
							                dropdown.options[dropdown.selectedIndex].value;
							        }
							    }
							    dropdown.onchange = onCatChange;
							</script>

							</div> <!-- /.services_cats_list -->

							<?php } ?>

							<!-- Вывод Списка Услуг, если они есть -->

							<?php if ( have_posts() ) : ?>

								<div class="services_list services_list_all top_margin">

								<?php while ( have_posts() ) : the_post(); ?>

									<div class="one_service">
										<?php if ( has_post_thumbnail() ) { ?>
										<div class="img_wrp">
											<a href="<?php the_permalink(); ?>">
												<?php the_post_thumbnail('medium_size', 'alt=' . the_title_attribute('echo=0')); ?>
											</a>
										</div> <!-- /.img_wrp -->
										<?php } ?>
										<h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
										<?php if( has_excerpt() ) : ?><div class="text"><?php the_excerpt(); ?></div><?php endif; ?>
										<a href="<?php the_permalink(); ?>" class="btn btn_fill">Подробнее<i class="zmdi zmdi-arrow-right"></i></a>
									</div>
							 
							    <?php endwhile; ?>

								</div> <!-- /.services_list -->

							<?php else : ?>

								<div class="empty_archive">
									<h2>Ничего не найдено!</h2>
									<p>Перейти на <a href="/">главную</a>.</p>
								</div> <!-- /.empty_archive -->

							<?php endif; ?>

							<?php get_template_part('pagination'); ?>

						</div>
					</div> <!-- /.section_services-->

				</div>

			</div> <!-- /.inside_pages_content -->

			<?php get_footer(); ?>
