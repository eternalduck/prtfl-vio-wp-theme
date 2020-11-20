<?php
/**
* Template Name: Full-width Page
*
* @package WordPress
* @subpackage violet
* @since Twenty Nineteen 1.0
*
* this page should be filled in wp editor, NOT with blocks!
* !!! - wrap each logical portion/section of content with a wp-group with .common-block class & anchor(id) --!!!
*/

get_header(); ?>

<div class="page-full entry <?php the_field('page-class'); ?>" id="page-<?php the_ID(); ?>"
<?php if(get_field('page-background')) : ?>
	style="background-image: url('<?php the_field('page-background') ?>')"
	<?php endif; ?>
>

	<div class="container-fluid">
		<div class="row">

				<?php 
					while ( have_posts() ) : the_post(); 
						get_template_part( 'template-parts/content/content', 'clean');
					endwhile; 
				?>

		</div>
	</div>

</div>

<?php
get_footer();