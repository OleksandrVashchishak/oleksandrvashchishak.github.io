<div class="our-product">

    <div class="product-block container">
        <h3 class="product-block__main-title "><?php block_field('title') ?></h3>
        <p class="product-block__main-subtitle "><?php block_field('text') ?>
        </p>
        <p class="product-block__main-text">
            <?php block_field('more-text') ?>
        </p>
        <div class="product-block__items">
            <?php
            if (block_rows('items')) :
                while (block_rows('items')) :
                    block_row('items');
            ?>

                    <a href="<?php block_sub_field('item-link'); ?>" class="product-block__item">
                        <div class="product-block__item-top">
                            <img src="<?php block_sub_field('icons'); ?>" alt="" class="product-block__item-img">
                            <div class="product-block__top-text">
                                <h5 class="product-block__title"><?php block_sub_field('new-field-1'); ?></h5>
                                <p class="product-block__subtitle"><?php block_sub_field('subtitleitem'); ?></p>
                            </div>
                        </div>
                        <p class="product-block__text"><?php block_sub_field('item-text'); ?></p>
                        <span class="product-block__link-our"><?php block_sub_field('item-bottom-text'); ?></span>
                    </a>
            <?php
                endwhile;
            endif;
            reset_block_rows('items');
            ?>


        </div>

        <span class="our-product__get-demo main-btn get-demo-popup"><?php block_field('button-text') ?></span>
    </div>


</div>