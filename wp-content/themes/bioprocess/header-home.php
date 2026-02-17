<?php

/**
 * The header.
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>
<?php
global $header_logo, $email_id, $phone_number, $office_days, $office_time; ?>
<!doctype html>
<html <?php language_attributes(); ?> <?php twentytwentyone_the_html_classes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon"
        href="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo/favicon.ico">

    <!-- CSS here -->
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/animate.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/swiper-bundle.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/slick.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/font-awesome-pro.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/meanmenu.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/nice-select.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/flaticon.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/spacing.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/custome.css">
    <?php wp_head(); ?>
</head>
<style>
#header-sticky-new .main-menu ul>li .sub-menu {
    margin-top: 0;
}
</style>

<body>
    <!--[if lte IE 9]>
      <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
      <![endif]-->

    <!-- Scroll-top -->
    <button class="scroll-top scroll-to-target" data-target="html">
        <i class="fas fa-angle-up"></i>
    </button>
    <!-- Scroll-top-end-->

    <!-- preloader -->
    <div id="preloadertp">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/preloader.png" alt="">
    </div>
    <!-- preloader end  -->

    <!-- header-area -->
    <header class="d-none d-xl-block small-view">
        <div class="header__area tp-home-one" id="header-sticky-new">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-xxl-2 col-lg-2">
                        <div class="logo">
                            <a href="<?php echo get_home_url(); ?>"><img src="<?php echo $header_logo; ?>"
                                    alt="logo"></a>
                        </div>
                    </div>
                    <div class="col-xxl-6 col-lg-6">
                        <div class="main-menu">
                            <nav id="mobile-menu">
                                <ul>
                                    <li>
                                        <a class="active" href="<?php echo get_home_url(); ?>">Home</a>
                                    </li>

                                    <li class="has-dropdown"><a
                                            href="<?php echo get_home_url(); ?>/product">Products</a>
                                        <!-- <ul class="sub-menu">
                                          <li><a href="product-listing.html">Small Bioreactors</a></li>
                                          <li><a href="product-listing.html">Upstream</a></li>
                                          <li><a href="product-listing.html">Filtration Media</a></li>
                                          <li><a href="product-listing.html">Mixing</a></li>
                                       </ul> -->
                                        <ul class="sub-menu">
                                            <!-- <li class="img-li">
                                                <div class="menu-img">
                                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/banner/megamenu-2.png"
                                                        alt="appoinment-img">
                                                </div>
                                            </li> -->
                                            <li class="content-li">
                                                <ul class="cmn-nav-link service-scrol">
                                                    <?php
                                       // Define the custom taxonomy name for product categories
                                       $taxonomy = 'products_categories'; // Replace with your actual taxonomy name

                                       // Get all product categories
                                       $categories = get_terms(array(
                                          'taxonomy' => $taxonomy,
                                          'hide_empty' => false, // Set to true to hide empty categories
                                       ));

                                       // Loop through each category
                                       foreach ($categories as $category) {
                                          $category_url = get_term_link($category, $taxonomy);
                                          // Output the category name
                                          echo '<li class="menu-item has-right-submenu" ><a class="menu-heading" href="' . esc_url($category_url) . '"><h6>' . esc_html($category->name) . '</h6></a> <img src="' . get_stylesheet_directory_uri() . '/assets/img/check_1.svg" class="img-fluid">';

                                          // Define query arguments to retrieve products within the current category
                                          $args = array(
                                             'post_type' => 'products', // Replace with your actual custom post type name
                                             'posts_per_page' => -1,
                                             'post_status' => 'publish',
                                             'tax_query' => array(
                                                array(
                                                   'taxonomy' => $taxonomy,
                                                   'field' => 'id',
                                                   'terms' => $category->term_id, // Use the current category's ID
                                                ),
                                             ),
                                          );

                                          // Create a new instance of WP_Query with the defined arguments
                                          $products_query = new WP_Query($args);

                                          // Check if there are any products in this category
                                          if ($products_query->have_posts()) {
                                             echo '<ul class="right-submenu">';
                                             while ($products_query->have_posts()) {
                                                $products_query->the_post();
                                                // Display product information here, e.g., title, content, thumbnail, etc.
                                                echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
                                             }
                                             echo '</ul></li>';
                                             wp_reset_postdata(); // Reset post data
                                          } else {
                                             echo 'Coming Soon';
                                          }
                                       }
                                       ?>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>

                                    <li class="has-dropdown"><a
                                            href="<?php echo get_home_url(); ?>/services">Services</a>
                                        <ul class="sub-menu">
                                            <!-- <li class="img-li">
                                                <div class="menu-img">
                                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/banner/megamenu-3.png"
                                                        alt="appoinment-img">
                                                </div>
                                            </li> -->
                                            <li class="content-li">
                                                <ul class="cmn-nav-link">
                                                    <li class="menu-item has-right-submenu">
                                                        <a href="<?php echo get_home_url(); ?>/submit-a-sketch/"
                                                            class="menu-heading">
                                                            <h6>Submit a sketch</h6>

                                                        </a>
                                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/check_1.svg"
                                                            class="img-fluid" alt="check icon">
                                                        <ul class="right-submenu">
                                                            <li><a href="<?php echo get_home_url(); ?>/submit-a-sketch/"
                                                                    class="_menu-link"> Submit a sketch</a></li>
                                                        </ul>
                                                    </li>

                                                    <li class="menu-item has-right-submenu">
                                                        <a href="<?php echo get_home_url(); ?>/request-a-quote/"
                                                            class="menu-heading">
                                                            <h6>Request a quote</h6>

                                                        </a>
                                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/check_1.svg"
                                                            class="img-fluid" alt="check icon">
                                                        <ul class="right-submenu">
                                                            <li><a href="<?php echo get_home_url(); ?>/request-a-quote/"
                                                                    class="_menu-link"> Request a quote</a></li>
                                                        </ul>
                                                    </li>

                                                    <li class="menu-item has-right-submenu">
                                                        <a href="<?php echo get_home_url(); ?>/submit-project/"
                                                            class="menu-heading">
                                                            <h6>Submit a Project</h6>
                                                        </a>
                                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/check_1.svg"
                                                            class="img-fluid" alt="check icon">
                                                        <ul class="right-submenu">
                                                            <li><a href="<?php echo get_home_url(); ?>/submit-project/"
                                                                    class="_menu-link"> Submit a Project</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>

                                    <li class="has-dropdown">
                                        <a href="<?php echo get_home_url(); ?>/resources">Resources</a>
                                        <ul class="sub-menu">
                                            <li class="content-li">
                                                <ul class="cmn-nav-link">
                                                    <li class="menu-item has-right-submenu">
                                                        <a href="<?php echo get_home_url(); ?>/cert-look-up/"
                                                            class="menu-heading">
                                                            <h6>Cert Look Up</h6>
                                                        </a>
                                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/check_1.svg"
                                                            class="img-fluid" alt="check icon">
                                                        <ul class="right-submenu">
                                                            <li>
                                                                <a href="<?php echo get_home_url(); ?>/cert-look-up/"
                                                                    class="_menu-link">
                                                                    Cert Look Up
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li class="menu-item has-right-submenu has-right-submenu-3">
                                                        <div class='has-right-submenu-3_'>
                                                            <div>
                                                                <a href="<?php echo get_home_url(); ?>/knowledge-center"
                                                                    class="menu-heading">
                                                                    <h6>Knowledge Center</h6>
                                                                </a>
                                                                <!-- <small>What's New</small> -->
                                                            </div>
                                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/check_1.svg"
                                                                class="img-fluid" alt="check icon">
                                                        </div>
                                                        <div class="">
                                                            <ul class='right-submenu'>
                                                                <small>What's New</small>
                                                                <?php
                                          $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                                          $posts_per_page = 3; // Number of posts to display per page
                                          $args = array(
                                             'post_type' => 'post',
                                             'category_name' => '',
                                             'posts_per_page' => $posts_per_page,
                                          );

                                          $query = new WP_Query($args);
                                          if ($query->have_posts()) :
                                             while ($query->have_posts()) :
                                                $query->the_post();
                                                $blogs_image = wp_get_attachment_url(get_post_thumbnail_id($post->id));
                                          ?>
                                                                <li>
                                                                    <a href="<?php echo get_permalink($id) ?>"
                                                                        class="_menu-blog-box">
                                                                        <!-- <div class="_menu-blog-box-img">
                                                                    <img src="<?php echo $blogs_image; ?>"
                                                                        alt="appoinment-img">
                                                                </div> -->
                                                                        <div class="_menu-blog-box-content">
                                                                            <h6><?php the_title(); ?></h6>
                                                                            <p><?php echo get_field('excerpt'); ?></p>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                                <?php
                                             endwhile;
                                             wp_reset_postdata();
                                          endif;
                                          ?>
                                                            </ul>
                                                        </div>
                                                        <a href="<?php echo get_home_url(); ?>/knowledge-center"
                                                            class="read-more-link">Read more about our knowledge center
                                                            <i class="bi bi-arrow-right"></i></a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>

                                    <li class="has-dropdown <?php $url_slug = basename(get_permalink());
                                                   if ($url_slug == 'about') {
                                                      echo "active";
                                                   } ?> "><a href="<?php echo get_home_url(); ?>/about">Company</a>
                                        <ul class="sub-menu">
                                            <!-- <li class="img-li">
                                                <div class="menu-img">
                                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/banner/megamenu-1.png"
                                                        alt="appoinment-img">
                                                </div>
                                            </li> -->
                                            <li class="content-li">
                                                <ul class="cmn-nav-link">
                                                    <li class="menu-item has-right-submenu">
                                                        <a href="<?php echo get_home_url(); ?>/about"
                                                            class="menu-heading">
                                                            <h6>about</h6>
                                                        </a>
                                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/check_1.svg"
                                                            class="img-fluid" alt="check icon">
                                                        <ul class="right-submenu">
                                                            <li>
                                                                <a href="<?php echo get_home_url(); ?>/about/#facility"
                                                                    class="_menu-link"> Facility</a>
                                                            </li>

                                                            <li>
                                                                <a href="<?php echo get_home_url(); ?>/about/#facility"
                                                                    class="_menu-link">Quality Management</a>
                                                            </li>
                                                            <li>
                                                                <a href="<?php echo get_home_url(); ?>/about/#best_results"
                                                                    class="_menu-link">Best Results</a>
                                                            </li>
                                                            <li>
                                                                <a href="<?php echo get_home_url(); ?>/about/#our_specialists"
                                                                    class="_menu-link"> Our Specialists</a>
                                                            </li>
                                                            <li>
                                                                <a href="<?php echo get_home_url(); ?>/about/#our_team"
                                                                    class="_menu-link"> Meet the Team</a>
                                                            </li>
                                                        </ul>
                                                    </li>

                                                    <li class="menu-item has-right-submenu">
                                                        <a href="<?php echo get_home_url(); ?>/contact"
                                                            class="menu-heading">
                                                            <h6>Contact Us</h6>
                                                        </a>
                                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/check_1.svg"
                                                            class="img-fluid" alt="check icon">
                                                        <ul class="right-submenu">
                                                            <li>
                                                                <a href="<?php echo get_home_url(); ?>/contact"
                                                                    class="_menu-link">Contact Us</a>
                                                            </li>
                                                        </ul>
                                                    </li>

                                                    <li class="menu-item has-right-submenu">
                                                        <a href="<?php echo get_home_url(); ?>/careers"
                                                            class="menu-heading">
                                                            <h6>Openings</h6>
                                                        </a>
                                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/check_1.svg"
                                                            class="img-fluid" alt="check icon">
                                                        <ul class="right-submenu">
                                                            <li>
                                                                <a href="<?php echo get_home_url(); ?>/careers"
                                                                    class="_menu-link"> Positions</a>
                                                            </li>
                                                            <li>
                                                                <a href="<?php echo get_home_url(); ?>/careers/#submit-a-resume"
                                                                    class="_menu-link">Submit a Resume</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>

                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-xxl-4 col-lg-4 d-flex align-items-center justify-content-end g-20">
                        <div class="tp-bt-btn-banner">
                            <a class="tp-bt-btn login-button" target="_blank"
                                onclick="handleClickScroll('search_sec')"><i class="bi bi-search"></i></a>
                        </div>
                        <div class="tp-bt-btn-banner">
                            <a class="tp-bt-btn" href="tel:<?php echo $phone_number; ?> ">
                                <i class="bi bi-telephone"></i>
                                <span class="contact-number">
                                    <b><?php echo $phone_number; ?></b>
                                    <small><i class="bi bi-clock"></i><?php echo $office_days; ?>
                                        <?php echo $office_time; ?></small>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header-area-end -->

    <!-- tp-mobile-header-area start -->
    <div id="header-mob-sticky" class="tp-mobile-header-area tp-home-lg-banner pt-15 pb-15 d-xl-none">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-4">
                    <div class="tp-mob-logo">
                        <a href="<?php echo get_home_url(); ?>"><img
                                src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo/b-p-logo.PNG"
                                alt="logo"></a>
                    </div>
                </div>
                <div class="col-8">
                    <div class="tp-mobile-bar d-flex align-items-center justify-content-end">
                        <div class="login_icon">
                            <a onclick="handleClickScroll('search_sec')" target="_blank"><i
                                    class="bi bi-search"></i></a>

                        </div>
                        <div class="tp-bt-btn-banner d-none d-md-block d-xl-none mr-30">
                            <a class="tp-bt-btn" href="tel:<?php echo $phone_number; ?>">
                                <i class="bi bi-telephone"></i>
                                <span class="contact-number">
                                    <b><?php echo $phone_number; ?></b>
                                    <small>
                                        <i class="bi bi-clock"></i>&nbsp; &nbsp;<?php echo $office_days; ?>
                                        <?php echo $office_time; ?>
                                    </small>
                                </span>
                            </a>
                        </div>
                        <button class="tp-menu-toggle"><i class="far fa-bars"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- tp-mobile-header-area end -->


    <!-- sidebar-info -->
    <div class="tpsideinfo tp-side-info-area">
        <button class="tpsideinfo__close"><i class="fal fa-times"></i></button>
        <div class="tpsideinfo__logo mb-40">
            <a href="<?php echo get_home_url(); ?>"><img
                    src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo/b-p-logo.PNG" alt="logo"></a>
        </div>

        <!-- <div class="mobile-menu"></div> -->
        <header class="m-mobile">
            <nav class="slide-out-menu">
                <!-- main-menu -->
                <div class="primary-menu-panel">
                    <ul>
                        <li>
                            <a class="active" href="<?php echo get_home_url(); ?>">
                                <button type="button" class="menu-link">
                                    Home
                                </button>
                            </a>
                        </li>
                        <li>
                            <button type="button" class="menu-link" data-ref="product">
                                Products
                                <svg class="arrow-right d-sm-ib" fill="#fff" height="10px" width="10px"
                                    viewBox="0 0 185.4 300">
                                    <path
                                        d="M7.3 292.7c-9.8-9.8-9.8-25.6 0-35.4L114.6 150 7.3 42.7c-9.8-9.8-9.8-25.6 0-35.4s25.6-9.8 35.4 0L185.4 150 42.7 292.7c-4.9 4.8-11.3 7.3-17.7 7.3-6.4 0-12.7-2.5-17.7-7.3z">
                                    </path>
                                </svg>
                            </button>
                        </li>
                        <li>
                            <button type="button" class="menu-link" data-ref="service">
                                Services
                                <svg class="arrow-right d-sm-ib" fill="#fff" height="10px" width="10px"
                                    viewBox="0 0 185.4 300">
                                    <path
                                        d="M7.3 292.7c-9.8-9.8-9.8-25.6 0-35.4L114.6 150 7.3 42.7c-9.8-9.8-9.8-25.6 0-35.4s25.6-9.8 35.4 0L185.4 150 42.7 292.7c-4.9 4.8-11.3 7.3-17.7 7.3-6.4 0-12.7-2.5-17.7-7.3z">
                                    </path>
                                </svg>
                            </button>
                        </li>
                        <li>
                            <button type="button" class="menu-link" data-ref="resource">
                                Resources
                                <svg class="arrow-right d-sm-ib" fill="#fff" height="10px" width="10px"
                                    viewBox="0 0 185.4 300">
                                    <path
                                        d="M7.3 292.7c-9.8-9.8-9.8-25.6 0-35.4L114.6 150 7.3 42.7c-9.8-9.8-9.8-25.6 0-35.4s25.6-9.8 35.4 0L185.4 150 42.7 292.7c-4.9 4.8-11.3 7.3-17.7 7.3-6.4 0-12.7-2.5-17.7-7.3z">
                                    </path>
                                </svg>
                            </button>
                        </li>
                        <li>
                            <button type="button" class="menu-link" data-ref="company">
                                Company
                                <svg class="arrow-right d-sm-ib" fill="#fff" height="10px" width="10px"
                                    viewBox="0 0 185.4 300">
                                    <path
                                        d="M7.3 292.7c-9.8-9.8-9.8-25.6 0-35.4L114.6 150 7.3 42.7c-9.8-9.8-9.8-25.6 0-35.4s25.6-9.8 35.4 0L185.4 150 42.7 292.7c-4.9 4.8-11.3 7.3-17.7 7.3-6.4 0-12.7-2.5-17.7-7.3z">
                                    </path>
                                </svg>
                            </button>
                        </li>
                    </ul>
                </div>
                <div class="menu-panel" data-menu="product">
                    <button type="button" class="menu-link menu-header">
                        <svg class="arrow-right d-sm-ib roted" fill="#fff" height="10px" width="10px"
                            viewBox="0 0 185.4 300">
                            <path
                                d="M7.3 292.7c-9.8-9.8-9.8-25.6 0-35.4L114.6 150 7.3 42.7c-9.8-9.8-9.8-25.6 0-35.4s25.6-9.8 35.4 0L185.4 150 42.7 292.7c-4.9 4.8-11.3 7.3-17.7 7.3-6.4 0-12.7-2.5-17.7-7.3z">
                            </path>
                        </svg>
                        Products
                    </button>
                    <?php
                        // Define the custom taxonomy name for product categories
                        $taxonomy = 'products_categories'; // Replace with your actual taxonomy name

                        // Get all product categories
                        $categories = get_terms(array(
                            'taxonomy' => $taxonomy,
                            'hide_empty' => false, // Set to true to hide empty categories
                        ));

                        // Check if there are any categories
                        if (!empty($categories)) {
                            echo '<ul>';
                            foreach ($categories as $category) {
                                // Output the category name with a link to the category archive page
                                echo '<li>';
                                echo '<button type="button" class="menu-link" data-ref="' . esc_attr($category->slug) . '">';
                                echo esc_html($category->name);
                                echo '<svg class="arrow-right d-sm-ib" fill="#fff" height="10px" width="10px" viewBox="0 0 185.4 300"><path d="M7.3 292.7c-9.8-9.8-9.8-25.6 0-35.4L114.6 150 7.3 42.7c-9.8-9.8-9.8-25.6 0-35.4s25.6-9.8 35.4 0L185.4 150 42.7 292.7c-4.9 4.8-11.3 7.3-17.7 7.3-6.4 0-12.7-2.5-17.7-7.3z"></path></svg>';
                                echo '</button>';
                                echo '</li>';
                            }
                            echo '</ul>';
                        } else {
                            echo 'No categories found.';
                        }
                    ?>
                </div>
                <div class="menu-panel" data-menu="service">
                    <button type="button" class="menu-link menu-header">
                        <svg class="arrow-right d-sm-ib roted" fill="#fff" height="10px" width="10px"
                            viewBox="0 0 185.4 300">
                            <path
                                d="M7.3 292.7c-9.8-9.8-9.8-25.6 0-35.4L114.6 150 7.3 42.7c-9.8-9.8-9.8-25.6 0-35.4s25.6-9.8 35.4 0L185.4 150 42.7 292.7c-4.9 4.8-11.3 7.3-17.7 7.3-6.4 0-12.7-2.5-17.7-7.3z">
                            </path>
                        </svg>
                        Service
                    </button>
                    <ul>
                        <li><a href="<?php echo get_home_url(); ?>/submit-a-sketch/">SUBMIT A SKETCH</a></li>
                        <li><a href="<?php echo get_home_url(); ?>/request-a-quote">REQUEST A QUOTE</a></li>
                        <li><a href="<?php echo get_home_url(); ?>/submit-project">SUBMIT A PROJECT</a></li>
                    </ul>
                </div>
                <div class="menu-panel" data-menu="resource">
                    <button type="button" class="menu-link menu-header">
                        <svg class="arrow-right d-sm-ib roted" fill="#fff" height="10px" width="10px"
                            viewBox="0 0 185.4 300">
                            <path
                                d="M7.3 292.7c-9.8-9.8-9.8-25.6 0-35.4L114.6 150 7.3 42.7c-9.8-9.8-9.8-25.6 0-35.4s25.6-9.8 35.4 0L185.4 150 42.7 292.7c-4.9 4.8-11.3 7.3-17.7 7.3-6.4 0-12.7-2.5-17.7-7.3z">
                            </path>
                        </svg>
                        resource
                    </button>
                    <ul>
                        <li><a href="<?php echo get_home_url(); ?>/cert-look-up">CERT LOOK UP</a></li>
                        <li><a href="<?php echo get_home_url(); ?>/knowledge-center">KNOWLEDGE CENTER</a></li>
                    </ul>
                </div>
                <!-- sub-menu-1st-stage -->
                <div class="menu-panel" data-menu="company">
                    <button type="button" class="menu-link menu-header">
                        <svg class="arrow-right d-sm-ib roted" fill="#fff" height="10px" width="10px"
                            viewBox="0 0 185.4 300">
                            <path
                                d="M7.3 292.7c-9.8-9.8-9.8-25.6 0-35.4L114.6 150 7.3 42.7c-9.8-9.8-9.8-25.6 0-35.4s25.6-9.8 35.4 0L185.4 150 42.7 292.7c-4.9 4.8-11.3 7.3-17.7 7.3-6.4 0-12.7-2.5-17.7-7.3z">
                            </path>
                        </svg>
                        company
                    </button>
                    <ul>
                        <li>
                            <button type="button" class="menu-link" data-ref="about">
                                About
                                <svg class="arrow-right d-sm-ib" fill="#fff" height="10px" width="10px"
                                    viewBox="0 0 185.4 300">
                                    <path
                                        d="M7.3 292.7c-9.8-9.8-9.8-25.6 0-35.4L114.6 150 7.3 42.7c-9.8-9.8-9.8-25.6 0-35.4s25.6-9.8 35.4 0L185.4 150 42.7 292.7c-4.9 4.8-11.3 7.3-17.7 7.3-6.4 0-12.7-2.5-17.7-7.3z">
                                    </path>
                                </svg>
                            </button>
                        </li>
                        <li>
                            <a href="<?php echo get_home_url(); ?>/contact">Contact Us</a>
                        </li>
                        <li>
                            <button type="button" class="menu-link" data-ref="openings">
                                Openings
                                <svg class="arrow-right d-sm-ib" fill="#fff" height="10px" width="10px"
                                    viewBox="0 0 185.4 300">
                                    <path
                                        d="M7.3 292.7c-9.8-9.8-9.8-25.6 0-35.4L114.6 150 7.3 42.7c-9.8-9.8-9.8-25.6 0-35.4s25.6-9.8 35.4 0L185.4 150 42.7 292.7c-4.9 4.8-11.3 7.3-17.7 7.3-6.4 0-12.7-2.5-17.7-7.3z">
                                    </path>
                                </svg>
                            </button>
                        </li>
                    </ul>
                </div>
                <!-- sub-menu-2nd-stage -->
                <div class="menu-panel" data-menu="about">
                    <button type="button" class="menu-link menu-header">
                        <svg class="arrow-right d-sm-ib roted" fill="#fff" height="10px" width="10px"
                            viewBox="0 0 185.4 300">
                            <path
                                d="M7.3 292.7c-9.8-9.8-9.8-25.6 0-35.4L114.6 150 7.3 42.7c-9.8-9.8-9.8-25.6 0-35.4s25.6-9.8 35.4 0L185.4 150 42.7 292.7c-4.9 4.8-11.3 7.3-17.7 7.3-6.4 0-12.7-2.5-17.7-7.3z">
                            </path>
                        </svg>
                        <span>About</span>
                    </button>
                    <ul>
                        <li><a href="<?php echo get_home_url(); ?>/about/#our_team">MEET THE TEAM </a></li>
                        <li><a href="<?php echo get_home_url(); ?>/about/#facility">FACILITY </a></li>
                        <li><a href="<?php echo get_home_url(); ?>/about/#facility">QUALITY</a></li>
                        <li><a href="<?php echo get_home_url(); ?>/coming-soon">MANAGEMENT</a></li>
                    </ul>
                </div>
                <div class="menu-panel" data-menu="contact">
                    <button type="button" class="menu-link menu-header">
                        <svg class="arrow-right d-sm-ib roted" fill="#fff" height="10px" width="10px"
                            viewBox="0 0 185.4 300">
                            <path
                                d="M7.3 292.7c-9.8-9.8-9.8-25.6 0-35.4L114.6 150 7.3 42.7c-9.8-9.8-9.8-25.6 0-35.4s25.6-9.8 35.4 0L185.4 150 42.7 292.7c-4.9 4.8-11.3 7.3-17.7 7.3-6.4 0-12.7-2.5-17.7-7.3z">
                            </path>
                        </svg>
                        <span>Contact Us</span>
                    </button>
                    <ul>
                        <li><a href="<?php echo get_home_url(); ?>/contact">CONTACT US </a></li>
                    </ul>
                </div>
                <div class="menu-panel" data-menu="openings">
                    <button type="button" class="menu-link menu-header">
                        <svg class="arrow-right d-sm-ib roted" fill="#fff" height="10px" width="10px"
                            viewBox="0 0 185.4 300">
                            <path
                                d="M7.3 292.7c-9.8-9.8-9.8-25.6 0-35.4L114.6 150 7.3 42.7c-9.8-9.8-9.8-25.6 0-35.4s25.6-9.8 35.4 0L185.4 150 42.7 292.7c-4.9 4.8-11.3 7.3-17.7 7.3-6.4 0-12.7-2.5-17.7-7.3z">
                            </path>
                        </svg>
                        <span>Openings</span>
                    </button>
                    <ul>
                        <li><a href="<?php echo get_home_url(); ?>/careers">POSITIONS</a></li>
                        <li><a href="<?php echo get_home_url(); ?>/careers">SUBMIT A RESUME</a></li>
                    </ul>
                </div>
                <!-- sub-menu-2nd-stage product menu -->
                <?php
                // Define the custom taxonomy name for product categories
                $taxonomy = 'products_categories'; // Replace with your actual taxonomy name

                // Get all product categories
                $categories = get_terms(array(
                'taxonomy' => $taxonomy,
                'hide_empty' => false, // Set to true to hide empty categories
                ));

                // Loop through each category
                foreach ($categories as $category) {
                // Get the category archive URL
                $category_url = get_term_link($category, $taxonomy);

                // Output the category name with a link
                echo '<div class="menu-panel" data-menu="' . esc_attr($category->slug) . '">';
                echo '<button type="button" class="menu-link menu-header">';
                echo '<svg class="arrow-right d-sm-ib roted" fill="#fff" height="10px" width="10px" viewBox="0 0 185.4 300"><path d="M7.3 292.7c-9.8-9.8-9.8-25.6 0-35.4L114.6 150 7.3 42.7c-9.8-9.8-9.8-25.6 0-35.4s25.6-9.8 35.4 0L185.4 150 42.7 292.7c-4.9 4.8-11.3 7.3-17.7 7.3-6.4 0-12.7-2.5-17.7-7.3z"></path></svg>';
                echo '<span>' . esc_html($category->name) . '</span>';
                echo '</button>';


                // Define query arguments to retrieve products within the current category
                $args = array(
                    'post_type' => 'products', // Replace with your actual custom post type name
                    'posts_per_page' => -1,
                    'post_status' => 'publish',
                    'tax_query' => array(
                        array(
                            'taxonomy' => $taxonomy,
                            'field' => 'id',
                            'terms' => $category->term_id, // Use the current category's ID
                        ),
                    ),
                );

                // Create a new instance of WP_Query with the defined arguments
                $products_query = new WP_Query($args);

                // Check if there are any products in this category
                if ($products_query->have_posts()) {
                    echo '<ul>';
                    while ($products_query->have_posts()) {
                        $products_query->the_post();
                        // Display product information here, e.g., title, content, thumbnail, etc.
                        echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
                    }
                    echo '</ul></div>';
                    wp_reset_postdata(); // Reset post data
                } else {
                    echo 'No products found in this category.';
                    echo '</ul></div>';
                }
                }
                ?>
            </nav>
        </header>
        <div class="tpsideinfo__content mb-60">
            <p class=" d-none d-xl-block">Our mission is to ensure the generation of accurate and precise findings.</p>
            <span>Contact Us</span>
            <a href="#"><i class="fa-solid fa-star"></i>80 Gravel Pike Building D Red Hill, PA 18076​ </a>
            <a href="tel:<?php echo $phone_number; ?>"><i class="fa-solid fa-star"></i><?php echo $phone_number; ?></a>
            <a href="#">
                <i class="fa-solid fa-star"></i> &nbsp;
                <?php echo $office_days; ?> <?php echo $office_time; ?>
            </a>
            <a href="mailto:<?php echo $email_id; ?>"><i class="fa-solid fa-star"></i><?php echo $email_id; ?></a>
        </div>
        <div class="tpsideinfo__gallery mb-35 d-none d-xl-block">
            <span>Cheack Instagram Post</span>
            <div class="tpsideinfo__gallery-item">
                <a href="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/blog/blog-in-01.jpg"
                    class="popup-image"><img
                        src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/blog/blog-in-01.jpg" alt=""></a>
                <a href="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/blog/blog-in-02.jpg"
                    class="popup-image"><img
                        src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/blog/blog-in-02.jpg" alt=""></a>
                <a href="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/blog/blog-in-03.jpg"
                    class="popup-image"><img
                        src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/blog/blog-in-03.jpg" alt=""></a>
            </div>
        </div>
        <!-- <div class="tpsideinfo__socialicon">
         <a href="#"><i class="fa-brands fa-youtube"></i></a>
         <a href="#"><i class="fa-brands fa-twitter"></i></a>
         <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
         <a href="#"><i class="fa-brands fa-skype"></i></a>
      </div> -->
    </div>
    <!-- sidebar-info-end -->

    <div class="body-overlay"></div>