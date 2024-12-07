<?php
/**
 * Yes& Heading Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
?>

<?php
$sub_heading = get_field('sub-heading_text');
$sub_heading_color = get_field('sub-heading_text_color_palette');
$sub_heading_bckg_color = get_field('sub-heading_text_background_color');
$heading = get_field('heading_text');
$heading_color = get_field('heading_text_color');
$alignment = get_field('alignment_options');
$decorative_circles = get_field('include_decorative_circles');

$sub_heading_style = "";
$heading_style = "";
if ($alignment == "right") {
	$sub_heading_style = "margin-left: 40%;";
	$heading_style = "margin-left: 45%;";
} elseif ($alignment == "center") {
	$sub_heading_style = "margin-left: 25%;";
	$heading_style = "margin-left: 30%;";
}
?>
<div class="container">
        <div class="title-group-1 <?php echo($decorative_circles == 1) ? 'title-group-1--with-circles' : ''; ?>">
                <span class="title-tag-1 prepend-2" style="background-color: <?php echo $sub_heading_bckg_color ?>; color: <?php echo $sub_heading_color ?>; <?php echo $sub_heading_style ?>"><?php echo $sub_heading ?></span>
                <h2 class="hero-1 text-dark-green title-tag-1__title" style="color: <?php echo $heading_color ?>; <?php echo $heading_style ?>"><?php echo $heading ?></h2>
        </div>
</div>
