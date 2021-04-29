<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
 
	
do_action( 'woocommerce_before_checkout_form', $checkout ); ?>
<div class="page-container">
	<?php get_breadcrumbs(); ?>
	<section class="ordering">
	<?php 

	the_title( '<h1 class="page-title">', '</h1>' ); 

// If checkout registration is disabled and not logged in, the user cannot checkout.
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
	return;
}

?>

<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">

	<?php if ( $checkout->get_checkout_fields() ) : ?>

	<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>
	<div class="ordering__form">
		<div class="col2-set ordering-left" id="customer_details">
			<div class="col-1">
				<?php do_action( 'woocommerce_checkout_billing' ); ?>
			</div>

			<div class="col-2">
				<?php do_action( 'woocommerce_checkout_shipping' ); ?>
			</div>
		</div>

		<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

		<?php endif; ?>
		
		<?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>
		
		<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

		<div id="order_review" class="woocommerce-checkout-review-order ordering-right">
			<div class="ordering-right__wrap">
				<div class="ordering-right__top">
					<h3 class="ordering-right__title" id="order_review_heading"><?php esc_html_e(pll__( 'Ваш кошик', 'woocommerce' )); ?></h3>
					<p class="ordering-right__text">
						<?php echo WC()->cart->get_cart_contents_count(); ?><?php esc_html_e(pll__( '&nbsp;товари', 'woocommerce' )); ?>
					</p>
				</div>
				<?php do_action( 'woocommerce_checkout_order_review' ); ?>
			</div>
			<div class="return-to-shop__container">
				<p class="return-to-shop">
					<a class="button wc-backward" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>">
						<?php
							/**
							 * Filter "Return To Shop" text.
							 *
							 * @since 4.6.0
							 * @param string $default_text Default text.
							 */
							echo esc_html( apply_filters( 'woocommerce_return_to_shop_text', pll__( 'Повернутися до покупок', 'woocommerce' ) ) );
						?>
					</a>
				</p>
			</div>
		</div>
	</div>	
	<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>

</form>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>

	</section>
