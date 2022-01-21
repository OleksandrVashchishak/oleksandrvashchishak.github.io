<?php

/**
 * Cyborg Legends functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Cyborg_Legends
 */

session_start();

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
} 

if (!function_exists('legends_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function legends_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Cyborg Legends, use a find and replace
		 * to change 'legends' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('legends', get_template_directory() . '/languages');

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
				'primary-menu' => esc_html__('Primary', 'legends'),
				'footer-left' => esc_html__('Footer Left', 'legends'),
				'footer-right' => esc_html__('Footer Right', 'legends'),
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
				'legends_custom_background_args',
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
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action('after_setup_theme', 'legends_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function legends_content_width()
{
	$GLOBALS['content_width'] = apply_filters('legends_content_width', 640);
}
add_action('after_setup_theme', 'legends_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function legends_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'legends'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'legends'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__('ethpress', 'legends'),
			'id'            => 'ethpress',
			'description'   => esc_html__('Add widgets here.', 'legends'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'legends_widgets_init');





/**
 * Enqueue scripts and styles.
 */
function legends_scripts() {
	wp_enqueue_style('legends-style', get_stylesheet_uri(), array(), null);
	wp_enqueue_style('icons', get_template_directory_uri() . '/assets/css/icons.css');
	wp_enqueue_style('slick_theme', get_template_directory_uri() . '/assets/js/libs/slick/slick-theme.css');
	wp_enqueue_style('slick', get_template_directory_uri() . '/assets/js/libs/slick/slick.css');
	wp_enqueue_style('animate', get_template_directory_uri() . '/assets/css/libs/animate.css');
  
  //Store styles & scripts
  if ( is_page_template('store-template.php') ) {
    wp_enqueue_style('store-css', get_template_directory_uri() . '/custom/store/assets/css/store.css');
    wp_enqueue_script('store-js', get_template_directory_uri() . '/custom/store/assets/js/store.js', array('jquery'), null, true);
  }

	wp_enqueue_script('wow', get_template_directory_uri() . '/assets/js/libs/wow.min.js', array('jquery'), null, true);
	wp_enqueue_script('slick', get_template_directory_uri() . '/assets/js/libs/slick/slick.min.js', array('jquery'), null, true);
	wp_enqueue_script('main_js', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), null, true);
  wp_enqueue_script('metamask_js', get_template_directory_uri() . '/assets/js/metamask.js', array('jquery'), null, true);
  
  if ( is_front_page() ) {
	  wp_enqueue_script('main3-script',  'https://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.0/TweenMax.min.js', '', '', true);
	  wp_enqueue_script('main4-script',  'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.2/ScrollMagic.min.js', '', '', true);
    wp_enqueue_script('main5-script',  'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.2/plugins/animation.gsap.js', '', '', true);
  }
}
add_action('wp_enqueue_scripts', 'legends_scripts');

//Disable jquery migrate script
function legends_remove_jquery_migrate(&$scripts)
{
	if (!is_admin()) {
		$scripts->remove('jquery');
		$scripts->add('jquery', false, array('jquery-core'), '1.12.4');
	}
}
add_filter('wp_default_scripts', 'legends_remove_jquery_migrate');




add_action('init', 'register_character_post_type');
function register_character_post_type()
{

	// Character cat taxonomy
	register_taxonomy('charcat', ['character'], [
		'label'                 => 'Character Categories',
		'labels'                => array(
			'name'              => 'Character Categories',
			'singular_name'     => 'Character Category',
			'search_items'      => 'Search Character Category',
			'all_items'         => 'All Character Categories',
			'parent_item'       => 'Parent Character Categories',
			'parent_item_colon' => 'Parent Character Category:',
			'edit_item'         => 'Edit Character Category',
			'update_item'       => 'Update Character Category',
			'add_new_item'      => 'Add Character Category',
			'new_item_name'     => 'New Character Category',
			'menu_name'         => 'Character Categories',
		),
		'description'           => 'Character Categories',
		'public'                => true,
		'show_in_nav_menus'     => false,
		'show_ui'               => true,
		'show_tagcloud'         => false,
		'hierarchical'          => true,
		'rewrite'               => array('slug' => 'character', 'hierarchical' => false, 'with_front' => false, 'feed' => false),
		'show_admin_column'     => true,
	]);

	//Character post type
	register_post_type('character', [
		'label'               => 'Characters',
		'labels'              => array(
			'name'          => 'Characters',
			'singular_name' => 'Character',
			'menu_name'     => 'Characters',
			'all_items'     => 'All Characters',
			'add_new'       => 'Add Character',
			'add_new_item'  => 'Add New Character',
			'edit'          => 'Edit Character',
			'edit_item'     => 'Edit Character',
			'new_item'      => 'New Character',
		),
		'description'         => '',
		'public'              => true,
		'publicly_queryable'  => true,
		'show_ui'             => true,
		'show_in_rest'        => false,
		'rest_base'           => '',
		'show_in_menu'        => true,
		'exclude_from_search' => false,
		'capability_type'     => 'post',
		'map_meta_cap'        => true,
		'hierarchical'        => false,
		'rewrite'             => array('slug' => 'character/%charactercat%', 'with_front' => false, 'pages' => false, 'feeds' => false, 'feed' => false),
		'has_archive'         => 'character',
		'query_var'           => true,
		'supports'            => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'page-attributes', 'gallery'),
		'taxonomies'          => array('charactercat'),
	]);
}

add_filter('post_type_link', 'character_permalink', 1, 2);
function character_permalink($permalink, $post)
{

	if (strpos($permalink, '%charactercat%') === false)
		return $permalink;

	$terms = get_the_terms($post, 'charactercat');
	if (!is_wp_error($terms) && !empty($terms) && is_object($terms[0]))
		$term_slug = array_pop($terms)->slug;
	else
		$term_slug = 'no-charactercat';

	return str_replace('%charactercat%', $term_slug, $permalink);
}


add_filter('wpex_gallery_metabox_post_types', function ($types) {
	$types[] = 'character';
	return $types;
});

/* Disable WordPress Admin Bar for all users */
add_filter('show_admin_bar', '__return_false');

// start add option page acf
if (function_exists('acf_add_options_page')) {
	acf_add_options_page('Theme Settings');
}
// end add option page acf

/**
 * Comment Form Placeholder Author, Email, URL
 */
function placeholder_author_email_url_form_fields($fields)
{
	$replace_author = __('Your Name', 'legends');
	$replace_email = __('Your Email', 'legends');
	$replace_url = __('Your Website', 'legends');

	$fields['author'] = '<div class="comment-form-author">' . '<label for="author">' . __('Name', 'legends') . '</label> ' . ($req ? '<span class="required">*</span>' : '') .
		'<input id="author" name="author" class="form-control" type="text" placeholder="' . $replace_author . '" value="' . esc_attr($commenter['comment_author']) . '" size="20"' . $aria_req . ' /></div>';

	$fields['email'] = '<div class="comment-form-email"><label for="email">' . __('Email', 'legends') . '</label> ' .
		($req ? '<span class="required">*</span>' : '') .
		'<input id="email" name="email" class="form-control" type="text" placeholder="' . $replace_email . '" value="' . esc_attr($commenter['comment_author_email']) .
		'" size="30"' . $aria_req . ' /></div>';

	$fields['url'] = '<div class="comment-form-url"><label for="url">' . __('Website', 'legends') . '</label>' .
		'<input id="url" name="url" type="text" class="form-control"  placeholder="' . $replace_url . '" value="' . esc_attr($commenter['comment_author_url']) .
		'" size="30" /></div>';

	return $fields;
}
add_filter('comment_form_default_fields', 'placeholder_author_email_url_form_fields');

/**
 * Comment Form Placeholder Comment Field
 */
function placeholder_comment_form_field($fields)
{
	$replace_comment = __('Your Comment', 'legends');

	$fields['comment_field'] = '<p class="comment-form-comment"><label for="comment">' . _x('Comment', 'noun') .
		'</label><textarea id="comment" name="comment" class="form-control mb-20" cols="45" rows="8" placeholder="' . $replace_comment . '" aria-required="true"></textarea></p>';

	return $fields;
}
add_filter('comment_form_defaults', 'placeholder_comment_form_field');

/* Меняет текст чекбокса GDPR */
function comment_form_change_cookies_consent($fields)
{
	$commenter = wp_get_current_commenter();
	$consent   = empty($commenter['comment_author_email']) ? '' : ' checked="checked"';
	$fields['cookies'] = '<div class="comment-form-cookies-consent"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"' . $consent . ' />' .
		'<label for="wp-comment-cookies-consent">Save my name and email in this browser for future.</label></div>';
	return $fields;
}
add_filter('comment_form_default_fields', 'comment_form_change_cookies_consent');


add_filter('comment_form_default_fields', 'unset_url_field');
function unset_url_field($fields)
{
	if (isset($fields['url']))
		unset($fields['url']);
	return $fields;
}



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

//Disable updates some plugins
function legends_plugin_updates($value)
{
	unset($value->response['advanced-custom-fields-pro/acf.php']);
	return $value;
}
add_filter('site_transient_update_plugins', 'legends_plugin_updates');

//Disable comments for attachments
function filter_media_comment_status($open, $post_id)
{
	$post = get_post($post_id);
	if ($post->post_type == 'attachment') {
		return false;
	}
	return $open;
}
add_filter('comments_open', 'filter_media_comment_status', 10, 2);

//Disable author name in Discord
function disable_embeds_filter_oembed_response_data_($data)
{
	unset($data['author_url']);
	unset($data['author_name']);
	return $data;
}
add_filter('oembed_response_data', 'disable_embeds_filter_oembed_response_data_');



// start load more 
function load_posts()
{
	$args = unserialize(stripslashes($_POST['query']));
	$args['paged'] = $_POST['page'] + 1;

	$mypost_Query = new WP_Query($args);
	if ($mypost_Query->have_posts()) {

		while ($mypost_Query->have_posts()) {
			$mypost_Query->the_post();

			get_template_part('/template-parts/content');
		}
		wp_reset_postdata();
	}
	die;
}
add_action('wp_ajax_loadmore', 'load_posts');
add_action('wp_ajax_nopriv_loadmore', 'load_posts');
// end load more 




// start metamask get signature
function get_signature()
{
	$signer = $_POST['signer'];
	echo $signer;
	die;
}
add_action('wp_ajax_getsignature', 'get_signature');
add_action('wp_ajax_nopriv_getsignature', 'get_signature');
// end metamask get signature

//Add MetaMask functions
require get_template_directory() . '/custom/metamask/metamask-functions.php';

