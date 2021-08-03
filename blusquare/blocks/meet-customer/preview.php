<section class="our-customers container">
    <h5 class="our-customers__title"><?php block_field('title'); ?> </h5>
    <div class="our-customers__wrapper">
        <?php
        if (block_rows('items')) :
            while (block_rows('items')) :
                block_row('items');
        ?>
                <img src="<?php block_sub_field('image'); ?>" class="our-customers__img">
        <?php
            endwhile;
        endif;
        reset_block_rows('items');
        ?>

    </div>
</section>