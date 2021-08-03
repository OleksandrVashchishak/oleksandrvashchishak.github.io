<section class="features container" id="key">
    <h3 class="features__title main-title"><?php block_field('title'); ?></h3>
    <p class="features__pretitle main-subtitle"><?php block_field('subtitle'); ?></p>
    <p class="features__text"><?php block_field('text'); ?> </p>
    <div class="experience ">
        <div class="experience__img-wrapper">
            <img src="<?php block_field('image'); ?>" alt="image" class="experience__img">
        </div>

        <div class="experience__content">
            <?php block_field('content'); ?>
        </div>


    </div>
</section>