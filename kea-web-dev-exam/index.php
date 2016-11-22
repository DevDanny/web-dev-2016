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
			</ul>
		</nav>
	</header>
	
	<div id="carpet"></div>
	<section id="content-wrapper">
		
		<div class="section-bg section-one">
			<div class="info-box">
				<h2>Starters</h2>
				<h3>Cheese & Wine</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta cum deserunt voluptatibus doloremque expedita dicta sint earum libero ipsam porro.
				</p>
			</div>
			<div class="img"></div>
		</div>

		<div class="section-bg section-two">
			<div class="info-box">
				<h2>Main course</h2>
				<h3>Grilled Beef</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta cum deserunt voluptatibus doloremque expedita dicta sint earum libero ipsam porro.
				</p>
			</div>
			<div class="img"></div>
		</div>

		<div class="section-bg section-three">
			<div class="info-box">
				<h2>Side orders</h2>
				<h3>title</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta cum deserunt voluptatibus doloremque expedita dicta sint earum libero ipsam porro.
				</p>
			</div>
			<div class="img"></div>
		</div>

		<div class="section-bg section-four">
			<div class="info-box">
				<h2>Desserts</h2>
				<h3>Belgian waffle</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta cum deserunt voluptatibus doloremque expedita dicta sint earum libero ipsam porro.
				</p>
			</div>
			<div class="img"></div>
		</div>

	</section>

	<div id="login-outer">
		<div id="login-wrapper">
			<div id="wdw-login" class="wdw">
				<input type="text" id="txtUserEmail" placeholder="email">
				<input class="space-top-20" type="text" id="txtUserPassword" placeholder="password">
				<button id="btn-login" class="space-top-20">LOGIN</button>
				<a href="#" id="link-create-user">Dont have an account? Sign up</a>
				<p id="login-error-message"></p>
			</div>
		</div>
	</div>

	<div id="create-user-outer">
		<div id="create-user-wrapper">
			<div id="wdw-create-user" class="wdw">
				<input type="text" id="txt-create-user-email" placeholder="email">
				<input class="space-top-20" type="text" id="txt-create-user-password" placeholder="password">
				<button id="btn-create-user" class="space-top-20">CREATE USER</button>
				<a href="#" id="link-login">Already have an account? Login.</a>
				<p id="create-user-error-message"></p>
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

	// start animation of first section on doc ready
	$(".section-bg:first-child").addClass("animate-section");

	$(window).scroll(function(){
		//calculate section top offset from window top offset
		var offsetFromWindowTop = $(window).scrollTop();

		var section = $(".section-bg");
		$.each( section, function( i ) {
		  	//console.log(this);
		  	var sectionOffsetFromTop = $(this).offset().top;
			var offsetDistance = offsetFromWindowTop - sectionOffsetFromTop;
			console.log("section " + i + ": " + offsetDistance + "px from top");
			if(offsetDistance > "-500"){
				$(this).addClass("animate-section");
				console.log("section "+ ( i ) + " is now at the top or above");
			} else {
				$(this).removeClass("animate-section");
			}
		});
		console.log("---------------------------------------");
	});

	$("#nav li").click(function(){
		// get link index for later use in equation
		var linkIndex = $(this).index();
		// define section offset from top
     	var sectionOffsetFromTop = $(window).height() * linkIndex;		
      	console.log(sectionOffsetFromTop);
      	// animate close burger
      	$("#menu .line:nth-child(2)").toggleClass("burger-open");
		$("#menu .line:first-child, #menu .line:last-child").toggleClass("burger-open");
      	$("nav").fadeOut();
      	// animate to section
        $('body').animate({
        	scrollTop: sectionOffsetFromTop+'px'
      	}, 1000 );
	})

	if( localStorage.getItem("userEmail") ){
		var emailFromLocalStorage = localStorage.getItem("userEmail");
		$("#txt-create-user-email").val(emailFromLocalStorage);
	}

	$("#login").click(function(){
		$("#login-outer").fadeToggle();
	});
	$("#link-create-user").click(function(){
		$("#create-user-outer").fadeIn();
	});
	$("#link-login").click(function(){
		$("#create-user-outer").fadeOut();
	});
	$("#txt-create-user-email").blur(function(){
		localStorage.setItem("userEmail", $(this).val());
	});

	$("#menu").click(function(){
		$("#menu .line:nth-child(2)").toggleClass("burger-open");
		$("#menu .line:first-child, #menu .line:last-child").toggleClass("burger-open");
		$("nav").fadeToggle();
	});

	// checks if login combination is true or false
	$("#btn-login").click(function(){
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
				$("#login-error-message").text("Wrong login combination.");
			}
		})
	});

	$("#btn-create-user").click(function(){
		var userEmail = $("#txt-create-user-email").val();
		var userPassword = $("#txt-create-user-password").val();

		var createUserUrl = "create-user.php";

		$.ajax({
			url: createUserUrl,
			type: "POST",
			data: {userEmail, userPassword}
		}).done(function(data){
			console.log(data);
			if(data == 1){
				$("#create-user-outer").fadeOut();
			} else{
				$("#create-user-error-message").text("Email address already in use.");
			}			
		})
		
	});
	

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
