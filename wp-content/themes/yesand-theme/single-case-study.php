<?php get_header(); ?>

<div class="bg-dark-green" style="padding-top: 75px">
	<nav class="container breadcrumb-1">
		<ul class="breadcrumb-1__ul">
			<li class="breadcrumb-1__li">
				<a class="breadcrumb-1__item" href="/">Yes&amp;</a>
			</li>
			<li class="breadcrumb-1__li">
				<a class="breadcrumb-1__item" href="/work">Work</a>
			</li>
			<li class="breadcrumb-1__li">
				<a class="breadcrumb-1__item" href="/work/<?php echo get_post_field( 'post_name', get_post() ); ?>" aria-current="page"><?php the_title(); ?></a>
			</li>
		</ul>
	</nav>
</div>

<main>
	<?php the_content(); ?>
</main>

<?php get_template_part( 'template-parts/partial', 'soc-links'); ?>


<?php get_footer(); ?>
