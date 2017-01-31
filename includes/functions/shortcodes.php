<?php
/**
 * Integrity House WordPress Theme
 * WordPress Shortcodes
 */

add_shortcode('login_form', function($atts, $content = null) {
  extract(shortcode_atts(array(
    'redirect' => '',
    'remember' => 0,
  ), $atts));

  ob_start();

  if (is_user_logged_in()):
    $user_data  = wp_get_current_user();
    $username   = trim($user_data->first_name . ' ' . $user_data->last_name);
    $username   = !empty($username) ? $username : $user_data->data->user_nicename;
    $logout_url = wp_logout_url(home_url('/'));
?>
    <p class="logged-in">
      You are already logged in as <strong><?php echo $username; ?></strong>.
      <a href="<?php echo esc_url($logout_url); ?>">Click here to log out.</a>
    </p>
<?php
  else:
    wp_login_form(array(
      'remember' => $remember,
      'redirect' => $redirect,
    ));
  endif;
  return ob_get_clean();
});

add_shortcode('team_member', function($atts, $content=null) {
  extract(shortcode_atts(array(
    'name' => '',
    'job'  => '',
  ), $atts));

  ob_start();
?>
  <div class="team-member">
    <strong class="team-member-name"><?php echo $name; ?></strong>
    <br>
    <em class="team-member-job"><?php echo $job; ?></em>

    <?php echo apply_filters('the_content', $content); ?>
  </div>
<?php
  return ob_get_clean();
});

function ih_social_icons() {
  $i = '<div class="social-mob">Success</div>';
  return $i;
}
add_shortcode('ih-social-icons', 'ih_social_icons' );

function ih_gallery_shortcode($atts) {
  extract(shortcode_atts(array(
    'id'    => null,
    'title' => null
  ), $atts));

  if (!$id) return '';

  if (is_string($id) && ctype_alpha(substr($id, 0, 1))) {
    global $wpdb;
    $query = $wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE post_name = '%s'", $id);
    $id    = $wpdb->get_var($query);
  }

  $gallery = get_post($id);

  if (!$gallery || $gallery->post_type !== 'gallery') return '';

  $photos = get_post_meta($gallery->ID, 'gallery_photos', true);

  if (!array_key_exists('image', $photos)) return '';

  $num_photos = count($photos['image']);

  ob_start();
?>
  <ul class="gallery">
    <?php for ($i = 0; $i < $num_photos; $i++): ?>
      <?php
      $img_id  = $photos['image'][$i];
      $title   = $photos['title'][$i];
      $caption = $photos['caption'][$i];
      $thumb   = wp_get_attachment_image_src($img_id, 'homepage-thumbnail');
      $full    = wp_get_attachment_image_src($img_id, 'full');
      ?>
      <li class="gallery-item">
        <a href="<?php echo $full[0]; ?>" class="nerdbox">
          <img
            src="<?php echo $thumb[0]; ?>"
            width="<?php echo $thumb[1]; ?>"
            height="<?php echo $thumb[2]; ?>"
            alt="<?php echo $title; ?>">
        </a>
      </li>
    <?php endfor; ?>
  </ul>
<?php
  return ob_get_clean();
}
add_shortcode('ih_gallery', 'ih_gallery_shortcode');

?>
