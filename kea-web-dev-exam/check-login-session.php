<?php
	
	session_start();
	if( isset( $_SESSION['userInfo'] ) ){
		echo $_SESSION['userInfo'];
	} else{
		$sUserInfo = '[{"loginStatus":0}]';
		echo $sUserInfo;
	}
	
?>