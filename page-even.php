<?php
/**
 * Template Name: Events Listing Page
 */
get_header();
?>

<div class="wrapper">
    <div class="container">
    <div id="main-content">


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
