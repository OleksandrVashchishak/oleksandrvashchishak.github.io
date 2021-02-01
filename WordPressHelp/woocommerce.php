<?php 
// add support woocommerce theme
function mytheme_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );

// remove actions. Input number in end hooc
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );

// спочатку відключаю хук з дефолтими значеннями, а потім підключаю свій кастомний

remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
function my_custom_title(){
	echo '<h1>'.get_the_title().'</h1>';
}

add_action( 'woocommerce_shop_loop_item_title', 'my_custom_title', 10 );


// Шорткод, для того щоб вивести три останіх добавлених товари, будь-де
echo do_shortcode('[recent_products per_page="3"]');

// функція для зміни месседжа, що з"являється при добавленні товарів в корзину
add_filter( 'wc_add_to_cart_message_html', 'custom_add_to_cart_message_html', 10, 2 );
function custom_add_to_cart_message_html( $message, $products ) {
    $titles = array();
    $count  = 0;

    foreach ( $products as $product_id => $qty ) {
        $titles[] = ( $qty > 1 ? absint( $qty ) . ' &times; ' : '' ) . sprintf( _x( '&ldquo;%s&rdquo;', 'Item name in quotes', 'woocommerce' ), strip_tags( get_the_title( $product_id ) ) );
        $count += $qty;
    }

    $titles     = array_filter( $titles );
    $added_text = sprintf( _n( '%s added to cart.', '%s added to cart.', $count, 'woocommerce' ), wc_format_list_of_items( $titles ) );

    // The custom message is just below
    $added_text = sprintf( _n(" %s item  %s", "%s items  %s" , $count, "woocommerce" ),
        $count, __("added to cart.", "woocommerce") );

    // Output success messages
    if ( 'yes' === get_option( 'woocommerce_cart_redirect_after_add' ) ) {
        $return_to = apply_filters( 'woocommerce_continue_shopping_redirect', wc_get_raw_referer() ? wp_validate_redirect( wc_get_raw_referer(), false ) : wc_get_page_permalink( 'shop' ) );
        $message   = sprintf( '<a href="%s" class="button wc-forward">%s</a> %s', esc_url( $return_to ), esc_html__( 'Continue shopping', 'woocommerce' ), esc_html( $added_text ) );
    } else {
        $message   = sprintf( '<a href="%s" class="button wc-forward">%s</a> %s', esc_url( wc_get_page_permalink( 'cart' ) ), esc_html__( 'Go to cart', 'woocommerce' ), esc_html( $added_text ) );
    }
    return $message;
}

// видаляємо поля чекаута
add_filter( 'woocommerce_checkout_fields' , 'customize_checkout_fields' );
function customize_checkout_fields( $fields ) {
	unset($fields['billing']['billing_first_name']);
	unset($fields['billing']['billing_last_name']);
	unset($fields['billing']['billing_company']);
	unset($fields['billing']['billing_address_1']);
	unset($fields['billing']['billing_address_2']);
	unset($fields['billing']['billing_city']);
	unset($fields['billing']['billing_postcode']);
	unset($fields['billing']['billing_country']);
	unset($fields['billing']['billing_state']);
	unset($fields['billing']['billing_phone']);
	unset($fields['order']['order_comments']);
	unset($fields['billing']['billing_email']);
	unset($fields['account']['account_username']);
	unset($fields['account']['account_password']);
    return $fields;}

// редірект з корзини в чекаут
function skip_cart_page_redirection_to_checkout() {
  if( is_cart() )
      wp_redirect( WC()->cart->get_checkout_url() );
}
add_action('template_redirect', 'skip_cart_page_redirection_to_checkout');

// редірект при вході в особистий кабінет
add_filter('woocommerce_login_redirect', 'wc_login_redirect'); 
function wc_login_redirect( $redirect_to ) {
   $redirect_to = "/".the_title()."/my-account";
   return $redirect_to;
}

// logout redirect
add_action('wp_logout','logout_redirect');
function logout_redirect(){
  wp_redirect( home_url() );
  exit();
  }

// redirect to thank page
add_action( 'woocommerce_thankyou', 'bbloomer_redirectcustom');
function bbloomer_redirectcustom( $order_id ){
    $order = new WC_Order( $order_id );
 
//    $url = 'http://yoursite.com/custom-url';
if ( function_exists('icl_object_id') ) {
    if(ICL_LANGUAGE_CODE=='en'){
     $url = '/babushka/en/woocommerce-thank-you-page-en/';
    } elseif(ICL_LANGUAGE_CODE=='fr'){
     $url = '/babushka/woocommerce-thank-you-page-de/';
    }
} 
else {
//    $url = '/woocommerce-thank-you-page/';
    $url = '/';
} 
    if ( $order->status != 'failed' ) {
        wp_redirect($url);
        exit;
    }
 
	// зробити поля чекаута необов"язковими
	    function custom_override_default_address_fields( $address_fields ) {
    $address_fields['state']['required'] = false;
    $address_fields['company']['required'] = false;
      return $address_fields;
 }

// зробити метод оплати необов"язковим
    add_filter('woocommerce_cart_needs_payment', 'disabled_payment');
function disabled_payment () {
return false;
}
	
	

// Особистий кабінет

// Видаляємо пункти меню
add_filter ( 'woocommerce_account_menu_items', 'remove_my_account_links' );
function remove_my_account_links( $menu_links ){
	//unset( $menu_links['edit-address'] ); // Addresses
	//unset( $menu_links['dashboard'] ); // Remove Dashboard
	//unset( $menu_links['payment-methods'] ); // Remove Payment Methods
	//unset( $menu_links['orders'] ); // Remove Orders
	//unset( $menu_links['downloads'] ); // Disable Downloads
	//unset( $menu_links['edit-account'] ); // Remove Account details tab
	//unset( $menu_links['customer-logout'] ); // Remove Logout link
	return $menu_links;
 
}

// змінити порядокі назву сторінок
function my_account_menu_order() {
  $menuOrder = array(
    'edit-account'       => __( 'Profile', 'woocommerce' ),
    'orders'             => __( 'Order', 'woocommerce' ),
    'customer-logout'    => __( 'Exit', 'woocommerce' ),
  );
  return $menuOrder;
}
add_filter ( 'woocommerce_account_menu_items', 'my_account_menu_order' );

	
// Переіеновування вкладок
function misha_rename_downloads( $menu_links ){
	$menu_links['downloads'] = 'My Files';
	return $menu_links;
}

//Добавляємо нову вкладку в особичтий кабінет
// Add Link (Tab) to My Account menu
add_filter ( 'woocommerce_account_menu_items', 'misha_log_history_link', 40 );
function misha_log_history_link( $menu_links ){
 
	$menu_links = array_slice( $menu_links, 0, 5, true ) 
	+ array( 'log-history' => 'Log history' )
	+ array_slice( $menu_links, 5, NULL, true );
 
	return $menu_links;
 
}

// Register Permalink Endpoint
add_action( 'init', 'misha_add_endpoint' );
function misha_add_endpoint() {
 
	// WP_Rewrite is my Achilles' heel, so please do not ask me for detailed explanation
	add_rewrite_endpoint( 'log-history', EP_PAGES );
 
}

// woocommerce_account_{ENDPOINT NAME}_endpoint
add_action( 'woocommerce_account_log-history_endpoint', 'misha_my_account_endpoint_content' );
function misha_my_account_endpoint_content() {
 
	// of course you can print dynamic content here, one of the most useful functions here is get_current_user_id()
	echo 'Last time you logged in: yesterday from Safari.';
}

// Добавляти нові поля в базу даних
// html втисувати в формочу з form-edit-account.php
// html розмітка
	<p class="form-row form-row-wide">
        <label for="phone">Телефон</label>
        <input type="text" class="input-text" name="phone" id="phone" value="<?php echo esc_attr( $user->phone ); ?>" />
        </p>
// Код в function.php
$tag             = 'woocommerce_save_account_details'; 
$function_to_add = 'my_save_account';
$priority        = 10;
$accepted_args   = 1; 
add_action( $tag, $function_to_add, $priority, $accepted_args ); 
function my_save_account($user_id) {
  $phone  = ! empty( $_POST[ 'phone' ] ) ? $_POST[ 'phone' ] : '';
  update_user_meta($user_id, 'phone', $phone);
}

// добвляємо нові поля БД при реєстраціїї

// Код в html
    $billing_last_name = ! empty( $_POST[ 'billing_last_name' ] ) ? $_POST[ 'billing_last_name' ] : '';
    <input type="text" class="input-text" name="billing_first_name" id="kind_of_name" value="<?php  $billing_first_name  ?>" />

// Код в functions.php
add_action( 'woocommerce_created_customer', 'truemisha_save_fields', 25 );
function truemisha_save_fields( $user_id ) {
	if ( isset( $_POST[ 'billing_first_name' ] ) ) {
		update_user_meta( $user_id, 'first_name', sanitize_text_field( $_POST['billing_first_name'] ) );
	}
}


// Виведення інфомації з бази даних про поточного юзера
wp_cookie_constants();
require ABSPATH . WPINC . '/pluggable.php';

$current_user = wp_get_current_user();

echo 'Username: '         . $current_user->user_login     . '<br />';
echo 'email: '            . $current_user->user_email     . '<br />';
echo 'first name: '       . $current_user->user_firstname . '<br />';
echo 'last name: '        . $current_user->user_lastname  . '<br />';
echo 'Отображаемое имя: '   . $current_user->display_name   . '<br />';
echo 'ID: '               . $current_user->ID             . '<br />';
echo 'ID: '               . $current_user->phone             . '<br />';


// Плагіни для авторизації, за допомогою соц.мереж
Super socializer
Nextend social login

// Плагіни для особистого кабінету
WP-Recall
	
// плагін для вибору часу самовивозу, з обмеженнями
iconic-woo-delivery-slots-premium	
	
	?>
