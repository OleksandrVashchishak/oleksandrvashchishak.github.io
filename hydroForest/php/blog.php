<?php
get_header();
/*
 Template Name: Blog
 */
?>
<div class="container">
<nav class="breadcrumbs  breadcrumbs__blog">
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
      <rect width="6" height="6" rx="2" fill="#B1BDC9" />
    </svg>
  </span>
  <span class="breadcrumbs__this">
  <?php echo pll__('blog_bread_page'); ?>
  </span>
</nav>
</div>
<div class="blog container">
  <h3 class="home-blog__main-title  st-title">  <?php echo pll__('blog_bread_page'); ?></h3>

  <div class="blog__wrapper">


    <?php
    $args = array(
      'post_type'         => 'post',
      'publish'           => true,
      'posts_per_page'    => 10,
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
            <a href="<?php the_permalink(); ?>" class="home-blog__link">  <?php echo pll__('read_more_blog'); ?></a>
          </div>
        </div>

      <?php }
      wp_reset_postdata(); ?>
    <?php } ?>
  </div>

  <div class="cat-prod__pagination blog__pagination">

    <?php $big = 999999999;
    $pages = paginate_links(array(
      'base'    => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
      'format'  => '?paged=%#%',
      'current' => max(1, get_query_var('paged')),
      'total'   => $the_query->max_num_pages,
      'prev_next'    => true,
      'type'    => 'array',
      'prev_text'    => ' <li class="cat-prod_arrow-prev cat-prod_arrow">
      <svg width="8" height="16" viewBox="0 0 8 16" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M5.87499 8L1 12.875V14L7 8L1 2V3.12499L5.87499 8Z" fill="#E44747" stroke="#E44747" />
      </svg>
    </li>',
      'next_text'    => ' <li class="cat-prod_arrow cat-prod_arrow-next">
      <svg width="8" height="16" viewBox="0 0 8 16" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M5.87499 8L1 12.875V14L7 8L1 2V3.12499L5.87499 8Z" fill="#E44747" stroke="#E44747" />
      </svg>
    </li>',
    ));
    if (is_array($pages)) { ?>
      <ul>
        <?php foreach ($pages as $page) {
          echo "<li>$page</li>";
        }
        wp_reset_query(); ?>
      </ul>

    <?php } ?>

  </div>
</div>


<?php get_footer(); ?>