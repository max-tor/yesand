<?php 

/**
 *  Yes& Client Logos.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
?>

<?php $logos = get_field('logos'); ?>

<?php if ($logos) { ?>
	<div class="container mt-10">
		<div class="logos-1">
			<?php foreach ( $logos as $logo_image ) { ?>
				<?php
					$logo_url = $logo_image['url'];
					$logo_alt = $logo_image['alt'] ? $logo_image['alt'] : $logo_image['title'];
				?>
				<?php if ($logo_url) { ?>
					<img class="logos-1__img" loading="lazy" decoding="async" src="<?php echo $logo_url ?>" alt="<?php echo $logo_alt ?>" />
				<?php } ?>
			<?php } ?>
		</div>
	</div>
<?php } ?>
