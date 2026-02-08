<?php 
/**
 * Template Name: Home Page
 */
get_header('home');
?>
<!-- main-area -->
<main>

    <!-- banner-area -->
    <section class="banner-area p-relative pt-90">
        <div class="banner__shape d-none d-lg-block">
            <img src="<?php echo get_field('banner_image') ;?>" alt="banner-img">
            <?php $ytUrl = get_field('youtube_url');
               if($ytUrl){?>
            <div class="banner__video-btn">
                <a class="banner__video-icon popup-video" href="<?php echo get_field('youtube_url') ;?>"><i
                        class="fa-solid fa-play"></i></a>
            </div>
            <?php } ?>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xl-8">
                    <div class="banner__content pt-145 mb-135">
                        <a class="m-bannerscroll-icon" href="#services-area"><i
                                class="bi bi-arrow-down-circle-fill"></i></a>
                        <span class="banner__sub-title mb-20"><?php echo get_field('banner_title') ;?></span>
                        <h2 class="banner__title mb-30" style="font-size: 45px;">
                            <?php echo get_field('banner_subtitle') ;?></h2>
                        <p><?php echo get_field('banner_excerpt') ;?></p>
                    </div>
                    <div class="banner__box-item">
                        <div class="row">
                            <div class="col-xl-4 col-lg-4 col-md-6">
                                <div class="banner__item d-flex align-items-center mb-30 wow fadeInUp"
                                    data-wow-delay=".2s">
                                    <div class="banner__item-icon">
                                        <i class="flaticon-rating"></i>
                                    </div>
                                    <div class="banner__item-content">
                                        <span>Application Consulting</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-6">
                                <div class="banner__item pink-border d-flex align-items-center mb-30 wow fadeInUp"
                                    data-wow-delay=".4s">
                                    <div class="banner__item-icon pink-icon">
                                        <i class="flaticon-target"></i>
                                    </div>
                                    <div class="banner__item-content">
                                        <span>Repackaging and Assembly</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-6">
                                <div class="banner__item green-border d-flex align-items-center mb-30 wow fadeInUp"
                                    data-wow-delay=".6s">
                                    <div class="banner__item-icon green-icon">
                                        <i class="flaticon-premium-badge"></i>
                                    </div>
                                    <div class="banner__item-content">
                                        <span>Irradiation Sterilization Services</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="bannerscroll d-none d-xl-block">
               <div class="banner-scroll-btn">
                  <a class="bannerscroll-icon" href="#services-area"><i class="fa-light fa-computer-mouse"></i>
                     <span>Scroll Down</span></a>
               </div>
            </div> -->
    </section>
    <!-- banner-area-end -->

    <!-- services-area -->
    <section id="services-area" class="services-area pt-95 pb-90 grey-bg mt-60 fix"
        data-background="<?php echo get_stylesheet_directory_uri() ;?>/assets/img/shape/shape-bg-01.png">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 col-md-8 col-12">
                    <div class="tp-section">
                        <span class="tp-section__sub-title left-line mb-20">Bioprocess Supplies</span>
                        <h3 class="tp-section__title mb-50">Products Category</h3>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="tp-services d-flex align-items-center">
                        <div class="services-p"><i class="fa-regular fa-arrow-left"></i></div>
                        <div class="services-n"><i class="fa-regular fa-arrow-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="services-slider  wow fadeInUp" data-wow-delay=".3s">
                <div class="swiper-container service-active">
                    <div class="swiper-wrapper">
                        <?php 
                            $taxonomy = 'products_categories';
                            $object_type = 'produts';

                            $categories = get_terms( array(
                                'taxonomy' => $taxonomy,
                                'object_type' => array( $object_type ),
                                'hide_empty' => false, 
                            ) );
                        
                            if ( ! empty( $categories ) && ! is_wp_error( $categories ) ) {
                                foreach ( $categories as $category ) {
                                $term = $category->term_id;
                                $category_link = get_term_link( $category, $taxonomy );
                                $category_description = $category->description;
                                ?>
                        <div class="swiper-slide">
                            <div class="services-item mb-40">
                                <div
                                    class="services-item__icon <?php echo get_field('icon_color', 'term_'.$term); ?>-icon mb-30">
                                    <?php echo get_field('category_icon', 'term_'.$term); ?>
                                </div>
                                <div class="services-item__content">
                                    <h4 class="services-item__tp-title mb-30"><a
                                            href="<?php echo $category_link ;?>"><?php echo  $category->name ;?></a>
                                    </h4>
                                    <p>
                                        <?php
                                                    $category_description = $category->description;
                                                    $character_limit = 100; 

                                                    if (strlen($category_description) > $character_limit) {
                                                        $category_description = substr($category_description, 0, $character_limit) . '...';
                                                    }
                                                    echo $category_description;
                                               ?>

                                    </p>
                                    <div class="services-item__btn">
                                        <a class="btn-hexa <?php echo get_field('icon_color', 'term_'.$term); ?>-hexa"
                                            href="<?php echo $category_link ;?>"><i></i>Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                                }
                            }
                        ?>

                    </div>
                </div>
            </div>
            <div class="row mb-125">
                <div class="col-lg-12">
                    <div class="search-form" id='search_sec'>
                        <form action="<?php echo get_home_url() ;?>" method="GET">
                            <input type="text" name="s" placeholder="Search for products" required>
                            <input type="hidden" name="post_type" value="products">
                            <button class="tp-btn search-btn" type="submit">Search Here <i
                                    class="fa-light fa-magnifying-glass ml-5"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- services-area-end -->

    <!-- appoinment-area -->
    <section class="appoinment-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xxl-6 col-xl-5 col-lg-12 col-md-12 p-0">
                    <div class="appoinment-thumb">
                        <img src="<?php echo get_stylesheet_directory_uri() ;?>/assets/img/banner/appoinment.jpg"
                            alt="appoinment-img">
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-7 col-lg-12 col-md-12 p-0">
                    <div class="visitor-info">
                        <h4 class="appoinment-title mb-25"><i class="fa-light fa-file-signature"></i>Contact Us</h4>
                        <div class="visitor-form">
                            <?php echo do_shortcode('[contact-form-7 id="278" title="Home Contact"]') ;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- appoinment-area-end -->


    <!-- brand-area -->
    <div class="brand-area pt-130 pb-130">
        <div class="container">
            <div class="swiper-container brand-active">
                <div class="swiper-wrapper brand-items">
                    <?php 
                            global $wpdb;
                            $n_client = $wpdb->get_results("SELECT * FROM `wp_posts` WHERE `post_status` = 'publish' AND `post_type` = 'partners' ORDER BY `menu_order` DESC LIMIT 0,10 ", ARRAY_A);
                            if(count($n_client) > 0){
                                foreach($n_client as $client) {
                                    ?>
                    <div class="swiper-slide">
                        <a href="#"><img
                                src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($client['ID'])); ?>"
                                alt="brand"></a>
                    </div>
                    <?php 
                                }
                            }
                        ?>
                </div>
            </div>
        </div>
    </div>
    <!-- brand-area-end -->


    <!-- blog-area -->
    <section class="blog-area pt-125 pb-100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8 col-12">
                    <div class="tp-section">
                        <span class="tp-section__sub-title left-line mb-25">What’s New</span>
                        <h3 class="tp-section__title mb-65">Knowledge Center</h3>
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
                                <h5 class="tp-blog__title mb-20">
                                    <a href="<?php echo get_permalink( $id )?>">
                                        <?php
                                                        $title = get_the_title();
                                                        $limit = 50;
                                                        if (strlen($title) > $limit) {
                                                            $title = substr($title, 0, $limit) . '...';
                                                        }
                                                        echo $title;
                                                    ?>

                                    </a>
                                </h5>
                                <p>
                                    <?php
                                                    $excerpt = get_field('excerpt');
                                                    $limit = 90;
                                                    if (strlen($excerpt) > $limit) {
                                                        $excerpt = substr($excerpt, 0, $limit) . '...';
                                                    }
                                                    echo $excerpt;
                                                ?>
                                </p>
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