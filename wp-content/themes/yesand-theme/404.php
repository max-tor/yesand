<?php get_header(''); ?>
<?php 
$message = get_field('404_message', 'option'); 
$logo = get_field('logo', 'option');
$link = get_field('link', 'option');
$link_label = $link['title'] ? $link['title'] : 'return to';
$link_url = $link['url'] ? $link['url'] : '/';
$link_target = $link['target'] ? $link['target'] : '';
$upper_link_text = get_field('upper_link_text', 'option');
$show_pre_footer_block = get_field('show_pre_footer_block', 'option');


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

<?php get_template_part( 'template-parts/partial', 'soc-links'); ?>

<section class="page404 bg-secondary bg-wave-2 text-white">
	<div class="container">
		<?php if ($message) { ?>
			<div class="page404__head">
				<?php echo $message; ?>
			</div>
		<?php } ?>

		<?php if ($logo != "no_logo") { ?>
			<picture class="page404__penguin">
				<source loading="lazy" fetchpriority="low" decoding="async" srcset="/wp-content/themes/yesand-theme/images/illustrations/<?php echo $mascot_file_basename ?>.webp" type="image/webp" alt="<?php echo $mascot_alt?>">
				<img loading="lazy" fetchpriority="low" decoding="async"    src="/wp-content/themes/yesand-theme/images/illustrations/<?php echo $mascot_file_basename ?>.png"  alt="<?php echo $mascot_alt?>">
			</picture>
		<?php } ?>
	</div>
	<div class="container page404__action">
		<div class="btn-group-1">
			<span class="btn-group-1__pre prepend-3"><?php echo $upper_link_text ?></span>
			<a target="<?php echo $link_target ?>" href="<?php echo $link_url ?>" class="btn-group-1__flex">
				<span class="btn-group-1__a"><?php echo $link_label ?></span>
				<span class="btn-group-1__arrow-right"></span>
				<span class="btn-group-1__circles">
					<img class="btn-group-1__circles-img" src="/wp-content/themes/yesand-theme/images/circles-2.svg" alt="decorative_circles">
				</span>
			</a>
		</div>
	</div>
</section>

<?php if ($show_pre_footer_block ) { ?>
<section id="section-pre-footer" class="bg-white pt-10">
	<div class="bg-circles-1" style="">
		<div class="container bg-mountains-1" style="">
			<div class="title-group-1 ">
				<span class="title-tag-1 prepend-2" style="background-color: #c10330; color: #FFFFFF; ">we have big ideas for you.</span>
				<h2 class="prefooter-title hero-1 text-dark-green title-tag-1__title" style="color: #000000; ">Explore the power of &amp;</h2>
			</div>
					
					<div class="btn-group-1 mt-5">
						<span class="btn-group-1__pre">Let’s </span>
						<a target="" href="https://yesandagency.com/contact/" class="btn-group-1__flex">
							<span class="btn-group-1__a">Connect</span>
							<span class="btn-group-1__arrow-right"></span>
							<span class="btn-group-1__circles">
								<img decoding="async" alt="decorative_circles" data-src="/wp-content/themes/yesand-theme/images/circles-2.svg" class="btn-group-1__circles-img ls-is-cached lazyloaded" src="/wp-content/themes/yesand-theme/images/circles-2.svg"><noscript><img decoding="async"   alt="decorative_circles" data-src="/wp-content/themes/yesand-theme/images/circles-2.svg" class="btn-group-1__circles-img lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="><noscript><img decoding="async" class="btn-group-1__circles-img" src="/wp-content/themes/yesand-theme/images/circles-2.svg" alt="decorative_circles"></noscript>
							</span>
						</a>
					</div>	
			</div>
	</div>
</section>
<?php } ?>

<?php get_footer(); ?>
