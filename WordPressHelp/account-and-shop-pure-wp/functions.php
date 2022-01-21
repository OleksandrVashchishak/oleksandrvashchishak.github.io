<?php


function mytheme_scripts()
{
	wp_enqueue_style('wp-style', get_stylesheet_uri());
	wp_enqueue_style('slick-carousel', get_template_directory_uri() . '/css/slick.css');
	wp_enqueue_style('animation', get_template_directory_uri() . '/css/animate.css');
	wp_enqueue_style('fonts', get_template_directory_uri() . '/css/fonts.css');
	wp_enqueue_style('bootstrap-style', get_template_directory_uri() . '/css/bootstrap.min.css');
	wp_enqueue_style('slick-theme', get_template_directory_uri() . '/css/slick-theme.css');
	wp_enqueue_style('fancybox', 'https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.css');
	wp_enqueue_script('html5shiv', 'https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js', array(), null, true);
	wp_enqueue_script('respond', 'https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js', array(), null, true);
	wp_deregister_script('jquery');
	wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js');
	wp_enqueue_script('jquery');
	//	wp_enqueue_script( 'lazysizes-async', get_template_directory_uri() . '/js/lazysizes.min.js', array(), null, false );
	wp_enqueue_script('slick-script', get_template_directory_uri() . '/js/slick.min.js', array(), null, false);
	wp_enqueue_script('wow-script', get_template_directory_uri() . '/js/wow.min.js"', array(), null, false);
	wp_enqueue_script('main-script', get_template_directory_uri() . '/js/main.js"', array(), null, false);
	wp_enqueue_script('bootstrap-script', get_template_directory_uri() . '/js/bootstrap.min.js', array(
		'jquery',
		'slick-script'
	), null, true);
	wp_enqueue_script('fancybox', "https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.js", array(), null, true);
	wp_enqueue_script('main-script-async', get_template_directory_uri() . '/js/main.js', array(
		'jquery',
		'slick-script',
		'map-async'
	), null, true);
	//	wp_enqueue_script( 'map-async', "https://maps.googleapis.com/maps/api/js?key=AIzaSyCju7s_WCAXfPVwD1E7EBtsy4t6DeKDXQE&callback=initMap", array(), null );
}

add_action('admin_enqueue_scripts', 'load_admin_styles');
function load_admin_styles()
{
	wp_enqueue_style('admin_css', get_template_directory_uri() . '/css/admin-style.css', false, '1.0.0');
}

if (function_exists('acf_add_options_page')) {
	acf_add_options_page(array(
		'page_title' => 'Theme General Settings',
		'menu_title' => 'Theme Settings',
		'menu_slug'  => 'theme-general-settings',
		'capability' => 'activate_plugins',
		'redirect'   => false
	));
}
if (!is_admin()) {
	function add_asyncdefer_attribute($tag, $handle)
	{
		// if the unique handle/name of the registered script has 'async' in it
		if (strpos($handle, 'async') !== false) {
			// return the tag with the async attribute
			return str_replace('<script ', '<script async defer ', $tag);
		} // if the unique handle/name of the registered script has 'defer' in it
		else if (strpos($handle, 'defer') !== false) {
			// return the tag with the defer attribute
			return str_replace('<script ', '<script defer ', $tag);
		} // otherwise skip
		else {
			return $tag;
		}
	}

	add_filter('script_loader_tag', 'add_asyncdefer_attribute', 10, 2);
}

add_action('wp_enqueue_scripts', 'mytheme_scripts');

if (function_exists('add_theme_support')) {
	add_theme_support('menus');
}

//register_nav_menu( 'header-menu', 'Header-menu' );
register_nav_menus(array(
	'header-menu' => 'Menu header',
));
register_nav_menus(array(
	'header-menu-programe' => 'Menu header programe',
));
add_action('init', 'custom_post_type_init');

add_theme_support('post-thumbnails', array('traitements'));

function custom_post_type_init()
{
	$labels1 = array(
		'name'               => 'Programme',
		'add_new'            => 'Add New',
		'add_new_item'       => 'Add New Programme',
		'new_item'           => 'New Programme',
		'edit_item'          => 'Edit Programme',
		'view_item'          => 'View Programme',
		'all_items'          => 'All Programme',
		'search_items'       => 'Search Programme',
		'parent_item_colon'  => 'Parent Programme:',
		'not_found'          => 'No articles found.',
		'not_found_in_trash' => 'No articles found in Trash.'
	);

	$args1 = array(
		'labels'             => $labels1,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array('slug' => 'programme'),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'menu_icon'          => 'dashicons-media-document',
		'supports'           => array('title', 'editor', 'author', 'thumbnail', 'excerpt')
	);

	register_post_type('programme', $args1);

	$labels = array(
		'name'               => 'Commandes',
		'add_new'            => 'Add New',
		'add_new_item'       => 'Add New Commandes',
		'new_item'           => 'New Commandes',
		'edit_item'          => 'Edit Commandes',
		'view_item'          => 'View Commandes',
		'all_items'          => 'Old Commandes',
		'search_items'       => 'Search Commandes',
		'parent_item_colon'  => 'Parent Commandes:',
		'not_found'          => 'No articles found.',
		'not_found_in_trash' => 'No articles found in Trash.'
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array('slug' => 'order_program'),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array('title', 'editor', 'author', 'thumbnail', 'excerpt',)
	);

	register_post_type('order_program', $args);



	register_post_type('mail_template', array(
		'label'               => 'Emails',
		'labels'              => array(
			'name'               => 'Emails',
			'singular_name'      => 'Emails',
			'add_new'            => 'Ajouter une Emails',
			'add_new_item'       => 'Ajouter une Emails',
			'edit_item'          => 'Modifier la Emails',
			'new_item'           => 'Nouvelle Emails',
			'not_found'          => 'Non trouvé',
			'not_found_in_trash' => 'Non trouvé',
			'parent_item_colon'  => '',
			'menu_name'          => 'Emails',
		),
		'description'         => '',
		'exclude_from_search' => 0,
		'public'              => true,
		'menu_position'       => 4,
		'menu_icon'           => 'dashicons-email',
		'hierarchical'        => false,
		'supports'            => array('title', 'editor', 'thumbnail'),
		'query_var'           => true,
	));
	$labels_a = array(
		'name'               => 'Factures ',
		'add_new'            => 'Add New',
		'add_new_item'       => 'Add New Factures ',
		'new_item'           => 'New Factures ',
		'edit_item'          => 'Edit Factures ',
		'view_item'          => 'View Factures ',
		'all_items'          => 'All Factures ',
		'search_items'       => 'Search Factures ',
		'parent_item_colon'  => 'Parent Factures :',
		'not_found'          => 'No articles found.',
		'not_found_in_trash' => 'No articles found in Trash.'
	);

	$args_a = array(
		'labels'             => $labels_a,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array('slug' => ' factures '),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array('title', 'editor', 'author', 'thumbnail', 'excerpt',)
	);

	//	register_post_type( 'factures ', $args_a );


	register_post_type('commandes_carte', array(
		'label'               => 'Commandes par carte',
		'labels'              => array(
			'name'               => 'Commandes par carte',
			'singular_name'      => 'Commandes par carte',
			'add_new'            => 'Ajouter une Commandes par carte',
			'add_new_item'       => 'Ajouter une Commandes par carte',
			'edit_item'          => 'Modifier la Commandes par carte',
			'new_item'           => 'Nouvelle Commandes par virement/chèque',
			'not_found'          => 'Non trouvé',
			'not_found_in_trash' => 'Non trouvé',
			'parent_item_colon'  => '',
			'menu_name'          => 'Commandes par carte',
		),
		'description'         => '',
		'exclude_from_search' => 0,
		'show_ui'             => true,
		'show_in_menu'        => 'edit.php?post_type=commandes_carte',
		'public'              => true,
		'menu_position'       => 4,
		'menu_icon'           => 'dashicons-email',
		'hierarchical'        => false,
		'supports'            => array('title', 'editor', 'thumbnail'),
		'query_var'           => true,
	));

	register_post_type('commandes_virement', array(
		'label'               => 'Commandes par virement/chèque',
		'labels'              => array(
			'name'               => 'Commandes par virement/chèque',
			'singular_name'      => 'Commandes par virement/chèque',
			'add_new'            => 'Ajouter une Commandes par virement/chèque',
			'add_new_item'       => 'Ajouter une Commandes par virement/chèque',
			'edit_item'          => 'Modifier la Commandes par virement/chèque',
			'new_item'           => 'Nouvelle Commandes par virement/chèque',
			'not_found'          => 'Non trouvé',
			'not_found_in_trash' => 'Non trouvé',
			'parent_item_colon'  => '',
			'menu_name'          => 'Commandes par virement/chèque',
		),
		'description'         => '',
		'show_ui'             => true,
		'show_in_menu'        => 'edit.php?post_type=commandes_virement',
		'exclude_from_search' => 0,
		'public'              => true,
		'menu_position'       => 4,
		'menu_icon'           => 'dashicons-email',
		'hierarchical'        => false,
		'supports'            => array('title', 'editor', 'thumbnail'),
		'query_var'           => true,
	));



	$labels_video = array(
		'name'                => __('Videos'),
		'singular_name'       => __('Video'),
		'menu_name'           => __('Videos'),
		'parent_item_colon'   => __('Parent Video'),
		'all_items'           => __('All Videos'),
		'view_item'           => __('View Video'),
		'add_new_item'        => __('Add New Video'),
		'add_new'             => __('Add New'),
		'edit_item'           => __('Edit Video'),
		'update_item'         => __('Update Video'),
		'search_items'        => __('Search Video'),
		'not_found'           => __('Not Found'),
		'not_found_in_trash'  => __('Not found in Trash'),
	);

	$args_video = array(
		'label'               => __('Videos'),
		'description'         => __('Video news and reviews'),
		'labels'              => $labels_video,
		'supports'            => array('title',   'revisions', 'custom-fields'),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
		'show_in_rest'        => true,
		'taxonomies'          => array('video-category'),
	);
	register_post_type('video', $args_video);

	register_taxonomy('video-category', 'video', array('hierarchical' => true, 'label' => 'Video category', 'query_var' => true, 'rewrite' => true));
}

add_action('admin_menu', 'register_my_custom_submenu_page');

function register_my_custom_submenu_page()
{
	add_submenu_page(
		'edit.php?post_type=order_program',
		'Commandes par virement/chèque',
		'Commandes par virement/chèque',
		'publish_posts',
		'edit.php?post_type=commandes_virement',
		'',
		1
	);
	add_submenu_page(
		'edit.php?post_type=order_program',
		'Commandes par carte',
		'Commandes par carte',
		'publish_posts',
		'edit.php?post_type=commandes_carte',
		'',
		2
	);
}

add_action('save_post', 'add_factures', 20, 3);
function add_factures($post_id, $post, $update)
{
	// $attachments = '';
	// $headers = 'From: My Name <alex@domain.com>' . "\r\n";
	// wp_mail('q121312q@gmail.com', 'theme', 'descript', $headers, $attachments);
	send_mail( $post_id, 817 );


	$slug = 'commandes_virement';

	if ($update && $slug == $_POST['post_type'] && get_field('payment_successful', $post_id)[0] == 'Payment successful' && empty(get_page_by_title($post_id, 'OBJECT', 'factures')) && get_field('checkout-box', $post_id) == 'checkout-box') {
		$email = get_field('adresse_email', $post_id);
		$password = get_field('pass', $post_id);

		$userdata = array(
			'user_pass'            => $password,
			'user_login'           => stristr($email, '@', true),
			'user_email'           => $email,
			'rich_editing'         => 'false',
			'show_admin_bar_front' => 'false',
			'first_name'           => get_field('prenom', $post_id),
			'last_name'            => get_field('nom', $post_id)
		);

		$user_id = wp_insert_user($userdata);

		if (!is_wp_error($user_id)) {
			update_user_meta($user_id, 'user_phone', get_field('telephone', $post_id));
			update_user_meta($user_id, 'user_adresse', get_field('adresse', $post_id));

			$phone = get_field('telephone', $post_id);
			$adresse = get_field('adresse', $post_id);

			update_field('user_information', ['phone' => $phone], 'user_' . $user_id);
			update_field('user_information', ['adress' => $adresse], 'user_' . $user_id);
		}

		//
	}



	//		$post_data_a     = array(
	//			'post_title'  => 'Order',
	//			'post_status' => 'publish',
	//			'post_type'   => 'factures',
	//			'post_author' => 1
	//		);
	//		$post_id_a       = wp_insert_post( $post_data_a );
	//		$post_data_new_a = array(
	//			'ID'          => $post_id_a,
	//			'post_title'  => 'W-' . sprintf( "%04s", get_field( 'index', 'option' ) ),
	//			'post_status' => 'publish',
	//			'post_type'   => 'factures',
	//			'post_author' => 1
	//		);
	//		wp_insert_post( $post_data_new_a );
	//		$all_fields = get_fields( $post_id );
	//		foreach ( $all_fields as $key => $field ) {
	//			update_field( $key, $field, $post_id_a );
	//		}
	//		$id_post = get_field( 'id_post', $post_id );
	//		if($id_post == 209){
	//		    $id_posts = ['23', '24'];
	//        }else {
	//		    $id_posts = [get_field( 'id_post', $post_id )];
	//        }
	//		update_field('id_order', $post_id, $post_id_a);
	//		send_mail( $post_id_a, 816 );
	//		foreach ($id_posts as $post_id_program) {
	//			$days = get_field( 'date_array', $post_id_program );
	//			foreach ( $days as $key_days => $day ) {
	//				$array_date = explode( ', ', get_field( 'day', $post_id ) );
	//				if ( in_array($day['date'], $array_date) ) {
	//					update_sub_field( array(
	//						'date_array',
	//						$key_days + 1,
	//						'count_ticket'
	//					),
	//						$day['count_ticket'] -
	//						intval( get_field( 'doctor_ticket', get_field( 'id_post', $post_id ) ) ) -
	//						intval( get_field( 'formule_young_ticket', get_field( 'id_post', $post_id ) ) )
	//						, get_field( 'id_post', $post_id ) );
	//				}
	//			}
	//		}
	//	}

	if ($update && ($_POST['post_type'] == 'commandes_virement' || $_POST['post_type'] == 'commandes_carte') && empty(get_field('pdf_order', $post_id))) {
		printPDF($post_id, get_field('title_facture', $post_id) . time());
	}
}

require WP_CONTENT_DIR . '/uploads/fpdf/fpdf.php';

function my_login_logo()
{ ?>
	<style type="text/css">
		#login h1 a,
		.login h1 a {
			background-image: url(<?php echo get_template_directory_uri(); ?>/img/Mediweblogo.jpg);
			background-size: contain;
			width: 100%;
			margin: 0;
			height: 300px;
		}

		body.login {
			background-color: #fff;
		}

		body.login form {
			box-shadow: none;
		}
	</style>
<?php }

add_action('login_enqueue_scripts', 'my_login_logo');

function order_reservation()
{
	$form              = $_POST['form'];
	$title_for_payment = $form['id_post'] == 209 ? 'Cycle 1 + Cycle 2' : get_the_title($form['id_post']);
	if ($form['type_pay'] == 'virement_banc' || $form['type_pay'] == 'check' || $form['type_pay'] == 'cart_banc') {
		$post_type_commandes = '';
		if ($form['type_pay'] == 'cart_banc') {
			$post_type_commandes = 'commandes_carte';
		} else {
			$post_type_commandes = 'commandes_virement';
		}
		$post_data = array(
			'post_title'  => 'Order',
			'post_status' => 'publish',
			'post_type'   => $post_type_commandes,
			'post_author' => 1
		);
		$post_id   = wp_insert_post($post_data);
		update_fields_by_ID($form, $post_id);
		$post_data_new = array(
			'ID'          => $post_id,
			'post_title'  => 'Order ID' . $post_id . ' ' . $title_for_payment . ' ' . $form['type_pay'],
			'post_status' => 'publish',
			'post_type'   => $post_type_commandes,
			'post_author' => 1
		);
		wp_insert_post($post_data_new);
		update_field('type_pay', $form['type_pay'], $post_id);


		if (!empty($form['day_b'])) {
			update_field('day', $form['day_c'] . ', ' . $form['day_b'], $post_id);
		}

		if ($form['id_post'] == 209) {
			update_field('price_doctor', get_field('docteur_double_cycle_price', $form['id_post']), $post_id);
			update_field('price_young', get_field('young_double_cycle_price', $form['id_post']), $post_id);
		} else {
			$days = get_field('date_array', $form['id_post']);
			foreach ($days as $key_days => $day) {
				$day_form_str = explode(' ', $day['date']);
				$day_array_str = explode(' ', $form['day_c'] . ', ' . $form['day_b']);
				$res = array_intersect($day_array_str, $day_form_str);
				if (count($res) > 4) {
					update_field('price_doctor', $day['docteur']['price'], $post_id);
					update_field('price_young', $day['formule_young']['price'], $post_id);
				}
			}
		}

		if ($form['type_pay'] == 'cart_banc') {
			receipt_page($post_id, $form, $form['total_price']);
		} elseif ($form['type_pay'] == 'virement_banc') {
			send_mail($post_id, 763);
			echo "success";
		} else {
			send_mail($post_id, 781);
			echo "success";
		}
	} else {
		echo 'error';
	}
	die();
}

add_action('wp_ajax_order_reservation', 'order_reservation');
add_action('wp_ajax_nopriv_order_reservation', 'order_reservation');


add_filter('manage_' . 'order_program' . '_posts_columns', 'add_views_column', 4);
add_filter('manage_' . 'commandes_carte' . '_posts_columns', 'add_views_column', 4);
add_filter('manage_' . 'commandes_virement' . '_posts_columns', 'add_views_column', 4);
add_filter('manage_' . 'factures' . '_posts_columns', 'add_views_column_facture', 4);
function add_views_column($columns)
{
	$num = 2;

	$new_columns = array(
		'nom' => 'Nom',
		'total' => 'Total',
		'methode_paiement' => 'Méthode du paiement',
		'validation_payment' => 'Validation paiement',
	);

	return array_slice($columns, 0, $num) + $new_columns + array_slice($columns, $num);
}

function add_views_column_facture($columns)
{
	$num = 2;

	$new_columns = array(
		'nom' => 'Nom',
		'total' => 'Total',
		'methode_paiement' => 'Méthode du paiement',
		'order_link' => 'Commandes'
	);

	return array_slice($columns, 0, $num) + $new_columns + array_slice($columns, $num);
}

add_filter('manage_edit-' . 'order_program' . '_sortable_columns', 'add_custom_sort');
add_filter('manage_edit-' . 'commandes_carte' . '_sortable_columns', 'add_custom_sort');
add_filter('manage_edit-' . 'commandes_virement' . '_sortable_columns', 'add_custom_sort');
add_filter('manage_edit-' . 'factures' . '_sortable_columns', 'add_custom_sort');
function add_custom_sort($columns)
{
	$columns['nom'] = 'nom';
	$columns['total'] = 'total';
	$columns['validation_payment'] = 'validation_payment';
	$columns['methode_paiement'] = 'methode_paiement';
	return $columns;
}

add_action('pre_get_posts',  'custom_orderby');

function custom_orderby($query)
{
	if (!is_admin()) {
		return;
	}
	$orderby = $query->get('orderby');
	if ('nom' == $orderby) {
		$query->set('meta_key', 'nom');
		$query->set('orderby', 'meta_value');
	} elseif ('total' == $orderby) {
		$query->set('meta_key', 'total');
		$query->set('orderby', 'meta_value');
	} elseif ('validation_payment' == $orderby) {
		$query->set('meta_query', array(
			'relation' => 'OR',
			'payment_success' => array(
				'key' => 'payment_successful',
			),
			'payment_failed' => array(
				'key' => 'payment_successful',
				'compare' => 'NOT EXISTS'
			),
		));
		$query->set('orderby', array(
			'payment_success' => $query->get('order')
		));
	} elseif ('methode_paiement' == $orderby) {
		$query->set('meta_key', 'type_pay');
		$query->set('orderby', 'meta_value');
	}
}

add_action('manage_' . 'order_program' . '_posts_custom_column', 'fill_views_column', 5, 2);
add_action('manage_' . 'commandes_carte' . '_posts_custom_column', 'fill_views_column', 5, 2);
add_action('manage_' . 'commandes_virement' . '_posts_custom_column', 'fill_views_column', 5, 2);
add_action('manage_' . 'factures' . '_posts_custom_column', 'fill_views_column_facture', 5, 2);
function fill_views_column($colname, $post_id)
{
	if ($colname === 'nom') {
		echo get_field('nom');
	} elseif ($colname == 'methode_paiement') {
		$title        = explode(" ", get_the_title($post_id));
		$type_pay_old = end($title);
		switch ($type_pay_old) {
			case 'cart_banc':
				echo 'Carte bancaire';
				break;
			case 'virement_banc':
				echo 'Virement bancaire';
				break;
			case 'check':
				echo 'Chèque';
				break;
		}
	} elseif ($colname == 'total') {
		echo get_field('total');
	} elseif ($colname == 'validation_payment') {
		if (get_field('payment_successful')[0] == 'Payment successful') {
			echo  'Validé';
		} elseif (get_field('echec_paiement')[0] == 'Echoué') {
			echo 'Echoué';
		} else {
			echo 'En attente';
		}
	}
}

function fill_views_column_facture($colname, $post_id)
{
	if ($colname === 'nom') {
		echo get_field('nom');
	} elseif ($colname == 'methode_paiement') {
		$title        = explode(" ", get_the_title(get_field('id_order', $post_id)));
		$type_pay_old = end($title);
		switch ($type_pay_old) {
			case 'cart_banc':
				echo 'Carte bancaire';
				break;
			case 'virement_banc':
				echo 'Virement bancaire';
				break;
			case 'check':
				echo 'Chèque';
				break;
		}
	} elseif ($colname == 'total') {
		echo get_field('total');
	} elseif ($colname == 'order_link') {
		$id_order = get_field('id_order', $post_id);
		echo '<a href="' . get_edit_post_link($id_order) . '">' . $id_order . '</a>';
	}
}

function printPDF($id_order, $id_factura)
{
	$form = get_fields($id_order);
	$title        = explode(" ", get_the_title($form['id_order']));
	$type_pay_old = end($title);
	if ($type_pay_old == 'cart_banc') {
		$type_pay = 'Carte bancaire';
	} elseif ($type_pay_old == 'virement_banc') {
		$type_pay = 'Virement bancaire';
	} elseif ($type_pay_old == 'check') {
		$type_pay = 'Chèque';
	}
	$tickets = '';
	//	if($form['id_post'] == 209){
	if (intval($form['doctor_ticket']) > 0) {
		$tickets .= '<tr style="font-size: 12px;line-height: 14px;padding: 15px 0;">
                        <td style="height: 40px; text-align: left;">' . get_field('h1', $form['id_post']) . '</td>
                        <td style="height: 40px;">Docteur</td>
                        <td style="height: 40px;">' . $form['doctor_ticket'] . '</td>
                        <td style="height: 40px; text-align: right;">' . $form['doctor_ticket'] * str_replace(" ", "",  $form['price_doctor']) . ' € </td>
                        </tr>';
	}
	if (intval($form['formule_young_ticket']) > 0) {
		$tickets .= '<tr style="font-size: 12px;line-height: 14px;padding: 15px 0;">
                        <td style="height: 40px; text-align: left;">' . get_field('h1', $form['id_post']) . '</td>
                        <td style="height: 40px;">Formule young</td>
                        <td style="height: 40px;">' . $form['formule_young_ticket'] . '</td>
                        <td style="height: 40px; text-align: right;">' . $form['formule_young_ticket'] * str_replace(" ", "", $form['price_young']) . ' € </td>
                        </tr>';
	}
	//	}else {
	//		$days = get_field( 'date_array', $form['id_post'] );
	//		foreach ( $days as $key_days => $day ) {
	//			$day_form_str = explode(' ', $day['date']);
	//			$day_array_str = explode( ' ', $form['day']);
	//			$res = array_intersect($day_array_str, $day_form_str);
	//			if ( count($res) > 4 ) {
	//				if ( intval( $form['doctor_ticket'] ) > 0 ) {
	//					$tickets .= '<tr style="font-size: 12px;line-height: 14px;padding: 15px 0;">
	//                        <td style="height: 40px;">'. get_field( 'h1', $form['id_post']) .'</td>
	//                        <td style="height: 40px;">Docteur</td>
	//                        <td style="height: 40px;">'. $form['doctor_ticket'] .'</td>
	//                        <td style="height: 40px;">' . $form['doctor_ticket'] * str_replace( " ", "", $day['docteur']['price'] ) . ' €</td>
	//                        </tr>';
	//				}
	//				if ( intval( $form['formule_young_ticket'] ) > 0 ) {
	//					$tickets .= '<tr style="font-size: 12px;line-height: 14px;padding: 15px 0;">
	//                        <td style="height: 40px;">'. get_field( 'h1', $form['id_post']) .'</td>
	//                        <td style="height: 40px;">Formule young</td>
	//                        <td style="height: 40px;">'. $form['formule_young_ticket'] .'</td>
	//                        <td style="height: 40px;">' . $form['formule_young_ticket'] * str_replace( " ", "", $day['formule_young']['price'] ) . ' €</td>
	//                        </tr>';
	//				}
	//			}
	//		}
	//	}
	$data_array = [
		'name' => $form['prenom'] . ' ' . $form['nom'],
		'date' => $form['day'],
		'id_order' => $id_order,
		'type_payment' => $type_pay,
		'total_HT' =>  round((int)$form['total'] / 1.2, 2),
		'tva' => round($form['total'] - (int)$form['total'] / 1.2, 2),
		'total' => $form['total'],
		'tickets' => $tickets,
		'id_facture' => get_field('title_facture', $id_order),
		'description' => get_field('description_facture', $id_order),
	];
	$body_pdf = get_field('content_mail', 1223);
	foreach ($data_array as $key_date => $item) {
		$body_pdf = str_replace('%' . $key_date . '%', $item, $body_pdf);
	}
	$pdfUrl = printPDF_new($body_pdf, $id_factura);
	update_field('pdf_order', uploadPDf($pdfUrl), $id_order);
	return $pdfUrl;
}

function printPDF_new($html, $file_name)
{
	require_once get_template_directory() . '/include/vendor/autoload.php';
	$defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
	$fontDirs = $defaultConfig['fontDir'];

	$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
	$fontData = $defaultFontConfig['fontdata'];
	$mpdf       = new \Mpdf\Mpdf([
		'fontDir' => array_merge($fontDirs, [
			get_template_directory() . '/css/fonts/HurmeGeometric',
		]),
		'fontdata' => $fontData + [
			'frutiger' => [
				'R' => 'HurmeGeometricSans1-Regular.ttf'
			]
		],
		'default_font' => 'HurmeGeometricSans',
		'margin_top'    => 70,
		'margin_bottom' => 15
	]);
	$upload_dir = wp_upload_dir();
	$mpdf->SetHTMLHeader('<p style="padding-bottom: 5px; width: 100%; float: left; text-align: center; ">
    <img class="size-full wp-image-128 aligncenter"
             src="http://linstitutdelafacette.com/wp-content/uploads/2020/12/pdf_header-1.jpg" alt=""/></p>');
	$mpdf->SetHTMLFooter('<div style="text-align: center; background: #000; color: #ffffff; padding: 25px 0; font-weight: 700"><p style=" text-align: center; font-size: 10px">
		51 bis, rue saint Sébastien - 13006 Marseille - 04.91.54.75.75 - Fax: 04 91 54 45 82
        </p>
        <br>
        <p style=" text-align: center; font-size: 10px">
		N° TVA intracommunautaire : FR22513552406 - SIREN 513 552 406 RCS PARIS - NAF 8559 A
        </p></div>');
	$mpdf->WriteHTML('<div style="font-family: HurmeGeometricSans">' . $html . '</div>');
	$file_dir = $upload_dir['basedir'] . '/' . $file_name . '.pdf';
	$mpdf->Output($file_dir, 'F');

	return $file_dir;
}

function uploadPDf($url)
{
	$contents   = file_get_contents($url);
	$file_info  = new finfo(FILEINFO_MIME_TYPE);
	$mime_type  = $file_info->buffer($contents);
	$filename   = preg_replace('/\.[^.]+$/', '', basename($url));
	$uploaddir  = wp_upload_dir();
	$uploadfile = $uploaddir['path'] . '/' . $filename;

	file_put_contents($uploadfile, $contents);
	$wp_filetype  = wp_check_filetype(basename($filename), null);
	$attachment   = array(
		'guid'           => $uploaddir['url'] . '/' . basename($filename),
		'post_mime_type' => $wp_filetype['type'],
		'post_title'     => $filename,
		'post_content'   => '',
		'post_status'    => 'inherit'
	);
	$attach_id    = wp_insert_attachment($attachment, $uploadfile);
	$imagenew     = get_post($attach_id);
	$fullsizepath = get_attached_file($imagenew->ID);
	require_once(ABSPATH . 'wp-admin/includes/image.php');
	$attach_data = wp_generate_attachment_metadata($attach_id, $fullsizepath);
	wp_update_attachment_metadata($attach_id, $attach_data);

	return $attach_id;
}

function update_fields_by_ID($form, $post_id)
{
	update_field('prenom', htmlspecialchars($form['prenom'], ENT_QUOTES), $post_id);
	update_field('nom', htmlspecialchars($form['nom'], ENT_QUOTES), $post_id);
	update_field('entreprise', htmlspecialchars($form['entreprise'], ENT_QUOTES), $post_id);
	update_field('adresse', htmlspecialchars($form['adresse'], ENT_QUOTES), $post_id);
	update_field('code_postal', htmlspecialchars($form['code_postal'], ENT_QUOTES), $post_id);
	update_field('ville', htmlspecialchars($form['ville'], ENT_QUOTES), $post_id);
	update_field('adresse_email', htmlspecialchars($form['adresse_email'], ENT_QUOTES), $post_id);
	update_field('telephone', htmlspecialchars($form['tel'], ENT_QUOTES), $post_id);
	update_field('day', htmlspecialchars($form['day_c'], ENT_QUOTES), $post_id);
	update_field('total', $form['total_price'] . ' €', $post_id);
	update_field('formule_young_ticket', $form['young_count'], $post_id);
	update_field('doctor_ticket', $form['docteur_count'], $post_id);
	update_field('id_post', $form['id_post'], $post_id);
	update_field('pass', $form['pass'], $post_id);
	update_field('checkout-box', $form['checkout-box'], $post_id);


	$row_count = $form['column-count-acf'];
	for ($i = 1; $i < $row_count + 1; $i++) {
		$row = array(
			'prenom' => $form['prenom-partic-' . $i],
			'nom' => $form['nom-partic-' . $i],
			'adresse' => $form['adresse-partic-' . $i],
			'email' => $form['email-partic-' . $i],
			'code_postal' => $form['code_postal-partic-' . $i],
			'ville' => $form['ville-partic-' . $i],
			'telephone' => $form['telehone-partic-' . $i],
		);

		add_row('participants', $row, $post_id);
	}
}
add_filter('wp_mail_charset', 'charset_change_wp_mail');
add_filter('wp_mail_content_type', 'content_type_change_wp_mail');
function charset_change_wp_mail() {
	return "UTF-8";
}
function content_type_change_wp_mail(){
	return "text/html";
}
function send_mail($post_id, $post_template_id)
{
	$form         = get_fields($post_id);
	$title        = explode(" ", get_the_title($post_id));
	$type_pay_old = end($title);
	$headers      = "From: Institut de la Facette <contact@linstitutdelafacette.com>";
	$to           = $form['adresse_email'];
	$subject      = get_the_title($post_template_id);
	$type_pay     = '';
	switch ($type_pay_old) {
		case 'cart_banc':
			$type_pay = 'Carte bancaire';
			break;
		case 'virement_banc':
			$type_pay = 'Virement bancaire';
			break;
		case 'check':
			$type_pay = 'Chèque';
			break;
	}
	$index_fa   = get_field('index', 'option');
	$date = new DateTime("now", new DateTimeZone('Europe/Paris'));
	$data_array = [
		'footer_icon' => get_template_directory_uri() . '/img/footer_icon_email.png',
		'footer_icon_bg'    => get_template_directory_uri() . '/img/footer_bg_email.jpg',
		'tel_icon'       => get_template_directory_uri() . '/img/tel_email.png',
		'localtion_icon' => get_template_directory_uri() . '/img/localtion_icon.png',
		'internet_icon'  => get_template_directory_uri() . '/img/internet_icon.png',
		'logo'           => get_template_directory_uri() . '/img/email_header.jpg',
		'order_id'       => $form['id_order'],
		'event_name'     => get_the_title($form['id_post']),
		'date'           => $date->format("d/m/Y - H:i"),
		'nom'            => $form['nom'],
		'prenom'         => $form['prenom'],
		'email'          => $form['adresse_email'],
		'phone'          => $form['telephone'],
		'entreprise'     => $form['entreprise'],
		'address'        => $form['adresse'],
		'code'           => $form['code_postal'],
		'city'           => $form['ville'],
		'price'          => $form['total'],
		'payment_metod'  => $type_pay,
		'event_date'     => $form['day'],
		'facture_id'     => 'W-' . sprintf("%04s", $index_fa),
		'logo_1'         => get_template_directory_uri() . '/img/logo-pdf-new.jpg',
		'logo_2'         => get_template_directory_uri() . '/img/logo-pdf-2.jpg',
	];



	$body       = file_get_contents('template-email.php', true);
	$body       = str_replace(
		'%content%',
		get_field('content_mail', $post_template_id),
		$body
	);
	foreach ($data_array as $key_date => $item) {
		$body     = str_replace('%' . $key_date . '%', $item, $body);
	}
	$attachment = [];
	//	if ( $post_template_id != 781 && $post_template_id != 763 ) {
	//		$attachment[] = printPDF( $post_id, $data_array['facture_id'] );
	//		update_field( 'index', $index_fa + 1, 'option' );
	//	}
	$first = wp_mail($to, $subject, $body, $headers, $attachment);
	if ($first && $post_template_id != 816) {
		//		$to = get_option( 'admin_email' );
		$to         = 'facette@linstitutdelafacette.com';
		$subject    = 'Nouvelle inscription';
		$body_admin = file_get_contents('template-email_admin.php', true);
		foreach ($data_array as $key_date => $item) {
			$body_admin = str_replace('%' . $key_date . '%', $item, $body_admin);
		}
		$admin = wp_mail($to, $subject, $body_admin, $headers);
	}



}

function na_remove_slug($post_link, $post, $leavename)
{

	if ('programme' != $post->post_type || 'publish' != $post->post_status) {
		return $post_link;
	}

	$post_link = str_replace('/' . $post->post_type . '/', '/', $post_link);

	return $post_link;
}

add_filter('post_type_link', 'na_remove_slug', 10, 3);
function na_parse_request($query)
{

	if (!$query->is_main_query() || 2 != count($query->query) || !isset($query->query['page'])) {
		return;
	}

	if (!empty($query->query['name'])) {
		$query->set('post_type', array('programme'));
	}
}

add_action('pre_get_posts', 'na_parse_request');

define('WC_ETRANSACTIONS_KEY_PATH', ABSPATH . '/kek.php');
require_once('config-pay.php');
require_once('wc-etransactions_my.php');
function receipt_page($orderId, $form, $price)
{

	if (!is_multisite()) {
		$urls = array(
			'PBX_ANNULE'     => get_site_url() . '/error-payment/',
			'PBX_EFFECTUE'   => get_site_url() . '/merci',
			'PBX_REFUSE'     => get_site_url() . '/error-payment/',
			'PBX_REPONDRE_A' => get_site_url() . '/merci',
		);
	} else {
		$urls = array(
			'PBX_ANNULE'     => get_site_url() . '/error-payment/',
			'PBX_EFFECTUE'   => get_site_url() . '/merci',
			'PBX_REFUSE'     => get_site_url() . '/error-payment/',
			'PBX_REPONDRE_A' => get_site_url() . '/merci',
		);
	}
	$config       = new WC_Etransactions_Config_my();
	$etransaction = new WC_Etransactions_my($config);
	$params       = $etransaction->buildSystemParams($orderId, $form, $price, 'standard', $urls);

	try {
		$url = 'https://tpeweb.e-transactions.fr/cgi/MYchoix_pagepaiement.cgi';
	} catch (Exception $e) {
		echo "<p>hi</p>";
		echo "<form><center><button onClick='history.go(-1);return true;'>" . __('Back...', WC_ETRANSACTIONS_PLUGIN) . "</center></button></form>";
		exit;
	}
	$debug = false;
?>
	<form id="pbxep_form" method="post" action="<?php echo esc_url($url); ?>" enctype="application/x-www-form-urlencoded">
		<?php if ($debug) : ?>
			<p>
				<?php echo 'This is a debug view. Click continue to be redirected to E-Transactions payment page.' ?>
			</p>
		<?php else : ?>
			<p>
				<?php echo 'You will be redirected to the E-Transactions payment page. If not, please use the button bellow.' ?>
			</p>
			<script type="text/javascript">
				window.setTimeout(function() {
					document.getElementById('pbxep_form').submit();
				}, 1);
			</script>
		<?php endif; ?>
		<center>
			<button><?php echo 'Continue...' ?></button>
		</center>
		<?php
		$type = $debug ? 'text' : 'hidden';
		foreach ($params as $name => $value) :
			$name  = esc_attr($name);
			$value = esc_attr($value);
			if ($debug) :
				echo '<p><label for="' . $name . '">' . $name . '</label>';
			endif;
			echo '<input type="' . $type . '" id="' . $name . '" name="' . $name . '" value="' . $value . '" />';
			if ($debug) :
				echo '</p>';
			endif;
		endforeach;
		?>
	</form>
<?php
}

require_once('payment_enctypt.php');

add_filter('show_admin_bar', '__return_false');

function get_videos()
{
	$args = unserialize(stripslashes($_POST['query']));
	$args['post_type'] = 'video';
	$args['video-category'] = $_POST['taxonomySlug'];

	$the_query = new WP_Query($args);
	if ($the_query->have_posts()) {
		while ($the_query->have_posts()) {
			$the_query->the_post();
			get_template_part('template-parts/video-item');
		}
		wp_reset_postdata();
	}
	echo '<div class="video-page__item-empty video-page__item"></div>';
	echo '<div class="video-page__item-empty video-page__item"></div>';

	die;
}
add_action('wp_ajax_getTaxonomy', 'get_videos');
add_action('wp_ajax_nopriv_getTaxonomy', 'get_videos');


/**
 * ===================================
 * Update user data
 * ===================================
 */

// start upd user info
function update_user_info($data)
{

	$data = $_POST;
	$userdata = array(
		'ID'        => intval($data['user_id']),
		'user_login' => $data['user_email'],
		'user_email' => $data['user_email'],
		'first_name' => $data['user_name'],
		'last_name'  => $data['user_surname'],
		'rich_editing' => 'false',
		'show_admin_bar_front' => 'false'
	);



	$update_res = null;
	$relogin_me = true;

	$user = get_user_by('id', intval($data['user_id']));
	$old_login = $user->user_login;
	$user_id = wp_insert_user($userdata);

	if (!is_wp_error($user_id)) {

		$phone = $data['user_phone'];
		$adresse = $data['address'];

		$field_key = "field_61dd55dfa62cf";

		$data_arr = array(
			"phone"   => $phone,
			"adress"   => $adresse,
		);

		update_field($field_key, $data_arr, 'user_' . $user_id);

		if ($old_login !== $data['user_email']) {
			$check_id = username_exists($data['user_email']);

			if (($check_id === $user->ID) || ($check_id === false)) {
				global $wpdb;
				$update_res = $wpdb->update(
					'wp_users',
					['user_login' => $data['user_email']],
					['ID' => $user_id]
				);

				$upd_user = get_user_by('id', intval($data['user_id']));

				if (is_int($update_res) && $update_res > 0) {
					$relogin_me = true;
				}
			}
		}

		wp_send_json([
			'success' => true,
			'message' => 'Données de profil mises à jour',
			'update_email_res' => $update_res,
			'relogin_me' => $relogin_me,
		]);
	} else {
		wp_send_json([
			'error' => true,
			'message' => $user_id->get_error_message()
		]);
	}
}

add_action('wp_ajax_update_user_info', 'update_user_info');
// end upd user info

// start upd password
function update_user_password()
{
	$data = $_POST;
	$user_id = intval($data['user_id']);
	$user_password = $data['user_confirmed_password'];
	wp_set_password($user_password, $user_id);

	// $user = get_user_by('id', $user_id);
	// if ($user) {
	// 	wp_set_current_user($user_id, $user->user_login);
	// 	wp_set_auth_cookie($user_id);
	// 	do_action('wp_login', $user->user_login, $user);
	// }

	// wp_send_json([
	// 	'message' => 'Le mot de passe est mis à jour12'
	// ]);
}

add_action('wp_ajax_update_user_password', 'update_user_password');
// end upd password

// start registr
function registrate_new_user()
{
	$email = $_POST['email'];
	$password = $_POST['password'];

	$userdata = array(
		'user_pass'            => $password,
		'user_login'           => stristr($email, '@', true),
		'user_email'           => $email,
		'rich_editing'         => 'false',
		'show_admin_bar_front' => 'false'
	);

	$user_id = wp_insert_user($userdata);

	if (!is_wp_error($user_id)) {
		$user_email = $userdata['user_email'];
		$user_password = $userdata['user_pass'];
		$hash_pswrd = get_user_option('user_pass', $user_id);
		$user = get_user_by('id', $user_id);

		if (wp_check_password($user_password, $hash_pswrd)) {
			wp_set_current_user($user_id, $user_email);
			wp_set_auth_cookie($user_id);
			do_action('wp_login', $user_email, $user);

			return [
				'success' => true,
				'user_id' => $user_id,
				'user_email' => $user_email,
			];
		} else {
			return ['error' => 'failed to login'];
		}
	} else {
		return ['error' => $user_id->get_error_message()];
	}
	wp_die();
}

// add_action('wp_ajax_registeruser', 'registrate_new_user');
// add_action('wp_ajax_nopriv_registeruser', 'registrate_new_user');
// end registr

// start login
function custom_login_user()
{
	if (is_user_logged_in()) {
		wp_send_json_error(['message' => 'Vous êtes déjà connecté']);
	}
	$user_email = $_POST['email'];
	$user_password = $_POST['password'];
	$user = get_user_by('email', $user_email);
	$user_id = $user ? $user->ID : null;

	if (!$user_id) {
		wp_send_json_error(['message' => 'L\'utilisateur n\'existe pas']);
	}

	$hash_pswrd = get_user_option('user_pass', $user_id);
	if (wp_check_password($user_password, $hash_pswrd)) {
		wp_set_current_user($user_id, $user_email);
		wp_set_auth_cookie($user_id);
		do_action('wp_login', $user_email, $user);

		wp_send_json([
			'success' => true,
			'user_id' => $user_id,
			'user_email' => $user_email,
		]);
	} else {
		wp_send_json_error(['message' => 'Mot de passe incorrect']);
	}

	wp_die();
}

add_action('wp_ajax_login_user', 'custom_login_user');
add_action('wp_ajax_nopriv_login_user', 'custom_login_user');
// end login

// start reset password
function custom_reset_password()
{


	$user = get_user_by('email', $_POST['email']);

	if ($user) {
		$new_pass = wp_generate_password(14);
		reset_password($user, $new_pass);
		$to = $_POST['email'];

		$subject = 'Linstitut de la Facette. Réinitialiser le mot de passe';

		$message = '
           <div>
               <p>Vous avez souhaité réinitialiser votre mot de passe sur le site Institute.</p>
               <p>Votre nouveau mot de passe est : <b>' . $new_pass . '</b></p>
               <p>Vous pouvez modifier ce mot de passe à tout moment en vous rendant dans votre compte client àla rubrique « Mes coordonnées ».</p>
               <p>Linstitut de la Facette vous remercie pour votre confiance.</p>
           </div>';

		$from = preg_replace('/http(s)?:\/\//', '', home_url());

		$headers = "From: Linstitut de la Facetter <noreply@" . $from . ">\r\n" .
			'X-Mailer: PHP/' . phpversion() . "\r\n" .
			"MIME-Version: 1.0\r\n" .
			"Content-Type: text/html; charset=utf-8\r\n" .
			"Content-Transfer-Encoding: 8bit\r\n";

		$mail = wp_mail($to, $subject, $message, $headers);

		echo json_encode([
			'success' => true,
			'message' => 'Le nouveau mot de passe a été envoyé à votre email.',
			'user' => $user->data,
			'new_pass' => $new_pass,
			'mail_sended' => $mail
		]);
	} else {
		echo json_encode([
			'error' => 'Can not get user by this email',
			'message' => 'Something goes wrong',
			'user' => $user->data,
			'new_pass' => $new_pass,
			'mail_sended' => $mail
		]);
	}

	wp_die();
}

add_action('wp_ajax_user_reset_password', 'custom_reset_password');
add_action('wp_ajax_nopriv_user_reset_password', 'custom_reset_password');
// end reset password

// start logaut
add_action('wp_logout', 'auto_redirect_after_logout');
function auto_redirect_after_logout()
{
	wp_safe_redirect(home_url());
	exit;
}
// end  logaut
