<?php
get_header();
/*
 Template Name: web-dev
 */
?>


<div class="single__breadcrumbs web-dev container">

  <a href="<?php echo get_home_url(); ?>/services" class="single__bread-home">
  <?php the_field('web_deb_bread'); ?>
  </a>

  <span class="single__bread-separator this"><svg width="5" height="13" viewBox="0 0 5 13" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M0 12.1953L3.32031 0.351562H4.44531L1.13281 12.1953H0Z" fill="#5D5D5D" />
    </svg>

  </span>
  <span class="single__bread-this"> <?php the_field('web_first_title'); ?></span>
</div>

<div class="contact-page__start container contact-page__start container web-dev">
  <h3 class="contact-page__main-title web-dev__main-title"><?php the_field('web_first_title'); ?></h3>
  <a href="<?php the_field('web_first_button_link'); ?>" class="contact-page__main-button standart-button-link"><?php the_field('web_first_button_text'); ?></a>
</div>

<div class="contact-page-two container web-dev">
  <p class="contact-page-two__left"><?php the_field('web_first-text'); ?>

  </p>
  <div class="contact-page-two__right">
    <img src="<?php the_field('web_first-img'); ?>" alt="img">

  </div>
</div>

<section class="video-block container web-dev">
  <div class="video-block__right">
    <h3 class="video-block__title video-block__title--web-dev">
      <?php the_field('web_video_title'); ?>

    </h3>

    <div class="video-block__text-block">
      <p class="video-block__bot-text"><?php the_field('web_video-visible_text_1'); ?>
      </p>
      <p class="video-block__bot-text"><?php the_field('web_video-visible_text_2'); ?>
      </p>
      <p class="video-block__bot-text two-block__about-text-hidden hidden"><?php the_field('web_video-hidden_text_1'); ?>
      </p>
      <p class="video-block__bot-text two-block__about-text-hidden hidden"><?php the_field('web_video-hidden_text_2'); ?>
      </p>
      <span class="two-block__about-more"><?php the_field('web_video-btn'); ?></span>

    </div>
  </div>

  <div class="video-block__left" data-aos="fade-left" data-aos-duration="3000">
    <video autoplay muted loop class="video-block__video">
      <source src="<?php the_field('video_home_web-dev'); ?>">
      </source>
    </video>
    <img src="<?php the_field('video_mask_home_web_dev'); ?>" alt="video-mask" class="video-block__video-mask">
  </div>
</section>

<section class="pre-scroll pre-scroll-fp-services pre-scroll-services container web-dev web-dev-min">
  <div class="pre-scroll__bg"></div>
  <div class="pre-scroll__left pre-scroll__left-two image__animation-container">
    <div class="pre-scroll__left-container ">
      <img src="<?php the_field('web_pre_img'); ?>" alt="image" class="pre-scroll__img pre-scroll__img-two image__animation" data-aos="fade-up" data-aos-duration="3000">
    </div>
  </div>
  <div class="pre-scroll__right">
    <h3 class="pre-scroll__title pre-scroll__parts pre-scroll__title--web-dev">
      <?php the_field('web_pre_title'); ?>
    </h3>

    <p class="pre-scroll__parts pre-scroll__text">

      <?php the_field('web_pre_left_text'); ?>
    </p>
    <p class="pre-scroll__parts pre-scroll__text"> <?php the_field('web_pre_right_text'); ?>
    </p>

  </div>
</section>

<div class="first-wrapper-scroll web-dev">
  <section class="pre-scroll pre-scroll-fp-services pre-scroll-services container web-dev web-dev-max">
    <div class="pre-scroll__bg"></div>
    <div class="pre-scroll__left pre-scroll__left-two image__animation-container">
      <div class="pre-scroll__left-container ">
        <img src="<?php the_field('web_pre_img'); ?>" alt="image" class="pre-scroll__img pre-scroll__img-two image__animation" data-aos="fade-up" data-aos-duration="3000">
      </div>
    </div>
    <div class="pre-scroll__right">
      <h3 class="pre-scroll__title pre-scroll__parts">
        <?php the_field('web_pre_title'); ?>
      </h3>

      <p class="pre-scroll__parts pre-scroll__text">

        <?php the_field('web_pre_left_text'); ?>
      </p>
      <p class="pre-scroll__parts pre-scroll__text"> <?php the_field('web_pre_right_text'); ?>
      </p>

    </div>
  </section>
  <div class="first-sections-scroll" id="js-slideContainer">
    <div class="first-section-scroll">
    </div>

    <?php
    if (have_rows('web_pre_scroll_item')) :
      while (have_rows('web_pre_scroll_item')) : the_row();
    ?>

        <section class="section-scroll">
          <div class="section-scroll__container" style="background:  linear-gradient(180deg, rgba(52, 52, 52, 0.372) 0%, rgba(45, 45, 45, 0.6) 52.6%, rgba(45, 45, 45, 0.6) 100%), url(<?php the_sub_field('backgroung_image'); ?>);  ">
            <div class="section-scroll__top-cont">
              <img src="<?php the_sub_field('icon'); ?>" alt="icon" class="section-scroll__icon">
              <p class="section-scroll__nimber"><?php the_sub_field('number'); ?></p>
            </div>
            <div class="section-scroll__bot-cont">
              <div class="section-scroll__text-cont">
                <h3 class="section-scroll__title"><?php the_sub_field('title'); ?> </h3>
                <p class="section-scroll__text"><?php the_sub_field('text'); ?>
                </p>
                <ul class="about-scroll__skill-block">

                  <?php
                  if (have_rows('web_pre_benefits')) :
                    while (have_rows('web_pre_benefits')) : the_row();
                  ?>

                      <li class="about-scroll__skill">
                        <span class="about-scroll__skill-icon">
                          <img src="<?php the_sub_field('benefits_icon'); ?>" alt="icon">
                        </span>
                        <p class="about-scroll__skill-title"><?php the_sub_field('benefits_text'); ?></p>
                      </li>

                  <?php
                    endwhile;
                  else :
                  endif;
                  ?>


                </ul>
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

<section class="our-concept container contact-section web-dev">

  <h3 class="our-concept__title">
    <?php the_field('web_contact_title'); ?>
  </h3>
  <div class="our-concept__df">
    <div class="our-concept__left"></div>
    <div class="our-concept__rigth">
      <div class="our-concept__text-block">
        <p class="our-concept__text our-concept__text-left"> <?php the_field('web_contact_text_1'); ?> </p>
        <p class="our-concept__text our-concept__text-right"> <?php the_field('web_contact_text_2'); ?>
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

<?php
get_footer();
?>