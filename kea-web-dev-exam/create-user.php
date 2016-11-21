<?php 
	// get variables from an ajax call
	$userEmail = $_POST['userEmail'];
	$userPassword = $_POST['userPassword'];

	//echo $user." ".$message;
	// get json chat file
	$sGetUserFile = file_get_contents("users.json");
	
	//echo $getChatFile;
	// decode from string to an object
	$ajUsers = json_decode($sGetUserFile);

	for ($i = 0; $i < Count($ajUsers); $i++) { 
		$sUserEmailFromFile = $ajUsers[$i]->userEmail;

		if($userEmail == $sUserEmailFromFile){
			$exists = true;
			break;
		}
	}
	if($exists != true){
		// create a new object and save it in variable, and assign values to the keys
		$jUser = json_decode('{}');
		$jUser->id = Count($ajUsers);
		$jUser->userEmail = $userEmail;
		$jUser->userPassword = $userPassword;

		//push the object to array
		array_push($ajUsers, $jUser);

		//encode the object and make it readable
		$jEncodeUsers = json_encode($ajUsers, JSON_PRETTY_PRINT);

		//echo $sEncodeToJson;

		// append the encoded array to the file
		file_put_contents("users.json", $jEncodeUsers);
		echo true;
	} else{
		echo false;
	}
	
?>