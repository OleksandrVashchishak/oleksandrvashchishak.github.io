<?php
get_header();
/*
 Template Name: Blog
 */
?>


<div class="blog-bg-preview">
</div>

<section class="subscribe-blog">
  <div class="footer__subscribe container">
    <h2 class="subscribe-blog__title"> <?php echo nl2br(esc_html(get_theme_mod('contact_title'))); ?> </h2>
    <h3 class="footer_subs-title">
      Don’t miss out!
    </h3>
    <p class="footer__subs-text"> <?php echo nl2br(esc_html(get_theme_mod('contact_subtitle'))); ?></p>
  </div>
  <div class="container">
    <div class="footer__form-wrapper ">
      <?php echo do_shortcode('[contact-form-7 id="397" title="subscribe-form"]') ?>
    </div>
  </div>
</section>




<section class="blog-top container">
  <div class="blog-top__first-post">
    <?php
    $args = array(
      'paged' => $paged,
      'post_type'         => 'post',
      'post_status' => 'publish',
      'posts_per_page'    => 1,
      'orderby'     => 'date'
    );

    $mypost_Query = new WP_Query($args);
    if ($mypost_Query->have_posts()) { ?>

      <?php while ($mypost_Query->have_posts()) {
        $mypost_Query->the_post();
        get_template_part('/template-parts/content/content');
      }
      wp_reset_postdata(); ?>
    <?php } ?>
  </div>

  <div class="blog-top__right">
    <div class="blog-top__search search">
      <?php get_search_form(); ?>
      <button>
        <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M21.414 18.586L17.455 14.627C18.439 13.108 18.973 11.339 18.973 9.486C18.973 6.953 17.987 4.57 16.194 2.779C14.402 0.987 12.02 0 9.486 0C6.952 0 4.57 0.987 2.779 2.778C0.987 4.57 0 6.953 0 9.486C0 12.02 0.987 14.403 2.779 16.194C4.57 17.986 6.953 18.972 9.486 18.972C11.34 18.972 13.108 18.44 14.627 17.455L18.586 21.414C18.964 21.792 19.466 22 20 22C20.534 22 21.036 21.792 21.414 21.414C21.792 21.037 22 20.535 22 20C22 19.465 21.792 18.963 21.414 18.586ZM4.193 14.778C2.779 13.365 2 11.486 2 9.486C2 7.486 2.779 5.607 4.193 4.194C5.607 2.779 7.486 2 9.486 2C11.486 2 13.365 2.779 14.779 4.194C16.193 5.607 16.972 7.486 16.972 9.486C16.972 11.486 16.193 13.365 14.779 14.779C13.365 16.194 11.486 16.972 9.486 16.972C7.486 16.972 5.607 16.194 4.193 14.778Z" fill="#4361EE" />
        </svg>
      </button>
    </div>

    <div class="blog-top__cats">
      <h5 class="blog-top__cats-title">Categories</h5>
      <?php
      $args = [
        'title_li'           => __(''),
        'use_desc_for_title' => 0,
        'echo' => 1,
        'style' => 'list',
        'show_count' => 0,
      ];
      ?>
      <ul>
        <?php wp_list_categories($args); ?>
      </ul>
    </div>





    <div class="blog-top__share">
      <h5 class="blog-top__share-title"> Share </h5>
      <ul class="a2a_kit a2a_default_style">
        <li>
          <a class="a2a_button_twitter">
            <img src="<?php bloginfo('template_url'); ?>/img/Twitter.svg" border="0" alt="Twitter" width="27" height="27">
          </a>
          <a class="a2a_button_linkedin">
            <img src="<?php bloginfo('template_url'); ?>/img/linkedin.svg" border="0" alt="Linkedin" width="27" height="27">
          </a>
        <li>
      </ul>
    </div>
  </div>
</section>

<section class="blog-main container">
  <div class="blog-main__wrapper">
    <?php
    $args = array(
      'paged' => $paged,
      'post_type'         => 'post',
      'post_status' => 'publish',
      'posts_per_page'    => 5,
      'orderby'     => 'date'
    );
    $blogCounter = 0;
    $mypost_Query = new WP_Query($args);
    if ($mypost_Query->have_posts()) { ?>

      <?php while ($mypost_Query->have_posts()) {
        $mypost_Query->the_post();
        $blogCounter++;
        if ($blogCounter == 1) {
          continue;
        }
        get_template_part('/template-parts/content/content');
      }
      wp_reset_postdata(); ?>
    <?php } ?>
  </div>

  <script>
    var this_page = 1;
  </script>

  <div class="btn-loadmore blog__load-more main-btn" title="Load more" data-param-posts='<?php echo serialize($mypost_Query->query_vars); ?>' data-max-pages='<?php echo $mypost_Query->max_num_pages; ?>' data-tpl='doveryayut'>
    <span class="fas fa-redo"></span> Load more
  </div>
</section>

<section class="blog-home blog-home-marg container">
  <h3 class="blog-home__title main-title">Most read </h3>
  <p class="blog-home__pretitle main-subtitle">These posts have brought some attention</p>

  <div class="blog-home__wrapper ">
    <?php
    $args = array(
      'paged' => $paged,
      'post_type'         => 'post',
      'post_status' => 'publish',
      'posts_per_page'    => 4,
      'orderby'     => 'rand'
    );

    $mypost_Query = new WP_Query($args);
    if ($mypost_Query->have_posts()) { ?>

      <?php while ($mypost_Query->have_posts()) {
        $mypost_Query->the_post();
        get_template_part('/template-parts/content/content');
      }
      wp_reset_postdata(); ?>
    <?php } ?>

  </div>

</section>

<?php get_footer(); ?>