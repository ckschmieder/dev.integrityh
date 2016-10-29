<?php
/*
Title: Event Information
Post Type: event
Context: normal
Priority: high
*/

piklist('field', array(
  'type'        => 'text',
  'field'       => 'start_date',
  'label'       => 'Start Date',
  'description' => 'ex. ' . strftime('%Y-%m-%d'),
));

piklist('field', array(
  'type'        => 'text',
  'field'       => 'start_time',
  'label'       => 'Start Time',
  'description' => 'in 24 hour time (ex. 15:00 for 3pm)',
));

piklist('field', array(
  'type'  => 'text',
  'field' => 'location',
  'label' => 'Location',
));

?>
