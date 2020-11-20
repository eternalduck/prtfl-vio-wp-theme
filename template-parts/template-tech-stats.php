<?php
/**
* Template Name: Tech: Template Stats
*
* @package WordPress
* @subpackage violet
* @since Twenty Nineteen 1.0
*
* this page lists all pages and their templates, keep it accessible for admins only

*/

get_header(); ?>

<div class="page-content entry">
	<div class="container">
		<div class="row">
			<div class="col">

				<?php
					while ( have_posts() ) : the_post(); 
						get_template_part( 'template-parts/content/content', 'tech-stats');
					endwhile;
				?>

			</div>
		</div>
	</div>

</div>

<?php
get_footer();