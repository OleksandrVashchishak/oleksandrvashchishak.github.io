<?php
//themes/legends/store.php 
if (!defined('LOAD_DB_CONNECT_MM')){
	define('LOAD_DB_CONNECT_MM',1); //comment because have problem with WP debug (Already defined in metamask-functions.php)
}
//require_once(__DIR__ . '/store-settings.php');
// require_once(__DIR__ . '/metamask-db-connect.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/wp-content/themes/legends/custom/store/store-settings.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/wp-content/themes/legends/custom/metamask/metamask-db-connect.php');

?>
<?php
if (isset($_SESSION['userid'])){
?>
<!-- Install this snippet AFTER the Hotjar tracking code. -->
<script>
var userId = <?=$_SESSION['userid']?>; // Replace your_user_id with your own if available.
window.hj('identify', userId, {
    // Add your own custom attributes here. Some EXAMPLES:
    'Signed up': '<?=date(DATE_ISO8601, strtotime($_SESSION['user_data']['created']));?>', // Signup date in ISO-8601 format.
	'RefererWebsite':'<?=htmlspecialchars($_SESSION['user_data']['ref_website'], ENT_QUOTES, 'UTF-8');?>',
    // 'Last purchase category': 'Electronics', // Send strings with quotes around them.
    // 'Total purchases': 15, // Send numbers without quotes.
    // 'Last purchase date': '2019-06-20Z', // Send dates in ISO-8601 format.
    // 'Last refund date': null, // Send null when no value exists for a user.
});
</script>

<?php
}
?>
<!-- Main Mint section -->
<section class="store_hero" style="background: url('<?php echo get_template_directory_uri() . '/custom/store/assets/img/store-hero.png'; ?>') no-repeat;">
  <div class="store_container">
    <div class="store_hero__row">
      <div class="store_hero__image wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.5s">
		<!--
        <img src="<?php echo get_template_directory_uri() . '/custom/store/assets/img/store-hero-nft.png'; ?>" alt="Cyborg Legends Mystery Box">
		-->
		<video class="store-video lazyloaded" style="width:75%;height:auto" muted loop playsinline src="<?='https://www.cyborglegends.io'?>/wp-content/uploads/2021/11/chest-animation-noborderv3.mp4"></video>
      </div>
      <div class="store_hero__content">
        <div id="store_timer" class="store_hero__timer wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.5s">
          <div id="days">
            <span class="timer_counter"></span>
            <span class="timer_label">Days</span>
          </div>
          <div id="hours">
            <span class="timer_counter"></span>
            <span class="timer_label">Hours</span>
          </div>
          <div id="minutes">
            <span class="timer_counter"></span>
            <span class="timer_label">Mins</span>
          </div>
          <div id="seconds">
            <span class="timer_counter"></span>
            <span class="timer_label">Secs</span>
          </div>
        </div>
        <h1 class="store_hero__heading wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.5s">Mystery Box</h1>

        <p class=" wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.6s"><span class="store_hero__heading" style="font-size:26px;font-weight:bold">Founder's Sale period: 10 Dec 2021 – 10 Jan 2022</span>
          <br /><span class="store_hero__desc">Benefits: <span style="color:red;font-weight:bold"><?=$GLOBALS['store_early_bird_discount']?>%</span> discount, best rarity rates, free NFT rune, *NFT Avatar giveaway</span>
        </p>

        <p class="store_hero__desc wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.7s">Each Mystery Box contains a random NFT Character. <br class="sm_hidden">You can use these NFTs to play <strong>Cyborg Legends</strong> AutoBattler RPG and earn money, when the game will be released.</p>
        <div class="store_hero__progress wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.8s">
          <span class="store_hero__progress_label store_label">Number of boxes sold: <span class="store_leave_nft">0</span>/<span class="store_total_nft">10000</span></span>
          <div class="store_hero__progress_line">
            <span class="store_hero__progress_line_active"></span>
          </div>
        </div>

        <form action="#" method="POST">
          <div class="store_hero__price wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.8s">
            <div class="store_hero__price_box">
              <p class="store_hero__price_label store_label">Mystery Box Price</p>
              <span class="store_hero__price_eth"><?php if ($GLOBALS['hide_matic_price']==1){echo '-';}else{?><?php echo number_format($GLOBALS['store_box_price'],0,'.',''); ?><?php }?> <a href="https://coinmarketcap.com/currencies/polygon/markets/" target="_blank"><?php echo $GLOBALS['store_mint_currency']; ?> <img class="matic_icon" src="<?php echo get_template_directory_uri() . '/custom/store/assets/img/polygon-matic-logo.png'; ?>" style="height:46px;max-width:46px;width:auto;" /></a> </span><br />

              <span class="store_hero__price_dollar" style="color:#00BC00;">cost will be equivalent of $<?php echo $GLOBALS['store_target_price']; ?>, paid in MATIC</span>
            </div>
            <div class="store_hero__price_quinity">
              <p class="store_hero__price_label store_label">Quantity</p>
              <div class="store_input_wrap">
                <input class="store_input number_input" id="quinity_nft" type="number" placeholder="1">
              </div>
            </div>
          </div>

          <p style="display:none" class="store_form__desc wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.5s">Click “Approve” before the sale starts. Your wallet will be prepared for faster transactions.</p>
          <br />
          <button class="store_btn store_form__btn wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.5s" type="submit">MINT NOW</button>

          <div class="store_form__bottom wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.5s">
            <div class="store_form__balance">
              <div class="store_form__balance_elem">
                <span class="store_form__balance_lable">My Wallet Balance:</span> <span class="store_form__balance_eth store_form__balance_eth_wallet">-</span> <img class="matic_icon matic_icon__balance" style="height:13px;width:auto; display: none;" src="<?php echo get_template_directory_uri() . '/custom/store/assets/img/polygon-matic-logo.png'; ?>" />
              </div>
              <div class="store_form__balance_elem">
                <div class="store_form__balance_lable" id="matic_popup">How to get MATIC?</div>
              </div>

              <div class="store_form__balance_elem" style="display:none">
                <span class="store_form__balance_lable">Total:</span>
                <span class="store_form__balance_eth">128 MATIC</span>
              </div>
            </div>
            <div class="store_form__account">
              <a href="#" class="store_account_link">View Transaction History</a>
            </div>

          </div>
        </form>
        <span style="font-size:14px" class="wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.7s">*We will give 250 Unique NFT Avatars to 250 lucky buyers.</span>
      </div>
    </div>
  </div>
</section>


<!-- Store Mystery section -->
<section class="store_mystery" style="background: url('https://www.cyborglegends.io/wp-content/uploads/2021/11/planets_v3.jpg') no-repeat;">
  <div class="store_container">
    <div class="store_mystery__row">
      <h3 class="store_mystery__heading wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.5s">Mystery Box Description</h3>
      <p class="store_mystery__desc wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.6s">When you purchase a Mystery Box, you will receive a RANDOM rarity NFT character belonging to one of the 8 clans listed below. You will not know which collectible you will get until after payment and reveal date. You can use these NFT Characters to play Cyborg Legends RPG (after the game will be released), trade them on any marketplace or simply keep them for your collection. Please note that this founder's sale has a <span style="color:red;font-weight:bold">50%</span> discount included.</p>
      <p class="store_mystery__desc wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.7s">During this sale, we will be selling a total of 10,000 Mystery Boxes, corresponding to 10,000 Unique Characters, each of them coming in 5 levels of rarity: Common, Uncommon, Rare, Epic, Ascended</p>
      <h4 class="store_mystery__heading store_mystery__clans wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.8s">8 Clans to be sold</h4>

      <div class="store_mystery__grid">
        <div class="store_mystery__item wow fadeInLeft" data-wow-duration="0.8s" data-wow-delay="0.5s">
          <div class="store_mystery__item_figure"></div>
          <div class="store_mystery__item_img">
            <img src="<?php echo get_template_directory_uri() . '/custom/store/assets/img/mystery-img-human.png'; ?>" alt="Mystery Box 1">
          </div>
        </div>
        <div class="store_mystery__item wow fadeInLeft" data-wow-duration="0.8s" data-wow-delay="0.6s">
          <div class="store_mystery__item_figure"></div>
          <div class="store_mystery__item_img">
            <img src="<?php echo get_template_directory_uri() . '/custom/store/assets/img/mystery-img-high-elf.png'; ?>" alt="Mystery Box 2">
          </div>
        </div>
        <div class="store_mystery__item wow fadeInLeft" data-wow-duration="0.8s" data-wow-delay="0.7s">
          <div class="store_mystery__item_figure"></div>
          <div class="store_mystery__item_img">
            <img src="<?php echo get_template_directory_uri() . '/custom/store/assets/img/mystery-img-dwarf.png'; ?>" alt="Mystery Box 3">
          </div>
        </div>
        <div class="store_mystery__item wow fadeInLeft" data-wow-duration="0.8s" data-wow-delay="0.8s">
          <div class="store_mystery__item_figure"></div>
          <div class="store_mystery__item_img">
            <img src="<?php echo get_template_directory_uri() . '/custom/store/assets/img/mystery-img-treant.png'; ?>" alt="Mystery Box 4">
          </div>
        </div>
        <div class="store_mystery__item wow fadeInLeft" data-wow-duration="0.8s" data-wow-delay="0.9s">
          <div class="store_mystery__item_figure"></div>
          <div class="store_mystery__item_img">
            <img src="<?php echo get_template_directory_uri() . '/custom/store/assets/img/mystery-img-dark-elf.png'; ?>" alt="Mystery Box 5">
          </div>
        </div>
        <div class="store_mystery__item wow fadeInLeft" data-wow-duration="0.8s" data-wow-delay="0.5s">
          <div class="store_mystery__item_figure"></div>
          <div class="store_mystery__item_img">
            <img src="<?php echo get_template_directory_uri() . '/custom/store/assets/img/mystery-img-undead.png'; ?>" alt="Mystery Box 6">
          </div>
        </div>
        <div class="store_mystery__item wow fadeInLeft" data-wow-duration="0.8s" data-wow-delay="0.6s">
          <div class="store_mystery__item_figure"></div>
          <div class="store_mystery__item_img">
            <img src="<?php echo get_template_directory_uri() . '/custom/store/assets/img/mystery-img-demon.png'; ?>" alt="Mystery Box 7">
          </div>
        </div>
        <div class="store_mystery__item wow fadeInLeft" data-wow-duration="0.8s" data-wow-delay="1.2s">
          <div class="store_mystery__item_figure"></div>
          <div class="store_mystery__item_img">
            <img src="<?php echo get_template_directory_uri() . '/custom/store/assets/img/mystery-img-orc.png'; ?>" alt="Mystery Box 8">
          </div>
        </div>
      </div>

      <p style="display:none" class="store_mystery__desc_info wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.5s">There will be 10,000 unique looking characters. Each character can come in 5 rarity levels as described below<br />The higher the rarity of the NFT Character, the lower the probability of its appearance.</h4>
    </div>
  </div>
</section>


<!-- Guaranteed NFTs section -->
<section class="store_demon" style="background: url('<?php echo get_template_directory_uri() . '/custom/store/assets/img/store-demon-bg.jpg'; ?>') no-repeat;">
  <div class="store_container">
    <div class="store_demon__row">
      <div class="store_demon__col store_demon__col_orange wow fadeInLeft" data-wow-duration="0.8s" data-wow-delay="0.5s">
        <!--<h4 class="store_demon__heading">GUARANTEED<br />LEGENDARY (4*)</h4>-->
		<h3 class="store_item__heading store_item__heading_orange">GUARANTEED LEGENDARY (4<span class="fa-star store_fa-star"></span>)</h3> 
		  
		<h5 class="store_demon__price"><?php if ($GLOBALS['hide_matic_price']==1){echo 'COMING SOON';}else{?><?php echo number_format($GLOBALS['store_t4_price'],0); ?> <?php echo $GLOBALS['store_mint_currency'] ?> <img class="matic_icon" src="<?php echo get_template_directory_uri() . '/custom/store/assets/img/polygon-matic-logo.png'; ?>" style="height:29px;width:auto" /><?php }?></h5>
		
		<div class="store_btn store_demon__btn store_demon__orange">
          <span>Buy Now</span>
        </div>  
		<br />
        <div class="store_demon__img">
          <img src="<?php echo get_template_directory_uri() . '/custom/store/assets/img/store-legendary.jpg'; ?>" alt="LEGENDARY (4*)">
        </div>
        
		  
        <h4>Recommended sale price:<br />&gt; <?php if ($GLOBALS['hide_matic_recommended']==1){}else{?><?php echo number_format($GLOBALS['store_t4_price_rec_matic'],0) . ' ' . $GLOBALS['store_mint_currency'] ?> <img class="matic_icon" src="<?php echo get_template_directory_uri() . '/custom/store/assets/img/polygon-matic-logo.png'; ?>" style="height:16px;width:auto" /> = <?php }?><?php echo ($GLOBALS['store_t4_price_rec']) . '$' ?></h4>
        <div class="store_demon__numbers">
          <span class="leave">48</span> of <span class="total">48</span> remaining
        </div>

        
      </div>

      <div class="store_demon__col store_demon__col_blue wow fadeInRight" data-wow-duration="0.8s" data-wow-delay="0.5s">
        <!--<h4 class="store_demon__heading">GUARANTEED<br />ASCENDED (5*)</h4>-->
		<h3 class="store_item__heading store_item__heading_purple">GUARANTEED ASCENDED (5<span class="fa-star store_fa-star"></span>)</h3>
		
		<h5 class="store_demon__price"><?php if ($GLOBALS['hide_matic_price']==1){echo 'COMING SOON';}else{?><?php echo number_format($GLOBALS['store_t5_price'],0) ?> <?php echo $GLOBALS['store_mint_currency'] ?><img class="matic_icon" src="<?php echo get_template_directory_uri() . '/custom/store/assets/img/polygon-matic-logo.png'; ?>" style="height:29px;width:auto" /> <?php }?></h5>
		  
		<div class="store_btn store_demon__btn store_demon__blue">
          <span>Buy Now</span>
        </div>  
		<br />
		  
        <div class="store_demon__img store_demon__img_asc">
          <!--<img src="<?php echo get_template_directory_uri() . '/custom/store/assets/img/store-ascended.jpg'; ?>" alt="ASCENDED (5*)">-->
		  <video class="store-video store_demon__video_asc lazyloaded" muted loop playsinline src="<?='https://www.cyborglegends.io/wp-content/uploads/2021/11/ascended_v6-mini.mp4'?>"></video>
        </div>
        
        <h4>Recommended sale price:<br />&gt; <?php if ($GLOBALS['hide_matic_recommended']==1){}else{?><?php echo number_format($GLOBALS['store_t4_price_rec_matic'],0) . ' ' . $GLOBALS['store_mint_currency'] ?> <img class="matic_icon" src="<?php echo get_template_directory_uri() . '/custom/store/assets/img/polygon-matic-logo.png'; ?>" style="height:16px;width:auto" /> = <?php }?><?php echo ($GLOBALS['store_t5_price_rec']) . '$' ?></h4>
        <div class="store_demon__numbers">
          <span class="leave">16</span> of <span class="total">16</span> remaining
        </div>

        
      </div>

    </div>
  </div>
</section>


<!-- Store affiliate program -->
<section class="store_program" id="affiliate_program">
  <div class="store_container">
    <div class="store_program__row">
      <div class="store_program__head">
        <h3 class="store_program__head_heading wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.5s">Affiliate Program</h3>
        <p class="store_program__head_desc wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.7s">Refer your friends to buy Cyborg Legends Mystery Boxes on our Store to earn an 5% commission from their purchase.</p>
      </div>

      <div class="store_program__col wow fadeInLeft" data-wow-duration="0.8s" data-wow-delay="0.5s">
        <h4 class="program_heading">Step-by-step</h4>
        <ul class="program_list">
          <li class="program_list__item">
            <span class="program_list__step">Step 1</span>
            <span class="program_list__desc">Go to <a href="<?='https://'.$_SERVER['SERVER_NAME']?>/store/">https://www.cyborglegends.io/store/</a>.</span>
          </li>
          <li class="program_list__item">
            <span class="program_list__step">Step 2</span>
            <span class="program_list__desc">Connect your MetaMask wallet.</span>
          </li>
          <li class="program_list__item">
            <span class="program_list__step">Step 3</span>
            <span class="program_list__desc">Copy your referral link and share it with your friends.</span>
          </li>
          <li class="program_list__item">
            <span class="program_list__step">Step 4</span>
            <span class="program_list__desc">For each Mystery Box your referred players purchase, you will earn a 5% commission, equivalent to <?php echo number_format($GLOBALS['store_box_price'] * 5 / 100, 2, '.', '') ?> <?php echo $GLOBALS['store_mint_currency'] ?> as the price of a Mystery Box is <?php echo number_format($GLOBALS['store_box_price'],0); ?> <?php echo $GLOBALS['store_mint_currency'] ?>.</span>
          </li>
        </ul>
      </div>

      <div class="store_program__col wow fadeInRight" data-wow-duration="0.8s" data-wow-delay="0.5s">
        <h4 class="program_heading">Extra prize pool</h4>
        <?php
        $total_funds = 0.1 * (25 - 3) + 1 * 3 + 1 * 2.5 + 1 * 1.5;
        ?>
        <p class="program_description"><?php echo number_format($GLOBALS['store_target_price'] / $GLOBALS['store_matic_price'] * $total_funds,0); ?> <?php echo $GLOBALS['store_mint_currency'] ?> prize pool for the top 25 promoters with the highest number of successfully referred transactions.</p>
        <div class="program_divider"></div>
        <ul class="program_list">
          <li class="program_list__item">
            <span class="program_list__step">Top 1 promoter:</span>
            <span class="program_list__desc"><?php echo number_format($GLOBALS['store_target_price'] / $GLOBALS['store_matic_price'] * 3,0); ?> <?php echo $GLOBALS['store_mint_currency'] ?></span>
          </li>
          <li class="program_list__item">
            <span class="program_list__step">Top 2 promoter:</span>
            <span class="program_list__desc"><?php echo number_format($GLOBALS['store_target_price'] / $GLOBALS['store_matic_price'] * 2.5,0); ?> <?php echo $GLOBALS['store_mint_currency'] ?></span>
          </li>
          <li class="program_list__item">
            <span class="program_list__step">Top 3 promoter:</span>
            <span class="program_list__desc"><?php echo number_format($GLOBALS['store_target_price'] / $GLOBALS['store_matic_price'] * 1.5,0); ?> <?php echo $GLOBALS['store_mint_currency'] ?></span>
          </li>
          <li class="program_list__item">
            <span class="program_list__step">Top 4 - 25 promoter:</span>
            <span class="program_list__desc"><?php echo number_format($GLOBALS['store_target_price'] / $GLOBALS['store_matic_price'] * 0.1,0); ?> <?php echo $GLOBALS['store_mint_currency'] ?> each</span>
          </li>
        </ul>
      </div>

      <div class="store-affiliate-dynamic-wrapper">
        <?php require_once(__DIR__ . '/store-affiliate-dynamic.php'); ?>
      </div>

   
    </div>
  </div>
</section>


<!-- Specifications section  -->
<section class="store_info">
  <div class="store_container">
    <div class="store_info__row">
      <div class="store_info__specs wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.5s">
        <h3 class="store_info__specs_heading">Specifications</h3>
        <div class="store_info__specs_item">
          <span class="store_info__specs_label">Total amount on sale:</span>
          <span class="store_info__specs_content">10 000 Mystery Boxes<br /> 48 Guaranteed Legendary (4*)<br /> 16 Guaranteed Ascended (5*)</span>
        </div>
        <div class="store_info__specs_item">
          <span class="store_info__specs_label">Max. quantity purchased/person:</span>
          <span class="store_info__specs_content">No Limit</span>
        </div>
        <div class="store_info__specs_item">
          <span class="store_info__specs_label">Commission rate for promoters:</span>
          <span class="store_info__specs_content">5% per Mystery Box sold</span>
        </div>
      </div>
	
		
		
      <!-- Rarity table -->
      <div class="store_info__rarity_wrap wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.5s" style="margin-top:40px">
		<h3 class="store_info__specs_heading" style="text-align: center">Mystery Box Chances</h3>
        <div class="store_info__rarity">
          <div class="store_info__rarity_col rarity_level">
            <h4 class="store_info__rarity_heading">Rarity level</h4>
            <div class="store_info__rarity_elem rarity_with_figure rarity_grey">
              <div class="store_info__rarity_figure">
                <svg width="318" height="81" viewBox="0 0 318 81" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M317 79V80H316H64.8755H64.6324L64.4164 79.8884L60.5656 77.898H2H1V76.898V2V1H2H226.707H226.95L227.166 1.11162L232.68 3.9609H316H317V4.9609V79ZM65.2631 77.8198H314.651V6.14111H232.292H232.049L231.833 6.0295L226.32 3.18021H3.34872V75.7178H60.9532H61.1963L61.4123 75.8294L65.2631 77.8198Z" fill="url(#paint0_linear_820:282)" stroke="url(#paint1_linear_820:282)" stroke-width="2" />
                  <defs>
                    <linearGradient id="paint0_linear_820:282" x1="60.9578" y1="79" x2="233.113" y2="-13.0234" gradientUnits="userSpaceOnUse">
                      <stop stop-color="#C9CACF" />
                      <stop offset="1" stop-color="#A0A0A2" />
                    </linearGradient>
                    <linearGradient id="paint1_linear_820:282" x1="60.9578" y1="79" x2="233.113" y2="-13.0234" gradientUnits="userSpaceOnUse">
                      <stop stop-color="#C9CACF" />
                      <stop offset="1" stop-color="#A0A0A2" />
                    </linearGradient>
                  </defs>
                </svg>
              </div>
              <span class="store_info__rarity_label">COMMON</span>
            </div>

            <div class="store_info__rarity_elem rarity_with_figure rarity_green">
              <div class="store_info__rarity_figure">
                <svg width="318" height="81" viewBox="0 0 318 81" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M317 79V80H316H64.8755H64.6324L64.4164 79.8884L60.5656 77.898H2H1V76.898V2V1H2H226.707H226.95L227.166 1.11162L232.68 3.9609H316H317V4.9609V79ZM65.2631 77.8198H314.651V6.14111H232.292H232.049L231.833 6.0295L226.32 3.18021H3.34872V75.7178H60.9532H61.1963L61.4123 75.8294L65.2631 77.8198Z" fill="url(#paint0_linear_820:287)" stroke="url(#paint1_linear_820:287)" stroke-width="2" />
                  <defs>
                    <linearGradient id="paint0_linear_820:287" x1="60.9578" y1="79" x2="233.113" y2="-13.0234" gradientUnits="userSpaceOnUse">
                      <stop stop-color="#41AA40" />
                      <stop offset="1" stop-color="#4FFE4D" />
                    </linearGradient>
                    <linearGradient id="paint1_linear_820:287" x1="60.9578" y1="79" x2="233.113" y2="-13.0234" gradientUnits="userSpaceOnUse">
                      <stop stop-color="#41AA40" />
                      <stop offset="1" stop-color="#4FFE4D" />
                    </linearGradient>
                  </defs>
                </svg>
              </div>
              <span class="store_info__rarity_label">RARE</span>
            </div>

            <div class="store_info__rarity_elem rarity_with_figure rarity_mint">
              <div class="store_info__rarity_figure">
                <svg width="318" height="81" viewBox="0 0 318 81" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M317 79V80H316H64.8755H64.6324L64.4164 79.8884L60.5656 77.898H2H1V76.898V2V1H2H226.707H226.95L227.166 1.11162L232.68 3.9609H316H317V4.9609V79ZM65.2631 77.8198H314.651V6.14111H232.292H232.049L231.833 6.0295L226.32 3.18021H3.34872V75.7178H60.9532H61.1963L61.4123 75.8294L65.2631 77.8198Z" fill="url(#paint0_linear_820:292)" stroke="url(#paint1_linear_820:292)" stroke-width="2" />
                  <defs>
                    <linearGradient id="paint0_linear_820:292" x1="60.9578" y1="79" x2="233.113" y2="-13.0234" gradientUnits="userSpaceOnUse">
                      <stop stop-color="#2BCAE8" />
                      <stop offset="1" stop-color="#00D7FF" />
                    </linearGradient>
                    <linearGradient id="paint1_linear_820:292" x1="60.9578" y1="79" x2="233.113" y2="-13.0234" gradientUnits="userSpaceOnUse">
                      <stop stop-color="#2BCAE8" />
                      <stop offset="1" stop-color="#00D7FF" />
                    </linearGradient>
                  </defs>
                </svg>
              </div>
              <span class="store_info__rarity_label">EPIC</span>
            </div>

            <div class="store_info__rarity_elem rarity_with_figure rarity_red">
              <div class="store_info__rarity_figure">
                <svg width="318" height="81" viewBox="0 0 318 81" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M317 79V80H316H64.8755H64.6324L64.4164 79.8884L60.5656 77.898H2H1V76.898V2V1H2H226.707H226.95L227.166 1.11162L232.68 3.9609H316H317V4.9609V79ZM65.2631 77.8198H314.651V6.14111H232.292H232.049L231.833 6.0295L226.32 3.18021H3.34872V75.7178H60.9532H61.1963L61.4123 75.8294L65.2631 77.8198Z" fill="url(#paint0_linear_820:297)" stroke="url(#paint1_linear_820:297)" stroke-width="2" />
                  <defs>
                    <linearGradient id="paint0_linear_820:297" x1="60.9578" y1="79" x2="233.113" y2="-13.0234" gradientUnits="userSpaceOnUse">
                      <stop stop-color="#E8602C" />
                      <stop offset="1" stop-color="#FF5818" />
                    </linearGradient>
                    <linearGradient id="paint1_linear_820:297" x1="60.9578" y1="79" x2="233.113" y2="-13.0234" gradientUnits="userSpaceOnUse">
                      <stop stop-color="#E8602C" />
                      <stop offset="1" stop-color="#FF5818" />
                    </linearGradient>
                  </defs>
                </svg>
              </div>
              <span class="store_info__rarity_label">LEGENDARY</span>
            </div>

            <div class="store_info__rarity_elem rarity_with_figure rarity_purple">
              <div class="store_info__rarity_figure">
                <svg width="318" height="81" viewBox="0 0 318 81" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M317 79V80H316H64.8755H64.6324L64.4164 79.8884L60.5656 77.898H2H1V76.898V2V1H2H226.707H226.95L227.166 1.11162L232.68 3.9609H316H317V4.9609V79ZM65.2631 77.8198H314.651V6.14111H232.292H232.049L231.833 6.0295L226.32 3.18021H3.34872V75.7178H60.9532H61.1963L61.4123 75.8294L65.2631 77.8198Z" fill="url(#paint0_linear_820:302)" stroke="url(#paint1_linear_820:302)" stroke-width="2" />
                  <defs>
                    <linearGradient id="paint0_linear_820:302" x1="60.9578" y1="79" x2="233.113" y2="-13.0234" gradientUnits="userSpaceOnUse">
                      <stop stop-color="#814EB1" />
                      <stop offset="1" stop-color="#9939F3" />
                    </linearGradient>
                    <linearGradient id="paint1_linear_820:302" x1="60.9578" y1="79" x2="233.113" y2="-13.0234" gradientUnits="userSpaceOnUse">
                      <stop stop-color="#814EB1" />
                      <stop offset="1" stop-color="#9939F3" />
                    </linearGradient>
                  </defs>
                </svg>
              </div>
              <span class="store_info__rarity_label">ASCENDED</span>
            </div>
          </div>

          <div class="store_info__rarity_col rarity_probability">
            <h4 class="store_info__rarity_heading">Probability</h4>
            <div class="store_info__rarity_elem">
              <span class="store_info__rarity_label">0.00%</span>
            </div>

            <div class="store_info__rarity_elem">
              <span class="store_info__rarity_label">71.50%</span>
            </div>

            <div class="store_info__rarity_elem">
              <span class="store_info__rarity_label">19.70%</span>
            </div>

            <div class="store_info__rarity_elem">
              <span class="store_info__rarity_label">8.67%</span>
            </div>

            <div class="store_info__rarity_elem">
              <span class="store_info__rarity_label">0.13%</span>
            </div>
          </div>

          <div class="store_info__rarity_col rarity_probability rarity_issue">
            <h4 class="store_info__rarity_heading">Total Available</h4>
            <div class="store_info__rarity_elem">
              <span class="store_info__rarity_label">0</span>
            </div>

            <div class="store_info__rarity_elem">
              <span class="store_info__rarity_label">7150</span>
            </div>

            <div class="store_info__rarity_elem">
              <span class="store_info__rarity_label">1970</span>
            </div>

            <div class="store_info__rarity_elem">
              <span class="store_info__rarity_label">867</span>
            </div>

            <div class="store_info__rarity_elem">
              <span class="store_info__rarity_label">13</span>
            </div>
          </div>
        </div>
      </div>
      <!-- /Rarity table end-->

      <div class="sale_goals">
        <h4 class="sale_goals__heading wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.5s">Sale Goals</h4>
        <div class="sale_goals__item wow fadeInLeft" data-wow-duration="0.8s" data-wow-delay="0.6s">
          <div class="sale_goals__icon">1</div>
          <p class="sale_goals__desc">If we will sell 10,000 Mystery Boxes in 7 days, then we will add 5,000 more Mystery Boxes on sale</p>
        </div>

        <div class="sale_goals__item wow fadeInLeft" data-wow-duration="0.8s" data-wow-delay="0.7s">
          <div class="sale_goals__icon">2</div>
          <p class="sale_goals__desc">If we will sell 15,000 NFTs in 10 days, then we will add 5,000 more Mystery Boxes on sale</p>
        </div>

        <div class="sale_goals__item wow fadeInLeft" data-wow-duration="0.8s" data-wow-delay="0.8s">
          <div class="sale_goals__icon">3</div>
          <p class="sale_goals__desc">If we will sell all 20,000 NFTs in 15 days, we will host some giveaways for Legendary and Ascended NFTs</p>
        </div>
      </div>

      <div class="community_block wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.5s">
        <div class="community_block__content">
          <p>Cyborg Legends - A fast paced AutoBattler RPG game on Polygon Network.</p>
        </div>
        <a href="https://www.discord.gg/CyborgLegends" class="community_block__btn store_btn" target="_blank">
          <span>JOIN DISCORD</span>
        </a>
      </div>
    </div>
  </div>
</section>

<div class="matic_popup">
  <span class="fa-close"></span>
  <div class="matic_popup__wrapper">
    <h4 class="popup_heading">If you have <strong>ETH</strong>, then you can quickly convert it into <strong>MATIC</strong> (in less than 1 minute), by simply using your MetaMask Wallet on this website: </h4>
    <a href="https://quickswap.exchange/#/swap" target="_blank" class="dapp_elem">
      <div class="dapp_elem__img">
        <img src="<?php echo get_template_directory_uri() . '/custom/store/assets/img/quick-swap-opt.png'; ?>" alt="QuickSwap">
      </div>
      <p class="dapp_elem__label">QuickSwap</p>
    </a>

    <a href="https://app.uniswap.org/#/swap" target="_blank" class="dapp_elem">
      <div class="dapp_elem__img">
        <img src="<?php echo get_template_directory_uri() . '/custom/store/assets/img/uniswap-opt.png'; ?>" alt="Uniswap">
      </div>
      <p class="dapp_elem__label">Uniswap</p>
    </a>
    <h4 class="popup_heading">Otherwise, you can buy MATIC using your credit card or using any other cryptocurrency (EG:ETH, BTC, DOGE, etc.), by creating an account on an exchange website like:</h4>
    <a href="https://www.binance.com" target="_blank" class="dapp_elem">
      <div class="dapp_elem__img">
        <svg xmlns="http://www.w3.org/2000/svg" height="300" width="300" viewBox="-52.785 -88 457.47 528">
          <path d="M79.5 176l-39.7 39.7L0 176l39.7-39.7zM176 79.5l68.1 68.1 39.7-39.7L176 0 68.1 107.9l39.7 39.7zm136.2 56.8L272.5 176l39.7 39.7 39.7-39.7zM176 272.5l-68.1-68.1-39.7 39.7L176 352l107.8-107.9-39.7-39.7zm0-56.8l39.7-39.7-39.7-39.7-39.8 39.7z" fill="#f0b90b" />
        </svg>
      </div>
      <p class="dapp_elem__label">Binance</p>
    </a>

    <a href="https://coinbase.com" target="_blank" class="dapp_elem">
      <div class="dapp_elem__img">
        <svg xmlns="http://www.w3.org/2000/svg" width="300" height="300" viewBox="0 0 1024 1024" fill="none">
          <rect width="1000" height="1000" rx="512" fill="#0052FF" />
          <path d="M512.147 692C412.697 692 332.146 611.45 332.146 512C332.146 412.55 412.697 332 512.147 332C601.247 332 675.197 396.95 689.447 482H870.797C855.497 297.2 700.846 152 512.147 152C313.396 152 152.146 313.25 152.146 512C152.146 710.75 313.396 872 512.147 872C700.846 872 855.497 726.8 870.797 542H689.297C675.047 627.05 601.247 692 512.147 692Z" fill="white" />
        </svg>
      </div>
      <p class="dapp_elem__label">Coinbase</p>
    </a>

    <a href="https://www.crypto.com" target="_blank" class="dapp_elem">
      <div class="dapp_elem__img">
        <img src="<?php echo get_template_directory_uri() . '/custom/store/assets/img/cro-opt.png'; ?>" alt="Crypto.com">
      </div>
      <p class="dapp_elem__label">Crypto.com</p>
    </a>

    <a href="https://www.kraken.com" target="_blank" class="dapp_elem">
      <div class="dapp_elem__img">
        <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" viewBox="0 0 429.8 337.7" width="300" height="300">
          <style>
            .st0 {
              fill: #0da8ff
            }
          </style>
          <path class="st0" d="M201.4.4C238.6-2 276.5 5.5 310 22.1c49.3 24.2 88.6 68 107.2 119.7 8.2 22.8 12.6 47 12.6 71.2v90c0 3.7.1 7.4-.8 11-2 9.1-8.5 17.1-17 20.9-5.9 2.8-12.7 3.1-19.1 2.1-13.7-2.5-24.4-15.4-24.5-29.3-.1-27.9 0-55.8 0-83.8.2-7.9.3-16.4-4-23.4-7-12.9-23.8-19-37.4-13.5-11.5 4.1-19.8 15.7-19.9 27.9-.1 28.4 0 56.7 0 85 0 5.3.3 10.7-1.3 15.8-2.9 10-11.2 18.1-21.2 20.8-13.1 3.6-28.2-2.2-34.8-14.3-4.5-7.3-4.2-16.1-4.1-24.3-.1-28.1.1-56.3-.1-84.4-.3-14.3-12-27.2-26.2-29-9.2-1.4-18.9 1.7-25.6 8.2-6 5.7-9.5 13.9-9.5 22.2v82c-.1 6.9.7 14-1.9 20.5-4.1 11.7-15.9 20.3-28.4 20-12.8.7-25.2-8.1-29.3-20.1-2.3-5.9-1.8-12.3-1.8-18.5 0-28.3.1-56.6 0-84.9-.1-14-11-26.8-24.7-29.3-12.5-2.7-26.3 3.6-32.5 14.8-2.7 4.7-4.1 10.1-4.1 15.4v91.9c.1 8.9-4 17.8-10.9 23.5-10.4 9.1-27.2 9.6-38.1 1.2C4.7 326 0 316.7 0 307.1V214c.1-35.2 9-70.3 25.8-101.3C39.5 87.4 58.4 64.9 81 46.9 115 19.5 157.7 3 201.4.4z" id="_x23_0da8ffff" />
        </svg>
      </div>
      <p class="dapp_elem__label">Kraken</p>
    </a>
  </div>
</div>


