<?php
	session_start();
	include 'connect.php';
	
		$student_id = 1001;
		$str = "SELECT quiz_id, value FROM Quiz_History WHERE student_id = '" . $student_id . "'";
		$query = mysql_query($str); 
		
		$num_rows = mysql_num_rows($query); // Get the number of rows
		
			if($num_rows > 0){ // If no users exist with posted credentials print 0 like below.
				$prefix = '';
				echo "[\n";
				while ( $row = mysql_fetch_assoc($query) ) {
				  echo $prefix . " {\n";
				  echo '  "Quiz": "' . "Ajct_" . $row['quiz_id'] . '",' . "\n";
				  echo '  "value": ' . $row['value'] . "\n";
				  echo " }";
				  $prefix = ",\n";
				}
				echo "\n]";
			}
?>
