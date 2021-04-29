<?php get_header();

?>

<main class="main">
  <div class="errorsection">
    <div class="container">
      <div class="row">
        <div class="col-lg-5">
          <p class="pagesubtitle">404</p>
          <h1>Page is not found
          </h1>
          <div class="descr">
            <p>While we`re fixing this error, you can return to the home page. </p>
          </div>
          <a href="<?php echo get_home_url(); ?>" class="submitbtn">
            <svg width="6" height="13" viewBox="0 0 6 13" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M6 6.5L0.749999 12.9952L0.75 0.00480915L6 6.5Z" fill="#B7A179"></path>
            </svg>
            To the home page
          </a>
        </div>
        <div class="col-lg-7">
          <img class="errorpic" src="<?php bloginfo('template_url'); ?>/img/errorpic.jpg" alt="img">
        </div>
      </div>
    </div>
  </div>

</main>

<?php get_footer(); ?>