<?php
get_header();
/*
 Template Name: services
 */
?>

<div class="services-first container">
  <h3 class="services-first__title"><?php the_field('title_fb_service'); ?>
  </h3>
  <a href="<?php the_field('button_link_fb_service'); ?>" class="standart-button-link services-first__btn"><?php the_field('button_text_fb_service'); ?></a>
</div>

<div class="services-slider container">
  <div class="services-slider__conter">01.</div>
  <div class="services-slider__slider">
    <?php
    if (have_rows('slider_service')) :
      while (have_rows('slider_service')) : the_row();
    ?>
        <div class="services-slider__item">
          <img src="<?php the_sub_field('slide_image_service'); ?>" class="services-slider__item-img" alt="img">
        </div>
    <?php
      endwhile;
    else :
    endif;
    ?>




  </div>
</div>

<div class="contact-page-two container contact-page-two_services change-bg-service-sont">
  <div class="contact-page-two__left_services contact-page-two__left"><?php the_field('left_text_tb_services'); ?>
    <p class="contact-page-two__text contact-page-two__text-services"><?php the_field('center_text_tb_services'); ?> </p>
  </div>

  <div class="contact-page-two__right_services contact-page-two__right">
    <p class="contact-page-two__text"><?php the_field('right_text_tb_services'); ?>
    </p>
  </div>
</div>

<section class="pre-scroll pre-scroll-fp-services pre-scroll-services container change-bg-st" id="references">
  <div class="pre-scroll__bg"></div>
  <div class="pre-scroll__left pre-scroll__left-two image__animation-container">
    <div class="pre-scroll__left-container ">
      <img src="<?php the_field('img_design'); ?>" alt="image" class="pre-scroll__img pre-scroll__img-two image__animation" data-aos="fade-up" data-aos-duration="3000">
    </div>
  </div>
  <div class="pre-scroll__right">
    <h3 class="pre-scroll__title pre-scroll__parts">
      <?php the_field('title_design'); ?>
    </h3>
    <div class="pre-scroll__parts pre-scroll__btn">
      <a href="<?php the_field('button_link_design'); ?>" class="standart-button-link"><?php the_field('button_text_design'); ?></a>
    </div>
    <p class="pre-scroll__parts pre-scroll__text">
    <?php the_field('left_text_design'); ?>
    </p>
    <p class="pre-scroll__parts pre-scroll__text">
    <?php the_field('right_text_design'); ?>
    </p>
    <p class="sup-scroll__text change-bg-sup "> <?php the_field('bold_text_design'); ?>
    </p>
  </div>
</section>

<div class="two-wrapper-scroll "  >
  <div class="two-sections-scroll two-sections-scroll-services" id="js-slideContainer">
    <div class="first-section-scroll">
    </div>

    <?php
    if (have_rows('horizontal_scroll_design')) :
      while (have_rows('horizontal_scroll_design')) : the_row();
    ?>
        <section class="section-scroll-two">
          <div class="section-scroll-two__container section-scroll-two__service">
            <img src="<?php the_sub_field('img'); ?>" class="section-scroll-two__service-img" alt="image">
          </div>
        </section>

    <?php
      endwhile;
    else :
    endif;
    ?>

  </div>
</div>




<section class="pre-scroll pre-scroll-services container two-pre-scroll pre-scroll-anim anim-services change-bg-st">
  <div class="pre-scroll__bg pre-scroll__bg-animation"></div>
  <div class="anim-services__left">
    <div class="anim-services__anim-container">
      <img src="<?php bloginfo('template_url'); ?>/img/phone.svg" class="anim-services__left-bg" alt="">
      <div class="anim-services__top">
        <p class="anim-services__top-text" id="typewriter"><?php the_field('search_query_anim'); ?> </p>
        <span class="anim-services__top-icon">
          <img src="<?php bloginfo('template_url'); ?>/img/anim-icon-top.png" class="anim-services__top-icon-img" alt="icon"></span>
      </div>
      <div class="anim-services__bot">
        <div class="anim-services__bot-url-cont">
          <span class="anim-services__bot-define"><?php the_field('first_row_result_left_part'); ?></span>
          <span class="anim-services__bot-dot">
            <svg width="2" height="2" viewBox="0 0 2 2" fill="none" xmlns="http://www.w3.org/2000/svg">
              <circle cx="1" cy="1" r="1" fill="#46494B" />
            </svg>
          </span>
          <span class="anim-services__bot-url"><?php the_field('first_row_result_right_part'); ?></span>
        </div>
        <h3 class="anim-services__bot-title"><?php the_field('two_row_result'); ?></h3>
        <p class="anim-services__bot-text"><?php the_field('three_row_result'); ?></p>
      </div>
      <img src="<?php bloginfo('template_url'); ?>/img/bottom-anim.svg" alt="img" class="anim-services__bottom-cvg">
    </div>

  </div>
  <div class="pre-scroll__right">
    <h3 class="pre-scroll__title pre-scroll__parts ">
      <?php the_field('title_traffic'); ?>
    </h3>
    <div class="pre-scroll__parts pre-scroll__btn">
      <a href="<?php the_field('button_link_traffic'); ?>" class="standart-button-link"><?php the_field('button_text_traffic'); ?></a>
    </div>
    <p class="pre-scroll__parts pre-scroll__text"> <?php the_field('left_text_traffic'); ?>
    </p>
    <p class="pre-scroll__parts pre-scroll__text"><?php the_field('right_text_traffic'); ?>
    </p>
    <div class="anim-services__text--bold"><?php the_field('bold_text_traffic'); ?></div>

  </div>
</section>


<div class="benefits container">
  <h3 class="benefits__title">
    <?php the_field('title_benets'); ?>
  </h3>
  <div class="benefits__container">
    <div class="benefits__item" data-aos="fade-up" data-aos-duration="1000">
      <div class="benefits__img-cont">
        <img src="<?php the_field('benefits_item_image_1'); ?>" alt="">
      </div>
      <p class="benefits__text"> <?php the_field('benefits_item_text_1'); ?></p>

    </div>
    <div class="benefits__item" data-aos="fade-up" data-aos-duration="2000">
      <div class="benefits__img-cont">
        <img src="<?php the_field('benefits_item_image_2'); ?>" alt="">
      </div>
      <p class="benefits__text"> <?php the_field('benefits_item_text_2'); ?></p>

    </div>
    <div class="benefits__item " data-aos="fade-up" data-aos-duration="3000">
      <div class="benefits__img-cont">
        <img src="<?php the_field('benefits_item_image_3'); ?>" alt="">
      </div>
      <p class="benefits__text"><?php the_field('benefits_item_text_3'); ?></p>

    </div>
    <div class="benefits__item" data-aos="fade-up" data-aos-duration="1000">
      <div class="benefits__img-cont">
        <img src="<?php the_field('benefits_item_image_4'); ?>" alt="">
      </div>
      <p class="benefits__text"><?php the_field('benefits_item_text_4'); ?></p>

    </div>
    <div class="benefits__item benefits__item-bottom" data-aos="fade-up" data-aos-duration="2000">
      <p class="benefits__item--small-text"><?php the_field('need_more_details'); ?></p>
    </div>
    <div class="benefits__item benefits__item-bottom" data-aos="fade-up" data-aos-duration="3000">
      <a class="benefits__item-link standart-button-link" href="<?php the_field('benefits_button_link'); ?>"><?php the_field('button_text_benefits'); ?></a>
    </div>
  </div>
</div>


<div class="service-partner container change-bg-partner">
  <div class="service-partner__bg">
  </div>
  <p class="service-partner__text"><?php the_field('text_partner_service'); ?>
  </p>
  <div class="service-partner__container">
    <div class="service-partner__left"><img src="<?php the_field('left_image_service_partner'); ?>" alt="" data-aos="fade-up" data-aos-duration="3000"></div>
    <div class="service-partner__right">
      <div class="service-partner__right-item our-concept__quadro-first image__animation-container">
        <img src="<?php the_field('right_image_service_partner'); ?>" class="our-concept__quadro-img image__animation" alt="image" data-aos="fade-up" data-aos-duration="3000">
      </div>
    </div>
  </div>
</div>

<div class="service-contact container">
  <h3 class="service-contact__title">
    <?php the_field('service-contact__title-new'); ?>
  </h3>

  <div class="service-contact__contact contact">
  
  <?php
        if (ICL_LANGUAGE_CODE == 'en') {
          echo do_shortcode('[contact-form-7 id="310" title="Contact us"]');
        } elseif (ICL_LANGUAGE_CODE == 'fi') {
          echo do_shortcode('[contact-form-7 id="768" title="Contact us fi"]');
        } elseif (ICL_LANGUAGE_CODE == 'se') {
          echo do_shortcode('[contact-form-7 id="882" title="Contact us se"]');
        }
        ?>
  </div>
</div>

<?php
get_footer();
?>