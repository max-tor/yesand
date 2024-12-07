<?php 

/**
 *  Yes& Header with Services tabs Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
?>

<?php

$subheading = get_field('subheading');
$heading = get_field('heading');
$tabs = get_field('tabs');

// breadcrumbs
$permalink = get_permalink(); 
$home_url = home_url(); 
$relative_permalink = str_replace( $home_url, '', $permalink );
$breadcrumbs = yesand_breadcrumbs($relative_permalink);

?>

<section class="header-default bg-dark-green" data-header-default>
	<?php if($subheading || $heading) { ?>
		<nav class="container breadcrumb-1">
			<ul class="breadcrumb-1__ul">
				<?php echo $breadcrumbs; ?>
			</ul>
		</nav>
	<?php } ?>

	<div class="container">
		<?php if($subheading) { ?>
			<h1 class="header-default__title prepend-2 text-white"><?php echo $subheading ?>
				<?php if($heading) { ?>
					<span class="header-with-default__title-span block heading-2 text-yellow"><?php echo $heading ?></span>
				<?php } ?>
			</h1>
		<?php } ?>
		
		<?php if($tabs) { ?>
			<div class="header-default__tabs">
				<?php foreach($tabs as $index => $tab) { ?>
					<div data-tabs-item class="header-default__tabs-item">
						<button type="button" data-tab-button
							role="tab"
							id="tab-<?php echo $index; ?>"
							aria-selected="false" class="header-default__tabs-button text-white"><span><?php echo $tab['tab_label'] ?></span></button>
							<div class="header-default__tabs-modal-container" data-tab-content id="tabpanel-<?php echo $index; ?>" role="tabpanel">
								<div class="header-default__modal-image" style="background-image: url(<?php echo $tab['tab_image'] ?>) "></div>
								<div class="header-default__tabs-modal" data-tab-modal>
									<button class="header-default__tabs-close" type="button" aria-label="close tab" data-close-modal><img src="/wp-content/themes/yesand-theme/images/close.svg" alt="close-button"></button>
									<div class="header-default__tabs-text">
										<?php echo $tab['tab_content'] ?>
										<?php if($tab['tab_button']) { ?>
											<a class="header-default__tabs-link btn-small text-white bg-dark-green" href="<?php echo $tab['tab_button']['url']; ?>" target="<?php echo $tab['tab_button']['target']; ?>">
												<?php echo $tab['tab_button']['title']; ?>
												<svg viewBox="0 0 45 30" fill="none" xmlns="http://www.w3.org/2000/svg"> <path fill-rule="evenodd" clip-rule="evenodd" d="M31.8934 0.732233L44.2678 13.1066C45.2441 14.0829 45.2441 15.6658 44.2678 16.6421L31.8934 29.0165C30.9171 29.9928 29.3342 29.9928 28.3579 29.0165C27.3816 28.0402 27.3816 26.4572 28.3579 25.4809L36.4645 17.3743L2.5 17.3743C1.11929 17.3743 0 16.2551 0 14.8743C0 13.4936 1.11929 12.3743 2.5 12.3743L36.4645 12.3743L28.3579 4.26777C27.3816 3.29146 27.3816 1.70854 28.3579 0.732233C29.3342 -0.244078 30.9171 -0.244078 31.8934 0.732233Z" fill="#ffffff"/> </svg>
											</a>
										<?php } ?>
									</div>
								</div>
							</div>
						</div>
					<?php } ?>					
					<div class="header-default__tabs-content">
						<picture class="header-default__image">
							<source srcset="/wp-content/themes/yesand-theme/images/illustrations/fish-1.webp" type="image/webp" alt="Fish" loading="lazy">
							<img data-fish-image alt="Fish" src="/wp-content/themes/yesand-theme/images/illustrations/fish-1.png" loading="lazy">
						</picture>			
				</div>	 
			</div>
		<?php } ?>
	</div>
</section>

