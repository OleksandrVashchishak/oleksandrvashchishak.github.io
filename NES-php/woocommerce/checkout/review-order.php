<?php
/**
 * Review order table
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/review-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.8.0
 */

defined( 'ABSPATH' ) || exit;
?>
<table class="shop_table woocommerce-checkout-review-order-table">
	<tbody class="ordering-right__list">
		<?php
		do_action( 'woocommerce_review_order_before_cart_contents' );

		foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
			$_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );

			if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_checkout_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
				?>
				<tr class="<?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">
					<td class="product-remove">
						<?php
							echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
								'woocommerce_cart_item_remove_link',
								sprintf(
									'<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s"><svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
									<g clip-path="url(#clip0)">
									<path d="M11.4831 6.52148C11.2502 6.52148 11.0615 6.71019 11.0615 6.94303V14.9102C11.0615 15.1429 11.2502 15.3318 11.4831 15.3318C11.7159 15.3318 11.9046 15.1429 11.9046 14.9102V6.94303C11.9046 6.71019 11.7159 6.52148 11.4831 6.52148Z" fill="#8F8F8F"/>
									<path d="M6.50846 6.52148C6.27562 6.52148 6.08691 6.71019 6.08691 6.94303V14.9102C6.08691 15.1429 6.27562 15.3318 6.50846 15.3318C6.7413 15.3318 6.93001 15.1429 6.93001 14.9102V6.94303C6.93001 6.71019 6.7413 6.52148 6.50846 6.52148Z" fill="#8F8F8F"/>
									<path d="M14.6954 2.19209H12.5371V1.66516C12.5396 1.22204 12.3644 0.796544 12.0507 0.483514C11.737 0.170649 11.3109 -0.00356726 10.8678 5.53875e-05H7.12458C6.68146 -0.00356726 6.25531 0.170649 5.94162 0.483514C5.62793 0.796544 5.45273 1.22204 5.4552 1.66516V2.19209H3.29692C2.48809 2.19225 1.80489 2.79213 1.70016 3.59405C1.5956 4.39614 2.10211 5.15129 2.88378 5.35877V15.7447C2.88378 16.3586 3.10888 16.9351 3.5021 17.3487C3.89351 17.7635 4.43822 17.999 5.0083 18H12.984C13.5543 17.999 14.099 17.7635 14.4902 17.3487C14.8835 16.9351 15.1086 16.3586 15.1086 15.7447V5.35877C15.8902 5.15129 16.3967 4.39614 16.2922 3.59405C16.1875 2.79213 15.5043 2.19225 14.6954 2.19209ZM6.29829 1.66516C6.29549 1.44566 6.38177 1.23439 6.53755 1.07944C6.69316 0.924489 6.90492 0.839357 7.12458 0.843144H10.8678C11.0874 0.839357 11.2992 0.924489 11.4548 1.07944C11.6106 1.23423 11.6969 1.44566 11.6941 1.66516V2.19209H6.29829V1.66516ZM12.984 17.1569H5.0083C4.28755 17.1569 3.72687 16.5378 3.72687 15.7447V5.39582H14.2655V15.7447C14.2655 16.5378 13.7048 17.1569 12.984 17.1569ZM14.6954 4.55273H3.29692C2.87785 4.55273 2.53814 4.21303 2.53814 3.79395C2.53814 3.37488 2.87785 3.03517 3.29692 3.03517H14.6954C15.1145 3.03517 15.4542 3.37488 15.4542 3.79395C15.4542 4.21303 15.1145 4.55273 14.6954 4.55273Z" fill="#8F8F8F"/>
									<path d="M8.99673 6.52148C8.7639 6.52148 8.5752 6.71019 8.5752 6.94303V14.9102C8.5752 15.1429 8.7639 15.3318 8.99673 15.3318C9.22957 15.3318 9.41827 15.1429 9.41827 14.9102V6.94303C9.41827 6.71019 9.22957 6.52148 8.99673 6.52148Z" fill="#8F8F8F"/>
									</g>
									<defs>
									<clipPath id="clip0">
									<rect width="18" height="18" fill="white"/>
									</clipPath>
									</defs>
									</svg></a>',
									esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
									esc_html__( 'Remove this item', 'woocommerce' ),
									esc_attr( $product_id ),
									esc_attr( $_product->get_sku() )
								),
								$cart_item_key
							);
						?>
						
					</td>	
					<td class="product-thumbnail goods-img">
						<?php
						$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

						if ( ! $product_permalink ) {
							echo $thumbnail; // PHPCS: XSS ok.
						} else {
							printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail ); // PHPCS: XSS ok.
						}
						?>
					</td>
					<td class="product-name">
						<?php echo apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
						<?php echo apply_filters( 'woocommerce_checkout_cart_item_quantity', ' <strong class="product-quantity">' . sprintf( '&times;&nbsp;%s', $cart_item['quantity'] ) . '</strong>', $cart_item, $cart_item_key ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
						<?php echo wc_get_formatted_cart_item_data( $cart_item ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					</td>
					<td class="product-total">
						<?php echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					</td>
					
				</tr>
				<?php
			}
		}

		do_action( 'woocommerce_review_order_after_cart_contents' );
		?>
	</tbody>
	<tfoot class="ordering-right__bottom">

		<?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
			<tr class="cart-discount coupon-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
				<th><?php wc_cart_totals_coupon_label( $coupon ); ?></th>
				<td><?php wc_cart_totals_coupon_html( $coupon ); ?></td>
			</tr>
		<?php endforeach; ?>

		<?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>

			<?php do_action( 'woocommerce_review_order_before_shipping' ); ?>

			<?php wc_cart_totals_shipping_html(); ?>

			<?php do_action( 'woocommerce_review_order_after_shipping' ); ?>

		<?php endif; ?>

		<?php foreach ( WC()->cart->get_fees() as $fee ) : ?>
			<tr class="fee">
				<th><?php echo esc_html( $fee->name ); ?></th>
				<td><?php wc_cart_totals_fee_html( $fee ); ?></td>
			</tr>
		<?php endforeach; ?>

		<?php if ( wc_tax_enabled() && ! WC()->cart->display_prices_including_tax() ) : ?>
			<?php if ( 'itemized' === get_option( 'woocommerce_tax_total_display' ) ) : ?>
				<?php foreach ( WC()->cart->get_tax_totals() as $code => $tax ) : // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited ?>
					<tr class="tax-rate tax-rate-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
						<th><?php echo esc_html( $tax->label ); ?></th>
						<td><?php echo wp_kses_post( $tax->formatted_amount ); ?></td>
					</tr>
				<?php endforeach; ?>
			<?php else : ?>
				<tr class="tax-total">
					<th><?php echo esc_html( WC()->countries->tax_or_vat() ); ?></th>
					<td><?php wc_cart_totals_taxes_total_html(); ?></td>
				</tr>
			<?php endif; ?>
		<?php endif; ?>

		<?php do_action( 'woocommerce_review_order_before_order_total' ); ?>

		<tr class="order-total ordering-right__bottom-wrap">
			<th class="ordering-right__total-text"><?php esc_html_e(pll__( 'Разом до сплати:', 'woocommerce' )); ?></th>
			<td class="ordering-right__total-price"><?php wc_cart_totals_order_total_html(); ?></td>
		</tr>

		<?php do_action( 'woocommerce_review_order_after_order_total' ); ?>

	</tfoot>
</table>

