<?php
/**
 * Integrity House
 * Main Functions File
 */

// Auto-install recommended plugins
require_once "includes/tgm-plugin-activation/class-tgm-plugin-activation.php";

// Functions, customizations, etc.
include "includes/functions/utilities.php";
include "includes/functions/plugins.php";
include "includes/functions/taxonomies.php";
include "includes/functions/post-types.php";
include "includes/functions/excerpts.php";
include "includes/functions/image-sizes.php";
include "includes/functions/styles.php";
include "includes/functions/scripts.php";
include "includes/functions/nav-menus.php";
include "includes/functions/login.php";
include "includes/functions/widgets.php";
include "includes/functions/shortcodes.php";
include "includes/functions/ui-elements.php";
include "includes/functions/validation.php";


if (class_exists('ReduxFramework')) {
  include_once "includes/redux/config.php";
}

?>
