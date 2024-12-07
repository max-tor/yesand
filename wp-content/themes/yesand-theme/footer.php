			<?php $page_template = basename(get_page_template()); ?>

			<footer id="colophon" class="site-footer" role="contentinfo">
				<div class="footer-top bg-secondary">
					<div class="container ">
						<?php do_action('yesand_theme_footer'); ?>
						<div class="grid grid-cols-1 gap-1 md:grid-cols-2 md:gap-2 self-center items-center text-white">
							<div class="col-left <?php if ($page_template == 'page-home.php') : ?>footer-top__summary<?php endif; ?>">
								<?php if ($page_template != 'page-home.php' &&get_field('active_signup', 'option')) : ?>
									<?php $Signup = get_field('Signup', 'option'); ?>
									<?php if ($Signup) : ?>
										<div>
											<span class="prepend-4 block text-white"><?php echo $Signup['title']; ?></span>
											<span class="heading-4 text-yellow"><?php echo $Signup['subtitle']; ?></span>
										</div>
										<?php
											$data = $Signup['hubspot'];
											if ($data) {
												$codes = explode(':', $data);
												echo do_shortcode("[hubspot type=form portal=$codes[0] id=$codes[1]]");
											}
										?>
										<p class="text-white text-sm heading-6 mt-5"><?php the_field('information', 'option'); ?></p>
									<?php endif; ?>

								<?php else : ?>
									<h3 class="text-white text-sm heading-6"><?php the_field('about_summary', 'option'); ?></h3>
								<?php endif; ?>

								<p class="text-white text-sm heading-6 mt-2 font-normal"><?php the_field('address', 'option'); ?></p>
							</div>

							<div class="col-right px-0 mt-2 sm:mt-2 md:mt-0 lg:p-8 lg:max-w-[590px] lg:float-right lg:ml-auto">
								<?php if (get_field('active_insta', 'option')) : //?? todo figure out for what ?>
									<script src="https://apps.elfsight.com/p/platform.js" defer></script>
									<div class="elfsight-app-375e01e0-b407-4a4f-bd6f-7e0267945cae max-w-[600px]"></div>
								<?php else : ?>
									<?php if (shortcode_exists('footer_instagram_feed')) { ?>
										<?php echo do_shortcode('[footer_instagram_feed feed=1]'); ?>
									<?php } ?>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>

				<div class="footer-bottom border-t">
					<div class="container py-3 lg:flex justify-between items-center">
						<div class="text-left">
							<?php
								wp_nav_menu(
									array(
										'container_id' => 'footer-menu',
										'container_class' => 'lg:bg-transparent lg:block',
										'menu_class' => 'flex flex-wrap items-center',
										'theme_location' => 'footer',
										'li_class' => 'item-nav-footer inline-block py-2.5 pr-6 text-extrasmall leading-3 uppercase font-bold text-primary hover:underline',
										'fallback_cb' => false,
									)
								);
							?>
						</div>
						<div class="copyright text-left md:text-right text-extrasmall leading-3 font-bold py-2.5">&copy; <?php echo date_i18n('Y'); ?> - <?php echo get_bloginfo('name'); ?>. All Rights Reserved.</div>
					</div>
				</div>
			</footer>
		</div>
		<?php wp_footer(); ?>
	</body>

</html>
