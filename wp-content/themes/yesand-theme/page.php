<?php get_header(); ?>   

<div id="content" class="site-content flex-grow">
	<?php do_action( 'yesand_theme_content_start' ); ?>

	<main>
		<?php the_content(); ?>
		<?php edit_post_link(); ?>
	</main>

	<?php get_template_part( 'template-parts/partial', 'soc-links'); ?>

	<?php do_action( 'yesand_theme_content_end' ); ?>
</div>

<?php get_footer(); ?>
