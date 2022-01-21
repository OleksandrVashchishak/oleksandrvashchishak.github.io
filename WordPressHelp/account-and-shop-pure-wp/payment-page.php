<?php

/**
 * Template Name: Payment page
 **/
get_header() ?>
<div class="checkout-page">
	<div class="title-section"><span><?= __('Paiement', 'inscr') ?></span></div>
	<form class="wrapper-payment">
		<div class="type_payment-wrapper">
			<div class="type_payment">
				<p style="display: flex;">
					<input type="radio" name="type_pay" id="carte_bancaire" checked value="cart_banc">
					<label for="carte_bancaire" class="checkbox"><?= __('Carte bancaire', 'inscr') ?></label>
				</p>
				<div class="payment_box" style="display: none;">
				</div>
				<!--				<p style="display: flex;">-->
				<!--					<input type="radio" name="type_pay" id="pay_pal" value="pay_pal">-->
				<!--					<label for="pay_pal" class="checkbox">--><? //= __('Pay pal', 'inscr') 
																					?>
				<!--</label>-->
				<!--				</p>-->
				<div class="payment_box" style="display: none;">
				</div>
				<p style="display: flex;">
					<input type="radio" name="type_pay" id="virement_bancaire" value="virement_banc">
					<label for="virement_bancaire" class="checkbox"><?= __('Virement bancaire', 'inscr') ?></label>
				</p>
				<div class="payment_box" style="display: none;">
					<?= get_field('virement_bancaire') ?>
				</div>
				<p style="display: flex;">
					<input type="radio" name="type_pay" id="check_input" value="check">
					<label for="check_input" class="checkbox"><?= __('Chèque', 'inscr') ?></label>
				</p>
				<div class="payment_box" style="display: none;">
					<?= get_field('cheque') ?>
				</div>
			</div>
			<span class="valider_btn"><input type="submit" value="Valider"></span>
		</div>
		<div class="validez this">
			<div class="title"><?= __('Validez votre réservation', 'inscr') ?></div>
			<div class="name-cycle"><?= get_field('h1', $_POST['id_post']) ?></div>
			<div class="type <?= $_POST['docteur_count_this'] > 0 ? 'check' : '' ?>">
				<p><?= __('Docteur', 'inscr') ?></p>
				<p><span style="pointer-events: none" class="quantity-arrow-plus" date-id="#<?= $_POST['id_post'] ?>_doc" date-min="min">-</span>
					<input style="pointer-events: none" value="<?= $_POST['docteur_count_this'] ?>" class="product_numpers" pattern="[0-9]" id="<?= $_POST['id_post'] ?>_doc" data-price="<?= $_POST['docteur_tarif_' . str_replace(" ", "", $_POST['day_c']) . ''] ?>" max="<?= get_field('docteur', $_POST['id_post'])['count'] ?>" name="docteur_count" type="number">
					<span style="pointer-events: none" class="quantity-arrow-plus" date-id="#<?= $_POST['id_post'] ?>_doc">+</span>
				</p>
				<p><?= !empty($_POST['docteur_tarif_' . str_replace(" ", "", $_POST['day_c']) . '']) ? $_POST['docteur_tarif_' . str_replace(" ", "", $_POST['day_c']) . ''] : $_POST['docteur_tarif_double'] ?> €</p>
			</div>
			<?php if ($_POST['yong_tarif_double']) { ?>
				<div class="type <?= $_POST['young_count_this'] > 0 ? 'check' : '' ?>">
					<p><?= __('Formule young', 'inscr') ?> </p>
					<p><span style="pointer-events: none" class="quantity-arrow-plus" date-id="#<?= $_POST['id_post'] ?>_yong" date-min="min">-</span>
						<input style="pointer-events: none" value="<?= $_POST['young_count_this'] ?>" class="product_numpers" pattern="[0-9]" id="<?= $_POST['id_post'] ?>_yong" data-price="<?= $_POST['yong_tarif_' . str_replace(" ", "", $_POST['day_c']) . ''] ?>" max="<?= get_field('formule_young', $_POST['id_post'])['count'] ?>" name="young_count" type="number">
						<span style="pointer-events: none" class="quantity-arrow-plus" date-id="#<?= $_POST['id_post'] ?>_yong">+</span>
					</p>
					<p><?= !empty($_POST['yong_tarif_' . str_replace(" ", "", $_POST['day_c']) . '']) ? $_POST['yong_tarif_' . str_replace(" ", "", $_POST['day_c']) . ''] : $_POST['yong_tarif_double'] ?> €</p>
				</div>
			<?php } ?>
			<div class="row-total">
				<div class="day"><?= __('Total', 'inscr') ?></div>
				<div class="total-price"><span data-id="<?= get_the_ID() ?>"><?= $_POST['total_price'] ?></span> €</div>
				<input class="total_price" type="text" hidden name="total_price" value="<?= $_POST['total_price'] ?>">
				<input type="text" hidden name="prenom" value="<?= $_POST['prenom'] ?>">
				<input type="text" hidden name="nom" value="<?= $_POST['nom'] ?>">
				<input type="text" hidden name="entreprise" value="<?= $_POST['entreprise'] ?>">
				<input type="text" hidden name="adresse" value="<?= $_POST['adresse'] ?>">
				<input type="text" hidden name="code_postal" value="<?= $_POST['code_postal'] ?>">
				<input type="text" hidden name="ville" value="<?= $_POST['ville'] ?>">
				<input type="text" hidden name="adresse_email" value="<?= $_POST['adresse_email'] ?>">
				<input type="text" hidden name="tel" value="<?= $_POST['tel'] ?>">
				<input type="text" hidden name="id_post" value="<?= $_POST['id_post'] ?>">
				<input type="text" hidden name="day_c" value="<?= $_POST['day_c'] ?>">
				<input type="text" hidden name="day_b" value="<?= $_POST['day_b'] ?>">
				<input type="text" hidden name="prenom-partic-1" value="<?= $_POST['prenom-partic-1'] ?>">
				<input type="text" hidden name="nom-partic-1" value="<?= $_POST['nom-partic-1'] ?>">
				<input type="text" hidden name="adresse-partic-1" value="<?= $_POST['adresse-partic-1'] ?>">
				<input type="text" hidden name="code_postal-partic-1" value="<?= $_POST['code_postal-partic-1'] ?>">
				<input type="text" hidden name="ville-partic-1" value="<?= $_POST['ville-partic-1'] ?>">
				<?php for ($i = 1; $i < 12; $i++) { ?>
					<input type="text" hidden name="prenom-partic-<?php echo $i ?>" value="<?= $_POST['prenom-partic-' . $i] ?>">
					<input type="text" hidden name="nom-partic-<?php echo $i ?>" value="<?= $_POST['nom-partic-' . $i] ?>">
					<input type="text" hidden name="adresse-partic-<?php echo $i ?>" value="<?= $_POST['adresse-partic-' . $i] ?>">
					<input type="text" hidden name="code_postal-partic-<?php echo $i ?>" value="<?= $_POST['code_postal-partic-' . $i] ?>">
					<input type="text" hidden name="ville-partic-<?php echo $i ?>" value="<?= $_POST['ville-partic-' . $i] ?>">
					<input type="text" hidden name="email-partic-<?php echo $i ?>" value="<?= $_POST['email-partic-' . $i] ?>">
					<input type="text" hidden name="telehone-partic-<?php echo $i ?>" value="<?= $_POST['telehone-partic-' . $i] ?>">
				<?php } ?>
				<input type="text" hidden name="column-count-acf" class="column-count-acf" value="">

				<input type="text" hidden name="pass" value="<?= $_POST['pass'] ?>">
				<input type="text" hidden name="checkout-box" value="<?= $_POST['checkout-box'] ?>">

			</div>
		</div>
	</form>
</div>
<div id="bank-form" style="display: none"></div>
<?php get_footer() ?>


