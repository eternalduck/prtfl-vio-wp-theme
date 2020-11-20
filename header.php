<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage violet
 * @since Twenty Nineteen 1.0
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,400;0,600;0,700;0,900;1,400&display=swap" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

	<header id="masthead" class="header">
		<div class="container-fluid">
			<div class="col-xl-10 col mx-auto">

				<div class="row d-flex align-items-center no-gutters">
					<?php if ( has_custom_logo() ) : ?>
						<div class="header__logo col-4 col-lg-3">
							<?php the_custom_logo(); ?>
						</div>
					<?php endif; ?>

					<div class="header__menu col-6 col-lg-9 d-flex justify-content-end">

						<div class="menu_mobile">

							<?php if ( has_nav_menu( 'menu-top' ) ) : ?>
								<nav id="menu-top" class="menu menu-top d-none d-lg-block" aria-label="<?php esc_attr_e( 'Top Menu', 'violet' ); ?>">
									<?php
									wp_nav_menu(
										array(
											'theme_location' => 'menu-top',
											'menu_class'     => 'd-flex flex-column flex-lg-row menu-top__inner',
											'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
											'container' => false
										)
									);
									?>
								</nav>
							<?php endif; ?>

							<?php if ( has_nav_menu( 'social' ) ) : ?>
								<nav class="menu menu-social menu-social_light menu-social_big d-none" aria-label="<?php esc_attr_e( 'Social Links Menu', 'violet' ); ?>">
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
						</div>
					</div>

					<div class="header__toggle col-2 d-lg-none">
						<div class="menu-toggle menu-toggle_mob"></div>
					</div>

				</div>
			</div>
		</div>
	</header>
