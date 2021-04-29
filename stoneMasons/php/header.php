<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?php bloginfo('description'); ?></title>
  <?php wp_head(); ?>
  <!-- slick style -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.css" rel="stylesheet" />
  <!-- font rubik -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400;0,500;0,600;1,300&display=swap" rel="stylesheet">
  <!-- font monda -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Monda:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>

  <header class="header ">
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

    <!-- <ul class="header__menu">
      <li class="header__menu-item">
        <a href="#" class="header__menu-link">Home</a>
      </li>
      <li class="header__menu-item">
        <a href="#" class="header__menu-link">About Us</a>
      </li>
      <li class="header__menu-item header__drop-cont">
        <span class="header__menu-text">
          Our Expertise
        </span>
        <ul class="header__dropdown">
          <li class="header__menu-item-drop">
            <a href="#" class="header__menu-link">Cladding</a>
          </li>
          <li class="header__menu-item-drop">
            <a href="#" class="header__menu-link">Restoration</a>
          </li>
          <li class="header__menu-item-drop">
            <a href="#" class="header__menu-link">Masonry</a>
          </li>
        </ul>
      </li>
      <li class="header__menu-item">
        <a href="#" class="header__menu-link header__menu-btn">
          <span class="header__menu-svg">
            <svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
              <g clip-path="url(#clip0)">
                <path d="M21.8205 3.83331H1.17951C0.530752 3.83331 0 4.36406 0 5.01278V17.9872C0 18.6358 0.530752 19.1667 1.17951 19.1667H21.8205C22.4692 19.1667 23 18.6359 23 17.9872V5.01278C23 4.36406 22.4692 3.83331 21.8205 3.83331ZM21.3779 4.71787L12.1785 11.618C12.0131 11.7438 11.7592 11.8226 11.5 11.8214C11.2408 11.8226 10.9869 11.7438 10.8215 11.618L1.62208 4.71787H21.3779ZM16.4639 12.0732L21.4767 18.2656C21.4817 18.2718 21.4879 18.2765 21.4932 18.2821H1.50677C1.51207 18.2762 1.51827 18.2718 1.5233 18.2656L6.53613 12.0732C6.68972 11.8834 6.66061 11.605 6.47037 11.451C6.28048 11.2974 6.0021 11.3265 5.84847 11.5165L0.884602 17.6484V5.27077L10.291 12.3256C10.6446 12.5889 11.0747 12.7048 11.4999 12.706C11.9245 12.7051 12.355 12.5892 12.7088 12.3256L22.1152 5.27077V17.6483L17.1515 11.5165C16.9979 11.3266 16.7192 11.2974 16.5296 11.451C16.3394 11.6046 16.3102 11.8834 16.4639 12.0732Z" fill="black" />
              </g>
              <defs>
                <clipPath id="clip0">
                  <rect width="23" height="23" fill="white" />
                </clipPath>
              </defs>
            </svg>
          </span>
          <span class="header__btn-text">
            Contact Us
          </span></a>
      </li>
    </ul> -->

    <div class="header__burger ">
      <span class="header__burger-top"></span>
      <span class="header__burger-center"></span>
      <span class="header__burger-bot"></span>
    </div>

  </header>