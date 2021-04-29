<div class="modal-tywrapp">
  <div class="thanksection">
    <button class="closemodalbtn"><img src="<?php bloginfo('template_url'); ?>/img/close.svg" alt="close"></button>
    <div class="thanksection__descr">
      <div class="descrwrapp">
        <p class="title"><?php the_field('title-thank_optiontheme', 'option');  ?></p>
        <p class="descr"><?php the_field('text_sub_title_optiontheme', 'option');  ?></p>
        <a href="<?php the_field('button_link_optiontheme', 'option');  ?>" class="submitbtn">
          <svg width="6" height="13" viewBox="0 0 6 13" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M6 6.5L0.749999 12.9952L0.75 0.00480915L6 6.5Z" fill="#B7A179"></path>
          </svg>
          <?php the_field('button_text_optiontheme', 'option');  ?>
        </a>
      </div>
    </div>
    <div class="thanksection__pic">
      <img src="<?php the_field('image_optiontheme', 'option');  ?>" alt="image">
    </div>
  </div>
</div>

<footer class="footer">
  <div class="container">
    <p><?php the_field('footer_text_optiontheme', 'option');  ?></p>
  </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>