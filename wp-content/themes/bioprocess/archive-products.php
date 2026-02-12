<?php
/**
 * The template for displaying archive pages - COMPLETE VERSION WITH PRODUCT COUNTS
 */
get_header();
?>

<main>
    <section class="breadcrumb__area pt-100 pb-120 breadcrumb__overlay"
        data-background="<?php echo get_stylesheet_directory_uri() ;?>/assets/img/banner/product-banner.jpg">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-7 col-12">
                    <div class="tp-breadcrumb">
                        <?php if (is_post_type_archive('products')) : ?>
                        <h2 class="tp-breadcrumb__title">Products</h2>
                        <?php elseif (is_tax('products_categories')) : 
                            $term = get_queried_object(); ?>
                        <h2 class="tp-breadcrumb__title"><?php echo $term->name; ?></h2>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CONTENT -->
    <section class="services-area pt-50 pb-50 grey-bg" data-background="assets/img/shape/shape-bg-01.png">
        <div class="container">
            <div class="row text-center mb-50">
                <div class="col-lg-12">
                    <div class="tp-section f-size">
                        <?php if (is_post_type_archive('products')) : ?>
                        <span class="tp-section__sub-title left-line right-line mb-20">Product Categories</span>
                        <?php else : ?>
                        <span class="tp-section__sub-title left-line right-line mb-20">Products</span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- ✅ MAIN PRODUCTS PAGE: All Categories + PRODUCT COUNT -->
            <?php if (is_post_type_archive('products')) : ?>
            <div class="row">
                <?php 
                $categories = get_terms(array(
                    'taxonomy' => 'products_categories',
                    'hide_empty' => false,
                ));
                if (!empty($categories) && !is_wp_error($categories)) {
                    foreach ($categories as $category) {
                        $term_id = $category->term_id;
                        $category_link = get_term_link($category, 'products_categories');
                        
                        // ✅ PRODUCT COUNT FUNCTION
                        $products_in_category = get_posts(array(
                            'post_type' => 'products',
                            'post_status' => 'publish',
                            'posts_per_page' => -1,
                            'fields' => 'ids',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'products_categories',
                                    'field' => 'term_id',
                                    'terms' => $term_id,
                                ),
                            ),
                        ));
                        $category_count = count($products_in_category);
                        $full_desc = trim(strip_tags($category->description));
                        $character_limit = 290;

                        if (strlen($full_desc) > $character_limit) {
                            $short_desc = substr($full_desc, 0, $character_limit) . '...';
                            $show_read_more = true;
                        } else {
                            $short_desc = $full_desc;
                            $show_read_more = false;
                        }
                ?>
                <div class="col-xl-4 col-md-6 mb-40">
                    <div class="services-item">
                        <div
                            class="services-item__icon <?php echo get_field('icon_color', 'term_'.$term_id); ?>-icon mb-30">
                            <?php echo get_field('category_icon', 'term_'.$term_id); ?>
                        </div>
                        <div class="services-item__content">
                            <h4 class="services-item__tp-title mb-30">
                                <a href="<?php echo $category_link; ?>">
                                    <?php echo $category->name; ?>
                                </a>
                            </h4>
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
                            <div class="services-item__btn">
                                <a class="btn-hexa <?php echo get_field('icon_color', 'term_'.$term_id); ?>-hexa"
                                    href="<?php echo $category_link; ?>">
                                    <i></i>View More
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }} ?>
            </div>

            <!-- ✅ CATEGORY PAGE: Products List + TOTAL COUNT -->
            <?php elseif (is_tax('products_categories')) : 
                $term = get_queried_object();
                $term_id = $term->term_id;
                
                // ✅ TOTAL PRODUCTS IN CATEGORY
                $total_products_in_category = get_posts(array(
                    'post_type' => 'products',
                    'post_status' => 'publish',
                    'posts_per_page' => -1,
                    'fields' => 'ids',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'products_categories',
                            'field' => 'term_id',
                            'terms' => $term_id,
                        ),
                    ),
                ));
                $total_count = count($total_products_in_category);
            ?>

            <!-- ✅ SHOW TOTAL COUNT AT TOP -->
            <div class="row mb-40">
                <div class="col-12 text-center">
                    <h3 style="margin-bottom: 0;">
                        <?php echo $term->name; ?>
                        <span style="color: #666; font-size: 18px;">(<?php echo $total_count; ?> Products)</span>
                    </h3>
                </div>
            </div>

            <?php
                $products_args = array(
                    'post_type' => 'products',
                    'posts_per_page' => 12,
                    'post_status' => 'publish',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'products_categories',
                            'field'    => 'term_id',
                            'terms'    => $term->term_id,
                        ),
                    ),
                );
                $products_query = new WP_Query($products_args);
            ?>

            <?php if ($products_query->have_posts()) : ?>
            <div class="row">
                <?php while ($products_query->have_posts()) : $products_query->the_post(); ?>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="product-card">
                        <?php if (has_post_thumbnail()) : ?>
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('medium', array('class' => 'img-fluid')); ?>
                        </a>
                        <?php endif; ?>
                        <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                        <?php the_excerpt(); ?>
                    </div>
                </div>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
            <?php else : ?>
            <div class="row">
                <div class="col-12 text-center">
                    <p>No products found in this category.</p>
                </div>
            </div>
            <?php endif; 
            endif; ?>
        </div>
    </section>
</main>
<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.read-more-toggle').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();

            const container = this.closest('.card-desc');
            const shortText = container.querySelector('.short-desc');
            const fullText = container.querySelector('.full-desc');

            if (fullText.style.display === 'none') {
                fullText.style.display = 'inline';
                shortText.style.display = 'none';
                this.textContent = 'Read less';
            } else {
                fullText.style.display = 'none';
                shortText.style.display = 'inline';
                this.textContent = 'Read more';
            }
        });
    });
});
</script>

<?php get_footer(); ?>