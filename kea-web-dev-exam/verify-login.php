<?php
	
	session_start();

	$users = file_get_contents('users.json');

	$jUsers = JSON_decode($users);
	$aVerify = [];
	foreach($jUsers as $i) {
		$theCorrectUserEmail = $i->userEmail;
		$theCorrectUserPassword = $i->userPassword;
		$status = $i ->status;

		if( $_GET['txtUserEmail'] == $theCorrectUserEmail && $_GET['txtUserPassword'] == $theCorrectUserPassword ){		
			$_SESSION['userEmail'] = $theCorrectUserEmail;

			$jVerify = JSON_decode('{}');
			$jVerify->verified = true;
			$jVerify->status = $status;
			array_push($aVerify, $jVerify);	
			$ajVerify = json_encode($aVerify, JSON_PRETTY_PRINT);

			echo $ajVerify;	
		} else{
				
		}
	}	

?>