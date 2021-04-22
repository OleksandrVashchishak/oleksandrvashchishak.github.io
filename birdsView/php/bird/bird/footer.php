<footer class="footer container">
  <div class="footer__texts">
    <h3 class="footer__title">
      <?php
        if (ICL_LANGUAGE_CODE == 'en') {
          the_field('footer_title', 'option'); 
        } elseif (ICL_LANGUAGE_CODE == 'fi') {
          the_field('footer_title-fi', 'option'); 
        } elseif (ICL_LANGUAGE_CODE == 'se') {
          the_field('footer_title-se', 'option'); 
        }
        ?>
    </h3>
    <p class="footer__year">
      <?php
        if (ICL_LANGUAGE_CODE == 'en') {
          the_field('all_rights_reserved', 'option'); 
        } elseif (ICL_LANGUAGE_CODE == 'fi') {
          the_field('all_rights_reserved-fi', 'option'); 
        } elseif (ICL_LANGUAGE_CODE == 'se') {
          the_field('all_rights_reserved-se', 'option'); 
        }
        ?>
    </p>
  </div>
  <div class="footer__container">
    <div class="footer__left" data-aos="fade-right" data-aos-duration="3000">
      <p class="footer__text">
      <?php
        if (ICL_LANGUAGE_CODE == 'en') {
          the_field('fstring_footer_1', 'option'); 
        } elseif (ICL_LANGUAGE_CODE == 'fi') {
          the_field('fstring_footer_1-fi', 'option'); 
        } elseif (ICL_LANGUAGE_CODE == 'se') {
          the_field('fstring_footer_1-se', 'option'); 
        } 
        ?>

      </p>
      <p class="footer__text">
      <?php
        if (ICL_LANGUAGE_CODE == 'en') {
          the_field('fstring_footer_2', 'option'); 
        } elseif (ICL_LANGUAGE_CODE == 'fi') {
          the_field('fstring_footer_2-fi', 'option'); 
        } elseif (ICL_LANGUAGE_CODE == 'se') {
          the_field('fstring_footer_2-se', 'option'); 
        }
        ?>
    </p>
      <p class="footer__text">
      
      <?php
        if (ICL_LANGUAGE_CODE == 'en') {
          the_field('fstring_footer_3', 'option'); 
        } elseif (ICL_LANGUAGE_CODE == 'fi') {
          the_field('fstring_footer_3-fi', 'option'); 
        } elseif (ICL_LANGUAGE_CODE == 'se') {
          the_field('fstring_footer_3-se', 'option'); 
        }
        ?>
    
    </p>
      <a href=" <?php
        if (ICL_LANGUAGE_CODE == 'en') {
          the_field('footer_link_button', 'option'); 
        } elseif (ICL_LANGUAGE_CODE == 'fi') {
          the_field('footer_link_button-fi', 'option'); 
        } elseif (ICL_LANGUAGE_CODE == 'se') {
          the_field('footer_link_button-se', 'option'); 
        }
        ?>  " class="footer__btn standart-button-link">

      <?php
        if (ICL_LANGUAGE_CODE == 'en') {
          the_field('footer_button', 'option'); 
        } elseif (ICL_LANGUAGE_CODE == 'fi') {
          the_field('footer_button-fi', 'option'); 
        } elseif (ICL_LANGUAGE_CODE == 'se') {
          the_field('footer_button-se', 'option'); 
        }
        ?>
    </a>
    </div>
    <div class="footer__right image__animation-container" data-aos="fade-left" data-aos-duration="3000">
      <img src="<?php the_field('footer_image', 'option') ?>" alt="img" class="footer__img image__animation">
    </div>
  </div>
</footer>


<?php wp_footer(); ?>
<script>
  AOS.init();
</script>
</body>

</html>