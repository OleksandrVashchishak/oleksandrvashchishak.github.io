<?php
/**
 * Wishlist pages template; load template parts basing on the url
 *
 * @author Your Inspiration Themes
 * @package YITH WooCommerce Wishlist
 * @version 3.0.0
 */

/**
 * Template Variables:
 *
 * @var $template_part string Sub-template to load
 * @var $var array Array of attributes that needs to be sent to sub-template
 */

if ( ! defined( 'YITH_WCWL' ) ) {
	exit;
} // Exit if accessed directly
?>


<?php
/**
 * Hook: yith_wcwl_wishlist_before_wishlist_content.
 *
 * @hooked \YITH_WCWL_Frontend::wishlist_header - 10
 */
do_action( 'yith_wcwl_wishlist_before_wishlist_content', $var );

?>
 <div class="selected__wrap">
		<div class="selected-left wishlist-left">
<?php
/**
 * Hook: yith_wcwl_wishlist_main_wishlist_content.
 *
 * @hooked \YITH_WCWL_Frontend::main_wishlist_content - 10
 */
do_action( 'yith_wcwl_wishlist_main_wishlist_content', $var );
?>
	</div>
	
		<div class="ordering-right wishlist-right">
			<div class="ordering-right__wrap">
			<?php 
				// if ( ! WC()->cart->is_empty() ) : 
			?>
				<div class="ordering-right__top">
					<h3 class="ordering-right__title" id="order_review_heading"><?php echo pll__( 'Ваш кошик', 'woocommerce' ); ?></h3>
					<p class="ordering-right__text">
						<?php 
						// echo WC()->cart->get_cart_contents_count(); 
						?><?php 
						// esc_html_e( ' товари', 'woocommerce' ); 
						?>
					</p>
				</div>
				<?php 
					// do_action( 'woocommerce_checkout_order_review' ); 
				?>
				<?php 
					// else : 
				?>
					<!-- <div class="wishlist-wrap">
						<h3 class="ordering-right__title" id="order_review_heading"><?php 
						// esc_html_e( 'Ваш кошик', 'woocommerce' ); 
						?></h3>
						<p class="woocommerce-mini-cart__empty-message"><?php 
						// esc_html_e( 'У вашому кошику порожньо', 'woocommerce' ); 
						?></p>
					</div> -->
				<?php 
					// endif; 
				?>
				
			</div>
		
		
<?php
/**
 * Hook: yith_wcwl_wishlist_after_wishlist_content.
 *
 * @hooked \YITH_WCWL_Frontend::wishlist_footer - 10
 */
do_action( 'yith_wcwl_wishlist_after_wishlist_content', $var );
?>
</div>