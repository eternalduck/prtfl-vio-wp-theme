<?php
/**
* Template Name: Block: Front Intro
*
* @package WordPress
* @subpackage violet
* @since Twenty Nineteen 1.0
*/
// no header & footer because it's not a single page but a block - intended to be a part of pages with Template Name: Page with Blocks
?>

<?php 
	while ( have_posts() ) : the_post(); 
		get_template_part( 'template-parts/content/content', 'block-front-intro');
	endwhile; 
?>
