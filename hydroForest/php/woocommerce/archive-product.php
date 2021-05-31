<?php

/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined('ABSPATH') || exit;

get_header('shop');
?>
<?php if (is_search()) : ?>
  <?php
  do_action('woocommerce_before_main_content');
  ?>

  <div class="cart-uri-js" style="display: none;">
    <?php echo esc_url(wc_get_cart_url()); ?>
  </div>

  <div class="gray--bg gray--bg-main-first">
    <div class="container">
      <nav class="breadcrumbs breadcrumbs__category">
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
    <?php
    $category = get_queried_object();
    ?>

    <div class="products__filter-df-sort  container">
      <div class="products__filter-icon products__filter-icon-close">
        <svg width="32" height="26" viewBox="0 0 32 26" fill="none" xmlns="http://www.w3.org/2000/svg">
          <line y1="2.85718" x2="32.0002" y2="2.85718" stroke="white" stroke-width="2" />
          <line y1="12.762" x2="32.0002" y2="12.762" stroke="white" stroke-width="2" />
          <line y1="22.667" x2="32.0002" y2="22.667" stroke="white" stroke-width="2" />
          <rect x="3.80957" y="0.0476074" width="6.09528" height="6.09528" rx="3.04764" fill="white" />
          <rect x="3.80957" y="19.8572" width="6.09528" height="6.09528" rx="3.04764" fill="white" />
          <rect x="21.3335" y="9.95264" width="6.09528" height="6.09528" rx="3.04764" fill="white" />
        </svg>
      </div>

      <div class="products__sort-icon products__sort-icon-close">
        <img src="<?php bloginfo('template_url'); ?>/img/icons/sort.svg" alt="">
      </div>
    </div>
    <section class="cat-prod container">
      <div class="products__filter cat-prod__filter">
        <div class="products__filter-df">
          <h4 class="products__filter-title st-subtitle">Filters</h4>
          <div class="products__filter-icon products__filter-icon-open ">
            <svg width="14" height="28" viewBox="0 0 14 28" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M2.62503 14L14 25.375V28L0 14L14 0V2.62498L2.62503 14Z" fill="white" />
            </svg>
          </div>
        </div>
        <div class="products__accordion">
          <?php
          echo do_shortcode('[searchandfilter id="wpf_609a3bf2958ef"]')
          ?>
        </div>
        <div class="cat-prod__top">
          <h3 class="cat-prod__top-title">Top 5</h3>
          <div class="cat-prod__top-items">
            <?php $products  = new WP_Query(array(
              'post_type' => 'product',
              'post_status' => 'publish',
              'order' => 'DESC',
              'posts_per_page' => 5,
            )); ?>
            <?php if ($products->have_posts()) : $num = 1; ?>
              <?php while ($products->have_posts()) : $products->the_post();


                $products_id = get_the_ID();
                $products_img = get_the_post_thumbnail_url($products_id, 'full');
                $products_url = get_permalink($products_id);
              ?>

                <div class="cat-prod__top-item">
                  <a href="<?php echo $products_url; ?>" class="cat-prod__top-img-cont">
                    <img src="<?php echo $products_img; ?>" class="cat-prod__top-img" alt="car">
                  </a>
                  <div class="cat-prod__top-content">
                    <a href='<?php echo $products_url; ?>' class="cat-prod__top-name"> <?php the_title(); ?> </a>
                    <div class="cat-prod__top-bottom">
                      <p class="cat-prod__top-price">
                        <?php echo $product->get_price_html(); ?>
                      </p>
                      <button class="cat-prod__top-btn">
                        <span class="cat-prod__top-icon">
                          <svg width="27" height="20" viewBox="0 0 27 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.08008 1.05273H6.95312L10.988 14.7369H22.692L25.9201 5.32852" stroke="#E44747" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M12.4203 20.0002C13.315 20.0002 14.0403 19.2933 14.0403 18.4212C14.0403 17.5492 13.315 16.8423 12.4203 16.8423C11.5256 16.8423 10.8003 17.5492 10.8003 18.4212C10.8003 19.2933 11.5256 20.0002 12.4203 20.0002Z" fill="#E44747" />
                            <path d="M21.0599 20.0002C21.9546 20.0002 22.6799 19.2933 22.6799 18.4212C22.6799 17.5492 21.9546 16.8423 21.0599 16.8423C20.1652 16.8423 19.4399 17.5492 19.4399 18.4212C19.4399 19.2933 20.1652 20.0002 21.0599 20.0002Z" fill="#E44747" />
                          </svg>

                        </span>
                        <?php
                        do_action('woocommerce_after_shop_loop_item');
                        ?>
                      </button>

                    </div>
                  </div>
                </div>
              <?php endwhile; ?>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <div class="cat-prod__main">

        <div class="cat-prod__items products ">
          <?php
          if (woocommerce_product_loop()) {

            /**
             * Hook: woocommerce_before_shop_loop.
             *
             * @hooked woocommerce_output_all_notices - 10
             * @hooked woocommerce_result_count - 20
             * @hooked woocommerce_catalog_ordering - 30
             */
            do_action('woocommerce_before_shop_loop');

            woocommerce_product_loop_start();

            if (wc_get_loop_prop('total')) {
              while (have_posts()) {
                the_post();

                /**
                 * Hook: woocommerce_shop_loop.
                 */
                do_action('woocommerce_shop_loop');

                wc_get_template_part('content', 'product');
              }
            }

            woocommerce_product_loop_end();

            do_action('woocommerce_after_shop_loop');
          } else {
            do_action('woocommerce_no_products_found');
          }
          ?>
          <!-- <div class="card-product cat-prod__item cat-prod__more-ajax">
            <div class="cat-prod__more-ajax-img">
              <svg width="83" height="85" viewBox="0 0 83 85" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M81.7864 40.5407L42.0956 0.852279C41.5291 0.284889 40.8758 0 40.1374 0C39.4 0 38.7476 0.284889 38.1799 0.852279L33.9209 5.11069C33.3532 5.67838 33.0698 6.33049 33.0698 7.06971C33.0698 7.80893 33.3532 8.46104 33.9209 9.02873L67.3937 42.5006L33.9212 75.9734C33.3535 76.541 33.0701 77.1944 33.0701 77.9315C33.0701 78.6704 33.3535 79.3237 33.9212 79.8914L38.1802 84.1486C38.7476 84.7169 39.4 85 40.1377 85C40.877 85 41.5294 84.7163 42.0956 84.1486L81.7864 44.4599C82.3537 43.8925 82.6368 43.2389 82.6368 42.5009C82.6368 41.7629 82.3537 41.1096 81.7864 40.5407Z"
                  fill="#E44747" />
                <path
                  d="M49.9315 42.5009C49.9315 41.7629 49.649 41.1093 49.0792 40.5407L9.39111 0.852279C8.82372 0.284889 8.17042 0 7.43239 0C6.69437 0 6.04077 0.284889 5.47338 0.852279L1.21526 5.11099C0.646678 5.67868 0.363281 6.33079 0.363281 7.07001C0.363281 7.80923 0.646678 8.46134 1.21526 9.02903L34.6871 42.5009L1.21526 75.9734C0.646678 76.541 0.363281 77.1944 0.363281 77.9315C0.363281 78.6704 0.646678 79.3237 1.21526 79.8914L5.47308 84.1486C6.04077 84.7169 6.69407 85 7.4321 85C8.17012 85 8.82343 84.7163 9.39111 84.1486L49.0792 44.4599C49.649 43.8925 49.9315 43.2389 49.9315 42.5009Z"
                  fill="#E44747" />
              </svg>
            </div>
            <h3 class="cat-prod__more-ajax-title">Show more products</h3>
          </div>  -->

        </div>
      </div>
    </section>
  </div>

  <?php
  /**
   * Hook: woocommerce_after_main_content.
   *
   * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
   */
  do_action('woocommerce_after_main_content');

  ?>


<?php else : ?>

  <div class="gray--bg gray--bg-main-first">
    <div class="partner-bg-white container">
      <div class="partner ">

        <a href="#" class="partner__item">
          <img src="<?php the_field('parnter_1_group', 'option'); ?>" alt="partner">
        </a>
        <a href="#" class="partner__item">
          <img src="<?php the_field('parnter_2_group', 'option'); ?>" alt="partner">
        </a>
        <a href="#" class="partner__item">
          <img src="<?php the_field('parnter_3_group', 'option'); ?>" alt="partner">
        </a>
        <a href="#" class="partner__item">
          <img src="<?php the_field('parnter_4_group', 'option'); ?>" alt="partner">
        </a>
      </div>
    </div>

    <div class="container">
      <nav class="breadcrumbs  breadcrumbs__products">
        <a href="<?php echo get_home_url(); ?>" class="breadcrumbs__home">
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
            <rect width="6" height="6" rx="2" fill="#B1BDC9" />
          </svg>
        </span>
        <span class="breadcrumbs__this">
          <?php echo pll__('products_archive'); ?>
        </span>
      </nav>
    </div>
    <section class="products container">
      <h3 class="products__title st-title"> <?php echo pll__('products_archive'); ?></h3>

      <div class="products__filter-icon products__filter-icon-close active products__filter-icon--prod">
        <svg width="32" height="26" viewBox="0 0 32 26" fill="none" xmlns="http://www.w3.org/2000/svg">
          <line y1="2.85718" x2="32.0002" y2="2.85718" stroke="white" stroke-width="2" />
          <line y1="12.762" x2="32.0002" y2="12.762" stroke="white" stroke-width="2" />
          <line y1="22.667" x2="32.0002" y2="22.667" stroke="white" stroke-width="2" />
          <rect x="3.80957" y="0.0476074" width="6.09528" height="6.09528" rx="3.04764" fill="white" />
          <rect x="3.80957" y="19.8572" width="6.09528" height="6.09528" rx="3.04764" fill="white" />
          <rect x="21.3335" y="9.95264" width="6.09528" height="6.09528" rx="3.04764" fill="white" />
        </svg>
      </div>

      <div class="products__wrapper">
        <div class="products__filter products__filter-prod">
          <div class="products__filter-df">
            <h4 class="products__filter-title st-subtitle"><?php echo pll__('filters_archive'); ?></h4>
            <div class="products__filter-icon products__filter-icon-open ">

              <svg width="14" height="28" viewBox="0 0 14 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M2.62503 14L14 25.375V28L0 14L14 0V2.62498L2.62503 14Z" fill="white" />
              </svg>
            </div>
          </div>
          <div class="products__accordion">

            <?php
            $prod_cat_args = array(
              'taxonomy'    => 'product_cat',
              'orderby'     => 'id',
              'hide_empty'  => false,
              'parent'      => 0,
            );

            $woo_categories_acc = get_categories($prod_cat_args);
            foreach ($woo_categories_acc as $woo_cat) {
              $woo_cat_name = $woo_cat->name;
              $woo_cat_id = $woo_cat->term_id;
              echo ' <div class="accordion products__accordion-btn">';
              echo  $woo_cat_name;
              echo '</div>';

              $sub_cats = get_categories(array(
                'taxonomy'    => 'product_cat',
                'child_of' =>  $woo_cat_id,
                'hide_empty' => false
              ));
              echo   '<div class="accordion-panel products__accordion-panel">';
              foreach ($sub_cats as $cat) {
                echo  '<a href="' . get_term_link($cat->term_id, 'product_cat') . '" class="products__panel-item">' . $cat->name . '<span class="products__panel-item-qty"> (' . $cat->count . ')</span></a>';
              }
              echo '</div>';
              wp_reset_postdata();
            }
            ?>
          </div>
        </div>
        <div class="products__cards">
          <?php
          $prod_cat_args = array(
            'taxonomy'    => 'product_cat',
            'orderby'     => 'id',
            'hide_empty'  => false,
            'parent'      => 0
          );

          $woo_categories = get_categories($prod_cat_args);
          foreach ($woo_categories as $woo_cat) {
            $woo_cat_id = $woo_cat->term_id;
            $woo_cat_name = $woo_cat->name;
            $woo_cat_slug = $woo_cat->slug;
            $category_thumbnail_id = get_woocommerce_term_meta($woo_cat_id, 'thumbnail_id', true);
            $thumbnail_image_url = wp_get_attachment_url($category_thumbnail_id);
            echo '<a href="' . get_term_link($woo_cat_id, 'product_cat') . '" class="products__cards-item" style="background-image: url(' . $thumbnail_image_url . ')">';
            echo '<h3 class="products__cards-title">' . $woo_cat_name . '</h3>';
            echo '<p class="products__cards-text products__link-card-desktope">'. pll__('explore_all_desc') .'</p>';
            echo '<p class="products__cards-text products__link-card-mobile">'.pll__('explore_all_mobile').'</p>';
            echo '</a>';
          }
          ?>

        </div>
      </div>

    </section>


  </div>

  <section class="our-brand container">
    <div class="nav-title">
      <span class="nav-title__line"></span>
      <p class="nav-title__text"><?php the_field('pre_title-our-brand', 'option'); ?></p>
    </div>

    <h3 class="our-brand__title  st-title"><?php the_field('title-our-brand', 'option'); ?></h3>
    <div class="our-brand__brands">


      <?php
      if (have_rows('brands-our-brand', 'option')) :
        while (have_rows('brands-our-brand', 'option')) : the_row();
      ?>
          <div class="our-brand__brand-wrap">
            <img src="<?php the_sub_field('brand_logo-our-brand', 'option'); ?>" class="our-brand__brand" alt="brand">
          </div>
      <?php
        endwhile;
      else :
      endif;
      ?>


    </div>
  </section>

  <div class="gray--bg gray--bg-main-two">
    <section class="tabs-sliders container tabs-sliders-index">
      <div class="nav-title">
        <span class="nav-title__line"></span>
        <p class="nav-title__text">Catalog preview</p>
      </div>

      <h3 class="tabs-sliders__title  st-title">Most popular</h3>
      <div class="tabs-sliders__tabs">
        <span class="tabs-sliders__tabs-item ">Chainsaws</span>
        <span class="tabs-sliders__tabs-item active">Forest</span>
        <span class="tabs-sliders__tabs-item">Riders</span>
        <span class="tabs-sliders__tabs-item">Branch saws</span>
        <span class="tabs-sliders__tabs-item">Snow thrower</span>
      </div>
      <div class="tabs-sliders__tab-1 tabs-sliders__tab">
        <div class="tabs-sliders__slider tabs-sliders__slider-1">
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
            </a>
            <a href="#" class="card-product__title">HUSQVARNA 445 II 13 " CHAINSAW</a>
            <div class="card-product__prices">
              <p class="card-product__price-main">€ 399.00</p>
              <p class="card-product__price-old"></p>
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
            </a>
            <a href="#" class="card-product__title">HUSQVARNA T540XP CHAINSAW</a>
            <div class="card-product__prices">
              <p class="card-product__price-main">€ 699.00</p>
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
              <span class="card-product__sale-percent">-13%</span>
            </a>
            <a href="#" class="card-product__title">STIHL MS 201 CM CHAINSAW 12 "3/8" P</a>
            <div class="card-product__prices">
              <p class="card-product__price-main">€ 699.00</p>
              <p class="card-product__price-old">€ 799.00</p>
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
              <span class="card-product__sale-percent">-1%</span>
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
            </a>
            <a href="#" class="card-product__title">HUSQVARNA 445 II 13 " CHAINSAW</a>
            <div class="card-product__prices">
              <p class="card-product__price-main">€ 399.00</p>
              <p class="card-product__price-old"></p>
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
            </a>
            <a href="#" class="card-product__title">HUSQVARNA T540XP CHAINSAW</a>
            <div class="card-product__prices">
              <p class="card-product__price-main">€ 699.00</p>
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
              <span class="card-product__sale-percent">-13%</span>
            </a>
            <a href="#" class="card-product__title">STIHL MS 201 CM CHAINSAW 12 "3/8" P</a>
            <div class="card-product__prices">
              <p class="card-product__price-main">€ 699.00</p>
              <p class="card-product__price-old">€ 799.00</p>
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
              <span class="card-product__sale-percent">-1%</span>
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
            </a>
            <a href="#" class="card-product__title">HUSQVARNA 445 II 13 " CHAINSAW</a>
            <div class="card-product__prices">
              <p class="card-product__price-main">€ 399.00</p>
              <p class="card-product__price-old"></p>
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
            </a>
            <a href="#" class="card-product__title">HUSQVARNA T540XP CHAINSAW</a>
            <div class="card-product__prices">
              <p class="card-product__price-main">€ 699.00</p>
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
              <span class="card-product__sale-percent">-13%</span>
            </a>
            <a href="#" class="card-product__title">STIHL MS 201 CM CHAINSAW 12 "3/8" P</a>
            <div class="card-product__prices">
              <p class="card-product__price-main">€ 699.00</p>
              <p class="card-product__price-old">€ 799.00</p>
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
              <span class="card-product__sale-percent">-1%</span>
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
            </a>
            <a href="#" class="card-product__title">HUSQVARNA 445 II 13 " CHAINSAW</a>
            <div class="card-product__prices">
              <p class="card-product__price-main">€ 399.00</p>
              <p class="card-product__price-old"></p>
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
            </a>
            <a href="#" class="card-product__title">HUSQVARNA T540XP CHAINSAW</a>
            <div class="card-product__prices">
              <p class="card-product__price-main">€ 699.00</p>
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
              <span class="card-product__sale-percent">-13%</span>
            </a>
            <a href="#" class="card-product__title">STIHL MS 201 CM CHAINSAW 12 "3/8" P</a>
            <div class="card-product__prices">
              <p class="card-product__price-main">€ 699.00</p>
              <p class="card-product__price-old">€ 799.00</p>
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
          <div class=" tabs-sliders__count  tabs-sliders__count-slider-1">
            <span class="tabs-sliders__slider-current-slide tabs-sliders__slider-current-slide-1">1</span>
            <span class="tabs-sliders__slider-separator">/</span>
            <span class="tabs-sliders__slider-all-slide tabs-sliders__slider-all-slide-1"></span>
          </div>

          <a href="#" class="tabs-sliders__view">
            View all
          </a>
        </div>
      </div>
      <div class="tabs-sliders__tab-2 tabs-sliders__tab  active">
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

          <a href="#" class="tabs-sliders__view">
            View all
          </a>
        </div>
      </div>
      <div class="tabs-sliders__tab-3 tabs-sliders__tab">
        <div class="tabs-sliders__slider tabs-sliders__slider-3">
          <div class="tabs-sliders__slider-item card-product">
            <a href="#" class="card-product__img-wrap">
              <img src="img/products/chainsaw-1.png" class="card-product__img" alt="product">
              <span class="card-product__sale-percent">-3%</span>
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
          <div class=" tabs-sliders__count  tabs-sliders__count-slider-3">
            <span class="tabs-sliders__slider-current-slide tabs-sliders__slider-current-slide-3">1</span>
            <span class="tabs-sliders__slider-separator">/</span>
            <span class="tabs-sliders__slider-all-slide tabs-sliders__slider-all-slide-3"></span>
          </div>

          <a href="#" class="tabs-sliders__view">
            View all
          </a>
        </div>
      </div>
      <div class="tabs-sliders__tab-4 tabs-sliders__tab">
        <div class="tabs-sliders__slider tabs-sliders__slider-4">
          <div class="tabs-sliders__slider-item card-product">
            <a href="#" class="card-product__img-wrap">
              <img src="img/products/chainsaw-1.png" class="card-product__img" alt="product">
              <span class="card-product__sale-percent">-4%</span>
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
          <div class=" tabs-sliders__count  tabs-sliders__count-slider-4">
            <span class="tabs-sliders__slider-current-slide tabs-sliders__slider-current-slide-4">1</span>
            <span class="tabs-sliders__slider-separator">/</span>
            <span class="tabs-sliders__slider-all-slide tabs-sliders__slider-all-slide-4"></span>
          </div>

          <a href="#" class="tabs-sliders__view">
            View all
          </a>
        </div>
      </div>
      <div class="tabs-sliders__tab-5 tabs-sliders__tab">
        <div class="tabs-sliders__slider tabs-sliders__slider-5">
          <div class="tabs-sliders__slider-item card-product">
            <a href="#" class="card-product__img-wrap">
              <img src="img/products/chainsaw-1.png" class="card-product__img" alt="product">
              <span class="card-product__sale-percent">-5%</span>
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
          <div class=" tabs-sliders__count  tabs-sliders__count-slider-5">
            <span class="tabs-sliders__slider-current-slide tabs-sliders__slider-current-slide-5">1</span>
            <span class="tabs-sliders__slider-separator">/</span>
            <span class="tabs-sliders__slider-all-slide tabs-sliders__slider-all-slide-5"></span>
          </div>

          <a href="#" class="tabs-sliders__view">
            View all
          </a>
        </div>
      </div>
    </section>
  </div>

<?php endif ?>

<?php
get_footer('shop');
