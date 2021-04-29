<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

add_action( 'wp_enqueue_scripts', 'nes_scripts' );
function nes_scripts() {
	wp_enqueue_style('nes-style', get_template_directory_uri() . '/assets/css/style.css');
    wp_enqueue_style('theme', get_stylesheet_uri());

}

add_action( 'wp_enqueue_scripts', 'nes_styles' );
function nes_styles() {
 
	wp_enqueue_script('jquery-nes', get_template_directory_uri() . '/assets/js/jquery-3.5.1.min.js');
	wp_enqueue_script('cookie-nes', get_template_directory_uri() . '/assets/js/jquery.cookie.min.js');
	wp_enqueue_script('slick-nes', get_template_directory_uri() . '/assets/js/slick.min.js');
	wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/main.js');
	 
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
