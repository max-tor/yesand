<?php

/**
 * Yes& Homepage Slider.
 */
?>
<?php

//image array
$arMetaverseSlider = get_field('slide_ymb');
//heading params
foreach ($arMetaverseSlider as $keySlide => $slide) {
		//file array
		$sliderimage = $slide['image_of_slide_ymb'];
		$heading_text = $slide['heading_text_ymb'];
		$text = $slide['text_ymb'];
		$author = $slide['author_ymb'];
		$author_description_ymb = $slide['author_description_ymb'];
		$link = $slide['link_ymb'];
?>

<section id="section-metaverse" class="bg-white bg-wave-1 py-20">
	<div class="container">
		<div class="media-block-3">
			<div class="media-block-3__frame circle-media-1__frame">
				<img class="media-block-3__img circle-media-1__img" src=<?php echo $sliderimage['url'] ?> alt=<?php echo $sliderimage['alt'] ?>/>
			</div>
			<div class="media-block-3__content">
				<h3 class="heading-5 text-red"><?php echo $heading_text?></h3>
				<blockquote class="bq-1">
						<div class="para-1 text-dark-green"><?php echo $text?></div>
						<cite>
							<span class="para-6"><?php echo $author?></span>
							<span class="para-7"><?php echo $author_description_ymb?></span>
						</cite>
				</blockquote>
				<a class="para-5 text-red mt-4 block" href=<?php echo $link['url']?>><?php echo $link['title']?> →</a>
			</div>
		</div>
	</div>
</section>
<?php } ?>
