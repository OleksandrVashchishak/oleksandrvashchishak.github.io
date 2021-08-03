<?php get_header();
/*
 Template Name: Front page
 */
?>
<div class="fixed-contact">
    <a href='tel:<?php the_field('phone_number-opt', 'option'); ?>' class="fixed-contact__item">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M21.9999 16.9201V19.9201C22.0011 20.1986 21.944 20.4743 21.8324 20.7294C21.7209 20.9846 21.5572 21.2137 21.352 21.402C21.1468 21.5902 20.9045 21.7336 20.6407 21.8228C20.3769 21.912 20.0973 21.9452 19.8199 21.9201C16.7428 21.5857 13.7869 20.5342 11.1899 18.8501C8.77376 17.3148 6.72527 15.2663 5.18993 12.8501C3.49991 10.2413 2.44818 7.27109 2.11993 4.1801C2.09494 3.90356 2.12781 3.62486 2.21643 3.36172C2.30506 3.09859 2.4475 2.85679 2.6347 2.65172C2.82189 2.44665 3.04974 2.28281 3.30372 2.17062C3.55771 2.05843 3.83227 2.00036 4.10993 2.0001H7.10993C7.59524 1.99532 8.06572 2.16718 8.43369 2.48363C8.80166 2.80008 9.04201 3.23954 9.10993 3.7201C9.23656 4.68016 9.47138 5.62282 9.80993 6.5301C9.94448 6.88802 9.9736 7.27701 9.89384 7.65098C9.81408 8.02494 9.6288 8.36821 9.35993 8.6401L8.08993 9.9101C9.51349 12.4136 11.5864 14.4865 14.0899 15.9101L15.3599 14.6401C15.6318 14.3712 15.9751 14.1859 16.3491 14.1062C16.723 14.0264 17.112 14.0556 17.4699 14.1901C18.3772 14.5286 19.3199 14.7635 20.2799 14.8901C20.7657 14.9586 21.2093 15.2033 21.5265 15.5776C21.8436 15.9519 22.0121 16.4297 21.9999 16.9201Z" fill="#F3F3F3" />
        </svg>
        <span class="fixed-contact__item-text">
            <?php the_field('phone_number-opt', 'option'); ?>
        </span>
    </a>
    <a href="<?php the_field('location_link-opt', 'option'); ?>" class="fixed-contact__item">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M12 23C12 23 21 17 21 10C21 7.61305 20.0518 5.32387 18.364 3.63604C16.6761 1.94821 14.3869 1 12 1C9.61305 1 7.32387 1.94821 5.63604 3.63604C3.94821 5.32387 3 7.61305 3 10C3 17 12 23 12 23ZM15 10C15 11.6569 13.6569 13 12 13C10.3431 13 9 11.6569 9 10C9 8.34315 10.3431 7 12 7C13.6569 7 15 8.34315 15 10Z" fill="#F3F3F3" />
        </svg>
        <span class="fixed-contact__item-text">
            <?php the_field('loaction_text-opt', 'option'); ?>
        </span>
    </a>
    <a href="<?php the_field('doctorlib_link-opt', 'option'); ?>" class="fixed-contact__item">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M18 13V19C18 19.5304 17.7893 20.0391 17.4142 20.4142C17.0391 20.7893 16.5304 21 16 21H5C4.46957 21 3.96086 20.7893 3.58579 20.4142C3.21071 20.0391 3 19.5304 3 19V8C3 7.46957 3.21071 6.96086 3.58579 6.58579C3.96086 6.21071 4.46957 6 5 6H11" stroke="#F3F3F3" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M15 3H21V9" stroke="#F3F3F3" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M10 14L21 3" stroke="#F3F3F3" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
        <span class="fixed-contact__item-text">
            <?php the_field('doctorlib_text', 'option'); ?>
        </span>
    </a>
</div>


<section class="vb-video">
    <div class="vb-video__preview">
        <iframe src="<?php the_field('vimeo_link_vfp'); ?>?autoplay=1&loop=1&background=1&autopause=0" frameborder=“0” allowfullscreen allow=autoplay></iframe>
    </div>
</section>

<section class="welcome container">
    <div class="welcome__img-wrapper">
        <img src="<?php the_field('image-tb'); ?>" alt="image" class="welcome__img">
    </div>

    <div class="welcome__text-block">
        <h1 class="welcome__title main-title" data-aos="fade-left" data-aos-duration="1500"><?php the_field('title-tb'); ?></h1>
        <p class="welcome__text" data-aos="fade-left" data-aos-duration="1500"> <?php the_field('text-tb'); ?></p>
        <a href="<?php the_field('button_link-tb'); ?>" target="_blank" class="welcome__btn main-btn"><span><span><?php the_field('button_text-tb'); ?></span></span></a>

        <a href="#team" class="welcome__circle circle-default">
            <img src="<?php bloginfo('template_url'); ?>/img/circle-rotate.svg" alt="icon" class="circle-default__circle">
            <img src="<?php bloginfo('template_url'); ?>/img/circle-arrow.svg" alt="icon" class="circle-default__arrow">
        </a>
    </div>
</section>

<section class="team" id="team">
    <div class="team__wrapper container">
        <div class="team__items">
            <?php
            $teamCounter = 0;
            if (have_rows('team-reap')) :
                while (have_rows('team-reap')) : the_row();
                    $teamCounter++;
                    if (($teamCounter % 2) == 1) {
                        $teamDirection  = 'left';
                    } else {
                        $teamDirection  = 'right';
                    }
            ?>

                    <div class="team__item">
                        <div class="team__image-wrapper">
                            <img src="<?php the_sub_field('image-team'); ?>" alt="photo team" class="team__img" data-aos="fade-up" data-aos-duration="1500">
                            <h3 class="team__title"><?php the_field('title-team') ?></h3>
                        </div>
                        <div class="team__item-info" data-aos="fade-<?php echo $teamDirection ?>" data-aos-duration="1000">
                            <h5 class="team__name"> <?php the_sub_field('name'); ?> </h5>
                            <p class="team__position"><?php the_sub_field('position'); ?></p>
                            <ul class="team__ul">
                                <?php
                                if (have_rows('education')) :
                                    while (have_rows('education')) : the_row();
                                ?>

                                        <li class="team__list"><?php the_sub_field('education_item'); ?></li>

                                <?php
                                    endwhile;
                                else :
                                endif;
                                ?>
                            </ul>
                        </div>
                    </div>
            <?php
                endwhile;
            else :
            endif;
            ?>

        </div>

        <div class="team__bottom">
            <p class="team__bottom-text" data-aos="fade-right" data-aos-duration="1000"><?php the_field('assistant_text'); ?> </p>

            <div class="team__bottom-item">
                <img src="<?php the_field('asistant_image_1'); ?>" alt="image" class="team__bottom-img" data-aos="fade-up" data-aos-duration="1000">
                <div class="team__bottom-wrapper">
                    <h5 class="team__bottom-title"><?php the_field('asistant_name_1'); ?></h5>
                    <p class="team__bottom-position"><?php the_field('asistant_posotion_1'); ?></p>
                </div>
            </div>
            <div class="team__bottom-item">
                <img src="<?php the_field('asistant_image_2'); ?>" alt="image" class="team__bottom-img" data-aos="fade-up" data-aos-duration="1500">
                <div class="team__bottom-wrapper">
                    <h5 class="team__bottom-title"><?php the_field('asistant_name_1'); ?></h5>
                    <p class="team__bottom-position"><?php the_field('asistant_posotion_1'); ?></p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="tabs" id="cabinet" data-aos="fade-right" data-aos-duration="1500">
    <h3 class="tabs__title main-title"><?php the_field('title-cab'); ?></h3>

    <div class="tabs__wrapper">

        <?php
        if (have_rows('nos_specialites_items')) :
            while (have_rows('nos_specialites_items')) : the_row();
        ?>
                <img src="<?php the_sub_field('image'); ?>" alt="image" class="tabs__img">
                <p class="tabs__text"><?php the_sub_field('description'); ?></p>
        <?php
            endwhile;
        else :
        endif;
        ?>

        <div class="tabs__nav">
            <?php
            if (have_rows('nos_specialites_items')) :
                while (have_rows('nos_specialites_items')) : the_row();
            ?>
                    <p class="tabs__nav-item"><?php the_sub_field('button_text'); ?></p>
            <?php
                endwhile;
            else :
            endif;
            ?>
        </div>
    </div>


</section>

<section class="benefits container">
    <h3 class="benefits__title main-title"><?php the_field('title-val'); ?></h3>
    <div class="benefits__items">
        <?php
        if (have_rows('notre_cards')) :
            while (have_rows('notre_cards')) : the_row();
        ?>
                <div class="benefits__item" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                    <img src="<?php the_sub_field('icon'); ?>" alt="icon" class="benefits__icon">
                    <p class="benefits__icon-text"><?php the_sub_field('text'); ?></p>
                </div>
        <?php
            endwhile;
        else :
        endif;
        ?>
        <a href="#insta" class="benefits__circle circle-default">
            <img src="<?php bloginfo('template_url'); ?>/img/circle-rotate.svg" alt="icon" class="circle-default__circle">
            <img src="<?php bloginfo('template_url'); ?>/img/circle-arrow.svg" alt="icon" class="circle-default__arrow">
        </a>

    </div>

</section>

<section class="insta" id="insta">
    <h3 class="insta__title main-title">
        <img src="<?php bloginfo('template_url'); ?>/img/instagram.svg" alt="insta" class="insta__icon">
        <span class="inherit-elem" data-aos="fade-left" data-aos-duration="1000"><?php the_field('title-inst'); ?></span>
    </h3>
    <div class="insta__items">
        <?php
        if (have_rows('feed')) :
            while (have_rows('feed')) : the_row();
        ?>
                <a href='#' class="insta__item">
                    <img src="<?php the_sub_field('image-inst'); ?>" alt="insta img" class="insta__img">
                    <div class="insta__item-hover">
                        <img src="<?php bloginfo('template_url'); ?>/img/instagram.svg" alt="icon insta" class="insta__item-hover-icon">
                        <div class="insta__item-hover-text"><?php the_sub_field('text'); ?></div>
                    </div>
                </a>

        <?php
            endwhile;
        else :
        endif;
        ?>
    </div>
    <div class="insta__sharp " data-aos="fade-right" data-aos-duration="1000">
        <?php
        if (have_rows('tags')) :
            while (have_rows('tags')) : the_row();
        ?>
                <a href="#" class="insta__sharp-item"><?php the_sub_field('tag') ?></a>
        <?php
            endwhile;
        else :
        endif;
        ?>
    </div>
</section>

<section class="gallery">
    <svg class="hidden">
        <defs>
            <symbol id="icon-arrow" viewBox="0 0 32 32">
                <title>arrow</title>
                <path class="path1" d="M7.333 24c-0.133 0-0.4 0-0.533-0.133l-6.667-6.667c0 0-0.133-0.133-0.133-0.267s0-0.133 0-0.267c0 0 0 0 0 0 0-0.133 0-0.133 0-0.267s0.133-0.133 0.133-0.267l6.667-6.667c0.4-0.133 0.8-0.133 1.067 0s0.267 0.667 0 0.933l-5.6 5.6h29.067c0.4 0 0.667 0.267 0.667 0.667s-0.267 0.667-0.667 0.667h-29.067l5.467 5.467c0.267 0.267 0.267 0.667 0 0.933 0 0.267-0.267 0.267-0.4 0.267z">
                </path>
            </symbol>
            <symbol id="icon-drop" viewBox="0 0 32 32">
                <title>drop</title>
                <path class="path1" d="M17.333 32c-5.867 0-10.667-4.8-10.667-10.667 0-5.6 9.733-20.4 10.133-21.067 0.267-0.4 0.8-0.4 1.067 0 0.4 0.667 10.133 15.467 10.133 21.067 0 5.867-4.8 10.667-10.667 10.667zM17.333 1.867c-2.133 3.333-9.333 14.933-9.333 19.467 0 5.2 4.133 9.333 9.333 9.333s9.333-4.133 9.333-9.333c0-4.533-7.2-16.133-9.333-19.467z">
                </path>
                <path class="path2" d="M13.333 26.533c-0.133 0-0.267 0-0.4-0.133-1.467-1.333-2.267-3.2-2.267-5.067 0-1.6 1.2-4.533 3.467-8.933 0.133-0.4 0.533-0.533 0.933-0.267 0.267 0.133 0.4 0.533 0.267 0.933-2.133 4-3.333 6.933-3.333 8.267 0 1.467 0.667 2.933 1.733 4 0.267 0.267 0.267 0.667 0 0.933 0 0.133-0.267 0.267-0.4 0.267z">
                </path>
            </symbol>

            <symbol id="icon-cross" viewbox="0 0 129 129">
                <title>cross</title>
                <path d="M7.6,121.4c0.8,0.8,1.8,1.2,2.9,1.2s2.1-0.4,2.9-1.2l51.1-51.1l51.1,51.1c0.8,0.8,1.8,1.2,2.9,1.2c1,0,2.1-0.4,2.9-1.2c1.6-1.6,1.6-4.2,0-5.8L70.3,64.5l51.1-51.1c1.6-1.6,1.6-4.2,0-5.8s-4.2-1.6-5.8,0L64.5,58.7L13.4,7.6C11.8,6,9.2,6,7.6,7.6s-1.6,4.2,0,5.8l51.1,51.1L7.6,115.6C6,117.2,6,119.8,7.6,121.4z" />
            </symbol>
        </defs>
    </svg>
    <div class="grid-pages">
        <?php
        $galleryCount = 0;
        if (have_rows('gallery_pages')) :
            while (have_rows('gallery_pages')) : the_row();
                $galleryCount == 0 ? $galleryCurrentClass = 'grid--current' : $galleryCurrentClass = '';
        ?>
                <div class="grid grid--vertical grid--style-2 <?php echo $galleryCurrentClass;  ?>" data-fill="#F3F3F3">
                    <div class="grid__column">
                        <?php
                        if (have_rows('gallery_column_first')) :
                            while (have_rows('gallery_column_first')) : the_row();
                        ?>
                                <div class="grid__item" data-delay="100">
                                    <div class="grid__img" style="background-image: url(<?php the_sub_field('image') ?>);"></div>
                                </div>
                        <?php
                            endwhile;
                        else :
                        endif;
                        ?>
                    </div>
                    <div class="grid__column">
                        <?php
                        if (have_rows('gallery_column_two')) :
                            while (have_rows('gallery_column_two')) : the_row();
                        ?>
                                <div class="grid__item" data-delay="100">
                                    <div class="grid__img" style="background-image: url(<?php the_sub_field('image') ?>);"></div>
                                </div>
                        <?php
                            endwhile;
                        else :
                        endif;
                        ?>
                    </div>

                    <?php if (have_rows('gallery_column_three')) : ?>
                        <div class="grid__column">
                            <?php
                            while (have_rows('gallery_column_three')) : the_row();
                            ?>
                                <div class="grid__item" data-delay="100">
                                    <div class="grid__img" style="background-image: url(<?php the_sub_field('image') ?>);"></div>
                                </div>
                            <?php
                            endwhile;
                            ?>
                        </div>
                    <?php
                    else :
                    endif;
                    ?>
                </div>

        <?php
                $galleryCount++;
            endwhile;
        else :
        endif;
        ?>

        <nav class="grid-nav">
            <button class="grid__button grid__button--prev" aria-label="Previous page"><svg class="icon icon--nav-up" width="64" height="15" viewBox="0 0 64 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M64 7.5C59.8579 7.5 56.5 4.14214 56.5 0" stroke="#121212" />
                    <path d="M64 7.5C59.8579 7.5 56.5 10.8579 56.5 15" stroke="#121212" />
                    <line x1="-2.18557e-08" y1="7.5" x2="64" y2="7.5" stroke="#121212" />
                </svg>

                </svg></button>
            <button class="grid__button grid__button--next" aria-label="Next page"><svg class="icon icon--nav-down" width="64" height="15" viewBox="0 0 64 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M64 7.5C59.8579 7.5 56.5 4.14214 56.5 0" stroke="#121212" />
                    <path d="M64 7.5C59.8579 7.5 56.5 10.8579 56.5 15" stroke="#121212" />
                    <line x1="-2.18557e-08" y1="7.5" x2="64" y2="7.5" stroke="#121212" />
                </svg>

                </svg></button>
        </nav>
    </div>


    <div class="custom-box ">
        <div class="custom-box__close"><svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M30 10L10 30" stroke="#BA880B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M10 10L30 30" stroke="#BA880B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </div>
        <div class="custom-box__nav">
            <span class="custom-box__nav-arrow  custom-box__nav--prev">
                <svg width="64" height="15" viewBox="0 0 64 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M64 7.5C59.8579 7.5 56.5 4.14214 56.5 0" stroke="#121212" />
                    <path d="M64 7.5C59.8579 7.5 56.5 10.8579 56.5 15" stroke="#121212" />
                    <line x1="-2.18557e-08" y1="7.5" x2="64" y2="7.5" stroke="#121212" />
                </svg>
            </span>
            <span class="custom-box__nav-arrow custom-box__nav--next">
                <svg width="64" height="15" viewBox="0 0 64 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M64 7.5C59.8579 7.5 56.5 4.14214 56.5 0" stroke="#121212" />
                    <path d="M64 7.5C59.8579 7.5 56.5 10.8579 56.5 15" stroke="#121212" />
                    <line x1="-2.18557e-08" y1="7.5" x2="64" y2="7.5" stroke="#121212" />
                </svg>
            </span>
        </div>
        <?php
        if (have_rows('gallery_pages')) :
            while (have_rows('gallery_pages')) : the_row();
        ?>

                <?php
                if (have_rows('gallery_column_first')) :
                    while (have_rows('gallery_column_first')) : the_row();
                ?>
                        <img class="grid__img-box" src="<?php the_sub_field('image') ?>" />
                <?php
                    endwhile;
                else :
                endif;
                ?>
                <?php
                if (have_rows('gallery_column_two')) :
                    while (have_rows('gallery_column_two')) : the_row();
                ?>
                        <img class="grid__img-box" src="<?php the_sub_field('image') ?>" />
                <?php
                    endwhile;
                else :
                endif;
                ?>

                <?php if (have_rows('gallery_column_three')) : ?>
                    <?php
                    while (have_rows('gallery_column_three')) : the_row();
                    ?>
                        <img class="grid__img-box" src="<?php the_sub_field('image') ?>" />
                    <?php
                    endwhile;
                    ?>
                <?php
                else :
                endif;
                ?>
        <?php
            endwhile;
        else :
        endif;
        ?>
</section>

<section class="technolog" id="technolog">
    <div class="container">
        <h3 class="technolog__title main-title" data-aos="fade-left" data-aos-duration="1000"><?php the_field('title-tech'); ?></h3>
        <div class="technolog__items">

            <?php
            $technologCounter = 0;
            if (have_rows('technologies')) :
                while (have_rows('technologies')) : the_row();
                    $technologCounter++;
                    if (($technologCounter % 2) == 1) {
                        $technologDirection  = 'left';
                    } else {
                        $technologDirection  = 'right';
                    }
            ?>
                    <div class="technolog__item">
                        <div class="technolog__img-wrapper" data-aos="example-anim">
                            <img src="<?php the_sub_field('image') ?>" alt="image" class="technolog__img" data-aos="fade-up" data-aos-duration="1500">
                        </div>
                        <div class="technolog__info" data-aos="fade-<?php echo $technologDirection; ?>" data-aos-duration="1500">
                            <h5 class="technolog__item-title"><?php the_sub_field('title') ?></h5>
                            <p class="technolog__text"><?php the_sub_field('text') ?></p>
                        </div>
                    </div>

            <?php
                endwhile;
            else :
            endif;
            ?>
        </div>
    </div>
</section>

<section class="full-img" style="background: url(<?php bloginfo('template_url'); ?>/img/full-img.jpg) no-repeat;">
    <div class="container">
        <h3 class="full-img__title main-title" data-aos="fade-up-right" data-aos-duration="1500" data-aos-delay="100">
            L’équilibre du sourire - <br> réhabilitation globale</h3>
        <a href="#contact" class="full-img__btn  main-btn" data-aos="fade-up-right" data-aos-duration="1500" data-aos-delay="300"><span><span>Prendre RDV</span></span></a>
        <a href="#traitm" class="full-img__circle circle-default">
            <img src="<?php bloginfo('template_url'); ?>/img/circle-rotate-black.svg" alt="icon" class="circle-default__circle">
            <img src="<?php bloginfo('template_url'); ?>/img/circle-arrow.svg" alt="icon" class="circle-default__arrow">
        </a>
    </div>
</section>

<section class="twenty-slider container" id="traitm">
    <div class="twenty-slider__slider-wrapper">
        <?php
        $twentySliderCount = 1;
        $twentySliderNumb = 0;
        if (have_rows('before-after')) :
            while (have_rows('before-after')) : the_row();
                $twentySliderNumb++;
        ?>
                <?php if (get_sub_field('before_image') != '') { ?>
                    <div class="twenty-slider__img-item">
                        <div class="twentytwenty-container twenty-slider__slider">
                            <img src="<?php the_sub_field('before_image') ?>" />
                            <img src="<?php the_sub_field('after_image') ?>" />
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="twenty-slider__simple-img twenty-slider__img-item">
                        <img src="<?php the_sub_field('simple_image') ?>">
                    </div>
                <?php } ?>

                <style>
                    .twenty-slider__acc-btn:nth-child(<?php echo $twentySliderCount  ?>):before {
                        content: '0<?php echo $twentySliderNumb; ?>.';
                    }
                </style>
        <?php
                $twentySliderCount += 2;
            endwhile;
        else :
        endif;
        ?>
    </div>

    <div class="twenty-slider__tabs-wrapper">
        <div class="twenty-slider__tabs-border">
            <div class="twenty-slider__tabs">
                <h3 class="twenty-slider__title main-title"><?php the_field('title-twenty') ?> </h3>
                <div class="twenty-slider__acc">
                    <?php

                    if (have_rows('before-after')) :
                        while (have_rows('before-after')) : the_row();
                    ?>

                            <button class="accordion twenty-slider__acc-btn"><?php the_sub_field('accordion_title') ?></button>

                            <?php if (get_sub_field('accodrion_text') != '') { ?>
                                <div class="twenty-slider__panel twenty-slider__acc-text">
                                    <p><?php the_sub_field('accodrion_text') ?></p>
                                </div>
                            <?php } else { ?>
                                <ul class="twenty-slider__panel twenty-slider__acc-ul">
                                    <?php
                                    if (have_rows('accordion_list')) :
                                        while (have_rows('accordion_list')) : the_row();
                                    ?>

                                            <li><?php the_sub_field('item') ?></li>
                                    <?php
                                        endwhile;
                                    else :
                                    endif;
                                    ?>
                                </ul>
                            <?php } ?>
                    <?php
                        endwhile;
                    else :
                    endif;
                    ?>


                </div>
            </div>
            <?php
            if (have_rows('before-after')) :
                while (have_rows('before-after')) : the_row();
            ?>

                    <a href="<?php the_sub_field('button_link') ?>" class="twenty-slider__btn  main-btn"><span><span><?php the_sub_field('button_text') ?></span></span></a>
            <?php
                endwhile;
            else :
            endif;
            ?>


        </div>
    </div>
</section>

<section class="zone-card">
    <h3 class="zone-card__title main-title"><?php the_field('title-zone') ?></h3>
    <div class="container zone-card__items">
        <?php
        if (have_rows('items-zone')) :
            while (have_rows('items-zone')) : the_row();
        ?>
                <div class="zone-card__item-wrapper">
                    <div class="zone-card__item">
                        <img src="<?php the_sub_field('icon') ?>" alt="icon" class="zone-card__icon">
                        <p class="zone-card__text"><?php the_sub_field('text') ?></p>
                        <?php if (get_sub_field('phone_number') != '') { ?>
                            <a href="tel:<?php the_sub_field('phone_number') ?>" class="zone-card__tell"><?php the_sub_field('phone_number') ?></a>
                        <?php } elseif (get_sub_field('button_link') != '') { ?>
                            <a href="<?php the_sub_field('button_link') ?>" class="zone-card__btn  main-btn"><span><span><?php the_sub_field('button_text') ?></span></span></a>
                        <?php } else { ?>
                            <a href="<?php the_sub_field('button_download') ?>" class="zone-card__btn  main-btn" download><span><span><?php the_sub_field('button_text') ?></span></span></a>
                        <?php } ?>
                    </div>
                </div>

        <?php
            endwhile;
        else :
        endif;
        ?>

    </div>
</section>

<section class="full-img-lab" style="background: url(<?php the_field('image-lab') ?>) no-repeat;">
    <div class="container " data-aos="fade-left" data-aos-duration="1000">
        <h3 class="full-img-lab__title main-title">
            <?php the_field('title-lab') ?>
        </h3>
        <p class="full-img-lab__text"><?php the_field('sub-titlel-ab') ?></p>
        <a href="#advice" class="full-img-lab__circle circle-default">
            <img src="<?php bloginfo('template_url'); ?>/img/circle-rotate.svg" alt="icon" class="circle-default__circle">
            <img src="<?php bloginfo('template_url'); ?>/img/circle-arrow.svg" alt="icon" class="circle-default__arrow">
        </a>
    </div>
</section>

<section class="tab-slider container" id="advice">
    <div class="tab-slider__svg-arrow">
        <svg width="64" height="15" viewBox="0 0 64 15" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M3.27835e-07 7.5C4.14214 7.5 7.5 10.8579 7.5 15" stroke="#767676" />
            <path d="M-3.27835e-07 7.5C4.14214 7.5 7.5 4.14214 7.5 0" stroke="#767676" />
            <line x1="64" y1="7.5" y2="7.5" stroke="#767676" />
        </svg>
    </div>

    <div class="tab-slider__titles">
        <h3 class="tab-slider__title main-title active"><?php the_field('left_title-tabs') ?></h3>
        <h3 class="tab-slider__title main-title"><?php the_field('right_title-tabs') ?></h3>
    </div>

    <div class="tab-slider__wrapper">
        <div class="tab-slider__border">

            <div class="tab-slider__slider tab-slider__slider-1 active">
                <?php
                if (have_rows('conseils_slider')) :
                    while (have_rows('conseils_slider')) : the_row();
                ?>
                        <a href="<?php the_sub_field('button_download_file') ?>" class="tab-slider__item" download>
                            <img src="<?php the_sub_field('image') ?>" alt="" class="tab-slider__img">
                            <p class="tab-slider__item-title"><?php the_sub_field('title') ?></p>
                            <span class="tab-slider__btn  main-btn"><span><span><?php the_sub_field('button_text') ?></span></span></span>
                        </a>

                <?php
                    endwhile;
                else :
                endif;
                ?>
            </div>
            <div class="tab-slider__slider tab-slider__slider-2 tab-slider__video">
                <?php
                if (have_rows('video_slider')) :
                    while (have_rows('video_slider')) : the_row();
                ?>
                        <div video-link='<?php the_sub_field('video_link') ?>' class="tab-slider__item">
                            <img src="<?php the_sub_field('image') ?>" alt="" class="tab-slider__img">
                            <p class="tab-slider__item-title"><?php the_sub_field('title') ?></p>
                            <span class="tab-slider__btn  main-btn"><span><span><?php the_sub_field('button_text') ?></span></span></span>
                        </div>

                <?php
                    endwhile;
                else :
                endif;
                ?>
            </div>

            <div class="tab-slider__slider-count active"><span class="tab-slider__slider-current-slide tab-slider__slider-current-slide-1">1</span><span class="tab-slider__slider-separator">/</span><span class="tab-slider__slider-all-slide-1 tab-slider__slider-all-slide"></span></div>
            <div class="tab-slider__slider-count"><span class="tab-slider__slider-current-slide tab-slider__slider-current-slide-2">1</span><span class="tab-slider__slider-separator">/</span><span class="tab-slider__slider-all-slide-2 tab-slider__slider-all-slide"></span></div>

        </div>
    </div>

</section>




<section class="map container" id="map">
    <div class="map__info">
        <h3 class="map__title main-title"><?php the_field('title-map') ?></h3>
        <ul class="map__list">
            <a href="<?php the_field('adress-map') ?>" class="map__item map__item-link">
                <span class="map__item-img-wrap">
                    <img src="<?php bloginfo('template_url'); ?>/img/contact-icon/map-tag.svg" alt="map tag" class="map__item-img">
                </span>
                <span class="map__item-text"><?php the_field('adress-map') ?></span>
            </a>
            <a href="tel:<?php the_field('phone-map') ?>" class="map__item map__item-link">
                <span class="map__item-img-wrap">
                    <img src="<?php bloginfo('template_url'); ?>/img/contact-icon/phone-icon.svg" alt="phone" class="map__item-img">
                </span>
                <span class="map__item-text"><?php the_field('phone-map') ?></span>
            </a>
            <?php
            if (have_rows('access')) :
                while (have_rows('access')) : the_row();
            ?>

                    <li class="map__item">
                        <span class="map__item-img-wrap">
                            <img src="<?php the_sub_field('icon') ?>" alt="auto" class="map__item-img">
                        </span>
                        <span class="map__item-text"><?php the_sub_field('text') ?> </span>
                    </li>

                    <?php
                    if (have_rows('sub_access')) :
                        while (have_rows('sub_access')) : the_row();
                    ?>
                            <li class="map__sub-item">
                                <img src="<?php the_sub_field('icon-sub') ?>" alt="subway" class="map__item-img">
                                <span class="map__item-text"><?php the_sub_field('text-sub') ?></span>
                            </li>
                    <?php
                        endwhile;
                    else :
                    endif;
                    ?>

            <?php
                endwhile;
            else :
            endif;
            ?>
        </ul>
        <a href="<?php the_field('button_link-map') ?>" class="map__btn  main-btn"><span><span><?php the_field('button_text-map') ?></span></span></a>
    </div>
    <div class="map__map">
        <div class="map__map-img-wrap">
            <img src="<?php bloginfo('template_url'); ?>/img/map-img.jpg" alt="city" class="map__img">
        </div>
        <div class="map__map-img-plan">
            <img src="<?php bloginfo('template_url'); ?>/img/map-img-map.jpg" alt="city" class="map__img">
        </div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2889.4395888124495!2d1.4435646154959472!3d43.59738802984346!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12aebc82fe661f1f%3A0x25cde05a48605bbf!2zMiBSdWUgVGjDqW9kb3JlIE96ZW5uZSwgMzEwMDAgVG91bG91c2UsINCk0YDQsNC90YbRltGP!5e0!3m2!1suk!2sua!4v1627031649859!5m2!1suk!2sua" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
</section>

<section class="contact container" id="contact">
    <div class="contact__wrapper">
        <div class="contact__times">
            <div class="contact__times-border">
                <h5 class="contact__title"><?php the_field('times_title') ?></h5>
                <ul class="contact__times-list">
                    <?php
                    if (have_rows('times')) :
                        while (have_rows('times')) : the_row();
                    ?>
                            <li class="contact__times-item">
                                <span class="contact__item-left"><?php the_sub_field('day') ?></span>
                                <span class="contact__item-right"><?php the_sub_field('time') ?></span>
                            </li>
                    <?php
                        endwhile;
                    else :
                    endif;
                    ?>
                </ul>
            </div>
        </div>

        <div class="contact__form-wrapper">
            <h3 class="contact__form-title main-title"><?php the_field('title-contact') ?></h3>
            <p class="contact__form-text"><?php the_field('text-contact') ?> </p>
            <div class="contact__form">
                <?php echo do_shortcode('[contact-form-7 id="274" title="Contact form"]'); ?>
            </div>
        </div>
    </div>
</section>

<div class="video-popup">
    <div class="video-popup__close"><svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M30 10L10 30" stroke="#BA880B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M10 10L30 30" stroke="#BA880B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
    </div>
    <div class="video-popup__wrapper">
        <iframe src="" frameborder=“0” allowfullscreen allow=autoplay></iframe>
    </div>
</div>

<?php get_footer(); ?>