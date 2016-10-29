<?php
/**
 * Integrity House
 * Custom Taxonomy Registration
 */

function ih_register_taxonomy_job_listing_category($taxonomies) {
  $taxonomies[] = array(
    'post_type'         => 'job_listing',
    'name'              => 'job_listing_category',
    'show_admin_column' => true,
    'configuration'     => array(
      'hierarchical' => true,
      'labels'    => piklist('taxonomy_labels', 'Job Listing Category'),
      'show_ui'   => true,
      'query_var' => true,
      'rewrite'   => array(
        'slug' => 'job-listing-category',
      ),
    ),
  );

  return $taxonomies;
}
add_filter('piklist_taxonomies', 'ih_register_taxonomy_job_listing_category');

?>
