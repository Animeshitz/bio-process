<?php

/**

 * Template Name: Request A Quote

 */

get_header(); ?>
<!-- main-area -->
<main>
    <!-- breadcrumb-area -->
    <section class="breadcrumb__area pt-100 pb-120 breadcrumb__overlay" data-background="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/banner/product-banner.jpg">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-7 col-12">
                    <div class="tp-breadcrumb">
                        <h2 class="tp-breadcrumb__title">Request a Quote </h2>
                    </div>
                </div>
                <!-- <div class="col-lg-6 col-md-5 col-12">
                        <div class="tp-breadcrumb__link d-flex align-items-center">
                            <span>Form </span>
                        </div>
                    </div> -->
            </div>
        </div>
    </section>

    <!-- breadcrumb-area-end -->
    <!-- <section class="coupon-area pt-130 pb-30 wow fadeInUp" data-wow-duration=".8s" data-wow-delay=".2s" style="visibility: visible; animation-duration: 0.8s; animation-delay: 0.2s; animation-name: fadeInUp;">
            <div class="container">
            <div class="row">
            </div>
         </div>
         </section> -->

    <!-- checkout-area start -->
    <section class="checkout-area  wow fadeInUp" data-wow-duration=".8s" data-wow-delay=".2s">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="contactform wow fadeInRight p-both" data-wow-delay=".4s">
                        <p class=" mr-20 mb-40"><?php echo get_field('request_quote_top'); ?></p>
                        <h3 class="contactform__title mb-35">Request Quote :</h3>
                        <div class="contactform__list mb-60">
                            <?php echo do_shortcode('[contact-form-7 id="298" title="Request Quote"]'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- checkout-area end -->
</main>

<?php get_footer(); ?>