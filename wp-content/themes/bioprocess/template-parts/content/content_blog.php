<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>



<article class="postbox__item format-image mb-60 transition-3">
    <div class="postbox__thumb w-img mb-35">
        <a href="<?php echo get_permalink( $id )?>">
            <?php if (has_post_thumbnail( $post->ID ) ): ?>
            <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
            <img src="<?php echo $image[0]; ?>" alt="">
            <?php endif; ?>
        </a>
    </div>
    <div class="postbox__content">
        <div class="postbox__meta mb-40">
            <span><a href=""><i class="fa-regular fa-user"></i> 
            <?php 
            $author = get_field( 'author_name' );
            if ( $author ) {
                echo $author;
            } else {
                echo get_the_author() ;
            }
            ?></a></span>
            <span><i class="fa-regular fa-clock"></i> <?php echo get_the_date( 'M d, Y' ); ?></span>
            <span><i class="fa-light fa-eye"></i><?php echo get_post_view_count($id) ;?></span>
        </div>
        <?php if ( is_singular() ) : ?>
			<?php the_title( '<h3 class="postbox__title mb-40">', '</h3>' ); ?>
		<?php else : ?>
			<?php the_title( sprintf( '<h2 class="entry-title default-max-width"><a href="%s">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		<?php endif; ?>
        <div class="postbox__text mb-40">
            <p><?php echo get_field('excerpt') ;?></p>
        </div>
        <div class="postbox__read-more">
            <a href="<?php echo get_permalink( $id )?>" class="tp-btn">Reade more</a>                               
        </div>
    </div>
</article>