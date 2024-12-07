<?php

/**
 * Yes& Homepage Slider.
 */
?>

<?php $arHomepageSlider = get_field('home_page_slide'); ?>

<?php foreach ($arHomepageSlider as $keySlide => $slide) { ?>
	<?php
		//file array
		$slide_type = $slide['slide-type'];
		$sliderMedia = $slide['media_hps'];
		$sub_heading_text = $slide['sub-heading_text_hps'];
		$sub_heading_text_color = $slide['sub-heading_text_color_palette_hps'];
		$sub_heading_text_background_color = $slide['sub-heading_text_background_color_hps'];
		$heading_text = $slide['heading_text_hps'];
		$heading_text_color = $slide['heading_text_color_hps'];
		$tags = $slide['tags_hps'];
		$text = $slide['text_hps'];
		$link = $slide['link_hps'];
		$colorOflink = $slide['color_link_hps'];
	?>

	<?php if ($slide_type == "slide-type-1") { ?>
		<section id="slide-2">
			<div class="bg-dark-green bg-wave-3 pt-40">
				<div class="container pb-20">
					<div class="media-block-3 bg-circles-3">
						<div class="media-block-3__frame circle-media-1__frame border-1 drop-shadow-md">
							<img class="circle-media-1__img" src=<?php echo $sliderMedia['url'] ?> alt=<?php echo $sliderMedia['alt'] ?>/>
						</div>
						<div class="media-block-3__content">
							<div class="title-group-1">
								<img class="media-block-3__prepend-img-1" src="/wp-content/themes/yesand-theme/images/illustrations//fish-1.png" alt="Fish" style="left: -12rem; top: -3.5rem; transform: rotate(-20deg);">
								<span class="title-tag-3 prepend-3" style="background-color: <?php echo $sub_heading_text_background_color ?>; color: <?php echo $sub_heading_text_color ?>"><?php echo $sub_heading_text ?></span>
								<div class="heading-1 title-tag-1__title text-dark-green" style="color: <?php echo $heading_text_color ?>"><?php echo $heading_text ?></div>
							</div>

							<ul class="para-4 tags-2">
								<?php foreach ($tags as &$tag) { ?>
									<li class="tags-2__tag"><?php echo $tag ?></li>
								<?php } ?>
							</ul>

							<div class="para-1 text-dark-green pt-5"><?php echo $text ?></div>
							<a class="para-5" style="color: <?php echo $colorOflink ?>" href=<?php echo $link['url'] ?>><?php echo $link['title'] ?> →</a>
						</div>
					</div>

					<div class="flex justify-between items-end mt-20">
						<div></div>

						<div class="btn-group-1 btn-group-1--big">
							<span class="btn-group-1__pre prepend-3">Explore</span>
							<button class="btn-group-1__a" data-action="swiper-next">Our work</button>
							<span class="btn-group-1__arrow">→</span>
							<span class="btn-group-1__ball"></span>
						</div>
					</div>
				</div>
			</div>
		</section>
	<?php } ?>

	<?php if ($slide_type == "slide-type-2") { ?>
		<section id="slide-3" class="bg-white">
			<div class="bg-dark-green bg-wave-4 pt-60 pb-40">
				<div class="container">
					<div class="media-block-3" style="gap: 4rem; padding-left: 150px">
						<div class="media-block-3__frame circle-media-1__frame border-1 drop-shadow-md" style="flex-basis: 50%;">
							<img class="circle-media-1__img" src=<?php echo $sliderMedia['url'] ?> alt=<?php echo $sliderMedia['alt'] ?>/>
						</div>

						<div class="media-block-3__content">
							<div class="title-group-1">
								<img class="media-block-3__prepend-img-1" src="/wp-content/themes/yesand-theme/images/illustrations//fish-1.png" alt="Fish">
								<span class="title-tag-2 prepend-3" style="background-color: <?php echo $sub_heading_text_background_color ?>; color: <?php echo $sub_heading_text_color ?>"><?php echo $sub_heading_text ?></span>
								<h3 class="heading-1 title-tag-1__title text-white" style="color: <?php echo $heading_text_color ?>"><?php echo $heading_text ?></h3>
							</div>

							<ul class="para-4 tags-2">
								<?php foreach ($tags as &$tag) { ?>
									<li class="tags-2__tag"><?php echo $tag ?></li>
								<?php } ?>
							</ul>

							<div class="para-1 text-white pt-5"><?php echo $text ?></div>
							<a class="para-5" style="color: <?php echo $colorOflink ?>" href=<?php echo $link['url'] ?>><?php echo $link['title'] ?> →</a>
						</div>
					</div>
				</div>
			</div>

			<div class="container pt-10 pb-10">
				<div class="flex justify-between items-end">
					<div></div>

					<div class="btn-group-1 btn-group-1--big">
						<span class="btn-group-1__pre prepend-3">Explore</span>
						<button class="btn-group-1__a" data-action="swiper-next">Our work</button>
						<span class="btn-group-1__arrow">→</span>
						<span class="btn-group-1__ball"></span>
					</div>
				</div>
			</div>

		</section>
	<?php } ?>

	<?php if ($slide_type == "slide-type-3") { ?>
		<section id="slide-4">
			<div class="bg-dark-green bg-wave-5 pt-40">
				<div class="container bg-circles-2">
					<div class="media-block-3" style="gap: 4rem">

						<div class="media-block-3__frame circle-media-1__frame border-1 drop-shadow-md" style="order: 2">
							<img class="circle-media-1__img" src=<?php echo $sliderMedia['url'] ?> alt=<?php echo $sliderMedia['alt'] ?>/>
						</div>

						<div class="media-block-3__content" style="order: 1; flex-basis: 40%;">
							<div class="title-group-2">
								<img class="media-block-1__prepend-img-2" src="/wp-content/themes/yesand-theme/images/illustrations//fish-1.png" alt="Fish" style="left: auto; right: -2rem; transform: rotate(25deg)">
								<span class="title-tag-3 prepend-3" style="background-color: <?php echo $sub_heading_text_background_color ?>; color: <?php echo $sub_heading_text_color ?>"><?php echo $sub_heading_text ?></span>
								<h3 class="heading-1 media-block-3__title" style="color: <?php echo $heading_text_color ?>"><?php echo $heading_text ?></h3>
							</div>

							<ul class="para-4 tags-2">
								<?php foreach ($tags as &$tag) { ?>
									<li class="tags-2__tag"><?php echo $tag ?></li>
								<?php } ?>
							</ul>

							<div class="para-1 text-dark-green pt-5"><?php echo $text ?></div>
							<a class="para-5 text-red" style="color: <?php echo $colorOflink ?>" href=<?php echo $link['url'] ?>><?php echo $link['title'] ?> →</a>
						</div>

					</div>
				</div>
			</div>

			<div class="container">
				<div class="flex justify-between items-end pt-20">
					<div></div>
					<div class="btn-group-1 btn-group-1--big">
						<span class="btn-group-1__pre prepend-3">Explore</span>
						<button class="btn-group-1__a" data-action="swiper-next">Our work</button>
						<span class="btn-group-1__arrow">→</span>
						<span class="btn-group-1__ball"></span>
					</div>
				</div>
			</div>
		</section>
	<?php } ?>

<?php } ?>
