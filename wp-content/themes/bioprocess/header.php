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
global $header_logo, $email_id, $phone_number, $office_days, $office_time ;?>
<!doctype html>
<html <?php language_attributes(); ?> <?php twentytwentyone_the_html_classes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon"
        href="<?php echo get_stylesheet_directory_uri() ;?>/assets/img/logo/favicon.ico">
    <!-- CSS here -->
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ;?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ;?>/assets/css/animate.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ;?>/assets/css/swiper-bundle.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ;?>/assets/css/slick.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ;?>/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ;?>/assets/css/font-awesome-pro.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ;?>/assets/css/meanmenu.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ;?>/assets/css/nice-select.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ;?>/assets/css/flaticon.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ;?>/assets/css/spacing.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ;?>/assets/css/style.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ;?>/assets/css/custome.css">
    <?php wp_head(); ?>
</head>

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
        <img src="<?php echo get_stylesheet_directory_uri() ;?>/assets/img/preloader.png" alt="">
    </div>
    <!-- preloader end  -->

    <!-- header-area -->
    <header class="d-none d-xl-block">
        <div class="header-custom" id="header-sticky-new">
            <div class="header-logo-box">
                <a href="<?php echo get_home_url() ;?>"><img src="<?= $header_logo ;?>" alt="logo"></a>
            </div>

            <div class="header-menu-box">
                <div class="header-menu-top">
                    <div class="row d-flex flex-row align-items-center justify-content-end">
                        <div class="header-top-mob">
                            <a href="mailto:<?= $email_id ;?>">
                                <i class="bi bi-envelope"></i>
                                <?= $email_id ;?>
                            </a>
                        </div>

                        <div class="header-top-mob">
                            <a href="#">
                                <i class="bi bi-clock"></i>
                                <?= $office_days ;?> <?= $office_time ;?>
                            </a>
                        </div>

                        <div class="header-top-mob">
                            <a href="tel:<?= $phone_number;?>">
                                <i class="bi bi-telephone"></i>
                                <span class="contact-number">
                                    <b><?= $phone_number;?></b>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="header-menu-bottom">
                    <div class="row">
                        <div class="col-lg-7">
                            <?php
                            // Helper function to check active states
                            function is_menu_active($type, $slug = '') {
                                if ($type === 'home') {
                                    return (is_front_page() || is_home()) ? 'active' : '';
                                }
                                if ($type === 'page') {
                                    return is_page($slug) ? 'active' : '';
                                }
                                if ($type === 'products') {
                                    // Check for Product Archive, Single Product, or Product Category
                                    if (is_page('product') || is_singular('products') || is_tax('products_categories')) {
                                        return 'active';
                                    }
                                    return '';
                                }
                                if ($type === 'blog') {
                                    // Check for Blog page or Single Post
                                    if (is_page('resources') || is_page('knowledge-center') || is_singular('post')) {
                                        return 'active';
                                    }
                                    return '';
                                }
                                return '';
                            }
                            ?>

                            <div class="main-menu main-menu-second">
                                <nav id="mobile-menu">
                                    <ul>
                                        <!-- HOME -->
                                        <li class="<?php echo is_menu_active('home'); ?>">
                                            <a href="<?php echo get_home_url(); ?>">Home</a>
                                        </li>

                                        <!-- PRODUCTS -->
                                        <li class="has-dropdown <?php echo is_menu_active('products'); ?>">
                                            <a href="<?php echo get_home_url(); ?>/product">Products</a>
                                            <ul class="sub-menu">
                                                <li class="content-li">
                                                    <ul class="cmn-nav-link service-scrol">
                                                        <?php
                                                        $taxonomy = 'products_categories';
                                                        $categories = get_terms(array(
                                                            'taxonomy' => $taxonomy,
                                                            'hide_empty' => false,
                                                        ));

                                                        foreach ($categories as $category) {
                                                            $category_url = get_term_link($category, $taxonomy);
                                                            
                                                            // Active check for specific category and its products
                                                            $is_active_cat = '';
                                                            if (is_tax($taxonomy, $category->term_id)) {
                                                                $is_active_cat = 'active';
                                                            } elseif (is_singular('products')) {
                                                                // Check if current single product belongs to this category
                                                                $current_terms = get_the_terms(get_the_ID(), $taxonomy);
                                                                if ($current_terms && !is_wp_error($current_terms)) {
                                                                    foreach ($current_terms as $term) {
                                                                        if ($term->term_id == $category->term_id) {
                                                                            $is_active_cat = 'active';
                                                                            break;
                                                                        }
                                                                    }
                                                                }
                                                            }

                                                            echo '<li class="menu-item has-right-submenu ' . $is_active_cat . '" ><a class="menu-heading" href="' . esc_url($category_url) . '"><h6>' . esc_html($category->name) . '</h6></a> <img src="' . get_stylesheet_directory_uri() . '/assets/img/check_1.svg" class="img-fluid">';

                                                            $args = array(
                                                                'post_type' => 'products',
                                                                'posts_per_page' => -1,
                                                                'post_status' => 'publish',
                                                                'tax_query' => array(
                                                                    array(
                                                                        'taxonomy' => $taxonomy,
                                                                        'field' => 'id',
                                                                        'terms' => $category->term_id,
                                                                    ),
                                                                ),
                                                            );

                                                            $products_query = new WP_Query($args);

                                                            if ($products_query->have_posts()) {
                                                                echo '<ul class="right-submenu">';
                                                                while ($products_query->have_posts()) {
                                                                    $products_query->the_post();
                                                                    $is_active_product = (get_the_ID() == get_queried_object_id()) ? 'active' : '';
                                                                    echo '<li class="'.$is_active_product.'"><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
                                                                }
                                                                echo '</ul></li>';
                                                                wp_reset_postdata();
                                                            } else {
                                                                echo 'Coming Soon</li>'; // Fixed closing li tag
                                                            }
                                                        }
                                                        ?>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>

                                        <!-- SERVICES -->
                                        <li
                                            class="has-dropdown <?php echo (is_page('services') || is_page('submit-a-sketch') || is_page('request-a-quote') || is_page('submit-project')) ? 'active' : ''; ?>">
                                            <a href="<?php echo get_home_url(); ?>/services">Services</a>
                                            <ul class="sub-menu">
                                                <li class="content-li">
                                                    <ul class="cmn-nav-link">
                                                        <li
                                                            class="menu-item has-right-submenu <?php echo is_page('submit-a-sketch') ? 'active' : ''; ?>">
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

                                                        <li
                                                            class="menu-item has-right-submenu <?php echo is_page('request-a-quote') ? 'active' : ''; ?>">
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

                                                        <li
                                                            class="menu-item has-right-submenu <?php echo is_page('submit-project') ? 'active' : ''; ?>">
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

                                        <!-- RESOURCES -->
                                        <li class="has-dropdown <?php echo is_menu_active('blog'); ?>">
                                            <a href="<?php echo get_home_url(); ?>/resources">Resources</a>
                                            <ul class="sub-menu">
                                                <li class="content-li">
                                                    <ul class="cmn-nav-link">
                                                        <li
                                                            class="menu-item has-right-submenu <?php echo is_page('cert-look-up') ? 'active' : ''; ?>">
                                                            <a href="<?php echo get_home_url(); ?>/cert-look-up/"
                                                                class="menu-heading">
                                                                <h6>Cert Look Up</h6>
                                                            </a>
                                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/check_1.svg"
                                                                class="img-fluid" alt="check icon">
                                                            <ul class="right-submenu">
                                                                <li><a href="<?php echo get_home_url(); ?>/cert-look-up/"
                                                                        class="_menu-link">Cert Look Up</a></li>
                                                            </ul>
                                                        </li>

                                                        <li
                                                            class="menu-item has-right-submenu has-right-submenu-3 <?php echo (is_page('knowledge-center') || is_singular('post')) ? 'active' : ''; ?>">
                                                            <div class='has-right-submenu-3_'>
                                                                <div>
                                                                    <a href="<?php echo get_home_url(); ?>/knowledge-center"
                                                                        class="menu-heading">
                                                                        <h6>Knowledge Center</h6>
                                                                    </a>
                                                                </div>
                                                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/check_1.svg"
                                                                    class="img-fluid" alt="check icon">
                                                            </div>
                                                            <div class="">
                                                                <ul class='right-submenu'>
                                                                    <small>What's New</small>
                                                                    <?php
                                                                    $args = array(
                                                                        'post_type' => 'post',
                                                                        'posts_per_page' => 3,
                                                                    );
                                                                    $query = new WP_Query($args);
                                                                    if ($query->have_posts()) :
                                                                        while ($query->have_posts()) : $query->the_post();
                                                                            $is_current_blog = (get_the_ID() == get_queried_object_id()) ? 'active' : '';
                                                                    ?>
                                                                    <li class="<?php echo $is_current_blog; ?>">
                                                                        <a href="<?php the_permalink(); ?>"
                                                                            class="_menu-blog-box">
                                                                            <div class="_menu-blog-box-content">
                                                                                <h6><?php the_title(); ?></h6>
                                                                                <p><?php echo get_field('excerpt'); ?>
                                                                                </p>
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
                                                                class="read-more-link">Read more about our knowledge
                                                                center <i class="bi bi-arrow-right"></i></a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>

                                        <!-- COMPANY -->
                                        <li
                                            class="has-dropdown <?php echo (is_page('about') || is_page('contact') || is_page('careers')) ? 'active' : ''; ?>">
                                            <a href="<?php echo get_home_url(); ?>/about">Company</a>
                                            <ul class="sub-menu">
                                                <li class="content-li">
                                                    <ul class="cmn-nav-link">
                                                        <li
                                                            class="menu-item has-right-submenu <?php echo is_page('about') ? 'active' : ''; ?>">
                                                            <a href="<?php echo get_home_url(); ?>/about"
                                                                class="menu-heading">
                                                                <h6>about</h6>
                                                            </a>
                                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/check_1.svg"
                                                                class="img-fluid" alt="check icon">
                                                            <ul class="right-submenu">
                                                                <li><a href="<?php echo get_home_url(); ?>/about/#facility"
                                                                        class="_menu-link"> Facility</a></li>
                                                                <li><a href="<?php echo get_home_url(); ?>/about/#facility"
                                                                        class="_menu-link">Quality Management</a></li>
                                                                <li><a href="<?php echo get_home_url(); ?>/about/#best_results"
                                                                        class="_menu-link">Best Results</a></li>
                                                                <li><a href="<?php echo get_home_url(); ?>/about/#our_specialists"
                                                                        class="_menu-link"> Our Specialists</a></li>
                                                                <li><a href="<?php echo get_home_url(); ?>/about/#our_team"
                                                                        class="_menu-link"> Meet the Team</a></li>
                                                            </ul>
                                                        </li>

                                                        <li
                                                            class="menu-item has-right-submenu <?php echo is_page('contact') ? 'active' : ''; ?>">
                                                            <a href="<?php echo get_home_url(); ?>/contact"
                                                                class="menu-heading">
                                                                <h6>Contact Us</h6>
                                                            </a>
                                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/check_1.svg"
                                                                class="img-fluid" alt="check icon">
                                                            <ul class="right-submenu">
                                                                <li><a href="<?php echo get_home_url(); ?>/contact"
                                                                        class="_menu-link">Contact Us</a></li>
                                                            </ul>
                                                        </li>

                                                        <li
                                                            class="menu-item has-right-submenu <?php echo is_page('careers') ? 'active' : ''; ?>">
                                                            <a href="<?php echo get_home_url(); ?>/careers"
                                                                class="menu-heading">
                                                                <h6>Openings</h6>
                                                            </a>
                                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/check_1.svg"
                                                                class="img-fluid" alt="check icon">
                                                            <ul class="right-submenu">
                                                                <li><a href="<?php echo get_home_url(); ?>/careers"
                                                                        class="_menu-link"> Positions</a></li>
                                                                <li><a href="<?php echo get_home_url(); ?>/careers/#submit-a-resume"
                                                                        class="_menu-link">Submit a Resume</a></li>
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

                        <div class="col-lg-5">

                            <div class="header-cart-order d-flex align-items-center justify-content-end">

                                <a class="header-bottom-btn" href='<?php echo get_home_url(); ?>/#search_sec'><i
                                        class="bi bi-search"></i></a>

                            </div>

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
                        <a href="<?php echo get_home_url() ;?>"><img
                                src="<?php echo get_stylesheet_directory_uri() ;?>/assets/img/logo/b-p-logo.PNG"
                                alt="logo"></a>
                    </div>
                </div>

                <div class="col-8">
                    <div class="tp-mobile-bar d-flex align-items-center justify-content-end">
                        <div class="login_icon">
                            <a href='<?php echo get_home_url(); ?>/#search_sec'><i class="bi bi-search"></i></a>
                            <!-- <a href="https://admin.bpssu.com/login"
                                target="_blank"><i
                                class="bi bi-person"></i></a> -->

                        </div>
                        <div class="tp-bt-btn-banner d-none d-md-block d-xl-none mr-30">
                            <a class="tp-bt-btn" href="tel:123456">
                                <i class="bi bi-telephone"></i>
                                <span class="contact-number">
                                    <b>(267)-313-4534</b>
                                    <small>
                                        <i class="bi bi-clock"></i>
                                        <?php echo $office_days ;?> <?php echo $office_time ;?>
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
            <a href="<?php echo get_home_url() ;?>"><img
                    src="<?php echo get_stylesheet_directory_uri() ;?>/assets/img/logo/b-p-logo.PNG" alt="logo"></a>
        </div>

        <!-- <div class="mobile-menu"></div> -->
        <header class="m-mobile">
            <nav class="slide-out-menu">
                <!-- main-menu -->
                <div class="primary-menu-panel">
                    <ul>
                        <li class="<?php echo (is_front_page() || is_home()) ? 'active' : ''; ?>">
                            <a href="<?php echo get_home_url(); ?>"
                                class="<?php echo (is_front_page() || is_home()) ? 'active' : ''; ?>">
                                <button type="button" class="menu-link">
                                    Home
                                </button>
                            </a>
                        </li>
                        <li
                            class="<?php echo (is_post_type_archive('products') || is_tax('products_categories') || is_singular('products')) ? 'active' : ''; ?>">
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
                        <li
                            class="<?php echo (is_page('services') || is_page('submit-a-sketch') || is_page('request-a-quote') || is_page('submit-project')) ? 'active' : ''; ?>">
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
                        <li
                            class="<?php echo (is_page('resources') || is_page('cert-look-up') || is_page('knowledge-center') || is_singular('post')) ? 'active' : ''; ?>">
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
                        <li
                            class="<?php echo (is_page('about') || is_page('contact') || is_page('careers')) ? 'active' : ''; ?>">
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

                <!-- PRODUCT PANEL -->
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
                $taxonomy = 'products_categories';
                $categories = get_terms(array(
                    'taxonomy' => $taxonomy,
                    'hide_empty' => false,
                ));

                if (!empty($categories)) {
                    echo '<ul>';
                    foreach ($categories as $category) {
                        // Check if this category is active
                        $is_active_cat = '';
                        if (is_tax($taxonomy, $category->term_id)) {
                            $is_active_cat = 'active';
                        } elseif (is_singular('products')) {
                            // Check if single product belongs to this category
                            $current_terms = get_the_terms(get_the_ID(), $taxonomy);
                            if ($current_terms && !is_wp_error($current_terms)) {
                                foreach ($current_terms as $term) {
                                    if ($term->term_id == $category->term_id) {
                                        $is_active_cat = 'active';
                                        break;
                                    }
                                }
                            }
                        }

                        echo '<li class="' . $is_active_cat . '">';
                        echo '<button type="button" class="menu-link" data-ref="' . esc_attr($category->slug) . '">';
                        echo esc_html($category->name);
                        echo '<svg class="arrow-right d-sm-ib" fill="#fff" height="10px" width="10px" viewBox="0 0 185.4 300"><path d="M7.3 292.7c-9.8-9.8-9.8-25.6 0-35.4L114.6 150 7.3 42.7c-9.8-9.8-9.8-25.6 0-35.4s25.6-9.8 35.4 0L185.4 150 42.7 292.7c-4.9 4.8-11.3 7.3-17.7 7.3-6.4 0-12.7-2.5-17.7-7.3z"></path></svg>';
                        echo '</button>';
                        echo '</li>';
                    }
                    echo '</ul>';
                }
            ?>
                </div>

                <!-- SERVICE PANEL -->
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
                        <li class="<?php echo is_page('submit-a-sketch') ? 'active' : ''; ?>">
                            <a href="<?php echo get_home_url(); ?>/submit-a-sketch/"
                                class="<?php echo is_page('submit-a-sketch') ? 'active' : ''; ?>">SUBMIT A SKETCH</a>
                        </li>
                        <li class="<?php echo is_page('request-a-quote') ? 'active' : ''; ?>">
                            <a href="<?php echo get_home_url(); ?>/request-a-quote"
                                class="<?php echo is_page('request-a-quote') ? 'active' : ''; ?>">REQUEST A QUOTE</a>
                        </li>
                        <li class="<?php echo is_page('submit-project') ? 'active' : ''; ?>">
                            <a href="<?php echo get_home_url(); ?>/submit-project"
                                class="<?php echo is_page('submit-project') ? 'active' : ''; ?>">SUBMIT A PROJECT</a>
                        </li>
                    </ul>
                </div>

                <!-- RESOURCE PANEL -->
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
                        <li class="<?php echo is_page('cert-look-up') ? 'active' : ''; ?>">
                            <a href="<?php echo get_home_url(); ?>/cert-look-up"
                                class="<?php echo is_page('cert-look-up') ? 'active' : ''; ?>">CERT LOOK UP</a>
                        </li>
                        <li class="<?php echo is_page('knowledge-center') || is_singular('post') ? 'active' : ''; ?>">
                            <a href="<?php echo get_home_url(); ?>/knowledge-center"
                                class="<?php echo is_page('knowledge-center') || is_singular('post') ? 'active' : ''; ?>">KNOWLEDGE
                                CENTER</a>
                        </li>
                    </ul>
                </div>

                <!-- COMPANY PANEL -->
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
                        <li class="<?php echo is_page('about') ? 'active' : ''; ?>">
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
                        <li class="<?php echo is_page('contact') ? 'active' : ''; ?>">
                            <a href="<?php echo get_home_url(); ?>/contact"
                                class="<?php echo is_page('contact') ? 'active' : ''; ?>">Contact Us</a>
                        </li>
                        <li class="<?php echo is_page('careers') ? 'active' : ''; ?>">
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

                <!-- ABOUT PANEL -->
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
                        <li class="<?php echo is_page('about') ? 'active' : ''; ?>"><a
                                href="<?php echo get_home_url(); ?>/about/#our_team"
                                class="<?php echo is_page('about') ? 'active' : ''; ?>">MEET THE TEAM </a></li>
                        <li class="<?php echo is_page('about') ? 'active' : ''; ?>"><a
                                href="<?php echo get_home_url(); ?>/about/#facility"
                                class="<?php echo is_page('about') ? 'active' : ''; ?>">FACILITY </a></li>
                        <li class="<?php echo is_page('about') ? 'active' : ''; ?>"><a
                                href="<?php echo get_home_url(); ?>/about/#facility"
                                class="<?php echo is_page('about') ? 'active' : ''; ?>">QUALITY</a></li>
                        <li><a href="<?php echo get_home_url(); ?>/coming-soon">MANAGEMENT</a></li>
                    </ul>
                </div>

                <!-- CONTACT PANEL (Structure Fixed) -->
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
                        <li class="<?php echo is_page('contact') ? 'active' : ''; ?>"><a
                                href="<?php echo get_home_url(); ?>/contact"
                                class="<?php echo is_page('contact') ? 'active' : ''; ?>">CONTACT US </a></li>
                    </ul>
                </div>

                <!-- OPENINGS PANEL -->
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
                        <li class="<?php echo is_page('careers') ? 'active' : ''; ?>"><a
                                href="<?php echo get_home_url(); ?>/careers"
                                class="<?php echo is_page('careers') ? 'active' : ''; ?>">POSITIONS</a></li>
                        <li class="<?php echo is_page('careers') ? 'active' : ''; ?>"><a
                                href="<?php echo get_home_url(); ?>/careers"
                                class="<?php echo is_page('careers') ? 'active' : ''; ?>">SUBMIT A RESUME</a></li>
                    </ul>
                </div>

                <!-- sub-menu-2nd-stage product menu -->
                <?php
            $taxonomy = 'products_categories';
            $categories = get_terms(array(
                'taxonomy' => $taxonomy,
                'hide_empty' => false,
            ));

            foreach ($categories as $category) {
                $category_url = get_term_link($category, $taxonomy);
                
                // Check if category or product inside is active
                $is_active_panel = '';
                if (is_tax($taxonomy, $category->term_id)) {
                    $is_active_panel = 'active';
                } elseif (is_singular('products')) {
                     $current_terms = get_the_terms(get_the_ID(), $taxonomy);
                     if ($current_terms && !is_wp_error($current_terms)) {
                         foreach ($current_terms as $term) {
                             if ($term->term_id == $category->term_id) {
                                 $is_active_panel = 'active';
                                 break;
                             }
                         }
                     }
                }

                echo '<div class="menu-panel ' . $is_active_panel . '" data-menu="' . esc_attr($category->slug) . '">';
                echo '<button type="button" class="menu-link menu-header">';
                echo '<svg class="arrow-right d-sm-ib roted" fill="#fff" height="10px" width="10px" viewBox="0 0 185.4 300"><path d="M7.3 292.7c-9.8-9.8-9.8-25.6 0-35.4L114.6 150 7.3 42.7c-9.8-9.8-9.8-25.6 0-35.4s25.6-9.8 35.4 0L185.4 150 42.7 292.7c-4.9 4.8-11.3 7.3-17.7 7.3-6.4 0-12.7-2.5-17.7-7.3z"></path></svg>';
                echo '<span>' . esc_html($category->name) . '</span>';
                echo '</button>';

                $args = array(
                    'post_type' => 'products',
                    'posts_per_page' => -1,
                    'post_status' => 'publish',
                    'tax_query' => array(
                        array(
                            'taxonomy' => $taxonomy,
                            'field' => 'id',
                            'terms' => $category->term_id,
                        ),
                    ),
                );

                $products_query = new WP_Query($args);

                if ($products_query->have_posts()) {
                    echo '<ul>';
                    while ($products_query->have_posts()) {
                        $products_query->the_post();
                        $is_active_product = (get_the_ID() == get_queried_object_id()) ? 'active' : '';
                        echo '<li class="' . $is_active_product . '"><a href="' . get_permalink() . '" class="' . $is_active_product . '">' . get_the_title() . '</a></li>';
                    }
                    echo '</ul></div>';
                    wp_reset_postdata();
                } else {
                    echo 'No products found in this category.</div>';
                }
            }
        ?>

            </nav>
        </header>



        <div class="tpsideinfo__content mb-60">
            <p class=" d-none d-xl-block">Our mission is to ensure the generation of accurate and precise findings.</p>
            <span>Contact Us</span>
            <a href="#"><i class="fa-solid fa-star"></i>80 Gravel Pike Building D Red Hill, PA 18076​ </a>
            <a href="tel:267-313-4534"><i class="fa-solid fa-star"></i>(267)-313-4534</a>
            <a href="#">
                <i class="fa-solid fa-star"></i>
                MONDAY - FRIDAY 09:00 AM - 05:00 PM
            </a>
            <a href="mailto:info@bpssu.com"><i class="fa-solid fa-star"></i>info@bpssu.com</a>
        </div>

        <!-- <div class="tpsideinfo__content-inputarea mb-60 d-none d-xl-block">
            <span>Get Update</span>
            <div class="tpsideinfo__content-inputarea-input">
               <form action="#">
                  <input type="email" placeholder="Enter Mail">
                  <button class="tpsideinfo__content-inputarea-input-btn"><i class="fa-solid fa-paper-plane"></i></button>
               </form>
            </div>
         </div>

         <div class="tpsideinfo__gallery mb-35 d-none d-xl-block">
            <span>Cheack Instagram Post</span>
            <div class="tpsideinfo__gallery-item">
               <a href="<?php echo get_stylesheet_directory_uri() ;?>/assets/img/blog/blog-in-01.jpg" class="popup-image"><img src="<?php echo get_stylesheet_directory_uri() ;?>/assets/img/blog/blog-in-01.jpg" alt=""></a>
               <a href="<?php echo get_stylesheet_directory_uri() ;?>/assets/img/blog/blog-in-02.jpg" class="popup-image"><img src="<?php echo get_stylesheet_directory_uri() ;?>/assets/img/blog/blog-in-02.jpg" alt=""></a>
               <a href="<?php echo get_stylesheet_directory_uri() ;?>/assets/img/blog/blog-in-03.jpg" class="popup-image"><img src="<?php echo get_stylesheet_directory_uri() ;?>/assets/img/blog/blog-in-03.jpg" alt=""></a>
            </div>
         </div> -->

        <!-- <div class="tpsideinfo__socialicon">
            <a href="#"><i class="fa-brands fa-youtube"></i></a>
            <a href="#"><i class="fa-brands fa-twitter"></i></a>
            <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
            <a href="#"><i class="fa-brands fa-skype"></i></a>
         </div> -->
    </div>
    <!-- sidebar-info-end -->
    <div class="body-overlay"></div>