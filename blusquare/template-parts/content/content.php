<div class="blog-home__item blog__item">
    <a href="<?php the_permalink(); ?>" class="blog__img-wrapper">
        <?php echo get_the_post_thumbnail(get_the_ID(), 'post_827x620', array('class' => 'blog__img',)); ?>
    </a>
    <div class="blog__content-wrapper">
        <div class="blog__date-cat">
            <span class="blog__date">
                <?php the_time('F jS, Y') ?>
            </span>
            <div class="blog__category">
                <?php the_category() ?>
            </div>
        </div>
        <a href="<?php the_permalink(); ?>" class="blog__title">
            <?php the_title(); ?>
        </a>
        <div class="blog__description">

            <?php
            $moreLink = ' […]';
            $my_content = apply_filters('the_content', get_the_content());
            $my_content = wp_strip_all_tags($my_content);
            echo wp_trim_words($my_content, 27, $moreLink);
            ?>

        </div>
        <a href="<?php the_permalink(); ?>" class="blog__link-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 2.00098C6.486 2.00098 2 6.48698 2 12.001C2 17.515 6.486 22.001 12 22.001C17.514 22.001 22 17.515 22 12.001C22 6.48698 17.514 2.00098 12 2.00098ZM12 20.001C7.589 20.001 4 16.412 4 12.001C4 7.58998 7.589 4.00098 12 4.00098C16.411 4.00098 20 7.58998 20 12.001C20 16.412 16.411 20.001 12 20.001Z" fill="#FF7474" />
                <path d="M13 7.00098H11V11.001H7V13.001H11V17.001H13V13.001H17V11.001H13V7.00098Z" fill="#FF7474" />
            </svg>
        </a>
    </div>
</div>