<?php

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_6236a4cdaf9ac',
	'title' => 'Movies',
	'fields' => array(
		array(
			'key' => 'field_62388e4080167',
			'label' => 'Marcar como destaque?',
			'name' => 'destaque',
			'type' => 'radio',
			'instructions' => 'Se marcar como sim, exibirá na sessão da vitrine em destaque na home.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'sim' => 'Sim',
			),
			'allow_null' => 1,
			'other_choice' => 0,
			'default_value' => '',
			'layout' => 'horizontal',
			'return_format' => 'array',
			'save_other_choice' => 0,
		),
		array(
			'key' => 'field_6236a4e2c8d2f',
			'label' => 'Tempo de Duração',
			'name' => 'tempo_de_duracao',
			'type' => 'number',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '19',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => 'minutos',
			'min' => '',
			'max' => '',
			'step' => '',
		),
		array(
			'key' => 'field_6236a8c114994',
			'label' => 'Imagem de Capa',
			'name' => 'imagem_de_capa',
			'type' => 'image',
			'instructions' => 'Tamanho mínima da imagem: 1380px x 920px',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'array',
			'preview_size' => 'medium',
			'library' => 'all',
			'min_width' => 1380,
			'min_height' => 920,
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
		array(
			'key' => 'field_6236a706c8d33',
			'label' => 'Embed de Vídeo',
			'name' => 'embed_de_video',
			'type' => 'oembed',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'width' => '',
			'height' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'filmes',
			),
		),
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'documentarios',
			),
		),
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'series',
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