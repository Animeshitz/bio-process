<?php

/**
 * The template for displaying Product Categories pages
 *
 * Used to display archive-type pages for posts with a post format.
 * If you'd like to further customize these Post Format views, you may create a
 * new template file for each specific one.
 *
 * @todo http://core.trac.wordpress.org/ticket/23257: Add plural versions of Post Format strings
 * and remove plurals below.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress

 * @subpackage Bio Process

 * @since Bio Process
 */
$term = get_queried_object();
if ($term && !is_wp_error($term)) {
    $slug = $term->slug;
    $product_page = get_page_by_path('products/' . $slug);
    
    if ($product_page) {
        wp_redirect(get_permalink($product_page->ID), 301);
        exit;
    }
    // Page না থাকলে normal archive content দেখাবে (নিচের কোড চলবে)
}
get_header(); 

?>
<main>
    <?php
    // vars
    $queried_object = get_queried_object();
    $taxonomy = $queried_object->taxonomy;
    $term_id = $queried_object->term_id;  
    // load desc for this taxonomy term (term object)
    $thumbnail = get_field('banner', $queried_object);
    // load desc for this taxonomy term (term string)
    $thumbnail = get_field('banner', $taxonomy . '_' . $term_id);
  ?>
    <!-- breadcrumb-area -->
    <?php if(get_field('banner', $taxonomy . '_' . $term_id)): ?>
    <!--  For Displaying Custom field image Value -->
    <section class="breadcrumb__area pt-100 pb-120 breadcrumb__overlay"
        data-background="<?php the_field('banner', $queried_object); ?>">
        <?php else: ?>

        <section class="breadcrumb__area pt-100 pb-120 breadcrumb__overlay"
            data-background="<?php echo get_stylesheet_directory_uri() ;?>/assets/img/banner/product-banner.jpg">
            <?php endif; ?>

            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-7 col-lg-12 col-md-12 col-12">
                        <div class="tp-breadcrumb">
                            <h2 class="tp-breadcrumb__title"><?php echo single_cat_title() ;?></h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb-area-end -->
        <div class="pt-50 pb-50">
            <div class="container">
                <div class="row">
                    <h3>Products</h3>
                </div>
            </div>
        </div>

        <!-- shope-area -->
        <div class="taxo shop-area pb-50">
            <div class="container">
                <div class="row">
                    <?php 
                    query_posts($query_string . '&order=DESC'); 
                    if ( have_posts() ) : 
                        while ( have_posts() ) : the_post(); 
                        $full_desc = trim(strip_tags(get_the_excerpt()));
                        $character_limit = 300;

                        if (strlen($full_desc) > $character_limit) {
                            $short_desc = substr($full_desc, 0, $character_limit) . '...';
                            $show_read_more = true;
                        } else {
                            $short_desc = $full_desc;
                            $show_read_more = false;
                        }
                    ?>
                    <div class="col-xl-4 col-lg-4 col-md-4">
                        <div class="tpshopitem mb-50 wow fadeInUp" data-wow-delay=".2s">
                            <div class="tpshopitem__thumb p-relative fix mb-35">
                                <a href="<?php echo get_permalink( $id )?> "><img
                                        src="<?php echo wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) ); ?>"
                                        alt="shop-thumb"></a>
                            </div>
                            <div class="tpshopitem__content">
                                <span class="tpshopitem__title mb-5">
                                    <a href="<?php echo get_permalink( $id )?>"><?php the_title(); ?></a>
                                </span>
                                <p class="card-desc">
                                    <span class="short-desc">
                                        <?php echo $short_desc; ?>
                                    </span>

                                    <?php if ($show_read_more) : ?>
                                    <span class="full-desc" style="display:none;">
                                        <?php echo $full_desc; ?>
                                    </span>

                                    <a href="#" class="read-more-toggle" style="margin-left:5px; font-weight:600;">
                                        Read more
                                    </a>
                                    <?php endif; ?>
                                </p>
                                <a href="<?php echo get_permalink( $id )?>" class="r-more">View Details</a>
                            </div>
                        </div>
                    </div>
                    <?php 
                    endwhile;
                    endif; 
                ?>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="basic-pagination text-center mt-15">
                            <nav>
                                <ul>
                                    <?php 
                                        echo paginate_links( array(
                                            'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
                                            
                                            'current'      => max( 1, get_query_var( 'paged' ) ),
                                            'format'       => '?paged=%#%',
                                            'show_all'     => false,
                                            'type'         => 'plain',
                                            'end_size'     => 2,
                                            'mid_size'     => 1,
                                            'prev_next'    => true,
                                            'prev_text'    => sprintf( '<i></i> %1$s', __( '<i class="fa-light fa-arrow-left-long"></i>', 'text-domain' ) ),
                                            'next_text'    => sprintf( '%1$s <i></i>', __( '<i class="fa-light fa-arrow-right-long"></i>', 'text-domain' ) ),
                                            'add_args'     => false,
                                            'add_fragment' => '',
                                        ) );
                                    ?>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- shope-area-end -->

</main>
<!-- main-area-end -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.read-more-toggle').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();

            const card = this.closest('.tpshopitem'); // ADD
            const container = this.closest('.card-desc');
            const shortText = container.querySelector('.short-desc');
            const fullText = container.querySelector('.full-desc');

            if (fullText.style.display === 'none') {
                fullText.style.display = 'inline';
                shortText.style.display = 'none';
                this.textContent = 'Read less';
                card.classList.add('expanded'); // ADD
            } else {
                fullText.style.display = 'none';
                shortText.style.display = 'inline';
                this.textContent = 'Read more';
                card.classList.remove('expanded'); // ADD
            }
        });
    });
});
</script>

<?php get_footer() ;?>