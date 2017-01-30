<?php
$categories = get_the_category();
?>
<li class="result">
  <?php if (has_post_thumbnail()): ?>
    <?php
    $thumb_id = get_post_thumbnail_id();
    $thumb    = wp_get_attachment_image_src($thumb_id, 'blog-thumbnail');
    ?>
    <div class="thumbnail">
      <a href="<?php the_permalink(); ?>">
        <img src="<?php echo $thumb[0]; ?>" class="search-thumb" alt="<?php echo esc_attr(get_the_title()); ?>">
      </a>
    </div>
  <?php endif; ?>

  <div class="result-right">
    <h2 class="search-result-title">
      <a href="<?php the_permalink(); ?>">
        <?php the_title(); ?>
      </a>
    </h2>

    <div class="post-info">
      <?php if (!empty($categories)): ?>
        <span class="category">
          Posted in <?php echo ih_term_link_list($categories); ?>
        </span>
      <?php endif; ?>

      <span class="date">
        <?php the_date(null, '<span class="fa fa-clock-o"></span>&nbsp;'); ?>
      </span>
    </div>

    <div class="post-excerpt">
      <?php the_excerpt(); ?>
    </div>

    <a class="read-more" href="<?php the_permalink(); ?>">
      Read More &raquo;
    </a>
  </div>
</li>
  
