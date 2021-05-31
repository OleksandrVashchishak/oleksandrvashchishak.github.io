<a href="<?php the_permalink(); ?>" class="card-product__img-wrap">
    <?php echo get_the_post_thumbnail(get_the_ID(), 'post_827x620', array('class' => 'card-product__img',)); ?>
    <span class="card-product__sale-percent">-9%</span>
  </a>

  <a href="<?php the_permalink(); ?>" class="card-product__title"><?php the_title(); ?></a>

  <div class="card-product__prices">
    <?php echo $product->get_price_html(); ?>
  </div>
