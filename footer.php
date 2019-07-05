			<?php if( is_front_page() ) : ?>

				<?php if( get_field( 'site_options_marketing_mp_show', 'option' ) ) : ?>

					<?php $site_options_marketing_text = get_field( 'site_options_marketing_text', 'option' ); ?>
					<?php $site_options_marketing_btn = get_field( 'site_options_marketing_btn', 'option' ); ?>
					<?php $site_options_marketing_btn_link = get_field( 'site_options_marketing_btn_link', 'option' ); ?>
					<?php $site_options_marketing_bg = get_field( 'site_options_marketing_bg', 'option' ); ?>

					<!-- ################################## МАРКЕТИНГОВЫЙ БЛОК ######################### -->
					<div class="block_marketing">
						<div class="block_content">
							<div class="container">
								<div class="row">
									<div class="col-md-10 col-md-offset-1">
										<?php if( $site_options_marketing_text ) : echo $site_options_marketing_text; endif; ?>
										<?php if( $site_options_marketing_btn ) : echo '<a href="'.$site_options_marketing_btn_link.'" class="btn btn_empty">'.$site_options_marketing_btn.'<i class="zmdi zmdi-arrow-right"></i></a>'; endif; ?>
									</div>
								</div>
							</div>
						</div> <!-- /.block_content -->
						<div class="block_bg" <?php if( $site_options_marketing_bg ) : echo 'style="background-image: url(\''.$site_options_marketing_bg.'\');"'; endif; ?>></div>
					</div> <!-- /.block_marketing -->
					<!-- ################################## /МАРКЕТИНГОВЫЙ БЛОК ######################## -->

				<?php endif; ?>

			<?php else : ?>

				<?php if( get_field( 'site_options_marketing_ip_show', 'option' ) ) : ?>

					<?php $site_options_marketing_text = get_field( 'site_options_marketing_text', 'option' ); ?>
					<?php $site_options_marketing_btn = get_field( 'site_options_marketing_btn', 'option' ); ?>
					<?php $site_options_marketing_btn_link = get_field( 'site_options_marketing_btn_link', 'option' ); ?>
					<?php $site_options_marketing_bg = get_field( 'site_options_marketing_bg', 'option' ); ?>

					<!-- ################################## МАРКЕТИНГОВЫЙ БЛОК ######################### -->
					<div class="block_marketing">
						<div class="block_content">
							<div class="container">
								<div class="row">
									<div class="col-md-10 col-md-offset-1">
										<?php if( $site_options_marketing_text ) : echo $site_options_marketing_text; endif; ?>
										<?php if( $site_options_marketing_btn ) : echo '<a href="'.$site_options_marketing_btn_link.'" class="btn btn_empty">'.$site_options_marketing_btn.'<i class="zmdi zmdi-arrow-right"></i></a>'; endif; ?>
									</div>
								</div>
							</div>
						</div> <!-- /.block_content -->
						<div class="block_bg" <?php if( $site_options_marketing_bg ) : echo 'style="background-image: url(\''.$site_options_marketing_bg.'\');"'; endif; ?>></div>
					</div> <!-- /.block_marketing -->
					<!-- ################################## /МАРКЕТИНГОВЫЙ БЛОК ######################## -->

				<?php endif; ?>

			<?php endif ?>

		</div> <!-- /.main_body -->

		<?php $site_options_logo_light = get_field('site_options_logo_light', 'option'); ?>
		<?php $site_options_description = get_field('site_options_description', 'option'); ?>
		<?php $site_options_header_btn = get_field('site_options_header_btn', 'option'); ?>
		<?php $site_options_footer_menu1_title = get_field('site_options_footer_menu1_title', 'option'); ?>
		<?php $site_options_footer_menu2_title = get_field('site_options_footer_menu2_title', 'option'); ?>
		<?php $site_options_footer_contacts_title = get_field('site_options_footer_contacts_title', 'option'); ?>
		<?php $site_options_footer_bg = get_field('site_options_footer_bg', 'option'); ?>

		<footer class="main_footer">
			<div class="container">
				<div class="footer_content">
					<div class="row">
						<div class="col-lg-6">
							<div class="row">
								<div class="col-md-6">
									<div class="footer_about">
										<div class="footer_logo">
											<?php if( is_front_page() ) : ?>
												<?php
													if( !empty($site_options_logo_light) ) : echo '<img src="'.$site_options_logo_light['url'].'" alt="'.get_bloginfo('name').'" class="logo_light">';
													else : echo '<b class="logo_text_light">'.get_bloginfo('name').'</b>';
													endif;
												?>
											<?php else : ?>
												<?php
													if( !empty($site_options_logo_light) ) : echo '<a href="'.home_url().'" title="'.get_bloginfo('name').'"><img src="'.$site_options_logo_light['url'].'" alt="'.get_bloginfo('name').'" class="logo_light"></a>';
													else : echo '<b class="logo_text_light">'.get_bloginfo('name').'</b>';
													endif;
												?>
											<?php endif; ?>
										</div>
										<?php if( $site_options_description ) : echo '<div class="footer_description">'.$site_options_description.'</div>'; endif; ?>

										<?php if( have_rows('site_options_social', 'option') ) : 

											echo '<div class="footer_social"><ul class="social_list clearfix">';

										    while ( have_rows('site_options_social', 'option') ) : the_row();

										    	$site_options_social_name = get_sub_field('site_options_social_name');
										    	$site_options_social_link = get_sub_field('site_options_social_link');

												?>

												<?php if ( $site_options_social_name == 'vk' ) : echo '<li><a href="'.$site_options_social_link.'" target="_blank"><i class="zmdi zmdi-vk"></i></a></li>'; endif; ?>
												<?php if ( $site_options_social_name == 'fb' ) : echo '<li><a href="'.$site_options_social_link.'" target="_blank"><i class="zmdi zmdi-facebook"></i></a></li>'; endif; ?>
												<?php if ( $site_options_social_name == 'tw' ) : echo '<li><a href="'.$site_options_social_link.'" target="_blank"><i class="zmdi zmdi-youtube"></i></a></li>'; endif; ?>
												<?php if ( $site_options_social_name == 'inst' ) : echo '<li><a href="'.$site_options_social_link.'" target="_blank"><i class="zmdi zmdi-instagram"></i></a></li>'; endif; ?>

											    <?php

										    endwhile;

										    echo '</ul></div>';

										endif; ?>

									</div> <!-- /.footer_about -->
								</div>
								<div class="col-md-6">
									<?php if( has_nav_menu('footer_menu_1') ) { ?>
										<div class="footer_block">
											<?php if( $site_options_footer_menu1_title ) : echo '<h2 class="title">'.$site_options_footer_menu1_title.'</h2>'; endif; ?>
											<?php ninjatheme_footer_nav1(); ?>
										</div>
									<?php } ?>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="row">
								<div class="col-md-6">
									<?php if( has_nav_menu('footer_menu_2') ) { ?>
										<div class="footer_block">
											<?php if( $site_options_footer_menu2_title ) : echo '<h2 class="title">'.$site_options_footer_menu2_title.'</h2>'; endif; ?>
											<?php ninjatheme_footer_nav2(); ?>
										</div>
									<?php } ?>
								</div>
								<div class="col-md-6">
									<div class="footer_block">
										<?php if( $site_options_footer_contacts_title ) : echo '<h2 class="title">'.$site_options_footer_contacts_title.'</h2>'; endif; ?>

										<?php $site_options_phone = get_field('site_options_phone', 'option'); ?>
										<?php $site_options_mail = get_field('site_options_mail', 'option'); ?>
										<?php $site_options_address = get_field('site_options_address', 'option'); ?>
										<?php $site_options_worktime = get_field('site_options_worktime', 'option'); ?>

										<ul class="footer_contacts">
											<?php if( $site_options_phone ) : echo '<li class="phone">'.$site_options_phone.'</li>'; endif; ?>
											<?php if( $site_options_mail ) : echo '<li class="email"><a href="mailto:', antispambot($site_options_mail); echo '">', antispambot($site_options_mail); echo '</a></li>'; endif; ?>
											<?php if( $site_options_address ) : echo '<li class="address">'.$site_options_address.'</li>'; endif; ?>
											<?php if( $site_options_worktime ) : echo '<li class="worktime">'.$site_options_worktime.'</li>'; endif; ?>
										</ul>
									</div> <!-- /.footer_block -->
								</div>
							</div>
						</div>
					</div>
				</div> <!-- /.footer_content -->
				<div class="footer_meta">
					<div class="copy">&copy; «<?php bloginfo('name'); ?>» – <?php bloginfo('description'); ?>, <?php echo date('Y'); ?></div>
				</div> <!-- /.footer_meta -->
			</div>
		</footer> <!-- /.main_footer -->

		<div class="mm_block">
			<span class="burger">
				<span class="bar"></span>
				<span class="bar"></span>
				<span class="bar"></span>
			</span>
			<div class="mm_block_wrp">
				<nav class="mm_nav"></nav>
				<ul class="mobile_contacts hidden-lg hidden-md hidden-sm">
					<?php if( $site_options_phone ) : echo '<li>'.$site_options_phone.'</li>'; endif; ?>
					<?php if( $site_options_mail ) : echo '<li><a href="mailto:', antispambot($site_options_mail); echo '">', antispambot($site_options_mail); echo '</a></li>'; endif; ?>
					<?php if( $site_options_address ) : echo '<li>'.$site_options_address.'</li>'; endif; ?>
					<?php if( $site_options_worktime ) : echo '<li>'.$site_options_worktime.'</li>'; endif; ?>
				</ul>
				<?php if( $site_options_header_btn ) : echo '<a class="btn btn_fill visible_mm fancybox-inline" href="#popup_form">'.$site_options_header_btn.'</a>'; endif; ?>
			</div> <!-- /.mm_block_wrp -->
		</div> <!-- /.mm_block -->

		<a href="#top" class="to_top"></a>

		<div class="fancybox-hidden" style="display: none;">
			<div id="popup_form" class="popup_form">
				<h2 class="title">Оставить заявку</h2>
				<?php echo do_shortcode('[contact-form-7 id="482" title="Всплывающая форма заявки"]'); ?>
			</div> <!-- /#popup-form -->
		</div> <!-- /.fancybox-hidden -->

		<?php wp_footer(); ?>
		
	</body>
</html>
