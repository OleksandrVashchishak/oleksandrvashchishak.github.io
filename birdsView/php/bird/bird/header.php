<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?php bloginfo('description'); ?></title>
  <?php wp_head(); ?>
</head>


<body>
  <header class="header container ">
    <div class="header__logo">
      <?php the_custom_logo() ?>
    </div>



    <?php
    wp_nav_menu(array(
      'menu_class'      => 'header__menu',
      'theme_location'  => 'header_menu',
      'container' => false
    ));
    ?>




    <div class="header__language-block">
      <div class="header__current-language">
<?php pll_the_languages(array('show_flags'=>1,'show_names'=>0)); ?>
        <span class="header__language-arrow">
          <svg width="17" height="5" viewBox="0 0 17 5" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M8.5 5L16.7272 0.5H0.272758L8.5 5Z" fill="#5D5D5D" />
          </svg>
        </span>
      </div>
      <?php
      wp_nav_menu(array(
        'menu_class'      => 'header__lang-menu',
        'theme_location'  => 'language_menu',
        'container' => false
      ));
      ?>
    </div>

    <div class="burger__container ">
      <div class="burger__top"></div>
      <div class="burger__center"></div>
      <div class="burger__bot"></div>
    </div>
  </header>

  <div class="button-translate-block-hidden">
    <div class="next-btn-translate">
    <?php
        if (ICL_LANGUAGE_CODE == 'en') {
          echo 'next';
        } elseif (ICL_LANGUAGE_CODE == 'fi') {
          echo 'seuraava';
        } elseif (ICL_LANGUAGE_CODE == 'se') {
          echo 'nästa';
        }
        ?>
    </div>
    <div class="prev-btn-translate">
    <?php
        if (ICL_LANGUAGE_CODE == 'en') {
          echo 'prev';
        } elseif (ICL_LANGUAGE_CODE == 'fi') {
          echo 'edellinen';
        } elseif (ICL_LANGUAGE_CODE == 'se') {
          echo 'föregående';
        }
        ?>
    </div>
  </div>


  