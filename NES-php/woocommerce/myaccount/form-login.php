<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<div class="page-container">
	<?php 

	do_action( 'woocommerce_before_cart' );

	the_title( '<h1 class="page-title">', '</h1>' );  
	
do_action( 'woocommerce_before_customer_login_form' ); ?>

<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>

<div class="u-columns login__wrap" id="customer_login">
	<div class="login-left">
		<div class="tabs">
			<nav class="tabs__items">
				<a href="#tab_01" class="u-column1 tabs__item active">
					<h2><?php echo pll__( 'Вхід', 'woocommerce' ); ?></h2>
				</a>
				<a href="#tab_02" class="u-column1 tabs__item">
					<h2><?php echo pll__( 'Реєстрація', 'woocommerce' ); ?></h2>
				</a>
			</nav>
			<?php endif; ?>
			<div id="tab_01" class="tab-pane faded active in">
				<form class="woocommerce-form woocommerce-form-login login-left__form login" method="post">

					<?php do_action( 'woocommerce_login_form_start' ); ?>

					<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
						<input type="text" class="woocommerce-Input woocommerce-Input--text form__input login-left__input input-text" placeholder="<?php echo pll__( 'E-mail або телефон', 'woocommerce' ); ?>" name="username" id="username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
					</p>
					<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
						<input class="woocommerce-Input woocommerce-Input--text input-text form__input login-left__input" type="password" placeholder="Пароль" name="password" id="password" autocomplete="current-password" />
					</p>

					<?php do_action( 'woocommerce_login_form' ); ?>

					<p class="form-row login-left__bottom">
						<label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme custom-checkbox">
							<input class="woocommerce-form__input woocommerce-form__input-checkbox custom-checkbox__input visually-hidden" name="rememberme" type="checkbox" id="rememberme" value="forever" /> 
							<span class="custom-checkbox__text login-checkbox__text"><?php echo pll__( 'Запам’ятати мене', 'woocommerce' ); ?></span>
						</label>
						<span class="woocommerce-LostPassword lost_password">
							<a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php echo pll__( 'Нагадати пароль', 'woocommerce' ); ?></a>
						</span>
						<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
						
					</p>
					
					<button type="submit" class="woocommerce-button button woocommerce-form-login__submit btn login-left__btn" name="login" value="<?php esc_attr_e( 'Log in', 'woocommerce' ); ?>"><?php esc_html_e( 'Log in', 'woocommerce' ); ?></button>

					<?php do_action( 'woocommerce_login_form_end' ); ?>

				</form>
			</div>
			<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>
			<div class="u-column2 tab-pane faded" id="tab_02">
				<form method="post" class="woocommerce-form woocommerce-form-register register register__form" <?php do_action( 'woocommerce_register_form_tag' ); ?> >

					<?php do_action( 'woocommerce_register_form_start' ); ?>

					<?php if ( 'yes' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>
						<p class="form-row form-row-wide">
							<input type="text" class="input-text form__input login-left__input" placeholder='<?php echo pll__( "Ім’я *", "woocommerce" ); ?>' name="billing_phone" id="reg_billing_phone" value="<?php esc_attr_e( $_POST['billing_phone'] ); ?>" />
						</p>
						
					<?php endif; ?>

					<p class="form-row form-row-wide">
						
    					<input type="text" class="input-text form__input login-left__input" placeholder="Номер телефону *" name="billing_first_phone" id="kind_of_phone" value="<?php  $billing_first_phone  ?>" />
						
					</p>

					<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
						<input type="email" placeholder="e-mail *" class="woocommerce-Input woocommerce-Input--text input-text form__input login-left__input" name="email" id="reg_email" autocomplete="email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
					</p>

					<?php if ( 'yes' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>

						<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
							<input type="password" placeholder='<?php echo pll__( "Придумайте пароль *", "woocommerce" ); ?>' class="woocommerce-Input woocommerce-Input--text input-text form__input login-left__input" name="password" id="reg_password" autocomplete="new-password" />
						</p>

					<?php else : ?>

						<p><?php esc_html_e( 'A password will be sent to your email address.', 'woocommerce' ); ?></p>

					<?php endif; ?>

					<?php do_action( 'woocommerce_register_form' ); ?>

					<p class="woocommerce-form-row form-row">
						<?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
						<button type="submit" class="woocommerce-Button woocommerce-button button btn woocommerce-form-register__submit" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>"><?php echo pll__( 'Зареєструватися', 'woocommerce' ); ?></button>
					</p>

					<?php do_action( 'woocommerce_register_form_end' ); ?>

				</form>
			</div>
		</div>
	</div>
	<div class="login-right">
		<ul class="login-right__list">

			<?php if( get_field('login-right_item') ): ?>				               
			<?php while(has_sub_field('login-right_item')): ?>
				<li class="login-right__item">

					<h2 class="login-right__title">
						<?php the_sub_field('title'); ?>
					</h2>
					<p class="login-right__text">
						<?php the_sub_field('text'); ?>
					</p>  
					
				</li> 
			<?php endwhile; ?>
			<?php endif; ?>

		</ul>
	</div>
</div>
<?php endif; ?>

<?php do_action( 'woocommerce_after_customer_login_form' ); ?>
