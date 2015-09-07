<?php
	
	session_start();
	include 'connect.php'; // include the library for database connection
	
	$quiz_type = $_GET['quiz_type'];
	$_SESSION['quiz_type'] = $quiz_type;
	
	$query = mysql_query("SELECT quiz_id FROM Quiz WHERE quiz_type ='" . $quiz_type. "'"); 
	$n_rows = mysql_num_rows($query); // Get the number of rows
	if($n_rows > 0){ // If no users exist with posted credentials print 0 like below.
		$fetch = mysql_fetch_array($query);
		$_SESSION['quiz_id'] = $fetch['quiz_id'];
	}

	if ($quiz_type == 'Adjectives'){
			$flash_file = "Adjectives/quiz.swf";
	}else if ($quiz_type == 'Adverbs'){
		    $flash_file = "Adverbs/quiz.swf";
	}else if ($quiz_type == 'Articles'){
		    $flash_file = "Articles/quiz.swf";
	}else if ($quiz_type == 'Prepositions'){
		    $flash_file = "Preposition/quiz.swf";
	}else if ($quiz_type == 'Sentence'){
		    $flash_file = "Articles/quiz.swf";
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

    <title>Take Quiz</title>

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
                  <a class="navbar-brand" href="student_home.php" id='home'>
                    <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                    &nbsp;Home
                  </a>
                </div>
				<img src = 'images/logo.jpg' width='400px' height='60px' style="margin-left:250px;margin-right:100px;float:left;border-radius:10px">
                <h3 style="text-align:right;color:#FFF;">
	                <I>Welcome <?php echo $_SESSION['student_name']; ?></I>
                </h3>
              </div>
            </nav>
        </div>
      </div>
	
	  
	  
	  <div style="margin-top:100px">
      <div class="container">
            <nav class="navbar navbar-inverse navbar-static-top">
              <div class="container">
                <div class="navbar-header" >
                  <a class="navbar-brand" href="quiz.php" data='Quiz'>
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    &nbsp;Take Quiz
                  </a>
				  <a class="navbar-brand" href="performance.php" data='Perform'>
                    <span class="glyphicon glyphicon-stats" aria-hidden="true"></span>
                    &nbsp;Performance
                  </a>
				  <a class="navbar-brand" href="announcement.php" data='Videos'>
                    <span class="glyphicon glyphicon-bullhorn" aria-hidden="true"></span>
                    &nbsp;Announcements
                  </a>
                </div>
				 <button type="button" class = "btn btn-default btn-lg" id='log-out' style="padding-left:5px;padding-right:5px;padding-top:2px;padding-bottom:2px;position:relative;float:right;margin-right:20px;margin-top:10px;margin-bottom:10px;">
					<span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Log Out
				</button>
              </div>
            </nav>
        </div>
      </div>
		
	  <div class="container">
		<p style="text-align:center">
			<iframe width="550" height="412px" src= <?php echo '"' . $flash_file . '"'; ?> align="center"></iframe>
		</p>
		<!-- FOOTER -->
		  <footer>
			<p class="pull-right"><a href="#">Back to top</a></p>
		  </footer>
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


				


