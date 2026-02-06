<?php 
/**
 * Template Name: Products
 */
get_header();
?>
<!-- main-area -->
      <main>

         <!-- breadcrumb-area -->
         <section class="breadcrumb__area pt-100 pb-120 breadcrumb__overlay" data-background="<?php echo get_stylesheet_directory_uri() ;?>/assets/img/banner/product-banner.jpg">
            <div class="container">
               <div class="row align-items-center">
                  <div class="col-lg-6 col-md-7 col-12">
                     <div class="tp-breadcrumb">
                        <h2 class="tp-breadcrumb__title">Product</h2>
                     </div>
                  </div>
                  <!-- <div class="col-lg-6 col-md-5 col-12">
                     <div class="tp-breadcrumb__link d-flex align-items-center">
                        <span>Bioprocess Supplies : <a href=""> Product-Category</a></span>
                     </div>
                  </div> -->
               </div>
            </div>
         </section>
         <!-- breadcrumb-area-end -->
         <!-- <section class="p-details-section">
            <div class="container">
               <div class="row d-flex align-items-center">
                  <div class="col-sm-12 col-md-4">
                     <div class="p-details-img">
                        <img src="<?php echo get_stylesheet_directory_uri() ;?>/assets/img/banner/banner.jpg" alt="appoinment-img">
                     </div>
                  </div> 
                  <div class="col-sm-12 col-md-8">
                     <div class="tp-section">
                        <h2 class="tp-section__title mb-70">Our Product</h2>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                     </div>
                  </div> 
               </div>
            </div>
         </section> -->
         <!-- services-area -->
         <section class="services-area pt-50 pb-50 grey-bg" data-background="assets/img/shape/shape-bg-01.png">
            <div class="container">
               <div class="row text-center">
                  <div class="col-lg-12 col-md-12 col-12">
                     <div class="tp-section f-size">
                        <span class="tp-section__sub-title left-line right-line mb-20">Product Category</span>
                        <!-- <h3 class="tp-section__title mb-70">Product Category</h3> -->
                     </div>
                  </div>
               </div>
               <div class="row">
                  <?php 
                     $taxonomy = 'products_categories';
                     $object_type = 'produts';

                     $categories = get_terms( array(
                        'taxonomy' => $taxonomy,
                        'object_type' => array( $object_type ),
                        'hide_empty' => false, 
                     ) );
                  
                     if ( ! empty( $categories ) && ! is_wp_error( $categories ) ) {
                        foreach ( $categories as $category ) {
                           $term = $category->term_id;
                           $category_link = get_term_link( $category, $taxonomy );
                           $category_description = $category->description;
                           ?>
                           <div class="col-xl-3 col-md-6">
                              <div class="services-item mb-40">
                                 <div class="services-item__icon <?php echo get_field('icon_color', 'term_'.$term); ?>-icon  mb-30">
                                    <?php echo get_field('category_icon', 'term_'.$term); ?>
                                    <?php //echo $category->term_id ;?>
                                 </div>
                                 <div class="services-item__content">
                                    <h4 class="services-item__tp-title mb-30"><a href="<?php echo $category_link ;?>"><?php echo  $category->name ;?></a></h4>
                                    <p>
                                       <?php
                                          $category_description = $category->description;
                                          $character_limit = 100; 

                                          if (strlen($category_description) > $character_limit) {
                                             $category_description = substr($category_description, 0, $character_limit) . '...';
                                          }
                                          echo $category_description;
                                       ?>
                                    </p>
                                    <div class="services-item__btn">
                                       <a class="btn-hexa <?php echo get_field('icon_color', 'term_'.$term); ?>-hexa" href="<?php echo $category_link ;?>"><i></i>View More</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <?php
                        }
                     }
                  ?>
                    

               </div>
            </div>
         </section>
         <!-- services-area-end -->

         <!-- choose-area -->
         <!-- <section class="choose-area theme-bg pt-120 pb-130">
            <div class="container">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="tp-section text-center">
                        <span class="tp-section__sub-title left-line right-line mb-25">Our Specialists</span>
                        <h3 class="tp-section__title title-white mb-85">Why Choose Us</h3>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-xl-3 col-md-6">
                     <div class="tp-choose__item ml-15 mb-100 wow fadeInUp" data-wow-delay=".2s">
                        <div class="tp-choose__icon mb-40">
                           <?php echo get_field('choose_us_point_1_icon') ;?>
                        </div>
                        <div class="tp-choose__content">
                           <h4 class="tp-choose__title mb-20"><?php echo get_field('choose_us_point_1_title') ;?></h4>
                           <p><?php echo get_field('choose_us_point_1_content') ;?></p>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-3 col-md-6">
                     <div class="tp-choose__item ml-35 mb-100 wow fadeInUp" data-wow-delay=".4s">
                        <div class="tp-choose__icon <?php echo get_field('choose_us_point_2_icon_color') ;?>-icon mb-40">
                           <?php echo get_field('choose_us_point_2_icon') ;?>
                        </div>
                        <div class="tp-choose__content">
                           <h4 class="tp-choose__title mb-20"><?php echo get_field('choose_us_point_2_title') ;?></h4>
                           <p><?php echo get_field('choose_us_point_2_content') ;?></p>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-3 col-md-6">
                     <div class="tp-choose__item ml-55 mb-100 wow fadeInUp" data-wow-delay=".6s">
                        <div class="tp-choose__icon <?php echo get_field('choose_us_point_3_icon_color') ;?>-icon mb-40">
                           <?php echo get_field('choose_us_point_3_icon') ;?>
                        </div>
                        <div class="tp-choose__content">
                           <h4 class="tp-choose__title mb-20"><?php echo get_field('choose_us_point_3_title') ;?></h4>
                           <p><?php echo get_field('choose_us_point_3_content') ;?></p>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-3 col-md-6">
                     <div class="tp-choose__item ml-75 mb-100 wow fadeInUp" data-wow-delay=".8s">
                        <div class="tp-choose__icon <?php echo get_field('choose_us_point_4_icon_color') ;?>-icon mb-40">
                           <?php echo get_field('choose_us_point_4_icon') ;?>
                        </div>
                        <div class="tp-choose__content">
                           <h4 class="tp-choose__title mb-20"><?php echo get_field('choose_us_point_4_title') ;?></h4>
                           <p><?php echo get_field('choose_us_point_4_content') ;?></p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row text-center">
                  <div class="col-lg-12">
                     <div class="tp-choose-option">
                        <span>Laboratories Used For Scientific Research : <a href="contact.html">Take Many Forms<i class="fa-solid fa-arrow-right"></i></a></span>
                     </div>
                  </div>
               </div>
            </div>
         </section> -->
         <!-- choose-area-end -->

         <!-- support-area -->
         <!-- <section class="support-area grey-bg pt-125 pb-130">
            <div class="container">
               <div class="row text-center">
                  <div class="col-lg-12 col-md-12 col-12">
                     <div class="tp-section">
                        <span class="tp-section__sub-title left-line right-line mb-20">Get in touch</span>
                        <h3 class="tp-section__title mb-70">Need Any Help</h3>
                     </div>
                  </div>
               </div>
               <div class="row justify-content-center">
                  <div class="col-lg-10 col-md-12 col-12">
                     <div class="tp-support-form text-center">
                        <span>Derect Contact with us</span>
                        <form action="#">
                           <input type="text" placeholder="Enter your Name">
                           <input type="text" placeholder="Enter your Mail">
                           <textarea name="massage" placeholder="Type your massage"></textarea>
                        </form>
                        <div class="tp-support-form__btn">
                           <button class="tp-btn">Send Massage</button>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section> -->
         <!-- support-area-end -->

      </main>
      <!-- main-area-end -->
<?php get_footer() ;?>