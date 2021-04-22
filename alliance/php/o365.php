<?php
 get_header();
/*
 Template Name: o365
 */
?>
<main class="main-page">
        <section class="container_block">
            <div class="row cont-main-p btn-ad-0365">
                <div class="col-lg-5 col-md-6 general-text">
                    <h1><span><?php the_field('o365-blue-word'); ?></span>
                        <br>
                        <?php the_field('0365-first-title'); ?></h1>
                  
                    <button class="btn-general"  onclick="document.location='#to-ineresting-btn'"> <?php the_field('top-button-o365'); ?> </button>
                    <div class="under-btn"></div>
                 
                </div>
                <div class="col-lg-7 col-md-6 col-sm-12 animation-0365">
                 <img src="<?php bloginfo( 'template_url'); ?>/img/365-static1.png">
                 <img src="<?php bloginfo( 'template_url'); ?>/img/365-static-2.png">
                 <img src="<?php bloginfo( 'template_url'); ?>/img/365-static-3.png">
                 <img class="animation-big" src="<?php bloginfo( 'template_url'); ?>/img/365-big.png">
                 <img class="animation-side" src="<?php bloginfo( 'template_url'); ?>/img/365-side.png">
                 <img class="animation-line" src="<?php bloginfo( 'template_url'); ?>/img/365-line.png">
                 <img class="animation-kvadrat1" src="<?php bloginfo( 'template_url'); ?>/img/365-kvadrat1.png">
                 <img class="animation-kvadrat2" src="<?php bloginfo( 'template_url'); ?>/img/365-kvadrat2.png">
                 <img class="animation-kvadrat3" src="<?php bloginfo( 'template_url'); ?>/img/365-kvardat3.png">
                 <img class="animation-kvadrat4" src="<?php bloginfo( 'template_url'); ?>/img/365-kvadrat4.png">
                 <img class="animation-kvadrat5" src="<?php bloginfo( 'template_url'); ?>/img/365-kvadrat5.png">
                </div>
            </div>
        </section>
       <section class="container_block block-0365 container_block-first ">
        <div class="text-0365">
            <p>     <?php the_field('0365-text-under-anim-1'); ?></h1>
         </p>
         <p>
         <?php the_field('0365-text-under-anim-2'); ?></h1>
         </p>  
        </div> 
      </section>        
         <section class="o365-page">
         <div class="o365-page__container">
            <p class="o365-page__first-text">  
            <?php the_field('0365-text-under-anim-3'); ?></h1> 
            </p>
             <p class="o365-page__first-text">
             <?php the_field('0365-text-under-anim-4'); ?></h1>
         </p>
               <div class="o365-page__items">
                 <div class="o365-page__item o365-page__first-item">
                   <h3 class="o365-page__item-title ">  <?php the_field('o365-page__item-title1'); ?>
                   </h3>
                   <p class="o365-page__item-text">  <?php the_field('o365-page__item-text1'); ?></p>
                   <p class="o365-page__item-text">  <?php the_field('o365-page__item-text2'); ?></p>
                   <p class="o365-page__item-text"><?php the_field('o365-page__item-text3'); ?></p>
                 </div>

                 <div class="o365-page__item o365-page__two-item ">
                  <h3 class="o365-page__item-title "><?php the_field('o365-page__item-title2'); ?>
                  </h3>
                  <p class="o365-page__item-text"><?php the_field('o365-page__item-text4'); ?>
                     </p>
                  <p class="o365-page__item-text">
                  <?php the_field('o365-page__item-text5'); ?></p>
                </div>
               </div>

               <div class="o365-page__flex-container" id="to-ineresting-btn">
                 <div class="0365-page__left">
               <h2 class="o365-page__big-title"><?php the_field('o365-page__big-title'); ?></h2>
              
              </div>
              <div class="0365-page__right">
              <h3 class="o365-page__pseudo-title"><?php the_field('o365-page__pseudo-title'); ?>
              </h3>
               <p class="o365-page__first-text o365-page__text-in-cont"><?php the_field('o365-page__over-form1'); ?>  </p>
              </div>
              </div>
               </div>
             <div class="o365-page__bg-container">
             <p class="o365-page__first-text o365-page__first-text-pad"><?php the_field('o365-page__over-form2'); ?>
              </p>
             <p class="o365-page__first-text o365-page__first-text-pad"><?php the_field('o365-page__over-form3'); ?>
              </p>
             <p class="o365-page__first-text o365-page__first-text-pad"><?php the_field('o365-page__over-form4'); ?></p>

             <div class="o365-page__flex-container-form">
             <div class="o365-page__left-part">
               <p class="o365-page__text--blue"><?php the_field('o365-page__text--blue'); ?></p>
               <h3 class="o365-page__left-title"><?php the_field('o365-page__left-title'); ?></h3>
               <p class="o365-page__left-text"><?php the_field('o365-page__left-text'); ?></p>
             </div>

          
           
             <div class="o365-page__right-part">
               <div class="o365-page__form" >
             <?php echo do_shortcode( '[contact-form-7 id="527" title="Office 365 form"]' ); ?>
             <div class="tessst" id="bg-for-select">O365 Malibox</div>
             </div>
             </div>
       <script>
       let selectInputForm = document.getElementById("form-o367")
      let bgForSelect = document.getElementById("bg-for-select")
      setInterval( clearWordMarg, 500);
      function   clearWordMarg () {
         if(selectInputForm.selectedIndex != 0){
          bgForSelect.style.display = 'none'
          return
         }
       };
       </script>
             <style>
       .tessst{
         position: absolute;
         top: 149px;
         right: 230px;
         width: 100px;
         hight: 14px;
         background: #fff;
         z-index: 100;
         color: #828282;
       }

       .o365-page__form{
         position:relative;
       }


       @media (max-width: 1030px) {
        .tessst{
          right: 210px;
       } }
       @media (max-width: 925px) {
        .tessst{
          right: 200px;
       }}
@media (max-width: 848px) {
        .tessst{
          right: 100px;
       }}
@media (max-width: 600px) {
.tessst{
          top: 249px;
         right: 40%;
        }}
        @media (max-width: 470px) {
.tessst{
  
         right: 38%;
        }}
        @media (max-width: 380px) {
.tessst{
  
         right: 36%;
        }}
        @media (max-width: 330px) {
.tessst{
  
         right: 32%;
        }}
       </style>
       
       
 
      
         
             </div>
            </div>
        </div>
        <div class="preloader-bg" id="preloaderMain">
          <div class="preloader-main">
          <div class="loader-item style4" >
          <div class="cube1"></div>
          <div class="cube2"></div>
          </div>  
          </div>
          </div>



          
        </section>
    </main>




    <?php get_footer('dark'); ?>





