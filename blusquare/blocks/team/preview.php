<section class="team container" id="team">
  <h3 class="team__main-title main-title "><?php block_field('title'); ?></h3>
  <p class="team__pretitle main-subtitle "><?php block_field('subtitle'); ?></p>
  <p class="team__main-text"><?php block_field('text'); ?></p>
  <div class="team__items">

    <?php
    if (block_rows('repeater')) :
      while (block_rows('repeater')) :
        block_row('repeater');
    ?>
        <div class="team__item">
          <div class="team__photo-wrapper">
            <img src="<?php block_sub_field('photo'); ?>" alt="photo" class="team__photo">
          </div>
          <div class="team__content">
            <p class="team__name"><?php block_sub_field('name'); ?></p>
            <p class="team_position"><?php block_sub_field('position'); ?></p>
            <div class="team__contacts">
              <a href="<?php block_sub_field('linkedin-link'); ?>" class="team__contact-link">
                <img src="<?php bloginfo( 'template_url'); ?>/img/linkedin.svg" alt="linkedin" class="team__contact-link-img">
              </a>
            </div>  
          </div>
        </div>
    <?php
      endwhile;
    endif;
    reset_block_rows('repeater');
    ?>

  </div>
  <span href="#" class="team__btn main-btn get-demo-popup "><?php block_field('button-text'); ?></span>
</section>