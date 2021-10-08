<?php 
if( ! defined ('ABSPATH') ) {
    exit; 
}


if ( ! function_exists( 'nes_woocommerce_cart_link_fragment' ) ) {
	/**
	 * Cart Fragments.
	 *
	 * Ensure cart contents update when products are added to the cart via AJAX.
	 *
	 * @param array $fragments Fragments to refresh via AJAX.
	 * @return array Fragments to refresh via AJAX.
	 */
	function nes_woocommerce_cart_link_fragment( $fragments ) {
		ob_start();
		nes_woocommerce_cart_link();
		$fragments['a.cart-contents'] = ob_get_clean();

		return $fragments;
	}
}
add_filter( 'woocommerce_add_to_cart_fragments', 'nes_woocommerce_cart_link_fragment' );


 if ( ! function_exists( 'nes_woocommerce_cart_link' ) ) {
 	/**
 	 * Cart Link.
 	 *
 	 * Displayed a link to the cart including the number of items present and the cart total.
 	 *
 	 * @return void
 	 */
 	function nes_woocommerce_cart_link() {
 	 ?>
 		 <a class="cart-contents w3view-cart cart cabinet__link" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'nes' ); ?>">
 			<span class="count cart__quantity">
 				<?php echo wp_kses_data( WC()->cart->get_cart_contents_count() ) ;?>
 			</span>
 		</a> 
		 <?php 
	}
 }

if ( ! function_exists( 'nes_woocommerce_header_cart' ) ) {
	/**
	 * Display Header Cart.
	 *
	 * @return void
	 */
	function nes_woocommerce_header_cart() {
		if ( is_cart() ) {
			$class = 'current-menu-item';
		} else {
			$class = '';
		}
		?>
		<ul id="site-header-cart" class="site-header-cart">
			<li class="<?php echo esc_attr( $class ); ?>">
				<?php nes_woocommerce_cart_link(); ?>
			</li>
			<li>
				<?php
				$instance = array(
					'title' => '',
				);

				the_widget( 'WC_Widget_Cart', $instance );
				?>
			</li>
		</ul>
		<?php
	}
}