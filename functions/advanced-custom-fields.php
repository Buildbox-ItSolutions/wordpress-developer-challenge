<?php
  
  acf_add_local_field_group(array(
    'key' => 'group_5dcdd01e7c3f6',
    'title' => 'Informações',
    'fields' => array(
      array(
        'key' => 'field_53355607954',
        'label' => 'Imagem de Capa',
        'name' => 'films-thumbnail',
        'type' => 'image',
        'return_format' => 'url',
      ),
      array(
        'key' => 'field_53355607955',
        'label' => 'Imagem de Vitrine',
        'name' => 'films-showcase',
        'type' => 'image',
        'return_format' => 'url',
      ),
      array(
        'key' => 'field_53355607956',
        'label' => 'Descrição',
        'name' => 'films-content',
        'type' => 'wysiwyg',
      ),
      array(
        'key' => 'field_53355607957',
        'label' => 'Tempo de Duração',
        'name' => 'films-time',
        'type' => 'text',
      ),
      array(
        'key' => 'field_53355607958',
        'label' => 'Sinopse',
        'name' => 'films-description',
        'type' => 'textarea',
      ),
      array(
        'key' => 'field_53355607959',
        'label' => 'Embed de Vídeo',
        'name' => 'films-embed',
        'type' => 'textarea',
      ),
    ),
    'location' => array(
      array(
        array(
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'films',
        ),
      ),
    ),
    'position' => 'normal',
    'style' => 'default',
  ));
