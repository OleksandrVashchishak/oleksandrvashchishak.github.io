<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>

<div class="page-container">
	<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>
	
	<section class="description" id="description">
		<div class="description__top">
			<ul class="description-list">
				<li class="description-list__item active">
					<a href="#description">
						<?php if (get_locale() == 'uk') { 
							the_field('card_nav_one', 'option'); }
						else { the_field('card_nav_one_ru', 'option'); } ?>
					</a>
				</li>
				<li class="description-list__item">
					<a href="#technical">
						<?php if (get_locale() == 'uk') { 
							the_field('card_nav_two', 'option'); }
						else { the_field('card_nav_two_ru', 'option'); } ?>
					</a>
				</li>
				<li class="description-list__item">
					<a href="#instruction">
						<?php if (get_locale() == 'uk') { 
							the_field('card_nav_three', 'option'); }
						else { the_field('card_nav_three_ru', 'option'); } ?>
					</a>
				</li>
				<li class="description-list__item">
					<a href="#download">
						<?php if (get_locale() == 'uk') { 
							the_field('card_nav_four', 'option'); }
						else { the_field('card_nav_four_ru', 'option'); } ?>
					</a>
				</li>
				<li class="description-list__item">
					<a href="#consultation">
						<?php if (get_locale() == 'uk') { 
							the_field('card_nav_five', 'option'); }
						else { the_field('card_nav_five_ru', 'option'); } ?>
					</a>
				</li>
				<li class="description-list__item">
					<a href="#alternative">
						<?php if (get_locale() == 'uk') { 
							the_field('card_nav_six', 'option'); }
						else { the_field('card_nav_six_ru', 'option'); } ?>
					</a>
				</li>
				<li class="description-list__item">
					<a href="#reviews">
						<?php if (get_locale() == 'uk') { 
							the_field('card_nav_seven', 'option'); }
						else { the_field('card_nav_seven_ru', 'option'); } ?>
					</a>
				</li>
			</ul>
		</div>
				
				<?php while ( have_posts() ) : ?>
					<?php the_post(); ?>

					<?php wc_get_template_part( 'content', 'single-product' ); ?>

				<?php endwhile; // end of the loop. ?>

			
	</section>
	<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20 
	 */
	do_action( 'woocommerce_after_single_product_summary' );
	?>
		
		</div> <!-- container details end -->
		<button class="link details__link">
			<span>
				<?php echo pll__('Більше', 'woocommerce'); ?>
			</span>
		</button>
	</section> <!-- details end -->
	<section class="technical" id="technical">
		<div class="technical__container">
			<?php if( get_field('technical_table') ): ?>
		
			<h2 class="section-title technical__title">
				<?php if (get_locale() == 'uk') { 
					the_field('technical_title', 'option'); }
				else { the_field('technical_title_ru', 'option'); } ?>
			</h2>
			<h3></h3>
			<div class="technical__table">
				<?php the_field('technical_table'); ?>

				<button class="link technical__link">
					<span>
						<?php if (get_locale() == 'uk') { 
							the_field('technical_link', 'option'); }
						else { the_field('technical_link_ru', 'option'); } ?>
					</span>
				</button>
			</div>
			<?php endif; ?>
			<?php if( get_field('technical_table_three') ): ?>
			<div class="technical__table">
			<?php the_field('technical_table_three'); ?>
			
				<button class="link technical__link">
					<span>
						<?php if (get_locale() == 'uk') { 
							the_field('technical_link', 'option'); }
							else { the_field('technical_link_ru', 'option'); } ?>
					</span>
				</button>
			</div>
			<?php endif; ?>
			<?php if( get_field('technical_table_two') ): ?>
			<div class="technical__table">
			<?php the_field('technical_table_two'); ?>
			
				<button class="link technical__link">
					<span>
						<?php if (get_locale() == 'uk') { 
							the_field('technical_link', 'option'); }
							else { the_field('technical_link_ru', 'option'); } ?>
					</span>
				</button>
			</div>
			<?php endif; ?>
		</div>
	</section>
	
	<section class="instruction" id="instruction">
		<div class="instruction__container">
			<?php if( get_field('instruction-list_item') ): ?>
			<h2 class="section-title instruction__title">
				<?php if (get_locale() == 'uk') { 
					the_field('instruction_title', 'option'); }
				else { the_field('instruction_title_ru', 'option'); } ?>
			</h2>
			<ul class="instruction-list">

			<?php if( get_field('instruction-list_item') ): ?>				
				<?php while(has_sub_field('instruction-list_item')): ?>
				<li class="instruction-list__item">
					<div class="instruction-list__img">
						<?php if( get_sub_field('image') ) { ?>
							<img src="<?php the_sub_field('image'); ?>" alt="image">
						<?php } else { ?>
							<img src="http://new.nse.com.ua/wp-content/uploads/2021/03/frame-21.png" alt="image">
						<?php } ?>	
					</div>	
					<a href="<?php the_sub_field('file'); ?>" download class="instruction-list__title">
						<?php the_sub_field('title'); ?>
					</a>
				</li>
				<?php endwhile; ?>
			<?php endif; ?>
				
			</ul>
			<?php endif; ?>
		</div>
	</section>
	
	<?php if( get_field('download-list_item') ): ?>	
	<section class="download" id="download">

		<h2 class="section-title download__title">
			<?php if (get_locale() == 'uk') { 
				the_field('download_title', 'option'); }
			else { the_field('download_title_ru', 'option'); } ?>
		</h2>
		<ul class="download-list">
			
			<?php if( get_field('download-list_item') ): ?>				
			<?php while(has_sub_field('download-list_item')): ?>
				<li class="download-list__item">
					<iframe width="360" height="200" src="https://www.youtube.com/embed/<?php the_sub_field('cod'); ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</li>
			<?php endwhile; ?>
			<?php endif; ?>
			
		</ul>
	</section>
	<?php endif; ?>
	<section class="consultation" id="consultation">
		<div class="download-question">
			<h3 class="download-question__title">
				<?php if (get_locale() == 'uk') { 
					the_field('download-question_title', 'option'); }
				else { the_field('download-question_title_ru', 'option'); } ?>
			</h3>
			<p class="download-question__text">
				<?php if (get_locale() == 'uk') { 
					the_field('download-question_text', 'option'); }
				else { the_field('download-question_text_ru', 'option'); } ?>
			</p>
			<button class="link download-question__link modal__btn" data-path="popup">
				<span>
					<?php if (get_locale() == 'uk') { 
						the_field('download-question_link', 'option'); }
					else { the_field('download-question_link_ru', 'option'); } ?>
				</span>
			</button>
		</div>
	</section>
	
		<div class="go-up alternative__up">
			<a href="#" class="go-up__link">
				<svg width="16" height="14" viewbox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M8 1.50002L14.5 8L16 8L8 -3.49691e-07L0 8L1.49999 8L8 1.50002Z" fill="#434343" />
					<path d="M8 7.50002L14.5 14L16 14L8 6L0 14L1.49999 14L8 7.50002Z" fill="#434343" />
				</svg>
				<?php if (get_locale() == 'uk') { 
						the_field('go-up_link', 'option'); }
					else { the_field('go-up_link_ru', 'option'); } ?>
			</a>
		</div>
		<?php 
			do_action( 'woocommerce_after_single_product' ); 

		?>		
	
		<?php
				/**
				 * woocommerce_after_main_content hook.
				 *
				 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
				 */
				do_action( 'woocommerce_after_main_content' );
			?>
</div>
<?php
get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
