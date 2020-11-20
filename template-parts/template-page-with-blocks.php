<?php
/**
* Template Name: Page with Blocks
*
* @package WordPress
* @subpackage violet
* @since Twenty Nineteen 1.0
*/
// this page intended to be filled with blocks (pages with Template Name: Block) using Insert Pages Plugin https://wordpress.org/plugins/insert-pages/

get_header(); ?>
	<?php if( get_field('page-class') ): ?>
		<div class="<?php the_field('page-class'); ?>">
	<?php endif; ?>

		<?php 
			while ( have_posts() ) : the_post(); 
				get_template_part( 'template-parts/content/content', 'clean');
			endwhile; 
		?>

	<?php if( get_field('page-class') ): ?>
		</div>
	<?php endif; ?>
<?php
get_footer();