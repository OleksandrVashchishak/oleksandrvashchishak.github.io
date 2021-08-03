<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title><?php bloginfo('description'); ?></title>
    <?php wp_head(); ?>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,400;0,500;0,600;0,700;1,300;1,400&family=Rajdhani:wght@500;600&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">

</head>

<body>
    <header class="header">
        <div class="header__logo light-logo">
            <?php
            the_custom_logo()
            ?>
        </div>
        <div class="header__logo dark-logo">
            <a href="<?php echo get_home_url(); ?>" class="header-logo">
                <?php
                $header_logo = get_theme_mod('header_logo');
                $img = wp_get_attachment_image_src($header_logo, 'full');
                if ($img) :
                ?>
                    <img src="<?php echo $img[0]; ?>" alt="logo">
                <?php endif; ?>
            </a>

        </div>

        <div class="header__burger ">
            <span class="header__burger-line"></span>
        </div>

        <nav class="header__menu">
            <?php wp_nav_menu([
                'theme_location'  => 'header_menu',
                'container' => false
            ]); ?>
        </nav>
    </header>
    <main class="main">