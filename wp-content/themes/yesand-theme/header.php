<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php wp_head(); ?>
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23941017-2"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());

		  gtag('config', 'UA-23941017-2');
		</script>
		<!--END Global site tag (gtag.js) - Google Analytics -->

	</head>

	<body <?php body_class( '' ); ?>>

		<?php do_action( 'yesand_theme_site_before' ); ?>

		<div id="page">

			<?php do_action( 'yesand_theme_header' ); ?>

			<header class="header bg-secondary text-white sticky top-0 left-0 right-0 w-full z-50">

				<div class="container">
					<div id="wrap-header" class="wrap-header lg:flex lg:justify-between lg:items-center">
						<div class="flex justify-between items-center max-[959px]:px-5">
							<div class="logo-site">
								<a href="<?php echo get_bloginfo( 'url' ); ?>">
									<img src="/wp-content/themes/yesand-theme/images/logo/logo-white-red-horizontal.svg" alt="Yes&" class="navbar-logo__img">
								</a>
							</div>

							<button type="button" aria-label="Toggle navigation" aria-controls="primary-menu" data-js="mobile-menu-toggle" aria-expanded="false">
								<svg viewBox="0 0 20 20" width="20" height="20" class="icon-hamburger inline-block w-6 h-6" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
									<g stroke="none" stroke-width="1" fill="currentColor" fill-rule="evenodd">
										<path d="M0,3 L20,3 L20,5 L0,5 L0,3 Z M0,9 L20,9 L20,11 L0,11 L0,9 Z M0,15 L20,15 L20,17 L0,17 L0,15 Z"></path>
									</g>
								</svg>
								<svg xmlns="http://www.w3.org/2000/svg" fill="none" width="24" height="24" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="icon-close hidden w-7 h-7">
  								<path stroke-linecap="square" stroke-linejoin="square" d="M6 18L18 6M6 6l12 12" />
								</svg>
							</button>
						</div>

						<div data-collapsible="mobile-menu" class="wrap-right-navigation relative lg:flex lg:justify-between lg:items-center">
							<div class="bg-mobile bg-primary absolute left-0 top-0 h-full w-full z-0 block lg:hidden"></div>
							<?php
								// https://developer.wordpress.org/reference/functions/wp_nav_menu/#source
								wp_nav_menu(
									array(
										'container'       => 'nav',
										'container_id'    => 'primary-menu',
										'container_class' => 'main-menu-nav',
										'menu_class'      => 'main-nav-ul',
										'theme_location'  => 'primary',
										'li_class'        => 'menu-item__li',
										'fallback_cb'     => false,
									)
								);
							?>

							<nav id="primary-menu-social-media" class="social-media-links relative z-1 lg:hidden">
								<ul class="mobile-nav-social-media">
									<?php if (get_field('instagram_link', 'option')): ?>
										<li><a href="<?php the_field('instagram_link', 'option'); ?>" target="_blank" rel="noopener" class="mobile-nav-social-media__a" aria-label="Follow us on Instagram mobile"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
									<?php endif; ?>
									<?php if (get_field('youtube_link', 'option')): ?>
										<li><a href="<?php the_field('youtube_link', 'option'); ?>" target="_blank" rel="noopener" class="mobile-nav-social-media__a" aria-label="Follow us on Youtube mobile"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
									<?php endif; ?>
									<?php if (get_field('vimeo_link', 'option')): ?>
										<li><a href="<?php the_field('vimeo_link', 'option'); ?>" target="_blank" rel="noopener" class="mobile-nav-social-media__a" aria-label="Follow us on Vimeo mobile"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
									<?php endif; ?>
									<?php if (get_field('facebook_link', 'option')): ?>
										<li><a href="<?php the_field('facebook_link', 'option'); ?>" target="_blank" rel="noopener" class="mobile-nav-social-media__a" aria-label="Follow us on Facebook mobile"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
									<?php endif; ?>
									<?php if (get_field('twitter_link', 'option')): ?>
										<li><a href="<?php the_field('twitter_link', 'option'); ?>" target="_blank" rel="noopener" class="mobile-nav-social-media__a" aria-label="Follow us on Twitter mobile"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
									<?php endif; ?>
									<?php if (get_field('linkedin_link', 'option')): ?>
										<li><a href="<?php the_field('linkedin_link', 'option'); ?>" target="_blank" rel="noopener" class="mobile-nav-social-media__a" aria-label="Follow us on Linkedin mobile"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
									<?php endif; ?>
								</ul>
							</nav>
							
							<div class="wrap-search hidden lg:block ml-7 relative text-left">
								<button type="button" class="inline-flex w-full justify-center text-white shadow-none" id="search-button" aria-expanded="false" aria-haspopup="true" aria-label="Search button">
									<svg xmlns="http://www.w3.org/2000/svg" fill="none" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 hover:stroke-yellow">
										<path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
									</svg>
								</button>
								<div id="search-heading-form" class="header-search-box absolute right-0 z-10 origin-top-right transition ease-in duration-200" aria-orientation="vertical" aria-labelledby="search-button" tabindex="-1">
									<div class="wrap-search-head text-black">
										<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
											<div class="wrap-form-search">
												<label class="screen-reader-text" for="s" aria-label="Search request"><?php _x( 'Search for:', 'label' ); ?></label>
												<input class="header-search-box__input text-black py-1 px-3 shadow-none shadow-transparent outline-none outline-0 placeholder:italic placeholder:text-black" type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="Search"/>
												<!-- <input type="submit" id="searchsubmit" value="<?php echo esc_attr_x( 'Search', 'submit button' ); ?>" /> -->
											</div>
										</form>
									</div>
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</header>
