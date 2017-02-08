<?php
/**
 * Template Name: Events Listing Page
 */
get_header();
?>

<div class="wrapper">
    <div class="container">
      <div id="main-content">

        <section class="upcoming-events">
          <div class="indent">
            <h2 class="event-section-title">Upcomming Events</h2>

            <?php
            // The Query
            $events_archive = get_post_type_archive_link('event');
            $events_query = new WP_Query(array(
              'post_type'      => 'event',
              'post_status'    => 'publish',
              'posts_per_page' => -1,
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
            ?>

            <?php
            
            // The Loop
            if ( $events_query->have_posts() ) {
              while ( $events_query->have_posts() ) {
                $events_query->the_post();
                ?>

                <div class="event-wrap">

                    <?php get_template_part('search-result'); ?>


                  <?php


                    }
                  } else {
                    // no posts found
                  }

                  // Restore original Post Data
                  wp_reset_postdata();
                  ?>
                </div><!-- END .event-wrap -->

          </div><!-- END .indent -->
        </section><!-- END .upcoming-events -->

        <section class="upcoming-events">
          <div class="indent">
            <h2 class="event-section-title">Past Events</h2>
            
            <?php
            // The Query
            $events_archive = get_post_type_archive_link('event');
            $events_query = new WP_Query(array(
              'post_type'      => 'event',
              'post_status'    => 'publish',
              'posts_per_page' => -1,
              'order'          => 'DESC',
              'orderby'        => 'meta_value',
              'meta_key'       => 'start_date',
              'meta_query'     => array(
                array(
                  'key'     => 'start_date',
                  'value'   => strftime('%Y-%m-%d'),
                  'compare' => '<',
                  'type'    => 'DATE',
                ),
              ),
            ));
            ?>

            <?php

            // The Loop
            if ( $events_query->have_posts() ) {
              while ( $events_query->have_posts() ) {
                $events_query->the_post();
                ?>
                
               <div class="event-wrap">
                  
                    <?php get_template_part('search-result'); ?>

                  <?php

                    }
                  } else {
                    // no posts found
                  }

                  // Restore original Post Data
                  wp_reset_postdata();
                  ?>
                </div><!-- END .event-wrap -->

        </section>
    </div> <!-- End main-content -->
    <?php get_sidebar(); ?>
  </div> <!-- End container -->
</div> <!-- End wrapper -->


<?php get_footer(); ?>
