<?php 
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

  //Video fields
  $single_video = get_field('single_video');
  $single_video_on = $single_video['single_video_on'];
  $single_video_heading = $single_video['single_video_heading'];
  $single_video_elem = $single_video['single_video_elem'];

  //Book fields
  $single_book = get_field('single_book');
  $single_book_on = $single_book['single_book_on'];
  $single_book_heading = $single_book['single_book_heading'];
  $single_book_img = $single_book['single_book_img'];
  $single_book_file = $single_book['single_book_file'];

  //Document fields
  $single_document = get_field('single_document');
  $single_document_on = $single_document['single_document_on'];
  $single_document_heading = $single_document['single_document_heading'];
  $single_document_carousel = $single_document['single_document_carousel'];

  //Contact fields
  $single_contact = get_field('single_contact');
  $single_contact_on = $single_contact['single_contact_on'];
  $single_contact_elem = $single_contact['single_contact_elem'];
?>

<main class="dspdmr_main">
  <?php if( $single_img ) { ?>
    <section class="single_hero" style="background: url('<?php echo esc_url( $single_img['url'] ); ?>') no-repeat;<?php echo $overlay_color ?>">
      <div class="single_hero__row">
        <h1 class="single_hero__heading" <?php echo $color_heading; ?>><?php the_title(); ?></h1>
      </div>
    </section>
  <?php } ?>

  <?php if ( $single_video_on ) { ?>
    <section class="single_video">
      <div class="single_container">
        <?php if( $single_video_heading ) { ?>
          <h2 class="single_h2 video_heading"><?php echo esc_attr( $single_video_heading ); ?></h2>
        <?php } ?>
        <?php if( $single_video_elem ) { ?>
          <div class="single_video_elem">
            <?php echo wp_specialchars_decode( $single_video_elem ); ?>
          </div>
        <?php } ?>
      </div>
    </section>
  <?php } ?>

  <?php if ( $single_book_on ) { ?>
    <section class="single_book">
      <div class="single_container">
        <div class="single_book__row">
          <?php if( $single_book_img ) { ?>
            <div class="single_book__img">
              <img src="<?php echo esc_url( $single_book_img['url'] ); ?>" alt="<?php echo esc_attr( $single_book_img['alt'] ); ?>">
            </div>
          <?php } ?>
          <div class="single_book__content">
            <?php if( $single_video_heading ) { ?>
              <div class="single_book__heading">
                <?php echo wp_specialchars_decode( $single_book_heading ); ?>
              </div>
            <?php } ?>

            <?php if( $single_book_file ) { ?>
              <div class="single_book__btn_wrap">
                <a class="single_book__btn" download="" href="<?php echo esc_url( $single_book_file['url'] ); ?>">Завантажити</a>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </section>
  <?php } ?>

  <section class="single_content">
    <div class="single_container">
      <?php if( $single_book_on || $single_video_on ) { ?>
        <p class="read_article">Або читайте статтю:</p>
      <?php } ?>
      <?php the_content(); ?>
    </div>
  </section>

  <?php if ( $single_document_on ) { ?>
    <section class="single_document">
      <div class="single_container">
        <?php if( $single_document_heading ) { ?>
          <h2 class="single_h2 document_heading"><?php echo esc_attr( $single_document_heading ); ?></h2>
        <?php } ?>

        <?php if( $single_document_carousel ) { ?>
          <div class="single_document__wrap">
            <?php 
              $counter = count( $single_document_carousel ); 
            ?>
            <div class="single_document__elem <?php if( $counter > 1 ) { ?>single_document__carousel<?php } ?>">
              <?php foreach( $single_document_carousel as $item ) { 
                $file = $item['single_document_item'];
              ?>
                <div class="single_document__item">
                  <?php echo do_shortcode('[pdf-embedder url="'.$file['url'].'"]' );?>
                </div>
              <?php } ?>
            </div>
          </div>
        <?php } ?>
      </div>
    </section>
  <?php } ?>

  <?php if ( $single_contact_on ) { ?>
    <section class="single_contact">
      <div class="single_container">
        <?php if( $single_contact_elem ) { ?>
          <div class="single_contact__btn_wrap">
            <button class="single_contact__btn_elem">Контакти</button>
          </div>
        <?php } ?>
      </div>

      <?php if( $single_contact_elem ) { ?>
        <div class="single_contact__content single_content">
          <div class="single_container">
            <?php echo wp_specialchars_decode( $single_contact_elem ); ?>
          </div>
        </div>
      <?php } ?>
    </section>
  <?php } ?>
</main>


<?php get_footer(); ?>