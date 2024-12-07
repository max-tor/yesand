<?php
/**
 * Template Name: Homepage
 *
 */
?>
<?php get_header(); ?>

<div id="content" class="site-content flex-grow">

	<main>
		<?php the_content(); ?>
		<?php edit_post_link(); ?>
	</main>

	<?php get_template_part( 'template-parts/partial', 'soc-links'); ?>

</div>

<?php get_footer(); ?>
