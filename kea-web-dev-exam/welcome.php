<?php
	session_start();
	if( !isset( $_SESSION['userEmail'] ) ){
		header('location: index.php');
	}
?>

<!DOCTYPE html>
<html>
<head>

	<style>

		html, body{
			height: 100%;
			background-color: rgba(0,0,0,0.1);
			color: #222;		
		}

		*{
			margin: 0px;
			padding: 0px;
			font-size: 16px;
			box-sizing: border-box;
		}

		body{
			display: flex;
			justify-content: center;
			align-items: center;
		}

		#wdw-welcome{
			display: flex;
			flex-direction: column;
			width: 600px;
			padding: 50px;
			text-align: center;
			font-size: 60px;
			color: #26B400;
			border: 1px solid #999999;
			background-color: white;
		}
		#wdw-welcome #lblUserName{
			font-size: 40px;
		}
		button{
			width: 100%;
			height: 50px;
			color: white;
			border: none;
			background-color: #26B400;
			cursor: pointer;
		}		

	</style>

	<title>WELCOME</title>
</head>
<body>

	<div id="wdw-welcome">
		WELCOME
		<div id="lblUserName">
			<?php
				echo $_SESSION['userEmail'];
			?>
		</div>
		<form action="logout.php">
			<button>LOGOUT</button>
		</form>
	</div>




</body>
</html>
