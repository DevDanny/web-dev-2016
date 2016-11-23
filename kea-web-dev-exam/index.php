<!DOCTYPE html>
<html>
<head>
	<!--test-->
	<title>LOGIN</title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">	
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
				<li href="#">Starters</li>
				<li href="#">Main course</li>
				<li href="#">Sides</li>
				<li href="#">Dessert</li>
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
				<h2>Sides</h2>
				<h3>Homemade pasta</h3>
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

	<div class="chat-wrapper">
		<div class="chat-inner-wrapper">
		</div>
	</div>

</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
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
			//console.log("section " + i + ": " + offsetDistance + "px from top");
			if(offsetDistance > "-500"){
				$(this).addClass("animate-section");
				//console.log("section "+ ( i ) + " is now at the top or above");
			} else {
				$(this).removeClass("animate-section");
			}
		});
		//console.log("---------------------------------------");
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


	var adminChat = $(
		'<div class="chat-box">' +
			'<div class="chat-head">Chat list</div>' +
			'<div class="chat-body"></div>' +
		'</div>'
	);
	var userChat = $(
			'<div class="msg-box">' +
				'<div class="msg-head">Admin'+
					'<div class="close">x</div>' +
				'</div>' +
				'<div class="msg-body">' +
					// messages here
				'</div>' +
				'<div class="msg-footer">' +
					'<textarea class="msg-input" rows="3" type="text" name="message" placeholder="Type message"></textarea>' +
				'</div>' +
			'</div>'
		);	
	// checks if login combination is true or false
	$("#btn-login").click(function(){
		var userEmail = $("#txtUserEmail").val();
		localStorage.setItem("userName", userEmail);
		var userPassword = $("#txtUserPassword").val();
		var verificationUrl = "verify-login.php?txtUserEmail="+userEmail+"&txtUserPassword="+userPassword;

		$.ajax({
			url: verificationUrl,
			type: "GET",
			cache:false
		}).done(function(jData){
			//console.log(jData);
			try{
				var jLogin = JSON.parse(jData);
				var userStatus = jLogin[0].status;
				var userVerified = jLogin[0].verified;
				if(userVerified == true){
					console.log("logged in");
					$("#login-outer").hide();
					$("#login").hide();
					$("#logout").show();
				}
				if(userStatus == 1){
					$(".chat-wrapper").show();
					$(".chat-wrapper .chat-inner-wrapper").append(adminChat);			
				} else{
					$(".chat-wrapper").show();
					$(".chat-wrapper .chat-inner-wrapper").append(userChat);
				}
			} catch(error){
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
	}).done(function(sData){
		var jData = JSON.parse(sData);
		console.log(jData);
		if(jData[0].loginStatus == 1){

			console.log("already logged in");
			$("#login").hide();
			$("#logout").show();
			if(jData[0].status == 1){
				$(".chat-wrapper").show();
				$(".chat-wrapper .chat-inner-wrapper").append(adminChat);	
			} else{
				$(".chat-wrapper").show();
				$(".chat-wrapper .chat-inner-wrapper").append(userChat);	
			}
		} else {
			//$("#wdw-login").css("display","flex");
			$("#logout").hide();
		}
	})

	// *************************************************************************
	// ******************************* CHAT ************************************
	// *************************************************************************

	// if chats exists update messages
	setInterval(function(){
		var msgBox = $(".msg-box").length;
		var msgHead = $(".msg-box .msg-head");
		var getChatUrl;
		if(msgBox > 0){
			$.each( msgHead, function( key, value ) {
				var msgBody = $(this).next();
				//console.log(msgBody);
				var chatHeadName = $(this).text();
				chatHeadName = chatHeadName.split("x");
				chatHeadName = chatHeadName[0];
				//console.log("chats updated");
				var userName = localStorage.getItem("userName");
				if(userName != "admin"){
					getChatUrl = userName+".json";
				} else{
					getChatUrl = chatHeadName+".json";
				}				
				
				$.ajax({
				  	url: getChatUrl,
				  	type: "GET",
				  	cache: false
				}).done(function(ajData) {
					$(msgBody).empty();
					userSenderName = ajData[0].name;
					//console.log(userSenderName);
					var userName = localStorage.getItem("userName");
					for (var i = 0; i < ajData.length; i++) {
						//console.log(ajData[i]);
						var senderName = ajData[i].name;
						var senderMessage = ajData[i].message;						
						if ( (senderName == "admin") && (userName == "admin") ){
							// besked: admin, login: admin
							$(msgBody).append(
								"<div class='msg-out'>"+senderMessage+"</div>"			
							);
						} else if( (senderName == "admin") && (userName != "admin") ){
							// besked: admin, login: user
							$(msgBody).append(
								"<div class='msg-in'>"+senderMessage+"</div>"			
							);
						} else if( (senderName != "admin") && (userName == "admin") ){
							// besked: user, login: admin
							$(msgBody).append(
								"<div class='msg-in'>"+senderMessage+"</div>"			
							);
						} else if( (senderName != "admin") && (userName != "admin") ){
							// besked: user, login: user
							$(msgBody).append(
								"<div class='msg-out'>"+senderMessage+"</div>"			
							);
						}
					}				
				});

			});
		} else{
			console.log("no chats");
		}

	}, 2000);

	$(document).on("click", ".chat-head", function(){
		$(".chat-body").toggle("fast");
	});

	$(document).on("click", ".msg-head", function(){
		$(this).siblings(2).toggle("fast");
	});

	$(document).on("click", ".close", function(){
		$(this).parents().eq(1).remove();
	});

	// click a user in the chat-list
	$(document).on("click", ".user", function(){
		var msgHead = $(".msg-box .msg-head");
		var name = $(this).text();
		var exists;
		var newChat = $(
			'<div class="msg-box">' +
				'<div class="msg-head">'+ name +
					'<div class="close">x</div>' +
				'</div>' +
				'<div class="msg-body">' +
					// messages here
				'</div>' +
				'<div class="msg-footer">' +
					'<textarea class="msg-input" rows="3" type="text" name="message" placeholder="Type message"></textarea>' +
				'</div>' +
			'</div>'
		);		

		var msgLength = $(".chat-inner-wrapper").children().length;

		if(msgLength == 1){
			// if no chats open append right away
			console.log(true);
			$(".chat-inner-wrapper").append(newChat);
		} else{
			//else check dom elements for duplicates before appending
			$.each( msgHead, function( key, value ) {
				var chatHeadName = $(this).text();
				chatHeadName = chatHeadName.split("x");
				chatHeadName = chatHeadName[0]
			  	//console.log(chatHeadName);
			  	if(name == chatHeadName){
			  		exists = true;			
			  	}
			}); 
			// append if no match is found
			if(exists != true){
			  	$(".chat-inner-wrapper").append(newChat);
			} else{
				//console.log("chat window already open");
			}
		}		
	});

	//GET USERS FOR THE ADMIN
	setInterval(function(){
		var getUserUrl = "service-get-users.php";
		$.ajax({
		  url  : getUserUrl,
		  type : "GET",
		  cache: false
		}).done(function(jData) {
			//console.log("ajax start");
			var jUsers = JSON.parse(jData);
			var chatBodyLength = $(".chat-body .user").length;
			//console.log(chatBodyLength);
			if(chatBodyLength == 0){ // if no chats exists in dom, append all from file
				for (var i = 0; i < jUsers.length; i++) {		  	 		
				  	$(".chat-body").append("<div class='user'>"+jUsers[i].userEmail+"</div>");
				 } //end forloop
			} else{
				for (var i = 0; i < jUsers.length; i++) {
					var test = jUsers[i].userEmail;
					var exists = false;
					$( ".user" ).each(function() {
						var currentUser = $( this ).text();
						if(test == currentUser){
							exists = true;
						}				 				
			    	});	//foreach end
			    	if(exists == false){
						console.log("new user");
						$(".chat-body").append("<div class='user'>"+jUsers[i].userEmail+"</div>");
					} else{
						//console.log("no changes");
					}		  	 		
				}  //end forloop
			}	  
		   
		});

	}, 1000);

	// chat sending messages
	$(document).on("click", ".msg-input", function(){
		var currentChatBox = $(this);
		var currentChatBoxName = currentChatBox.parents().siblings(":eq(0)").text();		
		chatHeadName = currentChatBoxName.split("x");
		chatHeadName = chatHeadName[0];
		console.log(chatHeadName);
		var sendMessageUrl;
		// on keypress enter send message		
		$(document).on("keypress", ".msg-input", function(e){
			if(e.keyCode == 13){
				var msg = $(this).val();
				var userName = localStorage.getItem("userName");

				if(userName != "admin"){
					sendMessageUrl = "service-user-send-chat.php?username="+userName+"&message="+msg;
				} else{
					sendMessageUrl = "service-admin-send-chat.php?username="+chatHeadName+"&message="+msg;
				}
				//var sendMessageUrl = "service-admin-send-chat.php?username="+chatHeadName+"&message="+msg;		
				$(this).val('');
				if(msg != ''){
					console.log(msg);
					$.ajax({
					  	url  : sendMessageUrl,
					  	type : "GET",
					  	cache: false
					}).done(function() {
						console.log("message sent");
					});
				}
		        return false;
			}
		});
	});

</script>
</html>
