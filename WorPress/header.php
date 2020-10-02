<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?php bloginfo( 'description'); ?></title>
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
<?php wp_head(); ?>
</head>

<body>
  
  <header class="header" style=" background: url( <?php the_field('top__bg')?>); background-repeat: no-repeat; background-size: cover;">
    <div class="header__inner">
      <div class="logo">  <?php the_custom_logo() ?> </div>
      <img src="<?php bloginfo( 'template_url'); ?>/assets/img/home.png" alt="">
      <div class="header__name">
          <?php the_field('header__name')?>
      </div>
      <a href="#" class="phone">
      <?php the_field('phone')?>
      </a>
      <div class="header__title">
      <?php the_field('header__title')?>
      </div>
      <div class="header__sale">
        <img src=" <?php the_field('header__sale')?>" alt="">
      </div>
    </div>
    
  // add custom menu
    
    
    <?php  wp_nav_menu( [
	'container'       => 'ul', 
	'container_class' => 'header__menu-ul', 
	'menu_class'      => 'header__menu-ul', 
	'menu_id'         => '',
	'echo'            => true,
	'fallback_cb'     => 'wp_page_menu',
	'before'          => '',
	'after'           => '',
	'link_before'     => '',
	'link_after'      => '',
	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
	'depth'           => 0,
	'walker'          => '',
] ); ?>
    <ul class="header__menu-ul">
       //   <li class="header__menu-list"><a href="#home" class="header__menu-link"> <?php the_field('menu__link-home')?></a></li>
          <li class="header__menu-list"><a href="#whats-new" class="header__menu-link">What’s new</a></li>
          <li class="header__menu-list"><a href="#download" class="header__menu-link">Download</a></li>
          <li class="header__menu-list"><a href="#question" class="header__menu-link">FAQ</a></li>
          <li class="header__menu-list"><a href="#contact" class="header__menu-link">Contact</a></li>
        </ul>
    
    
  </header>
