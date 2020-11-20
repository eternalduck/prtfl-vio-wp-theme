<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage violet
 * @since Twenty Nineteen 1.0
 */

get_header();
?>



<section class="entry common-block page-404 d-flex flex-column justify-content-center" style="background: url('/wp-content/themes/violet/images/block-bg-dark.svg') center/cover no-repeat;">

	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-10 col mx-auto">
				<div class="common-block__content common-block__content_full-width">
					<h1>Sorry, the page doesn't exist...</h1>
						<a href="/">Go Home</a>
				</div>
			</div>
		</div>
	</div>

</section>


<?php
get_footer();
