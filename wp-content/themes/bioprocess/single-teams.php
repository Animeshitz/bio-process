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

<!-- main-area -->
      <main>

         <!-- breadcrumb-area -->
         <section class="breadcrumb__area pt-100 pb-120 breadcrumb__overlay" data-background="<?php echo get_stylesheet_directory_uri() ;?>/assets/img/team/team-banner.jpg">
            <div class="container">
               <div class="row align-items-center">
                  <div class="col-xl-7 col-lg-12 col-md-12 col-12">
                     <div class="tp-breadcrumb">
                        <h2 class="tp-breadcrumb__title">Team Details</h2>
                     </div>
                  </div>
                  <div class="col-xl-5 col-lg-12 col-md-12 col-12">
                     <div class="tp-breadcrumb__link text-xl-end">
                        <span>Bioprocess Supplies : <a href="team-details.html"> Team Details</a></span>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- breadcrumb-area-end -->

         <!-- team-details-area -->
         <section class="team-details-area pt-130 pb-70">
            <div class="container">
               <div class="row">
                  <div class="col-lg-5 col-md-6">
                     <div class="tp-team-dtls__thumb mb-50">
                        <?php if (has_post_thumbnail( $post->ID ) ): ?>
                        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                        <img src="<?php echo $image[0]; ?>" alt="team-thumb">
                        <?php endif; ?>

                        
                     </div>
                  </div>
                  <div class="col-lg-4 col-md-6">
                     <div class="tp-team-dtls__content mt-50 mb-50">
                        <h4 class="tp-team-dtls__title mb-10"><a href="team-01.html"><?php echo single_post_title() ;?></a></h4>
                        <span class="mb-35"><?php echo get_field('designation') ;?></span>
                        <p><?php echo get_field('bio') ;?></p>
                        <div class="tp-team-dtls__info">
                           <ul>
                              <?php 
                                 if( have_rows('addition_info') ):
                                 while ( have_rows('addition_info') ) : the_row(); 
                              ?>
                                 <li><?php echo the_sub_field('title') ;?>: <span><?php echo the_sub_field('details') ;?></span></li>
                              <?php
                                 endwhile;
                                 endif;
                              ?>
                             
                           </ul>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-3 col-md-12">
                     <div class="tp-team-dtls__social mt-45 mb-50">
                        <!-- <a href="#"><i class="fa-brands fa-facebook-f"></i></a> -->
                        <?php 
                           $facebook = get_field('facebook');
                           $linkedin = get_field('linkedin');
                           $twitter = get_field('twitter');
                           $instagram = get_field('instagram');
                        ?>
                           <?php if($facebook){ ?>
                              <a href="<?php echo $facebook ;?>" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
                           <?php } ?>
                           <?php if($linkedin){ ?>
                              <a class="tp-dtls-linkedin" href="<?php echo $linkedin ;?>" target="_blank"><i class="fa-brands fa-linkedin"></i></a>
                           <?php } ?>
                           <?php if($twitter){ ?>
                                 <a class="tp-dtls-tweet" href="<?php echo $twitter ;?>" target="_blank"><i class="fa-brands fa-twitter"></i></a>
                           <?php } ?>
                           <?php if($instagram){ ?>
                                 <a class="tp-dtls-insta" href="<?php echo $instagram ;?>" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                           <?php } ?>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-lg-12">
                     <div class="tp-team-dtls-text mt-40">
                        <h4 class="tp-team-dtls-text__title mb-30">Personal Experience</h4>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet.</p>
                        <p>Must explain to you how all this mistaken idea of denouncing works pleasure and praising uts pain was born and I will gives you a itself completed account of the system, and sed expounds the ut actual teachings of that greater sed explores truth. Denouncing works pleasures and praising pains was us born and I will gives you a completed ut workers accounts of the system. sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-lg-4 col-md-6">
                     <div class="tp-team-dtls-item mb-50 mt-35 wow fadeInUp" data-wow-delay=".2s">
                        <h4 class="tp-team-dtls-item__title mb-25">Skills</h4>
                        <p>Must explain to you how all praising uts pain <br>was born and I will gives you a itself completed <br>account of the system, and sed expounds the <br> ut actual teachings of that greater</p>
                        <div class="tp-team-dtls-item__list">
                           <ul>
                              <li><i class="fa-solid fa-check"></i>Extramural Funding</li>
                              <li><i class="fa-solid fa-check"></i>Bacteria Markers</li>
                              <li><i class="fa-solid fa-check"></i>Nam nec mi euismod euismod</li>
                              <li><i class="fa-solid fa-check"></i>In aliquet dui nec lectus</li>
                              <li><i class="fa-solid fa-check"></i>Extramural Funding</li>
                              <li><i class="fa-solid fa-check"></i>Bacteria Markers</li>
                              <li><i class="fa-solid fa-check"></i>Nam nec mi euismod euismod</li>
                              <li><i class="fa-solid fa-check"></i>Nam nec mi euismod euismod</li>
                           </ul>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-4 col-md-6">
                     <div class="tp-team-dtls-item mb-50 mt-35 ml-40 wow fadeInUp" data-wow-delay=".4s">
                        <h4 class="tp-team-dtls-item__title mb-25">Education</h4>
                        <p>Must explain to you how all praising uts pain <br>was born and I will gives you a itself completed <br>account of the system, and sed expounds the <br> ut actual teachings of that greater</p>
                        <div class="tp-team-dtls-item__list">
                           <ul>
                              <li><i class="fa-solid fa-check"></i>Extramural Funding</li>
                              <li><i class="fa-solid fa-check"></i>Bacteria Markers</li>
                              <li><i class="fa-solid fa-check"></i>Nam nec mi euismod euismod</li>
                              <li><i class="fa-solid fa-check"></i>In aliquet dui nec lectus</li>
                              <li><i class="fa-solid fa-check"></i>Extramural Funding</li>
                              <li><i class="fa-solid fa-check"></i>Bacteria Markers</li>
                              <li><i class="fa-solid fa-check"></i>Nam nec mi euismod euismod</li>
                              <li><i class="fa-solid fa-check"></i>Nam nec mi euismod euismod</li>
                           </ul>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-4 col-md-6">
                     <div class="tp-team-dtls-item mb-50 mt-35 ml-75 wow fadeInUp" data-wow-delay=".6s">
                        <h4 class="tp-team-dtls-item__title mb-25">Awards</h4>
                        <p>Must explain to you how all praising uts pain <br>was born and I will gives you a itself completed <br>account of the system, and sed expounds the <br> ut actual teachings of that greater</p>
                        <div class="tp-team-dtls-item__list">
                           <ul>
                              <li><i class="fa-solid fa-check"></i>Extramural Funding</li>
                              <li><i class="fa-solid fa-check"></i>Bacteria Markers</li>
                              <li><i class="fa-solid fa-check"></i>Nam nec mi euismod euismod</li>
                              <li><i class="fa-solid fa-check"></i>In aliquet dui nec lectus</li>
                              <li><i class="fa-solid fa-check"></i>Extramural Funding</li>
                              <li><i class="fa-solid fa-check"></i>Bacteria Markers</li>
                              <li><i class="fa-solid fa-check"></i>Nam nec mi euismod euismod</li>
                              <li><i class="fa-solid fa-check"></i>Nam nec mi euismod euismod</li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- team-details-area-end -->

      </main>
      <!-- main-area-end -->

<?php get_footer() ;?>