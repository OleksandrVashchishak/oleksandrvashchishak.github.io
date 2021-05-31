<?php

/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
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

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action('woocommerce_before_single_product');

if (post_password_required()) {
  echo get_the_password_form(); // WPCS: XSS ok.
  return;
}
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class('', $product); ?>>
  <?php
  // output galery
  $metas = explode(',', get_post_meta($post->ID, '_product_image_gallery')[0]);
  $galegy = array();
  $galegy[] =  array(
    'thumb' => wp_get_attachment_image_src(get_post_meta($post->ID, '_thumbnail_id')[0], 'slide_product_thumb')[0],
    'full' => wp_get_attachment_image_src(get_post_meta($post->ID, '_thumbnail_id')[0], 'slide_product_full')[0],
    'type' => 'photo',
    'url' => ''

  );
  if ($metas != ['']) {
    foreach ($metas as $key) {
      $galegy[] =  array(
        'thumb' => wp_get_attachment_image_src($key, 'slide_product_thumb')[0],
        'full' => wp_get_attachment_image_src($key, 'slide_product_full')[0],
        'type' => 'photo'

      );
    }
  }
  ?>
  <div class="gray--bg-main-first gray--bg">
    <div class="container">
      <nav class="breadcrumbs  ">
        <a href="index.html" class="breadcrumbs__home">
          <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0)">
              <path d="M16.4816 8.27283V17.5905H12.9635V13.5607C12.9635 13.2074 12.6771 12.921 12.3239 12.921H7.82492C7.4716 12.921 7.18527 13.2074 7.18527 13.5607V17.5905H3.68848V8.27283H2.40918V18.2302C2.40918 18.5835 2.69555 18.8698 3.04883 18.8698H7.82496C8.17828 18.8698 8.46461 18.5835 8.46461 18.2302V14.2004H11.6842V18.2302C11.6842 18.5835 11.9706 18.8699 12.3239 18.8699H17.1213C17.4746 18.8699 17.761 18.5835 17.761 18.2302V8.27283H16.4816Z" fill="#222222" />
              <path d="M19.7975 9.9808L10.5224 1.30279C10.2782 1.074 9.89871 1.07252 9.65246 1.29873L0.206833 9.97677C-0.0532847 10.2158 -0.070355 10.6203 0.168668 10.8804C0.294684 11.0179 0.46695 11.0874 0.639879 11.0874C0.79445 11.0874 0.949684 11.0316 1.0725 10.9188L10.0814 2.64201L18.9234 10.9149C19.1819 11.1565 19.5861 11.1427 19.8275 10.8849C20.0687 10.6269 20.0554 10.2222 19.7975 9.9808Z" fill="#222222" />
            </g>
            <defs>
              <clipPath id="clip0">
                <rect width="20" height="20" fill="white" />
              </clipPath>
            </defs>
          </svg>
        </a>
        <span class="breadcrumbs__separator">
          <svg width="6" height="6" viewBox="0 0 6 6" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect width="6" height="6" rx="2" fill="#222222" />
          </svg>

        </span>
        <?php
        if (function_exists('bcn_display')) {
          bcn_display();
        }
        ?>
      </nav>
    </div>
    <div class="container">
      <div class="product-top ">
        <div class="product-top__left">
          <div class="product-top__for">
            <?php
            foreach ($galegy as $key) {
              if ($key['type'] == 'photo') {
                echo '<div class="product-top__for-item">';
                echo  '<img src="' . $key['full'] . '"  class="product-top__for-img" alt="img" />';
                echo '</div>';
              }
            }
            ?>
          </div>
          <div class="product-top__nav">
            <?php
            foreach ($galegy as $key) {
              if ($key['type'] == 'photo') {
                echo '<div class="product-top__nav-item">';
                echo  '<img src="' . $key['full'] . '"  class="product-top__nav-img" alt="img" />';
                echo '</div>';
              }
            }
            ?>

          </div>
        </div>

        <div class="product-top__right">
          <h1 class="product-top__name"><?php the_title(); ?></h1>
          <p class="product-top__cat"><?php echo wc_get_product_category_list($product->get_id()); ?></p>

          <div class="product-top__in-store">
            <img src="<?php bloginfo('template_url'); ?>/img/icons/in-stock.svg" class="product-top__in-store-icon" alt="icon">
            <?php
            if (get_post_meta(get_the_ID(), '_stock_status', true) == 'outofstock') {
              echo '<span class="product-top__in-store-text">' . pll__('out_stock_cat') . ' </span>';
            } else {
              echo '<span class="product-top__in-store-text">' . pll__('instore_single') . '</span>';
            }
            ?>

          </div>

          <h3 class="product-top__price"><?php echo $product->get_price_html(); ?></h3>

          <div class="product-top__qty-df">
            <p class="product-top__amount-text"><?php echo pll__('amount_single'); ?></p>

            <form class="cart" action="<?php echo esc_url(apply_filters('woocommerce_add_to_cart_form_action', $product->get_permalink())); ?>" method="post" enctype='multipart/form-data'>
              <?php do_action('woocommerce_before_add_to_cart_button'); ?>
              <div class="product-top__number-wrap">
                <?php
                do_action('woocommerce_before_add_to_cart_quantity');

                woocommerce_quantity_input(
                  array(
                    'min_value'   => apply_filters('woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product),
                    'max_value'   => apply_filters('woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product),
                    'input_value' => isset($_POST['quantity']) ? wc_stock_amount(wp_unslash($_POST['quantity'])) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
                  )
                );

                do_action('woocommerce_after_add_to_cart_quantity');
                ?>
              </div>
              <button type="submit" name="add-to-cart" value="<?php echo esc_attr($product->get_id()); ?>" class="single_add_to_cart_button product-top__buy  alt">
                <img src="<?php bloginfo('template_url'); ?>/img/icons/buy-icon.svg" class="card-product__buy-icon" alt="buy-product">
                <span class="card-product__buy-text"><?php echo pll__('buy_single'); ?></span>
              </button>

              <?php do_action('woocommerce_after_add_to_cart_button'); ?>
            </form>


          </div>

          <div class="product-top__attr-cont">
            <?php
            $args = array('hide_empty' => 0);
            $terms = get_terms('product_tag', $args);
            if (!empty($terms) && !is_wp_error($terms)) {
              foreach ($terms as $term) {
                $term_list .= '<span class="product-top__attr">' . $term->name . '</span>';
              }
              echo $term_list;
            }
            ?>
          </div>



        </div>
      </div>

      <div class="product-info">
        <div class="nav-title">
          <span class="nav-title__line"></span>
          <p class="nav-title__text"><?php echo pll__('product_information_single'); ?></p>
        </div>
        <h3 class="product-info__title  st-title"><?php echo pll__('general_information_single'); ?></h3>
        <p class="product-info__description">
          <?php echo $product->post->post_content; ?>
        </p>

      </div>

      <div class="product-attr">
        <div class="nav-title">
          <span class="nav-title__line"></span>
          <p class="nav-title__text"><?php echo pll__('details_single'); ?></p>
        </div>
        <h3 class="product-attr__title  st-title"><?php the_title(); ?></h3>

        <div class="product-attr__cont">
          <?php
          $attributes = $product->get_attributes();
          foreach ($attributes as $attribute) :
          ?>
            <div class="product-attr__item">
              <span class="product-attr__name">
                <?php echo wc_attribute_label($attribute['name']); ?>
                :</span>
              <?php
              if ($attribute['is_taxonomy']) {
                echo '<span class="product-attr__value">';
                $values = wc_get_product_terms($product->id, $attribute['name'], array('fields' => 'names'));
                echo apply_filters('woocommerce_attribute', wpautop(wptexturize(implode(', ', $values))), $attribute, $values);
                echo '</span>';
              } else {
                echo '<span class="product-attr__value">';
                $values = array_map('trim', explode(WC_DELIMITER, $attribute['value']));
                echo apply_filters('woocommerce_attribute', wpautop(wptexturize(implode(', ', $values))), $attribute, $values);
                echo '</span>';
              }
              ?>
            </div>
          <?php endforeach; ?>

        </div>
      </div>
    </div>

    <section class="tabs-sliders tabs-sliders-product container">
      <div class="nav-title">
        <span class="nav-title__line"></span>
        <p class="nav-title__text">Catalog preview</p>
      </div>

      <h3 class="tabs-sliders__title  st-title">Most popular</h3>
      <div class="tabs-sliders__tab  active">
        <div class="tabs-sliders__slider tabs-sliders__slider-2">
          <div class="tabs-sliders__slider-item card-product">
            <a href="#" class="card-product__img-wrap">
              <img src="img/products/chainsaw-2.png" class="card-product__img" alt="product">
              <span class="card-product__sale-percent">-2%</span>
            </a>
            <a href="#" class="card-product__title">STIHL MS 400 CM CHAINSAW</a>
            <div class="card-product__prices">
              <p class="card-product__price-main">€ 999.00</p>
              <p class="card-product__price-old">€ 1,099.00</p>
            </div>
            <div class="card-product__buttons">
              <div class="card-product__stock-wrap">
                <img src="img/icons/in-stock.svg" alt="icon" class="card-product__stock-icon">
                <span class="card-product__stock-text">In store</span>
              </div>
              <button class="card-product__buy">
                <img src="img/icons/buy-icon.svg" class="card-product__buy-icon" alt="buy-product">
                <span class="card-product__buy-text">Buy</span>
              </button>
            </div>
          </div>
          <div class="tabs-sliders__slider-item card-product">
            <a href="#" class="card-product__img-wrap">
              <img src="img/products/chainsaw-3.png" class="card-product__img" alt="product">
              <span class="card-product__sale-percent">-9%</span>
            </a>
            <a href="#" class="card-product__title">STIHL MS 400 CM CHAINSAW</a>
            <div class="card-product__prices">
              <p class="card-product__price-main">€ 999.00</p>
              <p class="card-product__price-old">€ 1,099.00</p>
            </div>
            <div class="card-product__buttons">
              <div class="card-product__stock-wrap">
                <img src="img/icons/in-stock.svg" alt="icon" class="card-product__stock-icon">
                <span class="card-product__stock-text">In store</span>
              </div>
              <button class="card-product__buy">
                <img src="img/icons/buy-icon.svg" class="card-product__buy-icon" alt="buy-product">
                <span class="card-product__buy-text">Buy</span>
              </button>
            </div>
          </div>
          <div class="tabs-sliders__slider-item card-product">
            <a href="#" class="card-product__img-wrap">
              <img src="img/products/chainsaw-4.png" class="card-product__img" alt="product">
              <span class="card-product__sale-percent">-9%</span>
            </a>
            <a href="#" class="card-product__title">STIHL MS 400 CM CHAINSAW</a>
            <div class="card-product__prices">
              <p class="card-product__price-main">€ 999.00</p>
              <p class="card-product__price-old">€ 1,099.00</p>
            </div>
            <div class="card-product__buttons">
              <div class="card-product__stock-wrap">
                <img src="img/icons/in-stock.svg" alt="icon" class="card-product__stock-icon">
                <span class="card-product__stock-text">In store</span>
              </div>
              <button class="card-product__buy">
                <img src="img/icons/buy-icon.svg" class="card-product__buy-icon" alt="buy-product">
                <span class="card-product__buy-text">Buy</span>
              </button>
            </div>
          </div>
          <div class="tabs-sliders__slider-item card-product">
            <a href="#" class="card-product__img-wrap">
              <img src="img/products/chainsaw-1.png" class="card-product__img" alt="product">
              <span class="card-product__sale-percent">-9%</span>
            </a>
            <a href="#" class="card-product__title">STIHL MS 400 CM CHAINSAW</a>
            <div class="card-product__prices">
              <p class="card-product__price-main">€ 999.00</p>
              <p class="card-product__price-old">€ 1,099.00</p>
            </div>
            <div class="card-product__buttons">
              <div class="card-product__stock-wrap">
                <img src="img/icons/in-stock.svg" alt="icon" class="card-product__stock-icon">
                <span class="card-product__stock-text">In store</span>
              </div>
              <button class="card-product__buy">
                <img src="img/icons/buy-icon.svg" class="card-product__buy-icon" alt="buy-product">
                <span class="card-product__buy-text">Buy</span>
              </button>
            </div>
          </div>
          <div class="tabs-sliders__slider-item card-product">
            <a href="#" class="card-product__img-wrap">
              <img src="img/products/chainsaw-2.png" class="card-product__img" alt="product">
              <span class="card-product__sale-percent">-9%</span>
            </a>
            <a href="#" class="card-product__title">STIHL MS 400 CM CHAINSAW</a>
            <div class="card-product__prices">
              <p class="card-product__price-main">€ 999.00</p>
              <p class="card-product__price-old">€ 1,099.00</p>
            </div>
            <div class="card-product__buttons">
              <div class="card-product__stock-wrap">
                <img src="img/icons/in-stock.svg" alt="icon" class="card-product__stock-icon">
                <span class="card-product__stock-text">In store</span>
              </div>
              <button class="card-product__buy">
                <img src="img/icons/buy-icon.svg" class="card-product__buy-icon" alt="buy-product">
                <span class="card-product__buy-text">Buy</span>
              </button>
            </div>
          </div>
          <div class="tabs-sliders__slider-item card-product">
            <a href="#" class="card-product__img-wrap">
              <img src="img/products/chainsaw-3.png" class="card-product__img" alt="product">
              <span class="card-product__sale-percent">-9%</span>
            </a>
            <a href="#" class="card-product__title">STIHL MS 400 CM CHAINSAW</a>
            <div class="card-product__prices">
              <p class="card-product__price-main">€ 999.00</p>
              <p class="card-product__price-old">€ 1,099.00</p>
            </div>
            <div class="card-product__buttons">
              <div class="card-product__stock-wrap">
                <img src="img/icons/in-stock.svg" alt="icon" class="card-product__stock-icon">
                <span class="card-product__stock-text">In store</span>
              </div>
              <button class="card-product__buy">
                <img src="img/icons/buy-icon.svg" class="card-product__buy-icon" alt="buy-product">
                <span class="card-product__buy-text">Buy</span>
              </button>
            </div>
          </div>
          <div class="tabs-sliders__slider-item card-product">
            <a href="#" class="card-product__img-wrap">
              <img src="img/products/chainsaw-4.png" class="card-product__img" alt="product">
              <span class="card-product__sale-percent">-9%</span>
            </a>
            <a href="#" class="card-product__title">STIHL MS 400 CM CHAINSAW</a>
            <div class="card-product__prices">
              <p class="card-product__price-main">€ 999.00</p>
              <p class="card-product__price-old">€ 1,099.00</p>
            </div>
            <div class="card-product__buttons">
              <div class="card-product__stock-wrap">
                <img src="img/icons/in-stock.svg" alt="icon" class="card-product__stock-icon">
                <span class="card-product__stock-text">In store</span>
              </div>
              <button class="card-product__buy">
                <img src="img/icons/buy-icon.svg" class="card-product__buy-icon" alt="buy-product">
                <span class="card-product__buy-text">Buy</span>
              </button>
            </div>
          </div>
          <div class="tabs-sliders__slider-item card-product">
            <a href="#" class="card-product__img-wrap">
              <img src="img/products/chainsaw-1.png" class="card-product__img" alt="product">
              <span class="card-product__sale-percent">-9%</span>
            </a>
            <a href="#" class="card-product__title">STIHL MS 400 CM CHAINSAW</a>
            <div class="card-product__prices">
              <p class="card-product__price-main">€ 999.00</p>
              <p class="card-product__price-old">€ 1,099.00</p>
            </div>
            <div class="card-product__buttons">
              <div class="card-product__stock-wrap">
                <img src="img/icons/in-stock.svg" alt="icon" class="card-product__stock-icon">
                <span class="card-product__stock-text">In store</span>
              </div>
              <button class="card-product__buy">
                <img src="img/icons/buy-icon.svg" class="card-product__buy-icon" alt="buy-product">
                <span class="card-product__buy-text">Buy</span>
              </button>
            </div>
          </div>
          <div class="tabs-sliders__slider-item card-product">
            <a href="#" class="card-product__img-wrap">
              <img src="img/products/chainsaw-2.png" class="card-product__img" alt="product">
              <span class="card-product__sale-percent">-9%</span>
            </a>
            <a href="#" class="card-product__title">STIHL MS 400 CM CHAINSAW</a>
            <div class="card-product__prices">
              <p class="card-product__price-main">€ 999.00</p>
              <p class="card-product__price-old">€ 1,099.00</p>
            </div>
            <div class="card-product__buttons">
              <div class="card-product__stock-wrap">
                <img src="img/icons/in-stock.svg" alt="icon" class="card-product__stock-icon">
                <span class="card-product__stock-text">In store</span>
              </div>
              <button class="card-product__buy">
                <img src="img/icons/buy-icon.svg" class="card-product__buy-icon" alt="buy-product">
                <span class="card-product__buy-text">Buy</span>
              </button>
            </div>
          </div>
          <div class="tabs-sliders__slider-item card-product">
            <a href="#" class="card-product__img-wrap">
              <img src="img/products/chainsaw-3.png" class="card-product__img" alt="product">
              <span class="card-product__sale-percent">-9%</span>
            </a>
            <a href="#" class="card-product__title">STIHL MS 400 CM CHAINSAW</a>
            <div class="card-product__prices">
              <p class="card-product__price-main">€ 999.00</p>
              <p class="card-product__price-old">€ 1,099.00</p>
            </div>
            <div class="card-product__buttons">
              <div class="card-product__stock-wrap">
                <img src="img/icons/in-stock.svg" alt="icon" class="card-product__stock-icon">
                <span class="card-product__stock-text">In store</span>
              </div>
              <button class="card-product__buy">
                <img src="img/icons/buy-icon.svg" class="card-product__buy-icon" alt="buy-product">
                <span class="card-product__buy-text">Buy</span>
              </button>
            </div>
          </div>
          <div class="tabs-sliders__slider-item card-product">
            <a href="#" class="card-product__img-wrap">
              <img src="img/products/chainsaw-4.png" class="card-product__img" alt="product">
              <span class="card-product__sale-percent">-9%</span>
            </a>
            <a href="#" class="card-product__title">STIHL MS 400 CM CHAINSAW</a>
            <div class="card-product__prices">
              <p class="card-product__price-main">€ 999.00</p>
              <p class="card-product__price-old">€ 1,099.00</p>
            </div>
            <div class="card-product__buttons">
              <div class="card-product__stock-wrap">
                <img src="img/icons/in-stock.svg" alt="icon" class="card-product__stock-icon">
                <span class="card-product__stock-text">In store</span>
              </div>
              <button class="card-product__buy">
                <img src="img/icons/buy-icon.svg" class="card-product__buy-icon" alt="buy-product">
                <span class="card-product__buy-text">Buy</span>
              </button>
            </div>
          </div>
          <div class="tabs-sliders__slider-item card-product">
            <a href="#" class="card-product__img-wrap">
              <img src="img/products/chainsaw-1.png" class="card-product__img" alt="product">
              <span class="card-product__sale-percent">-9%</span>
            </a>
            <a href="#" class="card-product__title">STIHL MS 400 CM CHAINSAW</a>
            <div class="card-product__prices">
              <p class="card-product__price-main">€ 999.00</p>
              <p class="card-product__price-old">€ 1,099.00</p>
            </div>
            <div class="card-product__buttons">
              <div class="card-product__stock-wrap">
                <img src="img/icons/in-stock.svg" alt="icon" class="card-product__stock-icon">
                <span class="card-product__stock-text">In store</span>
              </div>
              <button class="card-product__buy">
                <img src="img/icons/buy-icon.svg" class="card-product__buy-icon" alt="buy-product">
                <span class="card-product__buy-text">Buy</span>
              </button>
            </div>
          </div>
          <div class="tabs-sliders__slider-item card-product">
            <a href="#" class="card-product__img-wrap">
              <img src="img/products/chainsaw-1.png" class="card-product__img" alt="product">
              <span class="card-product__sale-percent">-9%</span>
            </a>
            <a href="#" class="card-product__title">STIHL MS 400 CM CHAINSAW</a>
            <div class="card-product__prices">
              <p class="card-product__price-main">€ 999.00</p>
              <p class="card-product__price-old">€ 1,099.00</p>
            </div>
            <div class="card-product__buttons">
              <div class="card-product__stock-wrap">
                <img src="img/icons/in-stock.svg" alt="icon" class="card-product__stock-icon">
                <span class="card-product__stock-text">In store</span>
              </div>
              <button class="card-product__buy">
                <img src="img/icons/buy-icon.svg" class="card-product__buy-icon" alt="buy-product">
                <span class="card-product__buy-text">Buy</span>
              </button>
            </div>
          </div>
        </div>

        <div class="tabs-sliders__bottom-df">
          <div class=" tabs-sliders__count  tabs-sliders__count-slider-2">
            <span class="tabs-sliders__slider-current-slide tabs-sliders__slider-current-slide-2">1</span>
            <span class="tabs-sliders__slider-separator">/</span>
            <span class="tabs-sliders__slider-all-slide tabs-sliders__slider-all-slide-2"></span>
          </div>
        </div>
      </div>
    </section>
  </div>


</div>

<?php do_action('woocommerce_after_single_product'); ?>