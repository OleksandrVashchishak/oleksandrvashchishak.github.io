<?php get_header() ?>
<style>
    .preloader_front_page {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 99;
        background: #ffffff;
        flex-direction: column;
    }

    .preloader_front_page .read_line {
        -webkit-mask-image: url(<?= get_template_directory_uri() ?>/img/preload_front.png);
        -webkit-mask-repeat: no-repeat;
        -webkit-mask-position: left top;
        -webkit-mask-size: 100% 100%;
        width: 100%;
        height: 100%;
        position: absolute;
        background: #E82F2F;
        top: 0;
        left: 0;
    }
    .preloader_front_page .read_line:after {
        content: '';
        width: 100%;
        height: 100%;
        background: #ffffff;
        animation-duration: 2.2s;
        animation-delay: 0.2s;
        animation-name: preloader-line;
        animation-fill-mode: forwards;
        position: absolute;
        transition: all .5s;
        right: 0;
        top: 0;
    }
    @keyframes preloader-line {
        0% {
            transform: translateX(0);
        }
        100% {
            transform: translateX(110%);
        }
    }

    @keyframes opacity_leater {
        0% {
            opacity: 0;
        }
        100% {
            opacity: 1;
        }
    }

    @keyframes fill_red {
        0% {
            fill: transparent;
        }
        100% {
            fill: #FF0014;
            stroke: transparent;
        }
    }

    .preloader_front_page path {
        opacity: 0;
        animation-duration: .5s;
        animation-delay: 4.5s;
        animation-name: opacity_leater;
        animation-fill-mode: forwards;
    }

    .preloader_front_page path:nth-child(1) {
        animation-delay: 3.5s;
    }

    .preloader_front_page path:nth-child(2) {
        stroke: #FF0014;
        animation-delay: 2.5s, 3s;
        animation-duration: .5s, 1s;
        fill: transparent;
        animation-name: opacity_leater, fill_red;
    }

    .preloader_front_page path:nth-child(3), .preloader_front_page path:nth-child(4) {
        animation-delay: 4s;
    }
</style>
<div class="preloader_front_page">
    <svg width="77" height="75" viewBox="0 0 77 75" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M76.583 16.3572V0H0V54.0945C11.5535 53.5482 63.2624 49.2754 76.583 16.3572Z" fill="#FF5E3C"/>
        <path d="M0 54.0947V74.211H76.583V16.3574C63.2624 49.2757 11.5535 53.5484 0 54.0947Z" fill="#FF0014"/>
        <path d="M27.0958 13.8296H23.3428V60.3815H27.0958V13.8296Z" fill="white"/>
        <path d="M26.3472 14.5469H24.0752V59.6718H26.3472V14.5469Z" fill="white"/>
        <path d="M34.9541 60.3815V27.8221C34.9541 18.7302 40.8865 13.8296 46.4655 13.8296H56.3024V17.5805H47.2986C42.3759 17.5805 38.9343 21.8451 38.9343 27.9525V35.2342H56.294V38.9851H38.9427V60.3815H34.9541Z" fill="white"/>
        <path d="M38.2035 59.6635H35.6875V27.8217C35.6875 19.056 41.317 14.5386 46.4668 14.5386H55.5716V16.8625H47.3083C41.7966 16.8625 38.2119 21.6327 38.2119 27.9521V35.9432H55.5716V38.2671H38.2035V59.6635Z" fill="white"/>
    </svg>

    <div class="read_line">

    </div>
</div>
<div class="wrapper_h1_front">
    <section class="top-slider">
		<?php $top_slider = get_field( 'slider' );
		foreach ( $top_slider as $item ) { ?>
            <div class="img" style="background-image: url('<?= $item['url'] ?>')">

            </div>
		<?php } ?>
    </section>
    <div class="wrapper-h1">
        <h1><?= get_field( 'h1_front' ) ?></h1>
    </div>
</div>
<section class="cycle" id="accueil">
	<?php $programme = new WP_Query( array(
		'post_type'      => 'programme',
		'posts_per_page' => - 1,
		'order'          => 'ASC',
	) );
	foreach ( $programme->posts as $key => $item ) { ?>
        <div class="item">
            <div>
                <div class="title"><?= $item->post_title ?></div>
                <div class="duration">
					<?= get_field( 'duration', $item->ID ) ?>
                </div>
                <div class="date">
					<?php if ( get_field( 'en_anglais', $item->ID ) ) { ?>
                        <div class="item-date"><?= __('En Anglais','front_page') ?></div>
					<?php }
					$date = get_field( 'date_array', $item->ID );
					foreach ( $date as $key_date => $item_date ) { ?>
                        <div class="item-date"><?= $item_date['date'] ?></div>
						<?php if ( $key_date != count( $date ) - 1 ) { ?>
                            <p><?= __('ou','front_page') ?></p>
						<?php } ?>
					<?php } ?>
                </div>
            </div>
            <div>
                <div class="calendar"
                     data-title="<?= get_field( 'title', $item->ID ) ?>"
                     data-location="51 bis, rue Saint Sébastien, 13006 Marseille"
                     <?php
                     $objDateTime =  new DateTime(get_field( 'calerdar_date_start', $item->ID ));
                     ?>
                     data-start="<?= $objDateTime->format(DateTime::ISO8601); ?>"
	                <?php
	                $objDateTime =  new DateTime(get_field( 'calerdar_date_end', $item->ID ));
	                ?>
                     data-end="<?= $objDateTime->format(DateTime::ISO8601); ?>"
                ><?= __('Ajouter à votre calendrier','front_page') ?></div>
                <form class="wrapper-btn" action="<?= site_url() ?>/inscription" method="post" id="date_single">
                    <input hidden name="cycle" value="<?= get_the_title( $item->ID ) ?>">
                    <input class="btn-link" name="date" type="radio" value="<?= $date[0]['date'] ?>" checked="">
                    <button class="btn-link"><span><?= __("S'inscrire",'front_page') ?></span></button>
                </form>
            </div>
        </div>
	<?php } ?>
</section>
<section class="book">
    <div class="wrap-book">
        <div>
            <img src="<?= get_field( 'book_logo' )['url'] ?>">
            <p><?= get_field( 'book_text' ) ?></p>
        </div>
        <img class="book-img" src="<?= get_field( 'book_img' )['url'] ?>">
    </div>
    <div class="wrapper-btn">
        <a class="btn-link" href="https://quintessence-koubi.com/facettes-en-ceramique/" target="_blank"><span><?php esc_attr_e( 'Découvrir', 'mediweb' ); ?></span></a>
        <a class="btn-link" href="https://quintessence-koubi.com/passer-votre-commande/" target="_blank"><span><?php esc_attr_e( 'Commander', 'mediweb' ); ?></span></a>
    </div>
</section>
<section class="programme" id="programe">
    <div class="title-section"><span><?= __('PROGRAMME','front_page') ?></span></div>
    <div class="wrap-item">
		<?php foreach ( $programme->posts as $item ) { ?>
            <div class="item">
                <div class="description">
                    <div class="title"><?= $item->post_title ?></div>
                    <div class="sub_title"><?= get_field( 'title', $item->ID ) ?></div>
                    <ul>
						<?php $list = get_field( 'list_front_page', $item->ID );
						foreach ( $list as $li ) { ?>
                            <li><?= $li['li'] ?></li>
						<?php } ?>
                    </ul>
                    <div class="wrapper-btn">
						<?php $date = get_field( 'date_array', $item->ID );
						foreach ( $date as $key_date => $item_date ) { ?>
                            <form class="wrapper-btn" action="<?= get_the_permalink( $item->ID ) ?>" method="post">
                                <input hidden name="cycle" value="<?= get_the_title( $item->ID ) ?>">
                                <input class="btn-link" name="date" type="radio" value="<?= $item_date['date'] ?>" checked="">
                                <button class="btn-link"><span><?= $item_date['date'] ?></span></button>
                            </form>
							<?php if ( $key_date != count( $date ) - 1 ) { ?>
                                <p><?= __('ou','front_page') ?></p>
							<?php } ?>
						<?php } ?>
                    </div>
                </div>
                <div class="images">
                    <img src="<?= get_field( 'image', $item->ID )['url'] ?>">
                </div>
            </div>
		<?php } ?>
    </div>
</section>
<section class="about">
    <div class="image">
        <img src="<?= get_field( 'image_about' )['url'] ?>">
    </div>
    <div class="wrap-description">
        <div>
            <div class="name"><?= get_field( 'name' ) ?></div>
            <div class="description"><?= get_field( 'description_about' ) ?></div>
            <a class="btn-link" href="<?= get_the_permalink( 197 ) ?>"><span><?= __('','front_page') ?><?php esc_attr_e( 'Découvrir', 'mediweb' ); ?></span></a>
        </div>
    </div>
</section>
<section class="cliniques">
    <div class="wrap-cliniques">
        <div class="title"><?= get_field( 'title_cliniques' ) ?></div>
        <div class="sub_title"><?= get_field( 'sub_title_cliniques' ) ?></div>
        <ul>
			<?php $list = get_field( 'list_cliniques' );
			foreach ( $list as $li ) { ?>
                <li><?= $li['li'] ?></li>
			<?php } ?>
        </ul>
        <a class="btn-link" href="<?= get_the_permalink( 127 ) ?>"><span><?= __('','front_page') ?><?php esc_attr_e( 'Découvrir', 'mediweb' ); ?></span></a>
    </div>
    <div class="slider-cliniques">
		<?php $slider_cliniques = get_field( 'slider_cliniques' );
		foreach ( $slider_cliniques as $item ) { ?>
            <div class="img">
                <img src="<?= $item['url'] ?>">
            </div>
		<?php } ?>
    </div>
</section>
<section class="coaching">
    <div class="wrap-cliniques">
        <div class="title"><?= get_field( 'title_coaching' ) ?></div>
        <div class="description">
			<?= get_field( 'description_coaching' ) ?>
        </div>
        <!--        <a class="btn-link" href="#"><span>Découvrir</span></a>-->
    </div>
    <div class="image">
        <img src="<?= get_field( 'image_coach' )['url'] ?>">
    </div>
</section>
<section class="slider-two">
	<?php $slider_last = get_field( 'slider_last' );
	foreach ( $slider_last as $item ) { ?>
        <div class="img">
            <img src="<?= $item['url'] ?>">
        </div>
	<?php } ?>
</section>
<section class="amis" id="nos_amis">
    <div class="title-section"><span><?= __('NOS AMIS','front_page') ?></span></div>
    <div class="sub_title"><?= get_field( 'sub_title_amis' ) ?></div>
    <div class="links">
		<?php $links = get_field( 'links' );
		foreach ( $links as $link ) {
			?>
            <a target="_blank" href="<?= $link['link'] ?>"><img src="<?= $link['image']['url'] ?>"></a>
		<?php } ?>
    </div>
</section>
<section class="contact" id="contact">
    <div class="wrap-contact">
        <div class="left">
            <div class="first-wrap">
                <div class="title"><?= get_field( 'title_contact' ) ?></div>
                <div class="text-after-title"><?= get_field( 'after_title_contact' ) ?></div>
            </div>
            <div class="last-wrap">
                <div class="title"><?= __('Contact','front_page') ?></div>
                <div class="icons">
                    <div class="contact-wrap">
						<?php $contact_icon = get_field( 'contact_icon' );
						foreach ( $contact_icon as $item ) { ?>
                            <a href="<?= $item['link'] ?>" target="_blank" class="item">
                                <div class="icon" style="background-image: url('<?= $item['icon']['url'] ?>')"></div>
                                <div class="text"><?= $item['text'] ?></div>
                            </a>
						<?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="right">
			<?= do_shortcode( '[contact-form-7 id="5" title="Contact form 1"]' ) ?>
        </div>
    </div>
</section>
<script>
    if (sessionStorage.getItem('dontLoad_front') == null) {
        sessionStorage.setItem('dontLoad_front', 'true');
        $(document).ready(function () {
            setTimeout(function () {
                $('.preloader_front_page').fadeOut();
                $('body').addClass('load');
            }, 5000);
        });
    } else {
        $('.preloader_front_page').css('display', 'none');
    }
</script>
<script type="text/javascript">
    var CLIENT_ID = '388417836060-be0hqemj53o8n876matoullo7te8bia9.apps.googleusercontent.com';
    var API_KEY = 'AIzaSyBK-8tf4yQQeH7W9rwIqdLy3YmXvwrVaZw';
    var DISCOVERY_DOCS = ["https://www.googleapis.com/discovery/v1/apis/calendar/v3/rest"];
    var SCOPES = "https://www.googleapis.com/auth/calendar.events";
    function handleClientLoad() {
        gapi.load('client:auth2', initClient);
    }
    function initClient() {
        gapi.client.init({
            apiKey: API_KEY,
            clientId: CLIENT_ID,
            discoveryDocs: DISCOVERY_DOCS,
            scope: SCOPES
        }).then(function () {
            // Listen for sign-in state changes.
        }, function(error) {
            appendPre(JSON.stringify(error, null, 2));
        });
    }
</script>
<script async defer src="https://apis.google.com/js/api.js"
        onload="this.onload=function(){};handleClientLoad()">
</script>
<?php get_footer() ?>
