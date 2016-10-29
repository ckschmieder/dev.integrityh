<?php
/**
 * Integrity House
 * Utility Functions
 */

function ih_term_link_list($terms = array()) {
  if (!is_array($terms) || empty($terms)) return false;

  $term_list = array_map(function($term) {
    $link = get_term_link($term->term_id, $term->taxonomy);
    return '<a href="' . $link . '">' . $term->name . '</a>';
  }, $terms);

  return implode(', ', $term_list);
}

function ih_pagination_links($query = null, $range = 2) {
  global $paged, $wp_query;

  $paged     = $paged ? $paged : 1;
  $showitems = $range * 2 + 1;

  if (is_null($query)) {
    $query = $wp_query;
  }

  $pages = $query->max_num_pages;
  $pages = $pages ? $pages : 1;

  if ($pages > 1):
?>
    <div class="pagination">
        <a href="<?php echo get_pagenum_link($paged - 1); ?>" class="previous">
          <?php if ($paged > 1): ?>
            <span class="arrow"><span class="fa fa-arrow-left"></span></span>
            <span class="link-text">Previous</span>
          <?php endif; ?>
        </a>

      <?php for ($i = 1; $i <= $pages; $i++): ?>
        <?php if (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems): ?>
          <?php if ($paged == $i): ?>
            <span class="current"><?php echo $i; ?></span>
          <?php else: ?>
            <a href="<?php echo get_pagenum_link($i); ?>" class="inactive"><?php echo $i; ?></a>
          <?php endif; ?>
        <?php endif; ?>
      <?php endfor; ?>

        <a href="<?php echo get_pagenum_link($paged + 1); ?>" class="next">
          <?php if ($paged <= $pages - 1): ?>
            <span class="link-text">Next</span>
            <span class="arrow"><span class="fa fa-arrow-right"></span></span>
          <?php endif; ?>
        </a>
    </div>
<?php
  endif;
}

function ih_gallery_nav_dropdown() {
  $params = array(
    'post_type'      => 'gallery',
    'post_status'    => 'publish',
    'posts_per_page' => -1,
    'orderby'        => 'name',
    'order'          => 'ASC',
  );
  $query = new WP_Query($params);

  if ($query->have_posts()):
?>
    <select id="gallery-nav-dropdown">
      <option value="">&mdash; Select a Gallery &mdash;</option>
      <?php while ($query->have_posts()): $query->the_post(); ?>
        <option value="<?php the_permalink(); ?>">
          <?php the_title(); ?>
        </option>
      <?php endwhile; wp_reset_postdata(); ?>
    </select>
<?php
  endif;
}

function ih_first_image($arr) {
  $img_id = 0;

  foreach ($arr as $item) {
    $int = intval($item);

    if ($int > 0) {
      $img_id = $int;
      break;
    }
  }

  return $img_id;
}
?>
