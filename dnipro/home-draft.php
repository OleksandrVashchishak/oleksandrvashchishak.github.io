<?php 

  get_header();

  //ACF Variables
  //Hero section
  $hero = get_field('hero_section');
  $hero_bg = $hero['hero_bg'];
  $hero_heading = $hero['main_heading'];
  $hero_type = $hero['type_options'];
  $hero_desc = $hero['description'];
  $hero_btn = $hero['hero_button'];

  //How it works
  $home_works = get_field('home_works');
  $hiw_heading = $home_works['hiw_heading'];
  $hiw_steps = $home_works['hiw_steps'];
  $hiw_boxes = $home_works['hiw_boxes'];
  $hiw_button = $home_works['hiw_button'];
  $hiw_button_label = $home_works['hiw_button_label'];

  //Inside section
  $home_inside = get_field('home_inside');
  $inside_bg = $home_inside['inside_bg'];
  $inside_heading = $home_inside['inside_heading'];
  $inside_list = $home_inside['inside_list'];
  $inside_button = $home_inside['inside_button'];

  //Carousel section
  $home_carousel = get_field('home_carousel');
  $carousel_heading = $home_carousel['carousel_heading'];
  $carousel_description = $home_carousel['carousel_description'];
  $carousel_block = $home_carousel['carousel_block'];
  $carousel_button = $home_carousel['carousel_button'];

  //Why us section
  $home_why = get_field('home_why');
  $why_heading = $home_why['why_heading'];
  $why_img = $home_why['why_img'];
  $why_list = $home_why['why_list'];
  $why_btn = $home_why['why_btn'];

  //Contact home
  $home_contact = get_field('home_contact');
  $contact_heading = $home_contact['heading'];
  $contact_desc = $home_contact['description'];
  $contact_form = $home_contact['form_shortcode'];

?>

<main class="dspdmr_main">
  <section class="home_hero" <?php if( $hero_bg ) { ?> style="background: url('<?php echo esc_url( $hero_bg ); ?>')" <?php } ?>>
    <div class="default_container">
      <div class="home_hero__heading">
        <?php if ( $hero_heading ) { ?>
          <h1><?php echo esc_attr( $hero_heading ); ?></h1>
        <?php } ?>

        <?php if ( $hero_type ) { ?>
          <p class="typer_elem">
            <script>
              jQuery(".typer_elem").typer({
                strings: [
                  <?php foreach( $hero_type as $item ) { 
                    $text = $item['type_item']; ?>
                    <?php echo '"'.esc_attr( $text ).'",'; ?>
                  <?php } ?>
                ],
                typeSpeed: 80,
                backspaceSpeed: 40,
                backspaceDelay: 800,
                repeatDelay: 1000,
                repeat: true,
                autoStart: true,
                startDelay: 50,
              });
            </script>
          </p>
        <?php } ?>
      </div>

      <?php if( $hero_desc ) { ?>
        <div class="home_hero__desc">
          <?php echo wp_specialchars_decode( $hero_desc ); ?>
        </div>
      <?php } ?>

      <?php if ( $hero_btn ) { 
        $button_url = $hero_btn['url'];
        $button_title = $hero_btn['title'];
        $button_target = $hero_btn['target'] ? $link['target'] : '_self';
      ?>
        <a class="home_hero__btn" href="<?php echo esc_url( $button_url ); ?>" target="<?php echo esc_attr( $button_target ); ?>"><?php echo esc_html( $button_title ); ?></a>
      <?php } ?>
    </div>

    <button class="next_section_btn"><i class="fas fa-chevron-down"></i></button>
  </section>
  
  <section id="home_hiw" class="home_hiw">
    <div class="default_container">
      <?php if( $hiw_heading ) { ?>
        <h2 class="hiw_heading"><?php echo esc_attr( $hiw_heading ); ?></h2>
      <?php } ?>

      <?php if( $hiw_steps ) { ?>
        <div class="hiw_steps">
          <?php foreach( $hiw_steps as $item ) { 
            $item_heading = $item['hiw_step_item'];  
          ?>
            <span class="hiw_steps__item"><?php echo esc_attr( $item_heading ); ?></span>
          <?php } ?>
        </div>
      <?php } ?>

      <?php if( $hiw_boxes ) { ?>
        <div class="hiw_boxes">
          <div class="hiw_boxes__row">
            <?php foreach( $hiw_boxes as $item ) { 
              $image = $item['image'];
              $heading = $item['heading'];
              $desc = $item['description'];
            ?>

              <div class="hiw_boxes__item">
                <?php if( $image ) { ?>
                  <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>">
                <?php } ?>

                <?php if( $heading ) { ?>
                  <h3 class="hiw_boxes__heading"><?php echo esc_attr( $heading ); ?></h3>
                <?php } ?>

                <?php if( $desc ) { ?>
                  <p class="hiw_boxes__desc"><?php echo esc_attr( $desc ); ?></p>
                <?php } ?>
              </div>
              
            <?php } ?>
          </div>
        </div>
      <?php } ?>
      
      <?php if ( $hiw_button ) { 
        $button_url = $hiw_button['url'];
        $button_title = $hiw_button['title'];
        $button_target = $hiw_button['target'] ? $link['target'] : '_self';
      ?>
        <a class="hiw_button" href="<?php echo esc_url( $button_url ); ?>" target="<?php echo esc_attr( $button_target ); ?>"><?php echo esc_html( $button_title ); ?></a>
      <?php } ?>

      <?php if ( $hiw_button_label ) { ?>
        <span class="hiw_button_label"><?php echo wp_specialchars_decode( $hiw_button_label ); ?></span>
      <?php } ?>
    </div>
  </section>

  <section id="inside_box" class="home_inside" <?php if( $inside_bg ) { ?> style="background: url('<?php echo esc_url( $inside_bg ); ?>')" <?php } ?>>
    <div class="default_container">
      <div class="home_inside__row">
        <?php if ( $inside_heading ) { ?>
          <h2 class="home_inside__heading big_heading"><?php echo esc_attr( $inside_heading ); ?></h2>
        <?php } ?>

        <?php if( $inside_list ) { ?>
          <ul class="home_inside__list">
            <?php foreach( $inside_list as $item ) { 
              $list_item = $item['inside_list_item'];
            ?>
              <li><i class="fas fa-check"></i> <?php echo esc_attr( $list_item ); ?></li>
            <?php } ?>
          </ul>
        <?php } ?>

        <?php if ( $inside_button ) { 
          $button_url = $inside_button['url'];
          $button_title = $inside_button['title'];
          $button_target = $inside_button['target'] ? $link['target'] : '_self';
        ?>
          <a class="inside_btn" href="<?php echo esc_url( $button_url ); ?>" target="<?php echo esc_attr( $button_target ); ?>"><?php echo esc_html( $button_title ); ?></a>
        <?php } ?>
      </div>
    </div>
  </section>

  <section id="benefits" class="home_carousel">
    <div class="default_container">
      <?php if ( $carousel_heading ) { ?>
        <h2 class="home_carousel__heading big_heading"><?php echo esc_attr( $carousel_heading ); ?></h2>
      <?php } ?>

      <?php if ( $carousel_description ) { ?>
        <p class="home_carousel__desc"><?php echo esc_attr( $carousel_description ); ?></p>
      <?php } ?>

      <?php if( $carousel_block ) { ?>
        <div class="home_carousel__elem">
          <?php foreach( $carousel_block as $item ) { 
            $img = $item['image'];
            $heading = $item['heading'];
            $color = $item['color'];
          ?>

            <div class="carousel_item">
              <?php if( $img ) { ?>
                <div class="carousel_img">
                  <img src="<?php echo esc_url( $img['url'] ); ?>" alt="<?php echo esc_attr( $img['alt'] ); ?>">
                </div>
              <?php } ?>

              <?php if( $heading ) { ?>
                <span class="carousel_label" style="background-color: <?php echo esc_attr( $color ); ?>"><?php echo esc_attr( $heading ); ?></span>
              <?php } ?>
            </div>
            
          <?php } ?>
          </div>
      <?php } ?>

      <?php if ( $carousel_button ) { 
        $button_url = $carousel_button['url'];
        $button_title = $carousel_button['title'];
        $button_target = $carousel_button['target'] ? $link['target'] : '_self';
      ?>
        <a class="carousel_btn" href="<?php echo esc_url( $button_url ); ?>" target="<?php echo esc_attr( $button_target ); ?>"><?php echo esc_html( $button_title ); ?></a>
      <?php } ?>
    </div>
  </section>

  <section id="home_why" class="home_why">
    <div class="default_container">
      <?php if ( $why_heading ) { ?>
        <h3 class="home_why__heading big_heading"><?php echo wp_specialchars_decode( $why_heading ); ?></h3>
      <?php } ?>

      <div class="home_why__row">
        <?php if ( $why_img ) { ?>
          <div class="home_why__left">
            <img src="<?php echo esc_url( $why_img['url'] ); ?>" alt="<?php echo esc_attr( $why_img['alt'] ); ?>">
          </div>
        <?php } ?>

        <div class="home_why__right">
          <?php if ( $why_list ) { ?>
            <div class="why_us__list">
              <?php foreach( $why_list as $item ) { 
                $icon = $item['icon'];
                $heading = $item['heading'];
                $description = $item['description'];
              ?>

              <div class="why_us__list_item">
                <div class="why_us__list_heading">
                  <?php if( $icon ) { ?>
                    <img src="<?php echo esc_url( $icon['url'] ); ?>" alt="<?php echo esc_attr( $icon['alt'] ); ?>">
                  <?php } ?>
                  <?php if( $heading ) { ?>
                    <h4><?php echo esc_attr( $heading ); ?></h4>
                  <?php } ?>
                </div>

                <?php if( $description ) { ?>
                  <div class="why_us__list_description">
                    <p><?php echo esc_attr( $description ); ?></p>
                  </div>
                <?php } ?>
              </div>
              <?php } ?>
            </div>
          <?php } ?>

          <?php if ( $why_btn ) { 
            $button_url = $why_btn['url'];
            $button_title = $why_btn['title'];
            $button_target = $why_btn['target'] ? $link['target'] : '_self';
          ?>
            <div class="why_btn__wrap">
              <a class="why_btn" href="<?php echo esc_url( $button_url ); ?>" target="<?php echo esc_attr( $button_target ); ?>"><?php echo esc_html( $button_title ); ?></a>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </section>

  <section class="home_contact">
    <div class="default_container">
      <?php if ( $contact_heading ) { ?>
        <h3 class="home_contact__heading medium_heading"><?php echo wp_specialchars_decode( $contact_heading ); ?></h3>
      <?php } ?>

      <?php if ( $contact_desc ) { ?>
        <p class="home_contact__desc"><?php echo wp_specialchars_decode( $contact_desc ); ?></p>
      <?php } ?>

      <?php if ( $contact_form ) { ?>
        <div class="sign_form">
          <?php echo do_shortcode( $contact_form ); ?>
        </div>
      <?php } ?>
    </div>
  </section>

</main>


<?php get_footer(); ?>