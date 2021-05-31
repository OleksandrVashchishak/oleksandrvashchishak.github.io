<?php

// start include style
add_action('wp_enqueue_scripts', 'hf_style');
function hf_style()
{
  wp_enqueue_style('main-style', get_template_directory_uri() . '/css/style.min.css');
  wp_enqueue_style('addon-atyle', get_stylesheet_uri());
}
// end include style

// start include script
add_action('wp_enqueue_scripts', 'hf_scripts');
function hf_scripts()
{
  wp_enqueue_script('main-script1', 'https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js', '', '', true);
  wp_enqueue_script('main-script2', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.js', '', '', true);
  wp_enqueue_script('main-script', get_template_directory_uri() . '/js/main.js', '', '', true);
  wp_enqueue_script('plugin-script', get_template_directory_uri() . '/js/plugin-config.js', '', '', true);
}
// end include script

// start hide admin bar
add_filter('show_admin_bar', '__return_false');
// end hide admin bar

// start  menu
add_action('after_setup_theme', function () {
  register_nav_menus([
    'header_menu' => 'header menu'
  ]);
});
// end menu

// start add option page acf
if (function_exists('acf_add_options_page')) {
  acf_add_options_page('Theme Settings');
}
// end add option page acf


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

// start add clasic editor
add_filter('use_block_editor_for_post_type', '__return_false');
// end add clasic editor





///////////////////////////////////////////
// start add support woocommerce theme
require_once(dirname(__FILE__) . '/woocommerce-functions.php');
// end add support woocommerce theme
//////////////////////////////////////////



// start sort fo taxonomy page
function wp_sort()
{
  if ($_GET["sort"] != NULL) {
    $sort = $_GET["sort"];
  }
}
// end sort fo taxonomy page

// start sale percent
function my_sale_badge()
{
  global $product;
  if (!$product->is_on_sale()) {
    return;
  }
  if ($product->is_type('simple')) {
    $percentage = (($product->get_regular_price() - $product->get_sale_price()) / $product->get_regular_price()) * 100;
  } elseif ($product->is_type('variable')) {
    $percentage = 0;
    foreach ($product->get_children() as $variation_id) {
      $variation = wc_get_product($variation_id);
      if (!$variation->is_on_sale()) {
        continue;
      }
      $regular_price = $variation->get_regular_price();
      $sale_price = $variation->get_sale_price();
      $variation_percentage = ($regular_price - $sale_price) / $regular_price * 100;
      if ($variation_percentage > $percentage) {
        $percentage = $variation_percentage;
      }
    }
  }

  if ($percentage > 0) {
    echo '<span class="card-product__sale-percent">' . round($percentage) . '%</span>';
  }
}

add_filter('woocommerce_add_to_cart_fragments', 'header_add_to_cart_fragment', 30, 1);
function header_add_to_cart_fragment($fragments)
{
  global $woocommerce;
  ob_start();
?>
  <span class="header__cart-price">(<?php echo $woocommerce->cart->cart_contents_count; ?>)
    <?php echo $woocommerce->cart->get_cart_total(); ?></span>
<?php
  $fragments['span.header__cart-price'] = ob_get_clean();

  return $fragments;
}
// end sale percent


// start add ajax to mini cart
function mode_theme_update_mini_cart()
{
  echo wc_get_template('cart/mini-cart.php');
  die();
}
add_filter('wp_ajax_nopriv_mode_theme_update_mini_cart', 'mode_theme_update_mini_cart');
add_filter('wp_ajax_mode_theme_update_mini_cart', 'mode_theme_update_mini_cart');
// end add ajax to mini cart

// start translate to checkout btn
remove_action('woocommerce_proceed_to_checkout', 'woocommerce_button_proceed_to_checkout', 20);
add_action('woocommerce_proceed_to_checkout', 'translate_to_checkout', 20);
function translate_to_checkout()
{
?>
  <a href="<?php echo wc_get_checkout_url(); ?>" class="checkout-button button alt wc-forward"><?php _e('Proceed to Checkout', 'woocommerce'); ?></a>
<?php
}
// end translate to checkout btn

// start translate to cart btn from mini cart
remove_action('woocommerce_widget_shopping_cart_buttons', 'woocommerce_widget_shopping_cart_button_view_cart', 10);
remove_action('woocommerce_widget_shopping_cart_buttons', 'woocommerce_widget_shopping_cart_proceed_to_checkout', 20);
add_action('woocommerce_widget_shopping_cart_buttons', 'translate_to_cart', 10);
function translate_to_cart()
{
?>
  <a href="<?php echo wc_get_cart_url(); ?>" class="button wc-forward"><?php _e('View cart_mini', 'woocommerce'); ?></a>
<?php
}
// end translate to cart btn from mini cart


// start translate checkout fields
add_filter('woocommerce_checkout_fields', 'override_billing_checkout_fields', 20, 1);
function override_billing_checkout_fields($fields)
{
  if (ICL_LANGUAGE_CODE == 'fin') {
    $fields['billing']['billing_first_name']['placeholder'] = 'Etunimi *';
    $fields['billing']['billing_last_name']['placeholder'] = 'Sukunimi *';
    $fields['billing']['billing_company']['placeholder'] = 'Yrityksen nimi (vapaaehtoinen)';
    $fields['billing']['billing_postcode']['placeholder'] = 'Postinumero / postinumero *';
    $fields['billing']['billing_phone']['placeholder'] = 'Puhelinnumero';
    $fields['billing']['billing_city']['placeholder'] = 'Kaupunki kaupunki *';
    $fields['billing']['billing_address_1']['placeholder'] = 'Talon numero ja kadun nimi';
    $fields['billing']['billing_address_1']['label'] = 'Katuosoite';
    $fields['billing']['billing_address_2']['placeholder'] = 'Huoneisto, sviitti, yksikkö jne.';
    $fields['billing']['billing_email']['placeholder'] = 'Sähköpostiosoite *';
  } elseif (ICL_LANGUAGE_CODE == 'swe') {
    $fields['billing']['billing_first_name']['placeholder'] = 'Förnamn *';
    $fields['billing']['billing_last_name']['placeholder'] = 'Efternamn *';
    $fields['billing']['billing_company']['placeholder'] = 'Företagsnamn (frivilligt)';
    $fields['billing']['billing_postcode']['placeholder'] = 'Postnummer / Zip *';
    $fields['billing']['billing_phone']['placeholder'] = 'Telefonnummer';
    $fields['billing']['billing_city']['placeholder'] = 'Stad / stad *';
    $fields['billing']['billing_address_1']['placeholder'] = 'Husnummer och gatunamn';
    $fields['billing']['billing_address_1']['label'] = 'Gatuadress';
    $fields['billing']['billing_address_2']['placeholder'] = 'Lägenhet, svit, enhet etc.';
    $fields['billing']['billing_email']['placeholder'] = 'E-postadress *';
  }
  return $fields;
}
// end translate checkout fields




