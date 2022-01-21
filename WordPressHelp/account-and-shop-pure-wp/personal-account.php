<?php

/**
 * Template Name: Presonal account
 **/
get_header();


if (!is_user_logged_in()) {
    wp_redirect(get_site_url() . '/login-page/');
}

get_header();

get_template_part('header-menu');


$template_url = get_template_directory_uri();

$curr_user = wp_get_current_user();
$user_id = $curr_user->ID;
$user_name = get_user_option('first_name', $user_id);
$user_surname = get_user_option('last_name', $user_id);
$user_email = get_user_option('user_email', $user_id);
$user_info = get_field('user_information', 'user_' . $user_id);
$user_phone = $user_info['phone'];
$user_cabinet = $user_info['cabinet'];
$user_adresse = $user_info['adress'];
$user_siret = $user_info['siret'];

?>

<div class="presonal-account">
    <div class="presonal-account__head">
        <div class="presonal-account__head-left">
            <span class="presonal-account__head-logo">
                <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="80" height="80" fill="#E82F2F" />
                    <path d="M80 23.5148C55.4343 52.7055 16.431 59.4626 0 59.1923V0H80V23.5148Z" fill="#E95E40" />
                </svg>
            </span>
            <h2 class="presonal-account__head-title">
                Mon compte
            </h2>
        </div>
        <span class="presonal-account__head-line"></span>
    </div>
    <div class="presonal-account__subtitle-wrapper">
        <h4 class="presonal-account__subtitle">
            Mes coordonnées
        </h4>
    </div>
    <div class="presonal-account__wrapper">
        <form action="" method="POST" id="userInfo" class="presonal-account__form">
            <input type="hidden" name="user_id" value="<?= $user_id ?>" />
            <div class="presonal-account__row">
                <label class="presonal-account_label">
                    Nom
                    <input type="text" name="user_name" disabled  placeholder="Nom" value="<?= $user_name; ?>">
                </label>

                <label class="presonal-account_label">
                    Prénom
                    <input type="text" name="user_surname" disabled  placeholder="Prénom" value="<?= $user_surname; ?>">
                </label>
            </div>
            <div class="presonal-account__row">
                <label class="presonal-account_label">
                    E-mail
                    <input type="text" name="user_email" disabled  placeholder="E-mail" value="<?= $user_email; ?>">
                </label>

                <label class="presonal-account_label">
                    Téléphone
                    <input type="text" name="user_phone" placeholder="Téléphone" value="<?= $user_phone; ?>">
                </label>
            </div>
            <div class="presonal-account__row">
                <label class="presonal-account_label">
                    Adresses
                    <input type="text" name="address" placeholder="Adresses" value="<?= $user_adresse ?>">
                </label>
            </div>

            <div class="presonal-account__pass">
                <h5 class="presonal-account__pass-title">Mot de passe</h5>
                <div class="presonal-account__row">
                    <label class="presonal-account_label">
                        Nouveau mot de passe

                        <div class="presonal-account__tooltipe">
                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6.464 7.904H7.112L7.192 7.256C8.08 7.104 8.8 6.648 8.8 5.64C8.8 4.624 8.048 4 6.928 4C6.064 4 5.464 4.36 5 4.888L5.6 5.528C5.984 5.12 6.4 4.896 6.904 4.896C7.48 4.896 7.824 5.208 7.824 5.656C7.824 6.2 7.36 6.528 6.344 6.568L6.304 6.608L6.464 7.904ZM6.232 9.672H7.304V8.576H6.232V9.672Z" fill="black" />
                                <circle cx="7" cy="7" r="6" stroke="black" stroke-width="0.8" />
                            </svg>

                            <span class="presonal-account__tooltipe-text">
                                Votre mot de passe doit contenir au minimum 9 caractères dont 1 chiffre et 1 majuscule !
                            </span>
                        </div>

                        <img class="presonal-account__visible-pass-show" src="<?php bloginfo('template_url'); ?>/img/passVisibleShow.svg" alt="">
                        <img class="presonal-account__visible-pass-hidden active" src="<?php bloginfo('template_url'); ?>/img/passVisible.svg" alt="">

                        <input type="password" class="presonal-account__pass-inp" name="user_password" id="mot_de_passe">
                    </label>

                    <label class="presonal-account_label">
                        Confirmez votre mot de passe
                        <img class="presonal-account__visible-pass-show-1" src="<?php bloginfo('template_url'); ?>/img/passVisibleShow.svg" alt="">
                        <img class="presonal-account__visible-pass-hidden-1 active" src="<?php bloginfo('template_url'); ?>/img/passVisible.svg" alt="">
                        <input type="password" class="presonal-account__pass-inp-1" name="user_confirmed_password" id="confirmez">
                    </label>
                </div>
            </div>

            <button type="submit" class="presonal-account__btn"> <span>Éditer</span> </button>
        </form>
    </div>
</div>

<?php get_footer() ?>
