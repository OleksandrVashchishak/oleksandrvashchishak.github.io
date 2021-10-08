<?php 
    /* 
        Template Name: Головна
    */
?>
<?php get_header(); ?>

<main>
	<?php if( get_field('first-slider_item') ): ?>	
	<section class="first-block-page">
		<div class="container first__container">
			<div class="first-slider">
				<?php if( get_field('first-slider_item') ): ?>			               
				<?php while(has_sub_field('first-slider_item')): ?>
				<div class="first-slider__item">
					<div class="first-slider__wrap">
						<div class="first-slider__content">
							<div class="first-slider__left">
								<h2 class="first-slider__title">
									<?php the_sub_field('first-slider_title') ?>
								</h2>
								<span class="first-slider__old-price">
									<?php the_sub_field('first-slider_old-price') ?>
								</span>
							</div>
							<div class="first-slider__right">
								<p class="first-slider__text">
									<?php the_sub_field('first-slider_text') ?>
								</p>
								<span class="first-slider__new-price">
									<?php the_sub_field('first-slider_new-price') ?>
								</span>
							</div>
						</div>
						<div class="first-slider__picture">
							<img src="<?php the_sub_field('image'); ?>" alt="image">
						</div>  
						<a href="<?php the_sub_field('link'); ?>" class="link first-slider__detail">
							<span>   
								<?php the_sub_field('link_name'); ?>
							</span>
						</a> 
					</div>                                 
				</div> 
				<?php endwhile; ?>
				<?php endif; ?>
	
			</div>
			<div class="first__bottom">
				<div class="first-slider__nav">
				<?php if( get_field('first-slider_item') ): ?>				               
				<?php while(has_sub_field('first-slider_item')): ?>
					<div class="first-slider__nav-item">
						<div class="nav-item__img">
							<img src="<?php the_sub_field('image_mini'); ?>" alt="image">
						</div>                                  
					</div> 
				<?php endwhile; ?>
				<?php endif; ?>
			</div>
			<span class="scroll first__scroll">
				<?php the_field('first_scroll'); ?>
			</span>
			<div class="counter first-slider__counter">
				<span class="counter__left first-slider__counter--left">
					01
				</span>
				/
				<span class="counter__right first-slider__counter--right">04</span>
			</div>
		</div>
	</section>
	<?php endif; ?>
	<?php if( get_field('about_text') ): ?>
	<section class="about">
		<div class="container about__container">
			<div class="about__content">
				<h2 class="title about__title">
					<?php the_content(); ?>
				</h2>
				<p class="about__text">
					<?php the_field('about_text'); ?>
				</p>
				<button class="link about__link modal__btn" data-path="popup">
					<span><?php the_field('about_link'); ?></span>
				</button>
			</div>
			<div class="about__center">
				<div class="about-slider">
				<?php if( get_field('about-slider_item') ): ?>				               
				<?php while(has_sub_field('about-slider_item')): ?>
					<div class="about-slider__item">
						<h3 class="about-slider__title">
							<?php the_sub_field('title') ?>
						</h3>
						<p class="about-slider__text">
							<?php the_sub_field('text') ?>
						</p>
						<a href="<?php echo get_home_url(); ?>/<?php the_sub_field('link'); ?>" class="link about-slider__link">
							<span><?php the_sub_field('link_name'); ?></span>
						</a> 
					</div> 
				<?php endwhile; ?>
				<?php endif; ?>                                
				</div> 
				<div class="counter about-slider__counter">
					<span class="counter__left about-slider__counter--left">
						01
					</span>
					/
					<span class="counter__right about-slider__counter--right">02</span>
				</div>
			</div>
			<div class="about-pictures">
				<?php if( get_field('about-slider_item') ): ?>				               
				<?php while(has_sub_field('about-slider_item')): ?>
					<div class="about-pictures__item">
						<img src="<?php the_sub_field('image'); ?>" alt="image">
					</div>                             
				<?php endwhile; ?>
				<?php endif; ?>
			</div>
			<span class="scroll about__scroll">
				<?php the_field('about_scroll'); ?>
			</span>
		</div>
	</section>
	<?php endif; ?>
	<?php if( get_field('category_title') ): ?>
	<section class="category-block">
		<div class="container category__container">
			<h2 class="title category__title">
				<?php the_field('category_title'); ?>
			</h2>
			<ul class="category__list">
				<?php if( get_field('category-item') ): ?>				               
				<?php while(has_sub_field('category-item')): ?>
				<li class="category-item">
					<a href="<?php echo get_home_url(); ?>/product-category/<?php the_sub_field('link'); ?>" class="category-item__picture">
						<img src="<?php the_sub_field('image'); ?>" alt="Вентиляція">
					</a>
					<h3 class="category-item__title">
						<a href="<?php echo get_home_url(); ?>/product-category/<?php the_sub_field('link'); ?>">
							<?php the_sub_field('title'); ?>
						</a>
					</h3>
					<a href="<?php echo get_home_url(); ?>/product-category/<?php the_sub_field('link'); ?>" class="link category-item__link">
						<span><?php the_sub_field('link_name'); ?></span>
					</a> 
				</li>                           
				<?php endwhile; ?>
				<?php endif; ?>
			</ul>
			<span class="scroll category__scroll">
				<?php the_field('category_scroll'); ?>
			</span>
		</div>
	</section>
	<?php endif; ?>
	<?php if( get_field('services_title') ): ?>
	<section class="services" id="services">
		<div class="container">
			<h2 class="title services__title">
				<?php the_field('services_title'); ?>
			</h2>
			<div class="services__gallery gallery">
			<?php if( get_field('gallery_item') ): ?>				               
				<?php while(has_sub_field('gallery_item')): ?>
				<div class="gallery__item">
					<img src="<?php the_sub_field('image'); ?>" class="gallery__img" alt="Вентиляція">
					<h3 class="gallery__title">
						<?php the_sub_field('title'); ?>
					</h3>
					<p class="gallery__text">
						<?php the_sub_field('text'); ?>
					</p>
					<a href="<?php echo get_home_url(); ?>/<?php the_sub_field('link'); ?>" class="link gallery__link">
						<span><?php the_sub_field('link_name'); ?></span>
					</a> 
				</div>                           
				<?php endwhile; ?>
				<?php endif; ?>

			</div>
			<span class="scroll services__scroll">
				<?php the_field('services_scroll'); ?>
			</span>
		</div>
	</section>
	<?php endif; ?>
	<?php if( get_field('blog_title') ): ?>
	<section class="blog-section">
		<div class="container blog-container">
			<h2 class="title blog__title">
				<?php the_field('blog_title'); ?>
			</h2>
			<div class="blog__content">
				<div class="blog-slider__nav">          
				<?php if( get_field('blog-slider_nav-item') ): ?>				               
				<?php while(has_sub_field('blog-slider_nav-item')): ?>
					<div class="blog-slider__nav-item">
						<img src="<?php the_sub_field('image'); ?>" alt="image">
					</div>                             
				<?php endwhile; ?>
				<?php endif; ?>
				</div>         				
				<div class="blog-slider">
					<?php if( get_field('blog-slider_item') ): ?>				               
					<?php while(has_sub_field('blog-slider_item')): ?>
						<div class="blog-slider__item">
							<h3 class="blog-slider__title">
								<?php the_sub_field('title'); ?>
							</h3>
							<p class="blog-slider__text">
								<?php the_sub_field('text'); ?>
							</p>
							<a href="<?php echo get_home_url(); ?>/<?php the_sub_field('link'); ?>" class="link blog-slider__link">
								<span><?php the_sub_field('link_name'); ?></span> 
							</a> 
						</div>                             
					<?php endwhile; ?>
					<?php endif; ?>				
				</div>
				<a href="<?php echo get_home_url(); ?>/<?php the_field('blog_link'); ?>" class="link blog__link">
					<span class="link__text">
						<?php the_field('link_title'); ?>
					</span>
				</a>
				<div class="counter blog-slider__counter">
					<span class="counter__left blog-slider__counter--left">
						01
					</span>
					/
					<span class="counter__right blog-slider__counter--right">
						04
					</span>
				</div>
			</div>
			<span class="scroll blog__scroll">
				<?php the_field('blog_scroll'); ?>
			</span>
		</div>
	</section>
	<?php endif; ?>
	<?php if( get_field('photo_title') ): ?>
	<section class="photo">
		<div class="container photo-container">
			<h2 class="title photo__title">
				<?php the_field('photo_title'); ?>
			</h2>
			<div class="photo-slider">
				<div class="photo-slider__item">
					<?php
						$vent_slider = get_field('vent_slider');				
						if( $vent_slider ): ?>	
							<div class="vent-slider">			
								<?php foreach( $vent_slider as $item ):        
									setup_postdata($item); ?>						
								<img src='<?php echo $item; ?>' class='vent-slider__item' alt='slide'>
								<?php endforeach; ?>
							</div>
							<?php 
							wp_reset_postdata(); ?>
						<?php endif; ?>
					<h3 class="photo-slider__title">
						<?php the_field('vent-slider_title'); ?>
					</h3>
					<button class="vent-slider__down">
						<svg width="30" height="16" viewbox="0 0 30 16" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M15 12.6875L2.81248 0.499999L0 0.499999L15 15.5L30 0.5L27.1875 0.5L15 12.6875Z"
								fill="white" />
						</svg>
					</button>
					<button class="vent-slider__up">
						<svg width="30" height="15" viewbox="0 0 30 15" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M15 2.81253L2.81248 15L-1.13146e-08 15L15 -6.61328e-07L30 15L27.1875 15L15 2.81253Z"
								fill="white" />
						</svg>
					</button>
					<div class="counter vent-slider__counter">
						<span class="counter__left vent-slider__counter--left">
							01
						</span>
						/
						<span class="counter__right vent-slider__counter--right"></span>
					</div>
				</div>
				<div class="photo-slider__item">
					<?php
						$pump_slider = get_field('pump_slider');				
						if( $pump_slider ): ?>	
							<div class="pump-slider">			
								<?php foreach( $pump_slider as $item ):        
									setup_postdata($item); ?>						
								<img src='<?php echo $item; ?>' class='pump-slider__item' alt='slide'>
								<?php endforeach; ?>
							</div>
							<?php 
						wp_reset_postdata(); ?>
					<?php endif; ?>
					<h3 class="photo-slider__title">
						<?php the_field('pump-slider_title'); ?>
					</h3>
					<button class="pump-slider__down">
						<svg width="30" height="16" viewbox="0 0 30 16" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M15 12.6875L2.81248 0.499999L0 0.499999L15 15.5L30 0.5L27.1875 0.5L15 12.6875Z"
								fill="white" />
						</svg>
					</button>
					<button class="pump-slider__up">
						<svg width="30" height="15" viewbox="0 0 30 15" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M15 2.81253L2.81248 15L-1.13146e-08 15L15 -6.61328e-07L30 15L27.1875 15L15 2.81253Z"
								fill="white" />
						</svg>
					</button>
					<div class="counter pump-slider__counter">
						<span class="counter__left pump-slider__counter--left">
							01
						</span>
						/
						<span class="counter__right pump-slider__counter--right"></span>
					</div>
				</div>
				<div class="photo-slider__item">
					<?php
						$other_slider = get_field('other_slider');				
						if( $other_slider ): ?>	
							<div class="other-slider">			
								<?php foreach( $other_slider as $item ):        
									setup_postdata($item); ?>						
								<img src='<?php echo $item; ?>' class='other-slider__item' alt='slide'>
								<?php endforeach; ?>
							</div>
							<?php 
						wp_reset_postdata(); ?>
					<?php endif; ?>
					<h3 class="photo-slider__title">
						<?php the_field('other-slider_title'); ?>
					</h3>
					<button class="other-slider__down">
						<svg width="30" height="16" viewbox="0 0 30 16" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M15 12.6875L2.81248 0.499999L0 0.499999L15 15.5L30 0.5L27.1875 0.5L15 12.6875Z"
								fill="white" />
						</svg>
					</button>
					<button class="other-slider__up">
						<svg width="30" height="15" viewbox="0 0 30 15" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M15 2.81253L2.81248 15L-1.13146e-08 15L15 -6.61328e-07L30 15L27.1875 15L15 2.81253Z"
								fill="white" />
						</svg>
					</button>
					<div class="counter other-slider__counter">
						<span class="counter__left other-slider__counter--left">
							01
						</span>
						/
						<span class="counter__right other-slider__counter--right"></span>
					</div>
				</div>
			</div>
			<span class="scroll photo__scroll">
				<?php the_field('photo_scroll'); ?>
			</span>
		</div>
	</section>
	<?php endif; ?>
</main>


<?php get_footer(); ?>
