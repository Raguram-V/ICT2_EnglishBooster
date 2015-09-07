<?php
	
	session_start();
	include 'connect.php'; // include the library for database connection
	
	$quiz_type = $_GET['quiz_type'];

	$query = mysql_query('SELECT quiz_id FROM Quiz WHERE quiz_type = "'.$quiz_type.'"');
	
	$num_rows = mysql_num_rows($query); // Get the number of rows
	if($num_rows <= 0){ // If no users exist with posted credentials print 0 like below.
		echo 0;
	} else {
		$fetch = mysql_fetch_array($query);
		$quiz_id = $fetch['quiz_id'];
		$quiz_query = mysql_query('SELECT * FROM Q_A WHERE quiz_id = "'.$quiz_id.'"');
		
		$questions_rows = mysql_num_rows($quiz_query); // Get the number of rows
		
		if($questions_rows > 0) {
			echo '<?xml version="1.0" encoding="utf-8"?>';
			echo '<QUIZ>';
			while($row = mysql_fetch_array($quiz_query)){
				echo '<QUESTION a1="' .$row['Option_1'] . '" a2 = "' . $row['Option_2'] . '" a3 = "' . $row['Option_3'] . '" a4 = "' .$row['Option_4'].'" v1 = "' .$row['Value_1']. '" v2 = "' .$row['Value_2']. '" v3 = "' .$row['Value_3']. '" v4 = "' .$row['Value_4']. '">';
				echo $row['question'] . '</QUESTION>';
			}
			echo '</QUIZ>';
		}
	}

?>