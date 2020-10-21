<?php

// Підключення стилів
add_action( 'wp_enqueue_scripts', 'timber_style' );
function timber_style() {
    wp_enqueue_style( 'magnific-style', get_template_directory_uri() . '/assets/css/magnific-popup.css' );
    wp_enqueue_style( 'main-atyle', get_stylesheet_uri() );
}


// add_action( 'wp_enqueue_scripts', 'timber_scripts' );
// Підключення скриптів
// function timber_scripts() {
// 	wp_deregister_script( 'jquery' );
// 	wp_register_script( 'jquery', 'https://code.jquery.com/jquery-3.5.1.min.js"
//     integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
//     crossorigin="anonymous' );
//     wp_enqueue_script( 'jquery' );

//     wp_enqueue_script( 'magnific-script', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.min.js',
// array(jquery), null, true );

// wp_enqueue_script( 'main-script', get_template_directory_uri() . '/assets/js/main.js',
// array(jquery), null, true );
// }    

// Добавити кастомне лого
add_theme_support( 'custom-logo' );

// заховати панель
add_filter('show_admin_bar', '__return_false');

// кастомайзер, для інфи в футері, або хедері
  function dco_customize_register($wp_customize) {
      $wp_customize->add_section('footer', array(
          'title' => 'Подвал',
          'priority' => 11, 
      ));
      $setting_name = 'footer_text';
      $wp_customize->add_setting($setting_name, array(
          'sanitize_callback' => 'sanitize_textarea_field',
          'transport' => 'postMessage'
      ));
      $wp_customize->add_control($setting_name, array(
          'section' => 'footer',
          'type' => 'text',
          'label' => 'Текст в подвале',
      ));
  }
// Функція кастомайзера, яку потрібно вставити в код, в то місце, де має вивестись інформація
//   <?php echo nl2br(esc_html(get_theme_mod('footer_text'))); ?>


// функція для виведення мінюатур постів
add_action( 'after_setup_theme', 'theme_register_nav_menu' );
function theme_register_nav_menu() {
    add_theme_support( 'post-thumbnails', array( 'post' ) );
    // add_image_size( 'mytheme-mini', 200, 200, true );  
}

?>
