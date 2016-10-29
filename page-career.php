<?php
/**
 * Template Name: Page - Career Page
 */
get_header();
?>

<div class="wrapper">
  <div class="container">
    <div id="main-content">
      <div class="interior">

        <?php if (have_posts()): while (have_posts()): the_post(); ?>
          <h1 class="login-title"><?php the_title(); ?></h1>

          <?php the_content(); ?>
        <?php endwhile; endif; ?>

        <?php
        $listings_query = array(
          'post_type'      => 'job_listing',
          'post_status'    => 'publish',
          'orderby'        => 'date',
          'order'          => 'DESC',
          'posts_per_page' => 10,
          'meta_query'     => array(
            array(
              'key'     => 'application_deadline',
              'value'   => strftime('%Y-%m-%d %H:%M:%S'),
              'compare' => '>',
              'type'    => 'DATE',
            ),
          ),
          'tax_query'      => array(
            array(
              'taxonomy' => 'job_listing_category',
              'field'    => 'slug',
              'terms'    => 'careers',
            ),
          ),
        );
        $listings = new WP_Query($listings_query);

        if ($listings->have_posts()):
          while ($listings->have_posts()):
            $listings->the_post();
            global $post;
            $deadline_raw = get_post_meta($post->ID, 'application_deadline', true);
            $deadline     = strtotime($deadline_raw);
            $deadline     = strftime('%m-%d-%Y', $deadline);
            $location     = get_post_meta($post->ID, 'location', true);
        ?>
            <div class="single-job">
              <div class="col-1">
                <h3>
                  Title:
                  <span><?php the_title(); ?></span>
                </h3>
                <h3>
                  Posting Date:
                  <span><?php the_date('m-j-Y'); ?></span>
                </h3>
              </div>
              <div class="col-2">
                <h3>
                  Application Deadline:
                  <span><?php echo $deadline; ?></span>
                </h3>
                <h3>
                  Location:
                  <span><?php echo $location; ?></span>
                </h3>
              </div>
              <div class="col-3">
                <a class="arrow button" href="<?php the_permalink(); ?>">View Listing &raquo;</a>
              </div>
            </div>
        <?php
          endwhile;
        else:
        ?>
          <div class="single-job"><em>Sorry, no listings were found.</em></div>
        <?php endif; ?>
      </div> <!-- End interior -->
    </div> <!-- End main-content -->
    <?php get_sidebar(); ?>
  </div> <!-- End container -->
</div> <!-- End wrapper -->

<?php get_footer(); ?>
