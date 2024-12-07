<?php
/**
 * Yes& Statistics Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
?>
<?php
$sub_heading = get_field('sub-heading_text_sttstcs');
$sub_heading_color = get_field('sub-heading_text_color_palette_sttstcs');
$sub_heading_bckg_color = get_field('sub-heading_text_background_color_sttstcs');
$heading = get_field('heading_text_sttstcs');
$heading_color = get_field('heading_text_color_sttstcs');
$alignment = get_field('alignment_options_sttstcs');
$decorative_circles = get_field('include_decorative_circles_sttstcs');
$paragraph = get_field('paragraph');
$numbers = get_field('statistics_number_block');
?>

<section class="py-5 md:py-20">
    <div class="container">
        <?php
        //displays heading-block with configuration
        echo do_blocks('<!-- wp:acf/heading-block {"name":"acf/heading-block","data":{"field_6407975a0826b":"' . $sub_heading . '","field_6407c33fc31fd":"' . $sub_heading_color . '","field_6407c371c31fe":"' . $sub_heading_bckg_color . '","field_6407c50d9233d":"' . $heading . '","field_6407c51e9233e":"' . $heading_color . '","field_6407c56c2409a":"' . $alignment . '","field_6407c62efc9e5":"' . $decorative_circles . '"},"mode":"edit"} /-->');
        ?>
        <div class="indent-l-1">
            <?php if ($paragraph) { ?>
                <div class="para-2"><?php echo $paragraph ?></div>
            <?php } ?>
            <?php if ($numbers) { ?>
                <div class="factoids-1">
                    <?php foreach ($numbers as $key => $number_item) { ?>
                        <div class="factoid-1">
                            <strong class="factoid-1__value"><?php echo $number_item["statistic_number"] ?></strong>
                            <span class="factoid-1__param-name para-1"><?php echo $number_item["statistic_number_description"] ?></span>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
