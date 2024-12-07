<?php 

/**
 * Two Columns Fluid Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

//$image array with all info about media includes all type of thumbnails
	$image = get_field('image');
	$heading = get_field('heading_it');
	$subheading = get_field('subheading_it');
	$image_url = $image ? $image['url'] : '';
	$media = get_field('media');
	$image_alt = $image ? $image['alt'] : '';
	$text = get_field('text');
	$alignment = get_field('alignment');
	$image_position = get_field('image_position') ? get_field('image_position') : 'center';
	$link = get_field('link');
	$tags = get_field('tags');
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
			'tag_names' => $tag_names
		 ) );
?>