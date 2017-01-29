<?php
/**
 * Integrity House WordPress Theme
 * UI Element Functions
 */

function ih_content_slider(&$query, $params = array()) {
  if (!is_a($query, 'WP_Query') || !$query->have_posts()) return false;
?>
  <h2><?php echo $params['header_text']; ?></h2>
  <div class="mobile-content" id="<?php echo $params['mobile_id']; ?>">
    <a class="view-all" href="<?php echo $params['archive_link']; ?>">
      <?php echo $params['view_all_text']; ?>
    </a>
  </div>
  <div class="content-slide-wrap" id="<?php echo $params['container_id']; ?>">
    <a class="directional left" href="" title="Previous">&laquo;</a>
    <div
      id="<?php echo $params['slider_id']; ?>"
      class="slider"
      data-speed="<?php echo $params['speed']; ?>">

      <ul class="slides">
        <?php while ($query->have_posts()): $query->the_post(); ?>
          <?php
          global $post;
          $thumb = get_the_post_thumbnail($post->ID, 'homepage-thumbnail', array(
            'itemprop' => 'thumbnailUrl',
          ));
          $permalink = get_permalink($post->ID);

          if ($post->post_type === 'event') {
            $date     = get_post_meta($post->ID, 'start_date', true);
            $time     = get_post_meta($post->ID, 'start_time', true);
            $location = get_post_meta($post->ID, 'location', true);
            $start    = new DateTime($date . ' ' . $time);
          }

          $dirname = trailingslashit(dirname(__FILE__));
          $template_name = $dirname . '../templates/content-slider-pane-' . $post->post_type . '.php';

          if (!file_exists($template_name)) {
            $template_name = $dirname . '../templates/content-slider-pane.php';
          }

          include $template_name;
          ?>
        <?php endwhile; ?>
      </ul>
    </div>
    <a class="directional right" href="" title="Next">&raquo;</a>
  </div>
<?php
  wp_reset_postdata();
  return true;
}

?>
