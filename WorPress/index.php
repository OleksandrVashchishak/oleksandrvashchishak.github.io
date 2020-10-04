<?php get_header(); ?>
  <main class="main">
    <div class="main__img">
      <img src="<?php bloginfo( 'template_url'); ?>/assets/img/main-img.png" alt="">
    </div>
  </div>
      <div class="download">
       <p class="download__p"><a class="download__link" href="<?php the_field('download__link')?>" download>СКАЧАТЬ ВЕСЬ КАТАЛОГ ДОМОВ</a></p>
      </div>
         <div class="gallery__inner popup-gallery">
         <?php the_field('photo')?>
         </div>
      </div>
      <div class="main__img">
        <img src="<?php bloginfo( 'template_url'); ?>/assets/img/main-img.png" alt="">
        </div>
  </main>

Вивід кастомних постів:
1. копіювати цикл
2.створити кастомні поля і підставити назви
3. ствоити релатіоншіп в кастомних полях, на тій сторінці, на якій буду виодити пости
4.створити запис
5. зайти в сторінку в полі релатіоншіп вивести пости

  <?php
$featured_posts = get_field('project__item'); //Вказати ту ж назву, що і в полі релатіоншіп в кастомих полях
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


// Форма зворотнього звязку 
// contact form 7

    <form class="contact__form">
      <?php echo do_shortcode( '[contact-form-7 id="69" title="Контактна форма 1"]' ); ?>        
      </form>

// Текст який писав в вордпрессі в адмінці

<div class="contact__form-flex">
<p class="ppp">[text* Name class:contact__input class:contact__input-focus placeholder "Name"]</p>
<p class="ppp">[email* Email class:contact__input class:contact__input-focus placeholder "email"]</p>
<p class="ppp">[text* Subject class:contact__input class:contact__input-focus placeholder "subject"]</p>
<p class="ppp">[text Status id:inputValue class:contact__input class:input-value "status"]</p>
  </div>
[textarea textarea-48 class:contact__textarea "question"]
 <div class="contact__button-container">
        [submit class:contact__button "Send"]
        </div>
/////

 // Вивід панелі мов і її кастомізація
// просто змінити класи і налаштуватипід себе
  <ul class="home__togle-leng "> 
   <?php if(function_exists('pll_the_languages')){ 
         pll_the_languages(array('show_names'=>1)); 
    } ?> 
</ul>

  <?php get_footer(); ?>



 
