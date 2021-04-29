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
<section class="page-category">
  <div class="container">
    <div class="page-category__top">
      <div class="page-category__content">
        <h2 class="page-category__title">
          <?php if (apply_filters('woocommerce_show_page_title', true)) : ?>
            <?php woocommerce_page_title(); ?>
          <?php endif; ?>
        </h2>
        <p class="page-category__text">

          <?php
          /**
           * woocommerce_archive_description hook.
           *
           * @hooked woocommerce_taxonomy_archive_description - 10
           * @hooked woocommerce_product_archive_description - 10
           */
          do_action('woocommerce_archive_description');
          ?>
        </p>
      </div>
      <div class="category__picture">
        <!-- <img src="<?php bloginfo('template_directory') ?>/assets/img/ventilation-1.png" alt="category"> -->
       
        <?php $term_id = get_queried_object()->term_id;  ?>
       
        <img src="<?php echo get_taxonomy_image($term_id)  ?>" alt="">

      </div>

    </div>
</section>
<section class="products-page">
  <div class="container products__container">
    <div class="products__left" id="products-left__filter">
      <?php

      /**
       * Hook: woocommerce_sidebar.
       *
       * @hooked woocommerce_get_sidebar - 10
       */
      do_action('woocommerce_sidebar'); ?>
    </div>
    <button class="products__left-btn">
      <svg class="svg-filter active" width="38" height="30" viewBox="0 0 38 30" fill="none" xmlns="http://www.w3.org/2000/svg">
        <line x1="0.470703" y1="3.41174" x2="37.5295" y2="3.41174" stroke="white" stroke-width="2" />
        <line x1="0.470703" y1="14.8823" x2="37.5295" y2="14.8823" stroke="white" stroke-width="2" />
        <line x1="0.470703" y1="26.353" x2="37.5295" y2="26.353" stroke="white" stroke-width="2" />
        <rect x="4.88257" width="7.05882" height="7.05882" fill="white" />
        <rect x="4.88257" y="22.9412" width="7.05882" height="7.05882" fill="white" />
        <rect x="25.1765" y="11.4706" width="7.05882" height="7.05882" fill="white" />
      </svg>
      <svg class="svg-filter__close" width="18" height="36" viewBox="0 0 18 36" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M3.37504 18L18 32.625V36L-4.17413e-07 18L18 0V3.37497L3.37504 18Z" fill="white" />
      </svg>
    </button>
    <div class="products-right">
      <div class="products-right__top">
        <div class="custom-radio">
          <span class="custom-radio__sort">
            <?php echo pll__('Сортування:', 'woocommerce'); ?>
          </span>
          <div class="custom-radio__group">
            <input id="radio-1" class="custom-radio__input visually-hidden" type="radio" name="radio" value="1">
            <label for="radio-1" class="custom-radio__text"><?php echo pll__('за популярністю', 'woocommerce'); ?></label>
          </div>
          <div class="custom-radio__group">
            <input id="radio-2" class="custom-radio__input visually-hidden" type="radio" name="radio" value="2">
            <label for="radio-2" class="custom-radio__text"><?php echo pll__('по рейтингу', 'woocommerce'); ?></label>
          </div>
          <div class="custom-radio__group">
            <input id="radio-3" type="radio" class="custom-radio__input visually-hidden" name="radio" value="3">
            <label for="radio-3" class="custom-radio__text"><?php echo pll__('від дешевих до дорогих', 'woocommerce'); ?></label>
          </div>
          <div class="custom-radio__group">
            <input id="radio-4" type="radio" class="custom-radio__input visually-hidden" name="radio" value="4">
            <label for="radio-4" class="custom-radio__text"><?php echo pll__('від дорогих до дешевих', 'woocommerce'); ?></label>
          </div>
        </div>
        <div class="icons">
          <button class="icons__btn active" data-columns="3">
            <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <rect x="0.5" y="0.5" width="5.54545" height="5.54545" fill="#E44747" stroke="#E44747" />
              <rect x="9.22705" y="0.5" width="5.54545" height="5.54545" fill="#E44747" stroke="#E44747" />
              <rect x="17.9546" y="0.5" width="5.54545" height="5.54545" fill="#E44747" stroke="#E44747" />
              <rect x="17.9546" y="9.22729" width="5.54545" height="5.54545" fill="#E44747" stroke="#E44747" />
              <rect x="17.9546" y="17.9545" width="5.54545" height="5.54545" fill="#E44747" stroke="#E44747" />
              <rect x="9.22705" y="9.22729" width="5.54545" height="5.54545" fill="#E44747" stroke="#E44747" />
              <rect x="9.22705" y="17.9545" width="5.54545" height="5.54545" fill="#E44747" stroke="#E44747" />
              <rect x="0.5" y="9.22729" width="5.54545" height="5.54545" fill="#E44747" stroke="#E44747" />
              <rect x="0.5" y="17.9545" width="5.54545" height="5.54545" fill="#E44747" stroke="#E44747" />
            </svg>
          </button>
          <button class="icons__btn" data-columns="1">
            <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <rect x="0.5" y="0.5" width="5.54545" height="5.54545" stroke="#434343" />
              <rect x="9.22754" y="0.5" width="14.2727" height="5.54545" stroke="#434343" />
              <rect x="9.22754" y="9.22729" width="14.2727" height="5.54545" stroke="#434343" />
              <rect x="9.22754" y="17.9545" width="14.2727" height="5.54545" stroke="#434343" />
              <rect x="0.5" y="9.22729" width="5.54545" height="5.54545" stroke="#434343" />
              <rect x="0.5" y="17.9545" width="5.54545" height="5.54545" stroke="#434343" />
            </svg>
          </button>
        </div>
      </div>

      <?php
      if (woocommerce_product_loop()) {

        woocommerce_product_loop_start();

        if (wc_get_loop_prop('total')) {
          while (have_posts()) {
            the_post();

            do_action('woocommerce_shop_loop');

            wc_get_template_part('content', 'product');
          }
        }

        woocommerce_product_loop_end();
      } else {

        do_action('woocommerce_no_products_found');
      } ?>
    </div>
  </div>

  <div class="container">
    <?php
    $page_id = wc_get_page_id('shop');
    if (get_field('category-mini_item', 'option')) : ?>
      <h2 class="page-title category-mini__title">
        <?php echo esc_html(pll__("Важливі Статті", 'nes')); ?>
      </h2>
      <div class="page-category__bottom">
        <div class="category-mini">
          <?php
          $page_id = wc_get_page_id('shop');
          if (get_field('category-mini_item', 'option')) : ?>
            <?php while (has_sub_field('category-mini_item', 'option')) : ?>
              <div class="category-mini__item">
                <div class="category-mini__content">
                  <?php the_sub_field('title', 'option') ?>
                  <div class="category-mini__img">
                    <img src="<?php the_sub_field('image', 'option'); ?>" alt="image">
                  </div>
                </div>
                <a href="<?php echo get_home_url(); ?>/<?php the_sub_field('link', 'option'); ?>" class="link category-mini__detail">
                  <span><?php the_sub_field('link_name', 'option'); ?></span>
                </a>

              </div>
            <?php endwhile; ?>
          <?php endif; ?>

        </div>
        <div class="counter category-mini__counter">
          <span class="counter__left category-mini__counter--left">
            01
          </span>
          /
          <span class="counter__right category-mini__counter--right"></span>
        </div>
      </div>
    <?php endif; ?>
  </div>




  <?php
  get_footer('shop');

  ?>