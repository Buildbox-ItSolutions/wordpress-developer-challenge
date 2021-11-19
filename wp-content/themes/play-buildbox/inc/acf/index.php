<?php
			if( function_exists('acf_add_local_field_group') ):

                acf_add_local_field_group(array(
                    'key' => 'group_6194627c9738f',
                    'title' => 'Infos Video',
                    'fields' => array(
                        array(
                            'key' => 'field_6194628261ef5',
                            'label' => 'Descrição',
                            'name' => 'descricao',
                            'type' => 'wysiwyg',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '50',
                                'class' => '',
                                'id' => '',
                            ),
                            'default_value' => '',
                            'tabs' => 'all',
                            'toolbar' => 'full',
                            'media_upload' => 0,
                            'delay' => 1,
                        ),
                        array(
                            'key' => 'field_619462be61ef7',
                            'label' => 'Sinopse',
                            'name' => 'sinopse',
                            'type' => 'wysiwyg',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '50',
                                'class' => '',
                                'id' => '',
                            ),
                            'default_value' => '',
                            'tabs' => 'all',
                            'toolbar' => 'full',
                            'media_upload' => 0,
                            'delay' => 1,
                        ),
                        array(
                            'key' => 'field_6194629061ef6',
                            'label' => 'Tempo de Duração',
                            'name' => 'tempo_de_duracao',
                            'type' => 'text',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '20',
                                'class' => '',
                                'id' => '',
                            ),
                            'default_value' => '',
                            'placeholder' => 'Definir em minutos ex: 180m',
                            'prepend' => '',
                            'append' => '',
                            'maxlength' => '',
                        ),
                        array(
                            'key' => 'field_619462f961efa',
                            'label' => 'ID youtube',
                            'name' => 'link_youtube',
                            'type' => 'text',
                            'instructions' => 'ID do Youtube
                Apenas final após o sinal de "igual"',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '40',
                                'class' => '',
                                'id' => '',
                            ),
                            'default_value' => '',
                            'placeholder' => '7X8II6J-6mU',
                            'prepend' => '',
                            'append' => '',
                            'maxlength' => '',
                        ),
                    ),
                    'location' => array(
                        array(
                            array(
                                'param' => 'post_type',
                                'operator' => '==',
                                'value' => 'video',
                            ),
                        ),
                    ),
                    'menu_order' => 0,
                    'position' => 'normal',
                    'style' => 'default',
                    'label_placement' => 'top',
                    'instruction_placement' => 'label',
                    'hide_on_screen' => array(
                        0 => 'the_content',
                        1 => 'discussion',
                        2 => 'comments',
                        3 => 'revisions',
                        4 => 'slug',
                        5 => 'author',
                        6 => 'format',
                        7 => 'page_attributes',
                        8 => 'tags',
                        9 => 'send-trackbacks',
                    ),
                    'active' => true,
                    'description' => '',
                    'show_in_rest' => 0,
                ));
                
                endif;		
?>