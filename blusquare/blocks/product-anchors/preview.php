<section class="health-anchor anchors-link anchors-link-product">
  <div class="container">
    <?php
    if (block_rows('repeter')) :
      while (block_rows('repeter')) :
        block_row('repeter');
    ?>

        <a href="<?php block_sub_field('anchor-link'); ?>" class="health-anchor__link"><?php block_sub_field('athor-text'); ?></a>

    <?php
      endwhile;
    endif;
    reset_block_rows('repeter');
    ?>
  </div>
</section>