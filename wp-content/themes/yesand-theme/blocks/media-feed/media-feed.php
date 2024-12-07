<?php

/**
 * Media Feed Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
?>
<div class="media-feed <?php echo $is_preview ? 'is-preview' : '' ?> ">
<?php
	$items = get_field('items');

	if ($items) {
		foreach ( $items as $item ) {
			$image = $item['image'];
			$heading = $item['heading_it'];
			$subheading = $item['subheading_it'];
			$image_url = $image ? $image['url'] : '';
			$image_alt = $image ? $image['alt'] : '';
			$media = $item['media'];
			$text = $item['text'];
			$image_position = $item['image_position'] ? $item['image_position'] : 'center';
			$alignment = $item['alignment'];
			$link = $item['link'];
			$tags = $item['tags'];
			if ($tags) {
				$tag_names = ''; // initialize an empty string to store the tag names
				foreach ( $tags as $tag_id ) {
						$tag = get_term_by( 'id', $tag_id, 'post_tag' ); 
						$tag_names .= $tag->name . ', '; 
				}
				$tag_names = rtrim( $tag_names, ', ' );
			};
			get_template_part( 'template-parts/partial', 'media-text', array(
					'heading' => $heading,
					'subheading' => $subheading,
					'image_url' => $image_url,
					'image_alt' => $image_alt,
					'media' => $media,
					'text' => $text,
					'alignment' => $alignment,
					'link' => $link,
					'image_position' => $image_position,
					'tag_names' => $tag_names,
				) );
		}
	};
	?>
	<?php if (count($items) > 3) { ?>
		<div class="container">
			<div data-show-more data-show-more-btn class="media-feed__button btn-group-1 btn-group-1--big">
				<span class="btn-group-1__pre">Show</span>
				<button class="btn-group-1__flex">
					<span class="btn-group-1__a">More</span>
					<span class="btn-group-1__arrow-right">
					</span>
					<span class="btn-group-1__circles">
						<img class="btn-group-1__circles-img" src="/wp-content/themes/yesand-theme/images/circles-2.svg" alt="decorative_circles">
					</span>
				</button>
			</div>
		</div>
	<?php } ?>
</div>
