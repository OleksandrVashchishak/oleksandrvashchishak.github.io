<?php
get_header() ?>
<div class="single-programme">

    <div class="header-wrapper">
        <div class="header-image">
            <img src="<?= get_field( 'image_header' )['url'] ?>">
        </div>
        <div class="wrapper-h1">
            <div class="h1">
                <h1><?= get_field( 'h1' ) ?></h1>
                <a href="<?= get_the_permalink() ?>#inscription">Inscription</a>
            </div>
        </div>
    </div>
    <div class="content-single">
		<?php
		$content = get_field( 'content' );
		if ( ! empty( $content ) ) {
			foreach ( $content as $block ) {
				if ( $block['acf_fc_layout'] == 'two_columns_list' ) {
					?>
                    <div class="two-columns">
                        <div class="column">
                            <h3 class="title"><?= $block['two_columns_list']['first_column']['title'] ?></h3>
                            <h4 class="sub_title"><?= $block['two_columns_list']['first_column']['sub_title'] ?></h4>
							<?= $block['two_columns_list']['first_column']['list'] ?>
                        </div>
                        <div class="column">
                            <h3 class="title"><?= $block['two_columns_list']['second_column']['title'] ?></h3>
                            <h4 class="sub_title"><?= $block['two_columns_list']['second_column']['sub_title'] ?></h4>
							<?= $block['two_columns_list']['second_column']['list'] ?>
                        </div>
                    </div>
				<?php } elseif ( $block['acf_fc_layout'] == 'center_text' ) { ?>
                    <div class="center">
						<?= $block['text'] ?>
                    </div>
				<?php } elseif ( $block['acf_fc_layout'] == 'graphic_days' ) { ?>
                    <div class="panning">
                        <div class="wrapper-panning">
							<?php foreach ( $block['graphic_days'] as $item ) { ?>
                                <div class="day-wrap">
                                    <h3 class="day"><?= $item['day'] ?></h3>
									<?php foreach ( $item['row'] as $hour ) { ?>
                                        <div class="row-hour">
                                            <div class="moment">
                                                <span><?= $hour['hour'] ?></span>
												<?= $hour['moment'] ?></div>
                                        </div>
									<?php } ?>
                                </div>
							<?php } ?>
                            <div class="pour">
                                <div class="wrapper">
                                    <div class="title"><?= $block['title_phone'] ?></div>
                                    <div class="wrap">
										<?php $phone = $block['phone'];
										foreach ( $phone as $item ) { ?>
                                            <a href="tel:<?= $item['tel'] ?>"><img src="<?= $item['icon']['url'] ?>"><?= $item['tel'] ?></a>
										<?php } ?>
                                    </div>
                                    <div style="margin-top: 15px; font-size: 16px; color: #ffffff; position: relative; z-index: 4">La formation se déroule au 51 bis rue Saint Sébastien
                                        13006 Marseille</div>
                                </div>
                            </div>
                        </div>
                    </div>
				<?php } elseif ( $block['acf_fc_layout'] == 'autor' ) { ?>
                    <div class="autor-block">
                        <h2 class="title-section"><span><?= $block['title_section'] ?></span></h2>
                        <div class="wrapper-flex">
                            <img src="<?= $block['image']['url'] ?>">
                            <div class="left">
                                <div class="name"><?= $block['name'] ?></div>
                                <div class="status"><?= $block['status'] ?></div>
                                <div class="description"><?= $block['description'] ?></div>
                            </div>
                        </div>
                    </div>
				<?php } elseif ( $block['acf_fc_layout'] == 'description_left' ) { ?>
                    <div class="description-left">
                        <div class="before-title"><?= $block['before_title'] ?></div>
                        <div class="description"><?= $block['description'] ?></div>
                    </div>
					<?php
				} elseif ( $block['acf_fc_layout'] == 'hands' ) { ?>
                    <div class="hands">
                        <h3 class="title">
							<?= $block['title'] ?>
                        </h3>
                        <div class="columns">
							<?php $hands = $block['hands_section'];
							foreach ( $hands as $item ) { ?>
                                <div class="column">
                                    <div class="sub_title"><?= $item['hands'] ?></div>
									<?= $item['list'] ?>
                                </div>
							<?php } ?>
                        </div>
                    </div>
					<?php
				} elseif ( $block['acf_fc_layout'] == 'section_title' ) { ?>
                    <h2 class="title-section"><span><?= $block['section_title'] ?></span></h2>
				<?php }
			}
		} ?>
    </div>
    <div class="last-block" id="inscription">
        <div class="title-section"><span>INSCRIPTIONS</span></div>
        <div class="wrapper-tarif">
            <div class="tarif">
                <h2 class="title">Tarif</h2>
	            <?php $date = get_field( 'date_array' );
	            foreach ( $date as $key_date => $item_date ) { ?>
                    <div class="item" <?= $key_date+1 != count($date)-``? 'style="display: none;"' : '' ?> data-date = "<?= $item_date['date'] ?>"><span>Docteur : </span><?= $item_date['docteur']['price'] ?> €</div>
                    <div class="item young" <?= $key_date+1 != count($date)? 'style="display: none;"' : '' ?> data-date = "<?= $item_date['date'] ?>"><span>Formule young : <div class="explanation"><?= $item_date[ 'formule_young' ]['explanation'] ?></div></span><?= $item_date['formule_young']['price'] ?> €</div>
	            <?php } ?>
            </div>
            <div class="dates">
                <h2 class="title">Dates</h2>
                <form class="wrapper-btn" action="<?= site_url() ?>/inscription" method="post" id="date_single">
                    <div class="wrapper">
                        <input hidden name="cycle" value="<?= str_replace(' ', '_', the_title()) ?>">
						<?php $date = get_field( 'date_array' );
						foreach ( $date as $key_date => $item_date ) { ?>
                            <label><input class="btn-link" name="date" type="radio" value="<?= $item_date['date'] ?>" <?= $item_date['date'] == $_POST['date'] ? 'checked' : '' ?>><span><span><?= $item_date['date'] ?></span></span></label>
							<?php if ( $key_date != count( $date ) - 1 ) { ?>
                                <p>ou</p>
							<?php } ?>
						<?php } ?>
                    </div>
                    <button class="btn-link"><span>Inscription</span></button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>
