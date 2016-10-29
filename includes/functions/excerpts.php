<?php
/**
 * Integrity House
 * Custom Excerpt Length / More Links
 */

function ih_custom_excerpt_length($length) {
  return 24;
}
add_filter('excerpt_length', 'ih_custom_excerpt_length', 999);

function ih_custom_excerpt_more($more) {
  //global $post;
  //return '&hellip;<br><a class="more-link" href="' . get_permalink($post->ID) . '">Read More &raquo;</a>';
  return '&hellip;';
}
add_filter('excerpt_more', 'ih_custom_excerpt_more');

?>
