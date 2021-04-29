<?php
/**
 * The template for displaying the footer
 */

?>

<footer class="footer">
		<section class="footer-top">
			<div class="container footer__container">
				<div class="footer__left">
					<div class="footer__logo">
						<?php the_custom_logo(); ?>
					</div>

					<p class="footer__text">
						<?php if (get_locale() == 'uk') {
								 the_field('footer_text', 'option');}
						else { the_field('footer_text_ru', 'option'); } ?>
					</p>
					<?php if(get_field('link_text', 'option')): ?>
					<button class="link footer__link modal__btn" data-path="popup">
						<span class="link__text">
							<?php if (get_locale() == 'uk') {
								 the_field('link_text', 'option');}
							else { the_field('link_text_ru', 'option'); } ?>
						</span>
					</button>
					<?php endif; ?>
				</div>
				<nav class="footer-nav">
					<?php if(get_field('footer_title_1', 'option')): ?>
					<div class="footer-nav__item">
						<h2 class="footer__title">
							<?php if (get_locale() == 'uk') {
								 the_field('footer_title_1', 'option'); }
							else { the_field('footer_title_1_ru', 'option'); } ?>
						</h2>

						<?php if(get_field('footer_first-list', 'option')): ?>
						<ul class="footer-list">
							<?php while(has_sub_field('footer_first-list', 'option')): ?>

							<li class="footer-list__item">
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

					</div>
					<?php endif; ?>
					<?php if(get_field('footer_title_2', 'option')): ?>
					<div class="footer-nav__item">
						<h2 class="footer__title">
							<?php if (get_locale() == 'uk') {
								the_field('footer_title_2', 'option'); }
							else { the_field('footer_title_2_ru', 'option'); } ?>
						</h2>

						<?php if(get_field('footer_second-list', 'option')): ?>
							<ul class="footer-list">
								<?php while(has_sub_field('footer_second-list', 'option')): ?>

								<li class="footer-list__item">
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

					</div>
					<?php endif; ?>
					<?php if(get_field('footer_title_3', 'option')): ?>
					<div class="footer-nav__item">
						<h2 class="footer__title">
							<?php if (get_locale() == 'uk') {
								the_field('footer_title_3', 'option'); }
							else { the_field('footer_title_3_ru', 'option'); } ?>
						</h2>

						<?php if(get_field('footer_third-list', 'option')): ?>
							<ul class="footer-list">
								<?php while(has_sub_field('footer_third-list', 'option')): ?>

								<li class="footer-list__item">
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
					</div>
					<?php endif; ?>
				</nav>
			</div>
		</section>
		<section class="footer-bottom">	
			<div class="container footer-bottom__container">
				<a href="https://www.facebook.com/nse.com.ua" class="footer-bottom__facebook">
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M0 0V24H12.7815V14.7293H9.65698V10.9447H12.7815V7.76639C12.7815 5.45486 14.6553 3.58102 16.9668 3.58102H20.2332V6.98419H17.896C17.1615 6.98419 16.566 7.57965 16.566 8.31413V10.9448H20.1745L19.6758 14.7294H16.566V24H24V0H0Z" fill="#3A559F"/>
					</svg>
				</a>
				<p class="footer-bottom__text">
					<?php if (get_locale() == 'uk') {
						the_field('footer-bottom_text', 'option'); }
					else { the_field('footer-bottom_text_ru', 'option'); } ?>
				</p>
				
				<?php
					wp_nav_menu( array(
						'theme_location' => 'footer',
						'container'       => 'ul',
						'container_class' => 'footer-menu',
						'menu_class'  => 'footer-menu'
					) );
				?>
			</div>
			<div class="modal-overlay">
				<div class="modal modal--1" data-target="popup">
					<div class="modal__close">
						<button class="close modal--close"></button>
					</div>

					<div class="modal-left">
						<?php if (get_locale() == 'uk') {
							the_field('modal_title', 'option');
							the_field('modal_text', 'option');
							the_field('modal_form', 'option'); }
						else { the_field('modal_title_ru', 'option');
							 the_field('modal_text_ru', 'option');
							 the_field('modal_form_ru', 'option');} ?>
					</div>

					<div class="modal-right">
						<img src="<?php the_field('modal_right', 'option'); ?>" class="modal-right__img" alt="man">
					</div>
				</div>
			</div>
		</section>
	</footer>

<?php wp_footer(); ?>
</body>
</html>
