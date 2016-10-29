<?php
/**
 * Integrity House
 * JavaScript Includes
 */

function ih_enqueue_scripts() {
  $template_uri = get_template_directory_uri();
  $scripts = array(
    'modernizr' => array(
      'src'     => "$template_uri/javascripts/modernizr.min.js",
      'deps'    => false,
      'version' => '2.6.3',
      'footer'  => false,
    ),
    'modernizr-tests' => array(
      'src'     => "$template_uri/javascripts/modernizr_tests.js",
      'deps'    => array('modernizr'),
      'version' => '0.1',
      'footer'  => false,
    ),
    'matchMedia' => array(
      'src'     => "$template_uri/vendor/matchmedia/matchMedia.js",
      'deps'    => false,
      'version' => '0.1.0',
      'footer'  => false,
    ),
    'mq-builder' => array(
      'src'     => "$template_uri/javascripts/media_query_builder.js",
      'deps'    => false,
      'version' => '0.1',
      'footer'  => true,
    ),
    'jquery-vendor' => array(
      'src'     => "$template_uri/vendor/jquery/jquery.min.js",
      'deps'    => false,
      'version' => '1.11.0',
      'footer'  => true,
    ),
    'hammerjs'    => array(
      'src'     => "$template_uri/vendor/hammerjs/hammer.min.js",
      'deps'    => false,
      'version' => '1.0.6',
      'footer'  => true,
    ),
    'jquery-hammerjs' => array(
      'src'     => "$template_uri/vendor/jquery-hammerjs/jquery.hammer.min.js",
      'deps'    => array('jquery-vendor', 'hammerjs'),
      'version' => '1.0.1',
      'footer'  => true,
    ),
    'flexslider'  => array(
      'src'     => "$template_uri/vendor/flexslider/jquery.flexslider-min.js",
      'deps'    => array('jquery-vendor'),
      'version' => '2.2.2',
      'footer'  => true,
    ),
    'underscore-vendor' => array(
      'src'     => "$template_uri/vendor/underscore/underscore-min.js",
      'deps'    => false,
      'version' => '1.5.2',
      'footer'  => true,
    ),
    'ih-debug'   => array(
      'src'     => "$template_uri/javascripts/debug.js",
      'deps'    => array('jquery-vendor'),
      'version' => '0.1',
      'footer'  => true,
    ),
    'jquery-integrityhouse' => array(
      'src'     => "$template_uri/javascripts/jquery.integrityhouse.js",
      'deps'    => array(
        'underscore-vendor',
        'jquery-hammerjs',
        'flexslider',
      ),
      'version' => '0.1',
      'footer'  => true,
    ),
    'ih-main' => array(
      'src'     => "$template_uri/javascripts/main.js",
      'deps'    => array(
        'mq-builder',
        'jquery-integrityhouse',
        'ih-debug',
      ),
      'version' => '0.1',
      'footer ' => true,
    ),
  );

  foreach ($scripts as $name => $info) {
    $footer = array_key_exists('footer', $info) ? $info['footer'] : true;
    wp_register_script($name, $info['src'], $info['deps'], $info['version'], $footer);
  }

  wp_enqueue_script('modernizr-tests');
  wp_enqueue_script('matchMedia');
  //wp_enqueue_script('ih-main');
  //wp_enqueue_script('ih-master');
}
add_action('wp_enqueue_scripts', 'ih_enqueue_scripts');

?>
