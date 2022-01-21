<?php

/**
 * Template Name: Home
 */
?>
<?php get_header(); ?>


<?php if (get_field('main_wallpaper_on')) { ?>
  <section id="wallpaper" style="background: url(<?php the_field('main_wallpaper'); ?>); background-repeat: no-repeat;background-size: auto;">
    <div class="video-container">
      <video class="main-video" src="<?php the_field('main_video'); ?>" loop muted playsinline></video>
    </div>
    <div class="wallpaper_headings">
      <?php 
      $main_wallpaper_img = get_field('main_wallpaper_img');
      if( $main_wallpaper_img ) { ?>
        <div class="wallpaper-logo wow fadeIn" data-wow-duration="1s" data-wow-delay="1.5s">
          <img src="<?php echo esc_url( $main_wallpaper_img['url'] ); ?>" alt="<?php echo esc_attr( $main_wallpaper_img['alt'] ); ?>" />
        </div>
      <?php } ?>
      <?php if (get_field('main_heading')) : ?>
        <h1 class="wallpaper_heading__big wow fadeIn" data-wow-duration="1s" data-wow-delay="2s"><?php the_field('main_heading') ?></h1>
      <?php endif; ?>
      <?php if (get_field('second_heading')) : ?>
        <h3 class="wallpaper_heading__big wow fadeIn" data-wow-duration="1s" data-wow-delay="2.5s"><?php the_field('second_heading') ?></h3>
      <?php endif; ?>
    </div>

    <?php 
      $main_wallpaper_btn = get_field('main_wallpaper_btn');
      if ( $main_wallpaper_btn ) {
        $link_url = $main_wallpaper_btn['url'];
        $link_title = $main_wallpaper_btn['title'];
        $link_target = $main_wallpaper_btn['target'] ? $main_wallpaper_btn['target'] : '_self';
    ?>
      <div class="wallpaper-buttons">
        <div class="action-button" id="buy-now">
          <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
          <svg width="47" height="77" viewBox="0 0 47 77" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M46 51.7546C46 64.9775 35.875 75.7963 23.5 75.7963C11.125 75.7963 1 64.9775 1 51.7546V25.0417C1 11.8187 11.125 1 23.5 1C35.875 1 46 11.8187 46 25.0417V51.7546Z" stroke="white" stroke-width="2" stroke-miterlimit="10" />
            <g opacity="0.7" class="bounce-2 box">
              <path d="M24 18C24 18 24 19.8579 24 23" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" />
            </g>
          </svg>
        </div>
      </div>
    <?php } ?>
  </section>
<?php } ?>

<section class="second">
  <div class="second_image__wrapper" style="background: url(<?php the_field('bg_second'); ?>); background-repeat: no-repeat;background-size: cover;">
    <?php if (get_field('warrior')) : ?>
      <img class="warrior" src="<?php the_field('warrior'); ?>" />
    <?php endif; ?>
    <?php if (get_field('monsters')) : ?>
      <img class="monsters" src="<?php the_field('monsters'); ?>" />
    <?php endif; ?>
  </div>
  <div class="second_text__wrapper">
    <?php if (get_field('battler_section_heading')) : ?>
      <h3 class="wow fadeInUp"><?php the_field('battler_section_heading') ?></h3>
    <?php endif; ?>
    <?php if (get_field('under_battler_heading_text')) : ?>
      <h6 class="wow fadeInUp"><?php the_field('under_battler_heading_text') ?></h6>
    <?php endif; ?>
    <?php if (get_field('battler_section_content')) : ?>
      <h6 class="battler_content wow fadeInUp"><?php the_field('battler_section_content') ?></h6>
    <?php endif; ?>
  </div>
  <?php if (get_field('clock')) : ?>
    <img class="clock rotate" src="<?php the_field('clock'); ?>" />
  <?php endif; ?>
</section>

<section class="trailer-section" style="background: url(<?php the_field('trailer_background'); ?>); background-repeat: no-repeat;">
  <div class="trailer-info-boxes" id="trailer-info-boxes">
    <?php if (get_field('trailer_info_box_left_text')) : ?>
      <div class="info-box wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.5s">
        <p><?php the_field('trailer_info_box_left_text'); ?></p>
      </div>
    <?php endif; ?>
    <?php if (get_field('trailer_info_box_center_text')) : ?>
      <div class="info-box wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.8s">
        <p><?php the_field('trailer_info_box_center_text'); ?></p>
      </div>
    <?php endif; ?>
    <?php if (get_field('trailer_info_box_right_text')) : ?>
      <div class="info-box wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="1.1s">
        <p><?php the_field('trailer_info_box_right_text'); ?></p>
      </div>
    <?php endif; ?>
    <?php if (get_field('horisontal_left')) : ?>
      <img class="wow fadeInLeft" src="<?php the_field('horisontal_left'); ?>" />
    <?php endif; ?>
  </div>
  <?php if (get_field('trailer_section_heading')) : ?>
    <h2 class="wow fadeIn"><?php the_field('trailer_section_heading'); ?></h2>
  <?php endif; ?>
  <div class="video-trailer">
    <?php if (get_field('play_video')) : ?>
      <img src="<?php the_field('play_video') ?>">
    <?php endif; ?>
    <span class="fa-youtube"></span>
  </div>
  <div class="popup-overlay"></div>
  <div class="popup-video">
    <?php if (get_field('video_trailer')) : ?>
      <video src="<?php the_field('video_trailer') ?>" autoplay controls loop class="video"></video>
    <?php endif; ?>
    <span class="fa-close"></span>
  </div>

  <?php 
    $trailer_btn = get_field('trailer_btn');
    if ( $trailer_btn ) {
      $link_url = $trailer_btn['url'];
      $link_title = $trailer_btn['title'];
      $link_target = $trailer_btn['target'] ? $trailer_btn['target'] : '_self';
  ?>
    <div class="action-button" id="buy-now">
      <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
    </div>
  <?php  } ?>
</section>

<section id="characters">
  <?php if (get_field('characters_section_heading')) : ?>
    <h3 class="wow fadeIn" data-wow-duration="3s"><?php the_field('characters_section_heading') ?></h3>
  <?php endif; ?>
  <div class="slider-thumbnails">
    <?php
    global $post;
    $args = array('numberposts' => -1, 'post_type' => 'character', 'orderby' => 'date', 'order'   => 'ASC',);
    $myposts = get_posts($args);
    foreach ($myposts as $post) {
      setup_postdata($post); ?>
      <div class="slider-thumbnails-item">
        <?php the_post_thumbnail(); ?>
      </div>
    <?php
    }
    wp_reset_postdata();
    ?>
  </div>
  <div class="slider-character-items">
    <?php
    global $post;
    $args = array('numberposts' => -1, 'post_type' => 'character', 'orderby' => 'date', 'order'   => 'ASC');
    $myposts = get_posts($args);
    foreach ($myposts as $post) {
      setup_postdata($post); ?>
      <div class="slider-character-item">

        <div class="charcter-main-info">
          <div class="slider-character-img slide-wow wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s">
            <?php the_post_thumbnail(); ?>
          </div>
          <div class="slider-character-main-description">
            <h4 class="slide-wow wow fadeInDown" data-wow-duration="0.8s" data-wow-delay="0.5s"><?php the_title(); ?></h4>
            <div class="main-description slide-wow wow fadeInDown" data-wow-duration="0.8s" data-wow-delay="0.7s"><?php the_content(); ?></div>
              <?php
              // Check value exists.
              if (have_rows('character_skills')) :
                echo '<div class="slider-chatacter-skills-list">';

                // Loop through rows.
                while (have_rows('character_skills')) : the_row();

                  // Case: Paragraph layout.
                  if (get_row_layout() == 'character_skills') : ?>
                    <div class="skill-item wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                      <?php
                      $image = get_sub_field('character_skill_image');
                      if (!empty($image)) : ?>
                        <img src="<?php echo $image['url']; ?>" ?>
                      <?php endif; ?>
                      <div class="characters_skill_description"><?php the_sub_field('characters_skill_description');  ?>
                      </div>
                    </div>
              <?php endif;

                // End loop.
                endwhile;

                echo '</div>';
              endif; ?>
          </div>
        </div>
      </div>
    <?php }
    wp_reset_postdata(); ?>
  </div>
  <div class="slider-character-description">
    <?php if (get_field('character-description-left')) : ?>
      <div class="excerpt-left wow fadeIn" data-wow-duration="2s"><?php the_field('character-description-left') ?></div>
    <?php endif; ?>
    <?php if (get_field('character-description-right')) : ?>
      <div class="excerpt-right wow fadeIn" data-wow-duration="2s"><?php the_field('character-description-right') ?></div>
    <?php endif; ?>
  </div>
</section>

<section class="unique-looking" style="background: url(<?php the_field('unique_looking_background'); ?>); background-repeat: no-repeat;">
  <div class="unique-looking_content">
    <div class="unique-looking__text">
      <?php if (get_field('unique_looking_heading')) : ?>
        <h3 class="wow fadeInUp"><?php the_field('unique_looking_heading'); ?></h3>
      <?php endif; ?>
      <?php if (get_field('unique_looking_content')) : ?>
        <div class="unique-looking_text wow fadeInUp">
          <?php the_field('unique_looking_content'); ?>
        </div>
      <?php endif; ?>
    </div>
    <div class="unique-looking_img wow fadeIn">
        <?php if( get_field('keep_video_instead_image') ) { ?>
          <?php if( get_field('unique_video') ) { ?>
            <video muted loop playsinline src="<?php the_field('unique_video'); ?>"></video>
          <?php } ?>
        <?php } else { ?>
          <?php if (get_field('unique_looking_img')) : ?>
            <img src="<?php the_field('unique_looking_img'); ?>" />
          <?php endif; ?>
        <?php } ?>
    </div>
  </div>
</section>

<section class="unique-gameplay" style="background: url(<?php the_field('unique_gameplay_background'); ?>); background-repeat: no-repeat; background-position: right 91% bottom 21%;">
  <div class="unique-gameplay_content">
    <div class="unique-gameplay_img">
      <?php if (get_field('unique_gameplay_img')) : ?>
        <img src="<?php the_field('unique_gameplay_img'); ?>" />
      <?php endif; ?>
    </div>
    <div class="unique-gameplay__text">
      <?php if (get_field('unique_gameplay_heading')) : ?>
        <h3 class="wow fadeInUp"><?php the_field('unique_gameplay_heading'); ?></h3>
      <?php endif; ?>
      <?php if (get_field('unique_gameplay_content')) : ?>
        <div class="unique-gameplay_info wow fadeInUp">
          <?php the_field('unique_gameplay_content'); ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>

<section id="upgradeable_characters" style="background: url(<?php the_field('upgradeable_characters'); ?>); background-repeat: no-repeat;  display: flex; position: relative;">
  <div class="upgradeable_characters__text">
    <?php if (get_field('upgradeable_characters_heading')) : ?>
      <h3 class="wow fadeInUp"><?php the_field('upgradeable_characters_heading'); ?></h3>
    <?php endif; ?>
    <?php if (get_field('upgradeable_characters_content')) : ?>
      <div class="upgradeable_characters__info wow fadeInUp">
        <?php the_field('upgradeable_characters_content'); ?>
      </div>
    <?php endif; ?>
  </div>
  <div class="upgradeable_characters__slider-wrapper">
    <div class="upgradeable_characters__slider">
      <?php
      if (have_rows('upgradeable_characters_slider')) :
        while (have_rows('upgradeable_characters_slider')) : the_row();
      ?>
          <?php if (get_sub_field('upgradeable_characters_slider_image')) : ?>
            <div class="upgradeable_character">
              <img src="<?php the_sub_field('upgradeable_characters_slider_image'); ?>" />
            </div>
          <?php endif; ?>
      <?php
        endwhile;
      endif; ?>
    </div>
    <div class="stars">
      <div class="star-item">
        <span class="star-num">1</span>
        <span class="fa-star"></span>
        </svg>
      </div>
      <div class="star-item">
        <span class="star-num">2</span>
        <span class="fa-star"></span>
        </svg>
      </div>
      <div class="star-item">
        <span class="star-num">3</span>
        <span class="fa-star"></span>
        </svg>
      </div>
      <div class="star-item">
        <span class="star-num">4</span>
        <span class="fa-star"></span>
        </svg>
      </div>
      <div class="star-item">
        <span class="star-num">5</span>
        <span class="fa-star"></span>
        </svg>
      </div>
    </div>
  </div>
</section>

<?php if (get_field('3d_model_on')) { ?>
  <section id="model-section">
    <div class="dots">
      <?php if (get_field('dots')) : ?>
        <img src="<?php the_field('dots'); ?>" />
      <?php endif; ?>
    </div>
    <div class="model-text">
      <?php if (get_field('3d_model_heading')) : ?>
        <h3 class="wow fadeInUp"><?php the_field('3d_model_heading'); ?></h3>
      <?php endif; ?>
      <?php if (get_field('3d-model_content')) : ?>
        <div class="model-info wow fadeInUp">
          <?php the_field('3d-model_content'); ?>
        </div>
      <?php endif; ?>
      
      <?php 
        $model_btn = get_field('3d-model_btn');
        if ( $model_btn ) {
          $link_url = $model_btn['url'];
          $link_title = $model_btn['title'];
          $link_target = $model_btn['target'] ? $model_btn['target'] : '_self';
      ?>
        <div class="action-button" id="buy-now">
          <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
        </div>
      <?php } ?>
    </div>
    <div class="model-img">
      <?php if (get_field('3d_model')) : ?>
        <img src="<?php the_field('3d_model'); ?>" />
      <?php endif; ?>
      <span class="fa-scroll"></span>
    </div>
  </section>
<?php } ?>

<section class="free-to-play" style="background: url(<?php the_field('free-to-play'); ?>); background-repeat: no-repeat; ">
  <?php if (get_field('free-to-play_heading')) : ?>
    <h3 class="wow fadeIn"><?php the_field('free-to-play_heading'); ?></h3>
  <?php endif; ?>
  <?php if (get_field('free-to-play_under_heading_text')) : ?>
    <span><?php the_field('free-to-play_under_heading_text'); ?></span>
  <?php endif; ?>
  <div class="advantages">
    <div class="advantage advantage-left wow fadeIn" data-wow-duration="2s">
      <div class="advantage-inner">
        <?php if (get_field('free-to-play_first_advantage_heading')) : ?>
          <h4><?php the_field('free-to-play_first_advantage_heading'); ?></h4>
        <?php endif; ?>
        <?php if (get_field('free-to-play_first_advantage_content')) : ?>
          <div class="advantage-text">
            <?php the_field('free-to-play_first_advantage_content'); ?>
            <?php if (get_field('free-to-play_first_advantage_bottom')) : ?>
              <span><?php the_field('free-to-play_first_advantage_bottom'); ?></span>
            <?php endif; ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
    <div class="advantage advantage-right wow fadeIn" data-wow-duration="2s">
      <div class="advantage-inner">
        <?php if (get_field('free-to-play_second_advantage_heading')) : ?>
          <h4><?php the_field('free-to-play_second_advantage_heading'); ?></h4>
        <?php endif; ?>
        <?php if (get_field('free-to-play_second_advantage_content')) : ?>
          <div class="advantage-text">
            <?php the_field('free-to-play_second_advantage_content'); ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <?php if (get_field('free-to-play_advantages_bottom_text')) : ?>
    <div class="free-to-play-info">
      <?php the_field('free-to-play_advantages_bottom_text'); ?>
    </div>
  <?php endif; ?>
</section>

<section class="revenue">
  <?php if (get_field('revenue_heading')) : ?>
    <h2 class="wow fadeIn"><?php the_field('revenue_heading'); ?></h2>
  <?php endif; ?>
  <div class="revenue-items">
    <div class="revenue-item-wrapper">
      <div class="revenue-item">
        <?php if (get_field('revenue_left_heading')) : ?>
          <h3><?php the_field('revenue_left_heading'); ?></h3>
        <?php endif; ?>
        <?php if (get_field('revenue_left_content')) : ?>
          <div class="revenue-info">
            <?php the_field('revenue_left_content'); ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
    <div class="revenue-item-wrapper">
      <div class="revenue-item">
        <?php if (get_field('revenue_center_heading')) : ?>
          <h3> <?php the_field('revenue_center_heading'); ?></h3>
        <?php endif; ?>
        <?php if (get_field('revenue_center_content')) : ?>
          <div class="revenue-info">
            <?php the_field('revenue_center_content'); ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
    <div class="revenue-item-wrapper">
      <div class="revenue-item">
        <?php if (get_field('revenue_right_heading')) : ?>
          <h3> <?php the_field('revenue_right_heading'); ?></h3>
        <?php endif; ?>
        <?php if (get_field('revenue_right_content')) : ?>
          <div class="revenue-info">
            <?php the_field('revenue_right_content'); ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
    <?php if (get_field('horisontal_right')) : ?>
      <img class="wow fadeInRight" src="<?php the_field('horisontal_right'); ?>" />
    <?php endif; ?>
  </div>
</section>

<section class="future-of-gaming" style="background: url(<?php the_field('future_img'); ?>); background-repeat: no-repeat;">
  <?php if (get_field('future-main-heading')) : ?>
    <h3><?php the_field('future-main-heading'); ?></h3>
  <?php endif; ?>
  <?php if (get_field('future_under_main_heading_text')) : ?>
    <span><?php the_field('future_under_main_heading_text'); ?></span>
  <?php endif; ?>

  <div class="advantages">
    <div class="advantage advantage-left wow fadeIn">
      <div class="advantage-inner">
        <?php if (get_field('future_heading_left')) : ?>
          <h4><?php the_field('future_heading_left'); ?></h4>
        <?php endif; ?>
        <?php if (get_field('future_left_content')) : ?>
          <div class="advantage-text">
            <?php the_field('future_left_content'); ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
    <div class="advantage advantage-right wow fadeIn">
      <div class="advantage-inner">
        <?php if (get_field('future_right_heading')) : ?>
          <h4><?php the_field('future_right_heading'); ?></h4>
        <?php endif; ?>
        <?php if (get_field('future_right_content')) : ?>
          <div class="advantage-text">
            <?php the_field('future_right_content'); ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <?php if (get_field('clock')) : ?>
    <img class="clock rotate" src="<?php the_field('clock'); ?>" />
  <?php endif; ?>
</section>

<?php if( get_field('benefits_section_on') ) { ?>
  <section class="benefits">
    <?php if (get_field('benefits_main_heading')) : ?>
      <h2><?php the_field('benefits_main_heading'); ?></h2>
    <?php endif; ?>
    <div class="benefits-items">
      <div class="benefits-item early-bird-prices wow fadeIn">
        <div class="icon-heading">
          <span class="fa-dollar"></span>
          <?php if (get_field('benefits_left_top_heading')) : ?>
            <h3><?php the_field('benefits_left_top_heading'); ?></h3>
          <?php endif; ?>
        </div>
        <?php if (get_field('benefits_left_top_content')) : ?>
          <div class="benefits-text">
            <?php the_field('benefits_left_top_content'); ?>
          </div>
        <?php endif; ?>
      </div>
      <div class="benefits-item your-opinion-matters wow fadeIn">
        <div class="icon-heading">
          <span class="fa-type"></span>
          <?php if (get_field('benefits_center_heading')) : ?>
            <h3><?php the_field('benefits_center_heading'); ?></h3>
          <?php endif; ?>
        </div>
        <?php if (get_field('benefits_center_content')) : ?>
          <div class="benefits-text">
            <?php the_field('benefits_center_content'); ?>
          </div>
        <?php endif; ?>
      </div>
      <div class="benefits-item access-to-quality wow fadeIn">
        <div class="icon-heading">
          <span class="fa-lock"></span>
          <?php if (get_field('benefits_bottom_right_heading')) : ?>
            <h3><?php the_field('benefits_bottom_right_heading'); ?></h3>
          <?php endif; ?>
        </div>
        <?php if (get_field('benefits_bottom_right_content')) : ?>
          <div class="benefits-text">
            <?php the_field('benefits_bottom_right_content'); ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
    <?php 
      $benefits_btn = get_field('benefits_btn');
      if ( $benefits_btn ) {
        $link_url = $benefits_btn['url'];
        $link_title = $benefits_btn['title'];
        $link_target = $benefits_btn['target'] ? $benefits_btn['target'] : '_self';
    ?>
      <div class="action-button" id="buy-now">
        <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
      </div>
    <?php } ?>
  </section>
<?php } ?>

<!-- Founder section -->
<?php 
  require_once($_SERVER['DOCUMENT_ROOT'].'/wp-content/themes/legends/custom/store/store-settings.php');
  get_template_part( 'custom/founder/founder-part' ); 
?>

<section class="coming-soon" style="background: url(<?php the_field('coming-soon-bg'); ?>); background-repeat: no-repeat; ">
  <?php if (get_field('coming_soon_main_heading')) : ?>
    <h2><?php the_field('coming_soon_main_heading'); ?></h2>
  <?php endif; ?>
  <div class="trailer-info-boxes">

    <div class="trailer-info-box">
      <?php if (get_field('coming_soon_left_feature')) : ?>
        <div class="revenue-item">
          <?php the_field('coming_soon_left_feature'); ?>
        </div>
      <?php endif; ?>
      <?php if (get_field('horisontal_left')) : ?>
        <img class="wow fadeInLeft" src="<?php the_field('horisontal_left'); ?>" />
      <?php endif; ?>

      <div class="coming-soon-video">
        <?php if (get_field('coming_soon_left')) : ?>
          <video muted loop playsinline src="<?php the_field('coming_soon_left'); ?>">
          </video>
        <?php endif; ?>
      </div>
    </div>

    <div class="trailer-info-box">
      <?php if (get_field('coming_soon_center_feature')) : ?>
        <div class="revenue-item">
          <?php the_field('coming_soon_center_feature'); ?>
        </div>
      <?php endif; ?>
      <div class="coming-soon-video">
        <?php if (get_field('coming_soon_center')) : ?>
          <video muted loop playsinline src="<?php the_field('coming_soon_center'); ?>"></video>
        <?php endif; ?>
      </div>
    </div>

    <div class="trailer-info-box">
      <?php if (get_field('coming_soon_right_feature')) : ?>
        <div class="revenue-item">
          <?php the_field('coming_soon_right_feature'); ?>
        </div>
      <?php endif; ?>
      <div class="coming-soon-video">
        <?php if (get_field('coming_soon_right')) : ?>
          <video muted loop playsinline src="<?php the_field('coming_soon_right'); ?>"></video>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <?php 
    $coming_btn = get_field('coming_btn');
    if ( $coming_btn ) {
      $link_url = $coming_btn['url'];
      $link_title = $coming_btn['title'];
      $link_target = $coming_btn['target'] ? $coming_btn['target'] : '_self';
  ?>
    <div class="action-button" id="buy-now">
      <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
    </div>
  <?php } ?>
</section>

<section class="roadmap" id="roadmap">
  <?php if (get_field('roadmap_heading')) : ?>
    <h2><?php the_field('roadmap_heading') ?></h2>
  <?php endif; ?>
  <div class="events">
    <?php
    if (have_rows('roadmap')) :
      while (have_rows('roadmap')) : the_row();
    ?>
        <div class="event-item">
          <?php if (get_sub_field('event_date')) : ?>
            <div class="event_date"><?php the_sub_field('event_date') ?></div>
          <?php endif; ?>
          <?php if (get_sub_field('event_name')) : ?>
            <div class="event_name"><?php the_sub_field('event_name') ?></div>
          <?php endif; ?>
          <?php if (get_sub_field('event_info')) : ?>
            <div class="event_info"><?php the_sub_field('event_info') ?></div>
          <?php endif; ?>
        </div>
    <?php
      endwhile;
    endif; ?>
  </div>
</section>

<section id="about-us" class="our-team" style="background: url(<?php the_field('our_team_background'); ?>); background-repeat: no-repeat;">
  <?php if (get_field('team_heading')) : ?>
    <h2><?php the_field('team_heading') ?></h2>
  <?php endif; ?>
  <div class="our-team-members">
    <?php
    if (have_rows('our_team')) :
      while (have_rows('our_team')) : the_row();
    ?>
        <div class="team-member-single">
          <?php if (get_sub_field('team_member_photo')) : ?>
            <img src="<?php the_sub_field('team_member_photo'); ?>" />
          <?php endif; ?>
          <?php if (get_sub_field('team_member_name')) : ?>
            <div class="team-member_name"><?php the_sub_field('team_member_name') ?></div>
          <?php endif; ?>
          <?php if (get_sub_field('team_member_job')) : ?>
            <div class="team-member_info"><?php the_sub_field('team_member_job') ?></div>
          <?php endif; ?>
          <?php if (get_sub_field('linkedin_link')) : ?>
            <a class="team-member_link" href="<?php the_sub_field('linkedin_link'); ?>" target="_blank" title="LinkedIn">
              <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M25.5588 25.565H21.1162V18.6038C21.1162 16.9438 21.0825 14.8075 18.8013 14.8075C16.485 14.8075 16.1312 16.6137 16.1312 18.4812V25.565H11.6887V11.25H15.9563V13.2012H16.0137C16.61 12.0762 18.06 10.8888 20.2262 10.8888C24.7275 10.8888 25.56 13.8513 25.56 17.7075V25.565H25.5588ZM6.67125 9.29125C6.33235 9.29141 5.99674 9.22474 5.68363 9.09505C5.37053 8.96536 5.08607 8.77519 4.84655 8.53543C4.60702 8.29568 4.41713 8.01104 4.28774 7.69781C4.15835 7.38458 4.09201 7.0489 4.0925 6.71C4.09275 6.19972 4.2443 5.70098 4.528 5.27684C4.8117 4.8527 5.2148 4.52221 5.68633 4.32716C6.15786 4.13212 6.67664 4.08128 7.17706 4.18107C7.67748 4.28086 8.13707 4.5268 8.49772 4.8878C8.85836 5.24879 9.10386 5.70862 9.20317 6.20914C9.30248 6.70966 9.25113 7.22839 9.05563 7.69973C8.86013 8.17107 8.52925 8.57385 8.10483 8.85714C7.68042 9.14042 7.18153 9.2915 6.67125 9.29125V9.29125ZM8.89875 25.565H4.44375V11.25H8.89875V25.565ZM27.7813 0H2.21375C0.99 0 0 0.9675 0 2.16125V27.8387C0 29.0337 0.99 30 2.21375 30H27.7775C29 30 30 29.0337 30 27.8387V2.16125C30 0.9675 29 0 27.7775 0H27.7813Z" fill="url(#paint0_linear_841:46)"/>
                <defs>
                <linearGradient id="paint0_linear_841:46" x1="5.63291" y1="1.44053e-07" x2="26.4233" y2="2.72522" gradientUnits="userSpaceOnUse">
                <stop stop-color="#1FA1FF"/>
                <stop offset="1" stop-color="#1F5EFF"/>
                </linearGradient>
                </defs>
              </svg>
            </a>
          <?php endif; ?>
        </div>
    <?php
      endwhile;
    endif; ?>
  </div>
</section>

<?php if (get_field('investors_on')) { ?>
  <section class="investors_and_partners">
    <?php if (get_field('investors_heading')) : ?>
      <h2 id="investors-heading"><?php the_field('investors_heading') ?></h2>
    <?php endif; ?>
    <div class="investor-items">
      <?php
      if (have_rows('investors')) :
        while (have_rows('investors')) : the_row();
      ?>
          <?php if (get_sub_field('investor_logo')) : ?>
            <div class="investor-item">
              <img src="<?php the_sub_field('investor_logo'); ?>" />
            </div>
          <?php endif; ?>
      <?php
        endwhile;
      endif; ?>
    </div>
    <?php if (get_field('partners_heading')) : ?>
      <h2 id="partners-heading"><?php the_field('partners_heading') ?></h2>
    <?php endif; ?>
    <div class="partner-items">
      <?php
      if (have_rows('partners')) :
        while (have_rows('partners')) : the_row();
      ?>
          <?php if (get_sub_field('partners_logo')) : ?>
            <div class="partner-item">
              <img src="<?php the_sub_field('partners_logo'); ?>" />
            </div>
          <?php endif; ?>
      <?php
        endwhile;
      endif; ?>
    </div>
    <?php if (get_field('clock')) : ?>
      <img class="clock rotate" src="<?php the_field('clock'); ?>" />
    <?php endif; ?>
  </section>
<?php } ?>


<?php get_footer(); ?>