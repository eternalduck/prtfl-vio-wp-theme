<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage violet
 * @since Twenty Nineteen 1.0
 */

?>

	<footer id="footer" class="footer d-flex flex-column justify-content-center">

		<?php if ( has_nav_menu( 'social' ) ) : ?>
			<nav class="menu menu-social menu-social_dark" aria-label="<?php esc_attr_e( 'Social Links Menu', 'violet' ); ?>">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'social',
						'menu_class'     => 'd-flex flex-row justify-content-center',
						'link_before'    => '<span class="screen-reader-text">',
						'link_after'     => '</span>' . violet_get_icon_svg( 'link' ),
						'depth'          => 1,
						'container' => false
					)
				);
				?>
			</nav>
		<?php endif; ?>

		<?php get_template_part( 'template-parts/footer/footer', 'widgets' ); ?>

		<?php if ( has_nav_menu( 'footer' ) ) : ?>
			<nav class="footer-navigation" aria-label="<?php esc_attr_e( 'Footer Menu', 'twentynineteen' ); ?>">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footer',
						'menu_class'     => 'footer-menu',
						'depth'          => 1,
					)
				);
				?>
			</nav>
		<?php endif; ?>

		
	</footer>

<?php wp_footer(); ?>

</body>
</html>
