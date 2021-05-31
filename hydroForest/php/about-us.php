<?php
get_header();
/*
 Template Name: About us
 */
?>

<div class="container">
<nav class="breadcrumbs container breadcrumbs__about">
  <a href="<?php echo get_home_url(); ?>" class="breadcrumbs__home">
    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
      <g clip-path="url(#clip0)">
        <path d="M16.4816 8.27283V17.5905H12.9635V13.5607C12.9635 13.2074 12.6771 12.921 12.3239 12.921H7.82492C7.4716 12.921 7.18527 13.2074 7.18527 13.5607V17.5905H3.68848V8.27283H2.40918V18.2302C2.40918 18.5835 2.69555 18.8698 3.04883 18.8698H7.82496C8.17828 18.8698 8.46461 18.5835 8.46461 18.2302V14.2004H11.6842V18.2302C11.6842 18.5835 11.9706 18.8699 12.3239 18.8699H17.1213C17.4746 18.8699 17.761 18.5835 17.761 18.2302V8.27283H16.4816Z" fill="#222222" />
        <path d="M19.7975 9.9808L10.5224 1.30279C10.2782 1.074 9.89871 1.07252 9.65246 1.29873L0.206833 9.97677C-0.0532847 10.2158 -0.070355 10.6203 0.168668 10.8804C0.294684 11.0179 0.46695 11.0874 0.639879 11.0874C0.79445 11.0874 0.949684 11.0316 1.0725 10.9188L10.0814 2.64201L18.9234 10.9149C19.1819 11.1565 19.5861 11.1427 19.8275 10.8849C20.0687 10.6269 20.0554 10.2222 19.7975 9.9808Z" fill="#222222" />
      </g>
      <defs>
        <clipPath id="clip0">
          <rect width="20" height="20" fill="white" />
        </clipPath>
      </defs>
    </svg>
  </a>
  <span class="breadcrumbs__separator">
    <svg width="6" height="6" viewBox="0 0 6 6" fill="none" xmlns="http://www.w3.org/2000/svg">
      <rect width="6" height="6" rx="2" fill="#B1BDC9" />
    </svg>
  </span>
  <span class="breadcrumbs__this">
    <?php the_title(); ?>
  </span>
</nav>
</div>
<div class="welcome-black-bg welcome-black-about">
  <section class="welcome container welcome-about">
    <div class="nav-title">
      <span class="nav-title__line"></span>
      <p class="nav-title__text nav-title__text-up"><?php the_field('pre-title-about-wel'); ?></p>
    </div>

    <h3 class="welcome__title  st-title"><?php the_field('title-about-wel'); ?></h3>
    <div class="welcome__text-df ">
      <span class="st-letter"></span>
      <p class="welcome__text fl-text"> <?php the_field('text_under_title-about-wel'); ?>
      </p>
    </div>

    <div class="welcome__df">
      <div class="welcome__left">
        <div class="welcome__slider welcome__slider-js">
          <?php
          if (have_rows('slider-welcome-about')) :
            while (have_rows('slider-welcome-about')) : the_row();
          ?>
              <img src="<?php the_sub_field('image'); ?>" class="welcome__slider-item" alt="img">
          <?php
            endwhile;
          else :
          endif;
          ?>

        </div>
        <div class="welcome__slider-count"><span class="welcome__slider-current-slide">1</span><span class="welcome__slider-separator">/</span><span class="welcome__slider-all-slide"></span></div>
      </div>
      <div class="welcome__right">
        <p class="welcome__right-text "><?php the_field('Text-on-the-right-about-wel'); ?> </p>

        <p class="welcome__right-text--bold st-bold"><?php the_field('Text on the right-bold-home-wel'); ?></p>
      </div>
    </div>
  </section>
</div>

<div class="gray--bg about-gray-bg">
  <section class="about container">
    <div class="nav-title">
      <span class="nav-title__line"></span>
      <p class="nav-title__text nav-title__text-lower"><?php the_field('pre_title-tabout'); ?></p>
    </div>
    <h3 class="about__title  st-title"><?php the_field('title-tabout'); ?></h3>
    <div class="about__top-df">
      <div class="welcome__text-df about__fl">
        <span class="st-letter"></span>
        <p class="welcome__text fl-text"> <?php the_field('top_left_text-tabout'); ?>
        </p>
      </div>

      <p class="about__top--text">
        <?php the_field('top_right_text-tabout'); ?>
      </p>
    </div>
    <div class="about__top-df">
      <p class="about__top--text about__top--text-left">
        <?php the_field('bottom_left_text-tabout'); ?>
      </p>

      <p class="about__top--text">
        <?php the_field('bottom_right_text-tabout'); ?>
      </p>
    </div>

    <div class="about__bot">
      <div class="welcome__df welcome__df-about">
        <div class="welcome__right welcome__right-about">
          <p class="welcome__right-text "><?php the_field('f_text-tabout'); ?></p>

          <p class="welcome__right-text--bold "><?php the_field('two_text-tabout'); ?></p>
          <a href="<?php the_field('button_link-tabout'); ?>" class="welcome__right-link"><?php the_field('button_text-tabout'); ?></a>
        </div>
        <div class="welcome__left">
          <div class="welcome__slider about__two-slider">
            <?php
            if (have_rows('slider-tabout')) :
              while (have_rows('slider-tabout')) : the_row();
            ?>
                <img src="<?php the_sub_field('slider_image'); ?>" class="welcome__slider-item about__two-slider-item" alt="img">
            <?php
              endwhile;
            else :
            endif;
            ?>
          </div>
          <div class="welcome__slider-count "><span class="welcome__slider-current-slide about__two-slider-current-slide">1</span><span class="welcome__slider-separator ">/</span><span class="welcome__slider-all-slide about__two-slider-all-slide"></span></div>
        </div>

      </div>
    </div>

  </section>

</div>

<section class="our-brand container">
  <div class="nav-title">
    <span class="nav-title__line"></span>
    <p class="nav-title__text"><?php the_field('pre_title-our-brand', 'option'); ?></p>
  </div>

  <h3 class="our-brand__title  st-title"><?php the_field('title-our-brand', 'option'); ?></h3>
  <div class="our-brand__brands">


    <?php
    if (have_rows('brands-our-brand', 'option')) :
      while (have_rows('brands-our-brand', 'option')) : the_row();
    ?>
        <div class="our-brand__brand-wrap">
          <img src="<?php the_sub_field('brand_logo-our-brand', 'option'); ?>" class="our-brand__brand" alt="brand">
        </div>
    <?php
      endwhile;
    else :
    endif;
    ?>


  </div>
</section>

<section class="adventag container">
  <div class="nav-title">
    <span class="nav-title__line"></span>
    <p class="nav-title__text"><?php the_field('pre_title-advant'); ?></p>
  </div>

  <h3 class="adventag__main-title  st-title"><?php the_field('title-advant'); ?></h3>

  <div class="adventag__items">
    <div class="adventag__item">
      <div class="adventag__icon-wrap">
        <img src="<?php the_field('first_icon-advant'); ?>" class="adventag__icon" alt="icon">
      </div>
      <h3 class="adventag__title"><?php the_field('first_title-advant'); ?></h3>
      <p class="adventag__text"><?php the_field('text-advant-first'); ?>
      </p>
    </div>
    <div class="adventag__item adventag__item--center">
      <div class="adventag__icon-wrap">
        <img src="<?php the_field('second_icon-advan'); ?>" class="adventag__icon" alt="icon">
      </div>
      <h3 class="adventag__title"><?php the_field('second_title-advant'); ?></h3>
      <p class="adventag__text"><?php the_field('text-advant-second'); ?>
      </p>
    </div>
    <div class="adventag__item">
      <div class="adventag__icon-wrap">
        <img src="<?php the_field('third_icon-advan_copy'); ?>" class="adventag__icon" alt="icon">
      </div>
      <h3 class="adventag__title"><?php the_field('third_title-advan'); ?></h3>
      <p class="adventag__text"><?php the_field('third-advant-second'); ?>
      </p>
    </div>


  </div>
</section>

<?php get_footer(); ?>