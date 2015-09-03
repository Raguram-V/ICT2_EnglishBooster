<?php
	
	session_start();
	include 'connect.php'; // include the library for database connection
	
	$username = $_POST['username']; // Get the username
	$password = $_POST['password']; // Get the password and decrypt it
	$usertype = $_POST['usertype']; // Get the password and decrypt it
	
	if ($usertype == "student") {
		$query = mysql_query('SELECT * FROM Student_Login WHERE student_uname = "'.$username.'" AND student_password = "'.$password.'" '); 
	}else if($usertype == "teacher") {
		$query = mysql_query('SELECT * FROM Teacher_Login WHERE teacher_uname = "'.$username.'" AND teacher_pwd = "'.$password.'" '); 
	}else {
		$query = mysql_query('SELECT * FROM Parent_Login WHERE parent_uname = "'.$username.'" AND parent_pwd = "'.$password.'" '); 
	}
	
	$num_rows = mysql_num_rows($query); // Get the number of rows
	if($num_rows <= 0){ // If no users exist with posted credentials print 0 like below.
		echo 0;
	} else {
		$fetch = mysql_fetch_array($query);
		if ($usertype == "student") {
			$_SESSION['student_email'] = $fetch['student_uname'];
		}else if($usertype == "teacher") {
			$_SESSION['teacher_email'] = $fetch['teacher_uname'];
		}else {
			$_SESSION['parent_email'] = $fetch['parent_uname'];
		}
		echo 1;
	}

?>