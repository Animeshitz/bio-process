<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header(); ?>
<?php
$tab_count = 0;

if (get_the_content()) $tab_count++;
if (get_field('benefites')) $tab_count++;
if (have_rows('key_features')) $tab_count++;
if (have_rows('table_row')) $tab_count++;
?>
<style>
.pro-details-nav-btn.single-tab .nav-links {
    cursor: default !important;
    pointer-events: none;
}
</style> <!-- main-area -->
<main>

    <!-- breadcrumb-area -->

    <?php if (get_field('product_banner')): ?>
    <section class="breadcrumb__area pt-100 pb-120 breadcrumb__overlay"
        data-background="<?php the_field('product_banner'); ?>">
        <?php else: ?>
        <section class="breadcrumb__area pt-100 pb-120 breadcrumb__overlay"
            data-background="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/banner/product-banner.jpg">
            <?php endif; ?>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-7 col-lg-12 col-md-12 col-12">
                        <div class="tp-breadcrumb">
                            <h2 class="tp-breadcrumb__title"><?php the_title(); ?></h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb-area-end -->

        <!-- shope-details-area -->
        <section class="shop-area pt-120 pb-70">
            <div class="container">
                <div class="shop-left-right ">
                    <div class="row">
                        <div class="col-lg-6 col-md-12 ">
                            <!-- <div class="productthumb mb-40 wow fadeInRighLeft" data-wow-delay=".4s">
                           <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );  ?>" alt="product-thumb">
                        </div> -->
                            <div class="swiper-container p-details-slider">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );  ?>"
                                            alt="product-thumb">
                                    </div>
                                    <?php if( have_rows('slider_images') ): ?>

                                    <?php while( have_rows('slider_images') ): the_row(); 
                                    $image_url = get_sub_field('upload_image');
                                    
                                    if( $image_url ):
                                    ?>
                                    <div class="swiper-slide">
                                        <img src="<?php echo esc_url($image_url); ?>" alt="product-thumb">
                                    </div>
                                    <?php endif; ?>

                                    <?php endwhile; ?>

                                    <?php endif; ?>
                                </div>
                                <!-- Add Arrows -->
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="product mb-40 ml-20 wow fadeInRighRight" data-wow-delay=".4s">
                                <div class="product__details-content mb-40">
                                    <h5 class="product-dtitle mb-20"><?php the_title(); ?></h5>
                                    <p><?php echo get_the_excerpt() ;?></p>
                                    <?php echo get_field('product_specification') ;?>

                                    <?php 
                                        if( have_rows('product_literature') ):
                                    ?>
                                    <div class="p-literature">
                                        <h5>Downloadable Content</h5>
                                        <ul>
                                            <?php 
                                                while ( have_rows('product_literature') ) : the_row(); 
                                            ?>
                                            <li>
                                                <a href="<?php echo the_sub_field('literature_file') ;?>"
                                                    target="_blank"><i class="pdf-icon"><img
                                                            src="<?php echo get_stylesheet_directory_uri() ;?>/assets/img/shop/pdf-icon.png"
                                                            alt="pdf-icon"></i>
                                                    <span><?php echo the_sub_field('literature_file_title') ;?></span>
                                                </a>
                                            </li>

                                            <?php
                                            endwhile;
                                            ?>
                                        </ul>
                                    </div>
                                    <?php
                                        endif;
                                    ?>
                                </div>
                                <div class="product-button">
                                    <a href="<?php echo get_home_url() ;?>/contact/?sub=<?php the_title(); ?>"
                                        class="tp-btn mr-20">Request Information</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="productdetails pt-35 pb-75">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="product-additional-tab">
                                <div class="pro-details-nav mb-40">
                                    <ul class="nav nav-tabs pro-details-nav-btn <?php echo ($tab_count == 1) ? 'single-tab' : ''; ?>"
                                        id="myTabs" role="tablist">

                                        <!-- <ul class="nav nav-tabs pro-details-nav-btn" id="myTabs" role="tablist"> -->
                                        <?php
                                        if (get_the_content()) { ?>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-links active" id="home-tab-1" data-bs-toggle="tab"
                                                data-bs-target="#home-1" type="button" role="tab" aria-controls="home-1"
                                                aria-selected="true">Product Details</button>
                                        </li>
                                        <?php } ?>

                                        <?php 
                                        if (get_field('benefites')) { ?>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-links" id="banefit-tab" data-bs-toggle="tab"
                                                data-bs-target="#banefit-information" type="button" role="tab"
                                                aria-controls="banefit-information"
                                                aria-selected="false">Benefits</button>
                                        </li>
                                        <?php } ?>
                                        <?php if( have_rows('key_features') ) {?>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-links" id="information-tab" data-bs-toggle="tab"
                                                data-bs-target="#additional-information" type="button" role="tab"
                                                aria-controls="additional-information" aria-selected="false">Key
                                                Features</button>
                                        </li>
                                        <?php } ?>
                                        <?php if (have_rows('table_row')) {?>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-links" id="data-table-tab" data-bs-toggle="tab"
                                                data-bs-target="#data-information" type="button" role="tab"
                                                aria-controls="data-information" aria-selected="false">Products
                                                Characteristics</button>
                                        </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                                <div class="tab-content tp-content-tab" id="myTabContent-2">
                                    <div class="tab-para tab-pane fade show active" id="home-1" role="tabpanel"
                                        aria-labelledby="home-tab-1">
                                        <p class="mb-30">
                                            <?php
                                          if (have_posts()) {
                                              while (have_posts()) {
                                                  the_post();
                                                  the_content();
                                              }
                                          } else {
                                              echo '<p>Product not available</p>';
                                          }
                                       ?>
                                        </p>
                                    </div>
                                    <div class="tab-pane fade" id="banefit-information" role="tabpanel"
                                        aria-labelledby="information-tab">
                                        <div class="product__details-info table-responsive">
                                            <?php echo get_field('benefites') ;?>

                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="additional-information" role="tabpanel"
                                        aria-labelledby="information-tab">
                                        <div class="product__details-info table-responsive">
                                            <table class="table table-striped">
                                                <tbody>
                                                    <?php 
                                                if( have_rows('key_features') ):
                                                while ( have_rows('key_features') ) : the_row(); 
                                             ?>
                                                    <tr>
                                                        <td class="add-info"><?php echo the_sub_field('title') ;?>
                                                        </td>
                                                        <td class="add-info-list">
                                                            <?php echo the_sub_field('details') ;?></td>
                                                    </tr>

                                                    <?php
                                                endwhile;
                                                endif;
                                             ?>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="data-information" role="tabpanel"
                                        aria-labelledby="information-tab">
                                        <ul class="data-table">
                                            <li class="table-header">
                                                <ul class="header-content">
                                                    <?php if (have_rows('heading')) :
                                                   while (have_rows('heading')) : the_row(); ?>
                                                    <?php if(get_sub_field('table_heading_title')){ ?>
                                                    <li><?php the_sub_field('table_heading_title'); ?></li>
                                                    <?php }
                                                   endwhile;
                                                endif; ?>
                                                </ul>
                                            </li>
                                            <li class="table-content">
                                                <?php if (have_rows('table_row')) :
                                             $headings = get_field('heading'); 
                                             $headingCount = count($headings);

                                             while (have_rows('table_row')) : the_row(); ?>
                                                <ul class="data-content">
                                                    <?php for ($i = 1; $i <= $headingCount; $i++) : ?>
                                                    <?php if(get_sub_field('point_'.$i)) {?>
                                                    <li><?php the_sub_field('point_' . $i); ?></li>
                                                    <?php }
                                                   endfor; ?>
                                                </ul>
                                                <?php endwhile;
                                             endif; ?>
                                            </li>
                                        </ul>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            </div>
        </section>
        <!-- shope-details-area-end -->

</main>
<!-- main-area-end -->

<?php get_footer() ;?>