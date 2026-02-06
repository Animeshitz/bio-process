<?php

/**

 * Template Name: Submit Project

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
                        <h2 class="tp-breadcrumb__title">Submit a Design or Project</h2>
                    </div>
                </div>
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
                    <div class="wow fadeInRight p-both" data-wow-delay=".4s">
                        <p class=" mr-20 mb-40"><?php echo get_field('design_submission_top'); ?></p>
                        <?php echo do_shortcode('[contact-form-7 id="294" title="Project Submit"]'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- checkout-area end -->
</main>

<?php get_footer(); ?>