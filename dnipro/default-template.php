<?php 
  /** Template name: Default Template */

  get_header();

  //ACF Variables
  $single_img = get_field('service_single_img');
  $service_overlay = get_field('service_overlay');
  if ( $service_overlay ) {
    $overlay_color = ' background-color: '.$service_overlay.';';
  }
  $service_color_heading = get_field('service_heading_color');
  if ( $service_color_heading ) {
    $color_heading = 'style="color: '.$service_color_heading.';"';
  }
?>

<main class="dspdmr_main">
  <?php if( $single_img ) { ?>
    <section class="single_hero" style="background: url('<?php echo esc_url( $single_img['url'] ); ?>') no-repeat;<?php echo $overlay_color ?>">
      <div class="single_hero__row">
        <h1 class="single_hero__heading" <?php echo $color_heading; ?>><?php the_title(); ?></h1>
      </div>
    </section>
  <?php } ?>

  <section class="single_content">
    <div class="single_container">
      <?php the_content(); ?>
    </div>
  </section>
</main>


<?php get_footer(); ?>