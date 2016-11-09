<?php
	
	session_start();
	if( isset( $_SESSION['userEmail'] ) ){
		echo true;
	}
	
?>