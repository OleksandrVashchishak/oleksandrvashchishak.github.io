<?php

// start include style
add_action('wp_enqueue_scripts', 'hf_style');
function hf_style()
{
    wp_enqueue_style('gallery-style', get_template_directory_uri() . '/css/component.css');
    wp_enqueue_style('twenty-style', get_template_directory_uri() . '/css/twentytwenty.css');
    wp_enqueue_style('slick-style', get_template_directory_uri() . '/css/slick.css');
    wp_enqueue_style('main-style', get_template_directory_uri() . '/css/style.min.css');
    wp_enqueue_style('aos-style', 'https://unpkg.com/aos@2.3.1/dist/aos.css');
    wp_enqueue_style('addon-atyle', get_stylesheet_uri());
}
// end include style

// start include script
add_action('wp_enqueue_scripts', 'hf_scripts');
function hf_scripts()
{
    wp_enqueue_script('jquery-script', get_template_directory_uri() . '/js/jquery.js', '', '', true);
    wp_enqueue_script('anime-script', get_template_directory_uri() . '/js/anime.min.js', '', '', true);
    wp_enqueue_script('image-script', get_template_directory_uri() . '/js/imagesloaded.pkgd.min.js', '', '', true);
    wp_enqueue_script('slick-script', get_template_directory_uri() . '/js/slick.min.js', '', '', true);
    wp_enqueue_script('event-move-script', get_template_directory_uri() . '/js/jquery.event.move.js', '', '', true);
    wp_enqueue_script('twenty-script', get_template_directory_uri() . '/js/jquery.twentytwenty.js', '', '', true);
    wp_enqueue_script('aos-script', 'https://unpkg.com/aos@2.3.1/dist/aos.js', '', '', true);
    wp_enqueue_script('plugin-script', get_template_directory_uri() . '/js/plugin-config.js', '', '', true);
    wp_enqueue_script('main-script', get_template_directory_uri() . '/js/main.js', '', '', true);
}
// end include script
// start hide admin bar
add_filter('show_admin_bar', '__return_false');
// end hide admin bar

// start  menu
add_action('after_setup_theme', function () {
    register_nav_menus([
        'header_menu' => 'header menu',
        'footer_menu' => 'footer menu',
    ]);
});
// end menu


// add logo
add_theme_support('custom-logo');
// end logo

// start add option page acf
if (function_exists('acf_add_options_page')) {
  acf_add_options_page('Theme Settings');
}
// end add option page acf

// start add support thumbnils
add_theme_support( 'post-thumbnails' );
// end add support thumbnils