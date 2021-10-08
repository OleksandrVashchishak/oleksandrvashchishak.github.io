<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package nes
 */

get_header();
?>

	<main id="primary" class="site-main">
		<div class="page-container article__container">

			<?php echo get_breadcrumbs(); ?>

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

		endwhile; // End of the loop.
		?>
		</div>
		<?php if( get_field('category-mini_item', $page_id) ): ?>
		<section class="about-us__bottom">
			<div class="container">
				<h2 class="page-title category-mini__title">
					<?php pll__( 'Важливі Статті', 'woocommerce' ); ?>					
				</h2>
				<div class="page-category__bottom">
					<div class="category-mini">
					<?php
						$page_id = wc_get_page_id( 'shop' );
						if( get_field('category-mini_item', $page_id) ): ?>				               
						<?php while(has_sub_field('category-mini_item', $page_id)): ?>
						<div class="category-mini__item">
							<div class="category-mini__content">
								<?php the_sub_field('title', $page_id) ?>
								<div class="category-mini__img">
									<img src="<?php the_sub_field('image', $page_id); ?>" alt="image">
								</div>  
							</div> 
							<a href="<?php echo get_template_directory_uri(); ?>/<?php the_sub_field('link', $page_id); ?>" class="link category-mini__detail">
								<span><?php the_sub_field('link_name', $page_id); ?></span>
							</a>                                 
						</div> 
						<?php endwhile; ?>
						<?php endif; ?>

					</div>
					<div class="counter category-mini__counter">
						<span class="counter__left category-mini__counter--left">
							01
						</span>
						/
						<span class="counter__right category-mini__counter--right"></span>
					</div>
				</div>
			</div>
		</section>
			<?php endif; ?>
		
	</main><!-- #main -->

<?php

get_footer();
