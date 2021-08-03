<section class="blog-home blog-home-marg container">
    <h3 class="blog-home__title main-title"><?php block_field('title'); ?></h3>
    <p class="blog-home__pretitle main-subtitle"><?php block_field('subtitle'); ?></p>

    <div class="blog-home__wrapper ">
        <?php
        $args = array(
            'post_type'         => 'post',
            'post_status' => 'publish',
            'posts_per_page'    => 4,
            'orderby'     => 'date'
        );

        $mypost_Query = new WP_Query($args);
        if ($mypost_Query->have_posts()) { ?>

            <?php while ($mypost_Query->have_posts()) {
                $mypost_Query->the_post();
                get_template_part('/template-parts/content/content');
            }
            wp_reset_postdata(); ?>
        <?php } ?>
    </div>

</section>