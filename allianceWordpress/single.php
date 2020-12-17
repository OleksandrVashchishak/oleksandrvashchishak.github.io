
<?php
 get_header();
?>





<main>
  <div class="banner-bg article-blog-bg banner-bg-blog-article " id="to-top">
    <div class="banner-container banner-container-mobile-blog">
      <nav class="banner-nav"> <a class="banner-nav__home cloud__nav-home" href="<?php echo get_home_url(); ?>" > Home &nbsp; / &nbsp;</a> <a
          class="banner-nav__home cloud__nav-home" href="<?php echo get_home_url(); ?>/our-news/" > News &nbsp; / &nbsp; </a><a href="#"
          class="banner-nav__this-page article-blog__this-page"><?php the_title(); ?></a> </nav>
      <h3 class="banner-title"> <?php the_title(); ?>
      </h3>
    
    
    </div>
  </div>

  <article class="article news-article-single">

    <div class="article__container">
      <a href="#to-top">
        <div class="article__to-top">
          <div class="article__to-top-anim">
          <div class="article__rectangle"></div>
        </div>
        </div>
      </a>
     
      <div class="article__autor-data">

        <div class="article__autor"> Author:
        <?php $post_id_7 = get_post($post->ID, ARRAY_A);
echo get_the_author_meta( 'user_login',  $post_id_7['post_author']); ?>
        </div>
        <div class="article__data"><?php the_time('F jS, Y') ?></div>
      
      </div>
      <div class="article__line"></div>
      <div class="article__flex-container">
        <div class="article__social">
          <div class="margin-article"></div>
          <div class="styki-cont">
            <div class="article__social-item">
              <a href="<?php the_field('social-link-news1', 'option') ?>"><img class="article__social-item-img" src="<?php the_field('social-img1-news', 'option') ?>" alt=""></a>
            </div>
            <div class="article__social-item">
              <a href="<?php the_field('social-link-news2', 'option') ?>"><img class="article__social-item-img" src="<?php the_field('social-img2-news', 'option') ?>" alt=""></a>
            </div>
            <div class="article__social-item">
              <a href="<?php the_field('social-link-news3', 'option') ?>"><img class="article__social-item-img" src="<?php the_field('social-img3-news', 'option') ?>" alt=""></a>
            </div>
          </div>
        </div>

        <div class="article__main">
          <div class="article__main-title">
          <?php the_title(); ?>
          </div>
          <div class="article__text">

          <?php the_content(); ?>
          </div>
         
           

          <div class="article__line line-sub-article-title line-sub-article-title-line"></div>
          <div class="article__mobile-social">
            <div class="article__social-item">
              <a href="<?php the_field('social-link-news1', 'option') ?>"><img class="article__social-item-img" src="<?php the_field('social-img1-news', 'option') ?>" alt=""></a>
            </div>
            <div class="article__social-item">
              <a href="<?php the_field('social-link-news2', 'option') ?>"><img class="article__social-item-img" src="<?php the_field('social-img2-news', 'option') ?>" alt=""></a>
            </div>
            <div class="article__social-item">
              <a href="<?php the_field('social-link-news3', 'option') ?>"><img class="article__social-item-img" src="<?php the_field('social-img3-news', 'option') ?>" alt=""></a>
            </div>
          </div>
        </div>
      </div>




      <div class="article__main-title under-article-item">
      <?php the_field('text-over-blog-sing', 'option') ?>
      </div>
      <div class="news-item-block news-item-block-blog ">



      <?php
                        $args = array(
                            'post_type'         => 'post',
                            'publish'           => true,
                            'posts_per_page'    => 2,
                            'paged'          => $paged,       
                            'category_name' => 'news'                                    
                        );
                        $the_query = new WP_Query( $args );
                        if ( $the_query->have_posts() ) { ?>
                       
                              <?php while( $the_query->have_posts() ){
                              $the_query->the_post();?> 
                               
                                     <div class="news__item ">
      <a class="qweqwe" href="<?php the_permalink(); ?>"> <?php echo get_the_post_thumbnail( get_the_ID(), 'post_827x620', array( 'class' => 'news__item-img', )); ?></a> 
    <a href="<?php the_permalink(); ?>"> <p class="news__item-title"><?php the_title(); ?></p></a> 
      <div class="news__data-container">
        <div class="news__data"><?php the_time('F jS, Y') ?></div>
        <div class="news__read">4 min read</div>
      </div>
    </div>

   
                           <?php } wp_reset_postdata(); ?>
                      
                          
                      <?php } ?>


                      <?php the_field('sadsa'); ?>

                  
        

      
      </div>
      <div class="preloader-bg" id="preloaderMain">
        <div class="preloader-main">
        <div class="loader-item style4" >
        <div class="cube1"></div>
        <div class="cube2"></div>
        </div>  
        </div>
        </div>
  </article>
</main>
  <?php get_footer('dark'); ?>