<?php
/*
Title: Job Listing Information
Post Type: job_listing
Context: normal
Priority: high
*/

$page_opts = array('' => '-- Select a Page --');
$pages     = get_pages(array(
  'hierarchical' => false,
));

foreach ($pages as $page) {
  $page_opts[$page->ID] = $page->post_title;
}

piklist('field', array(
  'type'        => 'date',
  'field'       => 'application_deadline',
  'label'       => 'Application Deadline',
  'description' => 'If your browser does not support date fields, enter the date in the following format: YYYY-MM-DD',
  'validate'    => array(
    array(
      'type' => 'date_format',
    )
  )
));

piklist('field', array(
  'type'  => 'text',
  'field' => 'location',
  'label' => 'Location',
));

piklist('field', array(
  'type'    => 'select',
  'field'   => 'application_page',
  'label'   => 'Application Page',
  'choices' => $page_opts,
));

piklist('field', array(
  'type'        => 'text',
  'field'       => 'application_url',
  'label'       => 'Application URL',
  'help'        => 'This will override the Application Page field above',
  'description' => 'Must include "http://" if URL is on a different site.',
));
?>
