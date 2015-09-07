<?php
	session_start();
	include 'connect.php'; // include the library for database connection
	
	$score = $_GET['score'];
	
	$student_id = $_SESSION['student_id'];
	$quiz_id = $_SESSION['quiz_id'];
	$quiz_type = $_SESSION['quiz_type'];
	
	
	$sql = "INSERT INTO Quiz_History (student_id, quiz_id, quiz_type, score)
            VALUES ('" . $student_id . "','" . $quiz_id . "','" . $quiz_type . "','" . $score . "')";
	
	if(mysql_query($sql)){
		echo "<Strong>Your Score is Recorded Successfully</Strong>";
	}
	
?>