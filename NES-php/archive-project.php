<?php
/*
 Template Name: home-main
 */
get_header(); ?>

<section class="page-category">
	<div class="container">		
		<h1 class="page-title">
			<?php if (get_locale() == 'uk') { 
				the_field('project_title', 'option'); }
			else { the_field('project_title_ru', 'option'); } ?>
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
					$ourCurrentPage = get_query_var( 'paged' );
					$project_args = array(
						'post_type'      => 'project',
						'posts_per_page' => 9,
						'paged' => $ourCurrentPage,
					);
					$loop = new WP_Query($project_args); 
					$big = 999999999; 
					
					if ( $loop->have_posts() ) {
						while ($loop->have_posts() ) : $loop->the_post();

							$categories = get_the_terms( $post->ID, 'project-category' ); 

							foreach ( $categories as $category ) :

								$category_link = get_term_link( $category ); ?>

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
										<a href="<?php echo $category_link; ?>" class="news-card__cat">
											<?php echo $category->name; ?>
											
										</a>
										<div class="link news-card__link">
											<a href="<?php the_permalink(); ?>" >
												<span><?php esc_html_e('Детальніше', 'nes'); ?></span>
											</a>
										</div>
										
									</div>
								</article>
								<?php endforeach; ?>
						<?php endwhile; ?>
						<div class="pagination project__paginations">
							<ul class="pagination-list">
							
							<?php
								
								$total_pages = $loop->max_num_pages;
								if ($total_pages > 1){
									
									echo paginate_links(array(
										'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                        		'format' => '/page/%#%',
										'current' => max(1, $paged),
										'total' => $loop->max_num_pages,
										'show_all'     => false, 
										'prev_text' => '<svg width="9" height="17" viewbox="0 0 15 30" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M2.81253 15L15 27.1875V30L-5.65728e-09 15L15 0V2.81248L2.81253 15Z"
											fill="#434343" />
									</svg>' . 'Назад',
										'next_text' => 'Вперед' . '<svg width="9" height="17" viewbox="0 0 16 30" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M12.6875 15L0.5 27.1875V30L15.5 15L0.5 0V2.81248L12.6875 15Z" fill="#434343" />
									</svg>',
										'end_size'  => 1,
										'mid_size'  => 1,
										'before_page_number' => '<li class="pagination-list__item">',
										'after_page_number'  => '</li>'

									));
								}    
								}
								wp_reset_postdata();
								?>
							</ul>
						</div>
					</div>
				</div>
			</a>
		</div>  
	</div>
</section>
	

<?php get_footer(); ?>
