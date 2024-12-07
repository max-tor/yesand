<?php 

/**
 * Yes& Header with media Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
?>

<?php
	$media_yesand_header = get_field('media_yesand_header');
	$sub_heading = get_field('sub-heading_yesand_header');
	$main_text= get_field('main_text_yesand_header');

	//$media_yesand_header array with all info about media includes all type of thumbnails
	// echo '<pre>';
	// 	var_export($media_yesand_header);
	// echo '</pre>';
        
        //TODO i think we must restict types of media 
?>

<section class="bg-dark-green py-20" style="padding-top: 75px">
	<div class="container">
		<div class="media-block-1">
			<div class="media-block-1__frame border-1">
				<?php if ($media_yesand_header['type'] == "image") { ?>
					<img class="media-block-1__img" src=<?php echo $media_yesand_header['url'] ?> alt=<?php echo $media_yesand_header['alt'] ?>/>
				<?php } ?>
				<?php if ($media_yesand_header['type'] == "video") { ?>
					<video autopictureinpicture controls loop class="media-block-1__video">
						<source src=<?php echo $media_yesand_header['url'] ?> type=<?php echo $media_yesand_header['mime_type'] ?>>
					</video>
				<?php } ?>
			</div>
			<div class="card-1 media-block-1__card-margin">
				<picture class="media-block-1__prepend-img">
		            <source alt="Fish" srcset="/wp-content/themes/yesand-theme/images/illustrations/fish-1.webp" type="image/webp" loading="lazy">
		            <img alt="Fish" src="/wp-content/themes/yesand-theme/images/illustrations/fish-1.png" loading="lazy">
	          	</picture>
				<span class="title-tag-2 prepend-2"><?php echo $sub_heading ?></span>
				<h3 class="heading-4 media-block-1__title"><?php echo $main_text ?></h3>
			</div>
		</div>
	</div>
</section>
