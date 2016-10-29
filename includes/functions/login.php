<?php
/**
 * Integrity House
 * WordPress Login Screen Customizations
 */

function ih_login_logo() {
  global $integrity_house;

  if ($integrity_house['admin_logo']['url']):
    $url    = $integrity_house['admin_logo']['url'];
    $width  = $integrity_house['admin_logo']['width']  . 'px';
    $height = $integrity_house['admin_logo']['height'] . 'px';
?>
    <style type="text/css">
      body.login div#login h1 a {
        background-image: url("<?php echo $url; ?>");
        background-size: <?php echo $width; ?> <?php echo $height; ?>;
        width: <?php echo $width; ?>;
        height: <?php echo $height; ?>;
      }
    </style>
<?php
  endif;
}
add_action('login_enqueue_scripts', 'ih_login_logo');

?>
