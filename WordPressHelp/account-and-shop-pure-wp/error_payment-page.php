<?php
/**
 * Template Name: Error payment
 **/
get_header() ?>
	<div class="merci">
		<div class="wrap">
			<img src="<?= get_template_directory_uri() ?>/img/error-payment.png">
			<div class="merci-sub" style=""><?= __('Votre paiement a échoué !','page') ?></div>
			<p><?= __('Vous pouvez réessayer en cliquant sur le bouton ci-dessous.','page') ?></p>
		</div>
	</div>
<?php get_footer() ?>
