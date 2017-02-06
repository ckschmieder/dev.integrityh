<?php
/**
 * Integrity House
 * Testimonial Widget
 *
 * Displays a randomly selected testimonial.
 */

class Testimonial_Widget extends WP_Widget {

  public function __construct() {
    parent::__construct(
      'testimonial_widget', // Base ID
      'Testimonial Widget', // Name
      array(
        'description' => 'Displays a random testimonial',
      ) // Args
    );
  }

  /**
   * Front end display of widget.
   *
   * @param array $args       Widget arguments
   * @param array $instance   Saved values from DB
   */
  public function widget($args, $instance) {
    global $integrity_house;
    $default_thumb = $integrity_house['default_testimonial_thumb'];
    $show_latest   = $instance['show_latest'];
    $title         = apply_filters('widget_title', $instance['title']);
    $t_query       = new WP_Query(array(
      'post_type'      => 'testimonial',
      'posts_per_page' => 1,
      'post_status'    => 'publish',
      'orderby'        => $show_latest ? 'date' : 'rand',
      'order'          => 'DESC',
    ));

    if (!$t_query->have_posts()) return;

    $t_query->the_post();

    $post_id   = get_the_ID();
    $citation  = get_post_meta($post_id, 'citation', true);
    $thumb     = get_post_meta($post_id, 'thumbnail', true);
    $thumb_src = wp_get_attachment_image_src($thumb, array(83, 83), (int)$default_thumb['id']);

    echo $args['before_widget'];

    if (!empty($title)) {
      echo $args['before_title'] . $title . $args['after_title'];
    }
?>
    <div class="sidebar-testimonial">
      <?php the_content(); ?>
    </div>
    <?php if ($thumb_src): ?>
      <div class="testimonial-profile">
        <img src="<?php echo $thumb_src[0]; ?>" width="83" class="testimonial-profile">
      </div>
    <?php endif; ?>
    <div class="testimonial-name">
      <?php echo $citation; ?>
    </div>
    <a href="/our-impact-2/client-success-stories/" class="sidebar-link">Client Success Stories &raquo;</a>
<?php
    echo $args['after_widget'];
    wp_reset_postdata();
  }

  /**
   * Backend widget form
   *
   * @param array $instance Previously saved values from DB
   */
  public function form($instance) {
    $title          = isset($instance['title']) ? $instance['title'] : '';
    $latest_checked = isset($instance['show_latest']) && $instance['show_latest'] ? ' checked="checked"' : '';
?>
    <p>
      <label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
      <input class="widefat"
        id="<?php echo $this->get_field_id('title'); ?>"
        name="<?php echo $this->get_field_name('title'); ?>"
        type="text"
        value="<?php echo esc_attr($title); ?>">
    </p>

    <p>
      <input id="<?php echo $this->get_field_id('show_latest'); ?>"
        type="checkbox"
        name="<?php echo $this->get_field_name('show_latest'); ?>"
        <?php echo $latest_checked; ?>>
      <label for="<?php echo $this->get_field_id('show_latest'); ?>">Show most recent instead of random?</label>
    </p>
<?php
  }

  /**
   * Sanitize widget form values as they're saved
   *
   * @param array $new_instance Values just sent to be saved
   * @param array $old_instance Previously saved values from DB
   */
  public function update($new_instance, $old_instance) {
    $instance = array();

    $instance['title']       = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
    $instance['show_latest'] = isset($new_instance['show_latest']) && $new_instance['show_latest'] ? true : false;

    return $instance;
  }
}

?>
