<section class="block-services container">
    <h3 class="block-services__main-title main-title"> <?php block_field('title') ?></h3>
    <p class="block-services__sub-title main-subtitle"> <?php block_field('pretitle') ?></p>
    <div class="block-services__items">

        <?php
        // Example Repeater Field
        $servicesItemsCount = 0;
        if (block_rows('services-items')) :
            while (block_rows('services-items')) :
                block_row('services-items');
                $servicesItemsCount++;
        ?>
                <div class="block-services__item">
                    <style>
                        .block-services__item:nth-child(<?php echo $servicesItemsCount ?>) .block-services__title:before {
                            background: url(<?php block_sub_field('icon'); ?>);
                        }
                    </style>
                    <div class="block-services__top">
                        <h5 class="block-services__title">   <?php block_sub_field('title-item'); ?></h5>
                        <p class="block-services__text "><?php block_sub_field('text'); ?></p>
                    </div>
                    <a href="<?php block_sub_field('link'); ?>" class="block-services__link"><?php block_sub_field('link-text'); ?></a>
                </div>

        <?php
            endwhile;
        endif;
        reset_block_rows('services-items');
        ?> 
    </div>
</section>