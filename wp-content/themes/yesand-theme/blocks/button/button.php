<?php
/**
 * Yes& button.
 */
?>

<?php
$alignment = get_field('yesand_button_alignment');
$sub_heading_text = get_field('yesand_button_sub-heading_text');
$yesand_link = get_field('yesand_link');
$button_label = $yesand_link['title'] ? $yesand_link['title'] : '';
$button_link = $yesand_link['url'] ? $yesand_link['url'] : '';
$button_target_link = $yesand_link['target'] ? $yesand_link['target'] : '';


?>

<div class="container">
	<?php if ($button_link != '') { ?>
		<div class="btn-group-1 btn-group-1--<?php echo $alignment ?> mt-5">
			<span class="btn-group-1__pre"><?php echo $sub_heading_text ?></span>
			<a href="<?php echo $button_link ?>" target="<?php echo $button_target_link ?>" class="btn-group-1__flex">
				<span class="btn-group-1__a">
					<?php echo $button_label ?>
				</span>
				<span class="btn-group-1__arrow-right"></span>
				<span class="btn-group-1__circles">
					<img class="btn-group-1__circles-img" src="/wp-content/themes/yesand-theme/images/circles-2.svg" alt="decorative circles for button">
				</span>
			</a>
		</div>
	<?php } ?>
</div>
