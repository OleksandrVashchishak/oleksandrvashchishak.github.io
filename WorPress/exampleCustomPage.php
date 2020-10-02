<?php
/*
Template Name: Timber
*/

 get_header(); 
?>

//При добаленні сторінки в меню не забути підставити в властивостях в шаблон


1231236543
<main class="main">
    <div class="container">
    <div class="main__img">
      <img src="<?php bloginfo( 'template_url'); ?>/assets/img/main-img.png" alt="">
    </div>
  </div>
      <div class="download">
        <img src="<?php bloginfo( 'template_url'); ?>/assets/img/home-download.png" alt="">
       <p class="download__p"><a class="download__link" href="<?php the_field('download__link')?>" download>СКАЧАТЬ ВЕСЬ КАТАЛОГ ДОМОВ</a></p>
      </div>
      <div class="container">
      <div class="gallery">
        <div class="gallery__title">
          ФОТОГРАФИИ НАШИХ РАБОТ
        </div>
        <div class="gallery__text ">
          некоторые фотографии построенных нами домов и бань из бруса
        </div>
         <div class="gallery__inner popup-gallery">
         <?php the_field('photo')?>
         </div>
      </div>
      <div class="main__img">
        <img src="<?php bloginfo( 'template_url'); ?>/assets/img/main-img.png" alt="">
      </div>
    </div>
  </main>
 
  <?php
$featured_posts = get_field('project__item');
if( $featured_posts ): ?>
    <ul>
    <?php foreach( $featured_posts as $post ): 

       
        setup_postdata($post); ?>
        <li>
        <li class="project__item">
        <div class="project__name"><?php the_field('project__name'); ?></div>
        <div class="project__size"><?php the_field('project__size'); ?></div>
        <div class="project__area"><?php the_field('project__area'); ?></div>
        <div class="project__price"><?php the_field('project__price'); ?></div>
        <div class="project__images">
          <div class="project__images-item">
          <img src="  <?php the_field('project__img-1'); ?>" alt="">
          </div>
          <div class="project__images-item">
          <img src=" <?php the_field('project__img-2'); ?>" alt="">
          </div>
        </div>
      </li>
        </li>
    <?php endforeach; ?>
    </ul>
    <?php 
  
    wp_reset_postdata(); ?>
<?php endif; ?>
<?php get_footer(); ?>


