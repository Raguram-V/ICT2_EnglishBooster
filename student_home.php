<?php
session_start();
include 'connect.php';
if(isset($_SESSION['student_email'])) {
	$email = $_SESSION['student_email'];

	$query = mysql_query("SELECT student_name, student_id FROM Student WHERE student_email ='" . $email . "'"); 
	$num_rows = mysql_num_rows($query); // Get the number of rows
		if($num_rows > 0){ // If no users exist with posted credentials print 0 like below.
			$fetch = mysql_fetch_array($query);
			$student_name = $fetch['student_name'];
			$_SESSION['student_id'] = $fetch['student_id'];
		}

}else {
	header('Location: index.php');
}
?>

<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- link rel="icon" href="../../favicon.ico"-->

    <title>Lecture Videos</title>

    <!-- Bootstrap core CSS -->
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
	
	<style>
		#player{
			margin-left:200px;
			margin-right:200px;
		}
		
		
		.i:hover{
			 border:1px solid #021a40;
			 cursor: pointer;
			 
			-webkit-transform:scale(1.15); /* Safari and Chrome */
			-moz-transform:scale(1.15); /* Firefox */
			-ms-transform:scale(1.15); /* IE 9 */
			-o-transform:scale(1.15); /* Opera */
			 transform:scale(1.15);
		}
		
	</style>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="script/carousel_script.js"></script>
	<script>
		$(document).ready(function(){
			$(".i").click(function(){
				window.location.assign($(this).attr("alt") + '.php');
			});
			
			$('#log-out').click(function(){
				window.location.assign('log_out.php');
			});
		});
		
		
	</script>
    <link href="css/carousel.css" rel="stylesheet">
	
  </head>
  
  <body>
    <div class="navbar-wrapper">
      <div class="container">
            <nav class="navbar navbar-inverse navbar-static-top">
              <div class="container">
                <div class="navbar-header" >
                  <a class="navbar-brand" href="#">
                    <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                    &nbsp;Home
                  </a>
                </div>
				<img src = 'images/logo.jpg' width='400px' height='60px' style="margin-left:250px;margin-right:100px;float:left;border-radius:10px">
                <h3 style="text-align:right;color:#FFF;">
	                <I>Welcome <?php echo $student_name; ?></I>
                </h3>
              </div>
            </nav>
        </div>
      </div>
	  
	  <div class="container">
			<button type="button" class="btn btn-default btn-lg" style="float:right;display:block;margin-top:100px" id='log-out'>
					<span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Log Out
			</button>
	  </div>
	  
	  
    <div>
		<div class="container">
			<div class="row">
			  <div class='col-sm-6 col-md-4'>
				  <div class='caption'><h3><I><U>Lecture Videos</U></I></h3></div>
				  <img width = '242px' height='200px' src='images/lecture_videos.jpg' alt='LectureVideos' class='i'>
			  </div>
			  
			  <div class='col-sm-6 col-md-4'>
				  <div class='caption'><h3><I><U>Take Quiz</U></I></h3></div>
				  <img width = '242px' height='200px' src='images/quiz.jpg' alt='quiz_menu' class='i'>
			  </div>
			  
			  <div class='col-sm-6 col-md-4'>
				  <div class='caption'><h3><I><U>Announcements</U></I></h3></div>
				  <img width = '242px' height='200px' src='images/Announcements.jpg' alt='announcement' class='i'>
			  </div>
			  
			  <div class='col-sm-6 col-md-4'>
				  <div class='caption'><h3><I><U>Performance</U></I></h3></div>
				  <img width = '242px' height='200px' src='images/performance.jpg' alt='performance' class='i'>
			  </div>
			</div>
			
			<footer style="position: relative;bottom: 0;background-color:#f5f5f5;width=100%;">
				<p class="pull-right"><a href="#">Back to top</a></p>
			</footer>
		</div><!-- /.container -->
	</div>
	
	

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="script/bootstrap.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <!-- script src="../../assets/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!-- script src="../../assets/js/ie10-viewport-bug-workaround.js"></script-->
  </body>
</html>


				


