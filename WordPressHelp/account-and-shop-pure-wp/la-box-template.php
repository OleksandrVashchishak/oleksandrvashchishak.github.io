<?php

/**
 * Template Name: Box page
 **/
get_header() ?>
<div class="box-page__top">
    <img src="<?php bloginfo('template_url'); ?>/img/box-side-bg.png" class='box-page__top-side-bg' alt="play">
    <div class="box-page__top-container my-container">
        <div class="box-page__top-logo">
            <svg width="245" height="80" viewBox="0 0 245 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M122.56 20V38.96C122.56 44.24 126.04 48 131.44 48H135.64V44.48H132C128.08 44.48 126.32 42.36 126.32 38.04V20H122.56ZM140.867 48V30C140.867 25.6 143.227 23.04 146.667 23.04C150.107 23.04 152.467 25.6 152.467 30V31.76H142.387V35.28H152.467V48H156.227V30.24C156.227 23.6 152.107 19.52 146.667 19.52C141.227 19.52 137.107 23.6 137.107 30.24V48H140.867ZM175.026 48V28.48C175.026 25.2 176.986 23.04 180.466 23.04C183.146 23.04 185.466 24.56 185.466 27.52C185.466 29.8 183.786 31.76 180.386 31.76H176.466V35.28H181.146C184.706 35.28 186.746 36.84 186.746 39.88C186.746 42.8 185.146 44.48 181.146 44.48H176.466V48H182.106C186.946 48 190.506 44.92 190.506 40.08C190.506 36.72 189.266 34.64 186.426 33C188.346 31.8 189.226 29.84 189.226 27.36C189.226 22.44 185.506 19.52 180.146 19.52C174.986 19.52 171.266 23.64 171.266 28.16V48H175.026ZM192.053 34C192.053 42.08 198.773 48.48 206.693 48.48C214.613 48.48 221.333 42.08 221.333 34C221.333 25.92 214.613 19.52 206.693 19.52C198.773 19.52 192.053 25.92 192.053 34ZM195.973 34C195.973 28.04 200.493 23.04 206.693 23.04C212.893 23.04 217.413 28.04 217.413 34C217.413 39.96 212.893 44.96 206.693 44.96C200.493 44.96 195.973 39.96 195.973 34ZM244.346 20C239.466 20.16 234.546 22.96 233.426 28H233.346C232.226 22.96 227.306 20.16 222.426 20V23.52C227.906 23.44 231.346 28.56 231.346 34C231.346 39.44 227.906 44.56 222.426 44.48V48C227.306 47.84 232.226 45.04 233.346 40H233.426C234.546 45.04 239.466 47.84 244.346 48V44.48C238.866 44.56 235.426 39.44 235.426 34C235.426 28.56 238.866 23.44 244.346 23.52V20Z" fill="#E82F2F" />
                <rect width="80" height="80" fill="#E82F2F" />
                <path d="M80 23.5148C55.4343 52.7055 16.431 59.4626 0 59.1923V0H80V23.5148Z" fill="#E95E40" />
            </svg>
        </div>
        <p class="box-page__top-text"><?php the_field('title_top') ?></p>
        <button class="box-page__top-btn"><?php the_field('button_text_top') ?></button>
        <img class='box-page__top-img' src="<?php the_field('box_image_top') ?>" alt="img">
    </div>
</div>

<div class="box-page__main my-container">
    <div class="box-page__main-top">
        <h3 class="box-page__line-title"><?php the_field('title_first') ?></h3>
        <span class="box-page__line"></span>
    </div>

    <div class="box-page__first-df">
        <div class="box-page__first-content box-page__content">
            <?php the_field('content_first') ?>
        </div>
        <div class="box-page__first-img">
            <img src="<?php the_field('image_first') ?>" alt="img">
        </div>
    </div>

    <div class="box-page__second-df">
        <div class="box-page__second-img">
            <img src="<?php the_field('image_second') ?>" alt="img">
        </div>

        <div class="box-page__second-content box-page__content">
        <?php the_field('content_second') ?>
        </div>
    </div>


    <a href="<?php the_field('link_to_checkout') ?>" class="box-page__btn"><?php the_field('button_text_top') ?></a>

</div>


<?php get_footer() ?>