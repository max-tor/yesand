<?php

if ( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_642bfe2b3d12a',
	'title' => 'Client Logos',
	'fields' => array(
		array(
			'key' => 'field_642bfe2c62ec2',
			'label' => 'Logos Gallery',
			'name' => 'logos',
			'aria-label' => '',
			'type' => 'gallery',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'array',
			'library' => 'all',
			'min' => '',
			'max' => '',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
			'insert' => 'append',
			'preview_size' => 'medium',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'block',
				'operator' => '==',
				'value' => 'acf/client-logos',
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