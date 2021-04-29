<?php get_header();
/*
 Template Name: expertise
 */
?>
<main class="main">
  <section class="expertise">
    <div class="container">
      <p class="pagesubtitle"><?php the_field('pre_title_expertise'); ?></p>
      <h1><?php the_field('title_expertise'); ?></h1>
    </div>
    <div class="container-fluid">
      <div class="ourwork">
        <div class="row">
          <?php
          if (have_rows('works_expertise')) :
            while (have_rows('works_expertise')) : the_row();
          ?>


              <div class="col-md-4">
                <div class="ourworkbox">
                  <div class="picbox">
                    <img src="  <?php the_sub_field('image'); ?>" alt="our work image">
                  </div>
                  <a href="  <?php the_sub_field('link'); ?>" class="expertisebtn">
                    <img src="  <?php the_sub_field('icon'); ?>" alt="icon">
                    <?php the_sub_field('name_project'); ?>
                    <span> <?php the_sub_field('text_link'); ?></span>
                  </a>
                </div>
              </div>

          <?php
            endwhile;
          else :
          endif;
          ?>

        </div>
      </div>
    </div>
  </section>

  <section class="contactus contactus_expertise">
    <div class="container">
     <?php echo do_shortcode('[contact-form-7 id="176" title="Common form"]'); ?>
    </div>
  </section>

</main>

<?php get_footer(); ?>