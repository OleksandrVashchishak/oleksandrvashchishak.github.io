<?php
/**
 * Dspdmr functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Dspdmr
 */

if (!defined('_S_VERSION')) {
  // Replace the version number of the theme on each release.
  define('_S_VERSION', '1.0.0');
}

if (!function_exists('dspdmr_setup')):
  /**
   * Sets up theme defaults and registers support for various WordPress features.
   *
   * Note that this function is hooked into the after_setup_theme hook, which
   * runs before the init hook. The init hook is too late for some features, such
   * as indicating support for post thumbnails.
   */
  function dspdmr_setup() {
    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on Dspdmr, use a find and replace
     * to change 'dspdmr' to the name of your theme in all the template files.
     */
    load_theme_textdomain('dspdmr', get_template_directory() . '/languages');

    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support('title-tag');

    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus(
      array(
        'menu-header' => esc_html__('Header menu', 'dspdmr'),
        'menu-footer' => esc_html__('Footer menu', 'dspdmr'),
      )
    );

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support(
      'html5',
      array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
      )
    );

    // Set up the WordPress core custom background feature.
    add_theme_support(
      'custom-background',
      apply_filters(
        'dspdmr_custom_background_args',
        array(
          'default-color' => 'ffffff',
          'default-image' => '',
        )
      )
    );

    // Add theme support for selective refresh for widgets.
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Add support for core custom logo.
     *
     * @link https://codex.wordpress.org/Theme_Logo
     */
    add_theme_support(
      'custom-logo',
      array(
        'height' => 250,
        'width' => 250,
        'flex-width' => true,
        'flex-height' => true,
      )
    );
  }
endif;
add_action('after_setup_theme', 'dspdmr_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function dspdmr_content_width() {
  $GLOBALS['content_width'] = apply_filters('dspdmr_content_width', 640);
}
add_action('after_setup_theme', 'dspdmr_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function dspdmr_widgets_init() {
  register_sidebar(
    array(
      'name' => esc_html__('Sidebar', 'dspdmr'),
      'id' => 'sidebar-1',
      'description' => esc_html__('Add widgets here.', 'dspdmr'),
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget' => '</section>',
      'before_title' => '<h2 class="widget-title">',
      'after_title' => '</h2>',
    )
  );
}
add_action('widgets_init', 'dspdmr_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function dspdmr_scripts() {
  //Include styles
  wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/css/libs/all.min.css');
  //wp_enqueue_style( 'wow-css', get_template_directory_uri() . '/assets/css/libs/animate.css');
  wp_enqueue_style( 'magnific-css', get_template_directory_uri() . '/assets/css/libs/magnific-popup.css');
  wp_enqueue_style('custom-css', get_template_directory_uri() . '/assets/css/style.css');

  //Slick styles & scripts
  if (is_front_page() || get_field('slider_elem') || get_field('single_document') ) {
    wp_enqueue_style('slick-css', get_template_directory_uri() . '/assets/css/libs/slick.css');
    wp_enqueue_script('slick-js', get_stylesheet_directory_uri() . '/assets/js/libs/slick.min.js', array('jquery'), null, false);
  }

  //Include scripts
  //Header scripts
  //wp_enqueue_script( 'wow-js', get_template_directory_uri() . '/assets/js/libs/wow.min.js', array('jquery'), false );
  //wp_enqueue_script( 'jquery-ui', get_template_directory_uri() . '/assets/js/libs/jquery-ui.min.js', array('jquery'), null, false );

  //Footer scripts
  wp_enqueue_script( 'magnific-js', get_template_directory_uri() . '/assets/js/libs/jquery.magnific-popup.min.js', array('jquery'), true );
  wp_enqueue_script('scripts-js', get_template_directory_uri() . '/assets/js/scripts.js', array('jquery'), null, true);

  if (is_singular() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }
}
add_action('wp_enqueue_scripts', 'dspdmr_scripts');


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
  require get_template_directory() . '/inc/jetpack.php';
}

//Disable jquery migrate script
function dspdmr_remove_jquery_migrate(&$scripts) {
  if (!is_admin()) {
    $scripts->remove('jquery');
    $scripts->add('jquery', false, array('jquery-core'), '1.12.4');
  }
}
add_filter('wp_default_scripts', 'dspdmr_remove_jquery_migrate');

//Add current year shortcode
function dspdmr_year_shortcode() {
  $year = date_i18n('Y');
  return $year;
}
add_shortcode('current_year', 'dspdmr_year_shortcode');

//Register custom post types
function dspdmr_register_post_types() {
  //Services
  $labels = array(
    'name' => 'Услуги',
    'singular_name' => 'Услуга',
    'add_new' => 'Добавить новую',
    'add_new_item' => 'Добавить новую услугу',
    'edit_item' => 'Изменить',
    'new_item' => 'Новая услуга',
    'view_item' => 'Посмотреть',
    'search_items' => 'Искать',
    'not_found' => 'Не найдено',
    'not_found_in_trash' => 'Не найдено в корзине',
    'parent_item_colon' => 'Родительские услуги',
    'menu_name' => 'Услуги',
  );

  $args = array(
    'label' => 'services',
    'labels' => $labels,
    'public' => true,
    'hierarchical' => false,
    'show_ui' => true,
    'show_in_menu' => true,
    'show_in_nav_menus' => true,
    'show_in_admin_bar' => true,
    'has_archive' => true,
    'can_export' => true,
    'exclude_from_search' => false,
    'yarpp_support' => true,
    'publicly_queryable' => true,
    // 'show_in_rest'        => true,
    'menu_position' => 5,
    'capability_type' => 'post',
    'menu_icon' => 'dashicons-category',
    'taxonomies' => array('service-cat'),
    'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'revisions', 'page-attributes', 'custom-fields'),
  );
  register_post_type('services', $args);

}
add_action('init', 'dspdmr_register_post_types', 0);

//Register taxonomies for Cookbook post type
//Cate tax
function dspdmr_tax_service_cat() {
  $labels = array(
    'name' => _x('Категории', 'taxonomy general name'),
    'singular_name' => _x('Категория', 'taxonomy singular name'),
    'search_items' => __('Найти'),
    'all_items' => __('Все Категории'),
    'parent_item' => __('Родительская Категория'),
    'parent_item_colon' => __('Родительские Категории:'),
    'edit_item' => __('Изменить'),
    'update_item' => __('Обновить'),
    'add_new_item' => __('Добавить новую'),
    'new_item_name' => __('Новое имя для категории'),
    'menu_name' => __('Категории'),
  );

  register_taxonomy('service-cat', array('services'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'rozdil'),
  ));
}
add_action('init', 'dspdmr_tax_service_cat', 0);


//Add thumb for Services
if (function_exists('add_image_size')) {
  add_image_size('service-thumb-big', 1280, 500, true);
}


// Remove auto p from Contact Form 7 shortcode output
add_filter('wpcf7_autop_or_not', 'wpcf7_autop_return_false');
function wpcf7_autop_return_false() {
  return false;
}

//Add website options
if( function_exists('acf_add_options_page') ) {
  acf_add_options_page(array(
		'page_title' 	=> 'Настройки темы',
		'menu_title'	=> 'Настройки темы',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}

//Disable updates some plugins
function dspdmr_plugin_updates( $value ) {
  unset( $value->response['advanced-custom-fields-pro/acf.php'] );
  return $value;
}
add_filter( 'site_transient_update_plugins', 'dspdmr_plugin_updates' );

//Search form hook
add_filter( 'get_search_form', 'my_search_form' );
function my_search_form( $form ) {

	$form = '
	<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
		<label class="screen-reader-text" for="s">Запрос для поиска:</label>
		<input type="text" value="' . get_search_query() . '" name="s" id="s" />
		<input type="submit" id="searchsubmit" value="Найти" />
	</form>';

	return $form;
}


// For DEV
show_admin_bar(false);