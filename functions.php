<?php

if (!defined('_S_VERSION')) {

  define('_S_VERSION', '1.0.0');
}

require_once __DIR__ . "/inc/theme-setup.php";

require_once __DIR__ . "/inc/ar-post-type.php";

require_once __DIR__ . "/inc/acf.php";

require_once __DIR__ . "/inc/theme-widgets.php";

require_once __DIR__ . "/inc/theme-styles.php";

require_once __DIR__ . "/inc/theme-scripts.php";


require get_template_directory() . '/inc/custom-header.php';

require get_template_directory() . '/inc/template-tags.php';

require get_template_directory() . '/inc/template-functions.php';

require get_template_directory() . '/inc/customizer.php';

if (defined('JETPACK__VERSION')) {
  require get_template_directory() . '/inc/jetpack.php';
}

function remove_pages_editor()
{
  $ids = [8, 140, 215];
  if (in_array(get_the_ID(), $ids)) {
    remove_post_type_support('page', 'editor');
  } // end if
} // end remove_pages_editor
add_action('add_meta_boxes', 'remove_pages_editor');

function vardump($var)
{
  echo '<pre>';
  var_dump($var);
  echo '</pre>';
}
