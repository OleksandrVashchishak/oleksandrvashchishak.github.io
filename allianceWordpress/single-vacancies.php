
<?php
/*
Single Post Template: Single vacancies
*/
 get_header();
?>

<main>
    <section class="vacancies-single">
      <div class="vacancies-single__container-top">
        <nav class="banner-nav vacancies-single__nav">
          <a href="<?php echo get_home_url(); ?>" class="banner-nav__home naw-white-bg__home"> Home &nbsp; / &nbsp;</a>
          <a href="<?php echo get_home_url();?>/vacancies/ " class="banner-nav__home naw-white-bg__home"> Careers &nbsp; / &nbsp;</a>
          <a href="#" class="banner-nav__this-page naw-white-bg__page"> <?php the_title(); ?> </a>
        </nav>
        <div class="vacancies-single__main-title"><?php the_title(); ?> </div>
      </div>
      <div class="vacancies-single__container">
        <button class="vacancies-single__top-btn" onclick="document.location='#bottomForm'" ><?php the_field('top-btn-svac', 'option') ?></button>
        <?php the_content(); ?>
       
        
        <div class="vacancies-single_line" id="bottomForm"></div>
        <?php echo do_shortcode( '[contact-form-7 id="588" title="Form in single vacancies"]' ); ?>

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
</main>
  <?php get_footer('dark'); ?>