<?php
/**
 * Template Name: Videos page
 **/
get_header() ;

if (!is_user_logged_in()) {
    wp_redirect(get_site_url() . '/');
}

?>
<div class="video-page">
    <div class="video-page__top">
        <div class="video-page__container">
            <div class="video-page__top-logo">
                <svg width="310" height="80" viewBox="0 0 310 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M119.44 20L127.96 45.2C128.84 47.76 129.84 48.48 131.32 48.48C132.8 48.48 133.84 47.76 134.68 45.2L142.8 20H138.92L131.32 43.12H131.24L123.36 20H119.44ZM148.547 48V20H144.787V48H148.547ZM157.214 48V23.52H159.494C165.814 23.52 170.334 27.84 170.334 34C170.334 39.92 166.094 44.48 160.854 44.48H158.814V48H160.534C168.454 48 174.254 41.52 174.254 34C174.254 26.48 168.454 20 160.534 20H153.454V48H157.214ZM193.907 31.76H180.387C180.547 28.96 184.067 23.52 191.387 23.52H193.907V20H190.947C182.547 20 176.467 26.08 176.467 34C176.467 41.92 182.547 48 190.947 48H193.907V44.48H190.267C185.387 44.48 180.707 40.56 180.387 35.28H193.907V31.76ZM186.387 18.4H189.107L194.307 12.72H189.987L186.387 18.4ZM196.467 34C196.467 42.08 203.187 48.48 211.107 48.48C219.027 48.48 225.747 42.08 225.747 34C225.747 25.92 219.027 19.52 211.107 19.52C203.187 19.52 196.467 25.92 196.467 34ZM200.387 34C200.387 28.04 204.907 23.04 211.107 23.04C217.307 23.04 221.827 28.04 221.827 34C221.827 39.96 217.307 44.96 211.107 44.96C204.907 44.96 200.387 39.96 200.387 34ZM227.64 48H237.92C242.88 48 245.68 45 245.68 40.52C245.68 32 231.6 32 231.6 26.84C231.6 24.68 232.92 23.52 235 23.52H244.44V20H235.52C231.12 20 227.84 22.48 227.84 27.04C227.84 35.36 241.92 35.12 241.92 40.84C241.92 43.28 240.56 44.48 237.24 44.48H227.64V48Z" fill="white" />
                    <rect width="80" height="80" fill="#E82F2F" />
                    <path d="M80 23.5148C55.4343 52.7055 16.431 59.4626 0 59.1923V0H80V23.5148Z" fill="#E95E40" />
                </svg>
            </div>
        </div>
        <div class="video-page__top-video">
            <iframe src="https://player.vimeo.com/video/<?php the_field('video_id') ?>?controls=0&" frameborder="0" allowfullscreen allow="autoplay"></iframe>
        </div>
        <div class="video-page__top-btns">
            <span class="video-page__top-btn-play">
                <img src="<?php bloginfo('template_url'); ?>/img/Play.svg" alt="play">
            </span>
        </div>
    </div>
</div>


<div class="video-page__container my-container">
    <div class="video-page__category">
        <?php
        $args = array(
            'taxonomy' => 'video-category',
            'orderby' => 'name',
            'order'   => 'ASC'
        );

        $cats = get_categories($args);

        foreach ($cats as $cat) {
        ?>
            <span data-slug="<?php echo $cat->slug ?>">
                <?php echo $cat->name; ?>
            </span>

        <?php
        }
        ?>
    </div>
    <div class="video-page__wrapper">
        <?php
        $args = array(
            'post_type'         => 'video',
            'publish'           => true,
            'posts_per_page'    => -1,
            'orderby'     => 'date',
        );
        $the_query = new WP_Query($args);
        if ($the_query->have_posts()) { ?>

            <?php while ($the_query->have_posts()) {
                $the_query->the_post();
                get_template_part('template-parts/video-item');
            }
            wp_reset_postdata(); ?>
        <?php } ?>
        <div class="video-page__item-empty video-page__item"></div>
        <div class="video-page__item-empty video-page__item"></div>

    </div>
</div>

<div class="video-popup__ovarlay">
    <div class="video-popup__wrapper">
        <div class="video-popup__close">
            <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M29 29L1 1M1 29L29 1L1 29Z" stroke="#949494" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </div>
        <div class="video-popup__video">
            <iframe src="https://player.vimeo.com/video/540122904?controls=1&" frameborder="0" allowfullscreen allow="autoplay"></iframe>


        </div>
        <span class="video-popup__date">12 Mai 2022</span>
        <h3 class="video-popup__title">Lorem ipsum dolor sit amet, consectetur adipiscing </h3>
    </div>
</div>


<?php get_footer() ?>

<script>
    // START VIDEOS
    if (document.querySelector('.video-page__top-btn-play')) {
        const playBtn = document.querySelector('.video-page__top-btn-play')
        const video = document.querySelector('.video-page__top-video iframe')
        const videoSrc = video.getAttribute('src');
        playBtn.addEventListener('click', () => {
            playBtn.style.display = 'none'
            video.setAttribute('src', `${videoSrc}autoplay=1&controls=1`);
        })
    }

    if (document.querySelector('.video-page__wrapper')) {
        const taxonomy = document.querySelectorAll('.video-page__category span')
        taxonomy.forEach(e => {
            e.addEventListener('click', () => {
                const slug = e.getAttribute('data-slug');
                getTaxonomy(slug)
                taxonomy.forEach(el => {
                    el.classList.remove('active')
                })
                e.classList.add('active')
            })
        })

        const getTaxonomy = (slug) => {
            const data = {
                'action': 'getTaxonomy',
                'taxonomySlug': slug,
            }
            $.ajax({
                url: '/wp-admin/admin-ajax.php',
                data: data,
                type: 'POST',
                success: function(data) {
                    if (data) {
                        document.querySelector('.video-page__wrapper').innerHTML = data
                        getVideoPopup()
                    }
                }
            });
        }

        const videoPopup = document.querySelector('.video-popup__ovarlay')
        const videoClose = document.querySelector('.video-popup__close')
        const videoIframe = document.querySelector('.video-popup__video iframe')
        const videoDate = document.querySelector('.video-popup__date')
        const videoTitle = document.querySelector('.video-popup__title')

        const getVideoPopup = () => {
            const btnsPlay = document.querySelectorAll('.video-page__video-btn')
            btnsPlay.forEach(e => {
                e.addEventListener('click', () => {
                    const videoItem = e.parentElement.parentElement
                    const videoLink = videoItem.querySelector('iframe').getAttribute('src')
                    videoPopup.classList.add('active')
                    videoTitle.textContent = videoItem.querySelector('.video-page__title').textContent
                    videoDate.textContent = videoItem.querySelector('.video-page__date').textContent
                    videoIframe.setAttribute('src', `${videoLink}&autoplay=1&controls=1`)
                })
            })
        }
        getVideoPopup()

        videoClose.addEventListener('click', () => {
            videoPopup.classList.remove('active')
        })


        videoPopup.addEventListener('click', () => {
            videoPopup.classList.remove('active')
        })

    }
</script>