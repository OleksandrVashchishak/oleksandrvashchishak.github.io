EDIT POPUP - "JOIN THE TEAM"
<div class="demo-popup join-team-popup">
    <div class="demo-popup__inside">
        <div class="demo-popup__image-block">
            <img src="<?php bloginfo('template_url'); ?>/img/logo.png" alt="" class="demo-popup__logo">
            <img src="<?php block_field('image'); ?>" alt="" class="demo-popup__image">
        </div>
        <div class="demo-popup_form">
            <span class="demo-popup__close join-team-popup__close">
                <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M35.498 3.414L32.668 0.585999L18.084 15.172L3.498 0.585999L0.667999 3.414L15.254 18L0.667999 32.586L3.498 35.414L18.084 20.828L32.668 35.414L35.498 32.586L20.912 18L35.498 3.414Z" fill="#FF7474" />
                </svg>
            </span>
            <div class="demo-popup_form__wrapper">
                <h3 class="demo-popup_title"><?php block_field('title'); ?></h3>
                <p class="demo-popup_pretitle"><?php block_field('subtitle'); ?></p>
                <div class="demo-popup__form">
                    <?php echo do_shortcode('[contact-form-7 id="153" title="contact-form"]') ?>
                </div>
            </div>
        </div>
    </div>
</div>