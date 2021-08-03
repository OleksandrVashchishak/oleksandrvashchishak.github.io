</main>
<footer class="footer">
    <div class="footer__subscribe container">
        <h3 class="footer_subs-title">
        <?php echo nl2br(esc_html(get_theme_mod('contact_title'))); ?>
        </h3>
        <p class="footer__subs-text"><?php echo nl2br(esc_html(get_theme_mod('contact_subtitle'))); ?></p>
    </div>
    <div class="footer__main">
        <div class="footer__wrapper container">
            <div class="footer__form-wrapper">
                <?php echo do_shortcode('[contact-form-7 id="397" title="subscribe-form"]') ?>
            </div>
            <div class="footer__logo">
                <?php
                the_custom_logo()
                ?>
            </div>
            <div class="footer__bot-wrapper">
                <div class="footer__social">
                    <div class="footer__social-items">
                        <a href="<?php echo nl2br(esc_html(get_theme_mod('twitter-link'))); ?>" class="footer__social-link">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M0 12C0 5.373 5.373 0 12 0C18.627 0 24 5.3715 24 12C24 18.627 18.627 24 12 24C5.373 24 0 18.627 0 12ZM17.979 9.6885C17.979 9.65779 17.9788 9.62709 17.9785 9.59639C17.9764 9.41523 18.06 9.24366 18.2018 9.13093C18.4868 8.90442 18.7509 8.65127 18.99 8.37632C19.1331 8.21182 18.9584 7.97519 18.7496 8.03786C18.525 8.10528 18.3658 7.76766 18.5151 7.58672C18.5891 7.49691 18.658 7.40267 18.7212 7.30443C18.8668 7.07815 18.6102 6.85257 18.3629 6.95863C18.0901 7.07564 17.8067 7.17307 17.5145 7.24909C17.3029 7.30412 17.0842 7.22678 16.9168 7.08629C16.4021 6.65442 15.7379 6.3945 15.015 6.3945C13.383 6.3945 12.06 7.7175 12.06 9.348C12.06 9.68794 11.7971 10.0046 11.4601 9.96036C9.82286 9.74567 8.33396 9.06007 7.13429 8.04354C6.56063 7.55745 5.6475 7.6676 5.6475 8.4195C5.6475 9.10487 5.88112 9.73654 6.2729 10.2382C6.43955 10.4515 6.29301 10.7916 6.03892 10.6981C5.90679 10.6495 5.77903 10.5917 5.65638 10.5255C5.64158 10.5175 5.6235 10.5282 5.6235 10.545C5.6235 11.699 6.28588 12.6989 7.25112 13.1851C7.42661 13.2735 7.4115 13.545 7.215 13.545C6.96262 13.545 6.75801 13.7847 6.87926 14.0061C7.01024 14.2452 7.17335 14.4643 7.36278 14.6575C7.90054 15.2061 8.12435 16.3707 7.3856 16.5814C6.86584 16.7296 6.31699 16.809 5.7495 16.809C5.5765 16.809 5.50168 17.0422 5.6546 17.1231C6.82497 17.7423 8.15739 18.0945 9.573 18.0945C15.0075 18.0945 17.979 13.593 17.979 9.6885Z" fill="#FF7474" />
                            </svg>
                        </a>
                        <a href="<?php echo nl2br(esc_html(get_theme_mod('linkedin-link'))); ?>" class="footer__social-link">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M0 12C0 5.373 5.373 0 12 0C18.627 0 24 5.3715 24 12C24 18.627 18.627 24 12 24C5.373 24 0 18.627 0 12ZM6 16.3125C6 17.1409 6.67157 17.8125 7.5 17.8125C8.32843 17.8125 9 17.1409 9 16.3125V8.8125C9 7.98407 8.32843 7.3125 7.5 7.3125C6.67157 7.3125 6 7.98407 6 8.8125V16.3125ZM7.593 6.669C6.816 6.669 6.1875 6.039 6.1875 5.262C6.1875 4.485 6.8175 3.855 7.593 3.855C8.37 3.8565 9 4.4865 9 5.262C9 6.039 8.37 6.669 7.593 6.669ZM16.5 16.3125C16.5 17.1409 17.1716 17.8125 18 17.8125C18.8284 17.8125 19.5 17.1409 19.5 16.3125V11.412C19.5 7.896 17.4735 7.314 16.5 7.314C15.4554 7.314 14.6188 7.64066 14.0622 7.94994C13.822 8.08346 13.5 7.91908 13.5 7.64421C13.5 7.46101 13.3515 7.3125 13.1683 7.3125H12C11.1716 7.3125 10.5 7.98407 10.5 8.8125V16.3125C10.5 17.1409 11.1716 17.8125 12 17.8125C12.8284 17.8125 13.5 17.1409 13.5 16.3125V11.6623C13.5 11.4352 13.521 11.2055 13.6252 11.0036C13.8228 10.6208 14.2984 10.0275 15.348 10.0275C16.2825 10.0275 16.5 10.56 16.5 11.3205V16.3125Z" fill="#FF7474" />
                            </svg>
                        </a>
                    </div>



                    <p class="footer__information">
                        <?php echo nl2br(esc_html(get_theme_mod('legal-text'))); ?>
                        <a href="<?php echo nl2br(esc_html(get_theme_mod('legal-link'))); ?>" class="footer__information--color inherit-elem ">
                            <?php echo nl2br(esc_html(get_theme_mod('legal-text-for-link'))); ?>
                        </a>
                    </p>
                </div>
                <div class="footer__menu">
                    <?php wp_nav_menu([
                        'theme_location'  => 'footer_menu',
                        'container' => false
                    ]); ?>
                </div>
            </div>
        </div>
    </div>
</footer>


<div class="demo-popup demo-touch-popup">
    <div class="demo-popup__inside">
        <div class="demo-popup__image-block">
            <img src="<?php bloginfo('template_url'); ?>/img/logo.png" alt="" class="demo-popup__logo">
            <img src="<?php bloginfo('template_url'); ?>/img/experince-img.jpg" alt="" class="demo-popup__image">
        </div>
        <div class="demo-popup_form">
            <span class="demo-popup__close demo-touch-popup__close">
                <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M35.498 3.414L32.668 0.585999L18.084 15.172L3.498 0.585999L0.667999 3.414L15.254 18L0.667999 32.586L3.498 35.414L18.084 20.828L32.668 35.414L35.498 32.586L20.912 18L35.498 3.414Z" fill="#FF7474" />
                </svg>
            </span>
            <div class="demo-popup_form__wrapper">
                <h3 class="demo-popup_title">Get a demo</h3>
                <p class="demo-popup_pretitle">We’ll show you all the ropes</p>
                <div class="demo-popup__form">
                    <?php echo do_shortcode('[contact-form-7 id="153" title="contact-form"]') ?>
                </div>
            </div>
        </div>
    </div>
</div>


<?php wp_footer(); ?>
</body>

</html>