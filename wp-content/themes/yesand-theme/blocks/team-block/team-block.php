<?php 

/**
 *  Yes& Team Block.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
?>

<?php

$overlay_colors = array("#5decce", "#cb244b", "#f1bc14", "#e38ca0");
$manual_or_default = get_field('manual_or_default');
if ($manual_or_default == "manual") {
	$team_members = get_field('selected_team_members');
} else {
	$args = array(
		'fields' => 'ids',
			'post_type' => 'team-member',
			'posts_per_page' => -1,
			'orderby' => array(
					'meta_value_num' => 'DESC',
					'title' => 'ASC'
			),
			'meta_key' => 'priority',
	);

	$team_members = get_posts( $args );

}
?>

<?php if ($team_members) { ?>
	<section class="team-members pb-10">
		<div class="container">
			<div class="sm:grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-0 mt-5">

				<?php foreach ( $team_members as $member ) {
					$name = get_the_title( $member );
					$photo_id = get_post_meta( $member, 'photo', true );
					$photo_url = wp_get_attachment_image_src( $photo_id, 'full' )[0];
					$photo_alt = get_post_meta( $photo_id, '_wp_attachment_image_alt', true ) ? get_post_meta( $photo_id, '_wp_attachment_image_alt', true ) : $name;
					$position = get_post_meta( $member, 'position', true );
					$bio = get_post_meta( $member, 'bio', true );
					$linkedin = get_post_meta( $member, 'linkedin', true );
				?>

					<article class="team-member-1" data-js="team-member">
						<?php if ($photo_url) { ?>
							<div class="team-member-1__hoverable">
								<div class="team-member-1__img-frame">
									<img src="<?php echo $photo_url ?>" alt="<?php echo $photo_alt ?>" loading="lazy" decoding="async" class="team-member-1__photo">
								</div>

								<svg class="team-member-1__overlay" width="150" height="150" viewBox="0 0 500 500" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/">
									<path style="fill: <?php echo $overlay_colors[array_rand($overlay_colors, 1)]; ?>" d="M500,0l-500,0l0,500l500,0l0,-500Zm-250,43c114.246,0 207,92.754 207,207c0,114.246 -92.754,207 -207,207c-114.246,0 -207,-92.754 -207,-207c0,-114.246 92.754,-207 207,-207Z"/>
								</svg>
							</div>
						<?php } ?>

						<div class="team-member-1__content hidden sm:col-span-2 md:col-span-3 lg:col-span-4" data-js="team-member-content">
							<div class="title-group-1 title-group-1--with-circles-2">
								<?php if ($position) { ?>
									<span class="title-tag-1 prepend-4"><?php echo $position ?></span>
								<?php } ?>

								<?php if ($name) { ?>
									<h4 class="heading-2 title-tag-1__title text-dark-green"><?php echo $name ?></h4>
								<?php } ?>
							</div>

							<?php if ($bio) { ?>
								<div class="team-member-1__bio para-2"><?php echo $bio ?></div>
							<?php } ?>

							<?php if ($linkedin) { ?>
								<a href="<?php echo $linkedin ?>" class="team-member-1__social-net-link" target="_blank" rel="noopener">
									<img src="/wp-content/themes/yesand-theme/images/icons/linkedin-2.svg" alt="LinkedIn">
								</a>
							<?php } ?>

							<button class="team-member-1__close" data-js="close-team-member-block">
								<img src="/wp-content/themes/yesand-theme/images/icons/cross-1.svg" alt="Cross">
							</button>
						</div>
					</article>

				<?php } ?>
			</div>
		</div>
	</section>
<?php } else {
	echo '<h1>No Team Member is selected yet</h1>';
}
?>
