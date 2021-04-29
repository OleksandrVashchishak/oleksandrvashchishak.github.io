<?php

// start include style
add_action('wp_enqueue_scripts', 'bird_style');
function bird_style()
{
  wp_enqueue_style('main-style1', get_template_directory_uri() . '/css/bootstrap-grid.min.css');
  wp_enqueue_style('main-style2', get_template_directory_uri() . '/css/jquery.fancybox.min.css');
  wp_enqueue_style('main-style3', get_template_directory_uri() . '/css/style.min.css');
  wp_enqueue_style('addon-atyle', get_stylesheet_uri());
}
// end include style


// start include script
add_action('wp_enqueue_scripts', 'bird_scripts');
function bird_scripts()
{
  wp_enqueue_script('jquery-main', get_template_directory_uri() . '/js/jquery.js', '', '', true);
  wp_enqueue_script('slick', get_template_directory_uri() . '/js/slick.min.js', '', '', true);
  wp_enqueue_script('fancybox-main', get_template_directory_uri() . '/js/jquery.fancybox.min.js', '', '', true);
  wp_enqueue_script('main-script', get_template_directory_uri() . '/js/main.js', '', '', true);
  wp_enqueue_script('plugin-script', get_template_directory_uri() . '/js/plugins-config.js', '', '', true);
}
// end include script

// start add custom logo
add_theme_support('custom-logo');
// end add custom logo

// start hide admin bar
show_admin_bar(false);
add_filter('show_admin_bar', '__return_false');
// end hide admin bar


// start register menu

add_action('after_setup_theme', 'theme_register_nav_menu');
function theme_register_nav_menu()
{
  register_nav_menu('header_menu', 'header menu');
}
// end register menu


// start remove menu in admin panel
add_action('admin_menu', 'remove_admin_menu');
function remove_admin_menu()
{
  remove_menu_page('tools.php');
  remove_menu_page('users.php');
  remove_menu_page('edit.php');
  remove_menu_page('edit-comments.php');
}
// end remove menu in admin panel

// start add option page acf

if (function_exists('acf_add_options_page')) {
  acf_add_options_page('Theme Settings');
}

// end add option page acf