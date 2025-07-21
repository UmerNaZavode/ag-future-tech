<?php

wp_enqueue_script('ag-future-tech-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);
wp_enqueue_script('ag-future-tech-main', get_template_directory_uri() . '/assets/js/main.js', array(), _S_VERSION, true);

if (is_singular() && comments_open() && get_option('thread_comments')) {
  wp_enqueue_script('comment-reply');
}

add_action('wp_enqueue_scripts', 'ag_future_tech_scripts');
