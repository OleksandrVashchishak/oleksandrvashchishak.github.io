<section class="home-fb home-fb__wrapper" style="background: url('<?php block_field('background-image') ?>')">
  <div class="container">
    <div class="home-fb__top-height-block"></div>
    <h1 class="home-fb__title">
    <?php block_field('title') ?>
    </h1>
    <div>
      <p class="home-fb__text">
      <?php block_field('text') ?>
      </p>
      <a href="#two-block" class="home-fb__scroll-icon">
        <svg width="10" height="20" viewBox="0 0 10 20" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M8.29303 13.293L6.00003 15.586V0H4.00003V15.586L1.70703 13.293L0.29303 14.707L5.00003 19.414L9.70703 14.707L8.29303 13.293Z" fill="#FF7474" />
        </svg>
      </a>
    </div>
  </div>
</section>
 
<div class="logo-bg-left">
<section class="lets-work container" id="two-block">
    <p class="lets-work__left-text">
    <?php block_field('left-bold-text') ?>
    </p>
    <div class="lets-work__right">
      <p class="lets-work__right-text">
      <?php block_field('left-text') ?>
      </p>
      <a href="<?php block_field('button-link') ?>" class="lets-work__link main-btn">  <?php block_field('button-text') ?></a>

    </div>
  </section>