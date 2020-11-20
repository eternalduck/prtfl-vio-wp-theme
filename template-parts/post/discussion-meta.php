<?php
/**
 * The template for displaying Current Discussion on posts
 *
 * @package WordPress
 * @subpackage violet
 * @since Twenty Nineteen 1.0
 */

/* Get data from current discussion on post. */
$discussion    = violet_get_discussion_data();
$has_responses = $discussion->responses > 0;

if ( $has_responses ) {
	/* translators: %d: Number of comments. */
	$meta_label = sprintf( _n( '%d Comment', '%d Comments', $discussion->responses, 'violet' ), $discussion->responses );
} else {
	$meta_label = __( 'No comments', 'violet' );
}
?>

<div class="discussion-meta">
	<?php
	if ( $has_responses ) {
		violet_discussion_avatars_list( $discussion->authors );
	}
	?>
	<p class="discussion-meta-info">
		<?php echo violet_get_icon_svg( 'comment', 24 ); ?>
		<span><?php echo esc_html( $meta_label ); ?></span>
	</p>
</div><!-- .discussion-meta -->
