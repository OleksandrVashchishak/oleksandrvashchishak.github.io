<?php 
  //ACF Variables
  $header = get_field('social_header_group', 'option');
  $instagram = $header['instagram'];
  $facebook = $header['facebook'];
  $youtube = $header['youtube'];
?>

<footer class="dspdmr_footer">
  <div class="dspdmr_footer__container">
    <div class="footer_copyright">
      <p>@ <?php echo do_shortcode( '[current_year]' ); ?> Департамент соціальної політики Дніпровської міської ради</p>
    </div>
    <div class="dspdmr_header__social">
      <div class="dspdmr_header__social_icons">
        <?php if( $instagram ) { ?>
          <a class="social_link inst" href="<?php echo esc_url( $instagram ); ?>" target="_blank"><i class="fab fa-instagram"></i></a>
        <?php } ?>

        <?php if( $facebook ) { ?>
          <a class="social_link fb" href="<?php echo esc_url( $facebook ); ?>" target="_blank"><i class="fab fa-facebook-square"></i></a>
        <?php } ?>

        <?php if( $youtube ) { ?>
          <a class="social_link youtube" href="<?php echo esc_url( $youtube ); ?>" target="_blank"><i class="fab fa-youtube"></i></a>
        <?php } ?>
      </div>
    </div>
  </div>
</footer>

<div id="contact_popup" class="popup_form white-popup mfp-hide">
  <?php echo do_shortcode('[contact-form-7 id="690" title="Контактна форма"]'); ?>
</div>

<?php wp_footer(); ?>
</body>
</html>