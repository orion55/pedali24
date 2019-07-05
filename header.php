<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<title><?php echo wp_get_document_title(); ?></title>

		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon-32x32.png" sizes="32x32">
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon-192x192.png" sizes="192x192">
		<link rel="apple-touch-icon-precomposed" href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon-180x180.png">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/img/icons/favicon-270x270.png">
<meta name="yandex-verification" content="284755974a720511" />
<meta name='wmail-verification' content='6ab39c8869c837c5cef7787c28872b70' />
		<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(46688139, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/46688139" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

		<?php wp_head(); ?>

	</head>
	<body <?php body_class(); ?>>

		<?php $site_options_logo_light = get_field('site_options_logo_light', 'option'); ?>
		<?php $site_options_logo_dark = get_field('site_options_logo_dark', 'option'); ?>
		<?php $site_options_phone = get_field('site_options_phone', 'option'); ?>
		<?php $site_options_mail = get_field('site_options_mail', 'option'); ?>
		<?php $site_options_address = get_field('site_options_address', 'option'); ?>
		<?php $site_options_worktime = get_field('site_options_worktime', 'option'); ?>
		<?php $site_options_header_btn = get_field('site_options_header_btn', 'option'); ?>

		<header class="main_header <?php if( is_front_page() ) { echo 'main_page';} else { echo 'inside_page';} ?>" id="top">
			<div class="top_line">
				<div class="container">
					<ul class="top_contacts clearfix hidden-xs">
						<?php if( $site_options_phone ) : echo '<li><i class="zmdi zmdi-phone-in-talk"></i>'.$site_options_phone.'</li>'; endif; ?>
						<?php if( $site_options_mail ) : echo '<li class="email"><i class="zmdi zmdi-email"></i><a href="mailto:', antispambot($site_options_mail); echo '">', antispambot($site_options_mail); echo '</a></li>'; endif; ?>
						<?php if( $site_options_address ) : echo '<li class="address"><i class="zmdi zmdi-pin"></i>'.$site_options_address.'</li>'; endif; ?>
						<?php if( $site_options_worktime ) : echo '<li class="worktime"><i class="zmdi zmdi-time"></i>'.$site_options_worktime.'</li>'; endif; ?>
					</ul>
				</div>
			</div> <!-- /.top_line -->
			<div class="middle_line">
				<div class="navbar">
					<div class="sticky_nav">
						<div class="container">
							<div class="navbar_inside">
								<div class="row">
									<div class="col-lg-3 col-md-3 col-sm-4 col-xs-5">
										<div class="logo">
											<?php if( is_front_page() ) : ?>
												<?php if( (!empty($site_options_logo_light)) || (!empty($site_options_logo_dark)) ) : ?>
													<span class="logoWrp">
														<?php
															if( !empty($site_options_logo_light) ) : echo '<img src="'.$site_options_logo_light['url'].'" alt="'.get_bloginfo('name').'" class="logo_light">';
															else : echo '<b class="logo_text_light">'.get_bloginfo('name').'</b>';
															endif;
														?>
														<?php
															if( !empty($site_options_logo_dark) ) : echo '<img src="'.$site_options_logo_dark['url'].'" alt="'.get_bloginfo('name').'" class="logo_dark">';
															else : echo '<b class="logo_text_dark">'.get_bloginfo('name').'</b>';
															endif;
														?>
													</span>
												<?php endif; ?>
											<?php else : ?>
												<?php if( (!empty($site_options_logo_light)) || (!empty($site_options_logo_dark)) ) : ?>
													<a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>" class="logoWrp">
														<?php
															if( !empty($site_options_logo_light) ) : echo '<img src="'.$site_options_logo_light['url'].'" alt="'.get_bloginfo('name').'" class="logo_light">';
															else : echo '<b class="logo_text_light">'.get_bloginfo('name').'</b>';
															endif;
														?>
														<?php
															if( !empty($site_options_logo_dark) ) : echo '<img src="'.$site_options_logo_dark['url'].'" alt="'.get_bloginfo('name').'" class="logo_dark">';
															else : echo '<b class="logo_text_dark">'.get_bloginfo('name').'</b>';
															endif;
														?>
													</a>
												<?php endif; ?>
											<?php endif; ?>
										</div> <!-- /.logo -->
									</div>
									<div class="col-lg-7 col-md-6 col-sm-4 col-xs-2">
										<span class="burger">
											<span class="bar"></span>
											<span class="bar"></span>
											<span class="bar"></span>
										</span> <!-- /.burger -->
										<nav class="main_nav">
											<?php ninjatheme_nav(); ?>
										</nav> <!-- /.main_nav -->
									</div>
									<div class="col-lg-2 col-md-3 col-sm-4 col-xs-5">
										<?php if( $site_options_header_btn ) : echo '<div class="get_quote hidden_mm"><a class="btn btn_fill fancybox-inline" href="#popup_form">'.$site_options_header_btn.'</a></div>'; endif; ?>
									</div>
								</div>
							</div> <!-- /.navbar_inside -->
						</div>
					</div> <!-- /.sticky_nav -->
				</div> <!-- /.navbar -->

				<?php if( is_front_page() ) {

					if( have_rows('mp_slider') ) : 

						echo '<div class="main_slider owl-carousel">';

					    while ( have_rows('mp_slider') ) : the_row();

							$mp_slider_title = get_sub_field('mp_slider_title');
							$mp_slider_text = get_sub_field('mp_slider_text');
							$mp_slider_btn1 = get_sub_field('mp_slider_btn1');
							$mp_slider_btn1_link = get_sub_field('mp_slider_btn1_link');
							$mp_slider_btn2 = get_sub_field('mp_slider_btn2');
							$mp_slider_btn2_link = get_sub_field('mp_slider_btn2_link');
							$mp_slider_bg = get_sub_field('mp_slider_bg');

							?>

							<div class="slide">
								<div class="slide_content">
									<div class="container">
										<div class="slide_content_inside">
											<?php if( $mp_slider_title ) : echo '<h2 class="title">'.$mp_slider_title.'</h2>'; endif; ?>
											<?php if( $mp_slider_text ) : echo '<h3 class="subtitle">'.$mp_slider_text.'</h3>'; endif; ?>
											<?php if( $mp_slider_btn1 || $mp_slider_btn2 ) : ?>
												<div class="btns">
													<?php if( $mp_slider_btn1 ) : echo '<a href="'.$mp_slider_btn1_link.'" class="btn btn_empty">'.$mp_slider_btn1.'</a>'; endif; ?>
													<?php if( $mp_slider_btn2 ) : echo '<a href="'.$mp_slider_btn2_link.'" class="btn btn_fill">'.$mp_slider_btn2.'</a>'; endif; ?>
												</div> <!-- /.btns -->
											<?php endif; ?>
										</div> <!-- /.slide_content_inside -->
									</div>
								</div> <!-- /.slide_content -->
								<div class="slide_bg" <?php if( $mp_slider_bg ) : echo 'style="background-image: url(\''.$mp_slider_bg.'\');"'; endif; ?>></div>
							</div>

							<?php

					    endwhile;

					    echo '</div>';

					endif; ?>

				<?php } ?>

			</div> <!-- /.middle_line -->
		</header><!-- /.main_header -->
		<div class="main_body">
			