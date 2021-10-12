<?php 
  get_header();

  //ACF Variables
  $current_term = get_queried_object();

  $cat_image = get_field('cat_image', $current_term);
  $cat_image_overlay = get_field('cat_image_overlay', $current_term);
  if ( $cat_image_overlay ) {
    $overlay_color = ' background-color: '.$cat_image_overlay.';';
  }
?>

<?php 
  if ( ! is_taxonomy_hierarchical( $current_term->taxonomy ) ) {
    echo 'True';
  }
?>


<main class="dspdmr_main">

  <?php if( $cat_image ) { ?>
    <section class="single_hero" style="background: url('<?php echo esc_url( $cat_image['url'] ); ?>') no-repeat;<?php echo $overlay_color ?>">
      <div class="single_hero__row">
        <h1 class="single_hero__heading"><?php echo $current_term->name; ?></h1>
      </div>
    </section>
  <?php } ?>

  <?php 
    //If Taxonomy hasn't any child categories
    if ( ($current_term->count) > 0 ) {
    // if (false) {
      $service_list = new WP_Query( array(
        'post_type'      => 'services',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
        'tax_query' => array(
          array (
              'taxonomy' => $current_term->taxonomy,
              'field' => 'term_id',
              'terms' => $current_term->term_taxonomy_id,
            )
          ),
      ) );

    ?>
    
      <section class="tax_services">
        <div class="default_container">
          <div class="service_list tax_service">
            <div class="service_row">
            <?php while ( $service_list->have_posts() ):
              $service_list->the_post();

              //ACF fields
                $heading = get_field('service_heading');
                $image = get_field('service_img');
              ?>
              <div class="service_item">
                <div class="service_wrapper">
                  <?php if( $image ) { ?>
                    <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php the_title(); ?>">
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
    <?php } ?>

  
    <?php 
      $terms = get_terms( [
        'taxonomy'   => $current_term->taxonomy,
        'parent'     => $current_term->term_id,
        'hide_empty' => false,
      ] );
    ?>

  <section class="tax_services">
    <div class="default_container">
      <div class="service_list tax_service">
        <div class="service_row">
        <?php foreach ( $terms as $term ) {
          $image = get_field('cat_image', $term);
        ?>
          <div class="service_item">
            <div class="service_wrapper">
              <?php if( $image ) { ?>
                <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php the_title(); ?>">
              <?php } ?>
              <div class="service_content">
              <?php if( $term->name ) { ?>
                  <h3 class="service_heading"><?php echo esc_html( $term->name ); ?> </h3>
                  <?php } ?>
                <a href="<?php echo esc_url( get_term_link( $term ) ); ?>" class="service_btn">Перейти</a>
              </div>
            </div>
          </div>
        <?php } ?>

        </div>
      </div>
    </div>
  </section>
</main>


<?php get_footer(); ?>