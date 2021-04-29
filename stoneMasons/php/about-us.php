<?php get_header();
/*
 Template Name: about-us
 */
?>

<main class="about-bg-bg">
  <section class="about-main my-container about-us">
    <p class="about-main__pre-title standart-pre-title "><?php the_field('pre_title_about-page'); ?></p>
    <h3 class="about-main__title standart-title"><?php the_field('title_about-page'); ?></h3>
    <div class="about-main__df">
      <p class="about-main__text">
        <?php the_field('left_text_about-page'); ?>
      </p>
      <p class="about-main__text">
        <?php the_field('right_text_about-page'); ?>
      </p>
    </div>
  </section>

  <section class="two-slider about-us">

    <section class="customslider">
      <div class="slider-centermode">

        <?php
        if (have_rows('slider_about-us')) :
          while (have_rows('slider_about-us')) : the_row();
        ?>

            <div>
              <div class="slider-centermode__slide">
                <div class="slcont">
                  <div class="picbox">
                    <img src="<?php the_sub_field('text_image'); ?>" alt="img">
                  </div>
                  <span class="expertisebtn">
                    <?php the_sub_field('text'); ?>
                  </span>
                </div>
              </div>
            </div>


        <?php
          endwhile;
        else :
        endif;
        ?>

      </div>
      <div class="pagingInfo">
        <span class="cp1"></span>
        <span class="cp2"></span>
      </div>
    </section>
  </section>
  
  <section class="contactus contactus_expertise">
    <div class="container">
     <?php echo do_shortcode('[contact-form-7 id="176" title="Common form"]'); ?>
    </div>
  </section>
</main>

<?php get_footer(); ?>