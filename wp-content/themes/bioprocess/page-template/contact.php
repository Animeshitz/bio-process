<?php 
/**
 * Template Name: Contact
 */
get_header();
global $office_days, $office_time ;
$sub = '';
if(isset($_REQUEST['sub']))
{
   if( trim($_REQUEST['sub'])!='' )
   {
      $sub=trim($_REQUEST['sub']);
   }
}
?>
<main>

<!-- breadcrumb-area -->
<section class="breadcrumb__area pt-100 pb-120 breadcrumb__overlay" data-background="<?php echo get_stylesheet_directory_uri() ;?>/assets/img/banner/contact-banner.jpg">
   <div class="container">
      <div class="row align-items-center">
         <div class="col-lg-6 col-md-7 col-12">
            <div class="tp-breadcrumb">
               <h2 class="tp-breadcrumb__title">Contact us</h2>
            </div>
         </div>
         <!-- <div class="col-lg-6 col-md-5 col-12">
            <div class="tp-breadcrumb__link d-flex align-items-center">
               <span>Bioprocess Supplies :  Contact</span>
            </div>
         </div> -->
      </div>
   </div>
</section>
<!-- breadcrumb-area-end -->


<!-- contact-area -->
<section class="contact-area pt-130 pb-115">
<div class="container">
    <div class="row">
         <div class="col-lg-4 col-md-5 col-12 wow fadeInLeft" data-wow-delay=".4s">
            <div class="tpcontact mr-60 mb-60 wow fadeInUp" data-wow-delay=".2s">
               <div class="tpcontact__item text-center">
                  <div class="tpcontact__icon mb-20">
                     <img src="<?php echo get_stylesheet_directory_uri() ;?>/assets/img/icon/contact-01.svg" alt="">
                  </div>
                  <div class="tpcontact__address">
                     <h4 class="tpcontact__title mb-15"><?php echo get_field('address_title') ;?></h4>
                     <span>
                        <a><?php echo get_field('address_details') ;?></a>
                     </span>
                  </div>
               </div>
            </div>
            <div class="tpcontact mr-60 mb-60 wow fadeInUp" data-wow-delay=".4s">
               <div class="tpcontact__item text-center">
                  <div class="tpcontact__icon mb-20">
                     <img src="<?php echo get_stylesheet_directory_uri() ;?>/assets/img/icon/contact-02.svg" alt="">
                  </div>
                  <div class="tpcontact__address">
                     <h4 class="tpcontact__title mb-15"><?php echo get_field('phone_title') ;?></h4>
                     <span><a href="tel:<?php echo get_field('phone_number') ;?>"><?php echo get_field('phone_number') ;?></a></span>
                  </div>
               </div>
            </div>
            <div class="tpcontact mr-60 mb-60 wow fadeInUp" data-wow-delay=".6s">
               <div class="tpcontact__item text-center">
                  <div class="tpcontact__icon mb-20">
                     <img src="<?php echo get_stylesheet_directory_uri() ;?>/assets/img/icon/contact-03.svg" alt="">
                  </div>
                  <div class="tpcontact__address">
                     <h4 class="tpcontact__title mb-15">Opening Hours</h4>
                     <span><?= $office_days ;?> <br><?= $office_time ;?></span>
                  </div>
               </div>
            </div>

         </div>
        <div class="col-lg-8 col-md-7 col-12">
            <div class="contactform wow fadeInRight" data-wow-delay=".4s">
               <h4 class="contactform__title mb-35">Send us a message :</h4>
               <div class="contactform__list mb-60">
                  <?php echo do_shortcode('[contact-form-7 id="19" title="Contact Us"]') ;?>
               </div>
               <div class="row">
                  <div class="col-lg-12">
                     <div class="tpcontactmap">
                        <?php echo get_field('map') ;?>
                     </div>
                  </div>
               </div>
            </div>
        </div>
    </div>
</div>
</section>
<!-- contact-area-end -->


</main>

<?php get_footer() ?>
<script type="text/javascript">
   $(document).ready(function(){
      var sub = '<?php echo $sub; ?>';
      $('#subject').val(sub);
   });
</script>