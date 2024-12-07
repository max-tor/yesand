<?php
/**
 * ACF blocks.
 */
require_once 'library/acf-blocks.php';
foreach (glob(get_template_directory() . "/acf/*.php") as $function) {
		$function = basename($function);
		require get_template_directory() . '/acf/' . $function;
}

/**
 * Custom Post Types.
 */
require_once( get_template_directory() . '/include/case-studies.php' );
require_once( get_template_directory() . '/include/team-members.php' );
require_once( get_template_directory() . '/include/careers.php' );
require_once( get_template_directory() . '/include/services.php' );

/**
 * Footer instagram feed (shortcode).
 */
if (class_exists('SB_Instagram_Feed')) {
        require_once( get_template_directory() . '/include/footer-instagram-feed.php' );
}
/**
 * Theme setup.
 */
function yesand_theme_setup() {
	add_theme_support( 'title-tag' );

	register_nav_menus(
		array(
			'primary' => __( 'Primary Menu', 'tailpress' ),
			'footer' => __( 'Footer Menu', 'tailpress' ),
		)
	);

	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);

	add_theme_support( 'custom-logo' );
	add_theme_support( 'post-thumbnails' );

	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );

	add_theme_support( 'editor-styles' );
	add_editor_style( 'css/editor-style.css' );
	add_editor_style( 'css/app.css' );
        
}

add_action( 'after_setup_theme', 'yesand_theme_setup' );

/**
 * Enqueue theme assets.
 */
function yesand_theme_enqueue_scripts() {
	$theme = wp_get_theme();


	wp_enqueue_style( 'tailwind', yesand_theme_asset( 'css/tailwind.css' ), array(), $theme->get( 'Version' ) );
	wp_enqueue_style( 'tailpress', yesand_theme_asset( 'css/app.css' ), array(), $theme->get( 'Version' ) );

	wp_enqueue_style( 'capitolium-webfont', yesand_theme_asset( 'fonts/Capitolium/capitolium-webfont.css' ), array(), $theme->get( 'Version' ) );
	wp_enqueue_style( 'gilroy-webfont', yesand_theme_asset( 'fonts/Gilroy/gilroy-webfont.css' ), array(), $theme->get( 'Version' ) );
	wp_enqueue_style( 'fontawesome', yesand_theme_asset( 'fonts/FontAwesome-4.7.0/font-awesome.css' ), array(), $theme->get( 'Version' ) );

	wp_enqueue_script( 'tailpress', yesand_theme_asset( 'js/app.js' ), array(), $theme->get( 'Version' ) );

	// wp_enqueue_style( 'flowbitecss', 'https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.css', array(), $theme->get( 'Version' ) );
	// wp_enqueue_script( 'flowbitejs', 'https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js', array('jquery'), '1.6.3', true );
}

add_action( 'wp_enqueue_scripts', 'yesand_theme_enqueue_scripts' );

/**
 * Get asset path.
 *
 * @param string  $path Path to asset.
 *
 * @return string
 */
function yesand_theme_asset( $path ) {
	if ( wp_get_environment_type() === 'production' ) {
		return get_stylesheet_directory_uri() . '/' . $path;
	}

	return add_query_arg( 'time', time(),  get_stylesheet_directory_uri() . '/' . $path );
}

/**
 * Adds option 'li_class' to 'wp_nav_menu'.
 *
 * @param string  $classes String of classes.
 * @param mixed   $item The curren item.
 * @param WP_Term $args Holds the nav menu arguments.
 *
 * @return array
 */
function yesand_theme_nav_menu_add_li_class( $classes, $item, $args, $depth ) {
	if ( isset( $args->li_class ) ) {
		$classes[] = $args->li_class;
	}

	if ( isset( $args->{"li_class_$depth"} ) ) {
		$classes[] = $args->{"li_class_$depth"};
	}

	return $classes;
}

add_filter( 'nav_menu_css_class', 'yesand_theme_nav_menu_add_li_class', 10, 4 );

/**
 * Adds option 'submenu_class' to 'wp_nav_menu'.
 *
 * @param string  $classes String of classes.
 * @param mixed   $item The curren item.
 * @param WP_Term $args Holds the nav menu arguments.
 *
 * @return array
 */
function yesand_theme_nav_menu_add_submenu_class( $classes, $args, $depth ) {
	if ( isset( $args->submenu_class ) ) {
		$classes[] = $args->submenu_class;
	}

	if ( isset( $args->{"submenu_class_$depth"} ) ) {
		$classes[] = $args->{"submenu_class_$depth"};
	}

	return $classes;
}

add_filter( 'nav_menu_submenu_css_class', 'yesand_theme_nav_menu_add_submenu_class', 10, 3 );


/**
 * Remove default post type.
 */
function remove_default_post_type($args, $postType) {
    if ($postType === 'post') {
        $args['public']                = false;
        $args['show_ui']               = false;
        $args['show_in_menu']          = false;
        $args['show_in_admin_bar']     = false;
        $args['show_in_nav_menus']     = false;
        $args['can_export']            = false;
        $args['has_archive']           = false;
        $args['exclude_from_search']   = true;
        $args['publicly_queryable']    = false;
        $args['show_in_rest']          = false;
    }

    return $args;
}
add_filter('register_post_type_args', 'remove_default_post_type', 0, 2);

/**
 * Remove comments.
 */
add_action('admin_init', function () {
    // Redirect any user trying to access comments page
    global $pagenow;
    if ($pagenow === 'edit-comments.php') {
        wp_safe_redirect(admin_url());
        exit;
    }
    // Remove comments metabox from dashboard
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
    // Disable support for comments and trackbacks in post types
    foreach (get_post_types() as $post_type) {
        if (post_type_supports($post_type, 'comments')) {
            remove_post_type_support($post_type, 'comments');
            remove_post_type_support($post_type, 'trackbacks');
        }
    }
});

// Close comments on the front-end
add_filter('comments_open', '__return_false', 20, 2);
add_filter('pings_open', '__return_false', 20, 2);
// Hide existing comments
add_filter('comments_array', '__return_empty_array', 10, 2);
// Remove comments page in menu
add_action('admin_menu', function () {
    remove_menu_page('edit-comments.php');
});
// Remove comments links from admin bar
add_action('init', function () {
    if (is_admin_bar_showing()) {
        remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
    }
});
// Custom button for gravity form
add_filter( 'gform_submit_button', 'form_submit_button', 10, 2 );
function form_submit_button( $button, $form ) {
  return "<div class='btn-group-1'><span class='btn-group-1__pre'>review &</span><button class='button gform_button btn-group-1__flex' id='gform_submit_button_{$form['id']}'><span class='btn-group-1__a'>Submit</span><span class='btn-group-1__arrow-right'></span>
	<span class='btn-group-1__circles'><img class='btn-group-1__circles-img' src='/wp-content/themes/yesand-theme/images/circles-2.svg' alt='decorative_circles'></span></button></div></button>";
}

// Replaced WP logo with company Logo on login page
function change_login_logo() {
    $logo_url = '/wp-content/themes/yesand-theme/images/logo/logo-white-red-horizontal.svg';
    echo '<style type="text/css">
            #login h1 a, .login h1 a {
                background-image: url(' . $logo_url . ');
                height: 65px;
                width: 320px;
                background-size: 320px 65px;
                background-repeat: no-repeat;
                padding-bottom: 30px;
            }
        </style>';
}
add_action('login_head', 'change_login_logo');

/* Theme General Settings */
if( function_exists('acf_add_options_page') ) {
		acf_add_options_page(array(
				'page_title'    => 'Social Links',
				'menu_title'    => 'Theme Settings',
				'menu_slug'     => 'theme-general-settings',
				'capability'    => 'edit_posts',
				'position' => 4,
				'redirect'      => false
		));
		acf_add_options_sub_page(array(
				'page_title'    => 'Header',
				'menu_title'    => 'Header',
				'parent_slug'   => 'theme-general-settings',
		));
		acf_add_options_sub_page(array(
				'page_title'    => 'Footer',
				'menu_title'    => 'Footer',
				'parent_slug'   => 'theme-general-settings',
		));
		acf_add_options_sub_page(array(
				'page_title'    => '404 page',
				'menu_title'    => '404 page',
				'parent_slug'   => 'theme-general-settings',
		));
}
/* END Theme General Settings */


// register ACF fields
add_action( 'init', 'register_acf_blocks' );
function register_acf_blocks() {
	$blocks = scandir( get_template_directory() . '/blocks/' );
		$blocks = array_values( array_diff( $blocks, array( '..', '.', '.DS_Store', '_base-block' ) ));
		//var_dump($blocks);
		foreach( $blocks as $block ) {
				if ( file_exists( get_template_directory() . '/blocks/' . $block . '/block.json' ) ) {
						register_block_type( get_template_directory() . '/blocks/' . $block . '/block.json' );
						//wp_register_style( 'block-' . $block, get_template_directory_uri() . '/template-parts/' . $block . '/style.css', null, $theme->get( 'Version' ) );
				}
		};
};

//configs for Text Block (ACF)
include_once( get_template_directory() . '/blocks/form-with-heading/fields.php' );
include_once( get_template_directory() . '/blocks/text-block/fields.php' );
include_once( get_template_directory() . '/blocks/image-text/fields.php' );
include_once( get_template_directory() . '/blocks/heading-block/fields.php' );
include_once( get_template_directory() . '/blocks/homepage-slider/fields.php' );
include_once( get_template_directory() . '/blocks/statistics-block/fields.php' );
include_once( get_template_directory() . '/blocks/header-with-media/fields.php' );
include_once( get_template_directory() . '/blocks/media-component/fields.php' );
include_once( get_template_directory() . '/blocks/button/fields.php' );
include_once( get_template_directory() . '/blocks/footer-block/fields.php' );
include_once( get_template_directory() . '/blocks/metaverse-block/fields.php' );
include_once( get_template_directory() . '/blocks/form-block/fields.php' );
include_once( get_template_directory() . '/blocks/homepage-pre-slider-block/fields.php' );
include_once( get_template_directory() . '/blocks/featured-header-with-media/fields.php' );
include_once( get_template_directory() . '/blocks/header-with-background/fields.php' );
include_once( get_template_directory() . '/blocks/header-default/fields.php' );
include_once( get_template_directory() . '/blocks/media-feed/fields.php' );
include_once( get_template_directory() . '/blocks/cards-3-up/fields.php' );
include_once( get_template_directory() . '/blocks/images-3-up/fields.php' );
include_once( get_template_directory() . '/blocks/team-block/fields.php' );
include_once( get_template_directory() . '/blocks/accordion-block/fields.php' );
include_once( get_template_directory() . '/blocks/client-logos/fields.php' );
include_once( get_template_directory() . '/blocks/fishbone/fields.php' );

//disable gutenberg blocks
function yesand_allowed_block_types( $allowed_block_types, $post ) {
    return array(
            'acf/yes-form-with-heading-block',
            'acf/text-block',
            'acf/image-text-block',
            'acf/heading-block',
            'acf/yes-homepage-slider',
            'acf/statistics-block',
            'acf/header-with-media',
            'acf/media-component',
            'acf/yes-button',
            'acf/yes-footer-block',
            'acf/yes-metaverse-block',
            'acf/yes-form-block',
            'acf/yes-homepage-pre-slider-block',
            'acf/yes-accordion-block',
        );
}
//add_filter( 'allowed_block_types_all', 'yesand_allowed_block_types', 25, 2 );

add_filter('script_loader_tag', 'defer_theme_scripts', 10, 2);

function defer_theme_scripts($tag, $handle) {
        $deferScripts = ['tailpress']; //if app.js is only one rewrite to simplier one
        foreach ($deferScripts as $key => $scriptToDefer) {
                if ($scriptToDefer !== $handle) {
                        return $tag;
                }
        }
        return str_replace(' src', ' defer src', $tag);
}


function yesand_breadcrumbs($relative_permalink) {
    $breadcrumbs = '<li class="breadcrumb-1__li"><a class="breadcrumb-1__item" href="' . home_url() . '">Yes&amp;</a></li>';
    $path_segments = explode( '/', trim( $relative_permalink, '/' ) );
    $breadcrumbs_path = '';

    if ( is_singular( 'services' ) ) {
    	 $breadcrumbs .= '<li class="breadcrumb-1__li"><a class="breadcrumb-1__item" href="/expertise">Expertise</a></li><li class="breadcrumb-1__li"><a class="breadcrumb-1__item" href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
    } else {
	    foreach ( $path_segments as $path_segment ) {
	        $breadcrumbs_path .= '/' . $path_segment; 
	        $page = get_page_by_path( $breadcrumbs_path ); 
	        if ( $page ) {
	            $breadcrumbs .= '<li class="breadcrumb-1__li"><a class="breadcrumb-1__item" href="' . get_permalink( $page->ID ) . '">' . get_the_title( $page->ID ) . '</a></li>'; // add the page title as a breadcrumb link
	        } elseif ( is_singular( 'career' ) ) {
	        $breadcrumbs .= '<li class="breadcrumb-1__li"><a class="breadcrumb-1__item" href="' . get_permalink() . '">' . get_the_title() . '</a></li>'; 	            
	        } elseif ( is_singular( 'services' ) ) {

	        $breadcrumbs .= '<li class="breadcrumb-1__li"><a class="breadcrumb-1__item" href="' . get_permalink( $page->ID ) . '">' . get_the_title( $page->ID ) . '</a></li>';	            
	        }
	    }
	}

    return $breadcrumbs;
}


