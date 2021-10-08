<?php
function get_breadcrumbs() {

	$home_icon = '<svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
	<path d="M20.5 25.0001H16.5C16.224 25.0001 16 24.7761 16 24.5001V17.5001C16 17.2241 15.776 17.0001 15.5 17.0001H10.5C10.224 17.0001 10 17.2241 10 17.5001V24.5001C10 24.7761 9.776 25.0001 9.5 25.0001H5.5C4.673 25.0001 4 24.3271 4 23.5001V14.0001H2C1.449 14.0001 1 13.5511 1 13.0001C1 12.7351 1.108 12.4751 1.296 12.2871L12.65 1.14311C12.844 0.95311 13.156 0.95311 13.35 1.14311L24.7 12.2831C24.892 12.4751 25 12.7351 25 13.0001C25 13.5511 24.551 14.0001 24 14.0001H22V23.5001C22 24.3271 21.327 25.0001 20.5 25.0001ZM17 24.0001H20.5C20.776 24.0001 21 23.7761 21 23.5001V13.5001C21 13.2241 21.224 13.0001 21.5 13.0001H24L13 2.20111L2 12.9971L4.5 13.0001C4.776 13.0001 5 13.2241 5 13.5001V23.5001C5 23.7761 5.224 24.0001 5.5 24.0001H9V17.5001C9 16.6731 9.673 16.0001 10.5 16.0001H15.5C16.327 16.0001 17 16.6731 17 17.5001V24.0001Z" fill="#434343" stroke="#434343" stroke-width="0.5"/>
	</svg>';

	$text['home']     = __($home_icon,'nes');
	$text['category'] = __('Archive','nes').' "%s"';
	$text['search']   = __('Search results','nes').' "%s"';
	$text['tag']      = __('Tag','nes').' "%s"';
	$text['author']   = __('Author','nes').' %s';
	$text['404']      = __('Error 404','nes');

	$show_current   = 1;
	$show_on_home   = 0;
	$show_home_link = 1;
	$show_title     = 1;
	$delimiter      = '<span class="arrow"><svg width="8" height="16" viewBox="0 0 16 30" fill="none" xmlns="http://www.w3.org/2000/svg">
	<path d="M12.6875 15L0.5 27.1875V30L15.5 15L0.5 0V2.81248L12.6875 15Z" fill="#434343"></path>
</svg></span>';
	$before         = '<span class="current">';
	$after          = '</span>';

	global $post;
	$home_link    = home_url('/');
	$link_attr    = ' ';
	$link         = '<a' . $link_attr . ' href="%1$s">%2$s</a>';
	$parent_id    = $parent_id_2 = $post->post_parent;
	$frontpage_id = get_option('page_on_front');

	if (is_home() || is_front_page()) {

		if ($show_on_home == 1) echo '<div><a href="' . esc_url($home_link) . '">' . $text['home'] . '</a></div>';

	}
	else {

		echo '<div class="breadcrumbs" >';
		echo '<div class="breadcrumbs-wrapper" >';
		if ($show_home_link == 1) {
			echo sprintf($link, $home_link, $text['home']);
			if ($frontpage_id == 0 || $parent_id != $frontpage_id) echo $delimiter;
		}

		if ( is_category() ) {
			$this_cat = get_category(get_query_var('cat'), false);
			if ($this_cat->parent != 0) {
				$cats = get_category_parents($this_cat->parent, TRUE, $delimiter);
				if ($show_current == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
				$cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);
				$cats = str_replace('</a>', '</a>' . $link_after, $cats);
				if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
				echo $cats;
			}
			if ($show_current == 1) echo $before . sprintf($text['category'], single_cat_title('', false)) . $after;

		} elseif ( is_search() ) {
			echo $before . sprintf($text['search'], get_search_query()) . $after;

		} elseif ( is_day() ) {
			echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
			echo sprintf($link, get_month_link(get_the_time('Y'),get_the_time('m')), get_the_time('F')) . $delimiter;
			echo $before . get_the_time('d') . $after;

		} elseif ( is_month() ) {
			echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
			echo $before . get_the_time('F') . $after;

		} elseif ( is_year() ) {
			echo $before . get_the_time('Y') . $after;

		} elseif ( is_post_type_archive( 'product' ) ) {

			$_name = wc_get_page_id( 'shop' ) ? get_the_title( wc_get_page_id( 'shop' ) ) : '';

			if ( ! $_name ) {
				$product_post_type = get_post_type_object( 'product' );
				$_name = $product_post_type->labels->singular_name;
			}

			if ( is_search() ) {

				echo $before . '<a href="' . esc_url(get_post_type_archive_link( 'product' )) . '">' . $_name . '</a>' . $delimiter . __( 'Search results for &ldquo;', 'woocommerce' ) . get_search_query() . '&rdquo;' . $after;

			} elseif ( is_paged() ) {

				echo $before . '<a href="' . esc_url(get_post_type_archive_link( 'product' )) . '">' . $_name . '</a>' . $after;

			} else {

				echo $before . $_name . $after;

			}

		} elseif ( is_single() && !is_attachment() ) {
			if ( 'product' == get_post_type() ) {

				if(isset($prepend)){echo $prepend;}

				if ( $terms = wc_get_product_terms( $post->ID, 'product_cat', array( 'orderby' => 'parent', 'order' => 'DESC' ) ) ) {
					$main_term = $terms[0];
					$ancestors = get_ancestors( $main_term->term_id, 'product_cat' );
					$ancestors = array_reverse( $ancestors );

					foreach ( $ancestors as $ancestor ) {
						$ancestor = get_term( $ancestor, 'product_cat' );

						if ( ! is_wp_error( $ancestor ) && $ancestor ) {
							echo $before . '<a href="' . esc_url(get_term_link( $ancestor )) . '">' . esc_attr($ancestor->name) . '</a>' . $after . $delimiter;
						}
					}

					echo $before . '<a href="' . esc_url(get_term_link( $main_term )) . '">' . esc_attr($main_term->name) . '</a>' . $after . $delimiter;

				}

				echo $before . get_the_title() . $after;

			} elseif ( get_post_type() != 'post' ) {
				$post_type = get_post_type_object(get_post_type());
				$slug = $post_type->rewrite;
				printf($link, $home_link . '/' . $slug['slug'] . '/', $post_type->labels->singular_name);
				if ($show_current == 1) echo $delimiter . $before . get_the_title() . $after;
			} else {
				$cat = get_the_category(); $cat = $cat[0];
				$cats = get_category_parents($cat, TRUE, $delimiter);
				if ($show_current == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
				//$cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);
				//$cats = str_replace('</a>', '</a>' . $link_after, $cats);
				if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
				echo $cats;
				if ($show_current == 1) echo $before . get_the_title() . $after;
			}

		} elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
			$post_type = get_post_type_object(get_post_type());
			echo $before . $post_type->labels->singular_name . $after;

		} elseif ( is_attachment() ) {
			$parent = get_post($parent_id);
			$cat = get_the_category($parent->ID); $cat = $cat[0];
			$cats = get_category_parents($cat, TRUE, $delimiter);
			$cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);
			$cats = str_replace('</a>', '</a>' . $link_after, $cats);
			if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
			echo $cats;
			printf($link, get_permalink($parent), $parent->post_title);
			if ($show_current == 1) echo $delimiter . $before . get_the_title() . $after;

		} elseif ( is_page() && !$parent_id ) {
			if ($show_current == 1) echo $before . get_the_title() . $after;

		} elseif ( is_page() && $parent_id ) {
			if ($parent_id != $frontpage_id) {
				$breadcrumbs = array();
				while ($parent_id) {
					$page = get_page($parent_id);
					if ($parent_id != $frontpage_id) {
						$breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
					}
					$parent_id = $page->post_parent;
				}
				$breadcrumbs = array_reverse($breadcrumbs);
				for ($i = 0; $i < count($breadcrumbs); $i++) {
					echo $breadcrumbs[$i];
					if ($i != count($breadcrumbs)-1) echo $delimiter;
				}
			}
			if ($show_current == 1) {
				if ($show_home_link == 1 || ($parent_id_2 != 0 && $parent_id_2 != $frontpage_id)) echo $delimiter;
				echo $before . get_the_title() . $after;
			}

		} elseif ( is_tag() ) {
			echo $before . sprintf($text['tag'], single_tag_title('', false)) . $after;

		} elseif ( is_author() ) {
			global $author;
			$userdata = get_userdata($author);
			echo $before . sprintf($text['author'], $userdata->display_name) . $after;

		} elseif ( is_404() ) {
			echo $before . $text['404'] . $after;
		}

		if ( get_query_var('paged') ) {
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
			echo __('Page') . ' ' . get_query_var('paged');
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
		}

		echo '</div><!-- .wrapper -->';
		echo '</div><!-- .breadcrumbs -->';

	}
}
