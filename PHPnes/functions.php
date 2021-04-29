<?php

/**
 * nes functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package nes
 */

if (!defined('_S_VERSION')) {
  // Replace the version number of the theme on each release.
  define('_S_VERSION', '1.0.0');
}

/**
 * Enqueue scripts and styles.
 */
require get_template_directory() . '/includes/enqueue-script-style.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/includes/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/includes/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/includes/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/includes/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
  require get_template_directory() . '/includes/jetpack.php';
}

/**
 * Theme settings.
 */
require get_template_directory() . '/includes/theme-settings.php';

/**
 * Widjet additions.
 */
require get_template_directory() . '/includes/widget-areas.php';

/**
 *  Helpers
 */
require get_template_directory() . '/includes/helpers.php';

/**
 *  Breadcrumbs
 */
require get_template_directory() . '/includes/breadcrumbs.php';


/**
 * Load WooCommerce compatibility file.
 */
if (class_exists('WooCommerce')) {
  require get_template_directory() . '/includes/woocommerce.php';
  require get_template_directory() . '/woocommerce/includes/wc-functions-cart.php';
  require get_template_directory() . '/woocommerce/includes/wc-functions-compare.php';
}

/* woocommerce support */

add_action('after_setup_theme', 'woocommerce_support');
function woocommerce_support()
{
  add_theme_support('woocommerce');
}

add_action('after_setup_theme', 'yourtheme_setup');

function yourtheme_setup()
{
  add_theme_support('wc-product-gallery-zoom');
  add_theme_support('wc-product-gallery-lightbox');
  add_theme_support('wc-product-gallery-slider');
}

add_theme_support('wc-product-gallery-lightbox');


/* Register menu */

register_nav_menus(array(
  'top_menu' => 'main'
));

add_action('after_setup_theme', function () {
  register_nav_menu('footer', 'menu footer');
});

/***  Post Project  ****/
function nes_create_post_type()
{

  if (ICL_LANGUAGE_CODE == 'uk') {
    register_post_type('project', [
      'label' => 'wqeqweqwe',
      'labels' => [
        'name'               => __('Проєктzи1'),
        'post_type'          => 'project',
        'singular_name'      => __('Проєкт1uk'),
        'add_new'            => __('Додати проєкт1'),
        'add_new_item'       => __('Додавання проєкту1'),
        'edit_item'          => __('Редагування проєкту'),
        'new_item'           => __('Новий проєкт1'),
        'view_item'          => __('Дивитися проєкт1'),
        'search_items'       => __('Шукати проєкт1'),
        'not_found'          => __('Не знайдено1'),
        'not_found_in_trash' => __('Не знайдено в корзині1'),
        'parent_item_colon'  => '',
        'menu_name'          => __('Проєкти1'),

      ],
      'public'              => true,
      'hierarchical'      => true,
      'menu_icon'           => 'dashicons-info',
      'menu_position'       => 5,
      'supports'            => ['thumbnail', 'editor', 'custom-fields'],
      'taxonomies'          => array('project-category', 'post_tag'),
      'query_var'        =>  true,
      'has_archive'         => true
    ]);
  } elseif (ICL_LANGUAGE_CODE == 'ru') {
    register_post_type('project', [
      'label' => 'wqeqweqwe',
      'labels' => [
        'name'               => __('Проєктzи1'),
        'post_type'          => 'project',
        'singular_name'      => __('Проєкт2ru'),
        'add_new'            => __('Додати проєкт1'),
        'add_new_item'       => __('Додавання проєкту1'),
        'edit_item'          => __('Редагування проєкту'),
        'new_item'           => __('Новий проєкт1'),
        'view_item'          => __('Дивитися проєкт1'),
        'search_items'       => __('Шукати проєкт1'),
        'not_found'          => __('Не знайдено1'),
        'not_found_in_trash' => __('Не знайдено в корзині1'),
        'parent_item_colon'  => '',
        'menu_name'          => __('Проєкти1'),

      ],
      'public'              => true,
      'hierarchical'      => true,
      'menu_icon'           => 'dashicons-info',
      'menu_position'       => 5,
      'supports'            => ['thumbnail', 'editor', 'custom-fields'],
      'taxonomies'          => array('project-category', 'post_tag'),
      'query_var'        =>  true,
      'has_archive'         => true
    ]);
  }
}

add_action('init', 'nes_create_post_type');

function nes_theme_init()
{
  register_taxonomy(
    'project-category',
    'project',
    array(
      'label' => '',
      'labels' => array(
        'name'         => __('Категорії'),
        'singular_name'      => __('Категорія'),
        'add_new'            => __('Додати категорію'),
      ),
      'public' => true,
      'hierarchical' => true,
      'show_ui' => true,
      'query_var' => true,
      'rewrite' => array(
        'slug' => 'project-category',
        'parent_item_colon'  => '',
      ),
    )
  );
}

add_action('init', 'nes_theme_init');


add_action('after_setup_theme', function () {
  add_image_size('project-small', 547, 280, false);
  add_image_size('news-small', 547, 280, false);
});

/* compare */
function compare_add_button($args)
{

  $id      = get_the_ID();
  $id      = tm_wc_compare_wishlist()->get_original_product_id($id);
  $classes = array('button', 'tm-woocompare-button', 'btn', 'btn-default');
  $nonce   = wp_create_nonce('tm_woocompare' . $id);

  if (in_array($id, tm_woocompare_get_list())) {

    $text      = get_option('tm_woocompare_remove_text', __('Remove from Compare', 'tm-wc-compare-wishlist'));
    $classes[] = ' in_compare';
  } else {

    $text = get_option('tm_woocompare_compare_text', __('Add to Compare', 'tm-wc-compare-wishlist'));
  }
  $text      = '<span class="tm_woocompare_product_actions_tip"><span class="text">' . esc_html($text) . '</span></span>';
  $preloader = apply_filters('tm_wc_compare_wishlist_button_preloader', '');

  if ($single = (is_array($args) && isset($args['single']) && $args['single'])) {

    $classes[] = 'tm-woocompare-button-single';
  }
  $html = sprintf('<button type="button" class="%s" data-id="%s" data-nonce="%s">%s</button>', implode(' ', $classes), $id, $nonce, $text . $preloader);

  echo apply_filters('tm_woocompare_button', $html, $classes, $id, $nonce, $text, $preloader);

  if (in_array($id, tm_woocompare_get_list()) && $single) {

    echo tm_woocompare_page_button();
  }
}

/* Custom pages */

if (function_exists('acf_add_options_page')) {
  acf_add_options_page(array(
    'page_title'   => 'Single pages',
    'menu_title'  => 'Single pages',
    'menu_slug'   => 'theme-general-settings',
    'capability'  => 'edit_posts',
    'redirect'    => false
  ));
  return false;
}





function add_product_column($columns)
{
  //add column
  $columns['new_column'] = __('New column', 'woocommerce');

  return $columns;
}
add_filter('manage_edit-product_columns', 'add_product_column', 10, 1);

function add_product_column_content($column, $postid)
{
  if ($column == 'new_column') {

    // output variable
    $output = '';

    // Get product object
    $product = wc_get_product($postid);

    // Get Product Variations - WC_Product_Attribute Object
    $product_attributes = $product->get_attributes();

    // Not empty, contains values
    if (!empty($product_attributes)) {

      foreach ($product_attributes as $product_attribute) {
        // Get name
        $attribute_name = str_replace('pa_', '', $product_attribute->get_name());

        // Concatenate
        $output = $attribute_name . ' = ';

        // Get options
        $attribute_options = $product_attribute->get_options();

        // Not empty, contains values
        if (!empty($attribute_options)) {

          foreach ($attribute_options as $key => $attribute_option) {
            // WP_Term Object
            $term = get_term($attribute_option); // <-- your term ID

            // Not empty, contains values
            if (!empty($term)) {
              $term_name = $term->name;

              // Not empty
              if ($term_name != '') {

                // Last loop
                end($attribute_options);
                if ($key === key($attribute_options)) {
                  // Concatenate
                  $output .= $term_name;
                } else {
                  // Concatenate
                  $output .= $term_name . ', ';
                }
              }
            }
          }
        }

        echo $output . '<br>';
      }
    }
  }
}
add_action('manage_product_posts_custom_column', 'add_product_column_content', 10, 2);









/**
 * Display category image on category archive
 */
