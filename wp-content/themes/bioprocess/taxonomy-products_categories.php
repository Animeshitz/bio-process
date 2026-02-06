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
  <section class="breadcrumb__area pt-100 pb-120 breadcrumb__overlay" data-background="<?php the_field('banner', $queried_object); ?>">
 <?php else: ?>

<section class="breadcrumb__area pt-100 pb-120 breadcrumb__overlay" data-background="<?php echo get_stylesheet_directory_uri() ;?>/assets/img/banner/product-banner.jpg">
<?php endif; ?>

    <div class="container">
        <div class="row align-items-center">
          <div class="col-xl-7 col-lg-12 col-md-12 col-12">
              <div class="tp-breadcrumb">
                <h2 class="tp-breadcrumb__title"><?php echo single_cat_title() ;?></h2>
              </div>
          </div>
          <p>


            
          
          </p>     
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
  <div class="shop-area pb-50">
    <div class="container">
        <div class="row">
          <?php 
            query_posts($query_string . '&order=DESC'); 
            if ( have_posts() ) : 
              while ( have_posts() ) : 
                the_post(); ?>
                <div class="col-xl-3 col-lg-4 col-md-4">
                  <div class="tpshopitem mb-50 wow fadeInUp" data-wow-delay=".2s">
                    <div class="tpshopitem__thumb p-relative fix mb-35">
                        <a href="<?php echo get_permalink( $id )?> "><img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) ); ?>" alt="shop-thumb"></a>
                        <div class="tpshopitem__thumb-icon">
                          <a href="<?php echo get_permalink( $id )?>"><i class="fal fa-eye"></i></a>
                        </div>
                    </div>
                    <div class="tpshopitem__content">
                        <span class="tpshopitem__title mb-5"><a href="<?php echo get_permalink( $id )?>"><?php the_title(); ?></a></span>
                        <p>
                            <?php
                            $excerpt = get_the_excerpt(); 
                            $excerpt_length = 80; 
                            
                            if (strlen($excerpt) > $excerpt_length) {
                                // Trim the excerpt to the specified length and add an ellipsis
                                $excerpt = substr($excerpt, 0, $excerpt_length) . '...';
                            }
                            // Output the modified excerpt
                            echo $excerpt;
                            ?>
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

<?php get_footer() ;?>