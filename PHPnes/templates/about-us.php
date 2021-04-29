<?php 
    /* 
        Template Name: Про нас
		  Template Post Type: page
    */
?>
<?php get_header(); ?>

<section class="about-us">
	<div class="container about-us__container">
		<div class="about-us__top">
			<div class="about-us__top-left">
				<h1 class="page-title about-us__main-title">
					<?php the_title(); ?>
				</h1>
				
				<?php if( get_field('about-us_text') ): ?>
				<p class="about-us__text">
					<?php the_field('about-us_text'); ?>
				</p>
				<?php endif; ?>
				
				<div class="about-us__descr">
					<?php the_content(); ?>
					<?php if( get_field('about-us_consultation') ): ?>
					<button class="link about-us__link modal__btn" data-path="popup">
						<span><?php the_field('about-us_consultation'); ?></span>
					</button>
					<?php endif; ?>
				</div>
			</div>
			<?php if( get_field('about-us_slider') ): ?>
			<div class="about-us__top-right">
				<?php
				$about_us_slider = get_field('about-us_slider');				
				if( $about_us_slider ): ?>	
					<div class="about-us__slider">			
						<?php foreach( $about_us_slider as $item ):        
							setup_postdata($item); ?>
						<div class="about-us__slider-item">						
							<img src='<?php echo $item; ?>' alt='slide'>
						</div>
						<?php endforeach; ?>
					</div>
					<?php 
					wp_reset_postdata(); ?>
				<?php endif; ?>
				<div class="counter about-us__slider-counter">
					<span class="counter__left about-us__slider-counter--left">
						01
					</span>
					/
					<span class="counter__right about-us__slider-counter--right">				
					</span>
				</div>
				<h2 class="about-us__slider-title">
					<?php the_field('about-us_slider-title'); ?>
				</h2>
			</div>
			<?php endif; ?>
		</div>
		<div class="about-us__wrap">
			<div class="about-us__left">
				<?php if( get_field('about-us_title') ): ?>
				<section class="why about__section" id="why">
					<h2 class="about-us__title">
						<?php the_field('about-us_title'); ?>
					</h2>

					<ul class="why-list">

					<?php if( get_field('why-list_item') ): ?>								
					<?php while(has_sub_field('why-list_item')): ?>
						<li class="why-list__item">
							<?php the_sub_field('text'); ?>
						</li>
					<?php endwhile; ?>
					<?php endif; ?>

					</ul>

					<p class="why-list__text">
						<?php the_field('why-list_text'); ?>
					</p>
				</section>
				<?php endif; ?>
				<?php if( get_field('how_title') ): ?>
				<section class="how about__section" id="how">
					<h2 class="about-us__title how__title">
						<?php the_field('how_title'); ?>
					</h2>
					<ol class="how-list">
 
						<?php if( get_field('how-list_item') ): ?>								
						<?php while(has_sub_field('how-list_item')): ?>
							<li class="how-list__item">
								<div class="how-list__img">
									<img src="<?php the_sub_field('image'); ?>" alt="ЯК МИ ПРАЦЮЄМО?">
								</div>
								<p class="how-list__text">
									<?php the_sub_field('text'); ?>
								</p>
							</li>
						<?php endwhile; ?>
						<?php endif; ?>
						
					</ol>
				</section>
				<?php endif; ?>
				<?php if( get_field('portfolio-slider_item') ): ?>
				<section class="portfolio about__section" id="portfolio">
					<h2 class="about-us__title portfolio__title">
						<?php the_field('portfolio_title'); ?>
					</h2>
					<p class="portfolio__text">
						<?php the_field('portfolio_text'); ?>
					</p>
					<div class="portfolio__bottom">
						<div class="portfolio-slider">

							<?php if( get_field('portfolio-slider_item') ): ?>								
							<?php while(has_sub_field('portfolio-slider_item')): ?>
								<div class="portfolio-slider__item">
									<div class="portfolio-slider__img">
										<a href="<?php echo get_home_url(); ?>/project/<?php the_sub_field('link'); ?>">
											<img src="<?php the_sub_field('image'); ?>" alt="Слайдер">
										</a>
									</div>
									<h3 class="portfolio-slider__title">
										<a href="<?php echo get_home_url(); ?>/project/<?php the_sub_field('link'); ?>">
											<?php the_sub_field('title'); ?>
										</a>
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
				<?php if( get_field('partners_title') ): ?>
				<section class="partners about__section" id="partners">
					<h2 class="about-us__title partners__title">
						<?php the_field('partners_title'); ?>
					</h2>
					<ol class="partners-list">

							<?php if( get_field('partners-list_item') ): ?>								
							<?php while(has_sub_field('partners-list_item')): ?>
								<li class="partners-list__item">
									<div class="partners-list__img">
										<img src="<?php the_sub_field('image'); ?>" alt="Партнеры">
									</div>
									<h3 class="partners-list__title">
										<?php the_sub_field('title'); ?>
									</h3>
							</li>
							<?php endwhile; ?>
							<?php endif; ?>
					
					</ol>
					<div class="partners__bottom">
						<button class="btn partners__btn">
							<?php the_field('partners_btn'); ?>
						</button>
					</div>
				</section>
				<?php endif; ?>
				<?php if( get_field('objects_title') ): ?>
				<section class="objects about__section" id="objects">
					<h2 class="about-us__title objects__title">
						<?php the_field('objects_title'); ?>
					</h2>
					<div class="gallery objects__gallery">
						<div class="gallery__item">

							<?php $project_1 = get_field('project_1'); ?>						
								<img src="<?php echo $project_1['image']; ?>" class="gallery__img" alt="computer">
								<h3 class="gallery__title">
									<?php echo $project_1['title']; ?>
								</h3>
								<a href="<?php echo get_home_url(); ?>/project-category/<?php echo $project_1['link']; ?>" class="link gallery__link">
									<span>
										<?php echo $project_1['link_name']; ?>
									</span>
								</a>

						</div>			
						<div class="gallery__item">
							<?php $project_2 = get_field('project_2'); ?>
								<img src="<?php echo $project_2['image']; ?>" class="gallery__img" alt="computer">
								<h3 class="gallery__title">
								<?php echo $project_2['title']; ?>
							</h3>
							<a href="<?php echo get_home_url(); ?>/project-category/<?php echo $project_2['link']; ?>" class="link gallery__link">
								<span>
									<?php echo $project_2['link_name']; ?>
								</span>
							</a>
						</div>
						<div class="gallery__item">
							<?php $project_3 = get_field('project_3'); ?>
								<img src="<?php echo $project_3['image']; ?>" class="gallery__img" alt="computer">
								<h3 class="gallery__title">
									<?php echo $project_3['title']; ?>
								</h3>
								<a href="<?php echo get_home_url(); ?>/project-category/<?php echo $project_3['link']; ?>" class="link gallery__link">
									<span>
										<?php echo $project_3['link_name']; ?>
									</span>
								</a>
						</div>
						<div class="gallery__item">
							<?php $project_4 = get_field('project_4'); ?>
							<img src="<?php echo $project_4['image']; ?>" class="gallery__img" alt="computer">
							<p class="gallery__text">
								<?php echo $project_4['title']; ?>
							</p>
							<a href="<?php echo get_home_url(); ?>/<?php echo $project_4['link']; ?>" class="link gallery__link">
								<span>
									<?php echo $project_4['link_name']; ?>
								</span>
							</a>
						</div>	

					</div>
				</section>
				<?php endif; ?>
				<?php if( get_field('clients_title') ): ?>
				<section class="clients about__section" id="clients">
					<h2 class="about-us__title clients__title">
						<?php the_field('clients_title'); ?>
					</h2>
					<?php
					$partners_gallery = get_field('partners-list_gallery');				
					if( $partners_gallery ): ?>	
						<ol class="partners-list clients-list">
							
							<?php foreach( $partners_gallery as $item ):        
								setup_postdata($item); ?>	
								<li class="partners-list__item">	
									<div class="partners-list__img">
										<img src='<?php echo $item; ?>' alt='Клиент'>
									</div>					
								</li>
							<?php endforeach; ?>
						</ol>
						<?php 
						wp_reset_postdata(); ?>
					<?php endif; ?>

				</section>
				<?php endif; ?>
				<?php if( get_field('vacancies_title') ): ?>
				<section class="vacancies about__section" id="vacancies">
					<h2 class="about-us__title vacancies__title">
						<?php the_field('vacancies_title'); ?>
					</h2>
					<h3 class="vacancies__subtitle">
						<?php the_field('vacancies_subtitle'); ?>
					</h3>
					<p class="vacancies__text">
						<?php the_field('vacancies_text'); ?>
					</p>
					<div class="vacancies-mail">
						<?php the_field('vacancies_mail'); ?>
						<a href="mailto:info@nse.com.ua" class="vacancies-mail__link">
							<?php the_field('vacancies-mail_link'); ?>
						</a>
					</div>

					<h3 class="vacancies__subtitle">
						<?php the_field('vacancies_subtitle_2'); ?>
					</h3>
					<ol class="vacancies-list">

						<?php if( get_field('vacancies-list_item') ): ?>								
						<?php while(has_sub_field('vacancies-list_item')): ?>
							<li class="vacancies-list__item">
								<?php the_sub_field('text'); ?>
							</li>
						<?php endwhile; ?>
						<?php endif; ?>
						
					</ol>
					<div class="vacancies-mail">
						<?php the_field('vacancies_mail_2'); ?>
						<a href="mailto:info@nse.com.ua" class="vacancies-mail__link">
							<?php the_field('vacancies-mail_link_2'); ?>
						</a>
					</div>
				</section>
				<?php endif; ?>
			</div>
			<div class="about-us__right">
				<?php if( get_field('sticky_title') ): ?>
				<nav class="about-us__navigation sticky">
					<h2 class="sticky__title">
						<?php the_field('sticky_title'); ?>
					</h2>
					<ul class="sticky-list">
						<li class="sticky-list__item active">
							<a href="#why">
								<?php the_field('one'); ?>
							</a>
						</li>
						<li class="sticky-list__item">
							<a href="#how">
								<?php the_field('two'); ?>
							</a>
						</li>
						<li class="sticky-list__item">
							<a href="#portfolio">
								<?php the_field('three'); ?>
							</a>
						</li>
						<li class="sticky-list__item">
							<a href="#partners">
								<?php the_field('four'); ?>
							</a>
						</li>
						<li class="sticky-list__item">
							<a href="#objects">
								<?php the_field('five'); ?>
							</a>
						</li>
						<li class="sticky-list__item">
							<a href="#clients">
								<?php the_field('six'); ?>
							</a>
						</li>
						<li class="sticky-list__item">
							<a href="#vacancies">
								<?php the_field('seven'); ?>
							</a>
						</li>
					</ul>
				</nav>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
<?php if( get_field('category-mini_item') ): ?>
<section class="about-us__bottom">
	<div class="container">
		<h2 class="page-title category-mini__title">
			<?php the_field('category-mini_title'); ?>				
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
					<a href="<?php echo get_home_url(); ?>/<?php the_sub_field('link', $page_id); ?>" class="link category-mini__detail">
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
<?php get_footer(); ?>
