<?php
/**
* Template Name: Standard Page
*
* @package WordPress
* @subpackage violet
* @since Twenty Nineteen 1.0
*
* this page should be filled in wp editor, NOT with blocks!
*/

get_header(); ?>

<div class="page-content entry <?php the_field('page-class'); ?>" id="page-<?php the_ID(); ?>"
<?php if(get_field('page-background')) : ?>
	style="background-image: url('<?php the_field('page-background') ?>')"
	<?php endif; ?>
>

	<div class="container">
		<div class="row">
			<div class="col-xl-10 col mx-auto <?php the_field('page-class'); ?>__content">
				<?php 
					while ( have_posts() ) : the_post(); 
						get_template_part( 'template-parts/content/content', 'clean');
					endwhile; 
				?>

			</div>
		</div>
	</div>

</div>

<?php
get_footer();