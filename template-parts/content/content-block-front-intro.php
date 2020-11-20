<?php
/**
 * Template part for Template: Block: Front Intro
 *
 * @package WordPress
 * @subpackage violet
 * @since Twenty Nineteen 1.0
 */

?>

<section class="entry common-block front-intro d-flex flex-column justify-content-lg-center <?php the_field('page-class'); ?>" id="page-<?php the_ID(); ?>">
	<div class="container">
		<div class="row">
			<div class="common-block__content front-intro__content col mx-auto text-center">

				<?php the_content(); ?>

				<?php if( get_field('front-img-left') ): ?>
					<img src="<?php the_field('front-img-left'); ?>" class="front-intro__img front-intro__img_left" alt=""/>
				<?php endif; ?>
				
				<?php if( get_field('front-img-right') ): ?>
				<img src="<?php the_field('front-img-right'); ?>" class="front-intro__img front-intro__img_right" alt=""/>
				<?php endif; ?>

			</div>
		</div>

		<div class="row">
			<div class="col mx-auto">
				<?php if ( has_nav_menu( 'social' ) ) : ?>
					<nav class="menu menu-social menu-social_light menu-social_big d-lg-block d-none" aria-label="<?php esc_attr_e( 'Social Links Menu', 'violet' ); ?>">
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
	</div>

</section>
