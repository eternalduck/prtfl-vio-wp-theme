<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
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
					if ( have_posts() ) {

						// Load posts loop.
						while ( have_posts() ) {
							the_post();
							get_template_part( 'template-parts/content/wp-default/content' );
						}

						// Previous/next page navigation.
						violet_the_posts_navigation();

					} else {

						// If no content, include the "No posts found" template.
						get_template_part( 'template-parts/content/wp-default/content', 'none' );

					}
					?>

				</div>
			</div>
		</div>
	</div><!-- .content-area -->

<?php
get_footer();
