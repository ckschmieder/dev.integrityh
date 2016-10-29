<?php
/**
 * Integrity House
 * Search Results Template
 */

get_header();
?>

<div class="wrapper">
  <div class="container">
    <div id="main-content">

    <h1 class="page-title">Search Results for &ldquo;<?php the_search_query(); ?>&rdquo;</h1>


      <?php if (have_posts()): ?>
        <ol class="search-results">
          <?php while (have_posts()): the_post(); ?>
            <?php get_template_part('search-result'); ?>
          <?php endwhile; ?>
        </ol>

        <?php ih_pagination_links(); ?>
      <?php else: ?>
        <p>
          <em>Sorry, we couldn't find any results for &ldquo;<?php the_search_query(); ?>&rdquo;.</em>
        </p>
      <?php endif; ?>

    </div>
    <?php get_sidebar(); ?>
  </div>
</div>

<?php
get_footer();
?>
