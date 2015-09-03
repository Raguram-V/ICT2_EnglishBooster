<?php
	session_start();
	include 'connect.php'; // include the library for database connection
	
	if(isset($_SESSION['student_email'])) {
		$email = $_SESSION['student_email'];
		$query = mysql_query("SELECT student_name FROM Student WHERE student_email ='" . $email . "'"); 
		$n_rows = mysql_num_rows($query); // Get the number of rows
		if($n_rows > 0){ // If no users exist with posted credentials print 0 like below.
			$fetch = mysql_fetch_array($query);
			$student_name = $fetch['student_name'];
		}
		
		$q = mysql_query('SELECT annt_title,annt_description FROM Announcements order By annt_date desc Limit 5'); 
		$num_rows = mysql_num_rows($q); // Get the number of rows
		if($num_rows <= 0){ // If no users exist with posted credentials print 0 like below.
			$flag = false;
		} else {
			$flag = true;
		}
	}else {
		header('Location: index.php');
	}
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
    <link rel="icon" href="../../favicon.ico">

    <title>Announcements</title>

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
   <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    
	<!-- Bootstrap core CSS -->
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

    <!-- Custom styles for this template -->
    <link href="css/carousel.css" rel="stylesheet">
	
	<script>
		$(document).ready(function(){
			
			$('#home').click(function(){
				window.location.assign('student_home.php');
			})
			
			$('#log-out').click(function(){
				window.location.assign('log_out.php');
			});
			
		});
	
	</script>
  </head>
<!-- NAVBAR
================================================== -->
  <body>
    <div class="navbar-wrapper">
      <div class="container">
            <nav class="navbar navbar-inverse navbar-static-top">
              <div class="container">
                <div class="navbar-header" >
                  <a class="navbar-brand" href="student_home.php" id='home'>
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
		
		
		<div class="container">
            <nav class="navbar navbar-inverse navbar-static-top">
              <div class="container">
                <div class="navbar-header" >
                  <a class="navbar-brand" href="quiz_menu.php" data='Quiz'>
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    &nbsp;Take Quiz
                  </a>
				  <a class="navbar-brand" href="performance.php" data='Perform'>
                    <span class="glyphicon glyphicon-stats" aria-hidden="true"></span>
                    &nbsp;Performance
                  </a>
				  <a class="navbar-brand" href="LectureVideos.php" data='Videos'>
                    <span class="glyphicon glyphicon-facetime-video" aria-hidden="true"></span>
                    &nbsp;Videos
                  </a>
                </div>
				 <button type="button" class = "btn btn-default btn-lg" id='log-out' style="padding-left:5px;padding-right:5px;padding-top:2px;padding-bottom:2px;position:relative;float:right;margin-right:20px;margin-top:10px;margin-bottom:10px;">
					<span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Log Out
			     </button>
              </div>
			 
            </nav>
        </div>
		
      </div>
	  
	  
    <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
		<li data-target="#myCarousel" data-slide-to="3"></li>
		<li data-target="#myCarousel" data-slide-to="4"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
			<?php
				if($flag){
					$i = 1;
					while($row = mysql_fetch_array($q)){
						if ($i == 1){
							echo '<div class="item active">';
						}else {
							echo '<div class="item">';
						}
						echo '<div class="container">';
						echo '<div class="carousel-caption">';
						echo '<h1>' . $row['annt_title'] . '</h1>';
						echo '<p>' . $row['annt_description'] . '</p>';
						echo '</div>';
						echo '</div>';
						echo '</div>';
						$i = $i + 1;
					}
				}
			?>
      </div>
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div><!-- /.carousel -->

      <!-- FOOTER -->
      <footer>
        <p class="pull-right"><a href="#">Back to top</a></p>
      </footer>

    </div><!-- /.container -->


    
    
  </body>
</html>
