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


// Creating the widget 
class wpb_widget extends WP_Widget {

function __construct() {
parent::__construct(
// Base ID of your widget
'wpb_widget', 

// Widget name will appear in UI
__('Upcoming Events Widget loop', 'wpb_widget_domain'), 

// Widget description
array( 'description' => __( 'Auto updated list of upcoming events based on event date in the future', 'wpb_widget_domain' ), ) 
);
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );
// before and after widget arguments are defined by themes
echo $args['before_widget'];
if ( ! empty( $title ) )
echo $args['before_title'] . $title . $args['after_title'];

// This is where you run the code and display the output
/*echo __( 'Hello, World!', 'wpb_widget_domain' );
echo $args['after_widget'];*/

$events_archive = get_post_type_archive_link('event');
            $events_query = new WP_Query(array(
              'post_type'      => 'event',
              'post_status'    => 'publish',
              'posts_per_page' => 3,
              'order'          => 'ASC',
              'orderby'        => 'meta_value',
              'meta_key'       => 'start_date',
              'meta_query'     => array(
                array(
                  'key'     => 'start_date',
                  'value'   => strftime('%Y-%m-%d'),
                  'compare' => '>=',
                  'type'    => 'DATE',
                ),
              ),
            ));
            ?>

            <ul class="sidebar-events">

            <?php
            
            // The Loop
            if ( $events_query->have_posts() ) {
              while ( $events_query->have_posts() ) {
                $events_query->the_post();
                ?>

               
                  

                  <!-- <div class="event-info"> -->

                    
                    <li><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
                    

                  <!-- </div> -->

                  <?php


                    }
                  } else {
                    // no posts found
                  }

                  // Restore original Post Data
                  wp_reset_postdata();
                  ?>
                  </ul>
                  <a href="/events/" class="sidebar-link">More Events »</a>
                  </div>
                <?php

}
        
// Widget Backend 
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'New title', 'wpb_widget_domain' );
}
// Widget admin form
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<?php 
}
    
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
return $instance;
}
} // Class wpb_widget ends here

// Register and load the widget
function wpb_load_widget() {
    register_widget( 'wpb_widget' );
}
add_action( 'widgets_init', 'wpb_load_widget' );
?>