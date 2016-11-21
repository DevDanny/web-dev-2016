<?php 
	$getUsers = file_get_contents("users.json");
	
	$decodeUsers = json_decode($getUsers);
	
	// create a new object and save it in variable, and assign values to the keys
	// $jUser = json_decode('{}');
	// $jUser->userId = $user;
	// $jUser->message = $message
	//$user = $decodeUsers[]->id;
	$jUser = json_decode('{}');
	for ($i = 0; $i < 3; $i++) {
		$jUser->id = $decodeUsers[$i]->id;
		$jUser->userEmail = $decodeUsers[$i]->userEmail;
		//	echo $jUser;
		
	}
$test = json_encode($jUser);
echo $test;
	
 ?>