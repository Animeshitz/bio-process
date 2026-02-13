<?php 

/**

 * Template Name: Resources

 */

get_header();

?>

<!-- main-area -->

<main class="resource-page">



    <!-- breadcrumb-area -->

    <!-- <section class="breadcrumb__area pt-100 pb-120 breadcrumb__overlay" data-background="<?php echo get_stylesheet_directory_uri() ;?>/assets/img/banner/about-banner.jpg">-->
    <section class="breadcrumb__area pt-100 pb-120 breadcrumb__overlay">

        <div class="container">

            <div class="row align-items-center">

                <div class="col-xl-7 col-lg-12 col-md-12 col-12">

                    <div class="tp-breadcrumb">

                        <h2 class="tp-breadcrumb__title">Resources</h2>

                    </div>

                </div>

                <div class="col-xl-5 col-lg-12 col-md-12 col-12">

                    <div class="tp-breadcrumb__link text-xl-end">

                        <!-- <span>Bioprocess Supplies :  About us</span> -->

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- breadcrumb-area-end -->
    <section class="p-details-section">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-sm-12 col-md-4">
                    <div class="p-details-img">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/certificate-award.jpg"
                            alt="appoinment-img">
                    </div>
                </div>
                <div class="col-sm-12 col-md-8">
                    <div class="tp-section">
                        <h2 class="tp-section__title mb-70">Certificate of Compliance Look Up</h2>
                        <p>Misplaced certificates happen- utilize our certificate of compliance look up tool to help
                            complete your documentation without slowing the process down. We store certificates from the
                            past 90 days. </p>
                        <p>Search for certificates by entering lot number exactly as depicted on part label.
                            If you need certificates from longer than 90 days ago, feel free to <a
                                href="/contact">contact us</a> and we will be happy to help.</p>
                        <div class="tp-blog__btn">
                            <a href="<?php echo get_home_url(); ?>/cert-look-up/">View moRe</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- blog-area -->

    <section class="blog-area pt-125 pb-100">

        <div class="container">

            <div class="row align-items-center">

                <div class="col-md-8 col-12">

                    <div class="tp-section">

                        <span class="tp-section__sub-title left-line mb-25">What’s New</span>

                        <h3 class="tp-section__title mb-65">Blogs</h3>

                    </div>

                </div>

                <div class="col-md-4 col-12">

                    <div class="tp-blog-arrow d-flex align-items-center">

                        <div class="tp-blog-p"><i class="fa-regular fa-arrow-left"></i></div>

                        <div class="tp-blog-n"><i class="fa-regular fa-arrow-right"></i></div>

                    </div>

                </div>

            </div>

            <div class="swiper-container tp-blog-active wow fadeInUp" data-wow-delay=".3s">

                <div class="swiper-wrapper">

                    <?php 



            $args = array(

                'post_type' => 'post',

                'category_name' => '',

                'posts_per_page' => 5,

                'paged' => $paged 

            );

            $query = new WP_Query($args);

            if($query->have_posts()):

                while ($query->have_posts()):

                    $query->the_post();



                    $blogs_image = wp_get_attachment_url( get_post_thumbnail_id($post->id) );

                    ?>

                    <div class="swiper-slide">

                        <div class="tp-blog mb-30">

                            <div class="tp-blog__thumb p-relative fix">

                                <a href="<?php echo get_permalink( $id )?>"><img src="<?php echo $blogs_image ;?>"
                                        alt="blog-item"></a>

                                <div class="tp-blog__date text-center">

                                    <h4><?php echo get_the_date( 'd' ); ?><span><?php echo get_the_date( 'M ' ); ?></span>
                                    </h4>

                                </div>

                            </div>

                            <div class="tp-blog__content">

                                <span class="tp-blog__category mb-30">

                                    <?php
                                        $category = get_the_category();
                                        $first_category = $category[0];
                                        echo sprintf( '<a href="%s">%s</a>', get_category_link( $first_category ), $first_category->name );
                                    ?>

                                </span>

                                <h5 class="tp-blog__title mb-20"><a
                                        href="<?php echo get_permalink( $id )?>"><?php the_title() ;?></a></h5>

                                <p><?php echo get_field( substr('excerpt', 0, 7) ) ;?> </p>

                                <div class="tp-blog__btn">

                                    <a href="<?php echo get_permalink( $id )?>">Read moRe</a>

                                </div>

                            </div>

                        </div>

                    </div>



                    <?php

                endwhile;

                wp_reset_postdata();

            endif;

        ?>

                </div>

            </div>

        </div>

    </section>

    <!-- blog-area-end -->

</main>

<!-- main-area-end -->



<?php get_footer() ;?>