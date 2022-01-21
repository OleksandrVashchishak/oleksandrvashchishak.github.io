<?php
if (!isset($conn)){
	if (LOAD_DB_CONNECT_MM==1){
		require_once($_SERVER['DOCUMENT_ROOT'].'/wp-content/themes/legends/config.php');
	}
}
?>