<?php
get_header();
?>




<div class="container">
  <nav class="breadcrumbs  breadcrumbs__single">
    <a href="<?php echo get_home_url(); ?>" class="breadcrumbs__home">
      <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
        <g clip-path="url(#clip0)">
          <path d="M16.4816 8.27283V17.5905H12.9635V13.5607C12.9635 13.2074 12.6771 12.921 12.3239 12.921H7.82492C7.4716 12.921 7.18527 13.2074 7.18527 13.5607V17.5905H3.68848V8.27283H2.40918V18.2302C2.40918 18.5835 2.69555 18.8698 3.04883 18.8698H7.82496C8.17828 18.8698 8.46461 18.5835 8.46461 18.2302V14.2004H11.6842V18.2302C11.6842 18.5835 11.9706 18.8699 12.3239 18.8699H17.1213C17.4746 18.8699 17.761 18.5835 17.761 18.2302V8.27283H16.4816Z" fill="#222222" />
          <path d="M19.7975 9.9808L10.5224 1.30279C10.2782 1.074 9.89871 1.07252 9.65246 1.29873L0.206833 9.97677C-0.0532847 10.2158 -0.070355 10.6203 0.168668 10.8804C0.294684 11.0179 0.46695 11.0874 0.639879 11.0874C0.79445 11.0874 0.949684 11.0316 1.0725 10.9188L10.0814 2.64201L18.9234 10.9149C19.1819 11.1565 19.5861 11.1427 19.8275 10.8849C20.0687 10.6269 20.0554 10.2222 19.7975 9.9808Z" fill="#222222" />
        </g>
        <defs>
          <clipPath id="clip0">
            <rect width="20" height="20" fill="white" />
          </clipPath>
        </defs>
      </svg>
    </a>
    <span class="breadcrumbs__separator">
      <svg width="6" height="6" viewBox="0 0 6 6" fill="none" xmlns="http://www.w3.org/2000/svg">
        <rect width="6" height="6" rx="2" fill="#222222" />
      </svg>

    </span>
    <a href="index.html" class="breadcrumbs__cat">
      Blog
    </a>
    <span class="breadcrumbs__separator">
      <svg width="6" height="6" viewBox="0 0 6 6" fill="none" xmlns="http://www.w3.org/2000/svg">
        <rect width="6" height="6" rx="2" fill="#B1BDC9" />
      </svg>
    </span>
    <span class="breadcrumbs__this">
      <?php the_title(); ?>
    </span>
  </nav>
</div>
<div class="single-top-white-bg">
  <section class="single-top container">
    <div class="single-top__date">
      <div class="home-blog__date">
        <?php the_time('d.m.Y') ?>
      </div>
    </div>

    <h3 class="single-top__title st-title"> <?php the_title(); ?> </h3>
    <div class="single-top__df">
      <div class="single-top__left">
        <span class="st-letter"></span>
        <p class="welcome__text fl-text"><?php the_field('top_left_text-posts'); ?>
        </p>
      </div>
      <p class="single-top__right"><?php the_field('top_right_text-posts'); ?></p>
    </div>
    <div class="single-top__ing-cont">
      <?php echo get_the_post_thumbnail(get_the_ID(), 'post_827x620', array('class' => 'single-top__img',)); ?>
    </div>
  </section>
</div>

<div class="single-bot-black-bg gray--bg">
  <section class="single-bot container">
    <h3 class="single-bot__title st-title"><?php the_field('title-posts'); ?></h3>

    <div class="single-bot__df">
      <div class="single-bot__left">
        <div class="single-bot__fl">
          <span class="st-letter"></span>
          <p class="welcome__text fl-text"> <?php the_field('left_text_upper_list-posts'); ?>
          </p>
        </div>
        <ul class="single-bot__ul">
          <?php
          if (have_rows('left_list-posts')) :
            while (have_rows('left_list-posts')) : the_row();
          ?>
              <li class="single-bot__list single-bot__list-left"><?php the_sub_field('item'); ?></li>
          <?php
            endwhile;
          else :
          endif;
          ?>
        </ul>
      </div>
      <div class="single-bot__right">
        <p class="single-bot__right-text"><?php the_field('right_text_upper_list-posts'); ?></p>
        <ul class="single-bot__ul">
          <?php
          if (have_rows('right_list-posts')) :
            while (have_rows('right_list-posts')) : the_row();
          ?>
              <li class="single-bot__list single-bot__list-left"><?php the_sub_field('item'); ?></li>
          <?php
            endwhile;
          else :
          endif;
          ?>
        </ul>
      </div>
    </div>

    <div class="single-bot__slider-cont">
      <div class="single-bot__slider">
        <?php
        if (have_rows('slider-posts')) :
          while (have_rows('slider-posts')) : the_row();
        ?>
            <img src="<?php the_sub_field('image'); ?>" alt="men" class="single-bot__slider-item">
        <?php
          endwhile;
        else :
        endif;
        ?>
      </div>
    </div>

  </section>
</div>

<div class="home-blog-single-wrap">
  <section class="home-blog home-blog-single container">
    <div class="nav-title">
      <span class="nav-title__line"></span>
      <p class="nav-title__text"><?php echo pll__('our_blog_single'); ?></p>
    </div>
    <div class="home-blog__title-df">
      <h3 class="home-blog__main-title  st-title"><?php echo pll__('top_news_single'); ?></h3>
      <div class="home-blog__slider-count"><span class="home-blog__slider-current-slide">1</span><span class="home-blog__slider-separator">/</span><span class="home-blog__slider-all-slide"></span></div>
    </div>
    <div class="home-blog__slider">
      <?php
      $args = array(
        'post_type'         => 'post',
        'publish'           => true,
        'posts_per_page'    => 9999,
        'orderby'     => 'date',
        // 'category_name' => 'trending, trending-fi, trending-se'

      );
      $the_query = new WP_Query($args);
      if ($the_query->have_posts()) { ?>

        <?php while ($the_query->have_posts()) {
          $the_query->the_post(); ?>

          <div class="home-blog__slider-item">
            <a href="<?php the_permalink(); ?>" class="home-blog__img-wrap">
              <?php echo get_the_post_thumbnail(get_the_ID(), 'post_827x620', array('class' => 'home-blog__img',)); ?>
            </a>
            <h3 class="home-blog__title"><?php the_title(); ?></h3>
            <p class="home-blog__text"> <?php the_excerpt_rss(); ?></p>
            <div class="home-blog__df">
              <div class="home-blog__date">
                <?php the_time('d.m.Y') ?>
              </div>
              <a href="<?php the_permalink(); ?>" class="home-blog__link">Read more</a>
            </div>
          </div>

        <?php }
        wp_reset_postdata(); ?>
      <?php } ?>
    </div>
  </section>
</div>

<?php get_footer(); ?>