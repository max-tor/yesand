<?php 			
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_642ae5d60ee9c',
	'title' => 'Team Block',
	'fields' => array(
		array(
			'key' => 'field_642ae5d7693fa',
			'label' => '',
			'name' => 'manual_or_default',
			'aria-label' => '',
			'type' => 'radio',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'default' => 'Default List',
				'manual' => 'Manual Curated List',
			),
			'default_value' => 'default',
			'return_format' => 'value',
			'allow_null' => 0,
			'other_choice' => 0,
			'layout' => 'vertical',
			'save_other_choice' => 0,
		),
		array(
			'key' => 'field_642ae6a8693fb',
			'label' => 'Selected Team Members',
			'name' => 'selected_team_members',
			'aria-label' => '',
			'type' => 'relationship',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_642ae5d7693fa',
						'operator' => '==',
						'value' => 'manual',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'post_type' => array(
				0 => 'team-member',
			),
			'taxonomy' => '',
			'filters' => array(
				0 => 'search',
			),
			'return_format' => 'id',
			'min' => '',
			'max' => '',
			'elements' => '',
		),
		array(
			'key' => 'field_642ae6eb693fc',
			'label' => 'Default Order',
			'name' => '',
			'aria-label' => '',
			'type' => 'message',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_642ae5d7693fa',
						'operator' => '==',
						'value' => 'default',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => 'All team Members in alphabetical order unless custom weight field has been set to override default ordering',
			'new_lines' => 'wpautop',
			'esc_html' => 0,
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'block',
				'operator' => '==',
				'value' => 'acf/team-block',
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
	'show_in_rest' => 0,
));

endif;		
?>