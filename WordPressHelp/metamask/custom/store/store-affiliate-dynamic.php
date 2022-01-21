<?php
@session_start();
if (!defined('LOAD_DB_CONNECT_MM')){
	define('LOAD_DB_CONNECT_MM',1); //comment because have problem with WP debug (Already defined in metamask-functions.php)
}
//require_once(__DIR__ . '/store-settings.php');
// require_once(__DIR__ . '/metamask-db-connect.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/wp-content/themes/legends/custom/store/store-settings.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/wp-content/themes/legends/custom/metamask/metamask-db-connect.php');

$referrals = 0;
if ($stmt = $conn->prepare("SELECT COUNT(*) AS cnt FROM $tablename WHERE aff_id = ?")) {
  $stmt->bindParam(1, $_SESSION['userid']);
  $stmt->execute();
  $referrals = $stmt->fetchColumn();
}
if (!is_numeric($referrals)) {
  $referrals = 0;
}

?>
<div class="store_program__form wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.5s">
	<h4 class="store_program__form_heading">Your referral link</h4>
	<?php
	if (!isset($_SESSION['userid'])) { ?>
		<div class="store_program__form_col">
			<div class="store_program__form_line">
				<label for="affiliate_create">GET YOUR REFERRAL LINK</label>
				<div class="store_program__form_input">
					<div class="store_program__form_btn store_btn" onclick="getConnectStore()" >
						<span>CONNECT</span>
						<svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M18 15V16C18 17.1 17.1 18 16 18H2C1.46957 18 0.960859 17.7893 0.585786 17.4142C0.210714 17.0391 0 16.5304 0 16V2C0 1.46957 0.210714 0.960859 0.585786 0.585786C0.960859 0.210714 1.46957 0 2 0H16C17.1 0 18 0.9 18 2V3H9C8.46957 3 7.96086 3.21071 7.58579 3.58579C7.21071 3.96086 7 4.46957 7 5V13C7 13.5304 7.21071 14.0391 7.58579 14.4142C7.96086 14.7893 8.46957 15 9 15H18ZM9 13H19V5H9V13ZM13 10.5C12.17 10.5 11.5 9.83 11.5 9C11.5 8.17 12.17 7.5 13 7.5C13.83 7.5 14.5 8.17 14.5 9C14.5 9.83 13.83 10.5 13 10.5Z" fill="white" />
						</svg>
					</div>
				</div>
			</div>
		</div>
	<?php } else {
		// 10.11 OLD CODE
		// if ($stmt = $conn->prepare("SELECT publicName FROM $tablename WHERE id = ?")){
		// 	$stmt->bindParam(1, $_SESSION['userid']);
		// 	$stmt->execute();
		// 	$publicName = $stmt->fetchColumn();
		// }
		// if (strlen($publicName) > 0) {
		// 	$aff_id_name = $public_name;
		// } else{
		// 	$aff_id_name = $_SESSION['userid'];
		// }

		if ($_SESSION['publicName']) {
			$aff_id_name = $_SESSION['publicName'];
		} else {
			$aff_id_name = $_SESSION['userid'];
		}
		$aff_link = 'https://'.$_SERVER['SERVER_NAME'].'/ref/' . $aff_id_name . '/';
	?>
		<div class="store_program__form_col">
			<div class="store_program__form_line">
				<label for="affiliate_copy">REFERRAL LINK</label>
				<div class="store_program__form_input">

					<input type="text" id="affiliate_copy" class="store_input affiliate_link" value="<?= $aff_link ?>">
					<script type="text/javascript">
						document.getElementById("affiliate_copy").addEventListener("focus", function() {
							this.setSelectionRange(0, this.value.length)
						});
						document.getElementById("affiliate_copy").setAttribute("readonly", true);
					</script>
					<div class="store_program__form_btn copy_btn store_btn" onclick="copyToClipboard()">
						<div class="copy_btn_figure"></div>
						<span>COPY</span>
						<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M16.3889 3.88892H5.83333C5.61232 3.88892 5.40036 3.97671 5.24408 4.13299C5.0878 4.28927 5 4.50124 5 4.72225V18.0556C5 18.2766 5.0878 18.4886 5.24408 18.6448C5.40036 18.8011 5.61232 18.8889 5.83333 18.8889H16.3889C16.6099 18.8889 16.8219 18.8011 16.9781 18.6448C17.1344 18.4886 17.2222 18.2766 17.2222 18.0556V4.72225C17.2222 4.50124 17.1344 4.28927 16.9781 4.13299C16.8219 3.97671 16.6099 3.88892 16.3889 3.88892ZM16.1111 17.7778H6.11111V5.00003H16.1111V17.7778Z" fill="white" />
							<path d="M14.4449 1.94442C14.4449 1.7234 14.3571 1.51144 14.2008 1.35516C14.0445 1.19888 13.8326 1.11108 13.6115 1.11108H3.05599C2.83498 1.11108 2.62301 1.19888 2.46673 1.35516C2.31045 1.51144 2.22266 1.7234 2.22266 1.94442V15.2778C2.22266 15.4988 2.31045 15.7107 2.46673 15.867C2.62301 16.0233 2.83498 16.1111 3.05599 16.1111H3.33377V2.2222H14.4449V1.94442Z" fill="white" />
						</svg>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
</div>

<?php
if (isset($_SESSION['userid'])) { ?>
	<div class="store_program__members wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.5s">
		<div class="store_program__members_col">
		  <span class="store_program__members_label">Number of referred users</span>
		  <span class="store_program__members_number">
			<?php
			echo $referrals;
			?>
		  </span>
		</div>
		<div class="store_program__members_col total_earned">
		  <span class="store_program__members_label">Total Earned</span>
		  <span class="store_program__members_number">0 <?php echo $mint_currency ?></span>
		  <!-- <button class="claim_button">Claim</button> -->
		</div>
	 </div>
<?php }?>