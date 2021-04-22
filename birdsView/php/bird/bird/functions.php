<?php

// start include style
add_action( 'wp_enqueue_scripts', 'bird_style' );
function bird_style() {
    wp_enqueue_style( 'main-style', get_template_directory_uri() . '/css/style.min.css' );
    wp_enqueue_style( 'addon-atyle', get_stylesheet_uri() );
    wp_enqueue_style( 'font',  'https://fonts.googleapis.com/css2?family=PT+Serif:wght@400;700&display=swap' );
    wp_enqueue_style( 'slick-style',  'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.css' );
    wp_enqueue_style( 'aos-lib',  'https://unpkg.com/aos@2.3.1/dist/aos.css' );
}
// end include style


// start include script
add_action( 'wp_enqueue_scripts', 'bird_scripts' );
function bird_scripts() {
wp_enqueue_script( 'main1-script',  'https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js', '', '', true );
wp_enqueue_script( 'main2-script',  'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.js', '', '', true );
wp_enqueue_script( 'main3-script',  'https://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.0/TweenMax.min.js', '', '', true );
wp_enqueue_script( 'main4-script',  'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.2/ScrollMagic.min.js', '', '', true );
wp_enqueue_script( 'main5-script',  'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.2/plugins/animation.gsap.js', '', '', true );
wp_enqueue_script( 'main6-script',  'https://unpkg.com/aos@2.3.1/dist/aos.js', '', '', true );
wp_enqueue_script( 'main-script', get_template_directory_uri() . '/js/main.js', '', '', true );
wp_enqueue_script( 'plugin-script', get_template_directory_uri() . '/js/plugins-config.js', '', '', true );
}
// end include script

// start add custom logo
add_theme_support( 'custom-logo' );
// end add custom logo

// start hide admin bar
show_admin_bar(false);
add_filter('show_admin_bar', '__return_false');
// end hide admin bar


// start register menu
add_action( 'after_setup_theme', 'theme_register_nav_menu' );
function theme_register_nav_menu() {
	register_nav_menu( 'header_menu', 'header menu' );
}

add_action( 'after_setup_theme', 'theme_register_nav_menu_lang' );
function theme_register_nav_menu_lang() {
	register_nav_menu( 'language_menu', 'language menu' );
}
// end register menu

// start register thumbnails
add_action( 'after_setup_theme', 'theme_register_thumbnails' );
function theme_register_thumbnails() {
    add_theme_support( 'post-thumbnails', array( 'post' ) );
}
// end register thumbnails

// start add option page acf
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page('Theme Settings');
}
// end add option page acf

// start add clasic editor
add_filter( 'use_block_editor_for_post_type', '__return_false' );
// end add clasic editor



if(function_exists('A2A_SHARE_SAVE_add_to_content')){
  remove_filter( 'the_content', 'A2A_SHARE_SAVE_add_to_content', 98 );
  remove_action( 'pre_get_posts', 'A2A_SHARE_SAVE_pre_get_posts' );
  add_action('nc_share_post', function() {
    echo do_shortcode('[addtoany]');
  });
  
}