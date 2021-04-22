<?php
 get_header();
/*
 Template Name: Our Offices
 */
?>

<main>
    <section class="vacancies">
      <div class="vacancies__container">
        <nav class="banner-nav home_tx-t">
          <a class="banner-nav__home naw-white-bg__home "  href="<?php echo get_home_url(); ?>" > Home &nbsp; / &nbsp;</a>
          <a  class="banner-nav__this-page naw-white-bg__page">  <?php the_title() ?></a>
        </nav>
        <div class="vacancies__title offices__main-title">
        <?php the_field('banner-title-our-offices'); ?>
        </div>

        <div class="vacancies__items">
            <?php
$featured_posts = get_field('vacancies__items');
if( $featured_posts ): ?>
    <?php foreach( $featured_posts as $post ):        
        setup_postdata($post); ?>
<div class="vacancies__item offices__item">
          <div class="vacancies__item-container">
          <h4 class="offices__title"> <?php the_field('offices__title'); ?></h4>
          <p class="offices__subtitle"> <?php the_field('offices__subtitle'); ?> </p>
          <div class="vacancies__item-line"></div>
          <div class="offices__phone-cont">
                <p class="offices__phone"> <?php the_field('offices__phone'); ?></p>
              </div>
          </div>
          </div>
    <?php endforeach; ?>
   
    <?php 
    wp_reset_postdata(); ?>
<?php endif; ?>
 
</div>
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