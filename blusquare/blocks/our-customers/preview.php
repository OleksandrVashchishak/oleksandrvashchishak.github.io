<section class="about-customer container" id="customer">
  <h3 class="about-customer__main-title main-title"><?php block_field('title'); ?></h3>
  <p class="about-customer__main-subtitle main-subtitle"><?php block_field('subtitle'); ?>
  </p>
  <p class="about-customer__main-text"><?php block_field('text'); ?>
  </p>
  <div class="about-customer__items">
    <?php
    if (block_rows('repeater')) :
      while (block_rows('repeater')) :
        block_row('repeater');
    ?>
        <a href="<?php block_sub_field('link-to-customer'); ?>" class="about-customer__link">
          <img src="<?php block_sub_field('logo-customer'); ?>" class="about-customer__img" alt="logo">
        </a>
    <?php
      endwhile;
    endif;
    reset_block_rows('repeater');
    ?>
   
  </div>

  <a href="#" class="get-demo-popup about-customer__tohether main-btn"><?php block_field('text-button'); ?></a>
</section>