<?php 

/**
 * Featured Yes& Header with media Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
?>

<?php

$heading = get_field('heading');
$title = get_field('title');
$subtitle = get_field('subtitle');
$media = get_field('media');
$link = get_field('link');
$caption = get_field('caption');
$tags = get_field('tags');
if ($tags) {
	$tag_names = ''; // initialize an empty string to store the tag names
	foreach ( $tags as $tag_id ) {
	    $tag = get_term_by( 'id', $tag_id, 'post_tag' ); 
	    $tag_names .= $tag->name . ', '; 
	}
	$tag_names = rtrim( $tag_names, ', ' );
};
$permalink = get_permalink(); 
$home_url = home_url(); 
$relative_permalink = str_replace( $home_url, '', $permalink );
$breadcrumbs = yesand_breadcrumbs($relative_permalink);

?>


<section class="header-with-media-section bg-dark-green py-20" style="padding-top: 75px">
		<nav class="container breadcrumb-1">
		<ul class="breadcrumb-1__ul">
			<?php echo $breadcrumbs; ?>
		</ul>
	</nav>
	<div class="header-with-media container">
		<h1 class="header-with-media__title prepend-1 text-white"><?php echo $heading ?>
			<span class="header-with-media__title-span block heading-2 text-yellow"><?php echo $title ?></span>
		</h1>
		<?php if ($subtitle) { ?>
			<h2 class="header-with-media__subtitle text-white"><?php echo $subtitle ?></h2>	
		<?php } ?>
		<div class="header-with-media__content media-block-1">
			<div class="header-with-media__frame media-block-1__frame border-1">
				<?php if ($media['type'] == "image") { ?>
					<img class="media-block-1__img" src=<?php echo $media['url'] ?> alt=<?php echo $media['alt'] ?>/>
				<?php } ?>
				<?php if ($media['type'] == "video") { ?>
					<video autopictureinpicture controls loop class="media-block-1__video">
						<source src=<?php echo $media['url'] ?> type=<?php echo $media['mime_type'] ?>>
					</video>
				<?php } ?>
			</div>
			<picture class="header-with-media__prepend-img">
				<source alt="Fish" srcset="/wp-content/themes/yesand-theme/images/illustrations/fish-1.webp" type="image/webp">
				<img alt="Fish" src="/wp-content/themes/yesand-theme/images/illustrations/fish-1.png">
			</picture>
			<div class="header-with-media__card card-1 media-block-1__card-margin">
				<div class="header-with-media__tags para-4 text-grey"><?php echo $tag_names; ?></div>
				<div class="header-with-media__text"><?php echo $caption; ?></div>
				<?php if($link) { ?>
					<a class="para-5 text-red link-with-arrow" href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>">
						<?php echo $link['title']; ?>
						<span class="link-with-arrow__icon"></span>
					</a>
				<?php } ?>
			</div>
		</div>
	</div>
</section>
