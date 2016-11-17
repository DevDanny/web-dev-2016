<?php 
	// get variables from an ajax call
	$user = $POST['username'];
	$message = $POST['message'];

	//echo $user." ".$message;
	// get json chat file
	$sGetChatFile = file_get_contents("chat.json");
	
	//echo $getChatFile;
	// decode from string to an object
	$ajDecodeChat = json_decode($sGetChatFile);

	// create a new object and save it in variable, and assign values to the keys
	$jChat = json_decode('{}');
	$jChat->name = $user;
	$jChat->message = $message;

	//push the object to array
	array_push($ajDecodeChat, $jChat);

	//encode the object and make it readable
	$sEncodeToJson = json_encode($ajDecodeChat, JSON_PRETTY_PRINT);

	//echo $sEncodeToJson;

	// append the encoded array to the file
	file_put_contents("chat.json", $sEncodeToJson);
?>