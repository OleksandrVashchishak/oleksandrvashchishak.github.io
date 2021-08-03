<section class="overview container" id="overview">
  <div class="overview__left two-column">
    <p class="two-column__top-text">
      <?php block_field('top-text'); ?>
    </p>
    <h3 class="two-column__title"> <?php block_field('content-title'); ?> </h3>

    <div class="two-column__columns">
      <p class="two-column__column-text">
        <?php block_field('left-column'); ?>
      </p>
      <p class="two-column__column-text">
        <?php block_field('right-column'); ?>
      </p>
    </div>

  </div>
  <div class="overview__right key-service">
    <div class="key-service__wrapper">
      <h5 class="key-service__title"> <?php block_field('list-title'); ?> </h5>
      <ul class="key-service__ul">
        <?php
        if (block_rows('list-repeater')) :
          while (block_rows('list-repeater')) :
            block_row('list-repeater');
        ?>
            <li class="key-service__list"><?php block_sub_field('list-item'); ?></li> 

        <?php
          endwhile;
        endif;
        reset_block_rows('list-repeater');
        ?>

      </ul>
    </div>
  </div>
</section>