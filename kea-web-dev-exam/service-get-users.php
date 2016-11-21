<?php 
	$getUsers = file_get_contents("users.json");
	
	$decodeUsers = json_decode($getUsers);
	
	// create a new object and save it in variable, and assign values to the keys
	// $jUser = json_decode('{}');
	// $jUser->userId = $user;
	// $jUser->message = $message
	//$user = $decodeUsers[]->id;
	$testArray = [];
	
	for ($i = 0; $i < Count($decodeUsers); $i++) {
		$jUser = json_decode('{}');
		$jUser->id = $decodeUsers[$i]->id;
		$jUser->userEmail = $decodeUsers[$i]->userEmail;
		//	echo $jUser;
		array_push($testArray, $jUser);
	}

	$test = json_encode($testArray);
	echo $test;
	
 ?>