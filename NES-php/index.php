<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package nes
 */

get_header(); ?>

<section class="page-category">
	<div class="container">
		<?php 
		$id = get_queried_object_id();	
		if( get_field('blog_title', $id) ): ?>	
		<h1 class="page-title news__title">
			<?php echo get_field('blog_title', $id); ?>
		</h1>
		<?php endif; ?>
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
			<div class="news-card__list">
			
				<?php if ( have_posts() ) : ?>

					<?php global $item;
					// Start the Loop.
					while ( have_posts() ) : the_post();
						get_template_part( 'content', get_post_format() ); ?>
						<article class="news-card__item">             
							<a href="<?php the_permalink(); ?>" class="news-card__img">
								<?php echo get_the_post_thumbnail($item, 'news-small'); ?>
							</a>
							<a href="<?php the_permalink(); ?>" class="news-card__title">
								<?php echo get_the_title(); ?>
							</a>
							<p class="news-card__text">
								<?php echo get_the_excerpt(); ?>
							</p>
							<div class="news-card__bottom">
								<time class="news-card__time">
									<?php the_time('d.m.Y'); ?>
								</time>
								<a href="<?php the_permalink(); ?>" class="link news-card__link">
									<span>Детальніше</span>
								</a>
							</div>
					</article>
					<?php 
						
					endwhile;
					$settings = array(
						'show_all'     => false, 
						'add_args'  => false,
						'add_fragment' => '',
						'prev_text' => '<svg width="9" height="17" viewbox="0 0 15 30" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M2.81253 15L15 27.1875V30L-5.65728e-09 15L15 0V2.81248L2.81253 15Z"
							fill="#434343" />
					</svg>' . 'Назад',
						'next_text' => 'Вперед' . '<svg width="9" height="17" viewbox="0 0 16 30" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M12.6875 15L0.5 27.1875V30L15.5 15L0.5 0V2.81248L12.6875 15Z" fill="#434343" />
					</svg>',
						'type'      => 'list',
						'end_size'  => 1,
						'mid_size'  => 1,
					);
					
					the_posts_pagination($settings);


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

