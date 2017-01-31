<?php
/**
 * Integrity House
 * Redux Config File
 */

$theme_uri = get_stylesheet_directory_uri();

$args = array();

$args['dev_mode']            = false;
$args['dev_mode_icon_class'] = 'icon-large';
$args['opt_name']            = 'integrity_house';
$args['system_info']         = false;
$args['system_info_icon']    = 'info-sign';


$theme = wp_get_theme();

$args['display_name']       = $theme->get('Name');
$args['display_version']    = $theme->get('Version');
$args['default_icon_class'] = 'icon-large';

// Custom title for options page
$args['menu_title'] = 'Theme Options';
$args['page_title'] = 'Integrity House Theme Options';
$args['page_slug']  = 'theme_options';

// Custom Help Area
$contact_info_html = <<<END_HTML
<p>If you have any questions, please contact Fifth Room Creative:</p>
<p>
  <a href="mailto:social@randjsc.com">social@randjsc.com</a>
  <br>
  <a href="tel://19735872000">(973) 587-2000</a>
</p>
END_HTML;

$args['help_tabs'][] = array(
  'id'      => 'contact-info',
  'title'   => 'Contact Information',
  'content' => $contact_info_html,
);

if (!isset($args['global_variable']) || $args['global_variable'] !== false) {
  if (!empty($args['global_variable'])) {
    $v = $args['global_variable'];
  } else {
    $v = str_replace('-', '_', $args['opt_name']);
  }

  $args['intro_text'] = "Global variable name: \$$v";
} else {
  $args['intro_text'] = 'Intro text';
}

$sections = array();

// Social Media Settings Pane
$sections[] = array(
  'title'      => 'Social Media Settings',
  'header'     => 'Test Header',
  'icon'       => 'el-icon-twitter',
  'fields'     => array(
    array(
      'id'    => 'twitter',
      'title' => 'Twitter URL',
      'type'  => 'text',
      'desc'  => 'Twitter Feed URL',
    ),
    array(
      'id'    => 'facebook',
      'title' => 'Facebook',
      'type'  => 'text',
      'desc'  => 'Facebook Page URL'
    ),
    array(
      'id'    => 'contact_email',
      'title' => 'Contact Email',
      'type'  => 'text',
      'desc'  => 'Email address or link to contact form',
    ),
  ),
);

// Slider Configuration Pane
$sections[] = array(
  'title'      => 'Homepage Settings',
  'desc'       => 'Settings for homepage section titles and sliders',
  'icon'       => 'el-icon-home-alt',
  'fields'     => array(
    array(
      'id'       => 'main_slider_max_slides',
      'title'    => 'Main Slider Max. Slides',
      'subtitle' => 'Load this many slides, at most, for the main homepage slider',
      'type'     => 'slider',
      'desc'     => 'Min: 1, Max: 10',
      'default'  => 5,
      'min'      => 0,
      'max'      => 10,
      'step'     => 1,
    ),
    array(
      'id'       => 'main_slider_delay',
      'title'    => 'Main Slider Transition Delay',
      'subtitle' => 'How many seconds to stay on each slide',
      'type'     => 'slider',
      'desc'     => 'Min: 2, Max: 30',
      'default'  => 7,
      'min'      => 2,
      'max'      => 30,
      'step'     => 1,
    ),
    array(
      'id'       => 'main_slider_animation_speed',
      'title'    => 'Main Slider Animation Speed',
      'subtitle' => 'How long each slide transition takes, in milliseconds',
      'type'     => 'slider',
      'desc'     => 'Min: 200, Max: 2000',
      'default'  => 600,
      'min'      => 200,
      'max'      => 2000,
      'step'     => 50,
    ),
    array(
      'id'   => 'divide1',
      'type' => 'divide',
    ),
    array(
      'id'       => 'news_header_text',
      'title'    => 'News Header Text',
      'subtitle' => 'Displayed above the news slider',
      'type'     => 'text',
      'default'  => 'News',
    ),
    array(
      'id'       => 'news_slider_max_stories',
      'title'    => 'News Slider Max. Stories',
      'subtitle' => 'Load this many stories into the News slider',
      'type'     => 'slider',
      'desc'     => 'Min: 1, Max: 15',
      'default'  => 5,
      'min'      => 1,
      'max'      => 15,
      'step'     => 1,
    ),
    array(
      'id'       => 'news_slider_delay',
      'title'    => 'News Slider Transition Delay',
      'subtitle' => 'How many seconds to stay on each slide',
      'type'     => 'slider',
      'desc'     => 'Min: 2, Max: 30',
      'default'  => 7,
      'min'      => 2,
      'max'      => 30,
      'step'     => 1,
    ),
    array(
      'id'       => 'news_slider_animation_speed',
      'title'    => 'News Slider Animation Speed',
      'subtitle' => 'How long each slide transition takes, in milliseconds',
      'type'     => 'slider',
      'desc'     => 'Min: 200, Max: 2000',
      'default'  => 600,
      'min'      => 200,
      'max'      => 2000,
      'step'     => 50,
    ),
    array(
      'id'   => 'divide2',
      'type' => 'divide',
    ),
    array(
      'id'       => 'events_header_text',
      'title'    => 'Events Header Text',
      'subtitle' => 'Displayed above the events slider',
      'type'     => 'text',
      'default'  => 'Events',
    ),
    array(
      'id'       => 'event_slider_max_events',
      'title'    => 'Event Slider Max. Events',
      'subtitle' => 'Load this many upcoming events into the event slider',
      'type'     => 'slider',
      'desc'     => 'Min: 1, Max: 15',
      'default'  => 5,
      'min'      => 1,
      'max'      => 15,
      'step'     => 1,
    ),
    array(
      'id'       => 'event_slider_animation_speed',
      'title'    => 'Event Slider Animation Speed',
      'subtitle' => 'How long each slide transition takes, in milliseconds',
      'type'     => 'slider',
      'desc'     => 'Min: 200, Max: 2000',
      'default'  => 600,
      'min'      => 200,
      'max'      => 2000,
      'step'     => 50,
    ),
  ),
);

// Contact Information Section
$phone_number_chars = '/[^\d\-\ \(\)x]/';

$sections[] = array(
  'title'      => 'Contact Information',
  'desc'       => 'NA/AA and Integrity House Campuses',
  'icon'       => 'el-icon-address-book',
  'fields'     => array(
    array(
      'id'       => 'admissions',
      'title'    => 'Admissions Department',
      'type'     => 'text',
      'default'  => '973-848-3751',
      'validate' => 'preg_replace',
      'preg'     => array(
        'pattern'     => $phone_number_chars,
        'replacement' => '',
      ),
    ),
    array(
      'id'       => 'aa_hotline',
      'title'    => 'AA Hotline Number',
      'type'     => 'text',
      'default'  => '800-245-1377',
      'validate' => 'preg_replace',
      'preg'     => array(
        'pattern'     => $phone_number_chars,
        'replacement' => '',
      ),
    ),
    array(
      'id'       => 'na_hotline',
      'title'    => 'NA Hotline Number',
      'type'     => 'text',
      'default'  => '800-992-0401',
      'validate' => 'preg_replace',
      'preg'     => array(
        'pattern'     => $phone_number_chars,
        'replacement' => '',
      ),
    ),
  ),
);

$sections[] = array(
  'title' => 'Calls to Action',
  'icon' => 'el-icon-star-alt',
  'fields' => array(
    array(
      'id'       => 'cta_ask_for_help',
      'title'    => 'Ask for Help Button',
      'type'     => 'text',
      'validate' => 'url',
    ),
    array(
      'id'       => 'cta_donate',
      'title'    => 'Donate Button',
      'type'     => 'text',
      'validate' => 'url',
    ),
    array(
      'id'       => 'cta_subscribe',
      'title'    => 'Subscribe Button',
      'type'     => 'text',
      'validate' => 'url',
    ),
  ),
);

$sections[] = array(
  'title'      => 'Logo and Icons',
  'icon'       => 'el-icon-picture',
  'fields'     => array(
    array(
      'id'       => 'admin_logo',
      'title'    => 'Admin Logo',
      'subtitle' => 'Logo used on the admin login page',
      'desc'     => 'Maximum width 320px',
      'type'     => 'media',
      'default'  => array(
        'url'  => $theme_uri . '/images/logo-mob.png',
      ),
    ),
    array(
      'id'       => 'favicon_ico',
      'title'    => 'Bookmark Icon (ICO)',
      'subtitle' => 'Used on bookmarks and in MSIE address bar',
      'desc'     => 'ICO file w/ 32x32 and 16x16 sizes recommended',
      'type'     => 'media',
      'default'  => array(
        'url'  => $theme_uri . '/images/favicon.ico',
      ),
    ),
    array(
      'id'       => 'favicon_png',
      'title'    => 'Bookmark Icon (small PNG)',
      'subtitle' => 'Used for same purposes by all other browsers',
      'desc'     => '32x32 PNG recommended',
      'type'     => 'media',
      'width'    => 32,
      'height'   => 32,
      'default'  => array(
        'url'  => $theme_uri . '/images/favicon-32.png',
      ),
    ),
    array(
      'id'       => 'apple_touch_icon',
      'title'    => 'Apple Touch Icon',
      'subtitle' => 'Used on iOS device home screens',
      'desc'     => '152x152 PNG recommended',
      'type'     => 'media',
      'width'    => 152,
      'height'   => 152,
    ),
    array(
      'id'       => 'default_testimonial_thumb',
      'title'    => 'Default Testimonial Thumbnail',
      'subtitle' => 'If a testimonial has no thumbnail associated with it, show this image',
      'desc'     => '83x83 PNG or JPEG recommended',
      'type'     => 'media',
      'width'    => 83,
      'height'   => 83,
    ),
  ),
);

global $ReduxFramework;
$ReduxFramework = new ReduxFramework($sections, $args);

// Hide demo mode link on plugins page
function ih_remove_redux_demo_link() {
  if (class_exists('ReduxFrameworkPlugin')) {
    remove_action('admin_notices', array( ReduxFrameworkPlugin::get_instance(), 'admin_notices' ));
    remove_filter('plugin_row_meta', array( ReduxFrameworkPlugin::get_instance(), 'plugin_meta_demo_mode_link'), null, 2);
  }
}
//add_action('init', 'ih_remove_redux_demo_link');
?>
