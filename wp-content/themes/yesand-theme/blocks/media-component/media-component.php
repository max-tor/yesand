<?php
/**
 * Yes& Media component.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
?>

<?php
	$layout_options_alignment_mc = get_field('layout_options_alignment_mc');
	$media_yesand_mc = get_field('media_yesand_mc');
	$cover = get_field('cover');
	$intro_text = get_field('heading_mc');
	$sub_heading = get_field('sub-heading_mc');
	$sub_heading_bckg_clr = get_field('sub-heading_bckg_clr_mc');
	$main_text_mc = get_field('main_text_mc');
	$background = get_field('background') ? 'with-background' : '';
?>

<section class="pb-20 <?php if (!$intro_text) { echo "pt-20"; } ?> <?php if (get_field('background')) { echo "bg-dark-green bg-logo-2"; } ?>">
	<div class="container">

		<?php if ($intro_text) { ?>
			<div class="para-2 mx-auto mb-5"><?php echo $intro_text ?></div>
		<?php } ?>

		<div class="media-block-1 <?php if ($layout_options_alignment_mc == "left") { echo "media-block-1--left"; } ?>">
			<div class="media-block-1__frame border-1">
				<?php if ($media_yesand_mc['type'] == "image") { ?>
					<img class="media-block-1__img" src="<?php echo $media_yesand_mc['url'] ?>" alt="<?php echo $media_yesand_mc['alt'] ?>" />
				<?php } ?>
				<?php if ($media_yesand_mc['type'] == "video") { ?>
					<video autopictureinpicture controls loop class="media-block-1__video" <?php if ($cover) { ?> poster="<?php echo $cover['url'] ?>" <?php } ?>>
						<source src="<?php echo $media_yesand_mc['url'] ?>" type="<?php echo $media_yesand_mc['mime_type'] ?>">
					</video>
				<?php } ?>
			</div>

			<?php if ($sub_heading || $main_text_mc) { ?>
				<div class="card-1 media-block-1__card-margin">
					<?php if ($sub_heading) { ?>
						<h3 class="title-tag-2 prepend-2" style="background-color: <?php echo $sub_heading_bckg_clr ?>"><?php echo $sub_heading ?></h3>
					<?php } ?>
					<?php if ($main_text_mc) { ?>
						<div class="para-2 mt-8"><?php echo $main_text_mc ?></div>
					<?php } ?>
				</div>
			<?php } ?>
		</div>
	</div>
</section>
