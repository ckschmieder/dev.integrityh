<?php
/*
Title: Gallery Photos
Post Type: gallery
Context: normal
Priority: high
*/

piklist('field', array(
  'type'     => 'group',
  'field'    => 'gallery_photos',
  'label'    => 'Photos',
  'add_more' => true,
  'fields'   => array(
    array(
      'type'       => 'text',
      'field'      => 'title',
      'label'      => 'Title',
      'attributes' => array(
        'class' => 'text',
      ),
      'sanitize'   => array(
        array(
          'type' => 'text_field',
        ),
      ),
    ),
    array(
      'type'       => 'textarea',
      'field'      => 'caption',
      'label'      => 'Caption',
      'attributes' => array(
        'rows' => '6',
        'cols' => '40',
      ),
      'sanitize'   => array(
        array(
          'type' => 'wp_kses',
        ),
      ),
    ),
    array(
      'type'       => 'file',
      'field'      => 'image',
      'label'      => 'Photo',
      'attributes' => array(
        'class' => 'text',
      ),
      'validate'   => array(
        array(
          'type'    => 'limit',
          'options' => array(
            'max' => 1,
          ),
        ),
      ),
    ),
  ),
));
?>
