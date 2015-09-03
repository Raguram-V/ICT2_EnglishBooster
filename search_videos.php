<?php

	include 'connect.php'; // include the library for database connection
	$search_video = $_GET['video_string'];
	$str = "SELECT video_caption,video_description,video_link,video_thumbnail FROM Lecture_Videos where video_caption like '%" . $search_video . "%' order By uploaded_date desc Limit 10";
	
	$q = mysql_query($str);
	
	$num_rows = mysql_num_rows($q); // Get the number of rows
	if($num_rows >= 1){  // If no users exist with posted credentials print 0 like below.
		while($row = mysql_fetch_assoc($q)){
			$res [] = $row;
		}
	}
	echo json_encode($res);
?>


