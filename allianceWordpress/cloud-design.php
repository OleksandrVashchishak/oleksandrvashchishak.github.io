<?php
 get_header();
/*
 
 Template Name: Cloud design

 */
 
?>

<style>
.banner-bg {
  background: url(<?php the_field('cloud-desi-bg-bunner'); ?>);
  background-position: center;
  width: 100%;
  height: 380px;
}
</style>


<main class="main-cloud">
    <div class="banner-bg">
      <div class="banner-container">
        <nav class="banner-nav"> <a class="banner-nav__home cloud__nav-home" href="<?php echo get_home_url(); ?>"> Home &nbsp; / &nbsp;</a> <a href="#" class="banner-nav__this-page cloud__nav"> <?php the_title() ?> </a></nav>
        <h3 class="banner-title"><?php the_field('banner-title-cloud-design'); ?></h3>
      </div>
    </div>
<div class="cloud-line">
    <section class="could-business">
      <div class="could-business__container">
        <div class="could-business-flex-container">
          <h3 class="could-business__top-title">
          <?php the_field('could-business__top-title-fb'); ?>
          </h3>
          <p class="could-business__top-text">
          <?php the_field('could-business__top-text-fb'); ?>
          </p>
        </div>
        <div class="could-business__line"></div>
        <div class="could-business-flex-container">
          <ul class="could-business__ul">
            <?php
$featured_posts = get_field('could-business__ul-left');
if( $featured_posts ): ?>
    <?php foreach( $featured_posts as $post ):        
        setup_postdata($post); ?>
          <li class="could-business__list"><?php the_field('could-business__list-left'); ?>    </li>
    <?php endforeach; ?>
   
    <?php 
    wp_reset_postdata(); ?>
<?php endif; ?>

</ul>   
<ul class="could-business__ul">
<?php
$featured_posts = get_field('could-business__ul-right'); 
if( $featured_posts ): ?>
    <?php foreach( $featured_posts as $post ):        
        setup_postdata($post); ?>
          <li class="could-business__list"><?php the_field('could-business__list-right'); ?>    </li>
    <?php endforeach; ?>
   
    <?php 
    wp_reset_postdata(); ?>
<?php endif; ?>

          </ul>
        </div>
        <div class="could-business__line"></div>
        <p class="could-business__text">
        <?php the_field('could-business__text1'); ?>
        </p>

        <h4 class="could-business__title-img">
        <?php the_field('could-business__title-img'); ?>
        </h4>
        <img
          src="<?php the_field('could-business__first-img'); ?>"
          alt=""
          class="could-business__first-img"
        />
        <p class="could-business__text text-two-block" >
        <?php the_field('could-business__text2'); ?>
        </p>
        <p class="could-business__text text-two-block">
        <?php the_field('could-business__text3'); ?>
        </p>
        <div class="could-business__line"></div>
        <div class="could-business-flex-container  cloud-item-container">

        <?php
$featured_posts = get_field('could-business__item-list');
if( $featured_posts ): ?>
    <?php foreach( $featured_posts as $post ):        
        setup_postdata($post); ?>
          <div class="could-business__item-list">
          <h5 class="could-business__title-list"><?php the_field('could-business__title-list'); ?></h5>
            <p class="could-business__text-list">
            <?php the_field('could-business__text-list'); ?>
            </p>
         
          </div>
    <?php endforeach; ?>
   
    <?php 
    wp_reset_postdata(); ?>
<?php endif; ?>


         
        </div>
        <div class="could-business__line"></div>
        <div class="could-business-flex-container">
          <h3 class="could-business__top-title">
          <?php the_field('could-business__top-two-title'); ?>
          </h3>
          <p class="could-business__top-text">
          <?php the_field('could-business__top-two-text'); ?>
          </p>
        </div>
        <h4 class="could-business__title-img">
        <?php the_field('could-business__title-two-img'); ?>
        </h4>
        <img
          src=" <?php the_field('could-business__two-img'); ?>"
          alt="img"
          class="could-business__first-img"
        />

        <div class="could-business-flex-container">
          <h3 class="could-business__top-title">
          <?php the_field('title-over-bunner'); ?>
          </h3>
          <p class="could-business__top-text">
          <?php the_field('text-over-bunner1'); ?>
          </p>
        </div>

        <p class="could-business__text">
        <?php the_field('text-over-bunner2'); ?>
        </p>

        <div class="could-business__table">
          <h3 class="could-business__table-title">
          <?php the_field('could-business__table-title'); ?>
          </h3>
          <a href="#" class="could-business__table-button">  <?php the_field('could-business__table-button'); ?></a>
        </div>

        <div class="could-business-flex-container">
          <h3 class="could-business__top-title">
          <?php the_field('title-under-bunner'); ?>
          </h3>
          <div class="could-business__container-in">
          <p class="could-business__top-text">
          <?php the_field('text-under-bunner1'); ?>
          </p>
          <p class="could-business__top-text could-business__top-text-two">
          <?php the_field('text-under-bunner2'); ?>
            </p>
          </div>
        </div>

        <p class="could-business__text">
        <?php the_field('text-under-bunner3'); ?>
        </p>

        <p class="could-business__text">
        <?php the_field('text-under-bunner4'); ?>
        </p>
      </div>
      <div class="preloader-bg" id="preloaderMain">
        <div class="preloader-main">
        <div class="loader-item style4" >
        <div class="cube1"></div>
        <div class="cube2"></div>
        </div>  
        </div>
        </div>
    </section>
  </div>
</main>
<?php get_footer('dark'); ?>