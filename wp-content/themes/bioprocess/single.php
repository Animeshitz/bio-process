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

get_header();

$twentytwentyone_unique_id = wp_unique_id('search-form-');

$twentytwentyone_aria_label = !empty($args['aria_label']) ? 'aria-label="' . esc_attr($args['aria_label']) . '"' : '';
?>
<!-- main-area -->
<main>

	<!-- breadcrumb-area -->
	<section class="breadcrumb__area pt-100 pb-120 breadcrumb__overlay" data-background="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/banner/about-banner.jpg">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-xl-6 col-lg-7 col-md-7 col-12">
					<div class="tp-breadcrumb">
						<h2 class="tp-breadcrumb__title">Knowlegde Center Details</h2>
					</div>
				</div>
				<!-- <div class="col-xl-6 col-lg-5 col-md-5 col-12">
				<div class="tp-breadcrumb__link d-flex align-items-center">
			   		<span>Bioprocess Supplies : <a href=""> Blog Details</a></span>
				</div>
		 	</div> -->
			</div>
		</div>
	</section>
	<!-- breadcrumb-area-end -->

	<!-- postbox area start -->
	<div class="postbox__area pt-130 pb-110 wow fadeInUp" data-wow-duration=".8s" data-wow-delay=".2s">
		<div class="container">
			<div class="row">
				<div class="col-xxl-8 col-xl-8 col-lg-7 col-md-12">
					<div class="postbox__wrapper pr-20">
						<article class="postbox__item format-image mb-50 transition-3">
							<div class="postbox__thumb w-img mb-30">
								<a href="blog-details.html">
									<?php if (has_post_thumbnail($post->ID)) : ?>
										<?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail'); ?>
										<img src="<?php echo $image[0]; ?>" alt="">
									<?php endif; ?>
								</a>
							</div>
							<div class="postbox__content">
								<div class="row">
									<div class="col-lg-12">
										<div class="postbox__content-area pb-20">
											<div class="postbox__meta mb-40">
												<span><a href="team-details.html"><i class="fa-regular fa-user"></i>
														<?php
														$author = get_field('author_name');
														if ($author) {
															echo $author;
														} else {
															echo get_the_author();
														}
														?>
													</a></span>
												<span><i class="fa-regular fa-clock"></i> <?php echo get_the_date('M d, Y'); ?></span>
												<span><i class="fa-light fa-eye"></i><?php echo get_post_view_count($id); ?> </span>
											</div>
											<?php the_title('<h3 class="postbox__title mb-35">', '</h3>'); ?>


										</div>
									</div>
								</div>
								<?php
								the_content();

								wp_link_pages(
									array(
										'before'   => '<nav class="page-links" aria-label="' . esc_attr__('Page', 'twentytwentyone') . '">',
										'after'    => '</nav>',
										/* translators: %: Page number. */
										'pagelink' => esc_html__('Page %', 'twentytwentyone'),
									)
								);
								?>
							</div>
						</article>
					</div>
				</div>

				<div class="col-xxl-4 col-xl-4 col-lg-5 col-md-12">
					<div class="sidebar__wrapper pl-25 pb-50">
						<div class="sidebar__widget mb-45">
							<div class="sidebar__widget-content">
								<h3 class="sidebar__widget-title mb-25">Search</h3>
								<div class="sidebar__search">
									<form role="search" <?php echo $twentytwentyone_aria_label; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped above. 
														?> method="get" action="<?php echo esc_url(home_url('/')); ?>">
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
									$args = array(
										'post_type' => 'post',
										'category_name' => '',
										'posts_per_page' => 5,
									);
									$query = new WP_Query($args);
									if ($query->have_posts()) :
										while ($query->have_posts()) :
											$query->the_post();

											$blogs_image = wp_get_attachment_url(get_post_thumbnail_id($post->id));
									?>
											<div class="rc__post mb-20 d-flex align-items-center">
												<div class="rc__post-thumb">
													<a href="<?php echo get_permalink($id) ?>"><img src="<?php echo $blogs_image; ?>" alt="blog-sidebar"></a>
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


<?php
get_footer(); ?>