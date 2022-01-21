<?php
/**
 * The main template file
 *
 *
 *
 * @link
 *
 * @package WordPress
 * @subpackage hattab
 * @since 1.0.0
 */
get_header(); ?>

<div class="mentio__page">
    <div class="wrap">
        <h1 class="title">
            <?= the_title() ?>
        </h1>
        <?php the_post();
        the_content(); ?>
    </div>
</div>

<?php get_footer() ?>
