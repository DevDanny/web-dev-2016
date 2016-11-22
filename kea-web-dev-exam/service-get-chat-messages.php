<?php 
	session_start();
	$username = $_GET['username'];	
	$url = "$username".'.json';

	$users = file_get_contents($url);
	echo $users;
?>