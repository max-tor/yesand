<?php

add_action('acf/init', 'yeaand_acf_init');
function yeaand_acf_init() {

    // check function exists
    if( function_exists('acf_register_block') ) {
        // register a slideshow block
        acf_register_block(array(
            'name'              => 'main_slideshow',
            'title'             => __('Main slideshow'),
            'description'       => __('A custom slideshow block.'),
            'render_callback'   => 'yesand_block_render_callback',
            'category'          => 'formatting',
            'icon'              => 'images-alt2',
            'keywords'          => array( 'slideshow', 'home' ),
        ));
    }
}

function yesand_block_render_callback( $block ) {
    $slug = str_replace('acf/', '', $block['name']);
    if( file_exists( get_theme_file_path("/template-parts/block/content-{$slug}.php") ) ) {
        include( get_theme_file_path("/template-parts/block/content-{$slug}.php") );
    }
}