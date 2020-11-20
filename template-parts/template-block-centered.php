<?php
/**
* Template Name: Block Centered
*
* @package WordPress
* @subpackage violet
* @since Twenty Nineteen 1.0
* Insert Pages div wrappers this content
* no header & footer because it's not a single page but a block - intended to be a part of pages with Template Name: Page with Blocks
*/
?>

<?php 
	while ( have_posts() ) : the_post(); 
		get_template_part( 'template-parts/content/content', 'block-centered');
	endwhile;
?>

