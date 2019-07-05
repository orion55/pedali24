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

				<div class="article_page top_padding">
					<div class="container">
						<div class="section_articles_inside" role="main">

							<div class="contacts_wrp">

								<div class="contacts_data">

									<h2 class="section_title"><span class="color">«<?php bloginfo('name'); ?>»</span> – <?php bloginfo('description'); ?></h2>
									
									<?php $site_options_phone = get_field('site_options_phone', 'option'); ?>
									<?php $site_options_mail = get_field('site_options_mail', 'option'); ?>
									<?php $site_options_address = get_field('site_options_address', 'option'); ?>
									<?php $site_options_worktime = get_field('site_options_worktime', 'option'); ?>

									<ul class="contacts_list">
										<?php if( $site_options_phone ) : echo '<li class="phone"><a href="tel:', antispambot($site_options_phone); echo '">', antispambot($site_options_phone); echo '</a></li>'; endif; ?>
										<?php if( $site_options_mail ) : echo '<li class="email"><a href="mailto:', antispambot($site_options_mail); echo '">', antispambot($site_options_mail); echo '</a></li>'; endif; ?>
										<?php if( $site_options_address ) : echo '<li class="address">'.$site_options_address.'</li>'; endif; ?>
										<?php if( $site_options_worktime ) : echo '<li class="worktime">'.$site_options_worktime.'</li>'; endif; ?>
									</ul>

									<?php if( have_rows('site_options_social', 'option') ) : 

										echo '<h3 class="subtitle">Мы в социальных сетях</h3><ul class="social_list clearfix">';

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

									    echo '</ul>';

									endif; ?>

									<?php if (have_posts()): while (have_posts()) : the_post(); ?>

										<article class="article_one">
											<?php if ( has_post_thumbnail() ) { ?>
											<div class="article_thumbnail">
												<?php the_post_thumbnail('main_size', 'alt=' . the_title_attribute('echo=0')); ?>
											</div> <!-- /.article_thumbnail -->
											<?php } ?>
											<div class="article_content">
												<?php the_content(); ?>
												<?php edit_post_link('Редактировать', '<p class="edit_link_p">', '</p>'); ?>
											</div> <!-- /.article_content -->
										</article> <!-- /.article_one -->

									<?php endwhile; ?>

									<?php else: ?>

										<article class="empty_post">
											<h2>Ничего не найдено!</h2>
											<p>Перейти на <a href="/">главную</a>.</p>
										</article> <!-- /.empty_post -->

									<?php endif; ?>

								</div> <!-- /.contacts_data-->

								<div class="contacts_form">
									<div class="contacts_form_box">
										<h2 class="title">Форма обратной связи</h2>
										<?php echo do_shortcode('[contact-form-7 id="7" title="Форма обратной связи"]'); ?>
									</div> <!-- /.contacts_form_box -->
								</div> <!-- /.contacts_form -->

							</div> <!-- /.contacts_wrp -->

							<?php if( have_rows('contacts_gmap') ): ?>
								<div class="acf-map">
									<?php while ( have_rows('contacts_gmap') ) : the_row(); 

										$contacts_gmap_location = get_sub_field('contacts_gmap_location');

										?>
										<div class="map_marker" data-lat="<?php echo $contacts_gmap_location['lat']; ?>" data-lng="<?php echo $contacts_gmap_location['lng']; ?>">
											<div class="map_marker_wrp">
												<h4 class="map_title"><?php the_sub_field('contacts_gmap_title'); ?></h4>
												<p class="map_address"><?php echo $contacts_gmap_location['address']; ?></p>
												<p class="map_description"><?php the_sub_field('contacts_gmap_description'); ?></p>
											</div>
										</div>
								<?php endwhile; ?>
								</div>
							<?php endif; ?>

						</div>
					</div>
				</div> <!-- /.article_page -->

			</div> <!-- /.inside_pages_content -->

			<?php get_footer(); ?>

			<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtMm0LWOLES1BfkJOxyQ3jAKaf6S_jjFA"></script>
			<script type="text/javascript">
			(function($) {

			/*
			*  new_map
			*
			*  This function will render a Google Map onto the selected jQuery element
			*
			*  @type	function
			*  @date	8/11/2013
			*  @since	4.3.0
			*
			*  @param	$el (jQuery element)
			*  @return	n/a
			*/

			function new_map( $el ) {
				
				// var
				var $markers = $el.find('.map_marker');
				
				
				// vars
				var args = {
					zoom		: 15,
					center		: new google.maps.LatLng(0, 0),
					mapTypeId	: google.maps.MapTypeId.ROADMAP
				};
				
				
				// create map	        	
				var map = new google.maps.Map( $el[0], args);
				
				
				// add a markers reference
				map.markers = [];
				
				
				// add markers
				$markers.each(function(){
					
			    	add_marker( $(this), map );
					
				});
				
				
				// center map
				center_map( map );
				
				
				// return
				return map;
				
			}

			/*
			*  add_marker
			*
			*  This function will add a marker to the selected Google Map
			*
			*  @type	function
			*  @date	8/11/2013
			*  @since	4.3.0
			*
			*  @param	$marker (jQuery element)
			*  @param	map (Google Map object)
			*  @return	n/a
			*/

			function add_marker( $marker, map ) {

				// var
				var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

				// marker icon
				var markerImage = {
					url : '/wp-content/themes/NinjaTheme/img/pin.png'
				};

				// create marker
				var marker = new google.maps.Marker({
					icon     : markerImage,
					position : latlng,
					map		 : map
				});

				// add to array
				map.markers.push( marker );

				// if marker contains HTML, add it to an infoWindow
				if( $marker.html() )
				{
					// create info window
					var infowindow = new google.maps.InfoWindow({
						content		: $marker.html()
					});

					// show info window when marker is clicked
					google.maps.event.addListener(marker, 'click', function() {

						infowindow.open( map, marker );

					});
				}

			}

			/*
			*  center_map
			*
			*  This function will center the map, showing all markers attached to this map
			*
			*  @type	function
			*  @date	8/11/2013
			*  @since	4.3.0
			*
			*  @param	map (Google Map object)
			*  @return	n/a
			*/

			function center_map( map ) {

				// vars
				var bounds = new google.maps.LatLngBounds();

				// loop through all markers and create bounds
				$.each( map.markers, function( i, marker ){

					var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

					bounds.extend( latlng );

				});

				// only 1 marker?
				if( map.markers.length == 1 )
				{
					// set center of map
				    map.setCenter( bounds.getCenter() );
				    map.setZoom( 15 );
				}
				else
				{
					// fit to bounds
					map.fitBounds( bounds );
				}

			}

			/*
			*  document ready
			*
			*  This function will render each map when the document is ready (page has loaded)
			*
			*  @type	function
			*  @date	8/11/2013
			*  @since	5.0.0
			*
			*  @param	n/a
			*  @return	n/a
			*/
			// global var
			var map = null;

			$(document).ready(function(){

				$('.acf-map').each(function(){

					// create map
					map = new_map( $(this) );

				});

			});

			})(jQuery);
			</script>