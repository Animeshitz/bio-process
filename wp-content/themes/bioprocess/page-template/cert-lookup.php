<?php

/**
 * Template Name: Cert Lookup
 */
get_header();
?>
<?php
$search_term = [];
if (isset($_REQUEST['cert'])) {
    $search = $_REQUEST['cert'];
    $sql = "select * from wp_posts where post_title='" . trim($search) . "' and post_status='publish' and post_type='certificates' and DATEDIFF(CURDATE(), post_date) <= 180";
    $search_term = $wpdb->get_results($sql);
    // echo "<pre>";
    // print_r($search_term);
    // echo "</pre>";
}

?>
<main>
    <!-- breadcrumb-area -->
    <section class="breadcrumb__area pt-100 pb-120 breadcrumb__overlay" data-background="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/banner/about-banner.jpg">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-7 col-lg-12 col-md-12 col-12">
                    <div class="tp-breadcrumb">
                        <h2 class="tp-breadcrumb__title">Certificates</h2>
                    </div>
                </div>
                <!-- <div class="col-xl-5 col-lg-12 col-md-12 col-12">
                    <div class="tp-breadcrumb__link text-xl-end">
                    <span>Bioprocess Supplies : <a href="services-01.html"> Career</a></span>
                    </div>
                </div> -->
            </div>
        </div>
    </section>

    <section class="p-details-section">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-sm-12 col-md-4">
                    <div class="p-details-img">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/certificate-award.jpg" alt="appoinment-img">
                    </div>
                </div>
                <div class="col-sm-12 col-md-8">
                    <div class="tp-section">
                        <h2 class="tp-section__title mb-70">Certificate of Compliance Look Up</h2>
                        <p>Misplaced certificates happen- utilize our certificate of compliance look up tool to help complete your documentation without slowing the process down. We store certificates from the past 90 days. </p>
                        <p>Search for certificates by entering lot number exactly as depicted on part label. 
If you need certificates from longer than 90 days ago, feel free to <a href="/contact">contact us</a> and we will be happy to help.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="services-area pt-50 pb-50 grey-bg pb-50" data-background="assets/img/shape/shape-bg-01.png">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="tp-section f-size">
                        <span class="tp-section__sub-title left-line right-line mb-20">Search Certificates</span>
                        <!-- <h3 class="tp-section__title mb-70">Product Category</h3> -->
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- <form method="post" action="">
                    <input type="text" name="title">
                    <input type="submit" name="s_submit" value="submit">
                </form> -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="search-form">
                            <!-- <form id="search_form">
                                <input type="text" name="s" id="search_input" placeholder="Search for Certificates" required>
                                <button class="tp-btn search-btn" type="submit">Search Here <i class="fa-light fa-magnifying-glass ml-5"></i></button>
                            </form> -->
                            <form id="search_form_" method="GET" action="">
                                <input type="text" name="cert" <?php if (isset($_REQUEST['cert'])) { ?> value="<?php echo $search; ?>" <?php  } ?> id="search_input_" placeholder="Search for Certificates" required>
                                <button class="tp-btn search-btn" type="submit">Search Here <i class="fa-light fa-magnifying-glass ml-5"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div id="search_results">
                    <?php
                    if (isset($_REQUEST['cert'])) {
                        if (!empty($search_term)) {
                            foreach ($search_term as $cert) {
                    ?>
                                <article id="post-<?php $cert->ID; ?>" class="post-<?php $cert->ID; ?> type-certificates status-publish hentry entry">
                                    <div class="icon-sec">
                                        <i class="pdf">
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/pdf.png" alt="pdf-img">
                                        </i>
                                    </div>
                                    <div class="_cont-sec">
                                        <h2><a href="<?php echo the_field('upload_pdf_file', $cert->ID) ?>" target="_blank"><?php echo $cert->post_title; ?></a></h2>
                                        <p>Description of Certificate</p>
                                        <a href="<?php echo the_field('upload_pdf_file', $cert->ID) ?>" target="_blank">View PDF</a>
                                    </div>
                                </article>
                    <?php
                            }
                        } else {
                            echo "<p>No result found</p>";
                        }
                    }
                    ?>
                </div>
            </div>
    </section>
</main>





<?php get_footer(); ?>