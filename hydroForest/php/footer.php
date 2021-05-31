<div class="footer-black-bg">
  <footer class="footer container">
    <div class="footer__left">
      <div class="footer__logo-wrap">
        <a href="<?php echo get_home_url(); ?>">
          <img src="<?php the_field('footer_logo', 'option'); ?>" class="footer__logo" alt="logo">
        </a>
      </div>
      <p class="footer__reserved">
        <?php
        if (ICL_LANGUAGE_CODE == 'fin') {
          the_field('all_rights_reserved-fi', 'option');
        } elseif (ICL_LANGUAGE_CODE == 'se') {
          the_field('all_rights_reserved-se', 'option');
        }
        ?>
      </p>
    </div>
    <div class="footer__right">
      <div class="footer__suscribe">
        <div class="footer__suscribe-text-wrap">
          <h3 class="footer__suscribe-title">
            <?php
            if (ICL_LANGUAGE_CODE == 'fin') {
              the_field('subscribe_title-footer-fi', 'option');
            } elseif (ICL_LANGUAGE_CODE == 'se') {
              the_field('subscribe_title-footer-se', 'option');
            }
            ?>
          </h3>
          <p class="footer__suscribe-text">
            <?php

            if (ICL_LANGUAGE_CODE == 'fin') {
              the_field('subscribe_text-footer-fi', 'option');
            } elseif (ICL_LANGUAGE_CODE == 'se') {
              the_field('subscribe_text-footer-se', 'option');
            }
            ?>
          </p>
        </div>
        <div class="footer__email-wrap">
          <?php
          if (ICL_LANGUAGE_CODE == 'fin') {
            echo do_shortcode('[contact-form-7 id="203" title="Footer subscribe fi"]');
          } elseif (ICL_LANGUAGE_CODE == 'se') {
            echo do_shortcode('[contact-form-7 id="476" title="Footer subscribe se"]');
          }
          ?>
        </div>
      </div>
      <?php
      wp_nav_menu(array(
        'menu_class'      => 'footer_menu',
        'theme_location'  => 'header_menu',
        'container' => false
      ));
      ?>
    </div>
  </footer>
</div>

<nav class="nav ">
  <div class="nav__close">
    <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M21 1.90043L20.0384 1L11 10.0678L1.96028 1L1 1.90043L10.0705 11.0006L1 20.0996L1.96028 21L11 11.9322L20.0384 21L21 20.0996L11.9295 11.0006L21 1.90043Z" fill="#222222" stroke="#222222" />
    </svg>
  </div>
  <div class="container nav__wrapper">
    <div class="nav__main">
      <div class="nav__list">
        <a href="#" class="nav__title">
          CUTTING GRASS
        </a>
        <ul class="nav__items">
          <a href="#" class="nav__item">
            Robotic lawnmowers
          </a>
          <a href="#" class="nav__item">
            Clip
          </a>
          <a href="#" class="nav__item">
            Mowers
          </a>
          <a href="#" class="nav__item">
            Garden tractors
          </a>
          <a href="#" class="nav__item">
            Riders
          </a>
          <a href="#" class="nav__item">
            Front cutters
          </a>
        </ul>

      </div>
      <div class="nav__list">
        <a href="#" class="nav__title">
          BATTERY PRODUCTS
        </a>
        <ul class="nav__items">
          <a href="#" class="nav__item">
            Battery products
          </a>
        </ul>
      </div>
      <div class="nav__list">
        <a href="#" class="nav__title">
          WINTER TOOLS
        </a>
        <ul class="nav__items">
          <a href="#" class="nav__item">
            Snow thrower
          </a>
        </ul>
      </div>
      <div class="nav__list">
        <a href="#" class="nav__title">
          CLEANING
        </a>
        <ul class="nav__items">
          <a href="#" class="nav__item">
            Pressure washers
          </a>
          <a href="#" class="nav__item">
            Vacuum cleaners
          </a>
        </ul>
      </div>
      <div class="nav__list">
        <a href="#" class="nav__title">
          LAWN CARE
        </a>
        <ul class="nav__items">
          <a href="#" class="nav__item">
            Lawn airers
          </a>
        </ul>
      </div>
      <div class="nav__list">
        <a href="#" class="nav__title">
          CUTTING
        </a>
        <ul class="nav__items">
          <a href="#" class="nav__item">
            Chainsaws
          </a>
          <a href="#" class="nav__item">
            Forest clearing saws
          </a>
          <a href="#" class="nav__item">
            Branch saws
          </a>
        </ul>
      </div>
      <div class="nav__list">
        <a href="#" class="nav__title">
          CUTTING GRASS
        </a>
        <ul class="nav__items">
          <a href="#" class="nav__item">
            LAWN CARE
          </a>
          <a href="#" class="nav__item">
            Lawn airers
          </a>
        </ul>
      </div>
      <div class="nav__list">
        <a href="#" class="nav__title">
          EQUIPMENT AND ACCESSORIES
        </a>
        <ul class="nav__items">
          <a href="#" class="nav__item">
            Personal protective equipment
          </a>
          <a href="#" class="nav__item">
            Aphids and forestry tools
          </a>
          <a href="#" class="nav__item">
            Lubricants, fuels and fuel jugs
          </a>
          <a href="#" class="nav__item">
            Uniforms
          </a>
          <a href="#" class="nav__item">
            Xplorer Leisure Clothing
          </a>

        </ul>
      </div>
      <div class="nav__list">
        <a href="#" class="nav__title">
          TRIMMING AND GRUBBING-UP
        </a>
        <ul class="nav__items">
          <a href="#" class="nav__item">
            Hedge trimmer
          </a>
          <a href="#" class="nav__item">
            Grass trimmers
          </a>
          <a href="#" class="nav__item">
            Grass tracks
          </a>
        </ul>
      </div>
      <div class="nav__list">
        <a href="#" class="nav__title">
          EARTHMAKING AND TIDYING
        </a>
        <ul class="nav__items">
          <a href="#" class="nav__item">
            Fans
          </a>
          <a href="#" class="nav__item">
            Garden milling
          </a>
        </ul>
      </div>
    </div>
    <a href="<?php
              the_field('bunner_link-open-nav menu', 'option');
              // if (ICL_LANGUAGE_CODE == 'en') {
              //   the_field('all_rights_reserved', 'option'); 
              // } elseif (ICL_LANGUAGE_CODE == 'fin') {
              //   the_field('all_rights_reserved-fi', 'option'); 
              // } elseif (ICL_LANGUAGE_CODE == 'se') {
              //   the_field('all_rights_reserved-se', 'option'); 
              // }
              ?>" class="nav__bunner">
      <img src="<?php
                the_field('bunner-open-nav menu', 'option');
                // if (ICL_LANGUAGE_CODE == 'en') {
                //   the_field('all_rights_reserved', 'option'); 
                // } elseif (ICL_LANGUAGE_CODE == 'fin') {
                //   the_field('all_rights_reserved-fi', 'option'); 
                // } elseif (ICL_LANGUAGE_CODE == 'se') {
                //   the_field('all_rights_reserved-se', 'option'); 
                // }
                ?>" alt="bunner">
    </a>

  </div>
</nav>


</body>


<?php wp_footer(); ?>

</html>