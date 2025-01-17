<?php
			if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_64079757191f9',
	'title' => 'Yes& Heading Block',
	'fields' => array(
		array(
			'key' => 'field_6407975a0826b',
			'label' => 'Sub-heading text',
			'name' => 'sub-heading_text',
			'aria-label' => '',
			'type' => 'text',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'maxlength' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
		),
		array(
			'key' => 'field_6407c33fc31fd',
			'label' => 'Sub-heading text color',
			'name' => 'sub-heading_text_color_palette',
			'aria-label' => '',
			'type' => 'color_picker',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '#FFFFFF',
			'enable_opacity' => 0,
			'return_format' => 'string',
		),
		array(
			'key' => 'field_6407c371c31fe',
			'label' => 'Sub-heading text background color',
			'name' => 'sub-heading_text_background_color',
			'aria-label' => '',
			'type' => 'select',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'#c10330' => 'Red',
				'#000000' => 'Black',
				'#ffbf00' => 'Yellow',
			),
			'default_value' => '#c10330',
			'return_format' => 'value',
			'multiple' => 0,
			'allow_null' => 0,
			'ui' => 0,
			'ajax' => 0,
			'placeholder' => '',
		),
		array(
			'key' => 'field_6407c50d9233d',
			'label' => 'Heading text',
			'name' => 'heading_text',
			'aria-label' => '',
			'type' => 'text',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'maxlength' => 50,
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
		),
		array(
			'key' => 'field_6407c51e9233e',
			'label' => 'Heading text color',
			'name' => 'heading_text_color',
			'aria-label' => '',
			'type' => 'color_picker',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '#000000',
			'enable_opacity' => 0,
			'return_format' => 'string',
		),
//		array(
//			'key' => 'field_6407c56c2409a',
//			'label' => 'Yes& heading alignment options',
//			'name' => 'alignment_options',
//			'aria-label' => '',
//			'type' => 'select',
//			'instructions' => '',
//			'required' => 1,
//			'conditional_logic' => 0,
//			'wrapper' => array(
//				'width' => '',
//				'class' => '',
//				'id' => '',
//			),
//			'choices' => array(
//				'left' => 'Left',
//				'right' => 'Right',
//				'center' => 'Center',
//			),
//			'default_value' => 'left',
//			'return_format' => 'value',
//			'multiple' => 0,
//			'allow_null' => 0,
//			'ui' => 0,
//			'ajax' => 0,
//			'placeholder' => '',
//		),
		array(
			'key' => 'field_6407c62efc9e5',
			'label' => 'Decorative circles',
			'name' => 'include_decorative_circles',
			'aria-label' => '',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => 'Include',
			'default_value' => 0,
			'ui' => 0,
			'ui_on_text' => '',
			'ui_off_text' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'block',
				'operator' => '==',
				'value' => 'acf/heading-block',
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