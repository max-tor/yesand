<?php 

/**
 * Yes& Homepage Pre-slider block Template.
 *
 */
// you can remove the div.homepage-pre-slider-block if needed
// just renders that the block is enabled
$title = get_field('title_yhpsb');
//array $first_image 
$first_image = get_field('first_image_circle_yhpsb');
$first_image_title = get_field('first_image_circle_title_yhpsb');

//array $second_image 
$second_image = get_field('second_image_circle_yhpsb');
$second_image_title = get_field('second_image_circle_title_yhpsb');

//array $third_image 
$third_image = get_field('third_image_circle_yhpsb');
$third_image_title = get_field('third_image_circle_title_yhpsb');


$sub_heading_text = get_field('button_sub_heading_text_yhpsb');
$yesand_link = get_field('link_yhpsb');
$button_label = $yesand_link['title'] ? $yesand_link['title'] : '';
$button_link = $yesand_link['url'] ? $yesand_link['url'] : '';
$button_target_link = $yesand_link['target'] ? $yesand_link['target'] : '';
?>
<section id="slide-1" class="bg-boots-2 mb-30">
	<div class="bg-wave-2 pt-40">
		<div class="container">
			<div class="bg-logo-1 pb-20 pt-10">
				<div class="media-block-1">
					<div clas="media-block-1__card-margin">
						<img class="media-block-1__prepend-img-2" src="/wp-content/themes/yesand-theme/images/illustrations/fish-1.png" alt="Fish">
						<div class="title-group-2">
							<h1 class="hero-2 text-white title-tag-1__title-2"><?php echo $title ?></h1>
						</div>
					</div>
				</div>
			</div>
			<div class="flex justify-between items-end mt-20">
				<div class="media-list-1">
					<div class="item-list-1 circle-media-2__frame border-1 shade-1" style="width: 180px">
						<span class="circle-media-2__txt heading-5"><?php echo $first_image_title ?></span>
						<img class="circle-media-2__img" src=<?php echo $first_image['url'] ?> alt=<?php echo $first_image['alt'] ?>/>
					</div>
					<div class="item-list-1 circle-media-2__frame border-1 shade-1" style="width: 180px">
						<span class="circle-media-2__txt heading-5"><?php echo $second_image_title ?></span>
						<img class="circle-media-2__img" src=<?php echo $second_image['url'] ?> alt=<?php echo $second_image['alt'] ?>/>
					</div>
					<div class="item-list-1 circle-media-2__frame border-1 shade-1" style="width: 180px">
						<span class="circle-media-2__txt heading-5"><?php echo $third_image_title ?></span>
						<img class="circle-media-2__img" src=<?php echo $third_image['url'] ?> alt=<?php echo $third_image['alt'] ?>/>
					</div>
				</div>
				<div class="btn-group-1 btn-group-1--big">
					<span class="btn-group-1__pre"><?php echo $sub_heading_text ?></span>
					<button class="btn-group-1__flex">
						<span class="btn-group-1__a"><?php echo $button_label ?></span>
						<span class="btn-group-1__arrow-right"></span>
						<span class="btn-group-1__circles">
							<img class="btn-group-1__circles-img" src="/wp-content/themes/yesand-theme/images/circles-2.svg">
						</span>
					</button>
				</div>
			</div>
		</div>
	</div>
</section>
