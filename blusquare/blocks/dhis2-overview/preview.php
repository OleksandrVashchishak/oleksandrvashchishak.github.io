<section class="overview container">
    <div class="overview__left two-column">
        <h3 class="two-column__title"><?php block_field('title'); ?> </h3>

        <div class="two-column__columns">
            <p class="two-column__column-text">
                <?php block_field('left-column'); ?>
            </p>
            <p class="two-column__column-text">
                <?php block_field('right-column'); ?>
            </p>
        </div>
        <button class="main-btn overview__ask-demo get-demo-popup"><?php block_field('button-text'); ?></button>
    </div>
    <div class="overview__right acc-product">
        <div class="acc-product__wrapper">
            <h5 class="acc-product__title "><?php block_field('accordion-title'); ?></h5>
            <?php
            if (block_rows('repeater')) :
                while (block_rows('repeater')) :
                    block_row('repeater');
            ?>
                    <button class="acc-product__btn">
                        <img src="<?php block_sub_field('item-icon'); ?>" alt="icon" class="acc-product__icon"><?php block_sub_field('item-title'); ?>
                    </button>
                    <div class="acc-product__panel">
                        <p class="acc-product__text"> <?php block_sub_field('item-text'); ?></p>
                        <a href="<?php block_sub_field('item-link'); ?>" class="acc-product__link"><?php block_sub_field('item-link-text'); ?></a>
                    </div>
            <?php
                endwhile;
            endif;
            reset_block_rows('repeater');
            ?>

        </div>
    </div>
</section>