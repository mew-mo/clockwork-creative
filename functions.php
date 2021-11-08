<?php

// theme supports
// =========================================
add_theme_support('post-thumbnails');
add_theme_support('woocommerce');

// excerpt length
// =========================================
function new_excerpt_length() {
  return 20;
}
add_filter('excerpt_length', 'new_excerpt_length');

// importing stylesheet
// =========================================
function import_stylesheet() {
  wp_enqueue_style('custom-style', get_stylesheet_uri());
}

add_action('wp_enqueue_scripts', 'import_stylesheet');

// setting up / registering main nav
// =========================================
register_nav_menus(['primary' => 'Primary Top Navigation']);

?>
