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

?>
