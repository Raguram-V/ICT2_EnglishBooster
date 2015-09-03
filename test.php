<?php
			$('#login').click(function(){ // Create `click` event function for login
				var username = $('#inputEmail'); // Get the username field
				var password = $('#inputPassword'); // Get the password field
				var uType = $("#userType option:selected").text();
				var login_result = $('.login_result'); // Get the login result div
				
				login_result.html('loading..'); // Set the pre-loader can be an animation
				
				if(username.val() != '' && password.val() != ''){ // Check the username and password values is not empty and make the ajax request
					var UrlToPass = 'username='+username.val()+'&password='+password.val()+'&usertype='+uType;
					alert (UrlToPass);
					$.ajax({
						type:'POST',
						url:'login.php',
						data:UrlToPass,
						success: function(res){
							alert(res + '');
						}
					});
				}
			return false;
?>

login.php
if ($usertype == "Student") {
		$query = mysql_query('SELECT * FROM Student_Login WHERE student_uname = "'.$username.'" AND student_password = "'.$password.'" '); 
	}else if(($usertype == "Teacher") {
		$query = mysql_query('SELECT * FROM Teacher_Login WHERE teacher_uname = "'.$username.'" AND teacher_pwd = "'.$password.'" '); 
	}else {
		$query = mysql_query('SELECT * FROM Parent_Login WHERE parent_uname = "'.$username.'" AND parent_pwd = "'.$password.'" '); 
	}
	
	$num_rows = mysql_num_rows($query); // Get the number of rows
	if($num_rows <= 0){ // If no users exist with posted credentials print 0 like below.
		echo 0;
	} else {
		$fetch = mysql_fetch_array($query);
		if ($usertype == "Student") {
			$_SESSION['user_email'] 	= $fetch['student_uname'];
		}else if($usertype == "Student") {
			$_SESSION['user_email'] 	= $fetch['teacher_uname'];
		}else {
			$_SESSION['user_email'] 	= $fetch['parent_uname'];
		}
		
		echo 1;
	}
