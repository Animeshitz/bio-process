<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();

$description = get_the_archive_description();
$twentytwentyone_unique_id = wp_unique_id( 'search-form-' );

$twentytwentyone_aria_label = ! empty( $args['aria_label'] ) ? 'aria-label="' . esc_attr( $args['aria_label'] ) . '"' : '';
?>

<main>

	<!-- breadcrumb-area -->
	<section class="breadcrumb__area pt-100 pb-120 breadcrumb__overlay" data-background="<?php echo get_stylesheet_directory_uri() ;?>/assets/img/banner/blog-banner.jpg">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6 col-md-7 col-12">
					<div class="tp-breadcrumb">
					<h2 class="tp-breadcrumb__title">Blog</h2>
					</div>
				</div>
				<div class="col-lg-6 col-md-5 col-12">
					<div class="tp-breadcrumb__link d-flex align-items-center">
					<span>Bioprocess Supplies : <a href=""> <?php echo single_cat_title(); ?></a></span>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- breadcrumb-area-end -->

	<div class="postbox-area pt-120 pb-80">
   		<div class="container">
      		<div class="row">
         		<div class="col-xxl-8 col-xl-8 col-lg-7 col-md-12">
            		<div class="postbox pr-20 pb-50">

						<?php if ( have_posts() ) : ?>

						<?php while ( have_posts() ) : ?>
							<?php the_post(); ?>
							<?php get_template_part( 'template-parts/content/content_blog', get_theme_mod( 'display_excerpt_or_full_post', 'excerpt' ) ); ?>

						<?php endwhile; ?>

						<?php twenty_twenty_one_the_posts_navigation(); ?>

						<?php else : ?>
							<?php get_template_part( 'template-parts/content/content-none' ); ?>
						<?php endif; ?>

						<div class="basic-pagination">
							<nav>
								<ul>
									<?php 
									echo paginate_links( array(
											'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
											//'total'        => $query->max_num_pages,
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
				  <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-12">
					<div class="sidebar__wrapper pl-25 pb-50">
					<div class="sidebar__widget mb-45">
						<div class="sidebar__widget-content">
							<h3 class="sidebar__widget-title mb-25">Search</h3>
							<div class="sidebar__search">
								<form role="search" <?php echo $twentytwentyone_aria_label; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped above. ?> method="get"  action="<?php echo esc_url( home_url( '/' ) ); ?>">
									<div class="sidebar__search-input-2 p-relative">	
										<input type="search" id="<?php echo esc_attr( $twentytwentyone_unique_id ); ?>" class="search-field" value="<?php echo get_search_query(); ?>" name="s" />
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
								echo '<li><a href="' . get_category_link($category->term_id) . '">' . $category->name . '<span>'.$category->category_count .'<span> </a></li>';
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
									$args = array(
										'post_type' => 'post',
										'category_name' => '',
										'posts_per_page' => 5,
									);
									$query = new WP_Query($args);
									if($query->have_posts()):
										while ($query->have_posts()):
											$query->the_post();

											$blogs_image = wp_get_attachment_url( get_post_thumbnail_id($post->id) );
											?>
											<div class="rc__post mb-20 d-flex align-items-center">
												<div class="rc__post-thumb">
													<a href="<?php echo get_permalink( $id )?>"><img src="<?php echo $blogs_image ;?>" alt="blog-sidebar"></a>
												</div>
												<div class="rc__post-content">
													<div class="rc__meta">
														<span><?php echo get_the_date( 'M d, Y' ); ?></span>
													</div>
													<h3 class="rc__post-title">
														<a href="<?php echo get_permalink( $id )?>"><?php the_title() ;?></a>
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
									echo '<a href="' . get_tag_link($tag->term_id) . '">'.$tag->name . '</a>';
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

<?php
get_footer();
