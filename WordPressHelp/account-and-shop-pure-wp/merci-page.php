<?php
/**
 * Template Name: merci
 **/
get_header() ?>
<div class="merci">
    <div class="wrap">
        <img src="<?= get_template_directory_uri() ?>/img/merci-page.png">
        <div class="merci-sub" style=""><?= __('Merci ! Votre paiement a été accepté !', 'page') ?></div>
        <p><?= __('Un email vient d\'être envoyé à l\'adresse que vous avez indiquée.', 'page' ) ?></p>
    </div>
</div>
<?php
if(!empty($_SERVER['QUERY_STRING'])) {
	$config       = new WC_Etransactions_Config_my();
	$etransaction = new WC_Etransactions_my( $config );
	$param        = $etransaction->getParams();

	if ( $param !== false && $param['error'] == '00000' ) {
		$id   = explode( ' - ', $param['reference'], 2 )[0];
//		$post = get_post( $id );
//		if ( is_object( $post )  ) {
//			update_field( 'payment_successful', array( 'Payment successful' ), $id );
//		}
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
//		$days = get_field( 'days', get_field( 'id', $post_id ) );
		send_mail( $id, 817 );
//		update_field('id_order', $post_id, $post_id_a);
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
	}
}
?>
<?php
get_footer() ?>
