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
