<?php 
  /** Template name: Home */

  get_header();

  //ACF Variables
  //Hero section | slider
  $home_slider = get_field('slider_elem');
  $home_slides = $home_slider['slides'];
?>

<main class="dspdmr_main">
  <section class="home_hero">
    <?php if( $home_slider ) { ?>
      <div class="slider_elem sliderfull_elem">
        <div class="slider_wrapper">
          <?php if( $home_slides ) { ?>
            <?php foreach( $home_slides as $slide ) {
              $slide_bg = $slide['slide_bg']['url'];
              $slide_subheading = $slide['slide_subheading'];
              $slide_heading = $slide['slide_heading'];
              $slide_btn = $slide['slide_btn'];
              $slide_btn_url = $slide_btn['url'];
              $slide_btn_title = $slide_btn['title'];
              $slide_btn_target = $slide_btn['target'] ? $link['target'] : '_self';
            ?>
              <div class="slide_item slide_bg" <?php if( $slide_bg ) { ?>style="background-image: url('<?php echo esc_url( $slide_bg ); ?>');" <?php } ?>>
                <div class="slide_content">
                  <?php if( $slide_subheading ) { ?>
                    <div class="slide_subheading">
                      <?php echo wp_specialchars_decode( $slide_subheading ); ?>
                    </div>
                  <?php } ?>

                  <?php if( $slide_heading ) { ?>
                    <div class="slide_heading">
                      <?php echo wp_specialchars_decode( $slide_heading ); ?>
                    </div>
                  <?php } ?>

                  <?php if( $slide_btn ) { ?>
                    <a class="slide_btn" href="<?php echo esc_url( $slide_btn_url ); ?>" target="<?php echo esc_attr( $slide_btn_target ); ?>"><?php echo esc_html( $slide_btn_title ); ?></a>
                  <?php } ?>
                </div>
              </div>
            <?php } ?>
          <?php } ?>
        </div>
      </div>    
    <?php } ?>
  </section>
  
  <?php 




    $count =  [];
    foreach (get_field('top-5-service') as $key => $value) {
        array_push($count, $value['service']);
    }

    $services = new WP_Query( array(
      'post_type'      => 'services',
      'post_status'    => 'publish',
      'posts_per_page' => -1,
      'post__in' =>  $count,
      'orderby' => 'post__in'
      // 'tax_query' => array(
      //   array (
      //       'taxonomy' => 'service-cat',
      //       'field' => 'term_id',
      //       'terms' => '13',
      //   )
      // ),
    ) );
  ?>

  <?php if ( $services->have_posts() ):  ?>
  <section class="home_services">
    <div class="heading_banner">
      <h2 class="heading_banner__text">Топ 5 соціальних послуг</h2>
    </div>
    <div class="default_container">
      <div class="service_list home_service">
        <div class="service_row">
        <?php while ( $services->have_posts() ):
          $services->the_post();

          //ACF fields
          $heading = get_field('service_heading');
          $image = get_field('service_img');
          ?>
          <div class="service_item">
            <div class="service_wrapper">
              <?php if( $image ) { ?>
                <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>">
              <?php } ?>
              <div class="service_content">
                <?php if( $heading ) { ?>
                  <h3 class="service_heading"><?php echo wp_specialchars_decode( $heading ); ?></h3>
                <?php } ?>
                <a href="<?php the_permalink(); ?>" class="service_btn">Перейти</a>
              </div>
            </div>
          </div>

        <?php endwhile; wp_reset_postdata(); ?>
        </div>
      </div>
      
    </div>
  </section>
  <?php endif; ?>


</main>


<?php get_footer(); ?>