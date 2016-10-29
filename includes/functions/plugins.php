<?php
/**
 * Integrity House
 * Plugin Registration & Installation
 */

function ih_register_plugins() {
  $plugins = array(
    array(
      'name'     => 'Redux Framework',
      'slug'     => 'redux-framework',
      'required' => true,
    ),
    array(
      'name'     => 'Content Aware Sidebars',
      'slug'     => 'content-aware-sidebars',
      'required' => true,
    ),
    array(
      'name'     => 'Piklist | Rapid Development Framework',
      'slug'     => 'piklist',
      'required' => true,
    ),
    array(
      'name'     => 'WordPress SEO by Yoast',
      'slug'     => 'wordpress-seo',
      'required' => true,
    ),
    array(
      'name'     => "Peter's Login Redirect",
      'slug'     => 'peters-login-redirect',
      'required' => true,
    ),
    array(
      'name'     => 'Members',
      'slug'     => 'members',
      'required' => true,
    ),
    array(
      'name'     => 'Google Analytics by Yoast',
      'slug'     => 'google-analytics-for-wordpress',
      'required' => true,
    ),
    array(
      'name'     => 'ShiftNav - Responsive Mobile Menu',
      'slug'     => 'shiftnav-responsive-mobile-menu',
      'required' => true,
    ),
    array(
      'name'     => 'Regenerate Thumbnails',
      'slug'     => 'regenerate-thumbnails',
      'required' => true,
    )
  );

  $config = array(
    'is_automatic' => true,
  );

  tgmpa($plugins, $config);
}
add_action('tgmpa_register', 'ih_register_plugins');

?>
