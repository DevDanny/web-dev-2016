<?php
	
	session_start();
	$theCorrectUserEmail = "a@a.com";
	$theCorrectUserPassword = "123";

	if( $_GET['txtUserEmail'] == $theCorrectUserEmail && $_GET['txtUserPassword'] == $theCorrectUserPassword ){
		
		$_SESSION['userEmail'] = $theCorrectUserEmail;
		echo true;		
	} else{
		echo false;
	}

?>