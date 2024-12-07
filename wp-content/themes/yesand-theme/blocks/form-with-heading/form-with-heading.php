<?php
/**
 * Form With Heading Block.
 *
 */
?>
<?php
if (!function_exists('apply_form_page_title_helper')) {

        function apply_form_page_title_helper($value) {
                global $post;
                return isset($post) ? $post->post_title : '';
        }

}

$sub_heading = get_field('sub-heading_text');
$sub_heading_color = get_field('sub-heading_text_color_palette');
$sub_heading_bckg_color = get_field('sub-heading_text_background_color');
$heading = get_field('heading_text');
$heading_color = get_field('heading_text_color');
$alignment = get_field('alignment_options');
$decorative_circles = get_field('include_decorative_circles');
$use_form = get_field('use_form');

if ($use_form == 6) { //adding dinamic fild which depends from onwhat page placed form
        add_filter('gform_field_value_apply_form_page_title', 'apply_form_page_title_helper');
}

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
<?php if ($heading != '') { ?>
        <div class="form-header">
                <div class="container">
                        <div class="title-group-1 <?php echo($decorative_circles == 1) ? 'title-group-1--with-circles' : ''; ?>">
                                <?php if ($sub_heading != '') { ?>
                                        <span class="title-tag-1 prepend-2" style="background-color: <?php echo $sub_heading_bckg_color ?>; color: <?php echo $sub_heading_color ?>; <?php echo $sub_heading_style ?>"><?php echo $sub_heading ?></span>
                                <?php } ?>
                                <h2 class="hero-1 text-dark-green title-tag-1__title" style="color: <?php echo $heading_color ?>; <?php echo $heading_style ?>"><?php echo $heading ?></h2>
                        </div>
                </div>                
        </div>
<?php } ?>
<div class="contact-form">
        <div class="container">
                <?php echo do_shortcode('[gravityform id="' . $use_form . '" title="false" description="false" ajax="true"]'); ?>
        </div>
</div>