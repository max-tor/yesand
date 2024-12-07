<?php 

/**
 *  Yes& Header with Background Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
?>

<?php

$subheading = get_field('subheading');
$heading = get_field('heading');
$paragraph = get_field('paragraph');
$image = get_field('image');
$logo = get_field('logo');
$link = get_field('link');
$upper_link_text = get_field('upper_link_text');
$image_position = get_field('image_position') ? get_field('image_position') : 'center';
// breadcrumbs
$permalink = get_permalink(); 
$home_url = home_url(); 
$relative_permalink = str_replace( $home_url, '', $permalink );
$breadcrumbs = yesand_breadcrumbs($relative_permalink);

if ($logo == "fish") {
	$mascot_file_basename = "fish-900";
	$mascot_alt = "Fish";
} elseif ($logo == "penguin") {
	$mascot_file_basename = "penguin-900";
	$mascot_alt = "Penguin";
} elseif ($logo == "parrot") {
	$mascot_file_basename = "bird-boosters";
	$mascot_alt = "Bird";
}

?>


<section class="top-v3">
	<div class="top-v3__content container">
		<div class="top-v3__text-col">
			<div class="top-v3__plate">
				<nav class="breadcrumb-1">
					<ul class="breadcrumb-1__ul">
						<?php echo $breadcrumbs; ?>
					</ul>
				</nav>

				<?php if ($subheading) { ?>
					<span class="prepend-1 text-white"><?php echo $subheading ?></span>
				<?php } ?>

				<?php if ($heading) { ?>
					<h1 class="heading-2 text-yellow"><?php echo $heading ?></h1>
				<?php } ?>

				<?php if ($paragraph) { ?>
					<div class="text-white para-2 top-v3__txt-frame">
						<?php echo $paragraph ?>
					</div>
				<?php } ?>

				<?php if ($logo != "no-logo") { ?>
					<picture class="top-v3__mascot">
						<source loading="lazy" fetchpriority="low" decoding="async" srcset="/wp-content/themes/yesand-theme/images/illustrations/<?php echo $mascot_file_basename ?>.webp" type="image/webp" alt="<?php echo $mascot_alt?>">
						<img loading="lazy" fetchpriority="low" decoding="async"    src="/wp-content/themes/yesand-theme/images/illustrations/<?php echo $mascot_file_basename ?>.png"  alt="<?php echo $mascot_alt?>">
					</picture>
				<?php } ?>

			</div>
		</div>

		<div class="top-v3__btn-col">

			<div class="btn-group-1">
				<?php if ($upper_link_text) { ?>
					<span class="btn-group-1__pre"><?php echo $upper_link_text ?></span>
				<?php } ?>

				<a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>" class="btn-group-1__flex">
					<?php if ($link) { ?>
						<span class="btn-group-1__a"><?php echo $link['title']; ?></span>
					<?php } ?>

					<span class="btn-group-1__arrow-right"></span>
					<span class="btn-group-1__circles">
						<img class="btn-group-1__circles-img" src="/wp-content/themes/yesand-theme/images/circles-2.svg" alt="decorations">
					</span>
				</a>
			</div>

		</div>
	</div>

	<?php if ($image) { ?>
		<img class="top-v3__bg-img top-v3__bg-img--<?php echo $image_position ?>" fetchpriority="high" decoding="async" loading="lazy" src="<?php echo $image ?>" alt="">
	<?php } ?>

	<img class="top-v3__ghost" loading="lazy" fetchpriority="low" decoding="async" src="/wp-content/themes/yesand-theme/images/logo/logo-white-pictogram.svg" alt="">
	<img class="top-v3__wave"  loading="lazy" fetchpriority="low" decoding="async" src="/wp-content/themes/yesand-theme/images/wave-6.svg" alt="">

</section>
