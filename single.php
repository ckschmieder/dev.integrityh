<?php
get_header();
?>

<div class="wrapper">
  <div class="container">
    <div id="main-content">

      <?php if (have_posts()): while (have_posts()): the_post(); ?>
        

        <?php if (has_post_thumbnail()): ?>
          <?php the_post_thumbnail(); ?>
        <?php endif; ?>

        <article <?php post_class(); ?>>
          <h1 class="page-title"><?php the_title(); ?></h1>
          <?php the_content(); ?>
        </article>
      <?php endwhile; endif; ?>
    </div> <!-- End main-content -->
    <?php get_sidebar(); ?>
  </div> <!-- End container -->
</div> <!-- End wrapper -->


<?php get_footer(); ?>
