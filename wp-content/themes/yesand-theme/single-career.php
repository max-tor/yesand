<?php get_header(); ?>

<?php do_action('yesand_theme_content_start'); ?>

<main>
	<?php the_content(); ?>
</main>

<?php get_template_part( 'template-parts/partial', 'soc-links'); ?>

<?php do_action('yesand_theme_content_end'); ?>

<?php get_footer(); ?>
