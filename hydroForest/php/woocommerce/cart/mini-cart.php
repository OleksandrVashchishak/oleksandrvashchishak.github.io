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
 * @version 5.2.0
 */

defined('ABSPATH') || exit;

do_action('woocommerce_before_mini_cart'); ?>

<?php if (!WC()->cart->is_empty()) : ?>

  <ul class="woocommerce-mini-cart cart_list product_list_widget <?php echo esc_attr($args['list_class']); ?>">
    <?php
    do_action('woocommerce_before_mini_cart_contents');

    foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
      $_product   = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
      $product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);

      if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key)) {
        $product_name      = apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key);
        $thumbnail         = apply_filters('woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key);
        $product_price     = apply_filters('woocommerce_cart_item_price', WC()->cart->get_product_price($_product), $cart_item, $cart_item_key);
        $product_permalink = apply_filters('woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink($cart_item) : '', $cart_item, $cart_item_key);
    ?>
        <li class="woocommerce-mini-cart-item <?php echo esc_attr(apply_filters('woocommerce_mini_cart_item_class', 'mini_cart_item', $cart_item, $cart_item_key)); ?>">
          <?php
          echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            'woocommerce_cart_item_remove_link',
            sprintf(
              '<a href="%s" class="remove remove_from_cart_button" aria-label="%s" data-product_id="%s" data-cart_item_key="%s" data-product_sku="%s"><svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M7.0838 1.02618H9.925V1.50426H10.9511V0.959259C10.9512 0.430344 10.5211 0 9.99245 0H7.01636C6.4877 0 6.05762 0.430344 6.05762 0.959259V1.50426H7.0838V1.02618Z" fill="#B1BDC9"/>
              <path d="M13.3198 5.56982H3.6873C3.42336 5.56982 3.21558 5.79498 3.23685 6.05814L4.04216 16.016C4.08703 16.5719 4.55071 17 5.10777 17H11.8992C12.4563 17 12.92 16.5719 12.9648 16.0158L13.7702 6.05814C13.7916 5.79498 13.5838 5.56982 13.3198 5.56982ZM6.01969 15.9379C6.00892 15.9385 5.99816 15.9389 5.98752 15.9389C5.71853 15.9389 5.49272 15.7295 5.47599 15.4574L4.97133 7.28251C4.95395 6.99963 5.16912 6.75619 5.45186 6.73881C5.7337 6.72169 5.97818 6.93634 5.99556 7.21935L6.5001 15.3942C6.51761 15.6771 6.30243 15.9204 6.01969 15.9379ZM9.02237 15.4258C9.02237 15.7091 8.79267 15.9388 8.50927 15.9388C8.22588 15.9388 7.99618 15.7091 7.99618 15.4258V7.25086C7.99618 6.96747 8.22588 6.73777 8.50927 6.73777C8.79254 6.73777 9.02237 6.96747 9.02237 7.25086V15.4258ZM12.0358 7.28108L11.554 15.4559C11.538 15.7286 11.3118 15.9388 11.0423 15.9388C11.0322 15.9388 11.0219 15.9385 11.0117 15.938C10.7288 15.9213 10.513 15.6785 10.5297 15.3956L11.0114 7.22064C11.028 6.93777 11.2701 6.72195 11.5537 6.73868C11.8366 6.75528 12.0524 6.99821 12.0358 7.28108Z" fill="#B1BDC9"/>
              <path d="M15.0957 3.98665L14.7588 2.97655C14.6699 2.71027 14.4206 2.53064 14.1398 2.53064H2.87037C2.5897 2.53064 2.34028 2.71027 2.25157 2.97655L1.91461 3.98665C1.84963 4.18146 1.93419 4.38016 2.09204 4.47925C2.15637 4.51959 2.2325 4.54384 2.31616 4.54384H14.6942C14.7778 4.54384 14.8541 4.51959 14.9183 4.47912C15.0761 4.38003 15.1607 4.18133 15.0957 3.98665Z" fill="#B1BDC9"/>
              </svg></a>',
              esc_url(wc_get_cart_remove_url($cart_item_key)),
              esc_attr__('Remove this item', 'woocommerce'),
              esc_attr($product_id),
              esc_attr($cart_item_key),
              esc_attr($_product->get_sku())
            ),
            $cart_item_key
          );
          ?>
          <?php if (empty($product_permalink)) : ?>
            <?php echo $thumbnail; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
            ?>
            
          <?php else : ?>
            <a href="<?php echo esc_url($product_permalink); ?>">
              <?php echo $thumbnail; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
              ?>
            </a>
          <?php endif; ?>


          <div class="column-flex-mini-cart">
          <?php if (empty($product_permalink)) : ?>
            <?php echo  wp_kses_post($product_name); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
            ?>
          <?php else : ?>
            <a href="<?php echo esc_url($product_permalink); ?>">
              <?php echo wp_kses_post($product_name); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
              ?>
            </a>

          <?php endif; ?>
          <?php echo wc_get_formatted_cart_item_data($cart_item); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
          ?>
          <?php echo apply_filters('woocommerce_widget_cart_item_quantity', '<span class="quantity">' . sprintf(' %s',  $product_price) . '</span>', $cart_item, $cart_item_key); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
          ?>
          </div>
        </li>
    <?php
      }
    }

    do_action('woocommerce_mini_cart_contents');
    ?>
  </ul>

  <p class="woocommerce-mini-cart__total total">
  <strong class="mini-cart__my-text-total"> <?php echo pll__('total-mini-cart'); ?> </strong>
    <?php
    /**
     * Hook: woocommerce_widget_shopping_cart_total.
     *
     * @hooked woocommerce_widget_shopping_cart_subtotal - 10
     */
    do_action('woocommerce_widget_shopping_cart_total');
    ?>
 
  </p>

  <?php do_action('woocommerce_widget_shopping_cart_before_buttons'); ?>

  <p class="woocommerce-mini-cart__buttons buttons"><?php do_action('woocommerce_widget_shopping_cart_buttons'); ?></p>

  <?php do_action('woocommerce_widget_shopping_cart_after_buttons'); ?>

<?php else : ?>

  <p class="woocommerce-mini-cart__empty-message"><?php esc_html_e('No products in the cart.', 'woocommerce'); ?></p>

<?php endif; ?>

<?php do_action('woocommerce_after_mini_cart'); ?>