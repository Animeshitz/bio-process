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

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="icon-sec">
		<i class="pdf">
			<img src="<?php echo get_stylesheet_directory_uri() ;?>/assets/img/pdf.png" alt="pdf-img">
		</i> 
	</div>
	<div class="_cont-sec">
		<h2><a href="<?php echo the_field('upload_pdf_file')?>" target="_blank"><?php echo the_title() ;?></a></h2>
		<p>Description of Certificate 1</p>      
		<a href="<?php echo the_field('upload_pdf_file')?>" target="_blank">View PDF</a>
	</div>
</article>
<!-- #post-<?php the_ID(); ?> -->
