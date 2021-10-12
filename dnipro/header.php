<?php
//ACF Variables
$header = get_field('social_header_group', 'option');
$instagram = $header['instagram'];
$facebook = $header['facebook'];
$youtube = $header['youtube'];
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <header class="dspdmr_header">


    <div class="dspdmr_header__container ">
      <div class="dspdmr_header__row">
        <div class="dspdmr_header__logo">
          <?php
          $custom_logo__url = wp_get_attachment_image_src(get_theme_mod('custom_logo'), 'full');
          ?>
          <a href="<?php echo site_url('/'); ?>" class="dspdmr_header__logo_elem">
            <img src="<?php echo $custom_logo__url[0]; ?>" alt="<?php echo get_bloginfo('name'); ?>">
            <span>Департамент <br>соціальної політики</span>
          </a>
        </div>

        <div class="header__burger">
        <div class="header__burger-line"></div>
      </div>


        <div class="dspdmr_header__content">
          <div class="dspdmr_header__menu dspdmr_header__lg">

            <?php
            wp_nav_menu(
              array(
                'theme_location' => 'menu-header',
                'menu_id'        => 'primary-menu',
              )
            );
            ?>
          </div>

          <div class="dspdmr_header__menu dspdmr_header__sm">
            <div class="burger_menu">
              <a href="#" class="burger_menu__elem">
                <span class="burger_line"></span>
                <span class="burger_line"></span>
                <span class="burger_line"></span>
              </a>
            </div>
            <?php
            wp_nav_menu(
              array(
                'theme_location' => 'menu-header',
                'menu_id'        => 'primary-menu',
              )
            );
            ?>
          </div>

          <div class="dspdmr_header__social">
            <div class="search_form">
              <?php //get_search_form(); 
              ?>
            </div>
            <div class="dspdmr_header__social_icons">
              <!-- <i class="fas fa-search search_icon"></i> -->

              <?php if ($instagram) { ?>
                <a class="social_link inst" href="<?php echo esc_url($instagram); ?>" target="_blank"><i class="fab fa-instagram"></i></a>
              <?php } ?>

              <?php if ($facebook) { ?>
                <a class="social_link fb" href="<?php echo esc_url($facebook); ?>" target="_blank"><i class="fab fa-facebook-square"></i></a>
              <?php } ?>

              <?php if ($youtube) { ?>
                <a class="social_link youtube" href="<?php echo esc_url($youtube); ?>" target="_blank"><i class="fab fa-youtube"></i></a>
              <?php } ?>
            </div>
          </div>
          <button class="open-availability-panel"> <img src="<?php bloginfo('template_url'); ?>/assets/img/blind-people-icon.png" alt="Для людей з порушенням зору"> Людям з <br> порушенням зору</button>

        </div>
      </div>
    </div>
  </header>

  <section class="availability-panel ">
    <div class="availability-panel__container default_container">
      <div class="availability-panel__box">
        <h5 class="availability-panel__title"> Маштаб Тексту </h5>
        <div class="availability-panel__bts">
          <button class="font-size-click-minus" name='normal-font-size'> 100%</button>
          <button class="font-size-click-plus" name='large-font-size'>150%</button>
        </div>
      </div>

      <div class="availability-panel__box">
        <h5 class="availability-panel__title">Інтервал між літерами </h5>
        <div class="availability-panel__bts">
          <button name='spacing-norm' class="letter-spacing-click-normal active"> Звичайний</button>
          <button name='spacing-large' class="letter-spacing-click-large">Збільшений</button>
        </div>
      </div>

      <div class="availability-panel__box">
        <h5 class="availability-panel__title">Зображення</h5>
        <div class="availability-panel__bts">
          <button name='img-on' class="visible-img-click active"> Вкл</button>
          <button name='img-off' class="hidden-img-click">Викл</button>
        </div>
      </div>

      <div class="availability-panel__box">
        <h5 class="availability-panel__title">Колір</h5>
        <div class="availability-panel__bts">
          <button name='theme-standart' class="normal-theme-click active"> Стандартний</button>
          <button name='theme-dark' class="dark-theme-click">Чорний</button>
          <button name='theme-blue' class="blue-theme-click">Блакитний</button>
        </div>
      </div>

      <div class="availability-panel__box">
        <h5 class="availability-panel__title"></h5>
        <div class="availability-panel__bts">
          <button class="normal-version-click"> Звичайна версія</button>
        </div>
      </div>
    </div>

    <span class="close-availability-panel">Закрити панель</span>
  </section>