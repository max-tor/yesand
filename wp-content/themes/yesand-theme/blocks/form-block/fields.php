<?php

if (function_exists('acf_add_local_field_group')):

        acf_add_local_field_group(array(
            'key' => 'group_64121b734307f',
            'title' => 'Yes& Form block',
            'fields' => array(
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'block',
                        'operator' => '==',
                        'value' => 'acf/yes-form-block',
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