<?php
/**
 * Integrity House
 * Default Content Slider Pane Template
 */
?>
<li itemscope="http://schema.org/Article">
  <?php if ($thumb): ?>
    <div class="image">
      <a href="<?php echo $permalink; ?>">
        <?php echo $thumb; ?>
      </a>
    </div>
  <?php endif; ?>
  <div class="content">
    <h3>
      <a href="<?php echo $permalink; ?>" itemprop="url">
        <span itemprop="name"><?php the_title(); ?></span>
      </a>
    </h3>
    <div itemprop="description" class="excerpt">
      <?php the_excerpt(); ?>
    </div>
  </div>
</li>
