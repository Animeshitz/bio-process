<?php 
/**
 * Template Name: Inner Page
 */
get_header();
?>
    <main>

        <!-- breadcrumb-area -->
        <section class="breadcrumb__area pt-100 pb-120 breadcrumb__overlay" data-background="<?php echo get_stylesheet_directory_uri() ;?>/assets/img/banner/product-banner.jpg">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-7 col-12">
                        <div class="tp-breadcrumb">
                            <h2 class="tp-breadcrumb__title"><?php echo get_the_title(); ?></h2>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- breadcrumb-area-end -->
        <section class="about-area pt-130 pb-70">
            <div class="container">
                <div class="row">
                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
                    the_content();
                    endwhile; else: ?>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    
    </main>


<?php get_footer() ;?>