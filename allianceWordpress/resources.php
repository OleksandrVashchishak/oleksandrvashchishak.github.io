<?php
 get_header();
/*
 Template Name: Resources
 */
?>

  




<main>
   <section class="resources">
     <div class="resources__container">
      <nav class="banner-nav">
        <a class="banner-nav__home naw-white-bg__home" href="<?php echo get_home_url(); ?>"> Home &nbsp; / &nbsp;</a>
        <a href="#" class="banner-nav__this-page naw-white-bg__page"> <?php the_title() ?></a>
      </nav>
       <h3 class="resources__title"><?php the_title() ?></h3>
         <div class="resources__items">
         <div class="resources__item">
         <?php 
wp_nav_menu( array(                     
  'menu_class'      => 'resources__item-text resources__item-link',                
  'theme_location'  => 'CONSULTING_SERVICES',              
) );
?>
  </div>
<div class="resources__item">
<?php 
wp_nav_menu( array(         
  'menu_class'      => 'resources__item-text resources__item-link',                  
  'theme_location'  => 'PROCUREMENT_ADVICE',              
) );
?>
  </div>
  <div class="resources__item">
<?php 
wp_nav_menu( array(         
  'menu_class'      => 'resources__item-text resources__item-link',                     
  'theme_location'  => 'CLOUD_SERVICES',              
) );
?>
  </div>
  <div class="resources__item">
<?php 
wp_nav_menu( array(         
  'menu_class'      => 'resources__item-text resources__item-link resources__item-marg',                     
  'theme_location'  => 'CLOUD_MONITORING_AND_MANAGEMENT',              
) );
?>
  </div>
  <div class="resources__item">
<?php 
wp_nav_menu( array(         
  'menu_class'      => 'resources__item-text resources__item-link resources__item-marg',                      
  'theme_location'  => 'HOSTING_AND_CONNECTIVITY',              
) );
?>
  </div>
          <div class=" resources__item">
          </div>
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