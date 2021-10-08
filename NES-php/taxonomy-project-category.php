<?php
/**
* 
 */

get_header(); ?>

<section class="page-category">
	<div class="container">
		<h1 class="page-title">
			<?php $category = get_queried_object();
				$current_cat_id = $category->term_id;
				$current_cat_name = $category->name;
				echo $current_cat_name;
				?>
		</h1>
	</div>
</section>
<section class="news">
	<div class="container news__container">
		<?php if( get_field('project-list_item', 'option') ): ?>
		<ul class="description-list news-list">			               
			<?php while(has_sub_field('project-list_item', 'option')): ?>
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
		<div class="projects-card">
			<div class="news-card__list"> 				
				<?php
						if( have_posts() ){
						
							$categories = get_the_terms( $post->ID, 'project-category' );
							// Loop through all the returned terms
							foreach ( $categories as $category ):
								$category_link = get_category_link( $category );
								// set up a new query for each category, pulling in related posts.
								$services = new WP_Query(
									array(
											'post_type' => 'project',
											'showposts' => -1,
											'tax_query' => array(
												array(
													'taxonomy'  => 'project-category',
													'terms'     => array( $category->slug ),
													'field'     => 'slug'
												)
											)
									)
								);
								?>
								<?php while ($services->have_posts()) : $services->the_post(); ?>
									<article class="news-card__item projects__item">
										<a href="<?php the_permalink(); ?>" class="news-card__img">
											<?php echo get_the_post_thumbnail(); ?>
										</a>
										<h2 class="news-card__title">
											<a href="<?php the_permalink(); ?>" class="news-card__title">
												<?php the_title(); ?>
											</a>
										</h2>
										<div class="news-card__bottom">
											<a href="<?php echo $category_link; ?>" class="news-card__cat"><?php echo $category->name; ?></a>
											<div class="link news-card__link">
												<a href="<?php the_permalink(); ?>" >
													<span><?php esc_html_e('Детальніше', 'nes'); ?></span>
												</a>
											</div>
											
										</div>
									</article>
								<?php endwhile; ?>								
								<?php
									 $services = null;
									 wp_reset_postdata();
								
								endforeach; } ?>
							
					</div>
				</div>
			</a>
		</div>  
	</div>
</section>
	

<?php get_footer(); ?>
