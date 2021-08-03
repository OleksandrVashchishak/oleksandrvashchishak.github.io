<div class="benefits-container-bg">
<section class="benefits container" id="benefits">
    <h3 class="benefits__main-title main-title"><?php block_field('title'); ?></h3>
    <p class="benefits__main-subtitle main-subtitle"><?php block_field('subtitle'); ?></p>
    <div class="benefits__wrap-text">
        <p class="benefits__main-text"><?php block_field('left-text'); ?></p>
        <p class="benefits__main-text"><?php block_field('right-text'); ?></p>
    </div>

    <div class="benefits__items">
        <?php
        if (block_rows('repeater')) :
            while (block_rows('repeater')) :
                block_row('repeater');
        ?>
                <div class="benefits__item">
                    <img src="<?php bloginfo('template_url'); ?>/img/benefits-icon-1.svg" alt="icon" class="benefits__icon">
                    <h5 class="benefits__title"><?php block_sub_field('title-item'); ?></h5>
                    <div class="benefits__text"><?php block_sub_field('text-item'); ?></div>
                </div>
        <?php
            endwhile;
        endif;
        reset_block_rows('repeater');
        ?>

    </div>
    <button class="main-btn ask-demo__btn get-demo-popup"><?php block_field('button-text'); ?></button>
</section>
</div>