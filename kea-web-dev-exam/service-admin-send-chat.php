<?php 
	// get variables from an ajax call
	$user = $_GET['username'];
	$message = $_GET['message'];

	//echo $user." ".$message;
	// get json chat file

	if( file_get_contents("$user.json") ){
		$sGetChatFile = file_get_contents("$user.json");
		//echo $getChatFile;
		// decode from string to an object
		$ajDecodeChat = json_decode($sGetChatFile);

		// create a new object and save it in variable, and assign values to the keys
		$jChat = json_decode('{}');
		$jChat->name = 'admin';
		$jChat->message = $message;

		//push the object to array
		array_push($ajDecodeChat, $jChat);

		//encode the object and make it readable
		$sEncodeToJson = json_encode($ajDecodeChat, JSON_PRETTY_PRINT);

		//echo $sEncodeToJson;

		// append the encoded array to the file
		file_put_contents("$user.json", $sEncodeToJson);
		echo "message sent";
	} else{
		echo "file created";
		$sMessage = '[{"name":"'.$user.'","message":"'.$message.'"}]';
		file_put_contents("$user.json", $sMessage);
	}
?>