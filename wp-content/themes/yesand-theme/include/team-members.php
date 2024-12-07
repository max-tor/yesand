<?php
/* Team Members Functionality. */

function cptui_register_my_taxes_job_categories() {

	/**
	 * Taxonomy: Job categories.
	 */

	$labels = [
		"name" => esc_html__( "Job Categories", "custom-post-type-ui" ),
		"singular_name" => esc_html__( "Job Category", "custom-post-type-ui" ),
	];


	$args = [
		"label" => esc_html__( "Job Categories", "custom-post-type-ui" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'job-category', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "job-category",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => false,
		"sort" => false,
		"show_in_graphql" => false,
        "meta_box_cb" => "post_categories_meta_box",
	];
	register_taxonomy( "job-category", [ "team-member" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes_job_categories' );

function cptui_register_my_cpts_team_member() {

	/**
	 * Post Type: Team Members.
	 */

	$labels = [
		"name" => esc_html__( "Team Members", "custom-post-type-ui" ),
		"singular_name" => esc_html__( "Team Member", "custom-post-type-ui" ),
        "add_new_item" => esc_html__( "Add New Team Member", "custom-post-type-ui" ),
	];

	$args = [
		"label" => esc_html__( "Team Members", "custom-post-type-ui" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"rest_namespace" => "wp/v2",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"can_export" => false,
		"rewrite" => [ "slug" => "team-member", "with_front" => true ],
		"query_var" => "team-member",
		"menu_position" => 7,
		"supports" => [ "title", "custom-fields" ],
		"show_in_graphql" => false,
        'menu_icon' => 'dashicons-businessman',
        "menu_order" => true,

	];

	register_post_type( "team-member", $args );
}

add_action( 'init', 'cptui_register_my_cpts_team_member' );

    if( function_exists('acf_add_local_field_group') ):

        acf_add_local_field_group(array(
            'key' => 'group_123',
            'title' => 'Team Member Fields',
            'fields' => array(
                array(
                    'key' => 'field_photo',
                    'label' => 'Photo',
                    'name' => 'photo',
                    'type' => 'image',
                    'instructions' => 'Photo should be square cropped',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                ),
                array(
                    'key' => 'field_position',
                    'label' => 'Position',
                    'name' => 'position',
                    'type' => 'text',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                ),
                array(
                    'key' => 'field_bio',
                    'label' => 'Bio',
                    'name' => 'bio',
                    'type' => 'wysiwyg',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                ),
                array(
                    'key' => 'field_linkedin',
                    'label' => 'LinkedIn',
                    'name' => 'linkedin',
                    'type' => 'url',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                ),
                array(
                    'key' => 'field_priority',
                    'label' => 'Priority',
                    'name' => 'priority',
                    'type' => 'number',
                    'instructions' => 'Optional, Numeric',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'min' => 1, // Minimum value
                    'max' => '', // Maximum value
                    'step' => 1, // Increment/decrement step
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'team-member',
                    ),
                ),
            ),
            'menu_order' => 0,
            'position' => 'normal',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => '',
            'active' => true,
            'description' => '',
        ));
endif;




// Add custom columns to Team Members list table
add_filter( 'manage_team-member_posts_columns', 'custom_team_member_columns' );
function custom_team_member_columns( $columns ) {
    $new_columns = array(
        'order' => __( ' ', 'team_members_order' ),
    );
    $columns['title'] = __( 'Name', 'team_members_title' );
    $columns['position'] = __( 'Position', 'team_members_position' );
    $columns['priority'] = 'Priority';
    //$columns['team-member-type'] = __( 'Team Member Type', 'team_members_type' );
    unset( $columns['date'] ); // remove the 'Date' column
    return array_merge( $new_columns, $columns );
}

// Output data for custom columns in Team Members list table
add_action( 'manage_team-member_posts_custom_column', 'custom_team_member_column_data', 10, 2 );
function custom_team_member_column_data( $column, $post_id ) {
    switch ( $column ) {
        case 'position':
            $position = get_field( 'position', $post_id );
            if ( ! empty( $position ) ) {
                echo esc_html( $position );
            } else {
                echo '-';
            }
            break;
        case 'priority':
            $priority = get_field( 'priority', $post_id );
            if ( ! empty( $priority ) ) {
                echo esc_html( $priority );
            } else {
                echo '-';
            }
            break;
    }
}


add_filter( 'enter_title_here', 'rename_team_member_title_field' );
function rename_team_member_title_field( $input ) {
    global $post_type;
    if ( is_admin() && 'team-member' === $post_type ) {
        return 'Name';
    }
    return $input;
}


// Make weight column sortable
add_filter( 'manage_edit-team-member_sortable_columns', 'make_priority_column_sortable' );
function make_priority_column_sortable( $columns ) {
    $columns['priority'] = 'priority';
    return $columns;
}

// Modify the query to sort by weight column
add_action( 'pre_get_posts', 'sort_by_priority_column' );
function sort_by_priority_column( $query ) {
    if ( ! is_admin() ) {
        return;
    }

    $orderby = $query->get( 'orderby' );
    if ( is_admin() && $query->get( 'post_type' ) == 'team-member' && !$query->get( 'orderby' ) ) {
        $query->set( 'orderby', 'meta_value_num' );
        $query->set( 'meta_key', 'priority' );
        $query->set( 'order', 'DESC' );
    }

    if ( 'priority' == $orderby ) {
        // Build the custom order by clause
        $order_by_clause = "CASE WHEN meta.priority = '' THEN 1 ELSE 0 END, CAST(meta.priority AS UNSIGNED) DESC, {$wpdb->posts}.post_title DESC";
        
        // Join the post meta table to retrieve the 'priority' custom field
        $orderby = " {$wpdb->postmeta}.meta_value DESC, {$order_by_clause}";
        $query->set( 'meta_key', 'priority' );
        $query->set( 'orderby', 'meta_value' );
    }
}



/* Add CSS to style the new column: */

function my_admin_head_style() {
    if ( 'team-member' === get_current_screen()->post_type ) {
        ?>
        <style>
            #the-list .column-order {
                width: 50px;
                text-align: left;
            }
            #the-list .dashicons-move {
                cursor: move;
            }
            .wp-list-table .column-order {
                width: 16px;
            }
        </style>
        <?php
    }
}
add_action( 'admin_head', 'my_admin_head_style' );

// Redirect team member to team page
function redirect_team_member_to_team() {
    if (is_singular('team-member')) {
        wp_redirect('/about-us/our-team/');
        exit();
    }
}
add_action('template_redirect', 'redirect_team_member_to_team');
