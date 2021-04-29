<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package nes
 */

get_header(); ?>

<section class="page-category">
	<div class="container">
		<h1 class="page-title news__title">
			<?php single_cat_title(); ?> 
		</h1>
		<?php if( get_field('category-mini_item', $id) ): ?>	
		<div class="page-category__bottom">
			<div class="category-mini">
			<?php
				if( get_field('category-mini_item', $id) ): ?>
				<?php while(has_sub_field('category-mini_item', $id)): ?>
				<div class="category-mini__item">
					<div class="category-mini__content">
						<?php the_sub_field('title', $id) ?>
						<div class="category-mini__img">
							<img src="<?php the_sub_field('image', $id); ?>" alt="image">
						</div>  
					</div> 
					<a href="<?php echo get_home_url(); ?>/<?php the_sub_field('link', $id); ?>" class="link category-mini__detail">
							<span><?php the_sub_field('link_name', $id); ?></span>
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
		<?php endif; ?>
	</div>
</section>
<section class="news">
	<div class="container news__container">
		<?php if( get_field('news-list_item', 'option') ): ?>
		<ul class="description-list news-list">			               
			<?php while(has_sub_field('news-list_item', 'option')): ?>
			<li class="description-list__item news-list__item">      
				<?php if (get_locale() == 'uk') { ?>
					<a href="<?php echo get_home_url(); ?>/<?php the_sub_field('link'); ?>">
						<?php the_sub_field('name'); ?> 
					</a>
					<?php } else { ?>
					<a href="<?php echo get_home_url(); ?>/<?php the_sub_field('link_ru'); ?>">
						<?php the_sub_field('name_ru'); ?> 
					</a>
					<?php } ?>
			</li>
			<?php endwhile; ?>
		</ul>
		<?php endif; ?>
		<div class="news-card">
		<?php
				$post_ids = get_objects_in_term( get_query_var( 'cat' ), 'category' );
				if ( ! empty( $post_ids ) && ! is_wp_error( $post_ids ) ) {
					$tags = wp_get_object_terms( $post_ids, 'post_tag' );
					if ( ! empty( $tags ) && ! is_wp_error( $tags ) ) {
				?> 
					<ul>
					<?php foreach( $tags as $tag ) { ?>
						<li><a href="<?php echo get_term_link( $tag, 'post_tag' ); ?>"><?php echo $tag->name; ?></a></li>
					<?php } ?>
					</ul>
					<?php } ?>
				<?php } ?>
			<div class="news-card__list">
			
				<?php if ( have_posts() ) : ?>
					
					<?php
					global $item;
					// Start the Loop.
					while ( have_posts() ) : the_post();
						get_template_part( 'content', get_post_format() ); ?>
						<article class="news-card__item">             
							<a href="<?php the_permalink(); ?>" class="news-card__img">
								<?php echo get_the_post_thumbnail($item, 'news-small'); ?>
							</a>
							<h2 class="news-card__title">
								<?php echo get_the_title(); ?>
							</h2>
							<p class="news-card__text">
								<?php echo get_the_excerpt(); ?>
							</p>
							<div class="news-card__bottom">
								<time class="news-card__time">
									<?php the_time('d.m.Y'); ?>
								</time>
								<a href="<?php the_permalink(); ?>" class="link news-card__link">
									<span><?php esc_html_e('Детальніше', 'nes'); ?></span>
								</a>
							</div>
					</article>
					<?php 
					endwhile;

					get_template_part( 'navigation', 'archive' );

					// If no content, include the "No posts found" template.
					else :
					get_template_part( 'no-results', 'archive' );

					endif;
					?>
					
			</div>
		</div>  
	</div>
</section>
	

<?php get_footer(); ?>
