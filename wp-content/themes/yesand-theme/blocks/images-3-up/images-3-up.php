<?php 

/**
 *  Yes& Images 3-up.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
?>

<?php
$items = get_field('items');
?>

<?php if($items) { ?>
	<div class="container">
		<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 mt-5">
			<?php foreach($items as $item) { ?>

				<article class="media-3">
					<div class="media-3__hoverable">

						<?php if ($item['image']) { ?>
							<img class="media-3__photo" loading="lazy" src="<?php echo $item['image']['url'] ?>" alt="<?php echo $item['image']['alt'] ?>" />
						<?php } ?>

						<?php if($item['on_hover_content']) { ?>
							<div class="media-3__overlay <?php if($item['color']) { echo 'media-3__overlay--' . $item['color']; } ?>">
								<div class="media-3__content">
									<address><?php echo $item['on_hover_content'] ?></address>
								</div>
							</div>
						<?php } ?>

					</div>

					<?php if($item['link']) { ?>
						<h4 class="heading-7 arrow-after-heading-1">
							<a href="<?php echo $item['link']['url']; ?>" target="_blank" class="stretched-link"><?php echo $item['link']['title']; ?></a>
						</h4>
					<?php } ?>

				</article>

			<?php } ?>
		</div>
	</div>
<?php } ?>
