<?php get_header();
/*
 Template Name: projects
 */
?>

<main class="main">
  <section class="expertise cladding">
    <div class="container">
      <p class="pagesubtitle"><?php the_field('pre_title_projects'); ?></p>
      <h1><?php the_field('title_projects'); ?>
      </h1>
      <div class="row page-descr">
        <div class="col-md-6">
          <p>
            <?php the_field('left_text_projects'); ?>
          </p>
        </div>
        <div class="col-md-6">
          <p>
            <?php the_field('right_text_projects'); ?>
          </p>
        </div>
      </div>
    </div>

    <div class="cladding-content">
      <div class="container">
        <div class="row">
          <?php
          $projects_counter = 0;
          if (have_rows('projects_projects')) :
            while (have_rows('projects_projects')) : the_row();
            $projects_counter++ ;
          ?>

              <div class="col-md-6">
                <a href="<?php the_sub_field('first_img_for_gallery'); ?>" data-fancybox="<?php echo $projects_counter; ?>" class="gallsect">
                  <div class="productbox">
                    <div class="countgallnum">0<?php echo $projects_counter; ?></div>
                    <div class="productbox__pic">
                      <img src="<?php the_sub_field('image'); ?>" alt="img">
                    </div>
                    <div class="productbox__titbox">
                      <?php the_sub_field('project_name'); ?>
                    </div>
                  </div>
                  <figcaption>
                    <p class="titgal">
                      <?php the_sub_field('title_for_first_image'); ?>
                    </p>
                    <p class="descrgall"><?php the_sub_field('description_for_first_img'); ?>
                    </p>
                  </figcaption>
                </a>
                <div style="display: none;">
                  <?php
                  if (have_rows('gallery')) :
                    while (have_rows('gallery')) : the_row();
                  ?>
                      <a href="<?php the_sub_field('image-gal'); ?>" data-fancybox="<?php echo $projects_counter; ?>" class="gallsect">
                        <figcaption>
                          <p class="titgal">
                            <?php the_sub_field('title-gal'); ?>
                          </p>
                          <p class="descrgall"> <?php the_sub_field('description-gal'); ?>
                          </p>
                        </figcaption>
                      </a>
                  <?php
                    endwhile;
                  else :
                  endif;
                  ?>
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


  <section class="contactus pt100">
    <div class="container">
      <?php echo do_shortcode('[contact-form-7 id="176" title="Common form"]'); ?>

    </div>
  </section>

</main>

<?php get_footer(); ?>