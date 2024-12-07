<?php 

/**
 * Text Block Header  Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
?>

<?php
  $body = get_field('body');
?>

<div class="text-block container pt-10 pb-10"><?php echo $body; ?></div>

