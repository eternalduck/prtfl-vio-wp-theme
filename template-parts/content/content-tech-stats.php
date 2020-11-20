<?php
/**
 * Template part for Tech: Template Stats
 *
 * @package WordPress
 * @subpackage violet
 * @since Twenty Nineteen 1.0
 */
?>

<h2><?php the_title(); ?></h2>

<?php
	$args = array(
		'post_type' => array( 'page' ),
		'order' => 'ASC',
		'orderby' => 'title',
		"posts_per_page" => -1
		);
	$the_query = new WP_Query( $args );
	if ( $the_query->have_posts() ) {
		while ( $the_query->have_posts() ) {
			$the_query->the_post();
			echo '<p>'; 
			echo '<span style="color: blue">';
			the_title();
			echo '</span>';
			echo ' - ';
			echo '<span style="color: green">';
			the_field('page-class');
			echo '</span>';
			echo ' - ';
			echo get_page_template_slug(); 
			echo '</p>';
		}
		wp_reset_postdata();
	}
?>