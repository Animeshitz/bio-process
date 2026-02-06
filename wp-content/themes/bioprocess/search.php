<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header(); ?>
<?php 
	if(isset($_REQUEST['post_type']))
	{
		$post_type=trim($_REQUEST['post_type']);
	}
?>


<main>

<!-- breadcrumb-area -->
<section class="breadcrumb__area pt-100 pb-120 breadcrumb__overlay" data-background="<?php echo get_stylesheet_directory_uri() ;?>/assets/img/banner/blog-banner.jpg">
   <div class="container">
      <div class="row align-items-center">
         <div class="col-lg-6 col-md-7 col-12">
            <div class="tp-breadcrumb">
               <h2 class="tp-breadcrumb__title"><?php echo $post_type ;?> Search</h2>
            </div>
         </div>
         <div class="col-lg-6 col-md-5 col-12">
            <div class="tp-breadcrumb__link d-flex align-items-center">
               <!-- <span>Bioprocess Supplies : <a href=""> Blog</a></span> -->
            </div>
         </div>
      </div>
   </div>
</section>
<!-- breadcrumb-area-end -->

<div class="postbox-area pt-80 pb-80">
   <div class="container">
      	<div class="row">
			<?php
			if ( have_posts() ) {
				?>
				<div class="s-page-header">
					<header class="page-header alignwide">
						<h2 class="page-title">
							<?php
							printf(
								/* translators: %s: Search term. */
								esc_html__( 'Results for "%s"', 'twentytwentyone' ),
								'<span class="page-description search-term">' . esc_html( get_search_query() ) . '</span>'
							);
							?>
						</h2>
					</header><!-- .page-header -->

					<div class="search-result-count default-max-width">
						<?php
						printf(
							esc_html(
								/* translators: %d: The number of search results. */
								_n(
									'We found %d result for your search.',
									'We found %d results for your search.',
									(int) $wp_query->found_posts,
									'twentytwentyone'
								)
							),
							(int) $wp_query->found_posts
						);
						?>
					</div><!-- .search-result-count -->

				</div>
				
				<?php
					// Start the Loop.
					while ( have_posts() ) {
						the_post();

						/*
						* Include the Post-Format-specific template for the content.
						* If you want to override this in a child theme, then include a file
						* called content-___.php (where ___ is the Post Format name) and that will be used instead.
						*/
						get_template_part( 'template-parts/content/content-excerpt', get_post_format() );
					} // End the loop.

					// Previous/next page navigation.
					twenty_twenty_one_the_posts_navigation();

					// If no content, include the "No posts found" template.
			} else {
				get_template_part( 'template-parts/content/content-none' );
			}
			?>
		</div>
	</div>
</main>
<?php
get_footer();
