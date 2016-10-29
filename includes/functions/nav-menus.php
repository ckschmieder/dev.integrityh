<?php
/**
 * Integrity House
 * Navigation Menus
 */

// Include custom nav menu walker classes
require_once dirname(__FILE__) . "/../walkers/walker_debug_nav.php";

function ih_register_nav_menus() {
  register_nav_menus(array(
    'main_nav'     => 'Main Navigation',
    'login_menu'   => 'Footer Login Menu',
    'careers_menu' => 'Footer Careers Menu',
  ));
}
add_action('init', 'ih_register_nav_menus');

?>
