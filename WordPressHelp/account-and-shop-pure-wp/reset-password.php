<?php

/**
 * Template Name: Reset password
 **/
get_header();


function reset_form() {

	$return = '';
    var_dump(mail('userwp938@gmail.com','test', 'test'));
	if ( $_POST['action'] == 'user_email' ) {

		if ( $user = get_user_by( 'email', $_POST['email_user'] ) ) {

			$key = wp_generate_password( 20, false );


			$subject = 'Linstitut de la Facette. Réinitialiser le mot de passe';

			$message = '
           <div>
               <p>Vous avez souhaité réinitialiser votre mot de passe sur le site Linstitut de la Facette.</p>
               <p>Pour réinitialiser votre mot de passe, veuillez cliquer sur le lien ci-dessous: '. home_url( '/mot-de-passe-oublie/?action=reset_link&key=' . $key . '&user_id=' . $user->ID ) .'</p>
               <p>Linstitut de la Facette vous remercie pour votre confiance.</p>
           </div>';

			$headers = "From: Linstitut de la Facetter <noreply@linstitutdelafacette.com>\r\n" .
			           'X-Mailer: PHP/' . phpversion() . "\r\n" .
			           "MIME-Version: 1.0\r\n" .
			           "Content-Type: text/html; charset=utf-8\r\n" .
			           "Content-Transfer-Encoding: 8bit\r\n";

			$mail = wp_mail($_POST['email_user'], $subject, $message, $headers);
            var_dump($mail);

			update_user_meta( $user->ID, 'reset_password_key', $key );

			$return .= '
					<div class="wpmem_reg">
						<h1 class="login-page-title message">Votre demande de réinilisation a bien été prise en compte</h1>
					</div>
				';


		} else {

			$return .= '
                
				<div class="wpmem_reg">
					<h1 class="login-page-title title message-warning" style="margin-bottom: 20px">Utilisateur avec le email existe pas</h1>
				</div>
				<div class="wpmem_reg login-page__login">
					<form method="post" action="' . esc_url( home_url( '/mot-de-passe-oublie/' ) ) . '" class="form register-form">
					<label class="login-page__label">
					    <input type="hidden" name="action" value="user_email">
                        <input class="login-page__email" type="text" name="email_user">
                        <span class="login-page__label-text">Email *</span>
                    </label>
						<button class="login-page__btn login-page__reset-btn" type="submit"><span>Valider</span></button>
					</form>
				</div>';
		}

	} elseif ( $_POST['action'] == 'user_password' ) {

		if (
			preg_match( '/((?=.*\d)(?=.*[A-Z]).{8,})/', $_POST['password'] ) &&
			$_POST['password'] == $_POST['confirm_password']
		) {

			wp_update_user( array(
				'ID'        => (int) $_POST['user_id'],
				'user_pass' => $_POST['password']
			) );

			$return .= '
				<div class="wpmem_reg" style="text-align: center">
					<h4 class="login-page-title message">Votre mot de passe a été mis à jour</h4>
					<a class="buttons" style="margin-right:7px" href="' . home_url( '/' ) . '">Retour à l’accueil</a>
					<a class="buttons" href="' . home_url( '/login/' ) . '">Connexion</a>
				</div>
			';

		} else {
			$return .= '
				<div class="wpmem_reg">
					<h4 class="login-page-title message message-warning">Vous avez entré des données incorrectes. essayer de récupérer à nouveau le mot de passe</h4>
				</div>
			';
		}

		delete_user_meta( (int) $_POST['user_id'], 'reset_password_key' );

	} elseif ( ! isset( $_POST['action'] ) && ! isset( $_GET['action'] ) ) {

		$return .= '
			<div class="wpmem_reg login-page__login">
					<form method="post" action="' . esc_url( home_url( '/mot-de-passe-oublie/' ) ) . '" class="form register-form">
					<label class="login-page__label">
					<input type="hidden" name="action" value="user_email">
                        <input class="login-page__email" type="text" name="email_user">
                        <span class="login-page__label-text">Email *</span>
                    </label>
						<button class="login-page__btn login-page__reset-btn" type="submit"><span>Valider</span></button>
					</form>
				</div>
		';
	}

	if ( $_GET['action'] == 'reset_link' ) {

		$db_key = get_user_meta( (int) $_GET['user_id'], 'reset_password_key', true );

		if ( $db_key == $_GET['key'] ) {

			$return .= '
				<style>
					input[type="password"].success {
						background-size: auto 40% !important;
					}
					input[type="password"].warning {
						border-color: #f00 !important;
						background-size: auto 50% !important;
					}
					input[type="submit"].disabled,
					input[type="submit"].disabled:hover {
						color: #fff;
						background-color: #888 !important;
						cursor: not-allowed;
					}
					
					.div_text {
						position: relative;
					}
					.warning-message {
						display: none;
						position: absolute;
						top: 9px;
						left: 102%;
						width: 170px;
						line-height: 1;
						font-size: 16px;
						color: #f00;
					}
					.warning-message .checked {
						color: #fff;
					}
				</style>
				<div class="wpmem_reg">
					<form method="post" action="' . esc_url( home_url( '/mot-de-passe-oublie/' ) ) . '" class="form register-form">
						<div class="input-box mb45 black">
						<input type="hidden" name="action" value="user_password">
						<input type="hidden" name="user_id" value="' . $_GET['user_id'] . '">
						<label for="password" class="text">Votre nouveau mot de passe*</label>
						<div class="div_text"><input name="password" type="password" id="password" class="textbox" required></div>
						<label for="confirm_password" class="text">Confirmez votre nouveau mot de passe*</label>
						<div class="div_text"><input name="confirm_password" type="password" id="confirm_password" class="textbox" required></div>
						</div>
						<div class="button_div" style="margin-top: 20px"><input type="submit" value="Reinitiаliser" class="btn-black btn-submit buttons disabled" disabled></div>
						
					</form>
				</div>
				<script>
				jQuery(document).ready(function($){


  var $pass = $("#pass1, #password"),
    $c_pass = $("#pass2, #confirm_password");


  var $w_m = $(".warning-message");

  $c_pass.on("keyup", function(){

    var $this = $(this);

    if($this.val() === $this.parents("form").find("#password, #pass1").val())
      toggle_input($this, "valid");
    else
      toggle_input($this, "invalid");

    check_form($this);
  });

   function check_form(e){
    var $this = $(e),
      $form = $this.closest("form"),
      $submit = $form.find(".buttons"),
      errors = false;

    $form
      .find(\'input\')
      .each(function(){
        var $this = $(this);

        if($this.hasClass(\'warning\') || !$this.val())
          errors = true;
      });

    if(!errors){
      toggle_submit($submit, \'enable\');

      return true;
    } else {
      toggle_submit($submit, \'disable\');

      return false;
    }
  }

  function toggle_input(e, a){
    if(a === "valid")
      $(e)
        .removeClass("warning")
        .addClass("success");
    else if(a === "invalid")
      $(e)
        .removeClass("success")
        .addClass("warning");
  }

  function toggle_submit(e, a){
    if(!$(e).hasClass("no-disabled"))
      if(a === "enable")
        $(e)
          .removeClass("disabled")
          .prop("disabled", false);
      else if(a === "disable")
        $(e)
          .addClass("disabled")
          .prop("disabled", true);
  }

});
</script>';
		} else {

			$return .= '
				<div class="wpmem_reg">
					<h4 class="title message message-warning" style="color: #fff">Lien invalide !</h4>
				</div>';
		}
	} elseif ( isset( $_GET['action'] ) && $_GET['action'] != 'reset_link' ) {
		$return .= '
			<div class="wpmem_reg">
				<h4 class="message message-warning">Lien invalide !</h4>
			</div>';
	}

	return $return;
}

add_shortcode( 'reset_form', 'reset_form' );

?>

<div class="presonal-account">
    <div class="presonal-account__head">
        <div class="presonal-account__head-left">
            <span class="presonal-account__head-logo">
                <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="80" height="80" fill="#E82F2F" />
                    <path d="M80 23.5148C55.4343 52.7055 16.431 59.4626 0 59.1923V0H80V23.5148Z" fill="#E95E40" />
                </svg>
            </span>
            <h2 class="presonal-account__head-title">
                Mot de passe oublie
            </h2>
        </div>
        <span class="presonal-account__head-line"></span>
    </div>

    <div class="login-page">
        <?= do_shortcode('[reset_form]') ?>
    </div>



</div>

<?php get_footer() ?>

<script>


    const inputs = document.querySelectorAll('.login-page__label input')
    inputs.forEach(e => {
        e.addEventListener('focus', () => {
            const inputText = e.parentElement.querySelector('.login-page__label-text')
            inputText.classList.add('active')
        })

        e.addEventListener('blur', () => {
            const inputText = e.parentElement.querySelector('.login-page__label-text')
            const input = e.parentElement.querySelector('input')
            if (input.value == '') {
                inputText.classList.remove('active')
            }
        })
    })
</script>
