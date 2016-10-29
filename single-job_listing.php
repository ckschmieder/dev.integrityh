<?php
get_header();
?>

<div class="wrapper">
    <div class="container">
        <div id="main-content">
            <?php if (have_posts()): while (have_posts()): the_post(); ?>
                <?php
                $post_id  = get_the_ID();
                $deadline = strtotime(get_post_meta($post_id, 'application_deadline', true));
                $deadline = strftime('%m-%d-%Y', $deadline);
                $app_page = get_post_meta($post_id, 'application_page', true);
                $app_url  = get_post_meta($post_id, 'application_url', true);
                $location = get_post_meta($post_id, 'location', true);
?>
<!--<?php var_dump($app_url); ?> -->
<?php

                if (!$app_url) {
                  $app_url = get_permalink($app_page);
                }
                ?>
                <div <?php post_class(); ?>>
                    <h1 class="login-title"><?php the_title(); ?></h1>

                    <div class="job-heading">
                        <div class="job-detail">
                            <h3>Title: <span><?php the_title(); ?></span></h3>
                            <h3>Posting Date: <span><?php the_date(); ?></span></h3>
                            <h3>Application Deadline: <span><?php echo $deadline; ?></span></h3>
                            <h3>Location: <span><?php echo $location; ?></span></h3>
                        </div>
                    </div> <!-- End single-job -->

                    <?php if (has_post_thumbnail()): ?>
                        <?php the_post_thumbnail(); ?>
                    <?php endif; ?>

                    <article class="job-description">
                        <?php the_content(); ?>
                        <?php if ($app_url): ?>
                          <?php
                          $target = stristr($app_url, site_url()) ? '' : ' target="_blank"';
                          ?>
                          <a href="<?php echo esc_url($app_url); ?>" class="button bree"<?php echo $target; ?>>Apply Now</a>
                        <?php endif; ?>
                    </article>
                </div>
            <?php endwhile; endif; ?>
        </div> <!-- End main-content -->
        <?php get_sidebar(); ?>
    </div> <!-- End container -->
</div> <!-- End wrapper -->

<?php get_footer(); ?>

