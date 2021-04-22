<?php
 get_header();
/*
 
 Template Name: About

 */
 
?>



 
<main class="main-cloud">

  <div class="bg-vont">
    <div class="about-container">
    
      <div class="line-container">
<p class="nav-about"><?php the_field('nav-about'); ?></p>

<h3 class="story__title"><?php the_field('story__title'); ?></h3>
<p class="story__text"><?php the_field('story__text'); ?> </p>
</div>
</div>

<div class="bg-about">
  <div class="about-container">
<div class="story__flex-container">
  <div class="story__left-block">
    <h3 class="story__left-block-title"><?php the_field('story__left-block-title'); ?></h3>
    <div class="story__items-block">

      <div class="story__items">
        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg" class="story__svg">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M20.0003 6.66666C12.6403 6.66666 6.66699 12.64 6.66699 20C6.66699 27.36 12.6403 33.3333 20.0003 33.3333C27.3603 33.3333 33.3337 27.36 33.3337 20C33.3337 12.64 27.3603 6.66666 20.0003 6.66666ZM20.0003 30.6667C14.1203 30.6667 9.33366 25.88 9.33366 20C9.33366 14.12 14.1203 9.33332 20.0003 9.33332C25.8803 9.33332 30.667 14.12 30.667 20C30.667 25.88 25.8803 30.6667 20.0003 30.6667ZM17.3337 22.8933L26.1203 14.1067L28.0003 16L17.3337 26.6667L12.0003 21.3333L13.8803 19.4533L17.3337 22.8933Z" fill="#FF558D"/>
          </svg>
      <p class="story__item"><?php the_field('story__item1'); ?></p>
        </div>
      
      <div class="story__items">
        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg" class="story__svg">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M20.0003 6.66666C12.6403 6.66666 6.66699 12.64 6.66699 20C6.66699 27.36 12.6403 33.3333 20.0003 33.3333C27.3603 33.3333 33.3337 27.36 33.3337 20C33.3337 12.64 27.3603 6.66666 20.0003 6.66666ZM20.0003 30.6667C14.1203 30.6667 9.33366 25.88 9.33366 20C9.33366 14.12 14.1203 9.33332 20.0003 9.33332C25.8803 9.33332 30.667 14.12 30.667 20C30.667 25.88 25.8803 30.6667 20.0003 30.6667ZM17.3337 22.8933L26.1203 14.1067L28.0003 16L17.3337 26.6667L12.0003 21.3333L13.8803 19.4533L17.3337 22.8933Z" fill="#FF558D"/>
          </svg>
      <p class="story__item"><?php the_field('story__item2'); ?></p>
        </div>
      </div>
  </div>
  <div class="story__right-block">
      <img src="<?php the_field('story__img'); ?>" class="story__img" alt="peaple">
      <img src="<?php bloginfo( 'template_url'); ?>/img/about/shadow.png" class="story__img story__img-bg" alt="peaple">
</div>
</div>

<section class="ou-values-about">
<p class="ou-values__nav-text about__nav-text"><?php the_field('ou-values__nav-text'); ?></p>
<h3 class="ou-values__title about__title-bg"><?php the_field('ou-values__title'); ?></h3>
<div class="ou-values__flex-container">
  <div class="ou-values__item">
    <h5 class="ou-values__item-title">
    <?php the_field('ou-values__item-title1'); ?>
    </h5>
    <p class="ou-values__item-text">
    <?php the_field('ou-values__item-text1'); ?>
    </p>
  </div>
  <div class="ou-values__item">
    <h5 class="ou-values__item-title">
    <?php the_field('ou-values__item-title2'); ?>
    </h5>
    <p class="ou-values__item-text">
    <?php the_field('ou-values__item-text2'); ?>
    </p>
  </div>
  <div class="ou-values__item">
    <h5 class="ou-values__item-title">
    <?php the_field('ou-values__item-title3'); ?>
    </h5>
    <p class="ou-values__item-text">
    <?php the_field('ou-values__item-text3'); ?>
    </p>
  </div>
</div>
</section>

<section class="by-from">
  <p class="by-from__text about__nav-text"> <?php the_field('by-from__text'); ?>?</p>
  <h3 class="by-from__title about__title-bg"> <?php the_field('by-from__title'); ?></h3>
  <p class="by-from__subtitle"> <?php the_field('by-from__subtitle'); ?></p>
<div class="flex-container-about-anim">

<div class="by-from__items-container">
      <div class="story__items by-from__items">
        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg" class="story__svg by-from__svg">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M20.0003 6.66666C12.6403 6.66666 6.66699 12.64 6.66699 20C6.66699 27.36 12.6403 33.3333 20.0003 33.3333C27.3603 33.3333 33.3337 27.36 33.3337 20C33.3337 12.64 27.3603 6.66666 20.0003 6.66666ZM20.0003 30.6667C14.1203 30.6667 9.33366 25.88 9.33366 20C9.33366 14.12 14.1203 9.33332 20.0003 9.33332C25.8803 9.33332 30.667 14.12 30.667 20C30.667 25.88 25.8803 30.6667 20.0003 30.6667ZM17.3337 22.8933L26.1203 14.1067L28.0003 16L17.3337 26.6667L12.0003 21.3333L13.8803 19.4533L17.3337 22.8933Z" fill="#FF558D"/>
          </svg>
      <p class="story__item by-from__item"> <?php the_field('story__item by-from__item1'); ?></p>
        </div>
      
        <div class="story__items by-from__items">
          <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg" class="story__svg by-from__svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M20.0003 6.66666C12.6403 6.66666 6.66699 12.64 6.66699 20C6.66699 27.36 12.6403 33.3333 20.0003 33.3333C27.3603 33.3333 33.3337 27.36 33.3337 20C33.3337 12.64 27.3603 6.66666 20.0003 6.66666ZM20.0003 30.6667C14.1203 30.6667 9.33366 25.88 9.33366 20C9.33366 14.12 14.1203 9.33332 20.0003 9.33332C25.8803 9.33332 30.667 14.12 30.667 20C30.667 25.88 25.8803 30.6667 20.0003 30.6667ZM17.3337 22.8933L26.1203 14.1067L28.0003 16L17.3337 26.6667L12.0003 21.3333L13.8803 19.4533L17.3337 22.8933Z" fill="#FF558D"/>
            </svg>
        <p class="story__item by-from__item"> <?php the_field('story__item by-from__item2'); ?>
          </p>
          </div>

          <div class="story__items by-from__items">
            <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg" class="story__svg by-from__svg">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M20.0003 6.66666C12.6403 6.66666 6.66699 12.64 6.66699 20C6.66699 27.36 12.6403 33.3333 20.0003 33.3333C27.3603 33.3333 33.3337 27.36 33.3337 20C33.3337 12.64 27.3603 6.66666 20.0003 6.66666ZM20.0003 30.6667C14.1203 30.6667 9.33366 25.88 9.33366 20C9.33366 14.12 14.1203 9.33332 20.0003 9.33332C25.8803 9.33332 30.667 14.12 30.667 20C30.667 25.88 25.8803 30.6667 20.0003 30.6667ZM17.3337 22.8933L26.1203 14.1067L28.0003 16L17.3337 26.6667L12.0003 21.3333L13.8803 19.4533L17.3337 22.8933Z" fill="#FF558D"/>
              </svg>
          <p class="story__item by-from__item"> <?php the_field('story__item by-from__item3'); ?></p>
            </div>
          </div>
<div class="animation-about">
  <img src=" <?php the_field('animation-about-img'); ?>" class="animation-about-img" alt="">
</div>

        </div>
</section>
</div>
</div>
</div>

<?php get_footer('light'); ?>

