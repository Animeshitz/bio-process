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
                <div class="productdetails pt-35 pb-75" id="product-tabs">
                    <div class="container">
                        <ul class="nav tp-nav-tavs mb-50 product-tabs-left" id="productTab" role="tablist">

                            <?php if (get_the_content()) { ?>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#product-details"
                                    type="button" role="tab">
                                    Product Details
                                </button>
                            </li>
                            <?php } ?>

                            <?php if (get_field('benefites')) { ?>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#product-benefits"
                                    type="button" role="tab">
                                    Benefits
                                </button>
                            </li>
                            <?php } ?>

                            <?php if (have_rows('key_features')) { ?>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#product-features"
                                    type="button" role="tab">
                                    Key Features
                                </button>
                            </li>
                            <?php } ?>

                            <?php if (have_rows('table_row')) { ?>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#product-characteristics"
                                    type="button" role="tab">
                                    Product Characteristics
                                </button>
                            </li>
                            <?php } ?>

                        </ul>

                        <div class="tab-content">

                            <!-- Product Details -->
                            <div class="tab-pane fade show active" id="product-details" role="tabpanel">
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
                            </div>

                            <!-- Benefits -->
                            <?php if (get_field('benefites')) { ?>
                            <div class="tab-pane fade" id="product-benefits" role="tabpanel">
                                <?php echo get_field('benefites'); ?>
                            </div>
                            <?php } ?>

                            <!-- Key Features -->
                            <?php if (have_rows('key_features')) { ?>
                            <div class="tab-pane fade" id="product-features" role="tabpanel">
                                <table class="table table-striped">
                                    <tbody>
                                        <?php while (have_rows('key_features')) : the_row(); ?>
                                        <tr>
                                            <td><?php the_sub_field('title'); ?></td>
                                            <td><?php the_sub_field('details'); ?></td>
                                        </tr>
                                        <?php endwhile; ?>
                                    </tbody>
                                </table>
                            </div>
                            <?php } ?>

                            <!-- Product Characteristics -->
                            <?php if (have_rows('table_row')) { ?>
                            <div class="tab-pane fade" id="product-characteristics" role="tabpanel">
                                <ul class="data-table">

                                    <!-- Table Header -->
                                    <li class="table-header">
                                        <ul class="header-content">
                                            <?php 
                            if (have_rows('heading')) :
                                while (have_rows('heading')) : the_row();
                                    if (get_sub_field('table_heading_title')) { ?>
                                            <li><?php the_sub_field('table_heading_title'); ?></li>
                                            <?php }
                                endwhile;
                            endif;
                            ?>
                                        </ul>
                                    </li>

                                    <!-- Table Rows -->
                                    <li class="table-content">
                                        <?php
                        if (have_rows('table_row')) :
                            $headings = get_field('heading');
                            $headingCount = count($headings);

                            while (have_rows('table_row')) : the_row(); ?>
                                        <ul class="data-content">
                                            <?php for ($i = 1; $i <= $headingCount; $i++) : ?>
                                            <?php if (get_sub_field('point_' . $i)) { ?>
                                            <li><?php the_sub_field('point_' . $i); ?></li>
                                            <?php } ?>
                                            <?php endfor; ?>
                                        </ul>
                                        <?php endwhile;
                        endif;
                        ?>
                                    </li>

                                </ul>
                            </div>
                            <?php } ?>

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