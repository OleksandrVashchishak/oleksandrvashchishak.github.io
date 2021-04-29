<?php get_header();
/*
 Template Name: home-main
 */
?>

<main class="main-black-bg">
  <section class="home-slider main-black-bg">
    <div class="home-slider__slider">
      <?php
      if (have_rows('home_slider_slider')) :
        while (have_rows('home_slider_slider')) : the_row();
      ?>
          <img src="<?php the_sub_field('image'); ?>" alt="img" class="home-slider__img">
      <?php
        endwhile;
      else :
      endif;
      ?>

    </div>


    <div class="home-slider__dots">

      <?php
      $counter_home_slider = 1;
      if (have_rows('home_slider_slider')) :
        while (have_rows('home_slider_slider')) : the_row();
      ?>

          <div class="home-slider__dots-item">
            <span class="home-slider__dots-num">0<?php echo $counter_home_slider++; ?></span>
            <p class="home-slider__dots-text">
              <?php the_sub_field('text_for_image'); ?>
            </p>
          </div>


      <?php
        endwhile;
      else :
      endif;
      ?>

    </div>
  </section>

  <section class="about-main my-container">
    <p class="about-main__pre-title standart-pre-title "><?php the_field('pre-title_about-home'); ?></p>
    <h3 class="about-main__title standart-title"><?php the_field('title_about-home'); ?></h3>
    <div class="about-main__df">
      <p class="about-main__text"><?php the_field('text_about-home'); ?> </p>
      <a href="<?php the_field('button_link_about-home'); ?>" class="about-main__link">
        <span class="about-main__link-icon">
          <svg width="6" height="13" viewBox="0 0 6 13" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M6 6.5L0.749999 12.9952L0.75 0.00480915L6 6.5Z" fill="#B7A179" />
          </svg>
        </span>
        <span class="about-main__link-text">
          <?php the_field('button_text_about-home'); ?>
        </span>
      </a>
    </div>
  </section>

  <div class="we-offer-bg--black">
    <section class="we-offer my-container">
      <p class="we-offer__pre-title standart-pre-title "><?php the_field('pre-title_offer-home'); ?></p>
      <h3 class="we-offer__title standart-title"><?php the_field('title_offer-home'); ?></h3>
      <div class="we-offer__items">
        <div class="we-offer__item">
          <img src="<?php the_field('image_offer-home_1'); ?>" alt="icon" class="we-offer__icon">
          <p class="we-offer__text"><?php the_field('text_offer-home_1'); ?></p>
        </div>
        <div class="we-offer__item">
          <img src="<?php the_field('image_offer-home_2'); ?>" alt="icon" class="we-offer__icon">
          <p class="we-offer__text"><?php the_field('text_offer-home_2'); ?> </p>
        </div>
        <div class="we-offer__item">
          <img src="<?php the_field('image_offer-home_3'); ?>" alt="icon" class="we-offer__icon">
          <p class="we-offer__text"><?php the_field('text_offer-home_3'); ?> </p>
        </div>
        <div class="we-offer__item">
          <img src="<?php the_field('image_offer-home_4'); ?>" alt="icon" class="we-offer__icon">
          <p class="we-offer__text"><?php the_field('text_offer-home_4'); ?></p>
        </div>
      </div>
    </section>
  </div>

  <section class="two-slider">
    <p class="two-slider__pre-title standart-pre-title my-container"><?php the_field('pre-title_tslider'); ?></p>
    <h3 class="two-slider__title standart-title my-container"><?php the_field('title_tslider'); ?></h3>

    <section class="customslider">
      <div class="slider-centermode">

        <?php
        if (have_rows('two_slider_repeater')) :
          while (have_rows('two_slider_repeater')) : the_row();
        ?>

            <div>
              <div class="slider-centermode__slide">
                <div class="slcont">
                  <div class="picbox">
                    <img src="<?php the_sub_field('image'); ?>" alt="img">
                  </div>
                  <a href="<?php the_sub_field('link'); ?>" class="expertisebtn">
                    <img src="<?php the_sub_field('text_image'); ?>" alt="icon">
                    <?php the_sub_field('text'); ?>
                    <span><?php the_sub_field('text_link'); ?></span>
                  </a>
                </div>
              </div>
            </div>


        <?php
          endwhile;
        else :
        endif;
        ?>

      </div>
      <div class="pagingInfo">
        <span class="cp1"></span>
        <span class="cp2"></span>
      </div>
    </section>


  </section>

  <div class="cross-black-bg">
    <section class="cross my-container">
      <p class="cross__pre-title standart-pre-title "><?php the_field('pre-title_cross'); ?></p>
      <h3 class="cross__title standart-title"><?php the_field('title_cross'); ?></h3>
      <div class="cross__wrapper">
        <div class="cross__card cross__card-left">
          <img src="<?php bloginfo('template_url'); ?>/img/cross-top-icon.svg" alt="icon" class="cross__top-icon">
          <p class="cross__card-text">
            “<?php the_field('card_text_cross_1'); ?>”
          </p>
          <div class="cross__brand-cont">
            <div class="cross__brand-cyrcle">
              <img src="<?php the_field('card_image_cross_1'); ?>" alt="brand" class="cross__brand">
            </div>
            <div class="cross__brand-texts">
              <p class="cross__brand-name"><?php the_field('card_brand_name_cross_1'); ?></p>
              <p class="cross__brand-descr"><?php the_field('card_company_cross_1'); ?></p>
            </div>
          </div>
        </div>
        <div class="cross__wrapper-center">
          <div class="cross__card cross__card-center">
            <img src="<?php bloginfo('template_url'); ?>/img/cross-top-icon.svg" alt="icon" class="cross__top-icon">
            <p class="cross__card-text">
              “<?php the_field('card_text_cross_2'); ?>”
            </p>
            <div class="cross__brand-cont">
              <div class="cross__brand-cyrcle">
                <img src="<?php the_field('card_image_cross_2'); ?>" alt="brand" class="cross__brand">
              </div>
              <div class="cross__brand-texts">
                <p class="cross__brand-name"><?php the_field('card_brand_name_cross_2'); ?></p>
                <p class="cross__brand-descr"><?php the_field('card_company_cross_2'); ?></p>
              </div>
            </div>
          </div>
          <div class="cross__card cross__card-center">
            <img src="<?php bloginfo('template_url'); ?>/img/cross-top-icon.svg" alt="icon" class="cross__top-icon">
            <p class="cross__card-text">
              “<?php the_field('card_text_cross_3'); ?>”
            </p>
            <div class="cross__brand-cont">
              <div class="cross__brand-cyrcle">
                <img src="<?php the_field('card_image_cross_3'); ?>" alt="brand" class="cross__brand">
              </div>
              <div class="cross__brand-texts">
                <p class="cross__brand-name"><?php the_field('card_brand_name_cross_3'); ?></p>
                <p class="cross__brand-descr"><?php the_field('card_company_cross_3'); ?></p>
              </div>
            </div>
          </div>
        </div>
        <div class="cross__card cross__card-right">
          <img src="<?php bloginfo('template_url'); ?>/img/cross-top-icon.svg" alt="icon" class="cross__top-icon">
          <p class="cross__card-text">
            “<?php the_field('card_text_cross_4'); ?>”
          </p>
          <div class="cross__brand-cont">
            <div class="cross__brand-cyrcle">
              <img src="<?php the_field('card_image_cross_4'); ?>" alt="brand" class="cross__brand">
            </div>
            <div class="cross__brand-texts">
              <p class="cross__brand-name"><?php the_field('card_brand_name_cross_4'); ?></p>
              <p class="cross__brand-descr"><?php the_field('card_company_cross_4'); ?></p>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <section class="contactus contactus_expertise">
    <div class="container">
      <?php echo do_shortcode('[contact-form-7 id="176" title="Common form"]'); ?>
    </div>
  </section>
</main>



<?php get_footer(); ?>