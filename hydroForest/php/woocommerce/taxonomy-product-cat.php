<?php

/**
 * The Template for displaying products in a product category. Simply includes the archive template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/taxonomy-product-cat.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     4.7.0
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

get_header('shop');

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action('woocommerce_before_main_content');

?>




<div class="cart-uri-js" style="display: none;">
  <?php echo esc_url(wc_get_cart_url()); ?>
</div>

<div class="product-added-text-my" style="display: none;">
  <?php
  if (ICL_LANGUAGE_CODE == 'fin') {
    echo 'ostoskorissa';
  } elseif (ICL_LANGUAGE_CODE == 'swe') {
    echo 'i vagnen';
  }
  ?>
</div>

<header class="woocommerce-products-header">
  <?php if (apply_filters('woocommerce_show_page_title', true)) : ?>
    <h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
  <?php endif; ?>
</header>



<div class="gray--bg gray--bg-main-first">
  <div class="container">
    <nav class="breadcrumbs  breadcrumbs__category">
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

  <div class="container">
    <h3 class="category-bunner-title st-title">
      <?php echo $category->name; ?>
      <span class="category-bunner-title--index">(<?php echo $category->count; ?>)</span>
    </h3>
  </div>
  <section class="slider-bunner slider-bunner-cat container">
    <div class="slider-bunner__left">
      <div class="slider-bunner__left-slider">


        <?php
        if (have_rows('left_bunner-cat-pag', 'option')) :
          while (have_rows('left_bunner-cat-pag', 'option')) : the_row();
        ?>
            <div class="slider-bunner__left-item">
              <a href="<?php the_sub_field('link', 'option'); ?>"><img src="<?php the_sub_field('bunner', 'option'); ?>" alt="bunner">
              </a>
            </div>

        <?php
          endwhile;
        else :
        endif;
        ?>

      </div>
    </div>
    <div class="slider-bunner__right">
      <div class="slider-bunner__right-slider">
        <?php
        if (have_rows('right_bunner-cat-pag', 'option')) :
          while (have_rows('right_bunner-cat-pag', 'option')) : the_row();
        ?>
            <div class="slider-bunner__right-item">
              <a href="<?php the_sub_field('link', 'option'); ?>">
                <img src="<?php the_sub_field('bunner_mobile', 'option'); ?>" class="slider-bunner__mobile" alt="bunner">
                <img src="<?php the_sub_field('bunner', 'option'); ?>" class="slider-bunner__desck" alt="bunner">
              </a>
            </div>
        <?php
          endwhile;
        else :
        endif;
        ?>
      </div>
    </div>
  </section>
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
        <h4 class="products__filter-title st-subtitle"><?php echo pll__('Filters'); ?></h4>
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
        <h3 class="cat-prod__top-title"><?php echo pll__('top_5_cat'); ?></h3>
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
      <div class="cat-prod__sort ">
        <div class="products__sort-icon products__sort-icon-open">
          <svg width="14" height="28" viewBox="0 0 14 28" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M11.375 14L0 25.375V28L14 14L0 0V2.62498L11.375 14Z" fill="#E44747" />
          </svg>

        </div>

        <?php
        wp_sort();
        ?>
        <?php $pageNum = (get_query_var('paged')) ? get_query_var('paged') : 1; ?>
        <form action="<?php echo 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>" method="GET" class="cat-prod__sorting">
          <p class="cat-prod__srt-by"><?php echo pll__('sort_by_sort'); ?></p>
          <input type="hidden" name="cat" value="<?php the_category_ID(); ?>">
          <input type="hidden" name="paged" value="<?php echo $pageNum; ?>">
          <input type="radio" id="sort_asc" name="<?php echo $_SERVER['QUERY_STRING']; ?>&orderby=price&sort" value="asc" onchange="this.form.submit()"><label class="cat-prod__sort-item" for="sort_asc"><?php echo pll__('from_cheap_sort'); ?></label>
          <input type="radio" id="sort_desc" name="<?php echo $_SERVER['QUERY_STRING']; ?>&orderby=price-desc&sort" value="desc" onchange="this.form.submit()"><label class="cat-prod__sort-item" for="sort_desc"><?php echo pll__('from_expensive_sort'); ?></label>
          <input type="radio" id="sort_pop" name="<?php echo $_SERVER['QUERY_STRING']; ?>&orderby=popularity&sort" value="desc" onchange="this.form.submit()"><label class="cat-prod__sort-item" for="sort_pop"><?php echo pll__('popularity_sort'); ?></label>
          <div class="active-sorting-get" style="display: none;">
            <?php
            echo $_GET["orderby"];
            ?>
          </div>

        </form>

        <?php
        if ($_GET["sort"] == NULL) {
          $args['order'] = $_COOKIE["sorting"];
        } else {
          $args['order'] = $_GET["orderby"];
        }
        $args['cat'] = the_category_ID();
        $args['orderby'] = 'meta_value_num';
        $args['meta_key'] = 'price';
        $args['paged'] = get_query_var('paged');
        $the_query = new WP_Query($args);
        ?>

      </div>
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



get_footer('shop');
