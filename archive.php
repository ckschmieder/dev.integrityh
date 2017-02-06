<?php
/**
 * Integrity House
 * Archive Template
 */

get_header();

global $wp_query;
$obj = $wp_query->queried_object;

if (is_post_type_archive()) {
  $title = post_type_archive_title(null, false);
} elseif (is_category()) {
  $title = $obj->name;
} else {
  $title = 'Archives';
}
?>

<div class="wrapper">
  <div class="container">
    <div id="main-content archive">
      <header class="entry-header">
        <h1 class="page-title"><?php echo $title; ?></h1>
      </header>

      <?php if (have_posts()): ?>
        <ol class="search-results">
          <?php while (have_posts()): the_post(); ?>
            <?php get_template_part('search-result'); ?>
          <?php endwhile; ?>
        </ol>

        <?php ih_pagination_links(); ?>
      <?php else: ?>
        <p>
          <em>No results found</em>
        </p>
      <?php endif; ?>

    </div>
    <?php get_sidebar(); ?>
  </div>
</div>

<?php
get_footer();
?>
