<?php
/**
 * Integrity House
 * Stylesheet Includes
 */

function ih_enqueue_styles() {
  $template_uri = get_template_directory_uri();
  $styles = array(
    'flexslider' => array(
      'src'     => "$template_uri/vendor/flexslider/flexslider.css",
      'deps'    => false,
      'version' => '2.2.2',
      'media'   => 'screen',
    ),
    'nerdbox'    => array(
      'src'     => "$template_uri/vendor/nerdbox/src/nerdbox.css",
      'deps'    => false,
      'version' => '0.5.0',
      'media'   => 'screen',
    ),
    'magnific-popup' => array(
      'src'     => "$template_uri/vendor/magnific-popup/dist/magnific-popup.css",
      'deps'    => false,
      'version' => '0.9.9',
      'media'   => 'screen',
    ),
    'ih-font-awesome' => array(
      'src'     => "$template_uri/vendor/font-awesome/css/font-awesome.min.css",
      'deps'    => false,
      'version' => '4.2.0',
      'media'   => 'all',
    ),
    'ih-print' => array(
      'src'     => "$template_uri/stylesheets/print.css",
      'deps'    => false,
      'version' => '0.1',
      'media'   => 'print',
    ),
    'ih-style' => array(
      'src'     => "$template_uri/style.css",
      'deps'    => array(
        'ih-print',
        'flexslider',
        'ih-font-awesome',
        'nerdbox',
        'magnific-popup',
      ),
      'version' => '0.1',
      'media'   => 'screen'
    ),
  );

  foreach ($styles as $name => $info) {
    wp_register_style($name, $info['src'], $info['deps'], $info['version'], $info['media']);
  }

  wp_enqueue_style('ih-style');
}
add_action('wp_enqueue_scripts', 'ih_enqueue_styles');

?>
