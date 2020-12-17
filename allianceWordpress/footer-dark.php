<footer class="footer-bg-white footer-bg-black">
<svg class="footer-svg anim-svg1" width="12" height="12" viewBox="0 0 12 12" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <circle class="anim-svg1" cx="6" cy="6" r="6" fill="#6EDED3" />
        </svg>
        <svg class="footer-svg anim-svg2" width="19" height="19" viewBox="0 0 19 19" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <g filter="url(#filter01_f)">
                <path
                    d="M7.4641 6.00002C9.37727 4.89545 11.8236 5.55095 12.9282 7.46412C14.0328 9.37729 13.3773 11.8237 11.4641 12.9282C9.55093 14.0328 7.10457 13.3773 6 11.4641C4.89543 9.55095 5.55093 7.10459 7.4641 6.00002Z"
                    fill="#2667FF" />
            </g>
            <defs>
                <filter id="filter01_f" x="0" y="0" width="18.9282" height="18.9282" filterUnits="userSpaceOnUse"
                    color-interpolation-filters="sRGB">
                    <feFlood flood-opacity="0" result="BackgroundImageFix" />
                    <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
                    <feGaussianBlur stdDeviation="2" result="effect1_foregroundBlur" />
                </filter>
            </defs>
        </svg>
        <svg class="footer-svg anim-svg3" width="37" height="37" viewBox="0 0 37 37" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path
                d="M11.4757 6.62524C17.8134 2.96617 25.9174 5.13762 29.5765 11.4753C33.2356 17.813 31.0641 25.917 24.7264 29.5761C18.3887 33.2352 10.2847 31.0637 6.62564 24.726C2.96657 18.3883 5.13802 10.2843 11.4757 6.62524Z"
                fill="#8AC3FC" fill-opacity="0.45" />
        </svg>
        <svg class="footer-svg anim-svg4" width="8" height="8" viewBox="0 0 8 8" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <circle cx="4" cy="4" r="4" fill="#FF558D" />
        </svg>
        <svg class="footer-svg anim-svg5" width="35" height="35" viewBox="0 0 35 35" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path
                d="M10.8253 6.25C16.804 2.79822 24.4489 4.84666 27.9006 10.8253C31.3524 16.804 29.304 24.4489 23.3253 27.9006C17.3467 31.3524 9.70178 29.304 6.25 23.3253C2.79822 17.3467 4.84666 9.70178 10.8253 6.25Z"
                fill="#FFEAF1" />
        </svg>


        <div class="container_block">
            <div class="footer-box">
                <div class="footer-logo">
                    <a href="<?php echo get_home_url(); ?>" ><img src="<?php the_field('dark-theme-logo-foot', 'option') ?>" alt=""> </a>
                    <div class="general-text">
                        <button  onclick="document.location='<?php echo nl2br(esc_html(get_theme_mod('btn-in-footer_link'))); ?>'" class="btn-general"><?php echo nl2br(esc_html(get_theme_mod('btn-in-footer'))); ?></button>
                        <div class="under-btn"></div>
                    </div>
                </div>
                <div class="footer-menu">
                    <h4><?php echo nl2br(esc_html(get_theme_mod('first-column-footer'))); ?></h4>  
                    <nav class="burger-menu_nav footer-menu_nav">
                        <a class="burger-dropt-d"><?php echo nl2br(esc_html(get_theme_mod('fr-in-fc'))); ?> <svg class="burg-dropt" width="9" height="5"
                                viewBox="0 0 9 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path class="svg-arr1" d="M4.5 5L0 0L9 5.04736e-07L4.5 5Z" fill="#0A0908" />
                            </svg>
                        </a>
                        <div class="burg-dropt_content">

                            <li class="burg-item1">
                                <svg class="svg1" width="5" height="9" viewBox="0 0 5 9" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5 4.5L0 9L6.12059e-07 0L5 4.5Z" fill="#FF558D" />
                                </svg>
                                <?php echo nl2br(esc_html(get_theme_mod('title-menu-1'))); ?>
                            </li>
                            <ul class="dropt_dropdown dr1">
                            <?php 
wp_nav_menu( array(                     
  'menu_class'      => '',                
  'theme_location'  => 'CONSULTING_SERVICES',              
) );
?>
                            </ul>

                            <li class="burg-item2">
                                <svg width="5" height="9" viewBox="0 0 5 9" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5 4.5L0 9L6.12059e-07 0L5 4.5Z" fill="#FF558D" />
                                </svg>
                                <?php echo nl2br(esc_html(get_theme_mod('title-menu-2'))); ?></li>
                            <ul class="dropt_dropdown dr2">
                            <?php 
wp_nav_menu( array(         
  'menu_class'      => '',                  
  'theme_location'  => 'PROCUREMENT_ADVICE',              
) );
?>
                            </ul>

                            <li class="burg-item3"><svg width="5" height="9" viewBox="0 0 5 9" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5 4.5L0 9L6.12059e-07 0L5 4.5Z" fill="#FF558D" />
                                </svg>
                                <?php echo nl2br(esc_html(get_theme_mod('title-menu-3'))); ?></li>
                            <ul class="dropt_dropdown dr3">
                            <?php 
wp_nav_menu( array(         
  'menu_class'      => '',                     
  'theme_location'  => 'CLOUD_SERVICES',              
) );
?>
                            </ul>

                            <li class="burg-item4"><svg width="5" height="9" viewBox="0 0 5 9" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5 4.5L0 9L6.12059e-07 0L5 4.5Z" fill="#FF558D" />
                                </svg>
                                <?php echo nl2br(esc_html(get_theme_mod('title-menu-4'))); ?></li>
                            <ul class="dropt_dropdown dr4">
                            <?php 
wp_nav_menu( array(         
  'menu_class'      => '',                     
  'theme_location'  => 'CLOUD_MONITORING_AND_MANAGEMENT',              
) );
?>

                            </ul>

                            <li class="burg-item5"><svg width="5" height="9" viewBox="0 0 5 9" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5 4.5L0 9L6.12059e-07 0L5 4.5Z" fill="#FF558D" />
                                </svg>
                                <?php echo nl2br(esc_html(get_theme_mod('title-menu-5'))); ?></li>
                            <ul class="dropt_dropdown dr5">
                            <?php 
wp_nav_menu( array(         
  'menu_class'      => '',                      
  'theme_location'  => 'HOSTING_AND_CONNECTIVITY',              
) );
?>
                            </ul>

                        </div>


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
                </div>
                <div class="footer-contact">
                    <h4> <?php echo nl2br(esc_html(get_theme_mod('two-column-footer'))); ?></h4>
                    <div><a href=""> <?php echo nl2br(esc_html(get_theme_mod('two-column-footer-fr'))); ?></a></div>
                    <div><a href=""> <?php echo nl2br(esc_html(get_theme_mod('two-column-footer-tr'))); ?></a></div>
                </div>
                <div class="block-subscribe">
                    <h4><?php echo nl2br(esc_html(get_theme_mod('three-column-footer'))); ?></h4>
                    
                    <?php echo do_shortcode( '[contact-form-7 id="529" title="Email in footer"]' ); ?>
                </div>
            </div>
            <div class="footer-copyright">
                <div><?php echo nl2br(esc_html(get_theme_mod('footer-info-1'))); ?></div>
                <div class="footer-privacy">
                    <div><a href="<?php echo nl2br(esc_html(get_theme_mod('footer-info-2-l'))); ?>"><?php echo nl2br(esc_html(get_theme_mod('footer-info-2'))); ?></a></div>
                    <div><a href="<?php echo nl2br(esc_html(get_theme_mod('footer-info-3-l'))); ?>"><?php echo nl2br(esc_html(get_theme_mod('footer-info-3'))); ?></a></div>
                </div>

            </div>
        </div>
    </footer>

  
    <?php wp_footer(); ?>
</body>

</html>