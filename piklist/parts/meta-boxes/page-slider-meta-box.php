<?php
/*
Title: Slider
Post Type: page
Context: normal
Priority: high
*/

piklist('field', array(
  'type'        => 'group',
  'field'       => 'slider',
  'label'       => 'Slider',
  'description' => 'Drag and drop to reorder',
  'add_more'    => true,
  'fields'      => array(
    array(
      'type' => 'text',
      'field' => 'title',
      'label' => 'Title',
    ),
    array(
      'type'  => 'text',
      'field' => 'link_url',
      'label' => 'Link URL',
    ),
    array(
      'type'  => 'textarea',
      'field' => 'caption',
      'label' => 'Caption',
    ),
    array(
      'type'  => 'file',
      'field' => 'photo',
      'label' => 'Photo',
    ),
  ),
));
?>
