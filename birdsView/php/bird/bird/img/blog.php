<?php
get_header();
/*
 Template Name: blog
 */
?>


<div class="slider-blog container">
  <h3 class="slider-blog__title"> <?php the_field('main_title_blog'); ?>
  </h3>
  <div class="slider-blog__container">
    <div class="slider-blog_left">
      <h4 class="slider-blog__upslider-title"> <?php the_field('slider_title_blog'); ?></h4>
      <div class="slider-blog__slider">

        <?php
        $args = array(
          'post_type'         => 'post',
          'publish'           => true,
          'posts_per_page'    => 100,
          'orderby'     => 'date',
          'category_name' => 'slider,slider-fi,slider-se'
        );
        $the_query = new WP_Query($args);
        if ($the_query->have_posts()) { ?>

          <?php while ($the_query->have_posts()) {
            $the_query->the_post(); ?>




            <a href="<?php the_permalink(); ?>" class="slider-blog__item">
              <div class="slider-blog__item-img-cont">
                <?php echo get_the_post_thumbnail(get_the_ID(), 'post_827x620', array('class' => 'slider-blog__item-img',)); ?>
              </div>
              <div class="slider-blog__item-texts">
                <div class="slider-blog__item-top">
                  <h4 class="slider-blog__item-title"><?php the_title(); ?></h4>
                  <div class="slider-blog__item-text"><?php the_excerpt_rss(); ?></div>
                </div>
                <div class="slider-blog__item-info">
                  <?php echo get_avatar($current_user->user_email, 30, '', '', array('class' => 'slider-blog__info-img')); ?>
                  <div class="slider-blog__info-text">
                    <h4 class="slider-blog__info-title"><?php the_author(); ?></h4>
                    <div class="slider-blog__info-date-read slider-blog__info-date-read-сolumn">
                      <p class="slider-blog__info-date">
                        <?php the_time('d.m.Y') ?></p>
                      <span class="slider-blog__elipse"><svg width="2" height="2" viewBox="0 0 2 2" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <circle cx="1" cy="1" r="1" fill="#989898" />
                        </svg>
                      </span>
                      <p class="slider-blog__info-read"><?php the_field('time_to_read'); ?></p>
                    </div>
                  </div>
                </div>
              </div>
            </a>


          <?php }
          wp_reset_postdata(); ?>
        <?php } ?>





      </div>
    </div>
    <div class="slider-blog__right">
      <h4 class="slider-blog__right-title"><?php the_field('trending_title_blog'); ?></h4>
      <div class="slider-blog__trends">


        <?php
        $args = array(
          'post_type'         => 'post',
          'publish'           => true,
          'posts_per_page'    => 3,
          'orderby'     => 'date',
          'category_name' => 'trending, trending-fi, trending-se'

        );
        $the_query = new WP_Query($args);
        if ($the_query->have_posts()) { ?>

          <?php while ($the_query->have_posts()) {
            $the_query->the_post(); ?>

            <div class="slider-blog__trends-item">
              <p class="slider-blog__trends-date"><?php the_time('d.m.Y') ?></p>
              <a href="<?php the_permalink(); ?>" class="slider-blog__trends-title"><?php the_title(); ?></a>
            </div>

          <?php }
          wp_reset_postdata(); ?>
        <?php } ?>

      </div>
    </div>
  </div>
</div>

<div class="blog container">
  <form action="<?php bloginfo('url'); ?>" method="get" class="blog__search-cotainer">
    <span class="blog__search-icon">
      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M18.031 16.617L22.314 20.899L20.899 22.314L16.617 18.031C15.0237 19.3082 13.042 20.0029 11 20C6.032 20 2 15.968 2 11C2 6.032 6.032 2 11 2C15.968 2 20 6.032 20 11C20.0029 13.042 19.3082 15.0237 18.031 16.617ZM16.025 15.875C17.2941 14.5699 18.0029 12.8204 18 11C18 7.132 14.867 4 11 4C7.132 4 4 7.132 4 11C4 14.867 7.132 18 11 18C12.8204 18.0029 14.5699 17.2941 15.875 16.025L16.025 15.875Z" fill="#313231" fill-opacity="0.6" />
      </svg>
    </span>
    <input type="text" name="s" placeholder="<?php the_field('search_placeholder_blog'); ?>" class="blog__search" value="<?php if (!empty($_GET['s'])) {
                                                                                                                            echo $_GET['s'];
                                                                                                                          } ?>" />

<?php echo  bloginfo('url'); ?>        
    <input type="submit" class="hidden hidden_search_btn" value="Найти" />
  </form>

  <div class="blog__container">

    <?php
    $args = array(
      'post_type'         => 'post',
      'publish'           => true,
      'posts_per_page'    => 6,
      'paged'          => $paged,
      'orderby'     => 'date',

    );
    $the_query = new WP_Query($args);
    if ($the_query->have_posts()) { ?>

      <?php while ($the_query->have_posts()) {
        $the_query->the_post(); ?>

        <a href="<?php the_permalink(); ?>" class="blog__item">
          <div class="blog__item-img-wrap">
            <?php echo get_the_post_thumbnail(get_the_ID(), 'post_827x620', array('class' => 'blog__item-img',)); ?>
          </div>
          <h3 class="blog__title"><?php the_title(); ?> </h3>
          <p class="blog__text">
            <?php the_excerpt_rss(); ?>
          </p>
          <div class="slider-blog__item-info blog__info">
            <?php echo get_avatar($current_user->user_email, 30, '', '', array('class' => 'slider-blog__info-img')); ?>
            <div class="slider-blog__info-text">
              <h4 class="slider-blog__info-title"><?php the_author(); ?></h4>
              <div class="slider-blog__info-date-read">
                <p class="slider-blog__info-date"> <?php the_time('d.m.Y') ?></p>
                <span class="slider-blog__elipse"><svg width="2" height="2" viewBox="0 0 2 2" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="1" cy="1" r="1" fill="#989898" />
                  </svg>
                </span>
                <p class="slider-blog__info-read"> <?php the_field('time_to_read'); ?> </p>
              </div>
            </div>
          </div>
        </a>


      <?php }
      wp_reset_postdata(); ?>
    <?php } ?>
  </div>


  <div class="blog__pagination">
    <?php $big = 999999999;
    $pages = paginate_links(array(
      'base'    => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
      'format'  => '?paged=%#%',
      'current' => max(1, get_query_var('paged')),
      'total'   => $the_query->max_num_pages,
      'prev_next'    => true,
      'type'    => 'array',
      'prev_text'    => '<',
      'next_text'    => '>',
    ));
    if (is_array($pages)) { ?>
      <div class="blog__pag-numbers">
        <?php foreach ($pages as $page) {
          echo "<span class='blog__pag-item'>$page</span>";
        }
        wp_reset_query(); ?>
      </div>

    <?php } ?>





    <div class="blog__pag-arrows">
      <div class="blog__pag-arrow-prev blog__pag-arrow">Prev</div>
      <span class="blog__pag-arrow-line"></span>
      <div class="blog__pag-arrow-next blog__pag-arrow">Next</div>
    </div>
  </div>

</div>

<div class="contact-blog container"></div>
<div class="contact-blog__main contact">
  <?php
  if (ICL_LANGUAGE_CODE == 'en') {
    echo do_shortcode('[contact-form-7 id="310" title="Contact us"]');
  } elseif (ICL_LANGUAGE_CODE == 'fi') {
    echo do_shortcode('[contact-form-7 id="768" title="Contact us fi"]');
  } elseif (ICL_LANGUAGE_CODE == 'se') {
    echo do_shortcode('[contact-form-7 id="882" title="Contact us se"]');
  }
  ?>
</div>


<?php get_footer(); ?>