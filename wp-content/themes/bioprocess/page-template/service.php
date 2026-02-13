<?php

/**

 * Template Name: Service

 */

get_header(); ?>
<!-- main-area -->
<main>

    <!-- breadcrumb-area -->
    <section class="breadcrumb__area pt-100 pb-120 breadcrumb__overlay"
        data-background="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/banner/service-banner.jpg">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-7 col-12">
                    <div class="tp-breadcrumb">
                        <h2 class="tp-breadcrumb__title">Services</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-5 col-12">
                    <div class="tp-breadcrumb__link d-flex align-items-center">

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- services-area -->
    <section class="service services-area pt-120 pb-120 grey-bg"
        data-background="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/shape/shape-bg-01.png">
        <div class="container">
            <div class="row align-items-end  mb-45">
                <div class="col-lg-5 col-md-12 col-12">
                    <div class="tp-section">
                        <span class="tp-section__sub-title left-line mb-20">our Services</span>
                        <h3 class="tp-section__title mb-30">Service Area</h3>
                    </div>
                </div>
                <div class="col-lg-7 col-md-12 col-12">
                    <div class="services-link text-md-start text-lg-end mb-30">
                        <!-- <span>We'll ensure you always get the best results:<a href="<?php echo get_home_url(); ?>/contact">Contact us<i class="fa-solid fa-arrow-right"></i></a></span> -->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="services-thumb-box mb-30 wow fadeInLeft" data-wow-delay=".3s">
                        <div class="services-thumb-box__thumb fix fix">
                            <a href="<?php echo get_field('service_1_url'); ?>">
                                <img src="<?php echo get_field('service_1_image'); ?>" alt="services-thumb">
                            </a>
                        </div>
                        <div class="services-thumb-box__text-area d-flex">
                            <div class="services-thumb-box__content">
                                <h5 class="services-thumb-box__title"><a
                                        href="<?php echo get_field('service_1_url'); ?>"><?php echo get_field('service_1_title'); ?></a>
                                </h5>
                                <p><?php echo get_field('service_1_excerpt'); ?></p>
                                <a class="tp-btn-link" href="<?php echo get_field('service_1_url'); ?>">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="services-thumb-box pink-round mb-30 wow fadeInUp" data-wow-delay=".4s">
                        <div class="services-thumb-box__thumb fix">
                            <a href="<?php echo get_field('service_2_url'); ?>">
                                <img src="<?php echo get_field('service_2_image'); ?>" alt="services-thumb">
                            </a>
                        </div>
                        <div class="services-thumb-box__text-area d-flex">
                            <div class="services-thumb-box__content">
                                <h5 class="services-thumb-box__title"><a
                                        href="<?php echo get_field('service_2_url'); ?>"><?php echo get_field('service_2_title'); ?></a>
                                </h5>
                                <p><?php echo get_field('service_2_excerpt'); ?> </p>
                                <a class="tp-btn-link" href="<?php echo get_field('service_2_url'); ?>">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="services-thumb-box sky-round mb-30 wow fadeInRight" data-wow-delay=".3s">
                        <div class="services-thumb-box__thumb fix">
                            <a href="<?php echo get_field('service_3_url'); ?>">
                                <img src="<?php echo get_field('service_3_image'); ?>" alt="services-thumb">
                            </a>
                        </div>
                        <div class="services-thumb-box__text-area d-flex">
                            <div class="services-thumb-box__content">
                                <h5 class="services-thumb-box__title"><a
                                        href="<?php echo get_field('service_3_url'); ?>"><?php echo get_field('service_3_title'); ?></a>
                                </h5>
                                <p><?php echo get_field('service_3_excerpt'); ?></p>
                                <a class="tp-btn-link" href="<?php echo get_field('service_3_url'); ?>">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- services-area-end -->

    <!-- process-area -->
    <!-- <section class="process-area process-bg" data-background="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/banner/process-bg-01.jpg">
            <div class="container-fluid p-0 process-active">
               <div class="swiper-wrapper">
                  <div class="swiper-slide">
                     <div class="fea-box">
                        <div class="tp-process">
                           <div class="tp-process__icon mb-40">
                              <i class="flaticon-microscope"></i>
                           </div>
                           <div class="tp-process__content">
                              <h5 class="tp-process__title mb-20">High Quality <br> Services</h5>
                              <p>Nam eget dui vel quam sodales <br> semper quis porttitor tortor.</p>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="swiper-slide">
                     <div class="fea-box">
                        <div class="tp-process">
                           <div class="tp-process__icon mb-40">
                              <i class="flaticon-thinking"></i>
                           </div>
                           <div class="tp-process__content">
                              <h5 class="tp-process__title mb-20">Fast Working <br> Process</h5>
                              <p>Nam eget dui vel quam sodales <br> semper quis porttitor tortor.</p>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="swiper-slide">
                     <div class="fea-box">
                        <div class="tp-process">
                           <div class="tp-process__icon mb-40">
                              <i class="flaticon-24-hours-1"></i>
                           </div>
                           <div class="tp-process__content">
                              <h5 class="tp-process__title mb-20">24/7 Customer <br> Support</h5>
                              <p>Nam eget dui vel quam sodales <br> semper quis porttitor tortor.</p>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="swiper-slide">
                     <div class="fea-box">
                        <div class="tp-process">
                           <div class="tp-process__icon mb-40">
                              <i class="flaticon-team"></i>
                           </div>
                           <div class="tp-process__content">
                              <h5 class="tp-process__title mb-20">We have <br> Expert Team</h5>
                              <p>Nam eget dui vel quam sodales <br> semper quis porttitor tortor.</p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section> -->
    <!-- process-area-end -->

    <!-- support-area -->
    <!-- <section class="support-area grey-bg pt-125 pb-130">
            <div class="container">
               <div class="row text-center">
                  <div class="col-lg-12 col-md-12 col-12">
                     <div class="tp-section">
                        <span class="tp-section__sub-title left-line right-line mb-20">Get in touch</span>
                        <h3 class="tp-section__title mb-70">Need Any Help</h3>
                     </div>
                  </div>
               </div>
               <div class="row justify-content-center">
                  <div class="col-lg-10 col-md-12 col-12">
                     <div class="tp-support-form text-center">
                        <span>Derect Contact with us</span>
                        <form action="#">
                           <input type="text" placeholder="Enter your Name">
                           <input type="text" placeholder="Enter your Mail">
                           <textarea name="massage" placeholder="Type your massage"></textarea>
                        </form>
                        <div class="tp-support-form__btn">
                           <button class="tp-btn">Send Massage</button>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section> -->
    <!-- support-area-end -->

</main>
<!-- main-area-end -->

<?php get_footer(); ?>