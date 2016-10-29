<?php
/**
 * Register our sidebars and widgetized areas.
 *
 */

require_once dirname(__FILE__) . "/../widgets/testimonial_widget.php";

function ih_init_widgets() {
  register_sidebar(array(
    'name'          => 'Widget Sidebar',
    'id'            => 'widget_sidebar',
    'description'   => 'Customizable widget area',
    'before_widget' => '<div class="sidebar-inner">',
    'after_widget'  => '</div>',
  ));

  register_sidebar(array(
    'name'          => 'Homepage Img and Caption ',
    'id'            => 'homepage_widget',
    'description'   => 'Customizable widget area',
    'before_widget' => '<div class="hero-wrap">',
    'after_widget'  => '</div>',
  ));

  register_widget('Testimonial_Widget');
}
add_action('widgets_init', 'ih_init_widgets');

?>
