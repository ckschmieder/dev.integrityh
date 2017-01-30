<?php
/**
 * Template Name: Default Page
 */

get_header();
?>

<div class="wrapper">
  <div class="container">
		<div id="main-content">
			
			<?php if (have_posts()): while (have_posts()): the_post(); ?>
        <?php if (has_post_thumbnail()): ?>
          <div class="featured-img"><?php the_post_thumbnail(); ?></div>
        <?php endif; ?>

        <article <?php post_class(); ?>>
        <header class="entry-header">
          <h1 class="entry-title"><?php the_title(); ?></h1>
        </header>
          
          <?php the_content(); ?>
        </article>
      <?php endwhile; endif; ?>

		</div> <!-- End main-content -->

		<?php get_sidebar(); ?>
	</div> <!-- End container -->
</div> <!-- End wrapper -->


<?php get_footer(); ?>
