<?php 
    /* 
        Template Name: Контакти
		  Template Post Type: page
    */
?>
<?php get_header(); ?>
<section class="contacts">
	<div class="container">
		<h1 class="page-title contacts__title">
			<?php the_title(); ?>
		</h1>
		<div class="contacts__top">
			<div class="contacts-left">
				<div class="contacts-left__block">
					<h3 class="contacts__subtitle">
						<?php the_field('contacts_subtitle'); ?>
					</h3>
					<p class="contacts__text">
						<?php the_field('contacts_text'); ?>
					</p>
				</div>
				<div class="contacts-left__block">
					<h3 class="contacts__subtitle">
						<?php the_field('contacts_subtitle_2'); ?>
					</h3>
					<a href="mailto:<?php the_field('contacts_text_2'); ?>" class="contacts__link contacts__text">
						<?php the_field('contacts_text_2'); ?>
					</a>
				</div>
				<div class="contacts-left__block">
					<h3 class="contacts__subtitle">
						<?php the_field('contacts_subtitle_3'); ?>
					</h3>
					<a href="tel:<?php the_field('contacts_tel_icon_2'); ?>" class="contacts__tel contacts__tel--icon">
						<?php the_field('contacts_tel_icon'); ?>
					</a>
					<a href="viber://chat?number=<?php the_field('contacts_tel-viber_2'); ?>" class="contacts__tel contacts__tel--viber">
						<?php the_field('contacts_tel-viber'); ?>
					</a>
				</div>
			</div>
			<div class="contacts-right">
				<h2 class="form__title contacts-form__title">
					<?php the_field('contacts-form_title'); ?>
				</h2>
				<?php the_field('contacts-form'); ?>
			</div>
		</div>
		<div class="contacts-map" style="background-image: url('<?php the_field("contacts-map"); ?>');">
			<img src="<?php the_field('contacts-map_img'); ?>" class="contacts-map__img" alt="NES">
			<a href="<?php the_field('contacts-map_link'); ?>" target="_blank" class="btn contacts-map__btn">
				<?php the_field('contacts-map_btn'); ?>
			</a>
		</div>
	</div>
</section>

<?php get_footer(); ?>
