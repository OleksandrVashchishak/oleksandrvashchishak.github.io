<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package nes
 */

?>
  
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<article class="article">
		<div class="article-top">
			<div class="article-top__left">
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif; ?>
			<span class="posted-on">
				<time>
					<?php the_time('d.m.Y'); ?>
				</time>
			</span>
			<div class="article-top__content">
				<?php
				the_content(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'nes' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						wp_kses_post( get_the_title() )
					)
				);

				wp_link_pages(
					array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'nes' ),
						'after'  => '</div>',
					)
				);
				?>
				<?php if( get_field('portfolio-slider_item') ): ?>
				<section class="photogallery">
					<h2 class="photogallery__title">
						<?php the_field('photogallery_title'); ?>
					</h2>
					<div class="portfolio__bottom">
						<div class="portfolio-slider">

							<?php if( get_field('portfolio-slider_item') ): ?>								
							<?php while(has_sub_field('portfolio-slider_item')): ?>
								<div class="portfolio-slider__item">
									<div class="portfolio-slider__img">
										<img src="<?php the_sub_field('image'); ?>" alt="Слайдер">
									</div>
									<h3 class="portfolio-slider__title">
										<?php the_sub_field('title'); ?>
									</h3>
								</div>
							<?php endwhile; ?>
							<?php endif; ?>
							
						</div>
						<div class="counter portfolio-slider__counter">
							<span class="counter__left portfolio-slider__counter--left">
								01
							</span>
							/
							<span class="counter__right portfolio-slider__counter--right">

							</span>
						</div>
					</div>
				</section>
				<?php endif; ?>
			</div><!-- content -->
		</div> <!-- article-top__left -->
		<div class="article-top__right">		
			<?php nes_post_thumbnail(); ?>
			<h2 class="article-top__img--title">
				<?php the_post_thumbnail_caption(); ?>
			</h2>
			
			<?php if ( is_active_sidebar( 'sidebar_articles' ) ) : ?>
				<?php dynamic_sidebar( 'sidebar_articles' ); ?>
			<?php endif; ?>
		</div>
	</div> <!-- article-top -->

	
</article><!-- #post-<?php the_ID(); ?> -->
