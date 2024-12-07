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
<div class="container accordion-container">
<?php
	$accordion_tabs = get_field('accordion_tabs');
?>
<?php foreach ($accordion_tabs as $n => $arTab) { ?>
	<div class="accordion-item">
		<h3 class="accordion">
			<?php if ($arTab["accordion_content"][0]["acf_fc_layout"] == 'jobs_accordion_item') { ?>
				<?php echo $arTab["accordion_content"][0]["title_accordion_item_jobs"] ?>
			<?php } elseif ($arTab["accordion_content"][0]["acf_fc_layout"] == 'wysiwyg') { ?>
				<?php echo $arTab["accordion_content"][0]["title_accordion_item_wysiwyg"] ?>
			<?php } ?>
		</h3>
		<div class="accordion-content">
						<?php
						foreach ($arTab["accordion_content"] as $tabBlock) {
										switch ($tabBlock["acf_fc_layout"]) {
														case 'jobs_accordion_item':
																		?>

																		<?php
																		foreach ($tabBlock["job_item"] as $index => $job) {
																						get_template_part('template-parts/partial', 'accordion-jobs', array(
																								'title' => $job["position_title"],
																								'content' => $job["position_content"],
																								'link' => $job['read_more_link'],
																								'index' => $index,
																						));
																		}
																		?>
																		<?php
																		break;
														case 'wysiwyg':
																		?>
																		<?php
																		get_template_part('template-parts/partial', 'accordion-wysiwyg', array(
																				'content' => $tabBlock["content_wysiwyg"],
																		));
																		?>

																		<?php
																		break;
														default:
																		break;
										}
						}
						?>
		</div>
	</div>
<?php }
?>
</div>
<?php if (count($accordion_tabs) > 0) { ?>
        <script>
                let acc = document.getElementsByClassName("accordion");
                let i;
                for (i = 0; i < acc.length; i++) {
                        acc[i].addEventListener("click", function () {
                                this.classList.toggle("active");
                                let accordionContent = this.nextElementSibling;
                                if (accordionContent.style.maxHeight) {
                                        accordionContent.style.maxHeight = null;
                                } else {
                                        accordionContent.style.maxHeight = accordionContent.scrollHeight + "px";
                                }
                        });
                }
        </script>
        <?php
}?>
