<?php
//Variables
$GLOBALS['hide_matic_recommended'] = 1;
$GLOBALS['hide_matic_price'] = 1;
$GLOBALS['store_early_bird_discount'] = 50;
$GLOBALS['store_mint_currency'] = 'MATIC';
$GLOBALS['store_matic_price'] = 1.7;//USD
$GLOBALS['store_target_price'] = 250;//USD

$GLOBALS['store_t4_box_multiplier'] = 7 - 1;
$GLOBALS['store_t5_box_multiplier'] = $GLOBALS['store_t4_box_multiplier']*4 - 1;

$GLOBALS['store_box_price'] = $GLOBALS['store_target_price']/$GLOBALS['store_matic_price'];
$GLOBALS['store_t4_price'] = 5000/$GLOBALS['store_matic_price'];
$GLOBALS['store_t5_price'] = 20000/$GLOBALS['store_matic_price'];

$GLOBALS['store_t4_price_rec'] = 7000/$GLOBALS['store_matic_price'];
$GLOBALS['store_t5_price_rec'] = 25000/$GLOBALS['store_matic_price'];

$GLOBALS['store_box_price'] = 200;//price in MATIC
$GLOBALS['store_t4_price'] = 5000;//price in MATIC
$GLOBALS['store_t5_price'] = 20000;//price in MATIC

$GLOBALS['store_t4_price_rec_matic'] = $GLOBALS['store_t4_price']*1.2;//price in MATIC
$GLOBALS['store_t5_price_rec_matic'] = $GLOBALS['store_t5_price']*1.2;//price in MATIC
$GLOBALS['store_t4_price_rec'] = 6500;//price in USD
$GLOBALS['store_t5_price_rec'] = 25000;//price in USD
?>