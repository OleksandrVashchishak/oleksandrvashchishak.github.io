<?php
require_once("assets/inc/bootstrap-menu.php");


add_action( 'wp_enqueue_scripts', 'alliance_style' );
function alliance_style() {
  wp_register_style( 'style', get_template_directory_uri() . '/assets/css/style.css' );
  wp_enqueue_style( 'style' );
}

add_action( 'wp_enqueue_scripts', 'alliance_scripts' );
function alliance_scripts() {
wp_enqueue_script( 'main-script', get_template_directory_uri() . '/assets/js/main.js', '', '', true );
}


add_theme_support( 'custom-logo' );

add_filter('show_admin_bar', '__return_false');

add_theme_support( 'menus' );
register_nav_menus(array(
  'top'    => 'Header menu',  
  'CONSULTING_SERVICES'                 => 'CONSULTING SERVICES',  
  'PROCUREMENT_ADVICE'                  => 'PROCUREMENT ADVICE',
  'CLOUD_SERVICES'                      => 'CLOUD SERVICES',
  'CLOUD_MONITORING_AND_MANAGEMENT'     => 'CLOUD MONITORING AND MANAGEMENT',
  'HOSTING_AND_CONNECTIVITY'            => 'HOSTING AND CONNECTIVITY',

));


add_action( 'after_setup_theme', 'theme_register_nav_menu' );
function theme_register_nav_menu() {
    add_theme_support( 'post-thumbnails', array( 'post' ) );
    // add_image_size( 'mytheme-mini', 200, 200, true );  
}


add_action('customize_register', 'dco_customize_register');
function dco_customize_register($wp_customize) {
    $wp_customize->add_section('footer', array(
        'title' => 'Footer text',
        'priority' => 1, 
    ));
    
    $setting_name = 'first-column-footer';
    $wp_customize->add_setting($setting_name, array(
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport' => 'postMessage'
    ));
     
    $wp_customize->add_control($setting_name, array(
        'section' => 'footer',
        'type' => 'text',
        'label' => 'Title first column',
    ));
  }

add_action('customize_register', 'dco_customize_register_tc');
function dco_customize_register_tc($wp_customize) {
    $setting_name = 'two-column-footer';
    $wp_customize->add_setting($setting_name, array(
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control($setting_name, array(
        'section' => 'footer',
        'type' => 'text',
        'label' => 'Title two column',
    ));
}

add_action('customize_register', 'dco_customize_register_fr_tc');
function dco_customize_register_fr_tc($wp_customize) {
    $setting_name = 'two-column-footer-fr';
    $wp_customize->add_setting($setting_name, array(
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control($setting_name, array(
        'section' => 'footer',
        'type' => 'text',
        'label' => 'First row in two column',
    ));
}

add_action('customize_register', 'dco_customize_register_tr_tc');
function dco_customize_register_tr_tc($wp_customize) {
    $setting_name = 'two-column-footer-tr';
    $wp_customize->add_setting($setting_name, array(
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control($setting_name, array(
        'section' => 'footer',
        'type' => 'text',
        'label' => 'Two row in two column',
    ));
}

add_action('customize_register', 'dco_customize_register_three');
function dco_customize_register_three($wp_customize) {
    $setting_name = 'three-column-footer';
    $wp_customize->add_setting($setting_name, array(
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control($setting_name, array(
        'section' => 'footer',
        'type' => 'text',
        'label' => 'Title three column',
    ));
}

add_action('customize_register', 'dco_customize_register_btn');
function dco_customize_register_btn($wp_customize) {
    $setting_name = 'btn-in-footer';
    $wp_customize->add_setting($setting_name, array(
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control($setting_name, array(
        'section' => 'footer',
        'type' => 'text',
        'label' => 'Button text in footer',
    ));
}

add_action('customize_register', 'dco_customize_register_btn_link');
function dco_customize_register_btn_link($wp_customize) {
    $setting_name = 'btn-in-footer_link';
    $wp_customize->add_setting($setting_name, array(
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control($setting_name, array(
        'section' => 'footer',
        'type' => 'text',
        'label' => 'Button link in footer',
    ));
}

add_action('customize_register', 'dco_customize_register_bottom_f');
function dco_customize_register_bottom_f($wp_customize) {
    $setting_name = 'footer-info-1';
    $wp_customize->add_setting($setting_name, array(
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control($setting_name, array(
        'section' => 'footer',
        'type' => 'text',
        'label' => 'Copyright',
    ));
}
add_action('customize_register', 'dco_customize_register_bottom_t');
function dco_customize_register_bottom_t($wp_customize) {
    $setting_name = 'footer-info-2';
    $wp_customize->add_setting($setting_name, array(
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control($setting_name, array(
        'section' => 'footer',
        'type' => 'text',
        'label' => 'Terms & Conditions',
    ));
}

add_action('customize_register', 'dco_customize_register_bottom_t_link');
function dco_customize_register_bottom_t_link($wp_customize) {
    $setting_name = 'footer-info-2-l';
    $wp_customize->add_setting($setting_name, array(
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control($setting_name, array(
        'section' => 'footer',
        'type' => 'text',
        'label' => 'Link Terms & Conditions',
    ));
}
add_action('customize_register', 'dco_customize_register_bottom_th');
function dco_customize_register_bottom_th($wp_customize) {
    $setting_name = 'footer-info-3';
    $wp_customize->add_setting($setting_name, array(
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control($setting_name, array(
        'section' => 'footer',
        'type' => 'text',
        'label' => 'Privacy Policy',
    ));
}
 
add_action('customize_register', 'dco_customize_register_bottom_th_link');
function dco_customize_register_bottom_th_link($wp_customize) {
    $setting_name = 'footer-info-3-l';
    $wp_customize->add_setting($setting_name, array(
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control($setting_name, array(
        'section' => 'footer',
        'type' => 'text',
        'label' => 'Link Privacy Policy',
    ));
}



add_action('customize_register', 'dco_customize_register_fr');
function dco_customize_register_fr ($wp_customize) {

  $wp_customize->add_section('footer-header', array(
    'title' => 'Text for menu title',
    'priority' => 1, 
));
    $setting_name = 'fr-in-fc';
    $wp_customize->add_setting($setting_name, array(
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control($setting_name, array(
        'section' => 'footer-header',
        'type' => 'text',
        'label' => 'Text for dropdown item',
    ));
}



add_action('customize_register', 'dco_customize_register_fr_1');
function dco_customize_register_fr_1 ($wp_customize) {

    $setting_name = 'title-menu-1';
    $wp_customize->add_setting($setting_name, array(
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control($setting_name, array(
        'section' => 'footer-header',
        'type' => 'text',
        'label' => 'First title menu',
    ));
}

add_action('customize_register', 'dco_customize_register_fr_2');
function dco_customize_register_fr_2 ($wp_customize) {

    $setting_name = 'title-menu-2';
    $wp_customize->add_setting($setting_name, array(
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control($setting_name, array(
        'section' => 'footer-header',
        'type' => 'text',
        'label' => 'Two title menu',
    ));
}

add_action('customize_register', 'dco_customize_register_fr_3');
function dco_customize_register_fr_3 ($wp_customize) {

    $setting_name = 'title-menu-3';
    $wp_customize->add_setting($setting_name, array(
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control($setting_name, array(
        'section' => 'footer-header',
        'type' => 'text',
        'label' => 'Three title menu',
    ));
}

add_action('customize_register', 'dco_customize_register_fr_4');
function dco_customize_register_fr_4 ($wp_customize) {

    $setting_name = 'title-menu-4';
    $wp_customize->add_setting($setting_name, array(
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control($setting_name, array(
        'section' => 'footer-header',
        'type' => 'text',
        'label' => 'Four title menu',
    ));
}

add_action('customize_register', 'dco_customize_register_fr_5');
function dco_customize_register_fr_5 ($wp_customize) {

    $setting_name = 'title-menu-5';
    $wp_customize->add_setting($setting_name, array(
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control($setting_name, array(
        'section' => 'footer-header',
        'type' => 'text',
        'label' => 'Five title menu',
    ));
}


if( function_exists('acf_add_options_page') ) {

  acf_add_options_page(array(
    'page_title' 	=> 'Single pages',
    'menu_title'	=> 'Single pages',
    'menu_slug' 	=> 'theme-general-settings',
    'capability'	=> 'edit_posts',
    'redirect'		=> false
  ));

}




function posts_filters(){
  $args = array(
   'orderby' => 'date',
   'order' => $_POST['date'],
   's'    =>  $_POST['s'],
   'category_name' => $_POST['sa'],
   'cat' => $_POST['cat'],
   'posts_per_page'    => 9999,
  'post_type' => 'post'
  );
 
  if( isset( $_POST['categoryfilter'] ) )
   $args['tax_query'] = array(
   array(
    'taxonomy' => 'category',
    'field' => 'id',
    'terms' => $_POST['categoryfilter']
   )
  );
 
  $query = new WP_Query( $args );
 
  if( $query->have_posts() ) :
    echo   '<div  class="news__block-container page">';
   while( $query->have_posts() ): $query->the_post();
   

     echo   '<div data-num=1 class="news__item our-news num"">'; 
     echo   '<div class="vacancies-container-function">'; 
     echo '<a href="' . get_permalink( $query->post->ID ) . '">' . get_the_post_thumbnail( get_the_ID($query->post->ID), 'post_827x620', array( 'class' => 'news__item-img', ), $query->post->ID) . '</a>';
     echo '<div class="tag-in-container">'; 
      the_category();  
     echo '</div>';
     echo '<a href="' . get_permalink( $query->post->ID ) . '"><p class="news__item-title">' . $query->post->post_title . '</a></p>';
   
     echo '<div class="news__data-container ajax-data-cont">';
     echo  '<div class="news__data">' ;
      the_time( 'F jS, Y', $query->post->ID) ;
      echo   '</div>';
     echo '<div class="news__read">';
      the_field('news-read') ;
      echo '</div>';
     echo  '</div>';
 echo   '</div>';
 echo   '</div>';

   endwhile;
   echo   '</div>';
   
  wp_reset_postdata();
   
  else :
    echo 'Post not found';
  endif;
 
  die();
 }
 add_action('wp_ajax_customfilter', 'posts_filters');
 add_action('wp_ajax_nopriv_customfilter', 'posts_filters');


 remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
 remove_action( 'wp_print_styles', 'print_emoji_styles' );

 function remove_comment_reply_script () {
  wp_deregister_script ('comment-reply');
  }
  add_action ('init', 'remove_comment_reply_script');

?>