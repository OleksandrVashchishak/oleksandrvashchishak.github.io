<?php
/**
 * Template Name: Autor page
 **/
get_header() ?>
<div class="autor-page">
	<div class="wrapper">
        <img src="<?= get_field('image')['url'] ?>">
        <div class="desc-wrapper">
            <div class="name"><?= get_field('name') ?></div>
            <?= get_field('description') ?>
        </div>
    </div>
</div>
<?php get_footer() ?>
