<div class="video-page__item">
    <div class="video-page__video">
        <span class="video-page__video-btn">
            <img src="<?php bloginfo('template_url'); ?>/img/Play.svg" alt="play">
        </span>
        <iframe src="https://player.vimeo.com/video/<?php the_field('video', get_the_ID()) ?>?controls=0&" frameborder="0" allowfullscreen allow="autoplay"></iframe>
    </div>
    <span class="video-page__date"><?php the_time('d.m.Y') ?></span>
    <h3 class="video-page__title"><?php the_title(); ?></h3>
</div>