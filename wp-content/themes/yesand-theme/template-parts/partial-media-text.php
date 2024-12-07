<article data-img-text class="img-text img-text--<?php echo $args['alignment'] ?> img-text--<?php echo $args['image_position'] ?> <?php if ($args['alignment'] === 'right') { echo 'img-text--with-circles'; } ?>" >
	<div class="img-text__inner container">

		<div class="img-text__frame">
			<?php if ($args['media'] && $args['media']['type'] == "video" ) { ?>
				<video autopictureinpicture controls loop class="img-text__video" <?php if ($args['image_url']) { ?> poster="<?php echo $args['image_url'] ?>" <?php } ?>>
					<source src="<?php echo $args['media']['url'] ?>" type="<?php echo $args['media']['mime_type'] ?>">
				</video>
			<?php } else { ?>
				<img class="img-text__img" loading="lazy" src="/wp-content/themes/yesand-theme/images/logo/logo-gray-pictogram.svg" srcset="<?php echo $args['image_url'] ?>" alt="<?php echo $args['image_alt'] ?>" />
			<?php } ?>
		</div>

		<div class="img-text__text">
			<?php if ($args['tag_names']) { ?>
				<div class="img-text__tags para-4 text-dark-green"><?php echo $args['tag_names']; ?></div>
			<?php } ?>
			<?php if ($args['heading']) { ?>
				<?php if($args['link']) { ?>
					<a href="<?php echo $args['link']['url']; ?>"  target="<?php echo $args['link']['target']; ?>">
				<?php } ?>
					<h3 class="heading-5 text-red"><?php echo $args['heading'] ?></h3>
				<?php if($args['link']) { ?>
					</a>
				<?php } ?>
			<?php } ?>
			<?php if($args['subheading']) { ?>
				<?php if($args['link']) { ?>
					<a href="<?php echo $args['link']['url']; ?>"  target="<?php echo $args['link']['target']; ?>">
				<?php } ?>
					<h3><span class="text-black block"><?php echo $args['subheading'] ?></span></h3>
				<?php if($args['link']) { ?>
					</a>
				<?php } ?>
			<?php } ?>
			<?php if ($args['text']) { ?>
				<div class="para-1 text-dark-green"><?php echo $args['text'] ?></div>
			<?php } ?>
			<?php if($args['link']) { ?>
				<a href="<?php echo $args['link']['url']; ?>"  target="<?php echo $args['link']['target']; ?>" class="para-5 text-red link-with-arrow">
					<?php echo $args['link']['title']; ?> 
					<span class="link-with-arrow__icon"></span>
				</a>
			<?php } ?>
		</div>
	</div>
</article>
