<?php
/**
 * Pagination - Show numbered pagination for catalog pages
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/pagination.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.3.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$total   = isset( $total ) ? $total : wc_get_loop_prop( 'total_pages' );
$current = isset( $current ) ? $current : wc_get_loop_prop( 'current_page' );
$base    = isset( $base ) ? $base : esc_url_raw( str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', get_pagenum_link( 999999999, false ) ) ) );
$format  = isset( $format ) ? $format : '';

if ( $total <= 1 ) {
	return;
}
?>

<nav class="woocommerce-pagination products-right__bottom">
	<?php
	
	echo paginate_links(
		apply_filters(
			'woocommerce_pagination_args',
			array( // WPCS: XSS ok.
				'base'      => $base,
				'format'    => $format,
				'add_args'  => false,
				'current'   => max( 1, $current ),
				'total'     => $total,
				'prev_text' => '<svg width="9" height="17" viewbox="0 0 15 30" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M2.81253 15L15 27.1875V30L-5.65728e-09 15L15 0V2.81248L2.81253 15Z"
					fill="#434343" />
			</svg>' . 'Назад',
				'next_text' => 'Вперед' . '<svg width="9" height="17" viewbox="0 0 16 30" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M12.6875 15L0.5 27.1875V30L15.5 15L0.5 0V2.81248L12.6875 15Z" fill="#434343" />
			</svg>',
				'type'      => 'list',
				'end_size'  => 3,
				'mid_size'  => 4,
			)
		)
	);
	?>
</nav>
