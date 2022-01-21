<?php

/**
 * Template Name: Checkout box page
 **/
get_header();
$price = get_field('product_price');
?>
<div class="checkout-page <?= (!empty($_POST)) ? 'active' : '' ?>">

    <input type="text" hidden class="delivery-fr" value="<?= get_field('delivery_fr') ?>">
    <input type="text" hidden class="delivery-eu" value="<?= get_field('delivery_eu') ?>">
    <input type="text" hidden class="delivery-all" value="<?= get_field('delivery_all') ?>">

    <div class="title-section"><span><?= __('PANIER', 'inscr') ?></span></div>

    <form class="item double active" action="<?= site_url() ?>/payment" method="post">
        <div class="description">
            <div class="left">
                <!-- <div class="title"><?= get_field('h1') ?></div> -->
                <div class="title"> <?= __("Facturation", "inscr") ?></div>
            </div>
            <div class="wrapper-wrap">
                <?php $count = 0;
                $day_c;
                foreach ($programme->posts as $key => $item) {
                    if ($item->ID != 25) {
                ?>
                        <div class="wrapper-btn" data-cycle="double">
                            <?php $date = get_field('date_array', $item->ID);
                            foreach ($date as $key_date => $item_date) { ?>
                                <label><input data-value="double_cycle" required class="btn-link" data-cycle="double" name="<?= $count == 0 ? 'day_c' : 'day_b' ?>" type="radio" value="<?= $item_date['date'] ?>"><span><span><?= $item_date['date'] ?></span></span></label>
                                <?php if ($key_date != count($date) - 1) { ?>
                                    <p>ou</p>
                                <?php } ?>
                            <?php } ?>
                        </div>
                <?php
                        $count++;
                    }
                } ?>
            </div>
        </div>
        <div class="wrapper-renseignez">
            <div class="tarif" data-date="double_cycle">
                <div class="item"><span><?= __('Quantity', 'inscr') ?> </span><?= $price ?> €
                    <div class="btn-hidden"></div>
                    <p><span class="quantity-arrow-plus" date-id="#<?= get_the_ID() . 'double' ?>_doc" date-min="min">-</span>
                        <input class="product_numpers_top" pattern="[0-9]" date-id="#<?= get_the_ID() . 'double' ?>_doc" value="0" data-price="<?= str_replace(" ", "", $price) ?>" max="20" name="docteur_count" type="number">
                        <span class="quantity-arrow-plus" date-id="#<?= get_the_ID() . 'double' ?>_doc">+</span>
                    </p>
                </div>
                <input hidden type="text" name="docteur_tarif_double" value="<?= $price ?>">
            </div>
            <div class="wrap-ren">
                <div class="renseignez">
                    <div class="title"><?= __('Renseignez vos coordonées', 'inscr') ?></div>
                    <div class="row-lable">
                        <label for="prenom"><?= __('Prénom', 'inscr') ?></label>
                        <input name="prenom" id="prenom" required type="text">
                    </div>
                    <div class="row-lable">
                        <label for="nom"><?= __('Nom', 'inscr') ?></label>
                        <input name="nom" id="nom" required type="text">
                    </div>
                    <div class="row-lable">
                        <label for="entreprise"><?= __('Entreprise', 'inscr') ?></label>
                        <input name="entreprise" id="entreprise" required type="text">
                    </div>
                    <div class="row-lable">
                        <label for="adresse"><?= __('Adresse', 'inscr') ?></label>
                        <input name="adresse" class="autocomplete-address" id="adresse" required type="text">

                    </div>
                    <div class="row-input">
                        <div class="row-lable">
                            <label for="code_postal"><?= __('Code Postal', 'inscr') ?></label>
                            <input name="code_postal" id="code_postal" required type="text">
                        </div>
                        <div class="row-lable">
                            <label for="ville"><?= __('Ville', 'inscr') ?></label>
                            <input name="ville" id="ville" required type="text">
                        </div>
                    </div>
                    <div class="row-lable">
                        <label for="Adresse_email"><?= __('Email', 'inscr') ?></label>
                        <input name="adresse_email" id="Adresse_email" required type="email">
                    </div>
                    <div class="row-lable">
                        <label for="tel"><?= __('Téléphone', 'inscr') ?></label>
                        <input name="tel" id="tel" required type="text">
                    </div>

                    <input type="text" hidden name="checkout-box" value='checkout-box'>

                    <!-- // pass start -->
                    <div class="row-lable row-lable-box">
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

                        <label for="pass"><?= __('Passe', 'inscr') ?></label>
                        <input name="pass" class="presonal-account__pass-inp" id="pass" required type="password">
                    </div>
                    <div class="row-lable row-lable-box">
                        <img class="presonal-account__visible-pass-show-1" src="<?php bloginfo('template_url'); ?>/img/passVisibleShow.svg" alt="">
                        <img class="presonal-account__visible-pass-hidden-1 active" src="<?php bloginfo('template_url'); ?>/img/passVisible.svg" alt="">
                        <label for="conf-pass"><?= __('Confirmez <br> passe', 'inscr') ?></label>
                        <input name="conf-pass" class="presonal-account__pass-inp-1" id="conf-pass" required type="password">
                    </div>
                    <!-- // pass end -->

                    <div class="bottom-title"> <?= __("Livraison", "inscr") ?> </div>
                    <div class="row-lable row-checkbox">
                        <input name="adresse-facturation" id="adresse-facturation" type="checkbox">
                        <label for="adresse-facturation"><?= __("Même adresse que pour la facturation", "inscr") ?> </label>
                    </div>
                    <div class="row-lable">
                        <label for="prenom-partic-1"><?= __('Prénom', 'inscr') ?></label>
                        <input name="prenom-partic-1" id="prenom-partic-1" required type="text">
                    </div>
                    <div class="row-lable">
                        <label for="nom"><?= __('Nom', 'inscr') ?></label>
                        <input name="nom-partic-1" id="nom" required type="text">
                    </div>
                    <div class="row-lable">
                        <label for="adresse"><?= __('Adresse', 'inscr') ?></label>
                        <input name="adresse-partic-1" class="autocomplete-address" id="adresse" required type="text">
                    </div>
                    <div class="row-input">
                        <div class="row-lable">
                            <label for="code_postal"><?= __('Code Postal', 'inscr') ?></label>
                            <input name="code_postal-partic-1" id="code_postal_1" required type="text">
                        </div>
                        <div class="row-lable">
                            <label for="ville"><?= __('Ville', 'inscr') ?></label>
                            <input name="ville-partic-1" id="ville_1" required type="text">
                        </div>
                    </div>

                    <div class="row-sipping">
                        <div class="row-sipping__right">
                            <span class="row-sipping-text">Livraison</span>
                            <img src="<?php bloginfo('template_url'); ?>/img/dhl-logo.png" class="row-sipping-dhl" alt="logo">
                        </div>

                        <div class="row-sipping__price">
                            <input type="text" value="0" disabled>
                            <span class="row-sipping__currency">€</span>
                        </div>
                    </div>

                    <div class="row-lable row-checkbox">
                        <input name="cycledouble" id="cycledouble" required type="checkbox">
                        <label for="cycledouble"><?= __("J'ai lu et j'accepte les", "inscr") ?> <a href="https://linstitutdelafacette.com/conditions-generales-vente/" target="_blank">
                                <?= __("Conditions Générales de Vente et d'Utilisation", "inscr") ?></a></label>
                    </div>


                    <button type="submit" class="checkput-btn-sumbit"> <span>Valider la commande</span></button>

                </div>
                <div class="validez this" data-date="double_cycle">
                    <div class="title"><?= __('Validez votre réservation', 'inscr') ?></div>
                    <div class="name-cycle"><?= get_field('h1') ?></div>
                    <div class="type">
                        <p><?= __('Quantity', 'inscr') ?></p>
                        <p><span class="quantity-arrow-plus" date-id="#<?= get_the_ID() . 'double' ?>_doc" date-min="min">-</span>
                            <input class="product_numpers" pattern="[0-9]" id="<?= get_the_ID() . 'double' ?>_doc" value="0" data-price="<?= str_replace(" ", "", $price) ?>" max="20" name="" type="number">
                            <span class="quantity-arrow-plus" date-id="#<?= get_the_ID() . 'double' ?>_doc">+</span>
                        </p>
                        <p><?= $price ?> €</p>
                    </div>
                    <div class="row-total-dhl">
                        <span class="row-total-dhl-text"><?= __('Livraison DHL ', 'inscr') ?> </span>
                        <span class="row-total-dhl-price"> <input type="text" value="0" disabled> €</span>
                    </div>
                    <div class="row-total">
                        <div class="day"><?= __('Total', 'inscr') ?></div>
                        <div class="total-price"><span data-id="<?= get_the_ID() ?>">0</span> €</div>
                        <input class="total_price" type="text" hidden name="total_price" value="">
                    </div>
                    <input type="text" hidden name="id_post" value="<?= get_the_ID() ?>">

                </div>
            </div>
        </div>
    </form>
</div>

<script>
    const europenArr = ['Austria', 'Belgium', 'Bulgaria', 'Croatia', 'Cyprus', 'Czechia', 'Denmark', 'Estonia', 'Finland', 'France', 'Germany', 'Greece', 'Hungary', 'Ireland', 'Italy', 'Latvia', 'Lithuania', 'Luxembourg', 'Malta', 'Netherlands', 'Poland']
    const addresseArr = document.querySelectorAll('.autocomplete-address')

    let autocomplete0;
    let autocomplete1;
    let placeSearch;
    let componentForm = {
        street_number: 'short_name',
        route: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
        country: 'long_name',
        postal_code: 'short_name'
    };

    window.initPlaces = function() {
        autocomplete0 = new google.maps.places.Autocomplete(
            addresseArr[0], {
                types: ['geocode']
            }
        );
        autocomplete1 = new google.maps.places.Autocomplete(
            addresseArr[1], {
                types: ['geocode']
            }
        );
        autocomplete0.addListener('place_changed', fillInAddress0);
        autocomplete1.addListener('place_changed', fillInAddress1);
    };

    function fillInAddress0() {
        let place = autocomplete0.getPlace();
        for (let i = 0; i < place.address_components.length; i++) {
            let addressType = place.address_components[i].types[0];
            if (componentForm[addressType]) {
                let val = place.address_components[i][componentForm[addressType]];
                document.getElementById(addressType).value = val;
            }
        }

        document.querySelector('#ville').value = document.querySelector('#locality').value
        document.querySelector('#code_postal').value = document.querySelector('#postal_code').value
    }

    function fillInAddress1() {
        let place = autocomplete1.getPlace();
        for (let i = 0; i < place.address_components.length; i++) {
            let addressType = place.address_components[i].types[0];
            if (componentForm[addressType]) {
                let val = place.address_components[i][componentForm[addressType]];
                document.getElementById(addressType).value = val;
            }
        }

        const city = document.querySelector('#locality').value
        const zip = document.querySelector('#postal_code').value
        const cantry = document.querySelector('#country').value
        document.querySelector('#ville_1').value = city;
        document.querySelector('#code_postal_1').value = zip;
        let sippingCantry
        let isEurope = false
        europenArr.forEach(arrEl => {
            if (arrEl == cantry) {
                isEurope = true
            }
        })
        let shippingValue = document.querySelector('.row-total-dhl-price input')
        let shippingValueBottom = document.querySelector('.row-sipping__price input')

        if (cantry === 'France') {
            shipptingPrice = document.querySelector('.delivery-fr').value
            shippingValue.value = document.querySelector('.delivery-fr').value
            shippingValueBottom.value = document.querySelector('.delivery-fr').value
        } else if (isEurope) {
            shipptingPrice = document.querySelector('.delivery-eu').value
            shippingValue.value = document.querySelector('.delivery-eu').value
            shippingValueBottom.value = document.querySelector('.delivery-eu').value
        } else {
            shipptingPrice = document.querySelector('.delivery-all').value
            shippingValue.value = document.querySelector('.delivery-all').value
            shippingValueBottom.value = document.querySelector('.delivery-all').value
        }


        $('.validez.this .product_numpers').each(function() {
            $totalchange = $(this).val() * $(this).attr('data-price');
        });

        $('input.total_price').val(Number($totalchange) + Number(shipptingPrice));
        $('.total-price span').html(Number($totalchange) + Number(shipptingPrice));
    }
</script>


<?php get_footer() ?>

<input type="hidden" class="field" id="street_number">
<input type="hidden" class="field" id="route">
<input type="hidden" class="field" id="locality">
<input type="hidden" class="field" id="administrative_area_level_1">
<input type="hidden" class="field" id="postal_code">
<input type="hidden" class="field" id="country">

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDiKmRh2vEg2hiV1ZIVeyNlxPjVegpChvE&amp;libraries=places&amp;callback=initPlaces&amp;&language=en" async="" defer=""></script>