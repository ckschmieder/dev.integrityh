<?php
/**
 * Template Name: Home Page
 */

get_header(); ?>

<div class="wrapper">
    <div class="container">
    <div id="main-content">

      <?php if (has_post_thumbnail()): ?>
          <?php the_post_thumbnail(); ?>
        <?php endif; ?>
        <?php the_content(); ?>
      <?php
      global $post;
      $slides = get_post_meta($post->ID, 'slider', true);

      if (!empty($slides) && array_key_exists('title', $slides)):
        $slide_count = max(
          count($slides['title']),
          count($slides['caption']),
          count($slides['photo'])
        );
      ?>
        <div
          id="home-slider"
          class="slider"
          data-delay="<?php echo (int)$integrity_house['main_slider_delay']; ?>"
          data-speed="<?php echo (int)$integrity_house['main_slider_animation_speed']; ?>">

          <ul class="slides">
            <?php for ($i = 0; $i < $slide_count; $i++): ?>
              <?php
              $title     = $slides['title'][$i];
              $link_url  = $slides['link_url'][$i];
              $photo_id  = ih_first_image($slides['photo'][$i]);
              $caption   = $slides['caption'][$i];
              $photo_src = wp_get_attachment_image_src($photo_id, 'homepage-slider');
              ?>
              <li>
                <?php if (!empty($link_url)): ?>
                  <a href="<?php echo $link_url; ?>">
                <?php endif; ?>
                <img src="<?php echo $photo_src[0]; ?>" alt="<?php echo $title; ?>" width="100%">
                <div class="caption">
                  <h2><?php echo $title; ?></h2>
                  <p>
                    <?php echo $caption; ?>
                  </p>
                </div>
                <?php if (!empty($link_url)): ?>
                  </a>
                <?php endif; ?>
              </li>
            <?php endfor; ?>
          </ul>

          <a class="directional left" href="" title="Previous Slide">&laquo;</a>
          <a class="directional right" href="" title="Next Slide">&raquo;</a>
        </div>
      <?php endif; ?>

      <?php
      $news_cat     = get_term_by('slug', 'news-updates', 'category');
      $archive_link = get_category_link($news_cat->term_id);
      $news_query   = new WP_Query(array(
        'post_type'      => 'post',
        'post_status'    => 'publish',
        'posts_per_page' => 4,
        'order'          => 'DESC',
        'orderby'        => 'post_date',
        'category_name'  => 'news-updates',
      ));

      ih_content_slider($news_query, array(
        'header_text'   => $integrity_house['news_header_text'],
        'mobile_id'     => 'mobile-news',
        'archive_link'  => $archive_link,
        'container_id'  => 'news',
        'slider_id'     => 'news-slider',
        'speed'         => (int) $integrity_house['news_slider_animation_speed'],
        'view_all_text' => 'View All News &raquo;',
      ));
      ?>

      <?php
      $events_archive = get_post_type_archive_link('event');
      $events_query = new WP_Query(array(
        'post_type'      => 'event',
        'post_status'    => 'publish',
        'posts_per_page' => 2,
        'order'          => 'ASC',
        'orderby'        => 'meta_value',
        'meta_key'       => 'start_date',
        'meta_query'     => array(
          array(
            'key'     => 'start_date',
            'value'   => strftime('%Y-%m-%d'),
            'compare' => '>=',
            'type'    => 'DATE',
          ),
        ),
      ));

      ih_content_slider($events_query, array(
        'header_text'   => $integrity_house['events_header_text'],
        'mobile_id'     => 'mobile-events',
        'archive_link'  => $events_archive,
        'container_id'  => 'events',
        'slider_id'     => 'events-slider',
        'speed'         => (int) $integrity_house['event_slider_animation_speed'],
        'view_all_text' => 'View All Events &raquo;',
      ));
      ?>

    </div> <!-- End main-content -->
    <?php get_sidebar(); ?>
  </div> <!-- End container -->
</div> <!-- End wrapper -->


<?php get_footer(); ?>
