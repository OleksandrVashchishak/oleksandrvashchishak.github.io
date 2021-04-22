<?php
get_header();
?>


<div class="single__breadcrumbs container">
  <a href="<?php echo get_home_url(); ?>" class="single__bread-home">
    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M15.8333 20.0001H4.16667C3.2475 20.0001 2.5 19.2526 2.5 18.3334V10.8334H0.833333C0.365833 10.8334 0 10.4676 0 10.0001C0 9.77924 0.09 9.56257 0.246667 9.40591L9.70833 0.119238C9.87 -0.0390951 10.13 -0.0390951 10.2917 0.119238L19.75 9.40257C19.91 9.56257 20 9.77924 20 10.0001C20 10.4676 19.6342 10.8334 19.1667 10.8334H17.5V18.3334C17.5 19.2526 16.7525 20.0001 15.8333 20.0001ZM10 1.00091L0.833333 9.99757L2.91667 10.0001C3.14667 10.0001 3.33333 10.1867 3.33333 10.4167V18.3334C3.33333 18.7926 3.7075 19.1667 4.16667 19.1667H15.8333C16.2925 19.1667 16.6667 18.7926 16.6667 18.3334V10.4167C16.6667 10.1867 16.8533 10.0001 17.0833 10.0001H19.1667C19.1667 9.99841 19.165 9.99591 19.1642 9.99507L10 1.00091Z" fill="#313231" />
    </svg>
  </a>
  <span class="single__bread-separator"><svg width="15" height="20" viewBox="0 0 15 20" fill="none" xmlns="http://www.w3.org/2000/svg">
      <line x1="0.597472" y1="19.7034" x2="14.5975" y2="0.7034" stroke="#313231" />
    </svg>
  </span>
  <a href="<?php echo get_home_url(); ?>/blog" class="single__bread-home">
  <?php
        if (ICL_LANGUAGE_CODE == 'en') {
          the_field('blog_bred', 'option'); 
        } elseif (ICL_LANGUAGE_CODE == 'fi') {
          the_field('blog_bred-fi', 'option'); 
        } elseif (ICL_LANGUAGE_CODE == 'se') {
          the_field('blog_bred-se', 'option'); 
        }
        ?>
  </a>

  <span class="single__bread-separator this"><svg width="15" height="20" viewBox="0 0 15 20" fill="none" xmlns="http://www.w3.org/2000/svg">
      <line x1="0.597472" y1="19.7034" x2="14.5975" y2="0.7034" stroke="rgba(93, 93, 93, 0.6)" />
    </svg>
  </span>
  <span class="single__bread-this"><?php the_title(); ?> </span>
</div>

<div class="single__head container change-g-single">
  <h1 class="single__head-title"><?php the_title(); ?> </h1>
  <div class="single__head-df">
    <div class="slider-blog__item-info blog__info">
      <?php echo get_avatar($current_user->user_email, 30, '', '', array('class' => 'slider-blog__info-img')); ?>
      <div class="slider-blog__info-text">
        <h4 class="slider-blog__info-title"> <?php $post_id_7 = get_post($post->ID, ARRAY_A);
                                              echo get_the_author_meta('user_login',  $post_id_7['post_author']); ?></h4>
        <div class="slider-blog__info-date-read">
          <p class="slider-blog__info-date"><?php the_time('d.m.Y') ?></p>
          <span class="slider-blog__elipse"><svg width="2" height="2" viewBox="0 0 2 2" fill="none" xmlns="http://www.w3.org/2000/svg">
              <circle cx="1" cy="1" r="1" fill="#989898" />
            </svg>
          </span>
          <p class="slider-blog__info-read"><?php the_field('time_to_read'); ?></p>
        </div>
      </div>
    </div>
    <div class="single__head-share">
      <p class="single__head-share-text">
      <?php
      if (ICL_LANGUAGE_CODE == 'en') {
          the_field('share_title_post', 'option'); 
        } elseif (ICL_LANGUAGE_CODE == 'fi') {
          the_field('share_title_post-fi', 'option'); 
        } elseif (ICL_LANGUAGE_CODE == 'se') {
          the_field('share_title_post-se', 'option'); 
        }
        ?>
      </p>
      <?php do_action('nc_share_post'); ?>
    </div>
  </div>
  <div class="single__head-thumb-cont">
    <?php echo get_the_post_thumbnail(get_the_ID(), 'post_827x620', array('class' => '',)); ?>
  </div>
</div>

<div class="contact-page-two container contact-page-two_single ">
  <p class="contact-page-two__left"><?php the_field('left_text_blog-first'); ?></p>
  <div class="contact-page-two__right change-bg-st">
    <p class="contact-page-two__text"><?php the_field('center_text_blog-first'); ?></p>
    <p class="contact-page-two__text"><?php the_field('right_text_blog-first'); ?>
    </p>
  </div>
</div>

<div class="single-two single-two--green container change-bg-st">
  <div class="single-two__container">
    <p class="single-two__text">
      <?php the_field('left_text_blog-two'); ?>
    </p>
    <p class="single-two__text">
      <?php the_field('right_text_blog-two'); ?>
    </p>
  </div>
</div>

<div class="single-two container">
  <div class="single-two__container">
    <p class="single-two__text">
      <?php the_field('left_text_blog-three'); ?>
    </p>
    <p class="single-two__text">
      <?php the_field('right_text_blog-three'); ?>
    </p>
  </div>
</div>


<?php get_footer(); ?>