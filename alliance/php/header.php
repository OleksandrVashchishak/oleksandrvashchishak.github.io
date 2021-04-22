<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alliance-networks</title>
    <?php wp_head(); ?>
</head>

<body>
    <header>

        <div class="container_block head-block">
            <div class="row justify-content-center align-items-center">
                <div class="logotip col-3">
                 <?php the_custom_logo() ?>
                </div>
                <div class="col-9">
                    <ul class="menu-items">


                        <div class="dropdown">
                            <li class="more-inf dropbtn"><?php echo nl2br(esc_html(get_theme_mod('fr-in-fc'))); ?>
                                <svg width="9" height="5" viewBox="0 0 9 5" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path class="svg-arr" d="M4.5 5L0 0L9 5.04736e-07L4.5 5Z" fill="#0A0908" />
                                </svg>
                            </li>
                            <div class="dropdown-content header-menu-after-container">
                                <div class='header-menu-after'>
                                <?php 
wp_nav_menu( array(                     
  'menu_class'      => '',                
  'theme_location'  => 'CONSULTING_SERVICES',              
) );
?>
                                </div>
                                <div class='header-menu-after'>
                                <?php 
wp_nav_menu( array(         
  'menu_class'      => '',                  
  'theme_location'  => 'PROCUREMENT_ADVICE',              
) );
?>
                                </div>
                                <div class='header-menu-after'>
                                <?php 
wp_nav_menu( array(         
  'menu_class'      => '',                     
  'theme_location'  => 'CLOUD_SERVICES',              
) );
?>
                                </div>
                                <div class='header-menu-after'>
                                <?php 
wp_nav_menu( array(         
  'menu_class'      => '',                     
  'theme_location'  => 'CLOUD_MONITORING_AND_MANAGEMENT',              
) );
?>
                                </div>
                                <div class='header-menu-after'>
                                <?php 
wp_nav_menu( array(         
  'menu_class'      => '',                      
  'theme_location'  => 'HOSTING_AND_CONNECTIVITY',              
) );
?>
                                </div>
                            </div>
                        </div>
                        <?php 
wp_nav_menu( array(

                
	'menu_class'      => 'menu-items',         
	'menu_id'         => '',            
  'theme_location'  => 'top',             
  'depth'             => 2,                        
  'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
  'walker'            => new WP_Bootstrap_Navwalker()                          
) );
?>

                    </ul>
                </div>
            </div>

            <div class="burger-menu">
                <a href="" class="burger-menu_button">
                    <spun class="burger-menu_lines"></spun>
                </a>
                <nav class="burger-menu_nav">

                    <ul class="treemenu yest">
                        <li><span class="treeitem burger-dropt mobile-burger-first-item"><?php echo nl2br(esc_html(get_theme_mod('fr-in-fc'))); ?><svg class="burg-dropt" width="9"
                                    height="5" viewBox="0 0 9 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path class="svg-arr1" d="M4.5 5L0 0L9 5.04736e-07L4.5 5Z" fill="#2E2E2E" />
                                </svg>
                            </span>
                            <ul class="subtree">
                                <li><span class="treeitem tree-pink"><svg class="tree-svg" width="5" height="9"
                                            viewBox="0 0 5 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5 4.5L0 9L6.12059e-07 0L5 4.5Z" fill="#FF558D" />
                                        </svg> <?php echo nl2br(esc_html(get_theme_mod('title-menu-1'))); ?></span>
                                    <ul class="subtree itemmm">
                                      <?php
                                    wp_nav_menu( array(                     
  'menu_class'      => '',                
  'theme_location'  => 'CONSULTING_SERVICES',              
) );
?>
                                    </ul>
                                </li>
                                <li><span class="treeitem tree-pink"> <svg class="tree-svg" width="5" height="9"
                                            viewBox="0 0 5 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5 4.5L0 9L6.12059e-07 0L5 4.5Z" fill="#FF558D" />
                                        </svg> <?php echo nl2br(esc_html(get_theme_mod('title-menu-2'))); ?></span>
                                    <ul class="subtree">
                                    <?php 
wp_nav_menu( array(         
  'menu_class'      => '',                  
  'theme_location'  => 'PROCUREMENT_ADVICE',              
) );
?>
                                    </ul>
                                </li>
                                <li><span class="treeitem tree-pink"><svg class="tree-svg" width="5" height="9"
                                            viewBox="0 0 5 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5 4.5L0 9L6.12059e-07 0L5 4.5Z" fill="#FF558D" />
                                        </svg> <?php echo nl2br(esc_html(get_theme_mod('title-menu-3'))); ?></span>
                                    <ul class="subtree">
                                    <?php 
wp_nav_menu( array(         
  'menu_class'      => '',                     
  'theme_location'  => 'CLOUD_SERVICES',              
) );
?>

                                    </ul>
                                </li>
                                <li><span class="treeitem tree-pink"><svg class="tree-svg" class="tree-svg" width="5"
                                            height="9" viewBox="0 0 5 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5 4.5L0 9L6.12059e-07 0L5 4.5Z" fill="#FF558D" />
                                        </svg>
                                        <?php echo nl2br(esc_html(get_theme_mod('title-menu-4'))); ?></span>
                                    <ul class="subtree">
                                    <?php 
wp_nav_menu( array(         
  'menu_class'      => '',                     
  'theme_location'  => 'CLOUD_MONITORING_AND_MANAGEMENT',              
) );
?>
                                    </ul>
                                </li>
                                <li><span class="treeitem tree-pink"><svg class="tree-svg" width="5" height="9"
                                            viewBox="0 0 5 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5 4.5L0 9L6.12059e-07 0L5 4.5Z" fill="#FF558D" />
                                        </svg>
                                        <?php echo nl2br(esc_html(get_theme_mod('title-menu-5'))); ?></span>
                                    <ul class="subtree">
                                    <?php 
wp_nav_menu( array(         
  'menu_class'      => '',                      
  'theme_location'  => 'HOSTING_AND_CONNECTIVITY',              
) );
?>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                   
               
                    <?php 
wp_nav_menu( array(          
	'menu_class'      => 'mobile-menu-header-wp',         
	'menu_id'         => '',            
  'theme_location'  => 'top',             
  'depth'             => 2,                        
  'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
  'walker'            => new WP_Bootstrap_Navwalker()                          
) );
?>
                </nav>
                <div class="burger-menu_overlay"></div>
            </div>
        </div>
    </header>