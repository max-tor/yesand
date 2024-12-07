<?php 

/**
 *  Yes& Fishbone 2-col.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
?>

<?php
$left_column = get_field('left_column');
$right_column = get_field('right_column');
?>

<div class="fishbone container">
	<?php if ($left_column) { ?>
		<div class="fishbone__left text-dark-green"><?php echo $left_column ?></div>
	<?php } ?>

	<?php if ($right_column) { ?>
		<div class="fishbone__right text-dark-green"><?php echo $right_column ?></div>
	<?php } ?>
</div>
