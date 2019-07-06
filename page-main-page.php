<?php get_header(); ?>

<?php if (get_field('mp_promo_show')) : ?>

    <?php $mp_promo_text = get_field('mp_promo_text'); ?>
    <?php $mp_promo_btn = get_field('mp_promo_btn'); ?>
    <?php $mp_promo_btn_link = get_field('mp_promo_btn_link'); ?>

    <!-- ################################## ПРОМО-БЛОК ################################## -->
    <div class="block_promo">
        <div class="container">
            <div class="content">
                <?php if ($mp_promo_text) : echo '<div class="text">' . $mp_promo_text . '</div>'; endif; ?>
                <?php if ($mp_promo_btn) : echo '<div class="get_quote"><a href="' . $mp_promo_btn_link . '" class="btn btn_fill">' . $mp_promo_btn . '<i class="zmdi zmdi-arrow-right"></i></a></div>'; endif; ?>
            </div> <!-- /.content -->
        </div>
    </div> <!-- /.block_promo -->
    <!-- ################################## /ПРОМО-БЛОК ################################# -->

<?php endif; ?>

<?php if (get_field('mp_about_show')) : ?>

    <?php $mp_about_suptitle = get_field('mp_about_suptitle'); ?>
    <?php $mp_about_title = get_field('mp_about_title'); ?>
    <?php $mp_about_text = get_field('mp_about_text'); ?>
    <?php $mp_about_btn = get_field('mp_about_btn'); ?>
    <?php $mp_about_btn_link = get_field('mp_about_btn_link'); ?>
    <?php $mp_about_img1 = get_field('mp_about_img1'); ?>
    <?php $mp_about_img2 = get_field('mp_about_img2'); ?>

    <!-- ################################## О КОМПАНИИ ################################## -->
    <section class="section section_about">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <div class="content">
                        <?php if ($mp_about_suptitle || $mp_about_title) : echo '<h1 class="mainH1">'; ?>
                            <?php if ($mp_about_suptitle) : echo '<span class="section_suptitle">' . $mp_about_suptitle . '</span>'; endif; ?>
                            <?php if ($mp_about_title) : echo '<span class="section_title">' . $mp_about_title . '</span>'; endif; ?>
                            <?php echo '</h1>'; endif; ?>
                        <?php if ($mp_about_text) : echo '<div class="text">' . $mp_about_text . '</div>'; endif; ?>
                        <?php if ($mp_about_btn) : echo '<a href="' . $mp_about_btn_link . '" class="btn btn_fill">' . $mp_about_btn . '<i class="zmdi zmdi-arrow-right"></i></a>'; endif; ?>
                    </div> <!-- /.content -->
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="photos clearfix">
                        <?php if (!empty($mp_about_img1)) : echo '<div class="img_wrp img1_wrp"><img src="' . $mp_about_img1['sizes']['medium_size_square_sm'] . '" alt="' . $mp_about_img1['alt'] . '"></div>'; endif; ?>
                        <?php if (!empty($mp_about_img2)) : echo '<div class="img_wrp img2_wrp"><img src="' . $mp_about_img2['sizes']['medium_size_square_sm'] . '" alt="' . $mp_about_img2['alt'] . '"></div>'; endif; ?>
                    </div> <!-- /.photos -->
                </div>
            </div>
        </div>
    </section> <!-- /.section_about -->
    <!-- ################################## /О КОМПАНИИ ################################# -->

<?php endif; ?>

<?php if (get_field('mp_services_show')) : ?>

    <?php $mp_services_suptitle = get_field('mp_services_suptitle'); ?>
    <?php $mp_services_title = get_field('mp_services_title'); ?>
    <?php $mp_services_description = get_field('mp_services_description'); ?>

    <!-- ################################## ВИДЫ УСЛУГ ################################## -->
    <section class="section section_services section_bg section_carousel">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-md-10 col-sm-10">
                    <?php if ($mp_services_suptitle) : echo '<h3 class="section_suptitle">' . $mp_services_suptitle . '</h3>'; endif; ?>
                    <?php if ($mp_services_title) : echo '<h2 class="section_title">' . $mp_services_title . '</h2>'; endif; ?>
                    <?php if ($mp_services_description) : echo '<div class="section_subtext">' . $mp_services_description . '</div>'; endif; ?>
                </div>
            </div>
            <div class="common_carousel_wrp">

                <!-- Вывод услуг в слайдер -->

                <?php $services = new WP_Query(array('posts_per_page' => 6, 'post_type' => 'services_post'));

                if ($services->have_posts()) : ?>

                    <div class="carousel_nav carousel_nav_services"></div>
                    <div class="services_list services_list_carousel owl-carousel">

                        <?php while ($services->have_posts()) : $services->the_post(); ?>

                            <div class="one_service">
                                <?php if (has_post_thumbnail()) { ?>
                                    <div class="img_wrp">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail('medium_size', 'alt=' . the_title_attribute('echo=0')); ?>
                                        </a>
                                    </div> <!-- /.img_wrp -->
                                <?php } ?>
                                <h3 class="title"><a
                                            href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h3>
                                <?php if (has_excerpt()) : ?>
                                    <div class="text"><?php the_excerpt(); ?></div><?php endif; ?>
                                <a href="<?php the_permalink(); ?>" class="btn btn_fill">Подробнее<i
                                            class="zmdi zmdi-arrow-right"></i></a>
                            </div>

                        <?php endwhile; ?>

                    </div> <!-- /.services_list -->

                <?php else: ?>

                    <div class="empty_archive">
                        <h2>Нет услуг для отображения!</h2>
                    </div> <!-- /.empty_archive -->

                <?php endif; ?>

                <?php wp_reset_query(); ?>

            </div> <!-- /.common_carousel_wrp -->
        </div>
    </section> <!-- /.section_services-->
    <!-- ################################## /ВИДЫ УСЛУГ ################################# -->

<?php endif; ?>

<?php if (get_field('mp_projects_show')) : ?>

    <?php $mp_projects_suptitle = get_field('mp_projects_suptitle'); ?>
    <?php $mp_projects_title = get_field('mp_projects_title'); ?>
    <?php $mp_projects_description = get_field('mp_projects_description'); ?>
    <?php $mp_projects_bg = get_field('mp_projects_bg'); ?>

    <!-- ################################## НАШИ ПРОЕКТЫ ################################ -->
    <section
            class="section section_projects section_projects_wide section_dark section_carousel" <?php if ($mp_projects_bg) : echo 'style="background-image: url(\'' . $mp_projects_bg . '\');"'; endif; ?>>
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-md-10 col-sm-10">
                    <?php if ($mp_projects_suptitle) : echo '<h3 class="section_suptitle">' . $mp_projects_suptitle . '</h3>'; endif; ?>
                    <?php if ($mp_projects_title) : echo '<h2 class="section_title">' . $mp_projects_title . '</h2>'; endif; ?>
                    <?php if ($mp_projects_description) : echo '<div class="section_subtext">' . $mp_projects_description . '</div>'; endif; ?>
                </div>
            </div>
        </div>
        <div class="common_carousel_wrp">

            <!-- Вывод проектов в слайдер -->

            <?php $projects = new WP_Query(array('posts_per_page' => 6, 'post_type' => 'projects_post'));

            if ($projects->have_posts()) : ?>

                <div class="carousel_nav carousel_nav_projects"></div>
                <div class="projects_list projects_list_carousel owl-carousel">

                    <?php while ($projects->have_posts()) : $projects->the_post(); ?>

                        <div class="one_project">
                            <?php if (has_post_thumbnail()) { ?>
                                <div class="img_wrp">
                                    <?php the_post_thumbnail('medium_size_square', 'alt=' . the_title_attribute('echo=0')); ?>
                                </div> <!-- /.img_wrp -->
                            <?php } ?>
                            <div class="content_wrp">
                                <div class="content_inside">
                                    <div class="btns">
                                        <a href="<?php the_permalink(); ?>" class="link"></a>
                                        <?php if (has_post_thumbnail()) {
                                            $thumb_attr = wp_get_attachment_image_src(get_post_thumbnail_id(), 'main_size');
                                            echo '<a href="' . $thumb_attr[0] . '" class="zoom"></a>';
                                        } ?>
                                    </div> <!-- /.btns -->
                                    <h3 class="project_title"><a
                                                href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h3>
                                    <?php if (has_term('', 'projects_categories')) { ?>
                                        <h4 class="project_cat">
                                            <?php the_terms($post->ID, 'projects_categories'); ?>
                                        </h4>
                                    <?php } ?>
                                </div> <!-- /.content_inside -->
                            </div> <!-- /.content_wrp -->
                        </div>

                    <?php endwhile; ?>

                </div> <!-- /.projects_list -->

            <?php else: ?>

                <div class="empty_archive">
                    <h2>Нет проектов для отображения!</h2>
                </div> <!-- /.empty_archive -->

            <?php endif; ?>

            <?php wp_reset_query(); ?>

        </div> <!-- /.common_carousel_wrp -->
    </section> <!-- /.section_projects -->
    <!-- ################################## /НАШИ ПРОЕКТЫ ############################### -->

<?php endif; ?>

<?php if (get_field('mp_advantages_show')) : ?>

    <?php $mp_advantages_suptitle = get_field('mp_advantages_suptitle'); ?>
    <?php $mp_advantages_title = get_field('mp_advantages_title'); ?>
    <?php $mp_advantages_description = get_field('mp_advantages_description'); ?>
    <?php $mp_advantages_bg = get_field('mp_advantages_bg'); ?>

    <!-- ################################## НАШИ ПРЕИМУЩЕСТВА ########################### -->
    <section class="section section_advantages">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <?php if ($mp_advantages_suptitle) : echo '<h3 class="section_suptitle">' . $mp_advantages_suptitle . '</h3>'; endif; ?>
                    <?php if ($mp_advantages_title) : echo '<h2 class="section_title">' . $mp_advantages_title . '</h2>'; endif; ?>
                    <?php if ($mp_advantages_description) : echo '<div class="section_subtext">' . $mp_advantages_description . '</div>'; endif; ?>

                    <?php if (have_rows('mp_advantages_one')) :

                        echo '<ul class="advantages_list">';
                        $i = 1;

                        while (have_rows('mp_advantages_one')) : the_row();

                            $mp_advantages_one_icon = get_sub_field('mp_advantages_one_icon');
                            $mp_advantages_one_text = get_sub_field('mp_advantages_one_text');

                            ?>

                            <li class="one_advantage">
                                <div class="advantage_wrp">
                                    <?php if (!empty($mp_advantages_one_icon)) : echo '<div class="img_wrp"><img src="' . $mp_advantages_one_icon['sizes']['small_size_square'] . '" alt="Преимущество ' . $i . '"></div>'; endif; ?>
                                    <?php if ($mp_advantages_one_text) : echo '<div class="text">' . $mp_advantages_one_text . '</div>'; endif; ?>
                                </div> <!-- /.advantage_wrp -->
                            </li>

                            <?php

                            $i++;
                        endwhile;

                        echo '</ul>';

                    endif; ?>

                </div>
            </div>
        </div>
        <div class="side_bg" <?php if ($mp_advantages_bg) : echo 'style="background-image: url(\'' . $mp_advantages_bg . '\');"'; endif; ?>></div>
    </section> <!-- /.section_advantages -->
    <!-- ################################## /НАШИ ПРЕИМУЩЕСТВА ########################## -->

<?php endif; ?>

<?php if (get_field('mp_team_show')) : ?>

    <?php $mp_team_suptitle = get_field('mp_team_suptitle'); ?>
    <?php $mp_team_title = get_field('mp_team_title'); ?>
    <?php $mp_team_description = get_field('mp_team_description'); ?>

    <!-- ################################## НАША КОМАНДА ################################ -->
    <section class="section section_team section_bg section_carousel">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 col-sm-10">
                    <?php if ($mp_team_suptitle) : echo '<h3 class="section_suptitle">' . $mp_team_suptitle . '</h3>'; endif; ?>
                    <?php if ($mp_team_title) : echo '<h2 class="section_title">' . $mp_team_title . '</h2>'; endif; ?>
                    <?php if ($mp_team_description) : echo '<div class="section_subtext">' . $mp_team_description . '</div>'; endif; ?>
                </div>
            </div>
            <div class="common_carousel_wrp">

                <div class="carousel_nav carousel_nav_team"></div>

                <?php if (have_rows('mp_team_one')) :

                    echo '<div class="team_list owl-carousel">';

                    while (have_rows('mp_team_one')) : the_row();

                        $mp_team_one_photo = get_sub_field('mp_team_one_photo');
                        $mp_team_one_name = get_sub_field('mp_team_one_name');
                        $mp_team_one_job = get_sub_field('mp_team_one_job');
                        $mp_team_one_about = get_sub_field('mp_team_one_about');
                        $mp_team_one_social = get_sub_field('mp_team_one_social');

                        ?>

                        <div class="one_team">
                            <div class="one_team_wrp">
                                <?php if (!empty($mp_team_one_photo)) : echo '<div class="img_wrp"><img src="' . $mp_team_one_photo['sizes']['medium_size_square_sm'] . '" alt="' . $mp_team_one_name . '"></div>'; endif; ?>
                                <div class="content">
                                    <div class="description">
                                        <?php if ($mp_team_one_name) : echo '<div class="name">' . $mp_team_one_name . '</div>'; endif; ?>
                                        <?php if ($mp_team_one_job) : echo '<div class="job">' . $mp_team_one_job . '</div>'; endif; ?>
                                        <?php if ($mp_team_one_about) : echo '<div class="about">' . $mp_team_one_about . '</div>'; endif; ?>
                                    </div> <!-- /.description -->

                                    <?php if (have_rows('mp_team_one_social')) :

                                        echo '<div class="social"><ul class="social_list clearfix">';

                                        while (have_rows('mp_team_one_social')) : the_row();

                                            $mp_team_one_social_name = get_sub_field('mp_team_one_social_name');
                                            $mp_team_one_social_link = get_sub_field('mp_team_one_social_link');

                                            ?>

                                            <?php if ($mp_team_one_social_name == 'vk') : echo '<li><a href="' . $mp_team_one_social_link . '" target="_blank"><i class="zmdi zmdi-vk"></i></a></li>'; endif; ?>
                                            <?php if ($mp_team_one_social_name == 'fb') : echo '<li><a href="' . $mp_team_one_social_link . '" target="_blank"><i class="zmdi zmdi-facebook"></i></a></li>'; endif; ?>
                                            <?php if ($mp_team_one_social_name == 'tw') : echo '<li><a href="' . $mp_team_one_social_link . '" target="_blank"><i class="zmdi zmdi-twitter"></i></a></li>'; endif; ?>
                                            <?php if ($mp_team_one_social_name == 'inst') : echo '<li><a href="' . $mp_team_one_social_link . '" target="_blank"><i class="zmdi zmdi-instagram"></i></a></li>'; endif; ?>

                                        <?php

                                        endwhile;

                                        echo '</ul></div>';

                                    endif; ?>

                                </div> <!-- /.content -->
                            </div> <!-- /.one_team_wrp -->
                        </div>

                    <?php

                    endwhile;

                    echo '</div>';

                endif; ?>

            </div> <!-- /.common_carousel_wrp -->
        </div>
    </section> <!-- /.section_team -->
    <!-- ################################## /НАША КОМАНДА ############################### -->

<?php endif; ?>

<?php if (get_field('mp_numbers_show')) : ?>

    <?php $mp_numbers_title = get_field('mp_numbers_title'); ?>
    <?php $mp_numbers_bg = get_field('mp_numbers_bg'); ?>

    <!-- ################################## ФАКТЫ В ЦИФРАХ ############################## -->
    <section class="section section_numbers">
        <div class="section_content">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <?php if ($mp_numbers_title) : echo '<h2 class="section_title">' . $mp_numbers_title . '</h2>'; endif; ?>
                    </div>
                </div>

                <?php if (have_rows('mp_numbers_one')) :

                    echo '<div class="row">';
                    $j = 1;

                    while (have_rows('mp_numbers_one')) : the_row();

                        $mp_numbers_one_value = get_sub_field('mp_numbers_one_value');
                        $mp_numbers_one_text = get_sub_field('mp_numbers_one_text');

                        ?>

                        <div class="col-md-4">
                            <div class="number_wrp">
                                <?php if ($mp_numbers_one_value) : echo '<div class="number"><div class="number' . $j . '" id="number' . $j . '" data-num="' . $mp_numbers_one_value . '">0</div></div>'; endif; ?>
                                <div class="plus">+</div>
                                <?php if ($mp_numbers_one_text) : echo '<div class="text"><span class="offset">' . $mp_numbers_one_text . '</span></div>'; endif; ?>
                            </div> <!-- /.number_wrp -->
                        </div>

                        <?php

                        $j++;
                    endwhile;

                    echo '</div>';

                endif; ?>

            </div>
        </div> <!-- /.section_content -->
        <div class="section_bg" <?php if ($mp_numbers_bg) : echo 'style="background-image: url(\'' . $mp_numbers_bg . '\');"'; endif; ?>></div>
    </section> <!-- /.section_numbers -->
    <!-- ################################## /ФАКТЫ В ЦИФРАХ ############################# -->

<?php endif; ?>

<?php if (get_field('mp_testimonials_show')) : ?>

    <?php $mp_testimonials_suptitle = get_field('mp_testimonials_suptitle'); ?>
    <?php $mp_testimonials_title = get_field('mp_testimonials_title'); ?>
    <?php $mp_testimonials_description = get_field('mp_testimonials_description'); ?>

    <!-- ################################## ОТЗЫВЫ КЛИЕНТОВ ############################# -->
    <section class="section section_testimonials section_carousel">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 col-sm-10">
                    <?php if ($mp_testimonials_suptitle) : echo '<h3 class="section_suptitle">' . $mp_testimonials_suptitle . '</h3>'; endif; ?>
                    <?php if ($mp_testimonials_title) : echo '<h2 class="section_title">' . $mp_testimonials_title . '</h2>'; endif; ?>
                    <?php if ($mp_testimonials_description) : echo '<div class="section_subtext">' . $mp_testimonials_description . '</div>'; endif; ?>
                </div>
            </div>
            <div class="common_carousel_wrp">
                <div class="carousel_nav carousel_nav_testimonials"></div>

                <?php if (have_rows('mp_testimonials_one')) :

                    echo '<div class="testimonials_list owl-carousel">';

                    while (have_rows('mp_testimonials_one')) : the_row();

                        $mp_testimonials_one_title = get_sub_field('mp_testimonials_one_title');
                        $mp_testimonials_one_text = get_sub_field('mp_testimonials_one_text');
                        $mp_testimonials_one_rate = get_sub_field('mp_testimonials_one_rate');
                        $mp_testimonials_one_photo = get_sub_field('mp_testimonials_one_photo');
                        $mp_testimonials_one_name = get_sub_field('mp_testimonials_one_name');
                        $mp_testimonials_one_job = get_sub_field('mp_testimonials_one_job');

                        ?>

                        <div class="one_testimonial">
                            <div class="testimonial_content">
                                <?php if ($mp_testimonials_one_title) : echo '<h3 class="title">' . $mp_testimonials_one_title . '</h3>'; endif; ?>
                                <?php if ($mp_testimonials_one_text) : echo '<div class="text">' . $mp_testimonials_one_text . '</div>'; endif; ?>
                                <?php if ($mp_testimonials_one_rate) : ?>
                                    <ul class="rate_list">
                                        <?php if ($mp_testimonials_one_rate == 'one') : echo '<li><i class="zmdi zmdi-star"></i></li>'; endif; ?>
                                        <?php if ($mp_testimonials_one_rate == 'two') : echo str_repeat('<li><i class="zmdi zmdi-star"></i></li>', 2); endif; ?>
                                        <?php if ($mp_testimonials_one_rate == 'three') : echo str_repeat('<li><i class="zmdi zmdi-star"></i></li>', 3); endif; ?>
                                        <?php if ($mp_testimonials_one_rate == 'four') : echo str_repeat('<li><i class="zmdi zmdi-star"></i></li>', 4); endif; ?>
                                        <?php if ($mp_testimonials_one_rate == 'five') : echo str_repeat('<li><i class="zmdi zmdi-star"></i></li>', 5); endif; ?>
                                    </ul>
                                <?php endif; ?>
                            </div> <!-- /.testimonial_content -->
                            <div class="testimonial_meta">
                                <?php if (!empty($mp_testimonials_one_photo)) : echo '<div class="photo_wrp"><img src="' . $mp_testimonials_one_photo['sizes']['thumbnail'] . '" alt="' . $mp_testimonials_one_name . '"></div>'; endif; ?>
                                <div class="person">
                                    <?php if ($mp_testimonials_one_name) : echo '<span class="name">' . $mp_testimonials_one_name . '</span>'; endif; ?>
                                    <?php if ($mp_testimonials_one_job) : echo ',<br><span class="job">' . $mp_testimonials_one_job . '</span>'; endif; ?>
                                </div>
                            </div> <!-- /.testimonial_meta -->
                        </div>

                    <?php

                    endwhile;

                    echo '</div>';

                endif; ?>

            </div> <!-- /.common_carousel_wrp -->
        </div>
    </section> <!-- /.section_testimonials -->
    <!-- ################################## /ОТЗЫВЫ КЛИЕНТОВ ############################ -->

<?php endif; ?>

<?php if (get_field('mp_faq_show')) : ?>

    <?php $mp_faq_suptitle = get_field('mp_faq_suptitle'); ?>
    <?php $mp_faq_title = get_field('mp_faq_title'); ?>
    <?php $mp_faq_description = get_field('mp_faq_description'); ?>
    <?php $mp_faq_note = get_field('mp_faq_note'); ?>
    <?php $mp_faq_bg = get_field('mp_faq_bg'); ?>

    <!-- ################################## F.A.Q. ###################################### -->
    <section class="section section_faq">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-lg-offset-4 col-md-offset-4">
                    <?php if ($mp_faq_suptitle) : echo '<h3 class="section_suptitle">' . $mp_faq_suptitle . '</h3>'; endif; ?>
                    <?php if ($mp_faq_title) : echo '<h2 class="section_title">' . $mp_faq_title . '</h2>'; endif; ?>
                    <?php if ($mp_faq_description) : echo '<div class="section_subtext">' . $mp_faq_description . '</div>'; endif; ?>

                    <?php if (have_rows('mp_faq_one')) :

                        echo '<div id="faq_accordion" class="faq_accordion">';

                        while (have_rows('mp_faq_one')) : the_row();

                            $mp_faq_one_question = get_sub_field('mp_faq_one_question');
                            $mp_faq_one_answer = get_sub_field('mp_faq_one_answer');

                            ?>

                            <?php if ($mp_faq_one_question) : echo '<h4 class="question">' . $mp_faq_one_question . '</h4>'; endif; ?>
                            <?php if ($mp_faq_one_answer) : echo '<div class="answer">' . $mp_faq_one_answer . '</div>'; endif; ?>

                        <?php

                        endwhile;

                        echo '</div>';

                    endif; ?>

                    <?php if ($mp_faq_note) : echo '<div class="note">' . $mp_faq_note . '</div>'; endif; ?>
                </div>
            </div>
        </div>
        <div class="side_bg" <?php if ($mp_faq_bg) : echo 'style="background-image: url(\'' . $mp_faq_bg . '\');"'; endif; ?>></div>
    </section> <!-- /.section_advantages -->
    <!-- ################################## /F.A.Q. ##################################### -->

<?php endif; ?>

<?php if (get_field('mp_partners_show')) : ?>

    <!-- ################################## ПАРТНЕРЫ #################################### -->
    <div class="block_partners section_bg section_carousel">
        <div class="container">
            <div class="common_carousel_wrp">

                <?php if (have_rows('mp_partners_one')) :

                    echo '<div class="partners_list owl-carousel">';
                    $k = 1;

                    while (have_rows('mp_partners_one')) : the_row();

                        $mp_partners_one_logo = get_sub_field('mp_partners_one_logo');
                        $mp_partners_one_link = get_sub_field('mp_partners_one_link');

                        ?>

                        <div class="one_partner">
                            <a <?php if ($mp_partners_one_link) : echo 'href="' . $mp_partners_one_link . '"'; else : echo ''; endif; ?>
                                    target="_blank">
                                <?php if (!empty($mp_partners_one_logo)) : echo '<span class="img_wrp"><img src="' . $mp_partners_one_logo['sizes']['medium'] . '" alt="Партнер ' . $k . '" class="grayscale grayscale-fade"></span>'; endif; ?>
                            </a>
                        </div>

                        <?php

                        $k++;
                    endwhile;

                    echo '</div>';

                endif; ?>

            </div> <!-- /.common_carousel_wrp -->
        </div>
    </div> <!-- /.block_partners -->
    <!-- ################################## /ПАРТНЕРЫ ################################### -->

<?php endif; ?>

<?php if (get_field('mp_blog_show')) : ?>

    <?php $mp_blog_suptitle = get_field('mp_blog_suptitle'); ?>
    <?php $mp_blog_title = get_field('mp_blog_title'); ?>
    <?php $mp_blog_description = get_field('mp_blog_description'); ?>
    <?php $mp_blog_btn = get_field('mp_blog_btn'); ?>

    <!-- ################################## СТАТЬИ ###################################### -->
    <section class="section section_articles section_articles_mp">
        <div class="container">
            <div class="section_head">
                <div class="section_head_title">
                    <?php if ($mp_blog_suptitle) : echo '<h3 class="section_suptitle">' . $mp_blog_suptitle . '</h3>'; endif; ?>
                    <?php if ($mp_blog_title) : echo '<h2 class="section_title">' . $mp_blog_title . '</h2>'; endif; ?>
                </div> <!-- /.section_head_title -->
                <div class="section_head_btn <?php if (!($mp_blog_suptitle)) : echo 'big_offset'; endif; ?>">
                    <?php if ($mp_blog_btn) : ?>
                        <a href="<?php echo get_permalink(get_option('page_for_posts')) ?>"
                           class="btn btn_empty"><?php echo $mp_blog_btn; ?><i
                                    class="zmdi zmdi-arrow-right"></i></a>
                    <?php endif; ?>
                </div> <!-- /.section_head_btn -->
            </div> <!-- /.section_head -->
            <?php if ($mp_blog_description) : echo '<div class="section_subtext">' . $mp_blog_description . '</div>'; endif; ?>

            <!-- Вывод последних статей -->

            <?php $articles = new WP_Query(array('posts_per_page' => 3, 'post_type' => 'post'));

            if ($articles->have_posts()) : ?>

                <ul class="articles_list articles_list_view1">

                    <?php while ($articles->have_posts()) : $articles->the_post(); ?>

                        <li class="one_article">
                            <?php if (has_post_thumbnail()) { ?>
                                <div class="img_wrp">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('medium_size', 'alt=' . the_title_attribute('echo=0')); ?>
                                    </a>
                                </div> <!-- /.img_wrp -->
                            <?php } ?>
                            <div class="content">
                                <h3 class="title"><a
                                            href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h3>
                                <div class="meta">
                                    <span class="date"><?php the_time('d/m/Y'); ?></span><span
                                            class="divider">|</span><span
                                            class="author"><?php echo get_the_author(); ?></span><?php if (comments_open(get_the_ID())) { ?>
                                        <span class="divider">|</span><span class="comments"><a
                                                href="<?php comments_link(); ?>">комментарии (<?php comments_number('0', '1', '%'); ?>)</a>
                                        </span><?php } ?><span class="divider">|</span><span
                                            class="categories"><?php the_category(', '); ?></span>
                                </div> <!-- /.meta -->
                                <div class="anons">
                                    <?php the_content(''); ?>
                                </div> <!-- /.anons -->
                            </div> <!-- /.content -->
                        </li>

                    <?php endwhile; ?>

                </ul> <!-- /.articles_list -->

            <?php else: ?>

                <div class="empty_articles">
                    <h2>Нет статей для отображения!</h2>
                </div> <!-- /.empty_articles -->

            <?php endif; ?>

            <?php wp_reset_query(); ?>

        </div>
    </section> <!-- /.section_articles -->
    <!-- ################################## /СТАТЬИ ##################################### -->

<?php endif; ?>

<?php get_footer(); ?>
