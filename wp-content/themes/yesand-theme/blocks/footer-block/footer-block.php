<?php
/**
 * Yes& Pre-Footer Block.
 */

//image array
//$footer_block_image = get_field('footer_block_image');
//heading params
$sub_heading_text = get_field('sub-heading_text_yfb');
$sub_heading_text_color = get_field('sub-heading_text_color_palette_yfb');
$sub_heading_text_background_color = get_field('sub-heading_text_background_color_yfb');
$heading_text = get_field('heading_text_yfb');
$heading_text_color = get_field('heading_text_color_yfb');
$alignment_options = get_field('alignment_options_yfb');
$include_decorative_circles = get_field('include_decorative_circles_yfb');

$sub_heading_style = "";
$heading_style = "";
$background_cycle_style = "";
$background_image_style = "";
if ($alignment_options == "right") {
	$sub_heading_style = "margin-left: 40%;";
	$heading_style = "margin-left: 45%;";
	$background_cycle_style = "background-position-x: 30%;";
	$background_image_style = "background-position-x: left;";
} elseif ($alignment_options == "center") {
	$sub_heading_style = "margin-left: 25%;";
	$heading_style = "margin-left: 30%;";
}

//btn params
$btn_alignment = get_field('yesand_button_alignment_yfb'); //TODO Need to dicsuss in the team
$btn_sub_heading_text = get_field('yesand_button_sub-heading_text_yfb');
$btn_link = get_field('yesand_link_yfb');
?>
<section id="section-pre-footer" class="bg-white pt-10">
	<div class="bg-circles-1" style="<?php echo $background_cycle_style ?>">
		<div class="container bg-mountains-1" style="<?php echo $background_image_style ?>">
			<div class="title-group-1 <?php echo ($decorative_circles == 1) ? 'title-group-1--with-circles' : ''; ?>">
				<span class="title-tag-1 prepend-2" style="background-color: <?php echo $sub_heading_text_background_color ?>; color: <?php echo $sub_heading_text_color ?>; <?php echo $sub_heading_style ?>"><?php echo $sub_heading_text ?></span>
				<h2 class="prefooter-title hero-1 text-dark-green title-tag-1__title" style="color: <?php echo $heading_text_color ?>; <?php echo $heading_style ?>"><?php echo $heading_text ?></h2>
			</div>
			<?php
				if ($btn_link != '') { ?>		
					<div class="btn-group-1 mt-5">
						<span class="btn-group-1__pre"><?php echo $btn_sub_heading_text ?></span>
						<a target="<?php echo $btn_link['target'] ?>" href="<?php echo $btn_link['url'] ?>" class="btn-group-1__flex">
							<span class="btn-group-1__a"><?php echo $btn_link['title'] ?></span>
							<span class="btn-group-1__arrow-right"></span>
							<span class="btn-group-1__circles">
								<img class="btn-group-1__circles-img" src="/wp-content/themes/yesand-theme/images/circles-2.svg" alt="decorative_circles">
							</span>
						</a>
					</div>	
				<?php }
			?>
		</div>
	</div>
</section>
