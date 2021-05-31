<?php

/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;
global $product;


// Ensure visibility.
if (empty($product) || !$product->is_visible()) {
  return;
}

?>



<li <?php wc_product_class('card-product cat-prod__item', $product); ?>>
  <?php
  do_action('woocommerce_before_shop_loop_item');
  ?>

  <a href="<?php the_permalink(); ?>" class="card-product__img-wrap">
    <?php echo get_the_post_thumbnail(get_the_ID(), 'post_827x620', array('class' => 'card-product__img',)); ?>
    <?php my_sale_badge();  ?>
  </a>

  <a href="<?php the_permalink(); ?>" class="card-product__title"><?php the_title(); ?></a>

  <div class="card-product__prices">
    <?php echo $product->get_price_html(); ?>
  </div>
  <div class="card-product__buttons">
    <div class="card-product__stock-wrap">
      <img src="<?php bloginfo('template_url') ?>/img/icons/in-stock.svg" alt="icon" class="card-product__stock-icon">
      <?php
      if (get_post_meta(get_the_ID(), '_stock_status', true) == 'outofstock') {
        echo '<span class="card-product__stock-text out-stock-color--stock">' . pll__('out_stock_cat') . ' </span>';
      } else {
        echo '<span class="card-product__stock-text">' . pll__('instore_single') . '</span>';
      }
      ?>
    </div>



    <?php
    do_action('woocommerce_after_shop_loop_item');
    ?>
  </div>
</li>