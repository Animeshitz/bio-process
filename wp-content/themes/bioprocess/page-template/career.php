<?php 

/**

 * Template Name: Career

 */

get_header();

?>

<!-- Career Modal-->
<div class="custom-model-main" id="my-modal" tabindex="-1" role="dialog" aria-labelledby="my-modal" aria-hidden="true">
    <div class="custom-model-inner">        
        <div class="close-btn">×</div>
        <div class="custom-model-wrap">
            <div class="pop-up-content-wrap">
                <div class="visitor-form">
                    <?php echo do_shortcode('[contact-form-7 id="144" title="Job Form"]') ;?>
                </div>
            </div>
        </div>  
    </div>  
    <div class="bg-overlay"></div>
</div>

 <!-- main-area -->

    <main>
        <!-- breadcrumb-area -->

        <section class="breadcrumb__area pt-100 pb-120 breadcrumb__overlay" data-background="<?php echo get_stylesheet_directory_uri() ;?>/assets/img/banner/about-banner.jpg">
            <div class="container">
               <div class="row align-items-center">
                  <div class="col-xl-7 col-lg-12 col-md-12 col-12">
                     <div class="tp-breadcrumb">
                        <h2 class="tp-breadcrumb__title">Career</h2>
                     </div>
                  </div>

                  <div class="col-xl-5 col-lg-12 col-md-12 col-12">
                     <div class="tp-breadcrumb__link text-xl-end">
                        <!-- <span>Bioprocess Supplies : <a href="services-01.html"> Career</a></span> -->
                     </div>
                  </div>
               </div>
            </div>
        </section>

         <!-- breadcrumb-area-end -->



        <section class="carrer-sec">
            <div class="container">
                <header class="carrer-header">
                    <small class="s-heading"><?php echo get_field('intro_section_title') ;?></small>
                    <h2><?php echo get_field('career_intro_subtitle') ;?></h2>
                    <p><?php echo get_field('career_intro_excerpt') ;?></p>
                </header>

                

                    <?php
                        $args=array(
                        'post_type' => 'career',
                        'post_status' => 'publish',
                        'posts_per_page' => '',
                        );

                        $my_query = null;
                        $my_query = new WP_Query($args);
                        if ($my_query->have_posts()) :
                            ?>
                        <ul class="carrer-list d-flex flex-column justify-content-start">
                            <?php
                                while ($my_query->have_posts()) : $my_query->the_post();
                                $post_id=get_the_ID();
                                $job_type  = get_field('job_type', $post_id);
                                $job_location = get_field('job_location', $post_id);
                                $job_excerpt = get_field('job_excerpt', $post_id);
                            ?>

                            <li class="d-flex flex-row justify-content-between align-items-start carrer-card">
                                <div class="carrer-card-header">
                                    <h3 class="card-title"><?=get_the_title();?></h3>
                                    <p class="card-description-small"><?php echo $job_excerpt ;?></p>
                                    <div class="c-details">
                                        <strong class="expend-button">View Details <i class="bi bi-chevron-down"></i></strong>
                                        <div class="c-details-cont">
                                            <?php echo get_the_content() ;?>
                                        </div>
                                    </div>

                                    <div class="card-tag">
                                    <?php if($job_type){?>
                                        <span><i class="bi bi-clock"></i> <?php echo $job_type ;?></span>
                                    <?php } ?>
                                    <?php if($job_location){?>
                                    <span><i class="bi bi-geo-alt"></i> <?php echo $job_location ;?></span>
                                    <?php } ?>
                                    </div>

                                </div>
                                <div class="carrer-card-action">
                                    <button class="apply-button"><a href="#" class="my_link" data-title="<?=get_the_title();?>" data-toggle="modal" data-target="#my-modal"> Apply</a>
                                    <i class="bi bi-arrow-up-right-square"></i>
                                    </button> 
                                </div>
                            </li>
                        <?php endwhile;
                        wp_reset_postdata(); ?>
                        </ul>
                        <?php
                        else : ?>
                            <div class="text-center bg-light">
                                <p class="m-0">No jobs available at the moment</p>
                            </div>
                        <?php endif; ?>
                
            </div>
         </section>

        <section class="submit-a-resume" id="submit-a-resume">
            <div class="container">
                <div class="row justify-content-center">
                    <header class="carrer-header text-center">
                        <h2>Submit A Resume</h2>
                    </header>
                    <div class="col-sm-12 col-md-10 col-lg-8">
                        <div class="sub-a-resume-form">
                            <?php echo do_shortcode('[contact-form-7 id="144" title="Job Form"]') ;?>
                        </div>
                    </div>
                </div>
            </div>
        </section>                       
    </main>

    <!-- main-area-end -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.my_link').click(function(){
                var jobTitle = $(this).data('title');
                $('#my-modal #job_title').val('');
                $('#my-modal #job_title').val(jobTitle);
                console.log(jobTitle);
            }); 
        });

        // $('#my-modal').on('show.bs.modal', function (event) {
        // var myVal = $(event.relatedTarget).data('val');
        // $(this).find(".modal-body").val(myVal);
        // });  
    </script>

<?php get_footer() ;?>