<?php
get_header();
/*
 Template Name: contact
 */
?>

<div class="contact-page__start-change ">
  <div class="contact-page__start-change-wrap">
    <img src="<?php the_field('contact-page__start-change'); ?>" alt="img">
  </div>
  <div class="contact-page__start-change-df">
    <h3 class="contact-page__main-title"><?php the_field('title_contact'); ?></h3>
    <a href="<?php the_field('button_link_contact'); ?>" class="contact-page__main-button standart-button-link"><?php the_field('text_button_contact'); ?></a>
  </div>
</div>



<div class="contact-page-two container change-bg-st change-bg-st-line">
  <p class="contact-page-two__left"><?php the_field('left_text_contact_fb'); ?>
  <div class="contact-page-two__right">
    <p class="contact-page-two__text">
      <?php the_field('center_text_contact_fb'); ?>
   </p>
    <p class="contact-page-two__text">
      <?php the_field('right_text_contact_fb'); ?>
    </p>
  </div>
</div>

<div class="contact-page container change-bg-st ">
  <h3 class="contact-page__contact-main-title"><?php the_field('title_contact_tb'); ?> </h3>
  <div class="contact-page__df">
    <p class="contact-page__df-title"><?php the_field('left_text_contact_tb'); ?></p>
    <div class="contact-page__texts">
      <p class="contact-page__text"><?php the_field('center_text_contact_tb'); ?> </p>
      <p class="contact-page__text"><?php the_field('right_text_contact_tb'); ?></p>
    </div>
  </div>
</div>

<div class="contact-form__container">
  <div class="contact-blog__main contact-blog__main-contact-page contact">

  <?php
        if (ICL_LANGUAGE_CODE == 'en') {
          echo do_shortcode('[contact-form-7 id="311" title="Lets Get To Work!"]');
        } elseif (ICL_LANGUAGE_CODE == 'fi') {
          echo do_shortcode('[contact-form-7 id="769" title="Lets Get To Work! fi"]');
        } elseif (ICL_LANGUAGE_CODE == 'se') {
          echo do_shortcode('[contact-form-7 id="883" title="Lets Get To Work! se"]');
        }
        ?>
  </div>
</div>

<?php
get_footer();
?>
