<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package nes
 */

get_header();
?>

	<main id="primary" class="site-main">

		<section class="error-404 not-found">
			<div class="container not-found__container">
				<header class="page-header">	
					<h1 class="page-title"><?php esc_html_e( '404', 'nes' ); ?></h1>
					<p class="not-found__subtitle"><?php esc_html_e( 'Сторінку не знайдено', 'nes' ); ?></p>
				</header><!-- .page-header -->

				<div class="page-content">
					<p class="page-content__text"><?php esc_html_e( 'Ми вже працюємо над вирішенням проблеми. що виникла. Для того, щоб продовжити роботу із сайтом Ви можете повернутися на головну сторінку.', 'nes' ); ?></p>
					<a href="<?php echo get_home_url(); ?>" class="link not-found__link">
						<span><?php esc_html_e( 'На головну сторінку', 'nes' ); ?></span>
					</a>
				</div><!-- .page-content -->
				<div class="not-found__img">
					<img src="<?php echo the_field('404', 'option'); ?>" alt="">
				</div>
			</div><!-- container -->
		</section><!-- .error-404 -->

	</main><!-- #main -->

<?php
get_footer();
