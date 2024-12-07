<?php
use Leadin\client\HubSpot_Base_Api_Client;

if( function_exists('acf_add_local_field_group') ):
    acf_add_local_field_group(array(
        'key' => 'group_63eab9df8b16a',
        'title' => 'Footer',
        'fields' => array(
            array(
                'key' => 'field_63eabb82257d3',
                'label' => 'Active sign up block?',
                'name' => 'active_signup',
                'type' => 'true_false',
                'instructions' => 'If enabled, sign-up form will appear on every page (except the Homepage template)',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'message' => '',
                'default_value' => 1,
                'ui' => 0,
                'ui_on_text' => '',
                'ui_off_text' => '',
            ),
            array(
                'key' => 'field_63eabc2418c83',
                'label' => 'Sign up',
                'name' => 'Signup',
                'type' => 'group',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_63eabb82257d3',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'layout' => 'block',
                'sub_fields' => array(
                    null,
                    array(
                        'key' => 'field_63eabc3e18c99',
                        'label' => 'Hubspot Form',
                        'name' => 'hubspot',
                        'id' => $prefix.'select',
                        'type' => 'select',
                        'choices' => call_user_func(function() {
                            try {
                                $endpoint = '/forms/v2/forms';
                                $client        = new HubSpot_Base_Api_Client();
                                $request = $client->authenticated_request($endpoint, 'GET');
                                $forms = json_decode($request['body']);
    
                                $forms_list = array_merge(...array_map(function($item) {
                                    return ["$item->portalId:$item->guid" => $item->name];
                                }, $forms));
    
                                return $forms_list;
                            } catch(Exception $E) {
                                return [
                                    0 => 'You must be logged in to HubSpot to select a form'
                                ];
                            }
                        })
                    ),
                    array(
                        'key' => 'field_63eabc3e18c84',
                        'label' => 'Title',
                        'name' => 'title',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => 'Sign up for',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_63eabc4718c85',
                        'label' => 'Subtitle',
                        'name' => 'subtitle',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => 'THE AMPERSAND',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_63ec073ec7023',
                        'label' => 'Message',
                        'name' => 'message',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => 'The Ampersand is a monthly newsletter published by Yes&, designed to bring you our search for the “and” in everything.',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                    ),
                ),
            ),
            array(
                'key' => 'field_63ef98f34d019',
                'label' => 'About us (summary)',
                'name' => 'about_summary',
                'type' => 'text',
                'instructions' => '',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => 'Yes& is an independent, fully integrated brand marketing agency founded on a simple belief: Positive partnerships create remarkable success.',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_63eab9f97d21d',
                'label' => 'Information',
                'name' => 'information',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => 'Yes& is a fully integrated brand marketing agency.',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_63eaba1c7d21e',
                'label' => 'Address',
                'name' => 'address',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '1700 Diagonal Road, Ste. 700, Alexandria, VA 22314 • (703) 823-1600',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_63efc6c828f2c',
                'label' => 'Enable widget instagram',
                'name' => 'active_insta',
                'type' => 'true_false',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'message' => '',
                'default_value' => 0,
                'ui' => 0,
                'ui_on_text' => '',
                'ui_off_text' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'acf-options-footer',
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