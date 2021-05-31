<?php
get_header();
/*
 Template Name: Home page
 */
?>
<div class='loader preloader-custom '>
<div class='progress-bar'>0%</div>
  <div class="line-progress"></div>
</div>


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
  <section class="slider-bunner container">
    <div class="slider-bunner__left">
      <div class="slider-bunner__left-slider">

        <?php
        if (have_rows('left_bunner_home')) :
          while (have_rows('left_bunner_home')) : the_row();
        ?>
            <div class="slider-bunner__left-item">
              <a href="<?php the_sub_field('bunner_link'); ?>"><img src="<?php the_sub_field('bunner'); ?>" alt="bunner"> </a>
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
        if (have_rows('right_bunner_home')) :
          while (have_rows('right_bunner_home')) : the_row();
        ?>
            <div class="slider-bunner__right-item">
              <a href="<?php the_sub_field('bunner_link'); ?>">
                <img src="<?php the_sub_field('bunner_mobile'); ?>" class="slider-bunner__mobile" alt="bunner">
                <img src="<?php the_sub_field('bunner'); ?>" class="slider-bunner__desck" alt="bunner">
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
</div>

<div class="welcome-black-bg">
  <section class="welcome container">
    <div class="nav-title">
      <span class="nav-title__line"></span>
      <p class="nav-title__text nav-title__text-up"><?php the_field('pre-title-home-wel'); ?></p>
    </div>

    <h3 class="welcome__title  st-title"><?php the_field('title-home-wel'); ?></h3>
    <div class="welcome__text-df ">
      <span class="st-letter"></span>
      <p class="welcome__text fl-text"> <?php the_field('text_under_title-home-wel'); ?>
      </p>
    </div>

    <div class="welcome__df">
      <div class="welcome__left">
        <div class="welcome__slider welcome__slider-js">
          <?php
          if (have_rows('slider-welcome-home')) :
            while (have_rows('slider-welcome-home')) : the_row();
          ?>
              <img src="<?php the_sub_field('image'); ?>" class="welcome__slider-item" alt="img">
          <?php
            endwhile;
          else :
          endif;
          ?>

        </div>
        <div class="welcome__slider-count"><span class="welcome__slider-current-slide">1</span><span class="welcome__slider-separator">/</span><span class="welcome__slider-all-slide"></span></div>
      </div>
      <div class="welcome__right">
        <p class="welcome__right-text "><?php the_field('Text-on-the-right-home-wel'); ?> </p>

        <p class="welcome__right-text--bold st-bold"><?php the_field('Text on the right-bold-home-wel'); ?></p>
        <a href="<?php the_field('button_link-home-wel'); ?>" class="welcome__right-link"><?php the_field('button_text-home-wel'); ?></a>
      </div>
    </div>
  </section>
</div>

<div class="gray--bg gray--bg-main-two">
  <?php global $product; ?>
  <div class="cart-uri-js" style="display: none;">
    <?php echo esc_url(wc_get_cart_url()); ?>
  </div>

  <section class="tabs-sliders tabs-sliders-index container">
    <div class="nav-title">
      <span class="nav-title__line"></span>
      <p class="nav-title__text"><?php echo pll__('catalog_preview_home'); ?> </p>
    </div>

    <h3 class="tabs-sliders__title  st-title"><?php echo pll__('most_popular_home'); ?></h3>
    <div class="tabs-sliders__tabs">
      <span class="tabs-sliders__tabs-item ">Chainsaws</span>
      <span class="tabs-sliders__tabs-item active">Forest</span>
      <span class="tabs-sliders__tabs-item">Riders</span>
      <span class="tabs-sliders__tabs-item">Branch saws</span>
      <span class="tabs-sliders__tabs-item">Snow thrower</span>
    </div>

    <div class="tabs-sliders__tab-1 tabs-sliders__tab">
      <div class="tabs-sliders__slider tabs-sliders__slider-1">
        <?php
        $args = array(
          'post_type' => 'product',
          'post_status' => 'publish',
          'orderby'        => 'rand',
          'posts_per_page' => 15,
        );
        $the_query = new WP_Query($args);
        if ($the_query->have_posts()) { ?>

          <?php while ($the_query->have_posts()) {
            $the_query->the_post(); ?>
            <?php

            $products_id = get_the_ID();
            $products_img = get_the_post_thumbnail_url($products_id, 'full');
            $products_url = get_permalink($products_id);
            ?>

            <div class="tabs-sliders__slider-item card-product">
              <a href="<?php echo $products_url; ?>" class="card-product__img-wrap">
                <img src=" <?php echo $products_img; ?>" class="card-product__img" alt="product">
                <?php my_sale_badge();  ?>
              </a>
              <a href="<?php echo $products_url; ?>" class="card-product__title"><?php the_title(); ?></a>
              <div class="card-product__prices">
                <?php echo $product->get_price_html(); ?>
              </div>
              <div class="card-product__buttons">
                <div class="card-product__stock-wrap">
                  <img src="<?php bloginfo('template_url'); ?>/img/icons/in-stock.svg" alt="icon" class="card-product__stock-icon">
                  <span class="card-product__stock-text"><?php echo pll__('instore_single'); ?></span>
                </div>
                <?php
                do_action('woocommerce_after_shop_loop_item');
                ?>
              </div>
            </div>
          <?php }
          wp_reset_postdata(); ?>
        <?php } ?>
      </div>

      <div class="tabs-sliders__bottom-df">
        <div class=" tabs-sliders__count  tabs-sliders__count-slider-1">
          <span class="tabs-sliders__slider-current-slide tabs-sliders__slider-current-slide-1">1</span>
          <span class="tabs-sliders__slider-separator">/</span>
          <span class="tabs-sliders__slider-all-slide tabs-sliders__slider-all-slide-1"></span>
        </div>

        <a href="#" class="tabs-sliders__view">
   <?php echo pll__('all_product_home'); ?>
        </a>
      </div>
    </div>
    <div class="tabs-sliders__tab-2 tabs-sliders__tab  active">
      <div class="tabs-sliders__slider tabs-sliders__slider-2">

        <?php
        $args = array(
          'post_type' => 'product',
          'post_status' => 'publish',
          'orderby'        => 'rand',
          'posts_per_page' => 15,
        );
        $the_query = new WP_Query($args);
        if ($the_query->have_posts()) { ?>

          <?php while ($the_query->have_posts()) {
            $the_query->the_post(); ?>
            <?php

            $products_id = get_the_ID();
            $products_img = get_the_post_thumbnail_url($products_id, 'full');
            $products_url = get_permalink($products_id);
            ?>


            <div class="tabs-sliders__slider-item card-product">
              <a href="<?php echo $products_url; ?>" class="card-product__img-wrap">
                <img src=" <?php echo $products_img; ?>" class="card-product__img" alt="product">
                <?php my_sale_badge();  ?>
              </a>
              <a href="<?php echo $products_url; ?>" class="card-product__title"><?php the_title(); ?></a>
              <div class="card-product__prices">
                <?php echo $product->get_price_html(); ?>
              </div>
              <div class="card-product__buttons">
                <div class="card-product__stock-wrap">
                  <img src="<?php bloginfo('template_url'); ?>/img/icons/in-stock.svg" alt="icon" class="card-product__stock-icon">
                  <span class="card-product__stock-text"><?php echo pll__('instore_single'); ?></span>
                </div>
                <?php
                do_action('woocommerce_after_shop_loop_item');
                ?>
              </div>
            </div>

          <?php }
          wp_reset_postdata(); ?>
        <?php } ?>



      </div>

      <div class="tabs-sliders__bottom-df">
        <div class=" tabs-sliders__count  tabs-sliders__count-slider-2">
          <span class="tabs-sliders__slider-current-slide tabs-sliders__slider-current-slide-2">1</span>
          <span class="tabs-sliders__slider-separator">/</span>
          <span class="tabs-sliders__slider-all-slide tabs-sliders__slider-all-slide-2"></span>
        </div>

        <a href="#" class="tabs-sliders__view">
   <?php echo pll__('all_product_home'); ?>
        </a>
      </div>
    </div>
    <div class="tabs-sliders__tab-3 tabs-sliders__tab">
      <div class="tabs-sliders__slider tabs-sliders__slider-3">
        <?php
        $args = array(
          'post_type' => 'product',
          'post_status' => 'publish',
          'orderby'        => 'rand',
          'posts_per_page' => 15,
        );
        $the_query = new WP_Query($args);
        if ($the_query->have_posts()) { ?>

          <?php while ($the_query->have_posts()) {
            $the_query->the_post(); ?>
            <?php

            $products_id = get_the_ID();
            $products_img = get_the_post_thumbnail_url($products_id, 'full');
            $products_url = get_permalink($products_id);
            ?>

            <div class="tabs-sliders__slider-item card-product">
              <a href="<?php echo $products_url; ?>" class="card-product__img-wrap">
                <img src=" <?php echo $products_img; ?>" class="card-product__img" alt="product">
                <?php my_sale_badge();  ?>
              </a>
              <a href="<?php echo $products_url; ?>" class="card-product__title"><?php the_title(); ?></a>
              <div class="card-product__prices">
                <?php echo $product->get_price_html(); ?>
              </div>
              <div class="card-product__buttons">
                <div class="card-product__stock-wrap">
                  <img src="<?php bloginfo('template_url'); ?>/img/icons/in-stock.svg" alt="icon" class="card-product__stock-icon">
                  <span class="card-product__stock-text"><?php echo pll__('instore_single'); ?></span>
                </div>
                <?php
                do_action('woocommerce_after_shop_loop_item');
                ?>
              </div>
            </div>
          <?php }
          wp_reset_postdata(); ?>
        <?php } ?>
      </div>

      <div class="tabs-sliders__bottom-df">
        <div class=" tabs-sliders__count  tabs-sliders__count-slider-3">
          <span class="tabs-sliders__slider-current-slide tabs-sliders__slider-current-slide-3">1</span>
          <span class="tabs-sliders__slider-separator">/</span>
          <span class="tabs-sliders__slider-all-slide tabs-sliders__slider-all-slide-3"></span>
        </div>

        <a href="#" class="tabs-sliders__view">
   <?php echo pll__('all_product_home'); ?>
        </a>
      </div>

    </div>
    <div class="tabs-sliders__tab-4 tabs-sliders__tab">
      <div class="tabs-sliders__slider tabs-sliders__slider-4">
        <?php
        $args = array(
          'post_type' => 'product',
          'post_status' => 'publish',
          'orderby'        => 'rand',
          'posts_per_page' => 15,
        );
        $the_query = new WP_Query($args);
        if ($the_query->have_posts()) { ?>

          <?php while ($the_query->have_posts()) {
            $the_query->the_post(); ?>
            <?php

            $products_id = get_the_ID();
            $products_img = get_the_post_thumbnail_url($products_id, 'full');
            $products_url = get_permalink($products_id);
            ?>

            <div class="tabs-sliders__slider-item card-product">
              <a href="<?php echo $products_url; ?>" class="card-product__img-wrap">
                <img src=" <?php echo $products_img; ?>" class="card-product__img" alt="product">
                <?php my_sale_badge();  ?>
              </a>
              <a href="<?php echo $products_url; ?>" class="card-product__title"><?php the_title(); ?></a>
              <div class="card-product__prices">
                <?php echo $product->get_price_html(); ?>
              </div>
              <div class="card-product__buttons">
                <div class="card-product__stock-wrap">
                  <img src="<?php bloginfo('template_url'); ?>/img/icons/in-stock.svg" alt="icon" class="card-product__stock-icon">
                  <span class="card-product__stock-text"><?php echo pll__('instore_single'); ?></span>
                </div>
                <?php
                do_action('woocommerce_after_shop_loop_item');
                ?>
              </div>
            </div>
          <?php }
          wp_reset_postdata(); ?>
        <?php } ?>
      </div>

      <div class="tabs-sliders__bottom-df">
        <div class=" tabs-sliders__count  tabs-sliders__count-slider-4">
          <span class="tabs-sliders__slider-current-slide tabs-sliders__slider-current-slide-4">1</span>
          <span class="tabs-sliders__slider-separator">/</span>
          <span class="tabs-sliders__slider-all-slide tabs-sliders__slider-all-slide-4"></span>
        </div>

        <a href="#" class="tabs-sliders__view">
   <?php echo pll__('all_product_home'); ?>
        </a>
      </div>
    </div>
    <div class="tabs-sliders__tab-5 tabs-sliders__tab">
      <div class="tabs-sliders__slider tabs-sliders__slider-5">
        <?php
        $args = array(
          'post_type' => 'product',
          'post_status' => 'publish',
          'orderby'        => 'rand',
          'posts_per_page' => 15,
        );
        $the_query = new WP_Query($args);
        if ($the_query->have_posts()) { ?>

          <?php while ($the_query->have_posts()) {
            $the_query->the_post(); ?>
            <?php

            $products_id = get_the_ID();
            $products_img = get_the_post_thumbnail_url($products_id, 'full');
            $products_url = get_permalink($products_id);
            ?>

            <div class="tabs-sliders__slider-item card-product">
              <a href="<?php echo $products_url; ?>" class="card-product__img-wrap">
                <img src=" <?php echo $products_img; ?>" class="card-product__img" alt="product">
                <?php my_sale_badge();  ?>
              </a>
              <a href="<?php echo $products_url; ?>" class="card-product__title"><?php the_title(); ?></a>
              <div class="card-product__prices">
                <?php echo $product->get_price_html(); ?>
              </div>
              <div class="card-product__buttons">
                <div class="card-product__stock-wrap">
                  <img src="<?php bloginfo('template_url'); ?>/img/icons/in-stock.svg" alt="icon" class="card-product__stock-icon">
                  <span class="card-product__stock-text"><?php echo pll__('instore_single'); ?></span>
                </div>
                <?php
                do_action('woocommerce_after_shop_loop_item');
                ?>
              </div>
            </div>
          <?php }
          wp_reset_postdata(); ?>
        <?php } ?>
      </div>

      <div class="tabs-sliders__bottom-df">
        <div class=" tabs-sliders__count  tabs-sliders__count-slider-5">
          <span class="tabs-sliders__slider-current-slide tabs-sliders__slider-current-slide-5">1</span>
          <span class="tabs-sliders__slider-separator">/</span>
          <span class="tabs-sliders__slider-all-slide tabs-sliders__slider-all-slide-5"></span>
        </div>

        <a href="#" class="tabs-sliders__view">
   <?php echo pll__('all_product_home'); ?>
        </a>
      </div>
    </div>

  </section>
</div>

<section class="home-category container">
  <div class="nav-title">
    <span class="nav-title__line"></span>
    <p class="nav-title__text"><?php the_field('pre_title_cat-home'); ?></p>
  </div>
  <h3 class="home-category__title  st-title"><?php the_field('title_cat-home'); ?></h3>

  <div class="home-category__cards">
    <div class="home-category__top-wrapper">
      <div class="home-category__top-left">
        <a href='<?php the_field('link_cat-home_category_1'); ?>' class="home-category__item" style="background-image: url(<?php the_field('image-cat-home_1'); ?>)">
          <h3 class="home-category__title-card"><?php the_field('name_cat-home__1'); ?></h3>
          <p class="home-category__link-card home-category__link-card-desktope"><?php echo pll__('explore_all_desc'); ?></p>
          <p class="home-category__link-card home-category__link-card-mobile"><?php echo pll__('explore_all_mobile'); ?></p>
        </a>
      </div>
      <div class="home-category__top-center">
        <div class="home-category__top-center-wrap">
          <a href='<?php the_field('link_cat-home_category_2'); ?>' class="home-category__item" style="background-image: url(<?php the_field('image-cat-home_2'); ?>)">
            <h3 class="home-category__title-card"><?php the_field('name_cat-home__2'); ?></h3>
            <p class="home-category__link-card home-category__link-card-desktope"><?php echo pll__('explore_all_desc'); ?></p>
            <p class="home-category__link-card home-category__link-card-mobile"><?php echo pll__('explore_all_mobile'); ?></p>
          </a>
        </div>
        <div class="home-category__top-center-wrap"">
        <a href='<?php the_field('link_cat-home_category_3'); ?>' class=" home-category__item" style="background-image: url(<?php the_field('image-cat-home_3'); ?>)">
          <h3 class="home-category__title-card"><?php the_field('name_cat-home__3'); ?></h3>
          <p class="home-category__link-card home-category__link-card-desktope"><?php echo pll__('explore_all_desc'); ?></p>
          <p class="home-category__link-card home-category__link-card-mobile"><?php echo pll__('explore_all_mobile'); ?></p>
          </a>
        </div>
      </div>
      <div class="home-category__top-right">
        <a href='<?php the_field('link_cat-home_category_4'); ?>' class="home-category__item" style="background-image: url(<?php the_field('image-cat-home_4'); ?>)">
          <h3 class="home-category__title-card"><?php the_field('name_cat-home__4'); ?></h3>
          <p class="home-category__link-card home-category__link-card-desktope"><?php echo pll__('explore_all_desc'); ?></p>
          <p class="home-category__link-card home-category__link-card-mobile"><?php echo pll__('explore_all_mobile'); ?></p>
        </a>
      </div>
    </div>
    <div class="home-category__bot">
      <div class="home-category__bot-item">
        <a href='<?php the_field('link_cat-home_category_5'); ?>' class="home-category__item" style="background-image: url(<?php the_field('image-cat-home_5'); ?>)">
          <h3 class="home-category__title-card"><?php the_field('name_cat-home__5'); ?></h3>
          <p class="home-category__link-card home-category__link-card-desktope"><?php echo pll__('explore_all_desc'); ?></p>
          <p class="home-category__link-card home-category__link-card-mobile"><?php echo pll__('explore_all_mobile'); ?></p>
        </a>
      </div>
      <div class="home-category__bot-item">
        <a href='<?php the_field('link_cat-home_category_6'); ?>' class="home-category__item" style="background-image: url(<?php the_field('image-cat-home_6'); ?>)">
          <h3 class="home-category__title-card"><?php the_field('name_cat-home__6'); ?></h3>
          <p class="home-category__link-card home-category__link-card-desktope"><?php echo pll__('explore_all_desc'); ?></p>
          <p class="home-category__link-card home-category__link-card-mobile"><?php echo pll__('explore_all_mobile'); ?></p>
        </a>
      </div>
      <div class="home-category__bot-item">
        <a href='<?php the_field('link_cat-home_category_7'); ?>' class="home-category__item" style="background-image: url(<?php the_field('image-cat-home_7'); ?>)">
          <h3 class="home-category__title-card"><?php the_field('name_cat-home__7'); ?></h3>
          <p class="home-category__link-card home-category__link-card-desktope"><?php echo pll__('explore_all_desc'); ?></p>
          <p class="home-category__link-card home-category__link-card-mobile"><?php echo pll__('explore_all_mobile'); ?></p>
        </a>
      </div>
      <div class="home-category__bot-item">
        <a href='<?php the_field('link_cat-home_category_8'); ?>' class="home-category__item" style="background-image: url(<?php the_field('image-cat-home_8'); ?>)">
          <h3 class="home-category__title-card"><?php the_field('name_cat-home__8'); ?></h3>
          <p class="home-category__link-card home-category__link-card-desktope"><?php echo pll__('explore_all_desc'); ?></p>
          <p class="home-category__link-card home-category__link-card-mobile"><?php echo pll__('explore_all_mobile'); ?></p>
        </a>
      </div>


    </div>
</section>

<section class="our-brand container">
  <div class="nav-title">
    <span class="nav-title__line"></span>
    <p class="nav-title__text"><?php the_field('pre-title-home-brand'); ?></p>
  </div>

  <h3 class="our-brand__title  st-title"><?php the_field('title-home-brand'); ?></h3>
  <div class="our-brand__brands">


    <?php
    if (have_rows('brands-home-brand')) :
      while (have_rows('brands-home-brand')) : the_row();
    ?>
        <div class="our-brand__brand-wrap">
          <img src="<?php the_sub_field('brand_image'); ?>" class="our-brand__brand" alt="brand">
        </div>
    <?php
      endwhile;
    else :
    endif;
    ?>


  </div>
</section>

<div class="gray--bg gray--bg-main-three">
  <div class="home-benefits container">

    <?php
    if (have_rows('benefits-home')) :
      while (have_rows('benefits-home')) : the_row();
    ?>
        <div class="home-benefits__item">
          <img src="<?php the_sub_field('benefits_icon'); ?>" alt="icon" class="home-benefits__item-img">
          <h3 class="home-benefits__item-title"><?php the_sub_field('text'); ?></h3>
        </div>

    <?php
      endwhile;
    else :
    endif;
    ?>

  </div>

  <section class="home-blog container">
    <div class="nav-title">
      <span class="nav-title__line"></span>
      <p class="nav-title__text"><?php the_field('pre_title-home-blog'); ?></p>
    </div>
    <div class="home-blog__title-df">
      <h3 class="home-blog__main-title  st-title"><?php the_field('title-home-blog'); ?></h3>
      <div class="home-blog__slider-count"><span class="home-blog__slider-current-slide">1</span><span class="home-blog__slider-separator">/</span><span class="home-blog__slider-all-slide"></span></div>
    </div>
    <div class="home-blog__slider">

      <?php
      $args = array(
        'post_type'         => 'post',
        'publish'           => true,
        'posts_per_page'    => 9999,
        'orderby'     => 'date',
        // 'category_name' => 'trending, trending-fi, trending-se'
      );
      $the_query = new WP_Query($args);
      if ($the_query->have_posts()) { ?>

        <?php while ($the_query->have_posts()) {
          $the_query->the_post(); ?>

          <div class="home-blog__slider-item">
            <a href="<?php the_permalink(); ?>" class="home-blog__img-wrap">
              <?php echo get_the_post_thumbnail(get_the_ID(), 'post_827x620', array('class' => 'home-blog__img',)); ?>
            </a>
            <h3 class="home-blog__title"><?php the_title(); ?></h3>
            <p class="home-blog__text"> <?php the_excerpt_rss(); ?></p>
            <div class="home-blog__df">
              <div class="home-blog__date">
                <?php the_time('d.m.Y') ?>
              </div>
              <a href="<?php the_permalink(); ?>" class="home-blog__link"><?php echo pll__('read_more_blog'); ?></a>
            </div>
          </div>

        <?php }
        wp_reset_postdata(); ?>
      <?php } ?>

    </div>

    <a href="<?php the_field('button_link-home-blog'); ?>" class="home-blog__main-link"><?php the_field('button_text-home-blog'); ?></a>
  </section>

  <div class="home-blog__white-bg"></div>
</div>

<div class="bg-black-home">
  <section class="video-home container">
    <div class="nav-title">
      <span class="nav-title__line"></span>
      <p class="nav-title__text"><?php the_field('pre-title-video'); ?></p>
    </div>

    <h3 class="video-home__main-title  st-title"><?php the_field('title-video'); ?></h3>
    <div class="video-home__slider-df">
      <div class="video-home__slider-count"><span class="video-home__slider-current-slide">1</span><span class="video-home__slider-separator">/</span><span class="video-home__slider-all-slide"></span></div>
      <div class="video-home__slider-for">
        <?php
        if (have_rows('video-repitear')) :
          while (have_rows('video-repitear')) : the_row();
        ?>
            <div class="video-home__for-item">
              <div class="video-home__for-video-wpap">
                <video class="video-home__for-video">
                  <source src="<?php the_sub_field('video_file'); ?>" type="video/mp4">
                  </source>
                </video>
                <img src="<?php bloginfo('template_url'); ?>/img/icons/icon-play-video.svg" class="video-home__for-icon-play" alt="play">
              </div>
              <h3 class="video-home__for-title"><?php the_sub_field('title'); ?>
              </h3>
              <p class="video-home__for-author"><?php the_sub_field('author'); ?></p>
            </div>
        <?php
          endwhile;
        else :
        endif;
        ?>
      </div>

      <div class="video-home__slider-nav">
        <?php
        if (have_rows('video-repitear')) :
          while (have_rows('video-repitear')) : the_row();
        ?>
            <div class="video-home__nav-item">
              <div class="video-home__nav-video-wpap">
                <video class="video-home__nav-video">
                  <source src="<?php the_sub_field('video_file'); ?>" type="video/mp4">
                  </source>
                </video>
                <img src="<?php bloginfo('template_url'); ?>/img/icons/icon-play-video.svg" class="video-home__icon-play" alt="play">
              </div>
              <div class="video-home__nav-text">
                <h3 class="video-home__nav-title"><?php the_sub_field('title'); ?>
                </h3>
                <p class="video-home__nav-author"><?php the_sub_field('author'); ?></p>
              </div>
            </div>
        <?php
          endwhile;
        else :
        endif;
        ?>
      </div>
    </div>

  </section>
</div>

<section class="adventag container">
  <div class="nav-title">
    <span class="nav-title__line"></span>
    <p class="nav-title__text"><?php the_field('pre_title-advant'); ?></p>
  </div>

  <h3 class="adventag__main-title  st-title"><?php the_field('title-advant'); ?></h3>

  <div class="adventag__items">
    <div class="adventag__item">
      <div class="adventag__icon-wrap">
        <img src="<?php the_field('first_icon-advant'); ?>" class="adventag__icon" alt="icon">
      </div>
      <h3 class="adventag__title"><?php the_field('first_title-advant'); ?></h3>
      <p class="adventag__text"><?php the_field('text-advant-first'); ?>
      </p>
    </div>
    <div class="adventag__item adventag__item--center">
      <div class="adventag__icon-wrap">
        <img src="<?php the_field('second_icon-advan'); ?>" class="adventag__icon" alt="icon">
      </div>
      <h3 class="adventag__title"><?php the_field('second_title-advant'); ?></h3>
      <p class="adventag__text"><?php the_field('text-advant-second'); ?>
      </p>
    </div>
    <div class="adventag__item">
      <div class="adventag__icon-wrap">
        <img src="<?php the_field('third_icon-advan_copy'); ?>" class="adventag__icon" alt="icon">
      </div>
      <h3 class="adventag__title"><?php the_field('third_title-advan'); ?></h3>
      <p class="adventag__text"><?php the_field('third-advant-second'); ?>
      </p>
    </div>


  </div>
</section>

<?php get_footer(); ?>