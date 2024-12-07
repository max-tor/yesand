<?php get_header(); ?>

<section id="primary" class="content-area">
  <main id="main" class="site-main">
		<div class="search-top bg-light-grey">
			<div class="container">
        <form class="search-box" id="searchresultsform" action="<?php echo home_url( '/' ); ?>" method="get">
            <input class="search-box__input" placeholder="Search" type="search" name="s" value="<?php echo get_search_query(); ?>">
						<div class="search-box__button btn-group-1">
							<button type="submit" value="Search" class="btn-group-1__flex">
								<span class="btn-group-1__a">SEARCH</span>
								<span class="btn-group-1__arrow-right"></span>
								<span class="btn-group-1__circles">
									<img class="btn-group-1__circles-img" src="/wp-content/themes/yesand-theme/images/circles-2.svg">
								</span>
							</button>
						</div>
        </form>
			</div>
		</div>
  	<div class="container">
			<?php if ( have_posts() ) : ?>

				<?php /* Start the Loop */ ?>
				<div class="search-results">
				<?php while ( have_posts() ) : the_post(); ?>
							<div class="search-result">
								<?php if ( get_post_type() == 'team-member' ) { ?>
							
							<a class="search-result__title text-red" href="/about-us/our-team">
								<?php the_title(); ?>
							</a><p class="search-result__path text-grey">
								<a href="/">Yes&amp;</a> >
									<a href="/about-us/">About Us</a> >
									<a href="/about-us/our-team">Our team</a>
							</p>
								<?php } else { ?>
											<a class="search-result__title text-red" href="<?php the_permalink(); ?>">
												<?php the_title(); ?>
											</a>

											<p class="search-result__path text-grey">
													<?php //creating a breadcrumbs
													$converted_link = explode('/', substr(get_permalink(), strlen(home_url('/'))));
													array_pop($converted_link); ?>
													<a href="<?php echo (home_url('/')); ?>">Yes&amp;</a>
													<?php
													foreach ($converted_link as $item) { ?>
															<a href="<?php echo '/' . $item; ?>"><?php echo '> ' . strtoupper(preg_replace('/[^a-z]/', " ", strtolower($item))); ?></a>
													<?php } ?>
											</p>
										<?php } ?>
											<div class="search-result__text">
												<?php the_excerpt(); ?>
											</div>
									</div>
				
				<?php endwhile; ?>
				</div>
				<?php the_posts_pagination( array(
					'prev_text' => __( 'Previous', 'textdomain' ),
					'next_text' => __( 'Next', 'textdomain' ),
				) ); ?>

			<?php else : ?>

				<?php echo "There is no results"; ?>

			<?php endif; ?>
		</div>
  </main><!-- #main -->
</section><!-- #primary -->

<section id="section-pre-footer" class="bg-white pt-10">
	<div class="bg-circles-1" style="">
		<div class="container bg-mountains-1" style="">
			<div class="title-group-1 ">
				<span class="title-tag-1 prepend-2" style="background-color: #c10330; color: #FFFFFF; ">we have big ideas for you.</span>
				<h2 class="prefooter-title hero-1 text-dark-green title-tag-1__title" style="color: #000000; ">Explore the power of &amp;</h2>
			</div>
					
					<div class="btn-group-1 mt-5">
						<span class="btn-group-1__pre">Let’s </span>
						<a target="" href="https://yesandagency.com/contact/" class="btn-group-1__flex">
							<span class="btn-group-1__a">Connect</span>
							<span class="btn-group-1__arrow-right"></span>
							<span class="btn-group-1__circles">
								<img decoding="async" alt="decorative_circles" data-src="/wp-content/themes/yesand-theme/images/circles-2.svg" class="btn-group-1__circles-img ls-is-cached lazyloaded" src="/wp-content/themes/yesand-theme/images/circles-2.svg"><noscript><img decoding="async"   alt="decorative_circles" data-src="/wp-content/themes/yesand-theme/images/circles-2.svg" class="btn-group-1__circles-img lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="><noscript><img decoding="async" class="btn-group-1__circles-img" src="/wp-content/themes/yesand-theme/images/circles-2.svg" alt="decorative_circles"></noscript>
							</span>
						</a>
					</div>	
			</div>
	</div>
</section>

<?php get_footer(); ?>