<!DOCTYPE html>
<html>
<head>
	<!--test-->
	<title>LOGIN</title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
	<!-- test 2 -->
<body>

	<header>
		<button id="login"><i class="fa fa-user-circle" aria-hidden="true"></i>LOGIN</button>
		<div id="menu">
			<div id="burger-wrapper">
				<div class="line"></div>
				<div class="line"></div>
				<div class="line"></div>			
			</div>			
		</div>
		<nav>
			<ul id="nav">
				<li href="#">item 1</li>
				<li href="#">item 2</li>
				<li href="#">item 3</li>
				<li href="#">item 4</li>
				<li href="#">item 5</li>
			</ul>
		</nav>
	</header>
	
	<div id="carpet"></div>
	<section id="content-wrapper">

		<div class="section-bg section-one">
			<div class="info-box">
				<h2>Lorem.</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta cum deserunt voluptatibus doloremque expedita dicta sint earum libero ipsam porro.
				</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta cum deserunt voluptatibus doloremque expedita dicta sint earum libero ipsam porro.
				</p>
			</div>
			<div id="img"></div>
		</div>

		<div class="section-bg section-two">
			<div class="info-box">
				<h2>Lorem.</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta cum deserunt voluptatibus doloremque expedita dicta sint earum libero ipsam porro.
				</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta cum deserunt voluptatibus doloremque expedita dicta sint earum libero ipsam porro.
				</p>
			</div>
			<div id="img"></div>
		</div>

		<div class="section-bg section-three">
			<div class="info-box">
				<h2>Lorem.</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta cum deserunt voluptatibus doloremque expedita dicta sint earum libero ipsam porro.
				</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta cum deserunt voluptatibus doloremque expedita dicta sint earum libero ipsam porro.
				</p>
			</div>
			<div id="img"></div>
		</div>

		<div class="section-bg section-four">
			<div class="info-box">
				<h2>Lorem.</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta cum deserunt voluptatibus doloremque expedita dicta sint earum libero ipsam porro.
				</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta cum deserunt voluptatibus doloremque expedita dicta sint earum libero ipsam porro.
				</p>
			</div>
			<div id="img"></div>
		</div>
	</section>

	<div id="login-outer">
		<div id="login-wrapper">
			<div id="wdw-login">
				<input type="text" id="txtUserEmail" placeholder="email">
				<input class="space-top-20" type="text" id="txtUserPassword" placeholder="password">
				<button id="fire" class="space-top-20">LOGIN</button>
			</div>
		</div>
	</div>

	<div id="logout">
		<form action="logout.php">
			<button id="btn-logout"><i class="fa fa-user-circle" aria-hidden="true"></i>LOGOUT</button>
		</form>
	</div>

</body>


<script>

	$("#login").click(function(){
		$("#login-outer").fadeToggle();
	})

	$("#menu").click(function(){
		$("#menu .line:nth-child(2)").toggleClass("burger-open");
		$("#menu .line:first-child, #menu .line:last-child").toggleClass("burger-open");
		$("nav").fadeToggle();
	})

	// checks if login combination is true or false
	$("#fire").click(function(){
		var userEmail = $("#txtUserEmail").val();
		var userPassword = $("#txtUserPassword").val();

		var verificationUrl = "verify-login.php?txtUserEmail="+userEmail+"&txtUserPassword="+userPassword;

		$.ajax({
			url: verificationUrl,
			type: "GET",
			cache:false
		}).done(function(data){
			if(data == 1){
				console.log("logged in");
				$("#login-outer").hide();
				$("#login").hide();
				$("#logout").show();
			} else{
				console.log("error: wrong combination");
			}
		})
	})
	

	// check if session exists
	$.ajax({
		url: "check-login-session.php",
		type: "GET",
		cache:false		
	}).done(function(data){
		if(data == 1){
			console.log("already logged in");
			$("#login").hide();
			$("#logout").show();
		} else {
			//$("#wdw-login").css("display","flex");
			$("#logout").hide();
		}
	})

</script>
</html>
