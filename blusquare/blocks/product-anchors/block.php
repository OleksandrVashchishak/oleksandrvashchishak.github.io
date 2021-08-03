<style>
    .iaso-anchor.anchors-link:before {
    background: <?php block_field('background'); ?>;
}

.iaso-anchor.anchors-link {
    border-top: 1px solid <?php block_field('border-color'); ?>;
    border-bottom: 1px solid <?php block_field('border-color'); ?>;
}

</style>
<section class="health-anchor anchors-link anchors-link-product iaso-anchor">
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