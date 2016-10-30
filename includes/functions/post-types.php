<?php
/**
 * Integrity House
 * Custom Piklist Post Types
 */

function ih_register_cpt_gallery($post_types) {
  $post_types['gallery'] = array(
    'labels'        => piklist('post_type_labels', 'Gallery'),
    'title'         => 'Enter Gallery Title...',
    'public'        => true,
    'has_archive'   => true,
    'menu_icon'     => 'dashicons-format-gallery',
    'hide_meta_box' => array(
      'author',
    ),
    'rewrite'       => array(
      'slug' => 'gallery',
    ),
    'supports'      => array(
      'title',
      'editor',
      'thumbnail',
    ),
  );

  return $post_types;
}
add_filter('piklist_post_types', 'ih_register_cpt_gallery');

function ih_register_cpt_event($post_types) {
  $post_types['event'] = array(
    'labels'        => piklist('post_type_labels', 'Event'),
    'title'         => 'Enter Event Title...',
    'public'        => true,
    'has_archive'   => true,
    'menu_icon'     => 'dashicons-calendar-alt',
    'hide_meta_box' => array(
      'author',
    ),
    'rewrite'       => array(
      'slug' => 'events',
    ),
    'supports'      => array(
      'title',
      'editor',
      'thumbnail',
    ),
    'taxonomies'    => array(
      'post_tag',
    ),
  );

  return $post_types;
}
add_filter('piklist_post_types', 'ih_register_cpt_event');

function ih_register_cpt_job_listing($post_types) {
  $post_types['job_listing'] = array(
    'labels'        => piklist('post_type_labels', 'Job Listing'),
    'title'         => 'Enter Listing Title...',
    'public'        => true,
    'has_archive'   => true,
    'menu_icon'     => 'dashicons-businessman',
    'hide_meta_box' => array(
      'author',
    ),
    'rewrite'       => array(
      'slug' => 'job-listing',
    ),
    'supports'      => array(
      'title',
      'editor',
      'revisions',
      'thumbnail',
    ),
    'taxonomies'    => array(
      'job_listing_category',
    ),
  );

  return $post_types;
}
add_filter('piklist_post_types', 'ih_register_cpt_job_listing');

function ih_register_cpt_testimonial($post_types) {
  $post_types['testimonial'] = array(
    'labels'              => piklist('post_type_labels', 'Testimonial'),
    'title'               => 'Enter a Title...',
    'public'              => true,
    'has_archive'         => true,
    'menu_icon'           => 'dashicons-format-quote',
    'exclude_from_search' => true,
    'show_in_nav_menus'   => false,
    'supports'            => array(
      'title',
      'editor',
    ),
    'rewrite'             => array(
      'slug' => 'hope',
    ),
  );

  return $post_types;
}
add_filter('piklist_post_types', 'ih_register_cpt_testimonial');

?>
