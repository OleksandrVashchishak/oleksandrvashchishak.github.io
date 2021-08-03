<section class="overview container" id="overview">
    <div class="overview__left two-column">
        <div class="two-column__top-img">

        </div>
        <h3 class="two-column__title"><?php block_field('content-title'); ?></h3>
        <div class="two-column__columns">
            <p class="two-column__column-text">
                <?php block_field('left-column'); ?>
            </p>
            <p class="two-column__column-text">
                <?php block_field('right-column'); ?>
            </p>
        </div>
        <button class="main-btn overview__ask-demo"> <?php block_field('button-text'); ?></button>
    </div>
    <div class="overview__right img-right-overview">

        <img src="<?php block_field('image'); ?>" alt="image" class="img-right-overview-img">

    </div>
</section>