			<?php get_header(); ?>

			<div class="inside_pages_content">

				<div class="page_header">
					<div class="block_content">
						<div class="container">
							<div class="breadcrumbs">
								<?php if( function_exists('kama_breadcrumbs') ) kama_breadcrumbs(); ?>
							</div> <!-- /.breadcrumbs -->
							<h1 class="main_title"><?php single_cat_title(); ?></h1>
						</div>
					</div> <!-- /.block_content -->
					<?php $site_options_header_title_bg = get_field( 'site_options_header_title_bg', 'option' ); ?>
					<div class="block_bg" <?php if( $site_options_header_title_bg ) : echo 'style="background-image: url(\''.$site_options_header_title_bg.'\');"'; endif; ?>></div>
				</div> <!-- /.page_header -->

				<div role="main">
					<div class="section_projects section_projects_container">
						<div class="container">

							<!-- Вывод Описания Категории Проектов, если оно есть -->
							
							<?php if (category_description()) { ?>

							<div class="section_subtext">
								<?php echo category_description(); ?>
							</div> <!-- /.section_subtext -->

							<?php } ?>

							<!-- Вывод Списка Категорий Проектов, если они есть -->

							<?php if ( get_terms( 'projects_categories' ) ) { ?>

							<div class="cats_list projects_cats_list">

							<?php

								$term_slug = get_query_var('term');
								$taxonomy = 'projects_categories';
								$term = get_term_by( 'slug', $term_slug, $taxonomy );
								$termParent = ($term->parent == 0) ? $term : get_term($term->parent, $taxonomy);
								echo 'Выберите категорию:';
								wp_dropdown_categories( array(
									'class'			   => 'custom_select',
							    	'hierarchical'     => 1,
							    	'name'             => 'projects_categories_list',
							    	'taxonomy'         => 'projects_categories',
							    	'value_field'      => 'slug'
								));

							?>

							<script>
							    $("#projects_categories_list option[value='0']").val('<?php echo $termParent->slug; ?>');
							    $('#projects_categories_list option[value="<?php echo $term->slug; ?>"]').prop('selected', true);
							    var dropdown = document.getElementById("projects_categories_list");
							    function onCatChange() {
							        if ( dropdown.options[dropdown.selectedIndex].value != 0 ) {
							            location.href = "<?php echo get_option('home') . "/?" . $taxonomy . "="; ?>" +
							                dropdown.options[dropdown.selectedIndex].value;
							        }
							    }
							    dropdown.onchange = onCatChange;
							</script>

							</div> <!-- /.projects_cats_list -->

							<?php } ?>

							<!-- Вывод Списка Проектов, если они есть -->

							<?php if ( have_posts() ) : ?>

								<div class="projects_list projects_list_all top_margin">

								<?php while ( have_posts() ) : the_post(); ?>

									<div class="one_project">
										<?php if ( has_post_thumbnail() ) { ?>
										<div class="img_wrp">
											<?php the_post_thumbnail('medium_size_square', 'alt=' . the_title_attribute('echo=0')); ?>
										</div> <!-- /.img_wrp -->
										<?php } ?>
										<div class="content_wrp">
											<div class="content_inside">
												<div class="btns">
													<a href="<?php the_permalink(); ?>" class="link"></a>
													<?php if ( has_post_thumbnail() ) {
														$thumb_attr = wp_get_attachment_image_src( get_post_thumbnail_id(), 'main_size' );
														echo '<a href="'.$thumb_attr[0].'" class="zoom"></a>';
													} ?>
												</div> <!-- /.btns -->
												<h3 class="project_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
												<?php if ( has_term( '', 'projects_categories' ) ) { ?>
												<h4 class="project_cat">
													<?php the_terms( $post->ID, 'projects_categories' ); ?>
												</h4>
												<?php } ?>
											</div> <!-- /.content_inside -->
										</div> <!-- /.content_wrp -->
									</div>
							 
							    <?php endwhile; ?>

								</div> <!-- /.projects_list -->

							<?php else : ?>

								<div class="empty_cat">
									<h2>Ничего не найдено!</h2>
									<p>Перейти на <a href="/">главную</a>.</p>
								</div> <!-- /.empty_cat -->

							<?php endif; ?>

							<?php get_template_part('pagination'); ?>

						</div>
					</div> <!-- /.section_projects-->

				</div>

			</div> <!-- /.inside_pages_content -->

			<?php get_footer(); ?>
