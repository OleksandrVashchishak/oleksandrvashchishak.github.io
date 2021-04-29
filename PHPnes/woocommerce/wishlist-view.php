<?php
/**
 * Wishlist page template - Standard Layout
 *
 * @author  Your Inspiration Themes
 * @package YITH WooCommerce Wishlist
 * @version 3.0.0
 */

/**
 * Template variables:
 *
 * @var $wishlist                      \YITH_WCWL_Wishlist Current wishlist
 * @var $wishlist_items                array Array of items to show for current page
 * @var $wishlist_token                string Current wishlist token
 * @var $wishlist_id                   int Current wishlist id
 * @var $users_wishlists               array Array of current user wishlists
 * @var $pagination                    string yes/no
 * @var $per_page                      int Items per page
 * @var $current_page                  int Current page
 * @var $page_links                    array Array of page links
 * @var $is_user_owner                 bool Whether current user is wishlist owner
 * @var $show_price                    bool Whether to show price column
 * @var $show_dateadded                bool Whether to show item date of addition
 * @var $show_stock_status             bool Whether to show product stock status
 * @var $show_add_to_cart              bool Whether to show Add to Cart button
 * @var $show_remove_product           bool Whether to show Remove button
 * @var $show_price_variations         bool Whether to show price variation over time
 * @var $show_variation                bool Whether to show variation attributes when possible
 * @var $show_cb                       bool Whether to show checkbox column
 * @var $show_quantity                 bool Whether to show input quantity or not
 * @var $show_ask_estimate_button      bool Whether to show Ask an Estimate form
 * @var $show_last_column              bool Whether to show last column (calculated basing on previous flags)
 * @var $move_to_another_wishlist      bool Whether to show Move to another wishlist select
 * @var $move_to_another_wishlist_type string Whether to show a select or a popup for wishlist change
 * @var $additional_info               bool Whether to show Additional info textarea in Ask an estimate form
 * @var $price_excl_tax                bool Whether to show price excluding taxes
 * @var $enable_drag_n_drop            bool Whether to enable drag n drop feature
 * @var $repeat_remove_button          bool Whether to repeat remove button in last column
 * @var $available_multi_wishlist      bool Whether multi wishlist is enabled and available
 * @var $no_interactions               bool
 */

if ( ! defined( 'YITH_WCWL' ) ) {
	exit;
} // Exit if accessed directly
?>

<!-- WISHLIST TABLE -->
<table
	class="shop_table cart wishlist_table wishlist_view traditional responsive <?php echo $no_interactions ? 'no-interactions' : ''; ?> <?php echo $enable_drag_n_drop ? 'sortable' : ''; ?> "
	data-pagination="<?php echo esc_attr( $pagination ); ?>" data-per-page="<?php echo esc_attr( $per_page ); ?>" data-page="<?php echo esc_attr( $current_page ); ?>"
	data-id="<?php echo esc_attr( $wishlist_id ); ?>" data-token="<?php echo esc_attr( $wishlist_token ); ?>">

	<?php $column_count = 2; ?>

	<thead>
	<tr>
		<?php if ( $show_cb ) : ?>
			<?php $column_count ++; ?>
			<th class="product-checkbox">
				<input type="checkbox" value="" name="" id="bulk_add_to_cart"/>
			</th>
		<?php endif; ?>


		<th class="product-thumbnail"></th>
		<th class="product-name">
			<span class="nobr">
				<?php echo esc_html( apply_filters( 'yith_wcwl_wishlist_view_name_heading', pll__( 'Назва товару', 'yith-woocommerce-wishlist' ), $wishlist ) ); ?>
			</span>
		</th>

		<?php if ( $show_price || $show_price_variations ) : ?>
			<?php $column_count ++; ?>
			<th class="product-price">
				<span class="nobr">
					<?php echo esc_html( apply_filters( 'yith_wcwl_wishlist_view_price_heading', pll__( 'Ціна', 'yith-woocommerce-wishlist' ), $wishlist ) ); ?>
				</span>
			</th>
		<?php endif; ?>

		<?php if ( $show_quantity ) : ?>
			<?php $column_count ++; ?>
			<th class="product-quantity">
				<span class="nobr">
					<?php echo esc_html( apply_filters( 'yith_wcwl_wishlist_view_quantity_heading', pll__( 'Quantity', 'yith-woocommerce-wishlist' ), $wishlist ) ); ?>
				</span>
			</th>
		<?php endif; ?>

		<?php if ( $show_stock_status ) : ?>
			<?php $column_count ++; ?>
			<th class="product-stock-status">
				<span class="nobr">
					<?php echo esc_html( apply_filters( 'yith_wcwl_wishlist_view_stock_heading', pll__( 'Stock status', 'yith-woocommerce-wishlist' ), $wishlist ) ); ?>
				</span>
			</th>
		<?php endif; ?>

		<?php if ( $show_last_column ) : ?>
			<?php $column_count ++; ?>
			<th class="product-add-to-cart">
				<span class="nobr">
					<?php echo esc_html( apply_filters( 'yith_wcwl_wishlist_view_cart_heading', pll__( 'Дія', 'yith-woocommerce-wishlist' ), $wishlist ) ); ?>
				</span>
			</th>
		<?php endif; ?>

		<?php if ( $enable_drag_n_drop ) : ?>
			<?php $column_count ++; ?>
			<th class="product-arrange">
				<span class="nobr">
					<?php echo esc_html( apply_filters( 'yith_wcwl_wishlist_view_arrange_heading', pll__( 'Arrange', 'yith-woocommerce-wishlist' ), $wishlist ) ); ?>
				</span>
			</th>
		<?php endif; ?>

		<?php if ( $show_remove_product ) : ?>
			<?php $column_count ++; ?>
			<th class="product-remove">
				<span class="nobr">
					<?php echo esc_html( apply_filters( 'yith_wcwl_wishlist_view_remove_heading', '', $wishlist ) ); ?>
				</span>
			</th>
		<?php endif; ?>

	</tr>
	</thead>

	<tbody class="wishlist-items-wrapper">
	<?php
	if ( $wishlist && $wishlist->has_items() ) :
		foreach ( $wishlist_items as $item ) :
			// phpcs:ignore Generic.Commenting.DocComment
			/**
			 * @var $item \YITH_WCWL_Wishlist_Item
			 */
			global $product;

			$product      = $item->get_product();
			$availability = $product->get_availability();
			$stock_status = isset( $availability['class'] ) ? $availability['class'] : false;

			if ( $product && $product->exists() ) :
				?>
				<tr id="yith-wcwl-row-<?php echo esc_attr( $item->get_product_id() ); ?>" data-row-id="<?php echo esc_attr( $item->get_product_id() ); ?>">
					<?php if ( $show_cb ) : ?>
						<td class="product-checkbox">
							<input type="checkbox" value="yes" name="items[<?php echo esc_attr( $item->get_product_id() ); ?>][cb]"/>
						</td>
					<?php endif ?>

					

					<td class="product-thumbnail">
						<?php do_action( 'yith_wcwl_table_before_product_thumbnail', $item, $wishlist ); ?>

						<a href="<?php echo esc_url( get_permalink( apply_filters( 'woocommerce_in_cart_product', $item->get_product_id() ) ) ); ?>">
							<?php echo $product->get_image(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
						</a>

						<?php do_action( 'yith_wcwl_table_after_product_thumbnail', $item, $wishlist ); ?>
					</td>

					<td class="product-name">
						<?php do_action( 'yith_wcwl_table_before_product_name', $item, $wishlist ); ?>

						<a href="<?php echo esc_url( get_permalink( apply_filters( 'woocommerce_in_cart_product', $item->get_product_id() ) ) ); ?>">
							<?php echo wp_kses_post( apply_filters( 'woocommerce_in_cartproduct_obj_title', $product->get_title(), $product ) ); ?>
						</a>

						<?php
						if ( $show_variation && $product->is_type( 'variation' ) ) {
							// phpcs:ignore Generic.Commenting.DocComment
							/**
							 * @var $product \WC_Product_Variation
							 */
							echo wc_get_formatted_variation( $product ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						}
						?>

						<?php do_action( 'yith_wcwl_table_after_product_name', $item, $wishlist ); ?>
					</td>

					<?php if ( $show_price || $show_price_variations ) : ?>
						<td class="product-price">
							<?php do_action( 'yith_wcwl_table_before_product_price', $item, $wishlist ); ?>

							<?php
							if ( $show_price ) {
								echo $item->get_formatted_product_price(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
							}

							if ( $show_price_variations ) {
								echo $item->get_price_variation(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
							}
							?>

							<?php do_action( 'yith_wcwl_table_after_product_price', $item, $wishlist ); ?>
						</td>
					<?php endif ?>

					<?php if ( $show_quantity ) : ?>
						<td class="product-quantity">
							<?php do_action( 'yith_wcwl_table_before_product_quantity', $item, $wishlist ); ?>

							<?php if ( ! $no_interactions && $wishlist->current_user_can( 'update_quantity' ) ) : ?>
								<input type="number" min="1" step="1" name="items[<?php echo esc_attr( $item->get_product_id() ); ?>][quantity]" value="<?php echo esc_attr( $item->get_quantity() ); ?>"/>
							<?php else : ?>
								<?php echo esc_html( $item->get_quantity() ); ?>
							<?php endif; ?>

							<?php do_action( 'yith_wcwl_table_after_product_quantity', $item, $wishlist ); ?>
						</td>
					<?php endif; ?>

					<?php if ( $show_stock_status ) : ?>
						<td class="product-stock-status">
							<?php do_action( 'yith_wcwl_table_before_product_stock', $item, $wishlist ); ?>

							<?php echo 'out-of-stock' === $stock_status ? '<span class="wishlist-out-of-stock">' . esc_html( apply_filters( 'yith_wcwl_out_of_stock_label', __( 'Out of stock', 'yith-woocommerce-wishlist' ) ) ) . '</span>' : '<span class="wishlist-in-stock">' . esc_html( apply_filters( 'yith_wcwl_in_stock_label', __( 'In Stock', 'yith-woocommerce-wishlist' ) ) ) . '</span>'; ?>

							<?php do_action( 'yith_wcwl_table_after_product_stock', $item, $wishlist ); ?>
						</td>
					<?php endif ?>

					<?php if ( $show_last_column ) : ?>
						<td class="product-add-to-cart">
							<?php do_action( 'yith_wcwl_table_before_product_cart', $item, $wishlist ); ?>

							<!-- Date added -->
							<?php
							if ( $show_dateadded && $item->get_date_added() ) :
								// translators: date added label: 1 date added.
								echo '<span class="dateadded">' . esc_html( sprintf( __( 'Added on: %s', 'yith-woocommerce-wishlist' ), $item->get_date_added_formatted() ) ) . '</span>';
							endif;
							?>

							<?php do_action( 'yith_wcwl_table_product_before_add_to_cart', $item, $wishlist ); ?>

							<!-- Add to cart button -->
							<?php $show_add_to_cart = apply_filters( 'yith_wcwl_table_product_show_add_to_cart', $show_add_to_cart, $item, $wishlist ); ?>
							<?php if ( $show_add_to_cart && isset( $stock_status ) && 'out-of-stock' !== $stock_status ) : ?>
								<?php woocommerce_template_loop_add_to_cart( array( 'quantity' => $show_quantity ? $item->get_quantity() : 1 ) ); ?>
							<?php endif ?>

							<?php do_action( 'yith_wcwl_table_product_after_add_to_cart', $item, $wishlist ); ?>

							<!-- Change wishlist -->
							<?php $move_to_another_wishlist = apply_filters( 'yith_wcwl_table_product_move_to_another_wishlist', $move_to_another_wishlist, $item, $wishlist ); ?>
							<?php if ( $move_to_another_wishlist && $available_multi_wishlist && count( $users_wishlists ) > 1 ) : ?>
								<?php if ( 'select' === $move_to_another_wishlist_type ) : ?>
									<select class="change-wishlist selectBox">
										<option value=""><?php esc_html_e( 'Move', 'yith-woocommerce-wishlist' ); ?></option>
										<?php
										foreach ( $users_wishlists as $wl ) :
											// phpcs:ignore Generic.Commenting.DocComment
											/**
											 * @var $wl \YITH_WCWL_Wishlist
											 */
											if ( $wl->get_token() === $wishlist_token ) {
												continue;
											}
											?>
											<option value="<?php echo esc_attr( $wl->get_token() ); ?>">
												<?php echo sprintf( '%s - %s', esc_html( $wl->get_formatted_name() ), esc_html( $wl->get_formatted_privacy() ) ); ?>
											</option>
										<?php
										endforeach;
										?>
									</select>
								<?php else : ?>
									<a href="#move_to_another_wishlist" class="move-to-another-wishlist-button" data-rel="prettyPhoto[move_to_another_wishlist]">
										<?php echo esc_html( apply_filters( 'yith_wcwl_move_to_another_list_label', __( 'Move to another list &rsaquo;', 'yith-woocommerce-wishlist' ) ) ); ?>
									</a>
								<?php endif; ?>

								<?php do_action( 'yith_wcwl_table_product_after_move_to_another_wishlist', $item, $wishlist ); ?>

							<?php endif; ?>

							<!-- Remove from wishlist -->
							<?php if ( $repeat_remove_button ) : ?>
								<a href="<?php echo esc_url( add_query_arg( 'remove_from_wishlist', $item->get_product_id() ) ); ?>" class="remove_from_wishlist button" title="<?php echo esc_html( apply_filters( 'yith_wcwl_remove_product_wishlist_message_title', __( 'Remove this product', 'yith-woocommerce-wishlist' ) ) ); ?>"><?php esc_html_e( 'Remove', 'yith-woocommerce-wishlist' ); ?></a>
							<?php endif; ?>

							<?php do_action( 'yith_wcwl_table_after_product_cart', $item, $wishlist ); ?>
						</td>
					<?php endif; ?>

					<?php if ( $enable_drag_n_drop ) : ?>
						<td class="product-arrange ">
							<i class="fa fa-arrows"></i>
							<input type="hidden" name="items[<?php echo esc_attr( $item->get_product_id() ); ?>][position]" value="<?php echo esc_attr( $item->get_position() ); ?>"/>
						</td>
					<?php endif; ?>

					<?php if ( $show_remove_product ) : ?>
						<td class="product-remove">
							<div>
								<a href="<?php echo esc_url( add_query_arg( 'remove_from_wishlist', $item->get_product_id() ) ); ?>" class="remove remove_from_wishlist" title="<?php echo esc_html( apply_filters( 'yith_wcwl_remove_product_wishlist_message_title', __( 'Remove this product', 'yith-woocommerce-wishlist' ) ) ); ?>">
									<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
										<g clip-path="url(#clip0)">
										<path d="M11.4831 6.52148C11.2502 6.52148 11.0615 6.71019 11.0615 6.94303V14.9102C11.0615 15.1429 11.2502 15.3318 11.4831 15.3318C11.7159 15.3318 11.9046 15.1429 11.9046 14.9102V6.94303C11.9046 6.71019 11.7159 6.52148 11.4831 6.52148Z" fill="#8F8F8F"/>
										<path d="M6.50846 6.52148C6.27562 6.52148 6.08691 6.71019 6.08691 6.94303V14.9102C6.08691 15.1429 6.27562 15.3318 6.50846 15.3318C6.7413 15.3318 6.93001 15.1429 6.93001 14.9102V6.94303C6.93001 6.71019 6.7413 6.52148 6.50846 6.52148Z" fill="#8F8F8F"/>
										<path d="M14.6954 2.19209H12.5371V1.66516C12.5396 1.22204 12.3644 0.796544 12.0507 0.483514C11.737 0.170649 11.3109 -0.00356726 10.8678 5.53875e-05H7.12458C6.68146 -0.00356726 6.25531 0.170649 5.94162 0.483514C5.62793 0.796544 5.45273 1.22204 5.4552 1.66516V2.19209H3.29692C2.48809 2.19225 1.80489 2.79213 1.70016 3.59405C1.5956 4.39614 2.10211 5.15129 2.88378 5.35877V15.7447C2.88378 16.3586 3.10888 16.9351 3.5021 17.3487C3.89351 17.7635 4.43822 17.999 5.0083 18H12.984C13.5543 17.999 14.099 17.7635 14.4902 17.3487C14.8835 16.9351 15.1086 16.3586 15.1086 15.7447V5.35877C15.8902 5.15129 16.3967 4.39614 16.2922 3.59405C16.1875 2.79213 15.5043 2.19225 14.6954 2.19209ZM6.29829 1.66516C6.29549 1.44566 6.38177 1.23439 6.53755 1.07944C6.69316 0.924489 6.90492 0.839357 7.12458 0.843144H10.8678C11.0874 0.839357 11.2992 0.924489 11.4548 1.07944C11.6106 1.23423 11.6969 1.44566 11.6941 1.66516V2.19209H6.29829V1.66516ZM12.984 17.1569H5.0083C4.28755 17.1569 3.72687 16.5378 3.72687 15.7447V5.39582H14.2655V15.7447C14.2655 16.5378 13.7048 17.1569 12.984 17.1569ZM14.6954 4.55273H3.29692C2.87785 4.55273 2.53814 4.21303 2.53814 3.79395C2.53814 3.37488 2.87785 3.03517 3.29692 3.03517H14.6954C15.1145 3.03517 15.4542 3.37488 15.4542 3.79395C15.4542 4.21303 15.1145 4.55273 14.6954 4.55273Z" fill="#8F8F8F"/>
										<path d="M8.99673 6.52148C8.7639 6.52148 8.5752 6.71019 8.5752 6.94303V14.9102C8.5752 15.1429 8.7639 15.3318 8.99673 15.3318C9.22957 15.3318 9.41827 15.1429 9.41827 14.9102V6.94303C9.41827 6.71019 9.22957 6.52148 8.99673 6.52148Z" fill="#8F8F8F"/>
										</g>
										<defs>
										<clipPath id="clip0">
										<rect width="18" height="18" fill="white"/>
										</clipPath>
										</defs>
									</svg>
								</a>
							</div>
						</td>
					<?php endif; ?>
				</tr>
			<?php
			endif;
		endforeach;
	else :
	?>
		<tr>
			<td colspan="<?php echo esc_attr( $column_count ); ?>" class="wishlist-empty"><?php echo esc_html( apply_filters( 'yith_wcwl_no_product_to_remove_message', pll__( 'Жоден товар не доданий до списку бажань', 'yith-woocommerce-wishlist' ), $wishlist ) ); ?></td>
		</tr>
	<?php
	endif;

	if ( ! empty( $page_links ) ) :
	?>
		<tr class="pagination-row wishlist-pagination">
			<td colspan="<?php echo esc_attr( $column_count ); ?>"><?php echo $page_links; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></td>
		</tr>
	<?php endif ?>
	</tbody>

</table>
