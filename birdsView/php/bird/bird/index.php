<?php get_header();
/*
 Template Name: home
 */
?>

<div class="welcome container ">
  <div class="welcome__slider-block">
    <div class="welcome__slider-left welcome__slider">

      <?php
      if (have_rows('left_part_slider_welcome')) :
        while (have_rows('left_part_slider_welcome')) : the_row();
      ?>
          <a href="<?php the_sub_field('welcome__slider-link'); ?>" class="welcome__slider-link tooltipLink welcome__slider-img-left" data-tooltip="<?php the_sub_field('tooltipLink'); ?>">
            <img class="welcome__slider-img " src="<?php the_sub_field('welcome__slider-img'); ?>" />
          </a>

      <?php
        endwhile;
      else :
      endif;
      ?>

    </div>

    <div class="welcome__slider-right welcome__slider">

      <?php
      if (have_rows('right_part_slider_welcome')) :
        while (have_rows('right_part_slider_welcome')) : the_row();
      ?>
          <a href="<?php the_sub_field('welcome__slider-link'); ?>" class="welcome__slider-link tooltipLink welcome__slider-img-left" data-tooltip="<?php the_sub_field('tooltipLink'); ?>">
            <img class="welcome__slider-img " src="<?php the_sub_field('welcome__slider-img'); ?>" />
          </a>

      <?php
        endwhile;
      else :
      endif;
      ?>
    </div>
  </div>
  <div class="welcome__text-block">
    <div class="welcome__text-block-cont">
      <h2 class="welcome__title"><?php the_field('title_welcome'); ?></h2>
      <div class="welcome__subtitle">
        <span class="welcome__line"></span>
        <p class="welcome__text"><?php the_field('subtitle_welcome'); ?></p>
      </div>
      <div class="welcome__buttons">
        <a href="<?php the_field('button_left_link_welcome'); ?>" class="standart-button-link welcome__left-btn"><?php the_field('button_left_text_welcome'); ?></a>
        <a href="<?php the_field('button_right_link_welcome'); ?>" class=" welcome__right-btn"><?php the_field('button_right_text_welcome'); ?></a>
      </div>
    </div>
  </div>
</div>




<section class="two-block container" id="discover">
  <div class="two-block__left">
    <h3 class="two-block__left-title">
      <?php the_field('title_tb_home'); ?>
    </h3>
    <a href=" <?php the_field('button_link_tb_home'); ?>" class="standart-button-link"> <?php the_field('button_text_tb_home'); ?></a>
  </div>
  <div class="two-block__right two-block__right-about">

    <div class="two-block__about-title-change"> <?php the_field('right_title_change'); ?></div>
    <div class="two-block__about-text"> <?php the_field('text_left_change'); ?></div>
    <div class="two-block__about-text"> <?php the_field('text_right_change'); ?></div>
    <div class="two-block__about-text two-block__about-text-hidden  hidden"> <?php the_field('text_left_change_hidden'); ?> </div>
    <div class="two-block__about-text two-block__about-text-hidden hidden"> <?php the_field('text_right_change_hidden'); ?></div>
    <span class="two-block__about-more"><?php the_field('text_right_change_hidden-btn-text'); ?></span>

  </div>
</section>





<section class="horizontal-block container ">
  <div class="horizontal-block__left-cont " data-aos="fade-right" data-aos-duration="3000">
    <img src=" <?php the_field('image_left_tb_home'); ?>" class="horizontal-block__left " alt="">
  </div>
  <div class="horizontal-block__right-cont " data-aos="fade-left" data-aos-duration="3000">
    <img src=" <?php the_field('image_right_tb_home'); ?>" class="horizontal-block__right " alt="">
  </div>
</section>

<section class="video-block container change-bg-video-block">
  <div class="video-block__right">
    <h3 class="video-block__title">

      <?php the_field('title_video_home'); ?>
    </h3>

    <div class="video-block__text-block">

      <p class="video-block__bot-text"><?php the_field('text_video_home'); ?> </p>
    </div>
  </div>

  <div class="video-block__left" data-aos="fade-left" data-aos-duration="3000">
    <video autoplay muted loop class="video-block__video">
      <source src="<?php the_field('video_home'); ?>">
      </source>
    </video>
    <img src="<?php the_field('video_mask_home'); ?>" alt="video-mask" class="video-block__video-mask">
  </div>
</section>

<section class="three-block container">
  <div class="three-block__left">
    <div class="three-block__title">
      <?php the_field('title_subvideo_home'); ?>
    </div>
  </div>
  <div class="three-block__right">
    <p class="three-block__text">
      <?php the_field('left_text_subvideo_home'); ?> </p>
    <p class="three-block__text">
      <?php the_field('right_text_subvideo_home'); ?> </p>
  </div>
</section>

<section class="pre-scroll pre-scroll-fp container pre-scroll-smoll change-bg-pre-scroll">
  <div class="pre-scroll__bg"></div>
  <div class="pre-scroll__left pre-scroll__left-first image__animation-container">
    <div class="pre-scroll__left-container " data-aos="fade-up" data-aos-duration="3000">
      <img src=" <?php the_field('image_home_solution'); ?>" alt="image" class="pre-scroll__img pre-scroll__img-first image__animation">
    </div>
  </div>
  <div class="pre-scroll__right">
    <h3 class="pre-scroll__title pre-scroll__parts">
      <?php the_field('title_solution_home'); ?>
    </h3>
    <div class="pre-scroll__parts pre-scroll__btn">
    </div>
    <p class="pre-scroll__parts pre-scroll__text"> <?php the_field('text_home_solution'); ?>
    </p>
    <p class="pre-scroll__parts pre-scroll__btn pre-scroll__btn-first">
      <a href=" <?php the_field('button_link_home_solution'); ?>" class="standart-button-link"><?php the_field('button_text_home_solution'); ?></a>
    </p>
  </div>
</section>

<div class="first-wrapper-scroll">
  <section class="pre-scroll container pre-scroll-bif-wrapper change-bg-pre-scroll ">
    <div class="pre-scroll__bg"></div>
    <div class="pre-scroll__left pre-scroll__left-first image__animation-container pre-scroll-big">
      <div class="pre-scroll__left-container ">
        <img src="<?php the_field('image_home_solution'); ?>" alt="image" class="pre-scroll__img pre-scroll__img-first image__animation">
        <div class="image__animation-block pre-scroll__block-first"></div>
      </div>
    </div>
    <div class="pre-scroll__right pre-scroll-big">
      <h3 class="pre-scroll__title pre-scroll__parts">
        <?php the_field('title_solution_home'); ?>
      </h3>
      <div class="pre-scroll__parts pre-scroll__btn">
      </div>
      <p class="pre-scroll__parts pre-scroll__text"> <?php the_field('text_home_solution'); ?>
      </p>
      <p class="pre-scroll__parts pre-scroll__btn pre-scroll__btn-first">
        <a href=" <?php the_field('button_link_home_solution'); ?>" class="standart-button-link"><?php the_field('button_text_home_solution'); ?></a>
      </p>

    </div>
  </section>
  <div class="first-sections-scroll" id="js-slideContainer">
    <div class="first-section-scroll">
    </div>
    <?php
    if (have_rows('horizontal_scroll_solution')) :
      while (have_rows('horizontal_scroll_solution')) : the_row();
    ?>

        <section class="section-scroll">
          <div class="section-scroll__container" style="background:  linear-gradient(180deg, rgba(52, 52, 52, 0.372) 0%, rgba(45, 45, 45, 0.6) 52.6%, rgba(45, 45, 45, 0.6) 100%), url(<?php the_sub_field('backgroung_image'); ?>);">
            <div class="section-scroll__top-cont">
              <img src="<?php the_sub_field('upper_left_icon'); ?>" alt="icon" class="section-scroll__icon">
              <p class="section-scroll__nimber"><?php the_sub_field('number'); ?></p>
            </div>
            <div class="section-scroll__bot-cont">
              <div class="section-scroll__text-cont">
                <h3 class="section-scroll__title"><?php the_sub_field('title'); ?></h3>
                <p class="section-scroll__text"><?php the_sub_field('visible_text'); ?></p>
                <p class="section-scroll__text hidden"><?php the_sub_field('hidden_text'); ?></p>
              </div>
              <div class="section-scroll__btn-cont">
                <span class="section-scroll__view-more-btn standart-button-link"> <?php the_sub_field('button_text'); ?></span>
              </div>
            </div>
          </div>
        </section>
    <?php
      endwhile;
    else :
    endif;
    ?>
  </div>
</div>

<section class="our-concept container our-concept-fp change-bg-concept">
  <div class="our-concept__quadro  our-concept__quadro-first image__animation-container ">
    <img src="<?php the_field('image_concept'); ?>" class="our-concept__quadro-img image__animation" alt="image" data-aos="fade-up" data-aos-duration="3000">
  </div>
  <h3 class="our-concept__title">
    <?php the_field('title_concept'); ?>
  </h3>
  <div class="our-concept__df">
    <div class="our-concept__left"></div>
    <div class="our-concept__rigth">

      <div class="our-concept__text-block">
        <h3 class="our-concept__rigth-title"><?php the_field('less_title_concept'); ?></h3>
        <p class="our-concept__text our-concept__text-left"> <?php the_field('left_text_concept'); ?></p>
        <p class="our-concept__text our-concept__text-right"> <?php the_field('right_text_concept'); ?></p>
      </div>
      <div class="our-concept__buttons-abs">
        <p class="our-concept__empty"></p>
        <div class="our-concept__btns">
          <a class="our-concept__btns-left standart-button-link"  href="<?php the_field('left_button_link_concept'); ?>"> <?php the_field('left_button_text_concept'); ?></a>
          <a class="our-concept__btns-right" href="<?php the_field('right_button_link_concept'); ?>"><?php the_field('right_button_text_concept'); ?></a>


        </div>
      </div>
    </div>
  </div>
</section>

<section class="pre-scroll pre-scroll container two-pre-scroll two-pre-scroll-fp pre-scroll-smoll change-bg-pre-scroll change-bg-pre-scroll-two">
  <div class="pre-scroll__bg"></div>

  <div class="pre-scroll__right">
    <h3 class="pre-scroll__title pre-scroll__parts">
      <?php the_field('title_home_story'); ?>
    </h3>
    <p class="pre-scroll__parts pre-scroll__text"><?php the_field('left_text__home_story'); ?>
      <br>
      <br>
      <?php the_field('right_text_home_story'); ?>
    </p>
    <div class="pre-scroll__parts pre-scroll__btn">
      <a href="<?php the_field('button_link_home_story'); ?>" class="standart-button-link"><?php the_field('button_text_home_story'); ?></a>
    </div>
  </div>
</section>

<div class="two-wrapper-scroll" id="customer-stories">
  <section class="pre-scroll container pre-scroll-bif-wrapper change-bg-pre-scroll change-bg-pre-scroll-two  pre-scroll-big">
    <div class="pre-scroll__bg"></div>

    <div class="pre-scroll__right">
      <h3 class="pre-scroll__title pre-scroll__parts">
        <?php the_field('title_home_story'); ?>
      </h3>
      <p class="pre-scroll__parts pre-scroll__text"><?php the_field('left_text__home_story'); ?>
        <br>
        <br>
        <?php the_field('right_text_home_story'); ?>
      </p>
      <div class="pre-scroll__parts pre-scroll__btn">
        <a href="<?php the_field('button_link_home_story'); ?>" class="standart-button-link"><?php the_field('button_text_home_story'); ?></a>
      </div>
    </div>
  </section>

  <div class="two-sections-scroll">
    <div class="first-section-scroll">
    </div>

    <?php
    if (have_rows('horizontal_scroll_story')) :
      while (have_rows('horizontal_scroll_story')) : the_row();
    ?>
        <section class="section-scroll-two">
          <div class="section-scroll-two__container">
            <h4 class="section-scroll-two__problem-title"><?php the_sub_field('problem_title'); ?></h4>
            <p class="section-scroll-two__problem-text"><?php the_sub_field('problem_text'); ?></p>
            <h4 class="section-scroll-two__answer-title"><?php the_sub_field('solution_title'); ?></h4>
            <p class="section-scroll-two__answer-text"><?php the_sub_field('solution_text'); ?></p>
            <div class="section-scroll-two__author">
              <img src="<?php the_sub_field('avatar'); ?>" alt="ava" class="section-scroll-two__ava">
              <div class="section-scroll-two__author-text">
                <h4 class="section-scroll-two__name"><?php the_sub_field('name'); ?></h4>
                <p class="section-scroll-two__descr"><?php the_sub_field('position'); ?></p>
              </div>
            </div>

          </div>
        </section>

    <?php
      endwhile;
    else :
    endif;
    ?>





  </div>
</div>

<section class="our-concept container contact-section change-bg-quadro change-bg-posre">
  <div class="change-bg-quadro--gray"></div>

  <h3 class="our-concept__title">
    <?php the_field('title_above_contact'); ?>
  </h3>
  <div class="our-concept__df">
    <div class="our-concept__left"></div>
    <div class="our-concept__rigth">
      <h3 class="our-concept__rigth-title"><?php the_field('less_title_above_contact'); ?></h3>
      <div class="our-concept__text-block">
        <p class="our-concept__text our-concept__text-left"><?php the_field('left_text_above_contact'); ?> </p>
        <p class="our-concept__text our-concept__text-right"><?php the_field('right_text_above_contact'); ?>
        </p>
      </div>

    </div>
  </div>
  <div class="our-concept__quadro contact">

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
</section>

<?php get_footer(); ?>