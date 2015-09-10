<?php
	session_start();
	include 'connect.php';
	$quizType = $_POST['testType'];
	$str = $_POST['q_data'];
	$arr = explode("|",ltrim($str));
	$query = mysql_query("SELECT quiz_id FROM Quiz WHERE quiz_type ='" . $quizType . "'"); 
	$num_rows = mysql_num_rows($query); // Get the number of rows
	
	if($num_rows > 0){ // If no users exist with posted credentials print 0 like below.
		$fetch = mysql_fetch_array($query);
		$quiz_id = $fetch['quiz_id'];
		$quiz_id = $quiz_id + 1;
		$upQry = "UPDATE Quiz SET quiz_id = '" . $quiz_id . "' WHERE quiz_type = '" . $quizType . "'";
		
		if(mysql_query($upQry)){
			for($x=1;$x<count($arr)-1;$x++){
			   $innerArr = explode(",",ltrim($arr[$x]));
			   $sql = "INSERT INTO Q_A (question, Option_1, Value_1,Option_2,Value_2, Option_3,Value_3, Option_4,Value_4,quiz_id)
					VALUES ('" . $innerArr[0]. "','" . $innerArr[1] . "','" . $innerArr[2] . "','" . $innerArr[3] . "','" . $innerArr[4] ."','" . $innerArr[5] . "','". $innerArr[6] . "','" . $innerArr[7] . "','" . $innerArr[8] . "'," . $quiz_id . ")";
					if(mysql_query($sql)){
						echo "<Strong>Quiz Uploaded Successfully</Strong>";
					}else {
						echo "<Strong>Issue in Uploading Quiz</Strong>";
					}
			}
		}else {
			echo "Issue in UPDATE";
		}
	}
?>