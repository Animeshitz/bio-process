<?php

/**

 * Template Name:  Submit Sketch

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
                        <p class=" mr-20 mb-40"><?php echo get_field('submit_sketch_top'); ?></p>
                        <h2 class="tp-breadcrumb__title">Submit a Sketch </h2>
                    </div>
                </div>

            </div>
        </div>
    </section>



    <!-- checkout-area start -->
    <section class="checkout-area  wow fadeInUp" data-wow-duration=".8s" data-wow-delay=".2s">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="contactform wow fadeInRight p-both" data-wow-delay=".4s">
                        <h3 class="contactform__title mb-35">Submit a Sketch :</h3>
                        <div class="contactform__list mb-60">
                            <?php echo do_shortcode('[contact-form-7 id="357" title="Drawing"]'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- checkout-area end -->
</main>

<?php get_footer(); ?>