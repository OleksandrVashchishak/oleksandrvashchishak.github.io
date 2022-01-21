<?php

/**
 * Template Name: Login
 **/
get_header();
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
                Se connecter
            </h2>
        </div>
        <span class="presonal-account__head-line"></span>
    </div>

    <div class="login-page">
        <form class="login-page__form">
            <div class="login-page__login">
                <label class="login-page__label">
                    <input class='login-page__email' type="text" name="user_name">
                    <span class="login-page__label-text">Email *</span>
                </label>

                <label class="login-page__label">

                    <div class="login-page__tooltipe">
                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.464 7.904H7.112L7.192 7.256C8.08 7.104 8.8 6.648 8.8 5.64C8.8 4.624 8.048 4 6.928 4C6.064 4 5.464 4.36 5 4.888L5.6 5.528C5.984 5.12 6.4 4.896 6.904 4.896C7.48 4.896 7.824 5.208 7.824 5.656C7.824 6.2 7.36 6.528 6.344 6.568L6.304 6.608L6.464 7.904ZM6.232 9.672H7.304V8.576H6.232V9.672Z" fill="black" />
                            <circle cx="7" cy="7" r="6" stroke="black" stroke-width="0.8" />
                        </svg>

                        <span class="login-page__tooltipe-text">
                            Votre mot de passe doit contenir au minimum 9 caractères dont 1 chiffre et 1 majuscule !
                        </span>
                    </div>

                    <div class="login-page__visible-pass">
                        <img src="<?php bloginfo('template_url'); ?>/img/passVisible.svg" alt="">
                    </div>

                    <input class='login-page__pass' type="password" name="user_name">
                    <span class="login-page__label-text">Mot de passe *</span>
                </label>

                <a href="/mot-de-passe-oublie/" class="login-page__reset">Vous avez oublié votre mot de passe ?</a>
 
                <button class="login-page__btn login-page__login-submit" type="submit"> <span>Se connecter</span></button>
            </div>

            <div class="login-page__registration">
                <div class="login-page__registration-text">
                    Vous n'avez pas de compte ? <br>
                    Vous pouvez le créer lors de votre commande.
                </div>
                <button class="login-page__btn login-page__btn-registration" type="submit"> <span> Créer mon compte </span></button>
            </div>


        </form>
    </div>



</div>

<?php get_footer() ?>

<script>
    const registrBtn = document.querySelector('.login-page__btn-registration')
    registrBtn.addEventListener('click', (e) => {
        e.preventDefault();
        const email = document.querySelector('.login-page__email').value
        const pass = document.querySelector('.login-page__pass').value
        const data = {
            'action': 'registeruser',
            'email': email,
            'password': pass,
        }

        $.ajax({
            method: "POST",
            url: '/wp-admin/admin-ajax.php',
            data: data,
            success: function(data) {
                setTimeout(() => {
                    window.location.replace("/personal-account/");
                }, 2500);
            }

        });
    })

    const loginBtn = document.querySelector('.login-page__login-submit')
    loginBtn.addEventListener('click', (e) => {
        e.preventDefault();
        const email = document.querySelector('.login-page__email').value
        const pass = document.querySelector('.login-page__pass').value
        const data = {
            'action': 'login_user',
            'email': email,
            'password': pass,
        }

        $.ajax({
            method: "POST",
            url: '/wp-admin/admin-ajax.php',
            data: data,
            success: function(data) {
                setTimeout(() => {
                    window.location.replace("/personal-account/");
                }, 2500);
            }

        });
    })

    if (document.querySelector('.login-page__visible-pass')) {
        const icon = document.querySelector('.login-page__visible-pass')
        const passInput = document.querySelector('.login-page__pass')
        icon.addEventListener('mouseenter', () => {
            passInput.setAttribute('type', 'text')
        })
        icon.addEventListener('mouseleave', () => {
            passInput.setAttribute('type', 'password')
        })
    }

    const inputs = document.querySelectorAll('.login-page__label input')
    inputs.forEach(e => {
        e.addEventListener('focus', () => {
            const inputText = e.parentElement.querySelector('.login-page__label-text')
            inputText.classList.add('active')
        })

        e.addEventListener('blur', () => {
            const inputText = e.parentElement.querySelector('.login-page__label-text')
            const input = e.parentElement.querySelector('input')
            if (input.value == '') {
                inputText.classList.remove('active')
            }
        })
    })
</script>