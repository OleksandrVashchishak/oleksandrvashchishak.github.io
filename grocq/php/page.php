<?php get_header(); ?>


<div class="single-thumb container">
    <?php the_post_thumbnail(); ?>
</div>
<section class="single container">
    <h1 class="single__title">
        <?php the_title() ?>
    </h1>
    <?php the_content() ?>

</section>


<div class="container">
    <a href="<?php echo home_url(); ?>#traitm" class="single__btn  main-btn"><span><span>Retour</span></span></a>
</div>

<?php get_footer(); ?>