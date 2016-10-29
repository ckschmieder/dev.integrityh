<?php
/**
 * Integrity House
 * Image Size Definitions
 */

function ih_define_image_sizes() {
  add_theme_support( 'post-thumbnails' );
  //set_post_thumbnail_size($width, $height, $crop);

  set_post_thumbnail_size(690, 260, true);
  add_image_size('homepage-thumbnail', 130, 120, true);
  add_image_size('blog-thumbnail', 210, 144, true);
  add_image_size('homepage-slider', 715, 480, true);
}
add_action('init', 'ih_define_image_sizes');

?>
