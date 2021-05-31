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

if (!defined('ABSPATH')) {
  exit;
}

do_action('woocommerce_before_checkout_form', $checkout);

// If checkout registration is disabled and not logged in, the user cannot checkout.
if (!$checkout->is_registration_enabled() && $checkout->is_registration_required() && !is_user_logged_in()) {
  echo esc_html(apply_filters('woocommerce_checkout_must_be_logged_in_message', __('You must be logged in to checkout.', 'woocommerce')));
  return;
}

?>

<div class="container my-cart-steps">
  <a href="<?php echo esc_url(wc_get_cart_url()); ?>" class="my-cart-step active-step">
    <?php echo pll__('shopping_cart_nav'); ?>
  </a>
  <span class="my-cart-step-separator">
    <svg width="15" height="30" viewBox="0 0 15 30" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M12.1875 15L0 27.1875V30L15 15L0 0V2.81248L12.1875 15Z" fill="#B1BDC9" />
    </svg>
  </span>
  <p class="my-cart-step active-step">
    <?php echo pll__('checkout_detales_nav'); ?>
  </p>
  <span class="my-cart-step-separator">
    <svg width="15" height="30" viewBox="0 0 15 30" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M12.1875 15L0 27.1875V30L15 15L0 0V2.81248L12.1875 15Z" fill="#B1BDC9" />
    </svg>
  </span>
  <p class="my-cart-step">
    <?php echo pll__('order_complete_nav'); ?>
  </p>
</div>

<form name="checkout" method="post" class="checkout woocommerce-checkout container my-checkout" action="<?php echo esc_url(wc_get_checkout_url()); ?>" enctype="multipart/form-data">

  <?php if ($checkout->get_checkout_fields()) : ?>

    <?php do_action('woocommerce_checkout_before_customer_details'); ?>

    <div class="col2-set" id="customer_details">
      <div class="col-1">
        <?php do_action('woocommerce_checkout_billing'); ?>
      </div>

      <div class="col-2">
        <?php do_action('woocommerce_checkout_shipping'); ?>
      </div>
    </div>

    <?php do_action('woocommerce_checkout_after_customer_details'); ?>

  <?php endif; ?>

  <?php do_action('woocommerce_checkout_before_order_review_heading'); ?>


  <?php do_action('woocommerce_checkout_before_order_review'); ?>

  <div id="order_review" class="woocommerce-checkout-review-order">
    <h3 id="order_review_heading"><?php _e('Your order', 'woocommerce'); ?></h3>
    <?php do_action('woocommerce_checkout_order_review'); ?>
  </div>

  <?php do_action('woocommerce_checkout_after_order_review'); ?>

</form>

<?php do_action('woocommerce_after_checkout_form', $checkout); ?>