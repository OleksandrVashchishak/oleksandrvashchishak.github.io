<a href="<?php the_permalink(); ?>" class="search-resilt-item">
    <div class="blog__img-wrapper">
        <?php echo get_the_post_thumbnail(get_the_ID(), 'post_827x620', array('class' => 'blog__img',)); ?>
    </div>
    <div class="blog__content-wrapper">
        <h5 class="blog__title">
            <?php the_title(); ?>
        </h5>
        <div class="blog__description">

            <?php
            $moreLink = ' […]';
            $my_content = apply_filters('the_content', get_the_content());
            $my_content = wp_strip_all_tags($my_content);
            echo wp_trim_words($my_content, 18, $moreLink);
            ?>

        </div>
     
    </div>
</a>