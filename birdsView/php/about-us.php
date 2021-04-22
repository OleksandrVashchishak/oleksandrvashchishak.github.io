<?php
get_header();
/*
 Template Name: about us
 */
?>

<div class="about-main container">
  <h3 class="about-main__title"><?php the_field('title_about_fb'); ?>
  </h3>
  <div class="about-main__slider-wrapper">
    <div class="about-main__slider">
      <?php
      if (have_rows('slider_about')) :
        while (have_rows('slider_about')) : the_row();
      ?>
          <div class="about-main__slider-item">
            <div class="about-main__img-wrap"><img src="<?php the_sub_field('upper_left_img-about'); ?>" class="about-main__item-img" alt="img"></div>
            <div class="about-main__img-wrap about-main__img-wrap--down"><img src="<?php the_sub_field('upper_right_img-about'); ?>" class="about-main__item-img about-main__item-img--right" alt="img"></div>
            <div class="about-main__img-wrap"><img src="<?php the_sub_field('lower_left_img-about'); ?>" class="about-main__item-img" alt="img"></div>
            <div class="about-main__img-wrap about-main__img-wrap--down"><img src="<?php the_sub_field('lower_right_img-about'); ?>" class="about-main__item-img" alt="img"></div>
          </div>

      <?php
        endwhile;
      else :
      endif;
      ?>
    </div>
  </div>
</div>


<section class="two-block container">
  <div class="two-block__left">
    <h3 class="two-block__left-title two-block__left-title-about">
      <?php the_field('left_title_about_tb'); ?>
    </h3>
  </div>
  <div class="two-block__right two-block__right-about">
    <div class="two-block__about-text"><?php the_field('center_text_about_tb'); ?></div>
    <div class="two-block__about-text"><?php the_field('right_text_about_tb'); ?></div>
    <div class="two-block__about-text two-block__about-text-hidden  hidden"><?php the_field('center_text_about_tb_hiddden'); ?></div>
    <div class="two-block__about-text two-block__about-text-hidden hidden"><?php the_field('right_text_about_tb_hiddden'); ?></div>
    <span class="two-block__about-more"><?php the_field('btn_about_tb'); ?></span>


</section>

<section class="horizontal-block horizontal-block-about container ">
  <div class="horizontal-block__left-cont image__animation-container" data-aos="fade-right" data-aos-duration="3000">
    <img src="<?php the_field('left_image_tb_about'); ?>" class="horizontal-block__left image__animation" alt="">
  </div>
  <div class="horizontal-block__right-cont image__animation-container" data-aos="fade-left" data-aos-duration="3000">
    <img src="<?php the_field('right_image_tb_abou'); ?>" alt="" class="horizontal-block__right image__animation">
  </div>
</section>





<div class="about-croll-wrapper__bg container pre-scroll-smoll-about change-bg-st">
  <h3 class="first-section-scroll-about-title" data-aos="fade-right" data-aos-duration="3000">
    <?php the_field('title_team'); ?>
  </h3>
</div>

<div class="two-wrapper-scroll about-croll-wrapper">
  <div class="about-croll-wrapper__bg container pre-scroll-bif-wrapper change-bg-st">
    <h3 class="first-section-scroll-about-title" data-aos="fade-right" data-aos-duration="3000">
      <?php the_field('title_team'); ?>
    </h3>
  </div>
  <div class="two-sections-scroll two-sections-scroll-about">
    <div class="first-section-scroll first-section-scroll-about">
    </div>
    <?php
    if (have_rows('horizontal_scroll_team')) :
      while (have_rows('horizontal_scroll_team')) : the_row();
    ?>
        <section class="section-scroll-two about-scroll">
          <div class="about-scroll__container">
            <div class="about-scroll__contact-block" style="background: url(<?php the_sub_field('img'); ?>);">
              <a href="#" class="about-scroll__phone"> <?php the_sub_field('number'); ?></a>
              <a href="#" class="about-scroll__email"> <?php the_sub_field('email'); ?></a>
            </div>
            <div class="about-scroll__name-block">
              <span class="about-scroll__name"> <?php the_sub_field('name'); ?></span>
              <span class="about-scroll__name-separator">-</span>
              <span class="about-scroll__position"> <?php the_sub_field('position'); ?></span>
            </div>
            <ul class="about-scroll__skill-block">
              <?php
              if (have_rows('skils__team')) :
                while (have_rows('skils__team')) : the_row();
              ?>
                  <li class="about-scroll__skill">
                    <span class="about-scroll__skill-icon">
                      <img src="<?php the_sub_field('icon'); ?>" alt="icon">
                    </span>
                    <p class="about-scroll__skill-title"><?php the_sub_field('skil_title'); ?></p>
                  </li>
                  <li class="about-scroll__skill">
                    <p class="about-scroll__skill-descr"><?php the_sub_field('skil_description'); ?></p>
                  </li>
              <?php
                endwhile;
              else :
              endif;
              ?>
              <span class="about-scroll__skill-more"><?php the_sub_field('more'); ?></span>
            </ul>
          </div>
        </section>



    <?php
      endwhile;
    else :
    endif;
    ?>

  </div>
</div>

<section class="client container change-bg-st">
  <h3 class="client__title" data-aos="fade-right" data-aos-duration="3000">
    <?php the_field('title_clients'); ?>
  </h3>
  <div class="client__container-hiddens">
    <div class="client__container">
      <div class="client__item">
        <img src="<?php the_field('img_client_1'); ?>" alt="client" class="client__item-img">
      </div>
      <div class="client__item">
        <img src="<?php the_field('img_client_2'); ?>" alt="client" class="client__item-img">
      </div>

      <div class="client__item">
        <img src="<?php the_field('img_client_3'); ?>" alt="client" class="client__item-img">
      </div>

      <div class="client__item">
        <img src="<?php the_field('img_client_4'); ?>" alt="client" class="client__item-img">
      </div>
      <div class="client__item">
        <img src="<?php the_field('img_client_5'); ?>" alt="client" class="client__item-img">
      </div>
      <div class="client__item">
        <img src="<?php the_field('img_client_6'); ?>" alt="client" class="client__item-img">
      </div>
    </div>
  </div>
</section>


<?php get_footer(); ?>