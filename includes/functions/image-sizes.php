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
  add_image_size('event-thumbnail', 220, 150, true);
  add_image_size('leadership-mug', 150, 225, true);
}
add_action('init', 'ih_define_image_sizes');


add_filter('image_size_names_choose', 'my_image_sizes');
function my_image_sizes($sizes) {
$addsizes = array(
"leadership-mug" => __( "Leadership Thumbnail - 150 x 225")
);
$newsizes = array_merge($sizes, $addsizes);
return $newsizes;
}

?>
