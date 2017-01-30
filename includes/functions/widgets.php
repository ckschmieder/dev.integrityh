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




function randj_widgets_init() {
  
  register_sidebar( array(
    'name' => 'Footer Sidebar 1',
    'id' => 'footer-sidebar-1',
    'description' => 'Appears in the footer area',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
    ) );
    register_sidebar( array(
    'name' => 'Footer Sidebar 2',
    'id' => 'footer-sidebar-2',
    'description' => 'Appears in the footer area',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
    ) );
    register_sidebar( array(
    'name' => 'Footer Sidebar 3',
    'id' => 'footer-sidebar-3',
    'description' => 'Appears in the footer area',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
    ) );
}
add_action( 'widgets_init', 'randj_widgets_init' );

?>