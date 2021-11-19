<?php
  
  acf_add_local_field_group(array(
    'key' => 'group_5dcdd01e7c3f6',
    'title' => 'Informações',
    'fields' => array(
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
        'type' => 'wysiwyg',
        'tabs' => 'visual',
        'toolbar' => 'basic',
        'media_upload' => 0,
      ),
      array(
        'key' => 'field_53355607959',
        'label' => 'Url do Vídeo',
        'name' => 'films-embed',
        'type' => 'text',
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
