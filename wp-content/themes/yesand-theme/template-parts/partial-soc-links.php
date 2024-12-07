<ul class="soc-links">
	<?php if (get_field('instagram_link', 'option')) { ?>
		<li class="soc-links__li">
			<a class="soc-links__a" href="<?php the_field('instagram_link', 'option'); ?>" target="_blank" rel="noopener noreferrer" aria-label="Follow us on Instagram">
				<span class="fa fa-instagram"></span>
			</a>
		</li>
	<?php } ?>

	<?php if (get_field('youtube_link', 'option')) { ?>
		<li class="soc-links__li">
			<a class="soc-links__a" href="<?php the_field('youtube_link', 'option'); ?>" target="_blank" rel="noopener noreferrer" aria-label="Follow us on Youtube">
				<span class="fa fa-youtube"></span>
			</a>
		</li>
	<?php } ?>
	<?php if (get_field('vimeo_link', 'option')) { ?>
		<li class="soc-links__li">
			<a class="soc-links__a" href="<?php the_field('vimeo_link', 'option'); ?>" target="_blank" rel="noopener noreferrer" aria-label="Follow us on Vimeo">
				<span class="fa fa-vimeo"></span>
			</a>
		</li>
	<?php } ?>
	<?php if (get_field('facebook_link', 'option')) { ?>
		<li class="soc-links__li">
			<a class="soc-links__a" href="<?php the_field('facebook_link', 'option'); ?>" target="_blank" rel="noopener noreferrer" aria-label="Follow us on Facebook">
				<span class="fa fa-facebook-square"></span>
			</a>
		</li>
	<?php } ?>

	<?php if (get_field('twitter_link', 'option')) { ?>
		<li class="soc-links__li">
			<a class="soc-links__a" href="<?php the_field('twitter_link', 'option'); ?>" target="_blank" rel="noopener noreferrer" aria-label="Follow us on Twitter">
				<span class="fa fa-twitter"></span>
			</a>
		</li>
	<?php } ?>

	<?php if (get_field('linkedin_link', 'option')) { ?>
		<li class="soc-links__li">
			<a class="soc-links__a" href="<?php the_field('linkedin_link', 'option'); ?>" target="_blank" rel="noopener noreferrer" aria-label="Follow us on Linkedin">
				<span class="fa fa-linkedin"></span>
			</a>
		</li>
	<?php } ?>
</ul>
