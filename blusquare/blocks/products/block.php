<section class="product-block container">
    <h3 class="product-block__main-title main-title"><?php block_field('title') ?></h3>
    <p class="product-block__main-subtitle main-subtitle"><?php block_field('text') ?>
    </p>

    <a href="<?php block_field('link') ?>" class="product-block__link main-subtitle"> <?php block_field('link-text') ?> </a>
    <div class="product-block__items">

        <?php
        if (block_rows('items')) :
            while (block_rows('items')) :
                block_row('items');
        ?>
                <a href="<?php echo get_site_url(null, '/'); block_sub_field('item-link'); ?>" class="product-block__item">
                    <div class="product-block__item-top">
                        <img src="<?php block_sub_field('icons'); ?>" alt="" class="product-block__item-img">
                        <div class="product-block__top-text">
                            <h5 class="product-block__title"><?php block_sub_field('new-field-1'); ?></h5>
                            <p class="product-block__subtitle"><?php block_sub_field('subtitleitem'); ?></p>
                        </div>
                    </div>
                    <p class="product-block__text"><?php block_sub_field('item-text'); ?></p>
                    <span class="product-block__icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2.00098C6.486 2.00098 2 6.48698 2 12.001C2 17.515 6.486 22.001 12 22.001C17.514 22.001 22 17.515 22 12.001C22 6.48698 17.514 2.00098 12 2.00098ZM12 20.001C7.589 20.001 4 16.412 4 12.001C4 7.58998 7.589 4.00098 12 4.00098C16.411 4.00098 20 7.58998 20 12.001C20 16.412 16.411 20.001 12 20.001Z" fill="#FF7474" />
                            <path d="M13 7.00098H11V11.001H7V13.001H11V17.001H13V13.001H17V11.001H13V7.00098Z" fill="#FF7474" />
                        </svg>
                    </span>
                </a>
        <?php
            endwhile;
        endif;
        reset_block_rows('items');
        ?>
    </div>
</section>