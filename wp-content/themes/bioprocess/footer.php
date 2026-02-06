<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>

<?php 
global $footer_logo, $email_id, $phone_number, $office_days, $office_time, $address, $facebook, $twitter, $youtube ;?>
   <!-- footer-area -->
   <footer>
      <div class="footer-area theme-bg pt-100 pb-50">
         <div class="container">
            <div class="row">
               <div class="col-xl-4 col-lg-4 col-md-6">
                  <div class="footer-widget footer-col-1 mb-50 wow fadeInUp" data-wow-delay=".2s">
                     <h4 class="footer-widget__title mb-30">
                        <a href="<?php echo get_home_url() ;?>"><img src="<?= $footer_logo ;?>" alt="logo"></a>
                     </h4>
                     <div class="tp-footer-widget__content mb-10">
                        <i>FEEL FREE TO CONTACT US</i>
                        <h4 class="tp-footer-widget__contact mb-20"><a href="tel:<?= $phone_number;?>"><?= $phone_number;?></a></h4>
                        <small>
                           <i class="bi bi-clock"></i>
                           <?= $office_days ;?> <?= $office_time ;?>
                        </small>
                     </div>
                     <p>At Bioprocess Supplies, we truly understand lab, pilot, and small-scale bioprocess applications.</p>
                     <div class="footer-widget__social">
                        <?php if($facebook){?>
                           <a class="tp-f-fb" href="<?php echo $facebook ;?>" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
                        <?php  } ?>

                        <?php if($youtube){?>
                        <a class="tp-f-youtube" href="<?php echo $youtube ;?>" target="_blank"><i class="fa-brands fa-youtube"></i></a>
                        <?php } ?>

                        <?php if($twitter){?>
                        <a class="tp-f-twitter" href="<?php echo $twitter ;?>" target="_blank"><i class="fa-brands fa-twitter"></i></a>
                        <?php } ?>
                     </div>
                  </div>
               </div>
               <div class="col-xl-4 col-lg-4 col-md-6">
                  <div class="footer-widget footer-col-2 mb-50 wow fadeInUp" data-wow-delay=".4s">
                     <h4 class="footer-widget__title mb-20">Useful links</h4>
                     <div class="footer-widget__links">
                           <?php
                           $defaults = array(
                              'theme_location'  => '',
                              'menu'            => 'Footer menu',
                              'container'       => false,
                              'container_class' => '',
                              'container_id'    => '',
                              'menu_class'      => 'menu',
                              'menu_id'         => '',
                              'echo'            => true,
                              'fallback_cb'     => 'wp_page_menu',
                              'before'          => '',
                              'after'           => '',
                              'link_before'     => '',
                              'link_after'      => '',
                              'items_wrap'      => '<ul>%3$s</ul>',
                              'depth'           => 2,
                              'walker'          => ''
                              );
                           wp_nav_menu( $defaults );
                     ?>
                     </div>
                  </div>
               </div>
               <div class="col-xl-4 col-lg-4 col-md-6">
                  <div class="footer-widget footer-col-3 mb-50 wow fadeInUp" data-wow-delay=".6s">
                     <h4 class="footer-widget__title mb-20">Contact info</h4>
                     <div class="footer-widget__info">
                        <ul>
                           <li>
                              <a><?=$address ;?></a>
                           </li>
                           <li class="d-flex flex-column">
                              <a href="tel:<?= $phone_number;?>"><?= $phone_number;?></a>
                              <small>
                                 <i class="bi bi-clock"></i>
                                 <?= $office_days ;?> <br> <?= $office_time ;?>
                              </small>
                           </li>
                           <li><a href="mailto:<?= $email_id ;?> "><?= $email_id ;?>  </a></li>
                        </ul>
                     </div>
                  </div>
               </div>
              <!--  <div class="col-xl-3 col-lg-6 col-md-6">
                  <div class="footer-widget footer-col-4 mb-50 wow fadeInUp" data-wow-delay=".8s">
                     <h4 class="footer-widget__title mb-20">Subscribe to Newsletter</h4>
                     <p>We are here to assist. Contact us by phone, email or via our Social Media channels.</p>
                     <div class="footer-widget__newsletter p-relative">
                        <?php //echo do_shortcode('[contact-form-7 id="302" title="Newsletter"]') ;?>
                     </div>
                  </div>
               </div> -->
            </div>
         </div>
      </div>
      <div class="footer-area-bottom theme-bg">
         <div class="container">
            <div class="row">
               <div class="col-xl-6 col-lg-6 col-md-12 col-12">
                  <div class="footer-widget__copyright">
                     <span> Copyright ©<?php echo date('Y') ;?> <a href="<?php echo get_home_url() ;?>">Bioprocess Supplies</a>. <i>All Rights Reserved</i> |  Powered by  <a href="https://technasurge.com/" target="_blank">technasurge</a></span>
                  </div>
               </div> 
               <div class="col-xl-6 col-lg-6 col-md-12 col-12">
                  <div class="footer-widget__copyright-info info-direction">
                     <ul class="d-flex align-items-center">
                        <li><a href="<?php echo get_home_url() ;?>/terms-and-conditions/">Terms and conditions</a></li>
                        <li><a href="<?php echo get_home_url() ;?>/privacy-policy/" target="_blank">Privacy policy</a></li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </footer>
   <!-- footer-area-end -->

   <!-- JS here -->
   <script src="<?php echo get_stylesheet_directory_uri() ;?>/assets/js/jquery.js"></script>
   <script src="<?php echo get_stylesheet_directory_uri() ;?>/assets/js/waypoints.js"></script>
   <script src="<?php echo get_stylesheet_directory_uri() ;?>/assets/js/bootstrap.bundle.min.js"></script>
   <script src="<?php echo get_stylesheet_directory_uri() ;?>/assets/js/swiper-bundle.js"></script>
   <script src="<?php echo get_stylesheet_directory_uri() ;?>/assets/js/slick.js"></script>
   <script src="<?php echo get_stylesheet_directory_uri() ;?>/assets/js/magnific-popup.js"></script>
   <script src="<?php echo get_stylesheet_directory_uri() ;?>/assets/js/counterup.js"></script>
   <script src="<?php echo get_stylesheet_directory_uri() ;?>/assets/js/wow.js"></script>
   <script src="<?php echo get_stylesheet_directory_uri() ;?>/assets/js/nice-select.js"></script>
   <script src="<?php echo get_stylesheet_directory_uri() ;?>/assets/js/isotope-pkgd.js"></script>
   <script src="<?php echo get_stylesheet_directory_uri() ;?>/assets/js/imagesloaded-pkgd.js"></script>
   <script src="<?php echo get_stylesheet_directory_uri() ;?>/assets/js/meanmenu.js"></script>
   <script src="<?php echo get_stylesheet_directory_uri() ;?>/assets/js/ajax-form.js"></script>
   <script src="<?php echo get_stylesheet_directory_uri() ;?>/assets/js/main.js"></script>


   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.1/css/swiper.css" integrity="sha512-TX7AnOgJC11oWVj9w9788KVyEO1uVTObzR9EviLvEM6tqjyr05BGq5GqvURQn1lKjlvc04TTPLYo0un6a591tw==" crossorigin="anonymous" referrerpolicy="no-referrer" />                         
   <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.1/js/swiper.min.js"></script>
   <script>
      var swiper = new Swiper('.swiper-container.p-details-slider', {
         navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
         },
      });
   </script>   

  <script>
     $('body').on('click tap', 'button#menu-toggle', function(){
    $('header').addClass('active');
  });

  $('body').click(function(e){
    if(!$(e.target).is('button#menu-toggle')) {
      $('header').removeClass('active');
        $('div.menu-panel').removeClass('is-active');
     }
  });

  $('nav.slide-out-menu').click(function(e){
    e.stopPropagation();
  });

  $('button.menu-link').click(function(){
      $('div.menu-panel').removeClass('is-active');

    if ($(this).data('ref')) {
      var targetRef = $(this).data('ref');
      var $target = $('div.menu-panel[data-menu="' + targetRef + '"]');

        $target.addClass('is-active');
    }
  });

  </script>


<?php wp_footer(); ?>

</body>
</html>
