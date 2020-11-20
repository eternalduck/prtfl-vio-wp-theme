<?php
/**
 * Advanced Custom Fields (ACF) plugin is required to show get_field() & the_field()
 *
 *
**/
?>

<?php if( get_field('block__bg_upper') ): ?>
	<div class="common-block__bg common-block__bg_upper" style="background-image: url('<?php the_field('block__bg_upper'); ?>')"></div>
<?php endif; ?>

<?php if( get_field('block__bg_for-all') ): ?>
	<div class="common-block__bg common-block__bg_deep" style="background-image: url('<?php the_field('block__bg_for-all'); ?>')">
	</div>
<?php endif; ?>

<?php if( get_field('block__bg_mob') ): ?>
	<div class="common-block__bg common-block__bg_deep d-md-none d-block" style="background-image: url('<?php the_field('block__bg_mob'); ?>')"></div>
<?php endif; ?>

<?php if( get_field('block__bg_tabl') ): ?>
	<div class="common-block__bg common-block__bg_deep d-lg-none d-md-block d-none" style="background-image: url('<?php the_field('block__bg_tabl'); ?>')"></div>
<?php endif; ?>

<?php if( get_field('block__bg_desk') ): ?>
	<div class="common-block__bg common-block__bg_deep d-lg-block d-none" style="background-image: url('<?php the_field('block__bg_desk'); ?>')">
	</div>
<?php endif; ?>