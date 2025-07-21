<?php

function ag_future_tech_scripts()
{
  wp_enqueue_style('ag-future-tech-style', get_stylesheet_uri(), array(), _S_VERSION);
  wp_enqueue_style('ag-future-tech-main', get_template_directory_uri() . '/assets/css/main.css', array(), _S_VERSION);
  wp_style_add_data('ag-future-tech-style', 'rtl', 'replace');
}
add_action('wp_enqueue_scripts', 'ag_future_tech_scripts');
