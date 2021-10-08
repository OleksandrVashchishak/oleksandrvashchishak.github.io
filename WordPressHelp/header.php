<head>
  <title><?php bloginfo('description'); ?></title>
  <?php wp_head(); ?>
</head>

<div class="logo"> <?php the_custom_logo() ?> </div>
<img src="<?php bloginfo('template_url'); ?>/assets/img/home.png" alt="">

<?php wp_nav_menu([
  'theme_location'  => 'menu_name', // ввести назву свореного меню :вигляд -> меню 
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
]); ?>