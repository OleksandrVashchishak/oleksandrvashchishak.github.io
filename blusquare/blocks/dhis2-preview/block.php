<section class="suite-fb " style="background: url(<?php block_field('background'); ?>);">
  <div class="container">
    <h3 class="suite-fb__title"><?php block_field('title'); ?></h3>
    <p class="suite-fb__subtitle"><?php block_field('subtitle'); ?></p>
    <img src="<?php block_field('logo'); ?>" alt="logo" class="suite-fb__logo">
  </div>
</section>

<section class="suite-parts suite-parts-tooltips">
  <?php
  if (block_rows('repeater')) :
    while (block_rows('repeater')) :
      block_row('repeater');
  ?>

      <a href="<?php echo get_site_url(null, '/'); block_sub_field('subpage-link'); ?>" class="suite-parts__tooltipe-cont">
        <span class="suite-parts__tooltipe">
          <h6 class="suite-parts__tooltipe-title"><?php block_sub_field('subpage-title'); ?></h6>
          <p class="suite-parts__tooltipe-suptitle"><?php block_sub_field('subpage-description'); ?></p>
        </span>
        <img src="<?php block_sub_field('subpage-logo'); ?>" alt="parts" class="suite-parts__img">
      </a>

  <?php
    endwhile;
  endif;
  reset_block_rows('repeater');
  ?>

</section>