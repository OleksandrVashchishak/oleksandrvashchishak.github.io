<section class="about-contact" id="contact">
    <div class="container">
        <div class="about-contact__left">
            <div class="demo-popup_form__wrapper">
                <h4 class="demo-popup_title"><?php block_field('contact-form-title'); ?></h4>
                <p class="demo-popup_pretitle"><?php block_field('contact-form-subtitle'); ?></p>
                <div class="demo-popup__form">
                    <?php
                     echo do_shortcode('[contact-form-7 id="153" title="contact-form"]')
                      ?>
                </div>
            </div>
        </div>
        <div class="about-contact__right">


                <?php
                if (block_rows('repeater')) :
                    while (block_rows('repeater')) :
                        block_row('repeater');
                ?>
                            <div class="about-contact__item">
                        <h5 class="about-contact__title">
                            <?php block_sub_field('title'); ?>
                        </h5>
                        <div class="about-contact__text">
                            <?php block_sub_field('text'); ?>
                    </div>
                        <a href="mailto:<?php block_sub_field('email'); ?>" class="about-contact__mail">
                            <?php block_sub_field('email'); ?>
                        </a>
            </div>
  

                <?php
                    endwhile;
                endif;
                reset_block_rows('repeater');
                ?>


        </div>

    </div>
</section>