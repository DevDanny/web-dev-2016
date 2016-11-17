<?php
	
	session_start();

	$users = file_get_contents('users.json');

	$jUsers = JSON_decode($users);

	foreach($jUsers as $i) {
		$theCorrectUserEmail = $i->userEmail;
		$theCorrectUserPassword = $i->userPassword;

		if( $_GET['txtUserEmail'] == $theCorrectUserEmail && $_GET['txtUserPassword'] == $theCorrectUserPassword ){
			
			$_SESSION['userEmail'] = $theCorrectUserEmail;
			echo true;		
		} else{
			echo false;
		}
	}	

?>