<?php 
if( ! defined ('ABSPATH') ) {
    exit; 
}

function nes_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'nes' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'nes' ),
			'before_widget' => '<section id="%1$s" class="widget products-filter %2$s"><div class="products-filter__top">',
			'after_widget'  => '</div></section>',
			'before_title'  => '<h2 class="widget-title products-filter__title">',
			'after_title'   => '</h2><span class="products-filter__toggle"></span></div><div class="products-filter__bottom">',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Важливі статті', 'nes' ),
			'id'            => 'sidebar_articles',
			'description'   => esc_html__( 'Add widgets here.', 'nes' ),
			'before_widget' => '<section id="%1$s" class="widget article-right %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="sidebar-articles__title">',
			'after_title' => '</h3>'
		)
	);
}
add_action( 'widgets_init', 'nes_widgets_init' );