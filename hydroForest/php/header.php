<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>HydroForest</title>
  <!-- font -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300;400;500;700;900&display=swap" rel="stylesheet">
  <!-- style -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.css" rel="stylesheet" />
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php
  wp_body_open();
  ?>

  <header class="header">
    <div class="header__fr container">
      <div class="header__logo">
        <?php the_custom_logo() ?>
      </div>
      <div class="header__search-cont">
        <?php echo do_shortcode('[fibosearch]'); ?>
      </div>

      <div class="header__leng-cont">
        <?php
        $language = pll_the_languages(array('raw' => 1, 'show_flags' => 1));
        $language = wp_list_sort($language, 'current_lang', 'DESC');

        if ($language) {
          foreach ($language as $lang) {
            $lang_slug = $lang['slug'];
            $lang_url = $lang['url'];
            $lang_flug = $lang['flag'];

            echo '<a href="' . $lang_url . '" class="header__leng-item"><span class="header__leng-flag">' . $lang_flug . '</span><span class="header__leng-name" >' . $lang_slug . '</span></a>';
          }
        }
        ?>
      </div>
    </div>
    <div class="header__tr">
      <div class="header__tr-container">
        <div class="header__menu">
          <?php
          wp_nav_menu(array(
            'menu_class'      => 'header__menu',
            'theme_location'  => 'header_menu',
            'container' => false
          ));
          ?>
        </div>
        <div class="header__burger-cont">
          <div class="header__burger-menu">
            <span class="header__burger-menu-closed">
              <svg width="24" height="17" viewBox="0 0 24 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                <line y1="1" x2="24" y2="1" stroke="white" stroke-width="2" />
                <line y1="8" x2="24" y2="8" stroke="white" stroke-width="2" />
                <line y1="16" x2="24" y2="16" stroke="white" stroke-width="2" />
              </svg>
            </span>
            <span class="header__burger-menu-open hidden">
              <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M21 1.90043L20.0384 1L11 10.0678L1.96028 1L1 1.90043L10.0705 11.0006L1 20.0996L1.96028 21L11 11.9322L20.0384 21L21 20.0996L11.9295 11.0006L21 1.90043Z" fill="white" stroke="white" />
              </svg>
            </span>
          </div>
          <p class="header__burger-text header__burger-text-closed "><?php echo pll__('menu_header'); ?></p>
          <p class="header__burger-text header__burger-text-open hidden"><?php echo pll__('close_header'); ?></p>
        </div>
        <a href="<?php echo wc_get_cart_url() ?>" class="header__cart-cont">
          <span class="header__cart-icon">
            <svg width="27" height="20" viewBox="0 0 27 20" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M1.08008 1.05261H6.95312L10.988 14.7368H22.692L25.9201 5.3284" stroke="white" stroke-width="2" class="header__cart-icon--body" stroke-linecap="round" stroke-linejoin="round" />
              <path class="header__cart-icon--wheel" d="M12.4198 19.9999C13.3145 19.9999 14.0398 19.293 14.0398 18.421C14.0398 17.549 13.3145 16.842 12.4198 16.842C11.5251 16.842 10.7998 17.549 10.7998 18.421C10.7998 19.293 11.5251 19.9999 12.4198 19.9999Z" fill="white" />
              <path class="header__cart-icon--wheel" d="M21.0604 19.9999C21.9551 19.9999 22.6804 19.293 22.6804 18.421C22.6804 17.549 21.9551 16.842 21.0604 16.842C20.1657 16.842 19.4404 17.549 19.4404 18.421C19.4404 19.293 20.1657 19.9999 21.0604 19.9999Z" fill="white" />
            </svg>
          </span>
          <span class="header__cart-text">
            <?php echo pll__('cart_header'); ?>
          </span>
          &thinsp;
          <span class="header__cart-price">
            (<?php echo  WC()->cart->get_cart_contents_count(); ?>)
            <?php echo WC()->cart->get_cart_total(); ?>
          </span>
        </a>
        <div class="header-cart">
          <?php
          woocommerce_mini_cart();
          ?>
        </div>
      </div>
    </div>

  </header>



  <div class="mobile-menu container hidden">
    <div class="header__menu">
      <?php
      wp_nav_menu(array(
        'menu_class'      => 'header__menu',
        'theme_location'  => 'header_menu',
        'container' => false
      ));
      ?>
    </div>
    <div class="header__leng-cont">
      <?php
      $language = pll_the_languages(array('raw' => 1, 'show_flags' => 1));
      $language = wp_list_sort($language, 'current_lang', 'DESC');

      if ($language) {
        foreach ($language as $lang) {
          $lang_slug = $lang['slug'];
          $lang_url = $lang['url'];
          $lang_flug = $lang['flag'];

          echo '<a href="' . $lang_url . '" class="header__leng-item"><span class="header__leng-flag">' . $lang_flug . '</span><span class="header__leng-name" >' . $lang_slug . '</span></a>';
        }
      }
      ?>
    </div>
    <div class="header__search-cont">
      <?php echo do_shortcode('[fibosearch]'); ?>
    </div>
  </div>




