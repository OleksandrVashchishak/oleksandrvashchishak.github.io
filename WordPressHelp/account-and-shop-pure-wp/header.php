<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-86740934-4"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-86740934-4');
    </script>
    <meta name="google-site-verification" content="pdgWQ3K2wX60zShCT2SEdDUuhzYLvfQT9NVVqXb7U2Q" />
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <meta charset="utf-8">
    <title><?= the_title() ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head() ?>
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700,800&display=swap" rel="stylesheet">
</head>

<body <?php body_class(); ?>>
    <header>
        <div class="logo">
            <a href="<?= site_url() ?>"><img src="<?= get_field('logo_header', get_option('page_on_front'))['url'] ?>"></a>
            <a class="mobile-logo" href="<?= site_url() ?>"><img src="<?= get_template_directory_uri() ?>/img/logo_mobile.jpg"></a>
        </div>
        <div class="wrap-menu">
            <div class="wrap">
                <?php wp_nav_menu(array(
                    'theme_location' => 'header-menu',
                    'container'      => '',
                    'menu_class'     => 'quartier_menu'
                )); ?>
                <?php
                 if (is_user_logged_in()) { 
                ?>
                <ul class="personal-account-menu  programe-menu">
                    <li class="menu-item-has-children">
                        <div class="account-menu-df">
                            <a href="/#contact"> CONTACT </a>
                            <?php
                            if (is_user_logged_in()) {
                            ?>
                                <a href="<?php the_field('login_url_copie', 'option') ?>" class="account-img-menu">
                                <?php } else { ?>
                                    <a href="<?php the_field('login_url', 'option') ?>" class="account-img-menu">
                                    <?php } ?>
                                    <svg width="17" height="18" viewBox="0 0 17 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4.25 4.26316C4.25 6.61358 6.15683 8.52632 8.5 8.52632C10.8432 8.52632 12.75 6.61358 12.75 4.26316C12.75 1.91274 10.8432 0 8.5 0C6.15683 0 4.25 1.91274 4.25 4.26316ZM16.0556 18H17V17.0526C17 13.3967 14.0335 10.4211 10.3889 10.4211H6.61111C2.96556 10.4211 0 13.3967 0 17.0526V18H16.0556Z" fill="#E95E40" />
                                    </svg>
                                    </a>
                                    <?php if (is_user_logged_in()) { ?>
                                        <span class="account-menu-icon-drop">
                                            <svg width="15" height="10" viewBox="0 0 15 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M7.5 10L1.00481 2.5L13.9952 2.5L7.5 10Z" fill="#E95E40" />
                                            </svg>

                                        </span>
                                        <a href="<?php echo wp_logout_url(get_permalink()); ?>" class="logut-account-menu">
                                            <svg width="12" height="18" viewBox="0 0 12 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M10.8333 9.5L8.33333 7M5 9.5H10.8333H5ZM10.8333 9.5L8.33333 12L10.8333 9.5Z" stroke="#E95E40" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                <line x1="1.25" y1="17.25" x2="1.25" y2="0.75" stroke="#E95E40" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </a>
                                    <?php } ?>
                        </div>
                        <?php  if (is_user_logged_in()) { ?>
                        <ul class="sub-menu >">
                            <?php
                           
                                if (have_rows('dropdown_items', 'option')) :
                                    while (have_rows('dropdown_items', 'option')) : the_row();
                            ?>
                                        <li> <a href="<?php the_sub_field('link'); ?>"><?php the_sub_field('item'); ?></a></li>
                            <?php
                                    endwhile;
                                else :
                                endif;
                           
                            ?>
                        </ul>
                        <?php  } ?>
                    </li>
                </ul>
                <?php
                }
                ?>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'header-menu-programe',
                    'container'      => '',
                    'menu_class'     => 'programe-menu'
                )); ?>
            </div>
            <div class="inscription">
                <a href="<?= get_permalink(209) ?>"><span>INSCRIPTION</span></a>
            </div>
            <?= do_shortcode('[wpml_language_switcher display_names_in_current_lang=1 type="footer" flags=1 native=0 translated=0][/wpml_language_switcher]') ?>
        </div>
        <div class="burger">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </header>