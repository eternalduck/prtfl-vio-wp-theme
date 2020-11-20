<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage violet
 * @since Twenty Nineteen 1.0
 */
// default wp page template
get_header();
?>

	<div id="primary" class="page-content">
		<div class="container">
			<div class="row">
				<div class="col col-md-10 col-lg-8 mx-auto">

					<?php

					// Start the Loop.
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content/wp-default/content', 'page' );

					endwhile; // End the loop.
					?>
				</div>
			</div>
		</div>
	</div><!-- #primary -->

<?php
get_footer();
