<?php
/**
 * Template part for Template: Block
 *
 * @package WordPress
 * @subpackage violet
 * @since Twenty Nineteen 1.0
 */
?>

<section class="entry common-block d-flex flex-column justify-content-center <?php the_field('page-class'); ?>" id="page-<?php the_ID(); ?>">

	<?php include "partials/background-layers.php"; ?>

	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-10 col mx-auto">
				<div class="common-block__content common-block__content_full-width">
					<?php the_content(); ?>
				</div>
			</div>
			<?php if( get_field('block__img') ): ?>
				<img src="<?php the_field('block__img'); ?>" class="common-block__img common-block__img_desk" alt=""/>
			<?php endif; ?>
			<?php if( get_field('block__img_mob') ): ?>
				<img src="<?php the_field('block__img_mob'); ?>" class="common-block__img common-block__img_mob d-md-none" alt=""/>
			<?php endif; ?>
		</div>
	</div>

</section>
