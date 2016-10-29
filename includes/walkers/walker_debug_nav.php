<?php
/**
 * Walker_Debug_Nav class
 *
 * Creates a menu whose list items are preceded by their menu item's
 * underlying data structure print_r'd into an HTML comment.
 *
 * @uses Walker_Nav_Menu
 */

class Walker_Debug_Nav extends Walker_Nav_Menu {

  /**
   * Start a menu item's output
   *
   * @see Walker_Nav_Menu::start_el()
   * @param string $output Passed by reference. Used to append additional 
   * content
   * @param object $item Menu item data object
   * @param int $depth Depth of menu item, used for padding.
   * @param array $args An array of arguments. @see wp_nav_menu()
   * @param int $id Current menu item ID.
   */
  function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
    $debug   = true;
    $indent  = ($depth) ? str_repeat("\t", $depth) : '';
    $item_id = 'menu-item-' . $item->ID;

    $class_names = $value = '';

    $classes   = empty($item->classes) ? array() : (array)$item->classes;
    $classes[] = 'menu-item-' . $item->ID;

    // Filter CSS classes applied to the menu item's <li>.
    $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
    $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

    // Filter the ID applied to a menu item's <li>.
    $id = apply_filters('nav_menu_item_id', $item_id, $item, $args);
    $id = $id ? ' id="' . esc_attr($id) . '"' : '';

    // Capture the print_r representation of $item
    ob_start();
    print_r($item);
    $debug_out = ob_get_clean();
    $output   .= "{$indent}<!--\n{$indent}{$debug_out}\n{$indent}-->\n";

    // Release the bats! (Start the list item...)
    $output .= $indent . '<li' . $id . $value . $class_names . '>';

    $atts           = array();
    $atts['title']  = !empty($item->attr_title) ? $item->attr_title : '';
    $atts['target'] = !empty($item->target) ? $item->target : '';
    $atts['rel']    = !empty($item->xfn) ? $item->xfn : '';
    $atts['href']   = !empty($item->url) ? $item->url : '';

    // Filter the HTML attributes applied to the item's <a>.
    $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args);

    $attributes = '';

    foreach ($atts as $attr => $value) {
      if (!empty($value)) {
        $value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
        $attributes .= ' ' . $attr . '="' . $value . '"';
      }
    }

    $item_output  = $args->before;
    $item_output .= '<a' . $attributes . '>';
    $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
    $item_output .= '</a>';
    $item_output .= $args->after;

    // Filter a menu item's starting output
    $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
  }

}

?>
