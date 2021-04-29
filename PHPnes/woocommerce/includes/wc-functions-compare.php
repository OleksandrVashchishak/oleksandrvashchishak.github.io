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
	function tm_woocompare_update_fragments( $fragments ) {
		ob_start();
		nes_woocommerce_compare();
		$fragments['a.cabinet__compare'] = ob_get_clean();

		return $fragments;
	}
}
add_filter( 'wp_ajax_tm_compare_get_fragments', 'tm_woocompare_update_fragments' );


if ( ! function_exists( 'nes_woocommerce_compare' ) ) {
	/**
	 * Cart Link.
	 *
	 * Displayed a link to the cart including the number of items present and the cart total.
	 *
	 * @return void
	 */
	function nes_woocommerce_compare() {
		?>
		<span class="count cart__quantity">
			<?php echo sprintf( '%d', count( tm_woocompare_get_list() ) ); ?>
		</span>
		<?php
	}
}

