<?php

/**
 * Template Name: Blogs 
 * 
 */
get_header();
$twentytwentyone_unique_id = wp_unique_id('search-form-');

$twentytwentyone_aria_label = !empty($args['aria_label']) ? 'aria-label="' . esc_attr($args['aria_label']) . '"' : '';
?>
<!-- main-area -->
<main>

   <!-- breadcrumb-area -->
   <section class="breadcrumb__area pt-100 pb-120 breadcrumb__overlay" data-background="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/banner/blog-banner1.jpg">
      <div class="container">
         <div class="row align-items-center">
            <div class="col-lg-6 col-md-7 col-12">
               <div class="tp-breadcrumb">
                  <h2 class="tp-breadcrumb__title">knowledge center</h2>
               </div>
            </div>
            <!-- <div class="col-lg-6 col-md-5 col-12">
            <div class="tp-breadcrumb__link d-flex align-items-center">
               <span>Bioprocess Supplies : <a href=""> Blog</a></span>
            </div>
         </div> -->
         </div>
      </div>
   </section>
   <!-- breadcrumb-area-end -->

   <!-- postbox area start -->
   <div class="postbox-area pt-120 pb-80">
      <div class="container">
         <div class="row">
            <div class="col-xxl-8 col-xl-8 col-lg-7 col-md-12">
               <div class="postbox pr-20 pb-50">

                  <?php
                  // Main Query to display posts
                  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                  $posts_per_page = 2; // Number of posts to display per page

                  $args = array(
                     'post_type' => 'post',
                     'category_name' => '',
                     'posts_per_page' => $posts_per_page,
                     'paged' => $paged
                  );
                  $query = new WP_Query($args);

                  if ($query->have_posts()) :
                     while ($query->have_posts()) :
                        $query->the_post();

                        // Get the featured image URL
                        $blogs_image = get_the_post_thumbnail_url(get_the_ID());
                  ?>

                        <article class="postbox__item format-image mb-60 transition-3">
                           <div class="postbox__thumb w-img mb-35">
                              <a href="<?php echo get_permalink(); ?>">
                                 <img src="<?php echo $blogs_image; ?>" alt="blog-thumb">
                              </a>
                           </div>
                           <div class="postbox__content">
                              <div class="postbox__meta mb-40">
                                 <span><a href="team-details.html"><i class="fa-regular fa-user"></i>
                                       <?php
                                       // Get the author name, fallback to the default author if not set
                                       $author = get_field('author_name');
                                       echo $author ? $author : get_the_author();
                                       ?>
                                    </a></span>
                                 <span><i class="fa-regular fa-clock"></i> <?php echo get_the_date('M d, Y'); ?></span>
                                 <span><i class="fa-light fa-eye"></i><?php echo get_post_view_count(get_the_ID()); ?></span>
                              </div>
                              <h3 class="postbox__title mb-40">
                                 <a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
                              </h3>
                              <div class="postbox__text mb-40">
                                 <p><?php echo get_field('excerpt'); ?></p>
                              </div>
                              <div class="postbox__read-more">
                                 <a href="<?php echo get_permalink(); ?>" class="tp-btn">Read more</a>
                              </div>
                           </div>
                        </article>

                  <?php
                     endwhile;
                     wp_reset_postdata();
                  endif;
                  ?>

                  <div class="basic-pagination">
                     <nav>
                        <ul>
                           <?php
                           // Display pagination links
                           echo paginate_links(array(
                              'base'         => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
                              'total'        => $query->max_num_pages,
                              'current'      => max(1, get_query_var('paged')),
                              'format'       => '?paged=%#%',
                              'show_all'     => false,
                              'type'         => 'plain',
                              'end_size'     => 2,
                              'mid_size'     => 1,
                              'prev_next'    => true,
                              'prev_text'    => sprintf('<i></i> %1$s', __('<i class="fa-light fa-arrow-left-long"></i>', 'text-domain')),
                              'next_text'    => sprintf('%1$s <i></i>', __('<i class="fa-light fa-arrow-right-long"></i>', 'text-domain')),
                              'add_args'     => false,
                              'add_fragment' => '',
                           ));
                           ?>
                        </ul>
                     </nav>
                  </div>

               </div>
            </div>

            <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-12">
               <div class="sidebar__wrapper pl-25 pb-50">
                  <div class="sidebar__widget mb-45">
                     <div class="sidebar__widget-content">
                        <h3 class="sidebar__widget-title mb-25">Search</h3>
                        <div class="sidebar__search">
                           <form role="search" <?php echo $twentytwentyone_aria_label; ?> method="get" action="<?php echo esc_url(home_url('/')); ?>">
                              <div class="sidebar__search-input-2 p-relative">
                                 <input type="search" id="<?php echo esc_attr($twentytwentyone_unique_id); ?>" class="search-field" value="<?php echo get_search_query(); ?>" name="s" />
                                 <button type="submit"><i class="far fa-search"></i></button>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>

                  <div class="sidebar__widget mb-40">
                     <h3 class="sidebar__widget-title mb-25">Category</h3>
                     <div class="sidebar__widget-content">
                        <?php
                        $categories = get_categories();
                        // Check if there are any categories
                        if ($categories) {
                           echo '<ul>';
                           // Loop through each category
                           foreach ($categories as $category) {
                              // Display category name and link
                              echo '<li><a href="' . get_category_link($category->term_id) . '">' . $category->name . '<span>' . $category->category_count . '<span> </a></li>';
                           }
                           echo '</ul>';
                        }
                        ?>
                     </div>
                  </div>

                  <div class="sidebar__widget mb-55">
                     <h3 class="sidebar__widget-title mb-25">Recent Post</h3>
                     <div class="sidebar__widget-content">
                        <div class="sidebar__post rc__post">

                           <?php
                           // Query to display recent posts in the sidebar
                           $args = array(
                              'post_type' => 'post',
                              'category_name' => '',
                              'posts_per_page' => 5,
                           );
                           $recent_posts_query = new WP_Query($args);

                           if ($recent_posts_query->have_posts()) :
                              while ($recent_posts_query->have_posts()) :
                                 $recent_posts_query->the_post();

                                 // Get the featured image URL
                                 $blogs_image = get_the_post_thumbnail_url(get_the_ID());
                           ?>

                                 <div class="rc__post mb-20 d-flex align-items-center">
                                    <div class="rc__post-thumb">
                                       <a href="<?php echo get_permalink(); ?>"><img src="<?php echo $blogs_image; ?>" alt="blog-sidebar"></a>
                                    </div>
                                    <div class="rc__post-content">
                                       <div class="rc__meta">
                                          <span><?php echo get_the_date('M d, Y'); ?></span>
                                       </div>
                                       <h3 class="rc__post-title">

                                          <a href="<?php echo get_permalink($id) ?>"><?php the_title(); ?></a>
                                       </h3>
                                    </div>
                                 </div>
                           <?php

                              endwhile;
                           endif;
                           ?>
                        </div>
                     </div>
                  </div>
                  <div class="sidebar__widget mb-55">
                     <h3 class="sidebar__widget-title mb-25">Popular Tag</h3>
                     <div class="sidebar__widget-content">
                        <div class="tagcloud">
                           <?php
                           $tags = get_tags();

                           // Loop through the tags and display the names
                           foreach ($tags as $tag) {
                              echo '<a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a>';
                           }
                           ?>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- postbox area end -->

</main>
<!-- main-area-end -->
<?php get_footer(); ?>