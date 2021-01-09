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
