<?php
get_header();
?>

<div class="wrapper">
  <div class="container">
    <div id="main-content">

      <?php if (have_posts()): while (have_posts()): the_post(); ?>
        <?php
        global $post;

        $photos     = get_post_meta($post->ID, 'gallery_photos');
        $has_photos = is_array($photos[0]) && array_key_exists('image', $photos[0]);
        $num_photos = $has_photos ? count($photos[0]['image']) : 0;
        ?>
        <h1 class="page-title"><?php the_title(); ?></h1>

        <?php if (has_post_thumbnail()): ?>
          <?php the_post_thumbnail(); ?>
        <?php endif; ?>

        <article <?php post_class(); ?>>
          <?php the_content(); ?>
        </article>

        <div id="gallery-nav">
          <?php ih_gallery_nav_dropdown(); ?>
        </div>

        <ul class="gallery">
          <?php for ($i = 0; $i < $num_photos; $i++): ?>
            <?php
            //$img_id  = $photos[0]['image'][$i][0];
            $img_id  = ih_first_image($photos[0]['image'][$i]);
            $title   = $photos[0]['title'][$i];
            $caption = $photos[0]['caption'][$i];
            $thumb   = wp_get_attachment_image_src($img_id, 'homepage-thumbnail');
            $full    = wp_get_attachment_image_src($img_id, 'full');
            ?>
            <li class="gallery-item">
              <a href="<?php echo $full[0]; ?>" title="<?php echo esc_attr($caption); ?>">
                <img src="<?php echo $thumb[0]; ?>" width="<?php echo $thumb[1]; ?>" height="<?php echo $thumb[2]; ?>" alt="<?php echo esc_attr($caption); ?>" title="<?php echo esc_attr($title); ?>">
              </a>
            </li>
          <?php endfor; ?>
        </ul>
      <?php endwhile; endif; ?>
    </div> <!-- End main-content -->
    <?php get_sidebar(); ?>
  </div> <!-- End container -->
</div> <!-- End wrapper -->


<?php get_footer(); ?>
