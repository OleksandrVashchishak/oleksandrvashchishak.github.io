<?php
/**
 * Mini-cart
 *
 * Contains the markup for the mini-cart, used by the cart widget.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/mini-cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.7.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_mini_cart' ); ?>
 <div class="ordering-right__wrap">
	<div class="flex justify center">
		<?php if ( ! WC()->cart->is_empty() ) : ?>
			<h3 class="ordering-right__title">
				<?php echo esc_html_e(pll__('Ваш кошик', 'woocommerce')); ?>
			</h3>
			<button class="ordering-right__close"></button>
	</div>
	<ul class="woocommerce-mini-cart cart_list product_list_widget <?php echo esc_attr( $args['list_class'] ); ?>">
		<?php
		do_action( 'woocommerce_before_mini_cart_contents' );

		foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
			$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
			$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

			if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
				$product_name      = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );
				$thumbnail         = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
				$product_price     = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
				$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
				?>
				<li class="woocommerce-mini-cart-item <?php echo esc_attr( apply_filters( 'woocommerce_mini_cart_item_class', 'mini_cart_item', $cart_item, $cart_item_key ) ); ?>">
					<div class="flex goods__top">
						<?php
						echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
							'woocommerce_cart_item_remove_link',
							sprintf(
								'<a href="%s" class="remove remove_from_cart_button" aria-label="%s" data-product_id="%s" data-cart_item_key="%s" data-product_sku="%s"><svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
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
								esc_attr__( 'Remove this item', 'woocommerce' ),
								esc_attr( $product_id ),
								esc_attr( $cart_item_key ),
								esc_attr( $_product->get_sku() )
							),
							$cart_item_key
						);
						?>
						<p class="goods-cod">
							<?php echo $_product->get_sku(); ?>
						</p>
					</div>
					<div class="mini-cart__img">
						<?php if ( empty( $product_permalink ) ) : ?>
							<?php echo $thumbnail . $product_name; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
						<?php else : ?>
							<a href="<?php echo esc_url( $product_permalink ); ?>" class="goods-img">
								<?php echo $thumbnail; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
							</a>
							<a href="<?php echo esc_url( $product_permalink ); ?>" class="goods-title">
								<?php echo $product_name; ?>
							</a>
						<?php endif; ?>
					</div>
					<?php echo wc_get_formatted_cart_item_data( $cart_item ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					<?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="quantity goods-count">' . sprintf( '%s шт %s', $cart_item['quantity'], $product_price ) . '</span>', $cart_item, $cart_item_key ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>		
				</li>
				<?php
			}
		}

		do_action( 'woocommerce_mini_cart_contents' );
		?>
	</ul>
</div>
<div class="ordering-right__bottom active">
	<div class="ordering-right__bottom-wrap">
		<p class="woocommerce-mini-cart__total total ordering-right__total">
			<?php
			/**
			 * Hook: woocommerce_widget_shopping_cart_total.
			 *
			 * @hooked woocommerce_widget_shopping_cart_subtotal - 10
			 */
			do_action( 'woocommerce_widget_shopping_cart_total' );
			?>
		</p>
	</div>

	<?php do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>

		<p class="woocommerce-mini-cart__buttons buttons"><?php do_action( 'woocommerce_widget_shopping_cart_buttons' ); ?></p>

		<?php do_action( 'woocommerce_widget_shopping_cart_after_buttons' ); ?>

</div>

<?php else : ?>

	<p class="woocommerce-mini-cart__empty-message"><?php esc_html_e( 'No products in the cart.', 'woocommerce' ); ?></p>

<?php endif; ?>

<?php do_action( 'woocommerce_after_mini_cart' ); ?>
