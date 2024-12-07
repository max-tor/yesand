<?php 

/**
 *  Yes& Cards 3-up.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
?>

<?php

$heading = get_field('heading');
$cards = get_field('cards');

?>

<section class="bg-white pt-20 pb-20">
	<div class="container">

		<?php if ($heading) { ?>
			<div class="center para-1 mb-10"><?php echo $heading ?></div>
		<?php } ?>

		<?php if ($cards) { ?>
			<div class="grid-3-up mt-5" data-total="<?php echo count($cards) ?>">
				<?php foreach($cards as $card) { ?>

					<article class="media-4">
						<?php if ($card['card_image']) { ?>
							<div class="media-4__img-frame">
								<img class="media-4__photo" src="<?php echo $card['card_image']['url'] ?>" alt="<?php echo $card['card_image']['alt'] ?>" loading="lazy"/>
							</div>
						<?php } ?>

						<div class="media-4__content">
							<?php if ($card['card_heading']) { ?>
								<h4 class="heading-5 text-red mt-0 mb-2"><?php echo $card['card_heading'] ?></h4>
							<?php } ?>

							<?php if ($card['card_body']) { ?>
								<div class="para-1">
									<?php echo $card['card_body'] ?>
								</div>
							<?php } ?>

							<?php if ($card['button']) { ?>
								<p class="para-1 mt-3">
									<a class="text-red" href="<?php echo $card['button']['url']; ?>" target="<?php echo $card['button']['target']; ?>"><?php echo $card['button']['title']; ?></a>
								</p>
							<?php } ?>
						</div>
					</article>

				<?php } ?>
			</div>
		<?php } ?>

	</div>
</section>
