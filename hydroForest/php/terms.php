<?php
get_header();
/*
 Template Name: Terms
 */
?>


<div class="terms container terms-first">
  <div class="nav-title">
    <span class="nav-title__line"></span>
    <p class="nav-title__text nav-title__text-up"><?php the_field('pre_title-terms'); ?></p>
  </div>

  <h3 class="terms__title  st-title"><?php the_field('title-terms'); ?></h3>
  <div class="terms__text-df ">
    <span class="st-letter"></span>
    <p class="terms__text fl-text"><?php the_field('first_block_text-terms'); ?>
    </p>
  </div>
</div>


<div class="gray--bg gray--bg-terms">
  <div class="terms container ">

    <div class="terms__text-df ">
      <span class="st-letter"></span>
      <p class="terms__text fl-text"><?php the_field('two_block_text-terms'); ?>
      </p>
    </div>
  </div>
</div>

<a href="<?php echo get_home_url(); ?>" class="terms-back container"> <?php the_field('back-terms'); ?> </a>

<?php get_footer(); ?>