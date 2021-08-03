<?php
// start include style
add_action('wp_enqueue_scripts', 'hf_style');
function hf_style()
{
    wp_enqueue_style('slick-style', get_template_directory_uri() . '/css/slick.css');
    wp_enqueue_style('main-style', get_template_directory_uri() . '/css/style.min.css');
    wp_enqueue_style('addon-style', get_stylesheet_uri());
}
// end include style

// start include style in admin part
add_action('admin_enqueue_scripts', 'action_function_name_9843');
function action_function_name_9843()
{
    wp_enqueue_style('main-style', get_template_directory_uri() . '/css/style.min.css');
}
// end include style in admin part

// start include script
add_action('wp_enqueue_scripts', 'hf_scripts');
function hf_scripts()
{
    wp_enqueue_script('jquery-script', get_template_directory_uri() . '/js/jquery.js', '', '', true);
    wp_enqueue_script('slick-script', get_template_directory_uri() . '/js/slick.min.js', '', '', true);
    wp_enqueue_script('main-script', get_template_directory_uri() . '/js/main.js', '', '', true);
    wp_enqueue_script('plugin-script', get_template_directory_uri() . '/js/plugin-config.js', '', '', true);
}
// end include script

// start  menu
add_action('after_setup_theme', function () {
    register_nav_menus([
        'header_menu' => 'header menu',
        'footer_menu' => 'footer menu'
    ]);
});
// end menu

// start register thumbnails
add_action('after_setup_theme', 'theme_register_thumbnails');
function theme_register_thumbnails()
{
    add_theme_support('post-thumbnails', array('post'));
}
// end register thumbnails


// add logo
add_theme_support('custom-logo');
// end logo


// start hide admin bar -DEV-
add_filter('show_admin_bar', '__return_false');
//  end hide admin bar -DEV-

// start load more 
function load_posts()
{
    $args = unserialize(stripslashes($_POST['query']));
    $args['paged'] = $_POST['page'] + 1;

    $mypost_Query = new WP_Query($args);
    if ($mypost_Query->have_posts()) {

        while ($mypost_Query->have_posts()) {
            $mypost_Query->the_post();

            get_template_part('/template-parts/content/content');
        }
        wp_reset_postdata();
    }
    die;
}
add_action('wp_ajax_loadmore', 'load_posts');
add_action('wp_ajax_nopriv_loadmore', 'load_posts');
// end load more 



// start change search form for ajax
add_filter('get_search_form', 'ba_search_form');
function ba_search_form($form)
{
    $form = '
		<form role="search" method="get" id="searchform" action="' . home_url('/') . '" onsubmit="return false"  >
			<input type="text" value="' . get_search_query() . '" name="s" class="search-input" id="s" placeholder="Search" />
		</form>
		<div class="result-search">
        <div class="preloader"><img src="' . get_bloginfo('template_directory') . '/img/loader.gif" class="loader" /></div>
			<div class="result-search-list"></div>
		</div>
	';
    return $form;
    // <div class="preloader"><img src="' . get_bloginfo('template_directory') . '/img/loader.gif" class="loader" /></div>

}
// end change search form for ajax

// start ajax search
function ba_ajax_search()
{
    $args = array(
        's' => $_POST['term'],
        'post_type'         => 'post',
        'post_status' => 'publish',
        'orderby'     => 'date',
        'posts_per_page'    => -1,
    );
    $the_query = new WP_Query($args);
    if ($the_query->have_posts()) {
        while ($the_query->have_posts()) {
            $the_query->the_post();
            get_template_part('/template-parts/content/content-search-result');
        }
    } else {
?>
        <div class="result_item">
            <span class="not_found">No results were found, please try another request</span>
        </div>
<?php
    }
    exit;
}
add_action('wp_ajax_nopriv_ba_ajax_search', 'ba_ajax_search');
add_action('wp_ajax_ba_ajax_search', 'ba_ajax_search');
// end ajax search

// start include customizer function
require_once(dirname(__FILE__) . '/customizer-functions.php');
// end include customizer function