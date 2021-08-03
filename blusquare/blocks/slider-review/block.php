<section class="review-slider container">
    <h3 class="review-slider__title"><?php block_field('title'); ?></h3>
    <div class="review-slider__slider">

        <?php
        if (block_rows('reviews')) :
            while (block_rows('reviews')) :
                block_row('reviews');
        ?>
                <div class="review-slider__item">
                    <p class="review-slider__text"><span class="review-slider__text-start">“</span> <?php block_sub_field('text-review'); ?> </p>
                    <div class="review-slider__author">
                        <img src="<?php block_sub_field('photo'); ?>" alt="avatar" class="review-slider__ava">
                        <div class="review-slider__author-data">
                            <h5 class="review-slider__name"><?php block_sub_field('name'); ?></h5>
                            <p class="review-slider__position"><?php block_sub_field('position'); ?></p>
                        </div>
                    </div>
                </div>

        <?php
            endwhile;
        endif;
        reset_block_rows('reviews');
        ?>


    </div>
    <a href="about-us/#contact" class="main-btn review-slider__link"><?php block_field('button-text'); ?></a>
</section>