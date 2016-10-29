<?php
/**
 * Integrity House
 * Content Slider Pane Template for Events
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
      <p>
        <strong>Date:</strong> <?php echo $start->format('l, F j, Y'); ?>
        <br>
        <strong>Time:</strong> <?php echo $start->format('g:ia'); ?>
        <br>
        <strong>Where:</strong> <?php echo $location; ?>
      </p>
    </div>
  </div>
</li>
