<?php

/**
 * Template Name: About
 */
get_header();
?>
<!-- main-area -->
<main>

    <!-- breadcrumb-area -->
    <section class="breadcrumb__area pt-100 pb-120 breadcrumb__overlay" data-background="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/banner/about-banner.jpg">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-7 col-lg-12 col-md-12 col-12">
                    <div class="tp-breadcrumb">
                        <h2 class="tp-breadcrumb__title">About us</h2>
                    </div>
                </div>
                <!-- <div class="col-xl-5 col-lg-12 col-md-12 col-12">
                <div class="tp-breadcrumb__link text-xl-end">
                <span>Bioprocess Supplies :  About us</span>
                </div>
            </div> -->
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- about-area -->
    <section class="about-area pt-130 pb-70" id="facility">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-8 col-12">
                    <div class="about-content about-align mb-60 wow fadeInRight" data-wow-delay=".3s">
                        <div class="tp-section mb-40">
                            <img src="<?php echo get_field('facility_image'); ?>" alt="banner-img" style="max-width: 100%;">
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-4 col-12">
                    <div class="about-content about-align mb-60 wow fadeInRight" data-wow-delay=".3s">
                        <div class="tp-about__info-list ab-check-list mb-55">
                            <h6 class="tp-section__title ab-title mb-25"><?php echo get_field('facility_title'); ?> </h6>
                            <p class=" mr-20 mb-40"><?php echo get_field('facility_text'); ?></p>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6 col-lg-4 col-12">
                    <div class="about-content about-align mb-60 wow fadeInRight" data-wow-delay=".3s">

                        <div class="tp-about__info-list ab-check-list mb-55">
                            <h6 class="tp-section__title ab-title mb-25"><?php echo get_field('quality_title'); ?> </h6>
                            <p class=" mr-20 mb-40"><?php echo get_field('quality_text'); ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-4 col-12">
                    <div class="about-content about-align mb-60 wow fadeInRight" data-wow-delay=".3s">
                        <div class="tp-about__info-list ab-check-list mb-55">
                            <img src="<?php echo get_field('quality_image'); ?>" alt="banner-img" style="max-width: 100%;">
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-xl-6 col-lg-4 col-12">
                    <div class="tp-about-thumb mb-60 wow fadeInLeft" data-wow-delay=".3s">
                        <div class="tp-ab-img d-flex">
                            <div class="tp-ab-main-img p-relative">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/about/about-bg1.jpg" alt="about-thumb">
                                <div class="about__exprience tp-ab-counter">
                                    <h3 class="counter_old">30</h3>
                                    <i>Years of <br>Experience</i>
                                </div>
                            </div>
                            <div class="tp-ab-shape d-none d-md-block d-lg-none d-xl-block">
                                <img class="ab-shape-one" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/about/about-tubing-3.jpg" alt="about-shape">
                                <img class="ab-shape-two" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/about/about-bg3.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-8 col-12">
                    <div class="about-content about-align mb-60 wow fadeInRight" data-wow-delay=".3s">
                        <div class="tp-section">
                            <h3 class="tp-section__title ab-title mb-25"><?php echo get_field('intro_title'); ?></h3>
                            <a class="tp-section__link"><?php echo get_field('intro_subtitle'); ?> <i class="fa-solid fa-arrow-right"></i></p>
                            <p class=" mr-20 mb-40"><?php echo get_field('intro_content'); ?></p>
                        </div>
                        <div class="tp-about__info-list ab-check-list mb-55">
                            <?php echo get_field('intro_content_2'); ?>
                        </div>
                        <?php $ctaUrl = get_field('intro_cta_url');
                        if ($ctaUrl) { ?>
                            <div class="about-content__btn"><a href="<?php echo get_field('intro_cta_url'); ?>" class="tp-btn"><?php echo get_field('intro_cta_text'); ?></a></div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- counter-area -->
    <section class="counter-area pb-100">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="counter__item <?php echo get_field('counter_box_color_1'); ?>-border mb-30 wow fadeInUp" data-wow-delay=".2s">
                        <div class="counter__icon mb-15">
                            <i></i>
                        </div>
                        <div class="counter__content">
                            <h4 class="counter__title"><span class="counter_old"><?php echo get_field('counter_value_1'); ?></span></h4>
                            <p><?php echo get_field('counter_text_1'); ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="counter__item <?php echo get_field('counter_box_color_2'); ?>-border mb-30 wow fadeInUp" data-wow-delay=".4s">
                        <div class="counter__icon <?php echo get_field('counter_box_color_2'); ?>-hard mb-15">
                            <i></i>
                        </div>
                        <div class="counter__content">
                            <h4 class="counter__title"><span class="counter_old"><?php echo get_field('counter_value_2'); ?></span></h4>
                            <p><?php echo get_field('counter_text_2'); ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="counter__item <?php echo get_field('counter_box_color_3'); ?>-border mb-30 wow fadeInUp" data-wow-delay=".6s">
                        <div class="counter__icon <?php echo get_field('counter_box_color_3'); ?>-hard mb-15">
                            <i></i>
                        </div>
                        <div class="counter__content">
                            <h4 class="counter__title"><span class="counter_old"><?php echo get_field('counter_value_3'); ?></span></h4>
                            <p><?php echo get_field('counter_text_3'); ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="counter__item <?php echo get_field('counter_box_color_4'); ?>-border mb-30 wow fadeInUp" data-wow-delay=".8s">
                        <div class="counter__icon <?php echo get_field('counter_box_color_4'); ?>-hard mb-15">
                            <i></i>
                        </div>
                        <div class="counter__content">
                            <h4 class="counter__title"><span class="counter_old"><?php echo get_field('counter_value_4'); ?></span></h4>
                            <p><?php echo get_field('counter_text_4'); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- counter-area-end -->

    <!-- choose-area -->
    <section class="choose-area theme-bg pt-120 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="tp-section text-center">
                        <span class="tp-section__sub-title left-line right-line mb-25">Our Specialists</span>
                        <h3 class="tp-section__title title-white mb-85">Why Choose Us</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="tp-choose__item ml-15 mb-100 wow fadeInUp" data-wow-delay=".2s">
                        <div class="tp-choose__icon mb-40">
                            <?php echo get_field('choose_us_point_1_icon'); ?>
                        </div>
                        <div class="tp-choose__content">
                            <h4 class="tp-choose__title mb-20"><?php echo get_field('choose_us_point_1_title'); ?></h4>
                            <p><?php echo get_field('choose_us_point_1_content'); ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="tp-choose__item ml-35 mb-100 wow fadeInUp" data-wow-delay=".4s">
                        <div class="tp-choose__icon <?php echo get_field('choose_us_point_2_icon_color'); ?>-icon mb-40">
                            <?php echo get_field('choose_us_point_2_icon'); ?>
                        </div>
                        <div class="tp-choose__content">
                            <h4 class="tp-choose__title mb-20"><?php echo get_field('choose_us_point_2_title'); ?></h4>
                            <p><?php echo get_field('choose_us_point_2_content'); ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="tp-choose__item ml-55 mb-100 wow fadeInUp" data-wow-delay=".6s">
                        <div class="tp-choose__icon <?php echo get_field('choose_us_point_3_icon_color'); ?>-icon mb-40">
                            <?php echo get_field('choose_us_point_3_icon'); ?>
                        </div>
                        <div class="tp-choose__content">
                            <h4 class="tp-choose__title mb-20"><?php echo get_field('choose_us_point_3_title'); ?></h4>
                            <p><?php echo get_field('choose_us_point_3_content'); ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="tp-choose__item ml-75 mb-100 wow fadeInUp" data-wow-delay=".8s">
                        <div class="tp-choose__icon <?php echo get_field('choose_us_point_4_icon_color'); ?>-icon mb-40">
                            <?php echo get_field('choose_us_point_4_icon'); ?>
                        </div>
                        <div class="tp-choose__content">
                            <h4 class="tp-choose__title mb-20"><?php echo get_field('choose_us_point_4_title'); ?></h4>
                            <p><?php echo get_field('choose_us_point_4_content'); ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="row text-center">
            <div class="col-lg-12">
                <div class="tp-choose-option">
                <span>Laboratories Used For Scientific Research : <a href="<?php echo get_home_url(); ?>/contact">Take Many Forms<i class="fa-solid fa-arrow-right"></i></a></span>
                </div>
            </div>
        </div> -->
        </div>
    </section>
    <!-- choose-area-end -->

    <!-- nav-tabs-area -->
    <section class="nav-area tp-common-area pt-130 pb-80" id="mission-vision">
        <div class="container">
            <!-- nab-and-tabs -->
            <ul class="nav tp-nav-tavs mb-70" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true"><?php echo get_field('section_title_our_process'); ?></button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false"><?php echo get_field('section_titleour_mission'); ?></button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false"><?php echo get_field('section_title_our_value'); ?></button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                    <span class="nav-info d-flex justify-content-center text-center mb-75"><?php echo get_field('process_section_excerpt'); ?></span>
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <div class="navtabs nav-primary p-relative text-center mb-40">
                                <div class="navtabs__icon mb-35">
                                    <?php echo get_field('process_1_icon'); ?>
                                </div>
                                <div class="navtabs__content">
                                    <h5 class="navtabs__title mb-25 mb-10"><?php echo get_field('process_1_title'); ?></h5>
                                    <p><?php echo get_field('process_1_content'); ?></p>
                                </div>
                                <div class="navtabs__shape d-none d-lg-block">
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/shape/navtabs-01.png" alt="shape">
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <div class="navtabs nav-secondary p-relative text-center mb-40">
                                <div class="navtabs__icon mb-35">
                                    <?php echo get_field('process_2_icon'); ?>
                                </div>
                                <div class="navtabs__content">
                                    <h5 class="navtabs__title mb-25 mb-10"><?php echo get_field('process_2_title'); ?></h5>
                                    <?php echo get_field('process_2_content'); ?>
                                </div>
                                <div class="navtabs__shape d-none d-lg-block">
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/shape/navtabs-01.png" alt="shape">
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <div class="navtabs nav-tertiary  text-center mb-40">
                                <div class="navtabs__icon mb-35">
                                    <?php echo get_field('process_3_icon'); ?>
                                </div>
                                <div class="navtabs__content">
                                    <h5 class="navtabs__title mb-25 mb-10"><?php echo get_field('process_3_title'); ?></h5>
                                    <p><?php echo get_field('process_3_content'); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                    <span class="nav-info d-flex justify-content-center text-center mb-75"><?php echo get_field('mission_section_excerpt'); ?></span>
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-12 order-lg-2">
                            <div class="nabmission mb-30">
                                <div class="nabmission__content text-center ml-50 mr-50 pt-20">
                                    <?php echo get_field('mission_section_content'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 order-lg-1">
                            <div class="nabthumb mb-30">
                                <img src="<?php echo get_field('mission_section_1st_image'); ?>" alt="tab-thumb">
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 order-lg-3">
                            <div class="nabthumb mb-30">
                                <img src="<?php echo get_field('mission_section_2nd_image'); ?>" alt="tab-thumb">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
                    <span class="nav-info d-flex justify-content-center text-center mb-75"><?php echo get_field('value_section_excerpt'); ?></span>
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-12 order-lg-2">
                            <div class="nabmission mb-30">
                                <div class="nabmission__content text-center ml-50 mr-50 pt-20">
                                    <?php echo get_field('value_section_content'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 order-lg-1">
                            <div class="nabthumb mb-30">
                                <img src="<?php echo get_field('value_section_1st_image'); ?>" alt="tab-thumb">
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 order-lg-3">
                            <div class="nabthumb mb-30">
                                <img src="<?php echo get_field('value_section_2nd_image'); ?>" alt="tab-thumb">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- nab-and-tabs-end -->
        </div>
    </section>
    <!-- nav-tabs-area-end -->

    <!-- team-area -->
    <section class="team-area grey-bg pt-120 pb-80" id="our_team" data-background="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/shape/shape-bg-01.png">
        <div class="container wow fadeInUp" data-wow-delay=".3s">
            <div class="row align-items-center">
                <div class="col-lg-8 col-md-8 col-12">
                    <div class="tp-section">
                        <span class="tp-section__sub-title left-line mb-25">Our Team</span>
                        <h3 class="tp-section__title mb-75">Meet the Specialists</h3>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="tp-team-arrow d-flex align-items-center">
                        <div class="team-p"><i class="fa-regular fa-arrow-left"></i></div>
                        <div class="team-n"><i class="fa-regular fa-arrow-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="swiper-container team-active">
                <div class="swiper-wrapper">
                    <?php
                    $args = array(
                        'post_type' => 'teams',
                        'post_status' => 'publish',
                        'posts_per_page' => -1,
                    );

                    $my_query = null;
                    $my_query = new WP_Query($args);
                    while ($my_query->have_posts()) : $my_query->the_post();
                        $post_id = get_the_ID();
                        $team_image = wp_get_attachment_url(get_post_thumbnail_id($post->id));
                        $designation  = get_field('designation', $post_id);
                        $bio = get_field('bio', $post_id);

                        if ($team_image == '') {
                            $team_image = get_stylesheet_directory_uri() . '/assets/img/placeholder-profile-male-500x500.webp';
                        }

                        // Using the get_field function with the third parameter 'false' to return a raw value
                        $facebook = get_field('facebook', $post_id);
                        $linkedin = get_field('linkedin', $post_id);
                        $twitter = get_field('twitter', $post_id);
                        $instagram = get_field('instagram', $post_id);
                    ?>
                        <div class="swiper-slide">
                            <div class="tp-team mb-50">
                                <div class="tp-team__thumb fix">
                                    <a href="javascript:void(0);"><img src="<?php echo $team_image; ?>" alt="team-thumb"></a>
                                </div>
                                <div class="tp-team__content">
                                    <h4 class="tp-team__title mb-15">
                                        <?= get_the_title(); ?>
                                    </h4>
                                    <span class="tp-team__position mb-30"><?php echo $designation; ?></span>
                                    <p><?php echo $bio; ?></p>
                                    <div class="tp-team__social">
                                        <?php if ($facebook) { ?>
                                            <a class="tp-fb" href="<?php echo $facebook; ?>" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
                                        <?php } ?>
                                        <?php if ($linkedin) { ?>
                                            <a class="tp-linkedin" href="<?php echo $linkedin; ?>" target="_blank"><i class="fa-brands fa-linkedin"></i></a>
                                        <?php } ?>
                                        <?php if ($twitter) { ?>
                                            <a class="tp-twitter" href="<?php echo $twitter; ?>" target="_blank"><i class="fa-brands fa-twitter"></i></a>
                                        <?php } ?>
                                        <?php if ($instagram) { ?>
                                            <a class="tp-twitter" href="<?php echo $instagram; ?>" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                                        <?php } ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata(); // Always reset the query after looping through it
                    ?>

                </div>
            </div>
        </div>
    </section>
    <!-- team-area-end -->

</main>
<!-- main-area-end -->

<?php get_footer(); ?>