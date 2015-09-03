<?php
	session_start();
	include 'connect.php'; // include the library for database connection
	
	$score = $_GET['score'];
	/*
	$student_id = $_SESSION['student_id'];
	$quiz_id = $_SESSION['quiz_id'];
	$quiz_type = $_SESSION['quiz_type'];
	*/
	
	$student_id = '1009';
	$quiz_id = 'as1';
	$quiz_type = 'verb';
	
	
	$sql = "INSERT INTO Quiz_History (student_id, quiz_id, quiz_type, score)
            VALUES ('" . $student_id . "','" . $quiz_id . "','" . $quiz_type . "','" . $score . "')";
	
	$query = mysql_query($sql); 
	
?>