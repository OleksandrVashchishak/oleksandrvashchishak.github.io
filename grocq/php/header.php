<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Grocq</title>
    <?php wp_head(); ?>

</head>

<body>
    <header class="header">
        <div class="header__top">
            <a href="<?php the_field('doctorlib_link-opt', 'option'); ?>" class="header__top-link">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M16 11V17C16 17.5304 15.7893 18.0391 15.4142 18.4142C15.0391 18.7893 14.5304 19 14 19H3C2.46957 19 1.96086 18.7893 1.58579 18.4142C1.21071 18.0391 1 17.5304 1 17V6C1 5.46957 1.21071 4.96086 1.58579 4.58579C1.96086 4.21071 2.46957 4 3 4H9" stroke="#767676" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M13 1H19V7" stroke="#767676" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M8 12L19 1" stroke="#767676" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <span class="inherit-elem "> <?php the_field('doctorlib_text', 'option'); ?></span>
            </a>
            <div class="header__top-data">
                <a href="tel:<?php the_field('phone_number-opt', 'option'); ?>" class="header__phone">
                    <span class="inherit-elem "><?php the_field('phone_number-opt', 'option'); ?></span>
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19.9999 14.9201V17.9201C20.0011 18.1986 19.944 18.4743 19.8324 18.7294C19.7209 18.9846 19.5572 19.2137 19.352 19.402C19.1468 19.5902 18.9045 19.7336 18.6407 19.8228C18.3769 19.912 18.0973 19.9452 17.8199 19.9201C14.7428 19.5857 11.7869 18.5342 9.18993 16.8501C6.77376 15.3148 4.72527 13.2663 3.18993 10.8501C1.49991 8.2413 0.448176 5.27109 0.119933 2.1801C0.0949436 1.90356 0.127808 1.62486 0.216434 1.36172C0.305059 1.09859 0.447504 0.856786 0.634699 0.651718C0.821894 0.44665 1.04974 0.282806 1.30372 0.170619C1.55771 0.0584315 1.83227 0.000358432 2.10993 9.69523e-05H5.10993C5.59524 -0.00467949 6.06572 0.167176 6.43369 0.48363C6.80166 0.800084 7.04201 1.23954 7.10993 1.7201C7.23656 2.68016 7.47138 3.62282 7.80993 4.5301C7.94448 4.88802 7.9736 5.27701 7.89384 5.65098C7.81408 6.02494 7.6288 6.36821 7.35993 6.6401L6.08993 7.9101C7.51349 10.4136 9.58639 12.4865 12.0899 13.9101L13.3599 12.6401C13.6318 12.3712 13.9751 12.1859 14.3491 12.1062C14.723 12.0264 15.112 12.0556 15.4699 12.1901C16.3772 12.5286 17.3199 12.7635 18.2799 12.8901C18.7657 12.9586 19.2093 13.2033 19.5265 13.5776C19.8436 13.9519 20.0121 14.4297 19.9999 14.9201Z" fill="#767676" />
                    </svg>
                </a>
                <a href="<?php the_field('location_link-opt', 'option'); ?>" class="header__adress">
                    <span class="inherit-elem"><?php the_field('loaction_text-opt', 'option'); ?></span>
                    <svg width="18" height="22" viewBox="0 0 18 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M9 22C9 22 18 16 18 9C18 6.61305 17.0518 4.32387 15.364 2.63604C13.6761 0.948211 11.3869 0 9 0C6.61305 0 4.32387 0.948211 2.63604 2.63604C0.948211 4.32387 0 6.61305 0 9C0 16 9 22 9 22ZM12 9C12 10.6569 10.6569 12 9 12C7.34315 12 6 10.6569 6 9C6 7.34315 7.34315 6 9 6C10.6569 6 12 7.34315 12 9Z" fill="#767676" />
                    </svg>
                </a>
            </div>
        </div>
        <div class="header__main">
            <div class="header__logo-mobile">
                <?php the_custom_logo() ?>
            </div>
            <div class="header__burger ">
                <span class="header__burger-line"></span>
            </div>

            <div class="header__main-container">
                <div class="header__logo">
                    <?php the_custom_logo() ?>
                </div>

                <div class="header__menu">
                    <?php
                    wp_nav_menu(array(
                        'menu_class'      => 'header__menu',
                        'theme_location'  => 'header_menu',
                        'container' => false
                    ));
                    ?>


                </div>
                <div class="header__dropdown-wrapper">
                    <span class="header__btn  main-btn"><span><span>Prendre RDV</span></span></span>
                    <span class="header__btn-arrow">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M18 15L12 9L6 15" stroke="#BA880B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </span>
                    <ul class="header__dropdown">

                        <?php
                        if (have_rows('header_doctors', 'option')) :
                            while (have_rows('header_doctors', 'option')) : the_row();
                        ?>
                                <a href='<?php the_sub_field('link_to_doctor-opt', 'option'); ?>' target="_blank" class="header__dropdown-item">
                                    <span class="header__dropdown-name"><?php the_sub_field('name_doctor-header', 'option'); ?></span>
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16 11V17C16 17.5304 15.7893 18.0391 15.4142 18.4142C15.0391 18.7893 14.5304 19 14 19H3C2.46957 19 1.96086 18.7893 1.58579 18.4142C1.21071 18.0391 1 17.5304 1 17V6C1 5.46957 1.21071 4.96086 1.58579 4.58579C1.96086 4.21071 2.46957 4 3 4H9" stroke="#767676" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M13 1H19V7" stroke="#767676" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M8 12L19 1" stroke="#767676" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </a>
                        <?php
                            endwhile;
                        else :
                        endif;
                        ?>

                    </ul>
                </div>




                <div class="header__mobile-contact">

                    <a href="<?php the_field('doctorlib_link-opt', 'option'); ?>" class="header__top-link">
                        <span class="inherit-elem "><?php the_field('doctorlib_text', 'option'); ?> </span>
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16 11V17C16 17.5304 15.7893 18.0391 15.4142 18.4142C15.0391 18.7893 14.5304 19 14 19H3C2.46957 19 1.96086 18.7893 1.58579 18.4142C1.21071 18.0391 1 17.5304 1 17V6C1 5.46957 1.21071 4.96086 1.58579 4.58579C1.96086 4.21071 2.46957 4 3 4H9" stroke="#767676" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M13 1H19V7" stroke="#767676" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M8 12L19 1" stroke="#767676" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>

                    <a href="<?php the_field('phone_number-opt', 'option'); ?>" class="header__phone">
                        <span class="inherit-elem "><?php the_field('phone_number-opt', 'option'); ?></span>
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19.9999 14.9201V17.9201C20.0011 18.1986 19.944 18.4743 19.8324 18.7294C19.7209 18.9846 19.5572 19.2137 19.352 19.402C19.1468 19.5902 18.9045 19.7336 18.6407 19.8228C18.3769 19.912 18.0973 19.9452 17.8199 19.9201C14.7428 19.5857 11.7869 18.5342 9.18993 16.8501C6.77376 15.3148 4.72527 13.2663 3.18993 10.8501C1.49991 8.2413 0.448176 5.27109 0.119933 2.1801C0.0949436 1.90356 0.127808 1.62486 0.216434 1.36172C0.305059 1.09859 0.447504 0.856786 0.634699 0.651718C0.821894 0.44665 1.04974 0.282806 1.30372 0.170619C1.55771 0.0584315 1.83227 0.000358432 2.10993 9.69523e-05H5.10993C5.59524 -0.00467949 6.06572 0.167176 6.43369 0.48363C6.80166 0.800084 7.04201 1.23954 7.10993 1.7201C7.23656 2.68016 7.47138 3.62282 7.80993 4.5301C7.94448 4.88802 7.9736 5.27701 7.89384 5.65098C7.81408 6.02494 7.6288 6.36821 7.35993 6.6401L6.08993 7.9101C7.51349 10.4136 9.58639 12.4865 12.0899 13.9101L13.3599 12.6401C13.6318 12.3712 13.9751 12.1859 14.3491 12.1062C14.723 12.0264 15.112 12.0556 15.4699 12.1901C16.3772 12.5286 17.3199 12.7635 18.2799 12.8901C18.7657 12.9586 19.2093 13.2033 19.5265 13.5776C19.8436 13.9519 20.0121 14.4297 19.9999 14.9201Z" fill="#767676" />
                        </svg>
                    </a>

                    <a href="<?php the_field('location_link-opt', 'option'); ?>" class="header__adress">
                        <span class="inherit-elem"> <?php the_field('loaction_text-opt', 'option'); ?> </span>
                        <svg width="18" height="22" viewBox="0 0 18 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M9 22C9 22 18 16 18 9C18 6.61305 17.0518 4.32387 15.364 2.63604C13.6761 0.948211 11.3869 0 9 0C6.61305 0 4.32387 0.948211 2.63604 2.63604C0.948211 4.32387 0 6.61305 0 9C0 16 9 22 9 22ZM12 9C12 10.6569 10.6569 12 9 12C7.34315 12 6 10.6569 6 9C6 7.34315 7.34315 6 9 6C10.6569 6 12 7.34315 12 9Z" fill="#767676" />
                        </svg>
                    </a>
                </div>

            </div>
        </div>

    </header>
    <main class="main">