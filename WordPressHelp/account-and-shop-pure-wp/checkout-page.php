<?php

/**
 * Template Name: Checkout page
 **/
get_header();

if (is_user_logged_in()) {
    $groupePrice = 8690;
};
?>
<div class="checkout-page <?= (!empty($_POST)) ? 'active' : '' ?>">
    <div class="title-section"><span><?= __('INSCRIPTIONS', 'inscr') ?></span></div>
    <?php $programme = new WP_Query(array(
        'post_type'      => 'programme',
        'posts_per_page' => -1,
        'order'          => 'ASC',
    )); ?>
    <?php foreach ($programme->posts as $key => $item) { ?>
        <form class="item <?= ($_POST['cycle'] == $item->post_title) ? 'active' : '' ?>" action="<?= site_url() ?>/payment" method="post">
            <div class="description">
                <div class="left">
                    <div class="title"><?= $item->post_title ?></div>
                    <div class="sub_title"><?= get_field('title', $item->ID) ?></div>
                </div>
                <div class="wrapper-btn">
                    <?php $date = get_field('date_array', $item->ID);
                    foreach ($date as $key_date => $item_date) { ?>
                        <label><input <?= ($_POST['date'] == $item_date['date']) ? 'checked' : '' ?> class="btn-link <?= ($_POST['date'] == $item_date['date']) ? 'active' : '' ?>" data-cycle="<?= $item->post_title ?>" name="day_c" type="radio" data-value="<?= $item_date['date'] ?>" value="<?= $item_date['date'] ?>"><span><span><?= $item_date['date'] ?></span></span></label>
                        <?php if ($key_date != count($date) - 1) { ?>
                            <p>ou</p>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
            <div class="wrapper-renseignez" <?= ($_POST['cycle'] == $item->post_title) ? '' : 'style="display: none"' ?>>
                <?php foreach ($date as $key_date => $item_date) { ?>
                    <div class="tarif <?= ($_POST['date'] == $item_date['date']) ? 'this' : '' ?>" data-date="<?= $item_date['date'] ?>">
                        <div class="item"><span><?= __('Docteur', 'inscr') ?> </span><?= $item_date['docteur']['price'] ?> €
                            <div class="btn-hidden"></div>
                            <p><span class="quantity-arrow-plus" date-id="#<?= $item->ID . $key_date ?>_doc" date-min="min">-</span>
                                <input class="product_numpers_top" pattern="[0-9]" date-id="#<?= $item->ID . $key_date ?>_doc" value="0" data-price="<?= str_replace(" ", "", $item_date['docteur']['price']) ?>" max="<?= $item_date['count_ticket'] ?>" name="docteur_count<?= ($_POST['date'] == $item_date['date']) ? '_this' : '' ?>" type="number">
                                <span class="quantity-arrow-plus" date-id="#<?= $item->ID . $key_date ?>_doc">+</span>
                            </p>
                        </div>
                        <input hidden type="text" name="docteur_tarif_<?= str_replace(" ", "", $item_date['date']) ?>" value="<?= $item_date['docteur']['price'] ?>">
                        <div class="item yong"><span><?= __('Formule young', 'inscr') ?> <div class="explanation"><?= $item_date['formule_young']['explanation'] ?></div></span><?= $item_date['formule_young']['price'] ?> €
                            <div class="btn-hidden"></div>
                            <p><span class="quantity-arrow-plus" date-id="#<?= $item->ID . $key_date ?>_yong" date-min="min">-</span>
                                <input class="product_numpers_top" pattern="[0-9]" date-id="#<?= $item->ID . $key_date ?>_yong" value="0" data-price="<?= str_replace(" ", "", $item_date['formule_young']['price']) ?>" max="<?= $item_date['count_ticket'] ?>" name="young_count<?= ($_POST['date'] == $item_date['date']) ? '_this' : '' ?>" type="number">
                                <span class="quantity-arrow-plus" date-id="#<?= $item->ID . $key_date ?>_yong">+</span>
                            </p>
                        </div>
                        <input hidden type="text" name="yong_tarif_<?= str_replace(" ", "", $item_date['date']) ?>" value="<?= $item_date['formule_young']['price'] ?>">
                        <?php if (is_user_logged_in()) { ?>
                            <div class="item item-groupe-inscrip">
                                <span> Tarif de groupe ?
                                    <div class="explanation">
                                        Groupe de 5 praticiens
                                    </div>
                                </span>
                                <?= $item_date['groupe_price'] ?> €
                                <div class="btn-hidden-groupe"></div>
                            </div>
                            <input hidden type="text" name="yong_tarif_<?= str_replace(" ", "", $item_date['date']) ?>" value="<?= $item_date['groupe_price'] ?>">

                        <?php } ?>
                    </div>
                <?php } ?>
                <div class="wrap-ren">
                    <div class="renseignez">
                        <div class="title-facturation"><?= __('Facturation', 'inscr') ?></div>
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
                            <input name="adresse" id="adresse" required type="text">
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



                        <?php if (is_user_logged_in()) { ?>
                            <!-------- START NEW FORM 1 - 2 -------->
                            <div class="practic-form">
                                <div class="bottom-title"> <?= __("Participants", "inscr") ?> </div>
                                <div class="bottom-sub-title"> <?= __("Participants 1", "inscr") ?> </div>
                                <div class="row-lable">
                                    <label for="prenom-partic-1"><?= __('Prénom', 'inscr') ?></label>
                                    <input name="prenom-partic-1" id="prenom-partic-1" required type="text">
                                </div>
                                <div class="row-lable">
                                    <label for="prenom-partic-1"><?= __('Nom', 'inscr') ?></label>
                                    <input name="nom-partic-1" id="nom-partic-1" required type="text">
                                </div>
                                <div class="row-lable">
                                    <label for="email-partic-1"><?= __('Email *', 'inscr') ?></label>
                                    <input name="email-partic-1" id="email-partic-1" required type="text">
                                </div>

                                <div class="row-lable">
                                    <label for="telehone-partic-1"><?= __('Téléphone *', 'inscr') ?></label>
                                    <input name="telehone-partic-1" id="telehone-partic-1" required type="text">
                                </div>
                            </div>

                            <span class="practic-add-btn">
                            </span>
                            <!-------- END NEW FORM 1 - 2  -------->
                        <?php } ?>

                        <div class="row-lable row-checkbox">
                            <input name="cycle<?php echo ($key + 1); ?>" id="cycle<?php echo ($key + 1); ?>" required type="checkbox">
                            <label for="cycle<?php echo ($key + 1); ?>"><?= __("J'ai lu et j'accepte les", "inscr") ?> <a href="https://linstitutdelafacette.com/conditions-generales-vente/" target="_blank">
                                    <?= __("Conditions Générales de Vente et d'Utilisation", "inscr") ?></a></label>
                        </div>

                        <button type="submit" class="checkput-btn-sumbit"> <span>Valider la commande</span></button>

                    </div>
                    <?php foreach ($date as $key_date => $item_date) { ?>
                        <div class="validez <?= ($_POST['date'] == $item_date['date']) ? 'this' : '' ?>" data-date="<?= $item_date['date'] ?>">
                            <div class="title"><?= __('Validez votre réservation', 'inscr') ?></div>
                            <div class="name-cycle"><?= get_field('h1', $item->ID) ?></div>
                            <div class="type">
                                <p><?= __('Docteur', 'inscr') ?></p>
                                <p><span class="quantity-arrow-plus" date-id="#<?= $item->ID . $key_date ?>_doc" date-min="min">-</span>
                                    <input class="product_numpers" pattern="[0-9]" id="<?= $item->ID . $key_date ?>_doc" value="0" data-price="<?= str_replace(" ", "", $item_date['docteur']['price']) ?>" max="<?= $item_date['count_ticket'] ?>" name="" type="number">
                                    <span class="quantity-arrow-plus" date-id="#<?= $item->ID . $key_date ?>_doc">+</span>
                                </p>
                                <p><?= $item_date['docteur']['price'] ?> €</p>
                            </div>
                            <div class="type">
                                <p><?= __('Formule young', 'inscr') ?></p>
                                <p><span class="quantity-arrow-plus" date-id="#<?= $item->ID . $key_date ?>_yong" date-min="min">-</span>
                                    <input class="product_numpers" pattern="[0-9]" id="<?= $item->ID . $key_date ?>_yong" value="0" data-price="<?= str_replace(" ", "", $item_date['formule_young']['price']) ?>" max="<?= $item_date['count_ticket'] ?>" name="" type="number">
                                    <span class="quantity-arrow-plus" date-id="#<?= $item->ID . $key_date ?>_yong">+</span>
                                </p>
                                <p><?= $item_date['formule_young']['price'] ?> €</p>
                            </div>

                            <?php if (is_user_logged_in()) { ?>
                                <div class="type type-groupe-validez type-validez-hidden">
                                    <p><?= __('Tarif de groupe', 'inscr') ?></p>
                                    <p>
                                        <input class="product_numpers product_numpers-groupe" pattern="[0-9]" value="1" data-price="<?= str_replace(" ", "", $item_date['groupe_price']) ?>" max="1" name="" type="number">
                                    </p>
                                    <p><?= $item_date['groupe_price'] ?> €</p>
                                </div>
                            <?php } ?>


                            <div class="row-total">
                                <div class="day"><?= __('Total', 'inscr') ?></div>
                                <div class="total-price"><span data-id="<?= get_the_ID() ?>">0</span> €</div>
                                <input class="total_price" type="text" hidden name="total_price" value="">
                            </div>
                            <input type="text" hidden name="id_post" value="<?= $item->ID ?>">
                        </div>
                    <?php } ?>
                </div>
            </div>
        </form>
    <?php } ?>
    <form class="item double" action="<?= site_url() ?>/payment" method="post">
        <div class="description">
            <div class="left">
                <div class="title"><?= get_field('h1') ?></div>
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
        <div class="wrapper-renseignez" style="display: none">
            <div class="tarif" data-date="double_cycle">
                <div class="item"><span><?= __('Docteur', 'inscr') ?> </span><?= get_field('docteur_double_cycle_price') ?> €
                    <div class="btn-hidden"></div>
                    <p><span class="quantity-arrow-plus" date-id="#<?= get_the_ID() . 'double' ?>_doc" date-min="min">-</span>
                        <input class="product_numpers_top" pattern="[0-9]" date-id="#<?= get_the_ID() . 'double' ?>_doc" value="0" data-price="<?= str_replace(" ", "", get_field('docteur_double_cycle_price')) ?>" max="20" name="docteur_count" type="number">
                        <span class="quantity-arrow-plus" date-id="#<?= get_the_ID() . 'double' ?>_doc">+</span>
                    </p>
                </div>
                <input hidden type="text" name="docteur_tarif_double" value="<?= get_field('docteur_double_cycle_price') ?>">
                <div class="item yong"><span><?= __('Formule young', 'inscr') ?> <div class="explanation"><?= __('Jeune diplomé (< 5ans)', 'inscr') ?></div></span><?= get_field('young_double_cycle_price') ?> €
                    <div class="btn-hidden"></div>
                    <p><span class="quantity-arrow-plus" date-id="#<?= get_the_ID() . 'double' ?>_yong" date-min="min">-</span>
                        <input class="product_numpers_top" pattern="[0-9]" date-id="#<?= get_the_ID() . 'double' ?>_yong" value="0" data-price="<?= str_replace(" ", "", get_field('young_double_cycle_price')) ?>" max="20" name="young_count" type="number">
                        <span class="quantity-arrow-plus" date-id="#<?= get_the_ID() . 'double' ?>_yong">+</span>
                    </p>
                </div>
                <input hidden type="text" name="yong_tarif_double" value="<?= get_field('young_double_cycle_price') ?>">
                <?php if (is_user_logged_in()) { ?>
                    <div class="item item-groupe-inscrip">
                        <span> Tarif de groupe ?
                            <div class="explanation">
                                Groupe de 5 praticiens
                            </div>
                        </span>
                        <?= get_field('double_groupe_price') ?> €
                        <div class="btn-hidden-groupe"></div>
                    </div>
                    <input hidden type="text" name="yong_tarif_<?= str_replace(" ", "", $item_date['date']) ?>" value="<?= get_field('double_groupe_price') ?>">

                <?php } ?>
            </div>
            <div class="wrap-ren">
                <div class="renseignez">
                    <div class="title-facturation"><?= __('Facturation', 'inscr') ?></div>
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
                        <input name="adresse" id="adresse" required type="text">
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


                    <?php if (is_user_logged_in()) { ?>
                        <!-------- START NEW FORM 3 -------->
                        <div class="practic-form practic-form-iscription">
                            <div class="bottom-title"> <?= __("Participants", "inscr") ?> </div>
                            <div class="bottom-sub-title"> <?= __("Participants 1", "inscr") ?> </div>
                            <div class="row-lable">
                                <label for="prenom-partic-1"><?= __('Prénom', 'inscr') ?></label>
                                <input name="prenom-partic-1" id="prenom-partic-1" required type="text">
                            </div>
                            <div class="row-lable">
                                <label for="prenom-partic-1"><?= __('Nom', 'inscr') ?></label>
                                <input name="nom-partic-1" id="nom-partic-1" required type="text">
                            </div>
                            <div class="row-lable">
                                <label for="email-partic-1"><?= __('Email *', 'inscr') ?></label>
                                <input name="email-partic-1" id="email-partic-1" required type="text">
                            </div>

                            <div class="row-lable">
                                <label for="telehone-partic-1"><?= __('Téléphone *', 'inscr') ?></label>
                                <input name="telehone-partic-1" id="telehone-partic-1" required type="text">
                            </div>
                        </div>

                        <span class="practic-add-btn">
                        </span>
                        <!-------- END NEW FORM 3 -------->
                    <?php } ?>
                    <div class="row-lable row-checkbox">
                        <input name="cycledouble" id="cycledouble" required type="checkbox">
                        <label for="cycledouble"><?= __("J'ai lu et j'accepte les", "inscr") ?> <a href="https://linstitutdelafacette.com/conditions-generales-vente/" target="_blank">
                                <?= __("Conditions Générales de Vente et d'Utilisation", "inscr") ?></a></label>
                    </div>

                    <button type="submit" class="checkput-btn-sumbit"> <span>Valider la commande</span></button>
                </div>
                <div class="validez" data-date="double_cycle">
                    <div class="title"><?= __('Validez votre réservation', 'inscr') ?></div>
                    <div class="name-cycle"><?= get_field('h1') ?></div>
                    <div class="type">
                        <p><?= __('Docteur', 'inscr') ?></p>
                        <p><span class="quantity-arrow-plus" date-id="#<?= get_the_ID() . 'double' ?>_doc" date-min="min">-</span>
                            <input class="product_numpers" pattern="[0-9]" id="<?= get_the_ID() . 'double' ?>_doc" value="0" data-price="<?= str_replace(" ", "", get_field('docteur_double_cycle_price')) ?>" max="20" name="" type="number">
                            <span class="quantity-arrow-plus" date-id="#<?= get_the_ID() . 'double' ?>_doc">+</span>
                        </p>
                        <p><?= get_field('docteur_double_cycle_price') ?> €</p>
                    </div>
                    <div class="type">
                        <p><?= __('Formule young', 'inscr') ?></p>
                        <p><span class="quantity-arrow-plus" date-id="#<?= get_the_ID() . 'double' ?>_yong" date-min="min">-</span>
                            <input class="product_numpers" pattern="[0-9]" id="<?= get_the_ID() . 'double' ?>_yong" value="0" data-price="<?= str_replace(" ", "", get_field('young_double_cycle_price')) ?>" max="20" name="" type="number">
                            <span class="quantity-arrow-plus" date-id="#<?= get_the_ID() . 'double' ?>_yong">+</span>
                        </p>
                        <p><?= get_field('young_double_cycle_price') ?> €</p>
                    </div>
                    <?php if (is_user_logged_in()) { ?>
                        <div class="type type-groupe-validez type-validez-hidden">
                            <p><?= __('Tarif de groupe', 'inscr') ?></p>
                            <p>
                                <input class="product_numpers product_numpers-groupe" pattern="[0-9]" value="1" data-price="<?= str_replace(" ", "", get_field('double_groupe_price')) ?>" max="1" name="" type="number">
                            </p>
                            <p><?= get_field('double_groupe_price') ?> €</p>
                        </div>
                    <?php } ?>
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
<?php get_footer() ?>