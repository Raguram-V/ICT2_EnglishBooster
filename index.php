<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- link rel="icon" href="../../favicon.ico"-->

    <title>Signin</title>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <!-- Bootstrap core CSS -->
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">


    <!-- Custom styles for this template -->
    <link href="css/sign_in.css" rel="stylesheet">
	
	<script type="text/javascript">
		$(document).ready(function(){
			$('#login_form').on('submit',function(e){
				e.preventDefault();
				var login_result = $('.login_result'); // Get the login result div
				var Email = $('#inputEmail'); // Get the login result div
				
				var uType = $("#userType option:selected").text();
				login_result.css("display", "block");
				login_result.css("color", "red");
				login_result.css("border-radius", "5px");
				login_result.css("width", "100%");
				login_result.css("text-align", "center");
				
				login_result.css("background-color", "yellow");
				login_result.css("padding", "5px");
				login_result.html('loading..'); // Set the pre-loader can be an animation
				
				var form_data = $('#login_form').serialize();
				
				 $.post('login.php',form_data,
					function(data, status){
						if (data == 0){
							login_result.html('Invalid Uname or Pwd');
							$('#login_form')[0].reset();
							Email.focus();
						}else {
							if(uType == 'Student') {
								window.location.assign('student_home.php');
							}else if(uType == 'Teacher') {
								window.location.assign('teacher_home.php')
							}else{
								window.location.assign('parent_home.php')
							}
						}
					});
			});
		
		});
	</script>


  </head>

  <body>

    <div class="container">
      <form class="form-signin" id="login_form" method="POST">
			<h2 class="form-signin-heading">Please sign in</h2>
			<h3 class="login_result"></h3>
			
			<label for="inputEmail" class="sr-only">Email address</label>
			<input type="email" id="inputEmail" name="username" class="form-control" placeholder="Email address" required autofocus>
			
			<label for="inputPassword" class="sr-only">Password</label>
			<input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
			
			<select class="form-control" id="userType" name="usertype" required>
			  <option value="student" selected="Selected">Student</option>
			  <option value="teacher">Teacher</option>
			  <option value="parent">Parent</option>
			</select>
            </br>
			
			<button class="btn btn-lg btn-primary btn-block" type="submit" id="login">Sign in</button>
      </form>
    </div> <!-- /container -->
  </body>
</html>
