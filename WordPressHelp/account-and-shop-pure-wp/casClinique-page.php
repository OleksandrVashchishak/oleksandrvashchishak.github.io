<?php
/**
 * Template Name: Cas clinique page
 **/
get_header() ?>
<div class="clinique-page">
	<div class="title-section"><span><?= __('Cas Clinique', 'cas-clinique') ?></span></div>
	<div class="description">
		<?= get_field('description') ?>
	</div>
	<div class="teeth">
		<?php $teeth = get_field('teeth');
		foreach ($teeth as $key => $item){ ?>
			<div class="item" <?= $key > 6 ? 'style="display: none"' : '' ?> >
				<img src="<?= $item['after']['url'] ?>">
				<img src="<?= $item['before']['url'] ?>">
			</div>
            <?php if($key > 6){ ?>
                <a class="btn-link" style="margin: 0 auto" href=""><span><?= __('En savoir plus', 'cas-clinique') ?></span></a>
                <?php } ?>
		<?php } ?>
	</div>
</div>
<?php get_footer() ?>
