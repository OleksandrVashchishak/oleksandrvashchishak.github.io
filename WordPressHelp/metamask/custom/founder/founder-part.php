<?php
  /**
   * Founder section
   */
//themes/legends/store.php 
if (!defined('LOAD_DB_CONNECT_MM')){
	define('LOAD_DB_CONNECT_MM',1); //comment because have problem with WP debug (Already defined in metamask-functions.php)
}
//require_once(__DIR__ . '/store-settings.php');
// require_once(__DIR__ . '/metamask-db-connect.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/wp-content/themes/legends/custom/store/store-settings.php');

?>

<section class="founder_section">
  <div class="founder_container">
    <h2 class="founder_heading wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.5s">INVEST EARLY AND GAIN BENEFITS</h2>
    <p class="founder_subheading wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.7s">FOUNDER’S SALE: 10 Dec - 10 Jan</p>

    <!-- Founder items -->
    <div class="founder_items">
      <div class="founder_item wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.8s">
        <h3 class="founder_item__heading founder_item__heading_orange">GUARANTEED LEGENDARY (4<span class="fa-star"></span>)</h3>
        <p class="founder_item__price"><?php if ($GLOBALS['hide_matic_price']==1){echo 'COMING SOON';}else{?><?php echo number_format($GLOBALS['store_t4_price'],0); ?> <?php echo $GLOBALS['store_mint_currency'] ?> <img class="matic_icon" src="<?php echo get_template_directory_uri() . '/custom/store/assets/img/polygon-matic-logo.png'; ?>"><?php }?></p>
        <a href="https://www.cyborglegends.io/store/" title="Go to Minting/Store page">
		<div class="store_btn store_demon__btn store_demon__orange">
          <span>Buy Now</span>
        </div>
		</a>
        <div class="founder_item__video">
          <div class="sale_label">
            <span>Sale<br> <span class="sale_label__discount">- 20%</span></span>
          </div>
          <img class="founder_item__img" src="<?php echo get_site_url() . '/wp-content/uploads/2021/11/demon_4s-1.jpg'; ?>" />
        </div>

        <h4 class="founder_text sale_price">Recommended sale price:</h4>
        <p class="founder_text founder_price">&gt; <?php if ($GLOBALS['hide_matic_recommended']==1){}else{?><span class="founder_matic_price"><?=number_format($GLOBALS['store_t4_price_rec_matic'],0)?></span> <?php echo $GLOBALS['store_mint_currency'] ?> <img class="matic_icon" src="<?php echo get_template_directory_uri() . '/custom/store/assets/img/polygon-matic-logo.png'; ?>" /> = <?php }?><span class="founder_dollar_price"><?=($GLOBALS['store_t4_price_rec'])?></span>$</p>
        <div class="founder_demon__numbers">
          <span class="leave">48</span> of <span class="total">48</span> remaining
        </div>
      </div>

      <div class="founder_item wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.9s">
        <h3 class="founder_item__heading founder_item__heading_blue">Mystery box</h3>
        <p class="founder_item__price"><?php if ($GLOBALS['hide_matic_price']==1){echo 'COMING SOON';}else{?><?php echo number_format($GLOBALS['store_box_price'],0,'.',''); ?> <?php echo $GLOBALS['store_mint_currency'] ?> <img class="matic_icon" src="<?php echo get_template_directory_uri() . '/custom/store/assets/img/polygon-matic-logo.png'; ?>"><?php }?></p>
        <a href="https://www.cyborglegends.io/store/" title="Go to Minting/Store page">
		<div class="store_btn store_demon__btn store_demon__blue">
          <span>Buy Now</span>
        </div>
		</a>
        <div class="founder_item__video">
          <div class="sale_label">
            <span>Sale<br> <span class="sale_label__discount">- <?=$GLOBALS['store_early_bird_discount']?>%</span></span>
          </div>
          <video class="store-video founder-video" muted loop playsinline src="<?php echo get_site_url(). '/wp-content/uploads/2021/11/chest-animation-noborderv3.mp4'; ?>"></video>
        </div>

        <h4 class="founder_text sale_price">Potential value of your assets:</h4>
        <p class="founder_text founder_price">550$ - 25.000$</p>
      </div>

      <div class="founder_item wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="1s">
        <h3 class="founder_item__heading founder_item__heading_purple">GUARANTEED ASCENDED (5<span class="fa-star"></span>)</h3>
        <p class="founder_item__price"><?php if ($GLOBALS['hide_matic_price']==1){echo 'COMING SOON';}else{?><?php echo number_format($GLOBALS['store_t5_price'],0) ?> <?php echo $GLOBALS['store_mint_currency'] ?> <img class="matic_icon" src="<?php echo get_template_directory_uri() . '/custom/store/assets/img/polygon-matic-logo.png'; ?>"><?php }?></p>
        <a href="https://www.cyborglegends.io/store/" title="Go to Minting/Store page">
		<div class="store_btn store_demon__btn store_demon__purple">
          <span>Buy Now</span>
        </div>
		</a>
        <div class="founder_item__video">
          <div class="sale_label">
            <span>Sale<br> <span class="sale_label__discount">- 20%</span></span>
          </div>
          <video class="store-video founder-video" muted loop playsinline src="<?php echo get_site_url(). '/wp-content/uploads/2021/11/ascended_v6-mini.mp4'; ?>"></video>
        </div>

        <h4 class="founder_text sale_price">Recommended sale price:</h4>
        <p class="founder_text founder_price">&gt; <?php if ($GLOBALS['hide_matic_recommended']==1){}else{?><span class="founder_matic_price"><?php echo number_format($GLOBALS['store_t5_price_rec_matic'],0)?></span> <?php echo $GLOBALS['store_mint_currency'] ?> <img class="matic_icon" src="<?php echo get_template_directory_uri() . '/custom/store/assets/img/polygon-matic-logo.png'; ?>" /> = <?php }?><span class="founder_dollar_price"><?=($GLOBALS['store_t5_price_rec'])?></span>$</p>
        <div class="founder_demon__numbers">
          <span class="leave">16</span> of <span class="total">16</span> remaining
        </div>
      </div>
    </div>
    
    <div class="founder_btn__row wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.5s">
      <div id="founder_popup" class="community_block__btn store_btn">Read More</div>
    </div>
  </div>
</section>

<!-- Founder popup -->
<div class="founder_popup">
  <span class="fa-close"></span>
  <div class="matic_popup__wrapper founder_popup__wrapper">
    <ul class="popup_list">
      <li>Invest early and access prices with 50% discount for the NFT mystery box; <br>Current price: ~250$ ; Estimated market value: 500$ </li>
      <li>You will get a guaranteed unique NFT, belonging to one of the following tiers: Rare, Epic, Legendary or Ascended;</li>
      <li>This sale comes with the BEST draw rates: No Common NFTs in this sale!</li>
      <li>Get a chance to win a Legendary NFT (recommended sale price: 7,000$) or an Ascended NFT (recommended sale price: 25,000$) from the Mystery Box;</li>
      <li>Get a chance to win one of the unique 250 Avatar NFTs (limited edition); <br>Recommended sale price: 250$
        <div class="list_images">
          <div class="list_images__item">
            <img src="<?php echo get_template_directory_uri(). '/assets/img/avatar_golden.png'; ?>" alt="Avatar Golden" />
          </div>
          <div class="list_images__item">
            <img src="<?php echo get_template_directory_uri(). '/assets/img/avatar_interblock.png'; ?>" alt="Avatar Interblock" />
          </div>
          <div class="list_images__item">
            <img src="<?php echo get_template_directory_uri(). '/assets/img/avatar_leo.png'; ?>" alt="Avatar Leo" />
          </div>
        <div>
      </li>
      <li>Get a guaranteed limited edition Rune NFT (you will receive this when the game will be launched. Only 10,000 pieces will be minted); <br>Recommended sale price: 50$
        <div class="list_images list_images_single">
          <div class="list_images__item">
            <img src="<?php echo get_template_directory_uri(). '/assets/img/rune.png'; ?>" alt="Rune" />
          </div>
        </div>
      </li>
    </ul>
    <p class="popup_content">Total investment: <span class="span_green">250$</span><br>Guaranteed value of your assets: <span class="span_green">550$</span><br>Potential value of your assets: <span class="span_green">550$</span> - <span class="span_green">25,000$</span></p>
  </div>
</div>