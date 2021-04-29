<?php
/**
 * WooCommerce Compatibility File
 *
 * @link https://woocommerce.com/
 *
 * @package nes
 */

/**
 * WooCommerce setup function.
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)
 * @link https://github.com/woocommerce/woocommerce/wiki/Declaring-WooCommerce-support-in-themes
 *
 * @return void
 */


/**
 * WooCommerce specific scripts & stylesheets.
 *
 * @return void
 */
function nes_woocommerce_scripts() {
	wp_enqueue_style( 'nes-woocommerce-style', get_template_directory_uri() . '/woocommerce.css', array(), _S_VERSION );

	$font_path   = WC()->plugin_url() . '/assets/fonts/';
	$inline_font = '@font-face {
			font-family: "star";
			src: url("' . $font_path . 'star.eot");
			src: url("' . $font_path . 'star.eot?#iefix") format("embedded-opentype"),
				url("' . $font_path . 'star.woff") format("woff"),
				url("' . $font_path . 'star.ttf") format("truetype"),
				url("' . $font_path . 'star.svg#star") format("svg");
			font-weight: normal;
			font-style: normal;
		}';

	wp_add_inline_style( 'nes-woocommerce-style', $inline_font );
}
add_action( 'wp_enqueue_scripts', 'nes_woocommerce_scripts' );

/**
 * Disable the default WooCommerce stylesheet.
 *
 * Removing the default WooCommerce stylesheet and enqueing your own will
 * protect you during WooCommerce core updates.
 *
 * @link https://docs.woocommerce.com/document/disable-the-default-stylesheet/
 */


/**
 * Add 'woocommerce-active' class to the body tag.
 *
 * @param  array $classes CSS classes applied to the body tag.
 * @return array $classes modified to include 'woocommerce-active' class.
 */
function nes_woocommerce_active_body_class( $classes ) {
	$classes[] = 'woocommerce-active';

	return $classes;
}
add_filter( 'body_class', 'nes_woocommerce_active_body_class' );

/**
 * Related Products Args.
 *
 * @param array $args related products args.
 * @return array $args related products args.
 */
function nes_woocommerce_related_products_args( $args ) {
	$defaults = array(
		'posts_per_page' => 3,
		'columns'        => 3,
	);

	$args = wp_parse_args( $defaults, $args );

	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'nes_woocommerce_related_products_args' );

if ( ! function_exists( 'nes_woocommerce_wrapper_before' ) ) {
	/**
	 * Before Content.
	 *
	 * Wraps all WooCommerce content in wrappers which match the theme markup.
	 *
	 * @return void
	 */
	function nes_woocommerce_wrapper_before() {
		?>
			<main id="primary" class="site-main">
		<?php
	}
}
add_action( 'woocommerce_before_main_content', 'nes_woocommerce_wrapper_before' );

if ( ! function_exists( 'nes_woocommerce_wrapper_after' ) ) {
	/**
	 * After Content.
	 *
	 * Closes the wrapping divs.
	 *
	 * @return void
	 */
	function nes_woocommerce_wrapper_after() {
		?>
			</main><!-- #main -->
		<?php
	}
}
//add_action( 'woocommerce_after_main_content', 'nes_woocommerce_wrapper_after' );

/**
 * Sample implementation of the WooCommerce Mini Cart.
 *
 * You can add the WooCommerce Mini Cart to header.php like so ...
 */
// if ( function_exists( 'nes_woocommerce_header_cart' ) ) {
// 	nes_woocommerce_header_cart();
// }

add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

// add_filter( 'woocommerce_enqueue_styles', 'nes_enqueue_styles', 1 );
// function nes_enqueue_styles( $enqueue_styles ) {
	
// 	unset( $enqueue_styles['woocommerce-general'] );
// 	unset( $enqueue_styles['woocommerce-layout'] );
// 	unset( $enqueue_styles['woocommerce-smallscreen'] );
// 	//$enqueue_styles['woocommerce-general']['deps'] = array('bootsrap-style');
// 	//get_vd($enqueue_styles);
//     return $enqueue_styles;
// }


/* 
* Archive Products Hooks
*/


// Персонализируем хлебные крошки

remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );

add_filter( 'woocommerce_before_main_content', 'get_breadcrumbs', 20 );


/* Login new fields  */

function wooc_save_extra_register_fields( $customer_id ) {
    if ( isset( $_POST['billing_phone'] ) ) {
        // Phone input filed which is used in WooCommerce
        update_user_meta( $customer_id, 'billing_phone', sanitize_text_field( $_POST['billing_phone'] ) );
    }
}
add_action( 'woocommerce_created_customer', 'wooc_save_extra_register_fields' );

// Отключаем Sidebar 

//remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

// Product Content

remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);


// image
add_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_open', 5);
add_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', 15);


// sales 

remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);
add_action('woocommerce_before_shop_loop_item', 'woocommerce_show_product_loop_sale_flash', 10);
add_action('woocommerce_before_shop_loop_item', 'woocommerce_template_single_meta', 5);


// Price

remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);
add_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_price', 6);


// Discount
add_filter( 'woocommerce_sale_flash', 'add_percentage_to_sale_badge', 25, 3);
function add_percentage_to_sale_badge( $html, $post, $product ) {

  if( $product->is_type('variable')){
      $percentages = array();

      // Get all variation prices
      $prices = $product->get_variation_prices();

      // Loop through variation prices
      foreach( $prices['price'] as $key => $price ){
          // Only on sale variations
          if( $prices['regular_price'][$key] !== $price ){
              // Calculate and set in the array the percentage for each variation on sale
              $percentages[] = round( 100 - ( floatval($prices['sale_price'][$key]) / floatval($prices['regular_price'][$key]) * 100 ) );
          }
      }
      // We keep the highest value
      $percentage = max($percentages) . '%';

  } elseif( $product->is_type('grouped') ){
      $percentages = array();

      // Get all variation prices
      $children_ids = $product->get_children();

      // Loop through variation prices
      foreach( $children_ids as $child_id ){
          $child_product = wc_get_product($child_id);

          $regular_price = (float) $child_product->get_regular_price();
          $sale_price    = (float) $child_product->get_sale_price();

          if ( $sale_price != 0 || ! empty($sale_price) ) {
              // Calculate and set in the array the percentage for each child on sale
              $percentages[] = round(100 - ($sale_price / $regular_price * 100));
          }
      }
      // We keep the highest value
      $percentage = max($percentages) . '%';

  } else {
      $regular_price = (float) $product->get_regular_price();
      $sale_price    = (float) $product->get_sale_price();

      if ( $sale_price != 0 || ! empty($sale_price) ) {
          $percentage    = round(100 - ($sale_price / $regular_price * 100)) . '%';
      } else {
          return $html;
      }
  }

  return '<div class="card-sale"><span class="card-sale__left">Акція</span><span class="card-sale__right">' . esc_html__( '', 'woocommerce') . '' . $percentage . '</span></div>';
}

//   add_filter( 'woocommerce_product_add_to_cart_text', 'bryce_archive_add_to_cart_text' );
// function bryce_archive_add_to_cart_text() {
//         return pll__( 'Купити', 'woocommerce' );
// }

add_filter( 'woocommerce_variable_sale_price_html', function($html, $product) {

    $prices = array( $product->get_variation_price( 'min', true ), $product->get_variation_price( 'max', true ) );
    $price = $prices[0] !== $prices[1] ? sprintf( _x( '%1$s&ndash;%2$s', 'Price range: from-to', 'woocommerce' ), wc_price( $prices[0] ), wc_price( $prices[1] ) ) : wc_price( $prices[0] );

    return $price;

    return $html;
}, 10 ,2 );


/**
 * Display shop image on archive
 */
add_action('woocommerce_archive_description', 'woocommerce_shop_feature_image', 20);
function woocommerce_shop_feature_image()
{
    if (is_shop('shop')) {
        echo get_the_post_thumbnail(get_option('woocommerce_shop_page_id'));
    }
}

// Remove count products 
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );

remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
// show stars always
add_action('woocommerce_after_shop_loop_item_title', 'ehi_woocommerce_template_single_excerpt', 5);
function ehi_woocommerce_template_single_excerpt() {
     
    // The "echo '</a>';" line below MAY BE needed to close the anchor tag (link/href) added for product images
    // That way, we can use a different (custom) link for our star ratings and star rating text
    // Comment this out if it is not applicable in your case.
	 echo '</a>';
	 
	 
     
    global $product;
	$rating = $product->get_average_rating();
    $icon = '<svg width="18" height="13" viewbox="0 0 18 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2 1H16C16.5523 1 17 1.44772 17 2V7.46697C17 8.01926 16.5523 8.46697 16 8.46697H13.4231C11.9558 8.46697 10.7343 9.52012 10.4742 10.9122C10.0751 10.4656 9.66718 9.9802 9.34283 9.58566C8.76899 8.88766 7.91124 8.46697 6.99086 8.46697H2C1.44772 8.46697 1 8.01926 1 7.46697V2C1 1.44772 1.44771 1 2 1Z" stroke="#E44747" stroke-width="2" /></svg>';
    if ( $rating > 0 ) {
			$count = $product->get_rating_count();
			if($count == 1) $count = $count . pll__(' відгук');
			else if ($count > 1 & $count < 5) $count = $count . pll__(' відгуки');
			else {
				$count = $count . pll__(' відгуків');
			}
			  $title = $count;
			  

    } else {
        $title = pll__(' немає відгуків', 'woocommerse');
        $rating = 0;
    }
    $rating_html  = '</a><a class="card__raiting" href="' . get_the_permalink() . '#respond"><div class="star-rating ehi-star-rating"><span style="width:' . (( $rating / 5 ) * 100) . '%"></span></div>' . $icon . '<span><em><strong class="card-review__text">' . $title . '</strong></em></span></a>';
    echo $rating_html;
  
}


/** Выводим dropdown кол-во товаров **/
//remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

remove_action( 'woocommerce_before_shop_loop', 'woocommerce_output_all_notices', 10 );


// Column 3 
add_filter('loop_shop_columns',function(){return 3;});


/* 
* Single product 
* ========================
*/


// remove main container
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );

//change position button
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 15 );

// To change add to cart text on single product page
add_filter( 'woocommerce_product_single_add_to_cart_text', 'woocommerce_custom_single_add_to_cart_text' ); 
function woocommerce_custom_single_add_to_cart_text() {
    return pll__( 'Купити', 'woocommerce' ); 
}

// Add SKU after title
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 6);


// add my reviews
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
add_action('woocommerce_single_product_summary', 'ehi_woocommerce_template_single_excerpt', 8);


// wrapper for buttons
add_action( 'woocommerce_single_product_summary', 'description_right_buttons_start', 10 );
add_action( 'woocommerce_single_product_summary', 'description_right_buttons_end', 50 );
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 60);

function description_right_buttons_start() {
	echo '<div class="description-right__buttons">';
}

function description_right_buttons_end() {
	echo '</div>';
}

// remove Related
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
add_action( 'woocommerce_after_single_product', 'woocommerce_output_related_products', 30 );
add_filter('gettext', 'change_rp_text', 10, 3);
add_filter('ngettext', 'change_rp_text', 10, 3);

function change_rp_text($translated, $text, $domain)
{
     if ($text === 'Related products' && $domain === 'woocommerce') {
         $translated = pll__('Альтернативні продукти', $domain);
     }
     return $translated;
}

// change place upsells 
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15  );
add_action( 'woocommerce_after_single_product', 'woocommerce_upsell_display', 25);

// Remove Tabs
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
function woocommerce_template_product_description() {
	woocommerce_get_template( 'single-product/tabs/description.php' );
 }
add_action( 'woocommerce_after_single_product_summary', 'woocommerce_template_product_description', 30 );

add_action( 'woocommerce_after_single_product', 'wpd_wc_add_product_reviews', 30 );
function wpd_wc_add_product_reviews() {
    global $product;
 
    if ( ! comments_open() )
        return;
    /**** Reviews *****/
    ?>   
    <section class="reviews" id="reviews">
        <div class="go-up reviews__up">
            <a href="#" class="go-up__link">
                <svg width="16" height="14" viewbox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8 1.50002L14.5 8L16 8L8 -3.49691e-07L0 8L1.49999 8L8 1.50002Z" fill="#434343" />
                    <path d="M8 7.50002L14.5 14L16 14L8 6L0 14L1.49999 14L8 7.50002Z" fill="#434343" />
                </svg>
                <?php echo pll__('Повернутися до початку', 'woocommerce'); ?>
            </a>
        </div>
        <h2 class="review-title section-title reviews__title" itemprop="headline">
            <?php printf( __( 'Reviews (%d)', 'woocommerce' ), $product->get_review_count() ); ?>
        </h2>
        <div class="product-reviews">  
            <?php call_user_func( 'comments_template', 999 ); ?>
        </div>
        <div class="clearfix clear"></div>

    <?php
}

//Reviews avatar */
remove_action( 'woocommerce_review_before', 'woocommerce_review_display_gravatar', 10);
add_action( 'woocommerce_review_before', 'woocommerce_review_display_gravatar', 10);
function woocommerce_review_display_gravatar() {
    echo '<svg width="87" height="87" viewBox="0 0 87 87" fill="none" xmlns="http://www.w3.org/2000/svg">
    <rect width="87" height="87" fill="#E7E7E7"/>
    <path d="M71.0502 67.2068V64.2766C71.0502 61.29 69.5856 58.4161 67.1406 56.6016C61.4476 52.3865 55.6482 49.445 53.6166 48.4645V45.1172C54.03 44.2381 54.3726 43.2802 54.6324 42.2433C56.1443 41.7249 56.9711 39.6061 57.5262 37.7352C58.2703 35.2445 58.1876 33.4977 57.3136 32.5284C58.2349 27.7386 57.8215 24.211 56.097 22.0359C55.1875 20.8976 54.1245 20.4129 53.4158 20.1988C52.9079 19.5226 51.8804 18.3843 50.1441 17.4714C48.3488 16.4571 46.329 15.95 44.1085 15.95C43.7069 15.95 43.3053 15.9725 42.951 15.995C41.9588 16.0401 40.9785 16.2204 40.0099 16.5247C39.9981 16.5247 39.9863 16.536 39.9745 16.536C38.9115 16.8854 37.8721 17.3925 36.8681 18.0462C35.7224 18.745 34.6712 19.579 33.7617 20.5031C31.9782 22.25 30.7971 24.2223 30.2892 26.3298C29.8049 28.0767 29.7695 29.8348 30.1711 31.5592C29.9585 31.7057 29.7695 31.8747 29.6041 32.0776C28.7891 33.1032 28.7537 34.7148 29.4742 37.1605C29.9703 38.851 30.6317 40.5753 31.7538 41.353C32.0845 42.9759 32.6397 44.4523 33.3838 45.7596V48.4757C31.3522 49.4562 25.5528 52.3865 19.8598 56.6128C17.4148 58.4273 15.9502 61.29 15.9502 64.2878V67.2181C15.9502 69.3369 17.7573 71.0499 19.9661 71.0499H67.0343C69.2431 71.0499 71.0502 69.3256 71.0502 67.2068ZM18.8322 67.2068V64.2766C18.8322 62.1352 19.8716 60.084 21.6196 58.788C27.7616 54.2461 34.0098 51.2482 35.2027 50.696C35.8641 50.3917 36.2775 49.7605 36.2775 49.0505V45.3877C36.2775 45.1398 36.2067 44.9031 36.0768 44.689C35.2972 43.4267 34.7539 41.9165 34.4822 40.1921C34.3877 39.6399 33.9625 39.2004 33.4074 39.0651C33.2538 38.8961 32.8168 38.2875 32.2617 36.4054C31.801 34.8501 31.8365 34.1288 31.8837 33.8696C32.3444 33.8921 32.805 33.6892 33.1003 33.3399C33.4074 32.968 33.4901 32.4721 33.3247 32.0325C32.7105 30.3983 32.6396 28.7191 33.1121 27.006C33.5137 25.3606 34.435 23.8278 35.8642 22.4303C36.6319 21.6414 37.5177 20.9539 38.4627 20.3791C38.4745 20.3679 38.4981 20.3566 38.5099 20.3453C39.3013 19.8156 40.1281 19.4212 40.943 19.1507C40.9548 19.1507 40.9667 19.1394 40.9667 19.1394C41.6635 18.914 42.384 18.79 43.1399 18.7562C45.2069 18.5872 47.0613 18.9591 48.7031 19.872C50.4984 20.8187 51.2307 22.0584 51.2307 22.0584C51.4551 22.4979 51.8567 22.7572 52.3764 22.791C52.4119 22.791 53.1796 22.9037 53.841 23.794C54.5379 24.7407 55.5301 27.1751 54.2899 32.8552C54.1481 33.4864 54.4907 34.1175 55.093 34.388C55.1521 34.5909 55.2466 35.2783 54.7387 36.9914C54.2899 38.5016 53.9237 39.1891 53.7111 39.4934C53.4395 39.4483 53.156 39.4709 52.8961 39.5836C52.4473 39.7639 52.1166 40.1583 52.0339 40.6091C51.7859 41.9616 51.3843 43.1787 50.8646 44.2156C50.7701 44.4072 50.7228 44.6101 50.7228 44.8129V49.0505C50.7228 49.7605 51.1362 50.3804 51.7977 50.696C52.9906 51.2482 59.2388 54.2574 65.3689 58.788C67.117 60.084 68.1564 62.1352 68.1564 64.2766V67.2068C68.1564 67.7929 67.6485 68.2775 67.0343 68.2775H19.9661C19.3401 68.2887 18.8322 67.8041 18.8322 67.2068Z" fill="white"/>
    <path d="M18.8322 67.2068V64.2766C18.8322 62.1352 19.8716 60.084 21.6196 58.788C27.7616 54.2461 34.0098 51.2482 35.2027 50.696C35.8641 50.3917 36.2775 49.7605 36.2775 49.0505V45.3877C36.2775 45.1398 36.2067 44.9031 36.0768 44.689C35.2972 43.4267 34.7539 41.9165 34.4822 40.1921C34.3877 39.6399 33.9625 39.2004 33.4074 39.0651C33.2538 38.8961 32.8168 38.2875 32.2617 36.4054C31.801 34.8501 31.8365 34.1288 31.8837 33.8696C32.3444 33.8921 32.805 33.6892 33.1003 33.3399C33.4074 32.968 33.4901 32.4721 33.3247 32.0325C32.7105 30.3983 32.6396 28.7191 33.1121 27.006C33.5137 25.3606 34.435 23.8278 35.8642 22.4303C36.6319 21.6414 37.5177 20.9539 38.4627 20.3791C38.4745 20.3679 38.4981 20.3566 38.5099 20.3453C39.3013 19.8156 40.1281 19.4212 40.943 19.1507C40.9548 19.1507 40.9667 19.1394 40.9667 19.1394C41.6635 18.914 42.384 18.79 43.1399 18.7562C45.2069 18.5872 47.0613 18.9591 48.7031 19.872C50.4984 20.8187 51.2307 22.0584 51.2307 22.0584C51.4551 22.4979 51.8567 22.7572 52.3764 22.791C52.4119 22.791 53.1796 22.9037 53.841 23.794C54.5379 24.7407 55.5301 27.1751 54.2899 32.8552C54.1481 33.4864 54.4907 34.1175 55.093 34.388C55.1521 34.5909 55.2466 35.2783 54.7387 36.9914C54.2899 38.5016 53.9237 39.1891 53.7111 39.4934C53.4395 39.4483 53.156 39.4709 52.8961 39.5836C52.4473 39.7639 52.1166 40.1583 52.0339 40.6091C51.7859 41.9616 51.3843 43.1787 50.8646 44.2156C50.7701 44.4072 50.7228 44.6101 50.7228 44.8129V49.0505C50.7228 49.7605 51.1362 50.3804 51.7977 50.696C52.9906 51.2482 59.2388 54.2574 65.3689 58.788C67.117 60.084 68.1564 62.1352 68.1564 64.2766V67.2068C68.1564 67.7929 67.6485 68.2775 67.0343 68.2775H19.9661C19.3401 68.2887 18.8322 67.8041 18.8322 67.2068Z" fill="white"/>
    <path d="M71.0502 67.2068V64.2766C71.0502 61.29 69.5856 58.4161 67.1406 56.6016C61.4476 52.3865 55.6482 49.445 53.6166 48.4645V45.1172C54.03 44.2381 54.3726 43.2802 54.6324 42.2433C56.1443 41.7249 56.9711 39.6061 57.5262 37.7352C58.2703 35.2445 58.1876 33.4977 57.3136 32.5284C58.2349 27.7386 57.8215 24.211 56.097 22.0359C55.1875 20.8976 54.1245 20.4129 53.4158 20.1988C52.9079 19.5226 51.8804 18.3843 50.1441 17.4714C48.3488 16.4571 46.329 15.95 44.1085 15.95C43.7069 15.95 43.3053 15.9725 42.951 15.995C41.9588 16.0401 40.9785 16.2204 40.0099 16.5247C39.9981 16.5247 39.9863 16.536 39.9745 16.536C38.9115 16.8854 37.8721 17.3925 36.8681 18.0462C35.7224 18.745 34.6712 19.579 33.7617 20.5031C31.9782 22.25 30.7971 24.2223 30.2892 26.3298C29.8049 28.0767 29.7695 29.8348 30.1711 31.5592C29.9585 31.7057 29.7695 31.8747 29.6041 32.0776C28.7891 33.1032 28.7537 34.7148 29.4742 37.1605C29.9703 38.851 30.6317 40.5753 31.7538 41.353C32.0845 42.9759 32.6397 44.4523 33.3838 45.7596V48.4757C31.3522 49.4562 25.5528 52.3865 19.8598 56.6128C17.4148 58.4273 15.9502 61.29 15.9502 64.2878V67.2181C15.9502 69.3369 17.7573 71.0499 19.9661 71.0499H67.0343C69.2431 71.0499 71.0502 69.3256 71.0502 67.2068ZM18.8322 67.2068V64.2766C18.8322 62.1352 19.8716 60.084 21.6196 58.788C27.7616 54.2461 34.0098 51.2482 35.2027 50.696C35.8641 50.3917 36.2775 49.7605 36.2775 49.0505V45.3877C36.2775 45.1398 36.2067 44.9031 36.0768 44.689C35.2972 43.4267 34.7539 41.9165 34.4822 40.1921C34.3877 39.6399 33.9625 39.2004 33.4074 39.0651C33.2538 38.8961 32.8168 38.2875 32.2617 36.4054C31.801 34.8501 31.8365 34.1288 31.8837 33.8696C32.3444 33.8921 32.805 33.6892 33.1003 33.3399C33.4074 32.968 33.4901 32.4721 33.3247 32.0325C32.7105 30.3983 32.6396 28.7191 33.1121 27.006C33.5137 25.3606 34.435 23.8278 35.8642 22.4303C36.6319 21.6414 37.5177 20.9539 38.4627 20.3791C38.4745 20.3679 38.4981 20.3566 38.5099 20.3453C39.3013 19.8156 40.1281 19.4212 40.943 19.1507C40.9548 19.1507 40.9667 19.1394 40.9667 19.1394C41.6635 18.914 42.384 18.79 43.1399 18.7562C45.2069 18.5872 47.0613 18.9591 48.7031 19.872C50.4984 20.8187 51.2307 22.0584 51.2307 22.0584C51.4551 22.4979 51.8567 22.7572 52.3764 22.791C52.4119 22.791 53.1796 22.9037 53.841 23.794C54.5379 24.7407 55.5301 27.1751 54.2899 32.8552C54.1481 33.4864 54.4907 34.1175 55.093 34.388C55.1521 34.5909 55.2466 35.2783 54.7387 36.9914C54.2899 38.5016 53.9237 39.1891 53.7111 39.4934C53.4395 39.4483 53.156 39.4709 52.8961 39.5836C52.4473 39.7639 52.1166 40.1583 52.0339 40.6091C51.7859 41.9616 51.3843 43.1787 50.8646 44.2156C50.7701 44.4072 50.7228 44.6101 50.7228 44.8129V49.0505C50.7228 49.7605 51.1362 50.3804 51.7977 50.696C52.9906 51.2482 59.2388 54.2574 65.3689 58.788C67.117 60.084 68.1564 62.1352 68.1564 64.2766V67.2068C68.1564 67.7929 67.6485 68.2775 67.0343 68.2775H19.9661C19.3401 68.2887 18.8322 67.8041 18.8322 67.2068Z" stroke="white" stroke-width="0.5"/>
    <path d="M18.8322 67.2068V64.2766C18.8322 62.1352 19.8716 60.084 21.6196 58.788C27.7616 54.2461 34.0098 51.2482 35.2027 50.696C35.8641 50.3917 36.2775 49.7605 36.2775 49.0505V45.3877C36.2775 45.1398 36.2067 44.9031 36.0768 44.689C35.2972 43.4267 34.7539 41.9165 34.4822 40.1921C34.3877 39.6399 33.9625 39.2004 33.4074 39.0651C33.2538 38.8961 32.8168 38.2875 32.2617 36.4054C31.801 34.8501 31.8365 34.1288 31.8837 33.8696C32.3444 33.8921 32.805 33.6892 33.1003 33.3399C33.4074 32.968 33.4901 32.4721 33.3247 32.0325C32.7105 30.3983 32.6396 28.7191 33.1121 27.006C33.5137 25.3606 34.435 23.8278 35.8642 22.4303C36.6319 21.6414 37.5177 20.9539 38.4627 20.3791C38.4745 20.3679 38.4981 20.3566 38.5099 20.3453C39.3013 19.8156 40.1281 19.4212 40.943 19.1507C40.9548 19.1507 40.9667 19.1394 40.9667 19.1394C41.6635 18.914 42.384 18.79 43.1399 18.7562C45.2069 18.5872 47.0613 18.9591 48.7031 19.872C50.4984 20.8187 51.2307 22.0584 51.2307 22.0584C51.4551 22.4979 51.8567 22.7572 52.3764 22.791C52.4119 22.791 53.1796 22.9037 53.841 23.794C54.5379 24.7407 55.5301 27.1751 54.2899 32.8552C54.1481 33.4864 54.4907 34.1175 55.093 34.388C55.1521 34.5909 55.2466 35.2783 54.7387 36.9914C54.2899 38.5016 53.9237 39.1891 53.7111 39.4934C53.4395 39.4483 53.156 39.4709 52.8961 39.5836C52.4473 39.7639 52.1166 40.1583 52.0339 40.6091C51.7859 41.9616 51.3843 43.1787 50.8646 44.2156C50.7701 44.4072 50.7228 44.6101 50.7228 44.8129V49.0505C50.7228 49.7605 51.1362 50.3804 51.7977 50.696C52.9906 51.2482 59.2388 54.2574 65.3689 58.788C67.117 60.084 68.1564 62.1352 68.1564 64.2766V67.2068C68.1564 67.7929 67.6485 68.2775 67.0343 68.2775H19.9661C19.3401 68.2887 18.8322 67.8041 18.8322 67.2068Z" stroke="white" stroke-width="0.5"/>
    </svg>'; 
}

remove_action( 'woocommerce_review_before_comment_meta', 'woocommerce_review_display_rating', 10);
add_action( 'woocommerce_review_meta', 'woocommerce_review_display_rating', 15);

/* Изменить порядок вывода полей */
add_filter('comment_form_fields', 'kama_reorder_comment_fields' );
function kama_reorder_comment_fields( $fields ){
	// die(print_r( $fields )); // посмотрим какие поля есть

	$new_fields = array(); // сюда соберем поля в новом порядке

	$myorder = array('author','email','url','comment'); // нужный порядок

	foreach( $myorder as $key ){
		$new_fields[ $key ] = $fields[ $key ];
		unset( $fields[ $key ] );
	}

	// если остались еще какие-то поля добавим их в конец
	if( $fields )
		foreach( $fields as $key => $val )
			$new_fields[ $key ] = $val;

	return $new_fields;
}

add_action('comment_form_before_fields', 'comment_notes_after');

function comment_notes_after(){
    echo '<div class="form-group">';
}

/*** Cart  *********/

add_action( 'woocommerce_before_cart', 'get_breadcrumbs', 5);

remove_action( 'genesis_entry_footer', 'genesis_entry_footer_markup_open', 5 );
remove_action( 'genesis_entry_footer', 'genesis_entry_footer_markup_close', 15 );

remove_action( 'woocommerce_cart_is_empty', 'wc_empty_cart_message', 10 );
add_action( 'woocommerce_cart_is_empty', 'custom_empty_cart_message', 10 );

function custom_empty_cart_message() {
    $html = '<div class="cart-empty-wrapper">';
    $html .= wp_kses_post( apply_filters( 'wc_empty_cart_message', pll__( 'У вашому кошику порожньо', 'woocommerce' ) ) );
    echo $html . '</div>';
}

// WooCommerce Checkout Fields Hook
add_filter('woocommerce_checkout_fields','custom_wc_checkout_fields_no_label');

// Our hooked in function - $fields is passed via the filter!
// Action: remove label from $fields
function custom_wc_checkout_fields_no_label($fields) {
    // loop by category
    foreach ($fields as $category => $value) {
        // loop by fields
        foreach ($fields[$category] as $field => $property) {
            // remove label property
            unset($fields[$category][$field]['label']);
        }
    }
     return $fields;
}

// зробити метод оплати необов"язковим
add_filter('woocommerce_cart_needs_payment', 'disabled_payment');
function disabled_payment () {
return false;
}

/* Snippets: WooCommerce Remove Terms & Conditions Toggle */

add_action( 'wp', function() {
    remove_action( 'woocommerce_checkout_terms_and_conditions', 'wc_checkout_privacy_policy_text', 20 );
    remove_action( 'woocommerce_checkout_terms_and_conditions', 'wc_terms_and_conditions_page_content', 30 );
} );


add_action( 'yith_wcwl_before_wishlist_form', 'get_breadcrumbs', 5 );

add_filter( 'yith_wcwl_is_wishlist_responsive', '__return_false' );


/* Remove style.css blick-library */
// wp_dequeue_style( 'wp-block-library' );
// wp_dequeue_style( 'wp-block-library-theme' );

// отключение ненужных теме стилей и скриптов begin
function my_deregister_styles_and_scripts() {
    wp_dequeue_style('wp-block-library');
}
add_action( 'wp_print_styles', 'my_deregister_styles_and_scripts', 100 );
// отключение ненужных теме стилей и скриптов end

add_action( 'woocommerce_widget_shopping_cart_total', 'woocommerce_widget_shopping_cart_subtotal', 10 );

function woocommerce_widget_shopping_cart_subtotal() {
	echo '<strong>' . esc_html__( 'Разом до сплати:', 'woocommerce' ) . '</strong> ' . WC()->cart->get_cart_subtotal(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}

add_action( 'woocommerce_widget_shopping_cart_buttons', function(){
    // Removing Buttons
    remove_action( 'woocommerce_widget_shopping_cart_buttons', 'woocommerce_widget_shopping_cart_button_view_cart', 10 );
    //remove_action( 'woocommerce_widget_shopping_cart_buttons', 'woocommerce_widget_shopping_cart_proceed_to_checkout', 20 );

    // Adding customized Buttons
    //add_action( 'woocommerce_widget_shopping_cart_buttons', 'custom_widget_shopping_cart_proceed_to_checkout', 10 );
    add_action( 'woocommerce_widget_shopping_cart_buttons', 'custom_widget_shopping_cart_button_view_cart', 20 );
    
}, 1 );

// Custom cart button
// function custom_widget_shopping_cart_button_view_cart() {
//     $original_link = wc_get_cart_url();
//     $custom_link = home_url( '/cart/?id=1' ); // HERE replacing cart link
//     echo '<a href="' . esc_url( $custom_link ) . '" class="button wc-forward ref">' .esc_attr(pll_e( 'Перейти до кошику', 'woocommerce' )) . '</a>';
// }

// Custom Checkout button
// function custom_widget_shopping_cart_proceed_to_checkout() {
//     $original_link = wc_get_checkout_url();
//     $custom_link = home_url( '/checkout/?id=1' ); // HERE replacing checkout link
//     echo '<a href="' . esc_url( $custom_link ) . '" class="button checkout wc-forward btn ordering-right__btn">' .esc_attr(pll__( 'Підтвердити замовлення', 'woocommerce' )) . '</a>';
// }


function remove_image_zoom_support() {
    remove_theme_support( 'wc-product-gallery-zoom' );
}
add_action( 'wp', 'remove_image_zoom_support', 100 );

add_action('init', function(){
	pll_register_string(
		'ordering-right_btn',
		'Підтвердити замовлення',
		'mini cart',
		false
	);
	pll_register_string(
		'wc-forward',
		'Перейти до кошику',
		'mini cart',
		false
	);
	
	pll_register_string(
		'dymosos',
		'Димосос',
		'attribute',
		false
	);
	
	pll_register_string(
		'dymosos',
		'Димосос',
		'attribute',
		false
	);
	
});

/* translate woocommerce */
add_filter('gettext', 'translate_text');
add_filter('ngettext', 'translate_text');
 
function translate_text($translated) {
    if( ICL_LANGUAGE_CODE == 'ru' ){
		$translated = str_ireplace("Ім'я *", 'Имя', $translated);
        $translated = str_ireplace("Прізвище", "Фамилия", $translated);
		$translated = str_ireplace("Місто *", "Город *", $translated);
		$translated = str_ireplace("Вулиця *", "Улица *", $translated);
		$translated = str_ireplace("Будинок *", "Дом *", $translated);
		$translated = str_ireplace("Інший отримувач", "Другой получатель", $translated);
		$translated = str_ireplace("Ім’я", "Имя", $translated);
		$translated = str_ireplace("отримувача", "получателя", $translated);
		$translated = str_ireplace("Додати коментар до замовлення", "Добавить комментарий к заказу", $translated);
		$translated = str_ireplace("Коментар", "Коментарий", $translated);
 		$translated = str_ireplace("В корзину", "Купить", $translated);
        return $translated;
    } elseif ( ICL_LANGUAGE_CODE == 'uk' ) {
		$translated = str_ireplace("add to cart", "Купити", $translated);
        $translated = str_ireplace("Додати у кошик", "Купити", $translated);
        return $translated;
    } else {
        return $translated;
    }
}

add_filter( 'loop_shop_per_page', function ( $cols ) { return 20; }, 20 );


























