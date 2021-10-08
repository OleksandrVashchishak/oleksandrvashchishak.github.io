<?php
/*
Template Name: project
Template Post Type: post

 */

get_header();
?>

	<main id="primary saefsef" class="site-main">
		<div class="page-container article__container">

			<?php echo get_breadcrumbs(); ?>

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

		endwhile; // End of the loop.
		?>
			
		<?php if( get_field('category-mini_item', 'option') ): ?>	
		<section class="about-us__bottom">
			<div class="container">
				<h2 class="page-title category-mini__title">
					<?php echo pll__('Важливі Статті', 'woocommerce'); ?>
				</h2>
				<div class="page-category__bottom">
					<div class="category-mini">
					<?php
						if( get_field('category-mini_item', 'option') ): ?>				               
						<?php while(has_sub_field('category-mini_item', 'option')): ?>
						<div class="category-mini__item">
							<div class="category-mini__content">
								<?php the_sub_field('title', $page_id) ?>
								<div class="category-mini__img">
									<img src="<?php the_sub_field('image', 'option'); ?>" alt="image">
								</div>  
							</div> 
							<a href="<?php echo get_template_directory_uri(); ?>/<?php the_sub_field('link', 'option'); ?>" class="link category-mini__detail">
								<span><?php the_sub_field('link_name', 'option'); ?></span>
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
