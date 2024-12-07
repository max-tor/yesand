<?php
/**
 * Add footer instagram feed shortcode
 */
add_shortcode('footer_instagram_feed', 'footer_instagram_feed_func');

function footer_instagram_feed_func($atts = array(), $preview_settings = false) {
        do_action('sbi_before_display_instagram');

        $database_settings = sbi_get_database_settings();

        if ($database_settings['sb_instagram_ajax_theme'] !== 'on' && $database_settings['sb_instagram_ajax_theme'] !== 'true' && $database_settings['sb_instagram_ajax_theme'] !== '1' && $database_settings['sb_instagram_ajax_theme'] !== true) {
                wp_enqueue_script('sbi_scripts');
        }

        if ($database_settings['enqueue_css_in_shortcode'] === 'on' || $database_settings['enqueue_css_in_shortcode'] === 'true' || $database_settings['enqueue_css_in_shortcode'] === true) {
                wp_enqueue_style('sbi_styles');
        }

        $instagram_feed_settings = new SB_Instagram_Settings($atts, $database_settings, $preview_settings);

        $early_settings = $instagram_feed_settings->get_settings();
        ;
        if (empty($early_settings) && !sbi_doing_customizer($atts)) {
                $style = current_user_can('manage_instagram_feed_options') ? ' style="display: block;"' : '';
                $id = isset($atts['feed']) ? (int) $atts['feed'] : false;
                if ($id) {
                        $message = sprintf(__('Error: No feed with the ID %s found.', 'instagram-feed'), $id);
                } else {
                        $message = __('Error: No feed found.', 'instagram-feed');
                }
                ob_start();
                ?>
                <div id="sbi_mod_error" <?php echo $style; ?>>
                        <span><?php esc_html_e('This error message is only visible to WordPress admins', 'instagram-feed'); ?></span><br />
                        <p><strong><?php echo esc_html($message); ?></strong>
                        <p><?php esc_html_e('Please go to the Instagram Feed settings page to create a feed.', 'instagram-feed'); ?></p>
                </div>
                <?php
                $html = ob_get_contents();
                ob_get_clean();
                return $html;
        }

        $instagram_feed_settings->set_feed_type_and_terms();
        $instagram_feed_settings->set_transient_name();
        $transient_name = $instagram_feed_settings->get_transient_name();
        $settings = $instagram_feed_settings->get_settings();
        $feed_type_and_terms = $instagram_feed_settings->get_feed_type_and_terms();

        $instagram_feed = new SB_Instagram_Feed($transient_name);

        $instagram_feed->set_cache($instagram_feed_settings->get_cache_time_in_seconds(), $settings);

        if ($settings['caching_type'] === 'background') {
                $instagram_feed->add_report('background caching used');
                if ($instagram_feed->regular_cache_exists()) {
                        $instagram_feed->add_report('setting posts from cache');
                        $instagram_feed->set_post_data_from_cache();
                }

                if ($instagram_feed->need_to_start_cron_job()) {
                        $instagram_feed->add_report('setting up feed for cron cache');
                        $to_cache = array(
                            'atts' => $atts,
                            'last_requested' => time(),
                        );

                        $instagram_feed->set_cron_cache($to_cache, $instagram_feed_settings->get_cache_time_in_seconds());

                        SB_Instagram_Cron_Updater::do_single_feed_cron_update($instagram_feed_settings, $to_cache, $atts, false);
                        $instagram_feed->set_cache($instagram_feed_settings->get_cache_time_in_seconds(), $settings);
                        $instagram_feed->set_post_data_from_cache();
                } elseif ($instagram_feed->should_update_last_requested()) {
                        $instagram_feed->add_report('updating last requested');
                        $to_cache = array(
                            'last_requested' => time(),
                        );

                        $instagram_feed->set_cron_cache($to_cache, $instagram_feed_settings->get_cache_time_in_seconds(), $settings['backup_cache_enabled']);
                }
        } elseif ($instagram_feed->regular_cache_exists()) {
                $instagram_feed->add_report('page load caching used and regular cache exists');
                $instagram_feed->set_post_data_from_cache();

                if ($instagram_feed->need_posts($settings['num']) && $instagram_feed->can_get_more_posts()) {
                        while ($instagram_feed->need_posts($settings['num']) && $instagram_feed->can_get_more_posts()) {
                                $instagram_feed->add_remote_posts($settings, $feed_type_and_terms, $instagram_feed_settings->get_connected_accounts_in_feed());
                        }
                        $instagram_feed->cache_feed_data($instagram_feed_settings->get_cache_time_in_seconds(), $settings['backup_cache_enabled']);
                }
        } else {
                $instagram_feed->add_report('no feed cache found');

                while ($instagram_feed->need_posts($settings['num']) && $instagram_feed->can_get_more_posts()) {
                        $instagram_feed->add_remote_posts($settings, $feed_type_and_terms, $instagram_feed_settings->get_connected_accounts_in_feed());
                }

                if (!$instagram_feed->should_use_backup()) {
                        $instagram_feed->cache_feed_data($instagram_feed_settings->get_cache_time_in_seconds(), $settings['backup_cache_enabled']);
                }
        }

        if ($instagram_feed->should_use_backup()) {
                $instagram_feed->add_report('trying to use backup');
                $instagram_feed->maybe_set_post_data_from_backup();
                $instagram_feed->maybe_set_header_data_from_backup();
        }

        // if need a header
        if ($instagram_feed->need_header($settings, $feed_type_and_terms)) {
                if ($instagram_feed->should_use_backup() && $settings['minnum'] > 0) {
                        $instagram_feed->add_report('trying to set header from backup');
                        $header_cache_success = $instagram_feed->maybe_set_header_data_from_backup();
                } elseif ($instagram_feed->regular_header_cache_exists()) {
                        // set_post_data_from_cache
                        $instagram_feed->add_report('page load caching used and regular header cache exists');
                        $instagram_feed->set_header_data_from_cache();
                } else {
                        $instagram_feed->add_report('no header cache exists');
                        $instagram_feed->set_remote_header_data($settings, $feed_type_and_terms, $instagram_feed_settings->get_connected_accounts_in_feed());
                        $instagram_feed->cache_header_data($instagram_feed_settings->get_cache_time_in_seconds(), $settings['backup_cache_enabled']);
                }
        } else {
                $instagram_feed->add_report('no header needed');
        }

        if ($settings['resizeprocess'] === 'page') {
                $instagram_feed->add_report('resizing images for post set');
                $post_data = $instagram_feed->get_post_data();
                $post_data = array_slice($post_data, 0, $settings['num']);

                $post_set = new SB_Instagram_Post_Set($post_data, $transient_name);

                $post_set->maybe_save_update_and_resize_images_for_posts();
        }

        if ($settings['disable_js_image_loading'] || $settings['imageres'] !== 'auto') {
                global $sb_instagram_posts_manager;
                $post_data = $instagram_feed->get_post_data();

                if (!$sb_instagram_posts_manager->image_resizing_disabled()) {
                        $image_ids = array();
                        foreach ($post_data as $post) {
                                $image_ids[] = SB_Instagram_Parse::get_post_id($post);
                        }
                        $resized_images = SB_Instagram_Feed::get_resized_images_source_set($image_ids, 0, $transient_name);

                        $instagram_feed->set_resized_images($resized_images);
                }
        }
        ob_start();
        ?>
        <div class="grid-cols-1 gap-2 md:grid-cols-2 md:gap-4 hidden lg:grid">
                <?php
                $count = 0;
                foreach ($post_data as $post) {
                        if ($count > 1) {
                                break;
                        }
                        $count++;
                        if ($post['media_type'] == 'IMAGE' || $post['media_type'] == 'CAROUSEL_ALBUM') {
                                $thumb = $post["media_url"];
                        } else {
                                $thumb = $post["thumbnail_url"];
                        }
                        ?>
                        <div class="wrap-image item-feature-insta max-[769px]:p-5">
                                <figure class="relative border-[3px] border-white ml-auto">
                                        <a href="<?php echo $post["permalink"] ?>" target="_blank" class="d-block">
                                                <img src="<?php echo $thumb ?>" alt="hero-insta-1" class="w-full">
                                                <div class="caption text-center absolute inset-0 opacity-0 hover:opacity-100">
                                                        <div class="overlay bg-secondary opacity-80 w-full h-full absolute z-0"></div>
                                                        <div class="max-[1279px]:text-sm md:text-base text-white relative p-5 z-10 w-full h-full flex justify-center items-center">
                                                                <div class="center-teaser">
                                                                        <div class="number w-full grid grid-cols-2 mb-4">
                                                                                <span class="flex justify-center items-center font-bold">
                                                                                        <!--<img src="<?php echo get_template_directory_uri() ?>/images/icons/heart-1.svg" alt="Heart">-->
                                                                                        <!--12k-->
                                                                                </span>
                                                                                <span class="flex justify-center items-center font-bold">
                                                                                        <!--<img src="<?php echo get_template_directory_uri() ?>/images/icons/comments-1.svg" alt="Comments">-->
                                                                                        <!--1k-->
                                                                                </span>
                                                                        </div>
                                                                        <?php
                                                                        if ($post["caption"]) {
//         if (mb_strlen( $string, 'utf-8' )>100) {
//                 $textString = wp_trim_words('@' . $post["username"] . ' ' . $post["caption"], 15);('@' . $post["username"] . ' ' . $post["caption"], 15);
//    $text = wp_trim_words('@' . $post["username"] . ' ' . $post["caption"], 15);
//}
//                                                                                
                                                                                ?>
                                                                                <?php echo wp_trim_words('@' . $post["username"] . ' ' . $post["caption"], 15); ?>
                                                                        <?php } ?>
                                                                </div>
                                                        </div>
                                                </div>
                                        </a>
                                </figure>
                        </div>
                <?php } ?>
        </div>
        <div id="controls-carousel" class="relative p-5 block lg:hidden" data-carousel="slide">
                <!-- Carousel wrapper -->
                <div class="relative overflow-hidden">
                        <?php
                        foreach ($post_data as $post) {
                                if ($post['media_type'] == 'IMAGE' || $post['media_type'] == 'CAROUSEL_ALBUM') {
                                        $thumb = $post["media_url"];
                                } else {
                                        $thumb = $post["thumbnail_url"];
                                }
                                ?>
                                <div class="transition duration-200 ease-in-out" data-carousel-item="active">
                                        <figure class="relative border-[3px] border-white">
                                                <a href="<?php echo $post["permalink"] ?>" target="_blank" class="d-block">
                                                        <img src="<?php echo $thumb ?>" alt="hero-insta-1" class="w-full">
                                                        <div class="caption text-center absolute inset-0 opacity-0 hover:opacity-100">
                                                                <div class="overlay bg-secondary opacity-80 w-full h-full absolute z-0"></div>
                                                                <div class="max-[1279px]:text-sm md:text-base text-white relative p-5 z-10 w-full h-full flex justify-center items-center">
                                                                        <div class="center-teaser">
                                                                                <div class="number w-full grid grid-cols-2 mb-4">
                                                                                        <span class="flex justify-center items-center font-bold">
                                                                                                <img src="<?php echo get_template_directory_uri() ?>/images/icons/heart-1.svg" alt="Heart">
                                                                                                <!--12k-->
                                                                                        </span>
                                                                                        <span class="flex justify-center items-center font-bold">
                                                                                                <img src="<?php echo get_template_directory_uri() ?>/images/icons/comments-1.svg" alt="Comments">
                                                                                                <!--1k-->
                                                                                        </span>
                                                                                </div>
                                                                                <?php if ($post["caption"]) { ?>
                                                                                        <?php echo wp_trim_words('@' . $post["username"] . ' ' . $post["caption"], 15); ?>
                                                                                <?php } ?> 
                                                                        </div>
                                                                </div>
                                                        </div>
                                                </a>
                                        </figure>
                                </div>
                        <?php } ?>

                </div>
                <!-- Slider controls -->
                <!-- <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full cursor-pointer group focus:outline-none" data-carousel-prev>
                        <span class="inline-flex items-center justify-center w-10 h-10 group-focus:outline-none">
                                <svg aria-hidden="true" class="w-6 h-6 text-yellow" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                </svg>
                                <span class="sr-only"><?php _e('Previous', 'yesand-theme') ?></span>
                        </span>
                </button>
                <button type="button" class="absolute top-0 right-5 z-30 flex items-center justify-center h-full cursor-pointer group focus:outline-none" data-carousel-next>
                        <span class="inline-flex items-center justify-center w-10 h-10 group-focus:outline-none">
                                <svg aria-hidden="true" class="w-6 h-6 text-yellow" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                                <span class="sr-only"><?php _e('Next', 'yesand-theme') ?></span>
                        </span>
                </button> -->
        </div>
        <?php
        $html = ob_get_contents();
        ob_get_clean();

        return $html;
//        return $instagram_feed->get_the_feed_html($settings, $atts, $instagram_feed_settings->get_feed_type_and_terms(), $instagram_feed_settings->get_connected_accounts_in_feed());
}
?>