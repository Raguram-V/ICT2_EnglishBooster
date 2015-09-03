<?php
	
	session_start();
	$student_name = $_SESSION['student_name'];
	
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

    <title>Quiz Menu</title>

    <!-- Bootstrap core CSS -->
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
	
	<style>
		
	</style>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="script/carousel_script.js"></script>
	
	
	
	<script>
		
		
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
	                <I>Welcome <?php echo $student_name; ?></I>
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
                  <a class="navbar-brand" href="LectureVideos.php" data='Quiz'>
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    &nbsp;Lecture Videos
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
		<div class="row">
			<div class="col-sm-6 col-md-4">
				<div class="thumbnail">
					<a href="take_quiz.php?quiz_type=Adjectives"><img src="images/adjectives.jpg" alt="Adjectives"></a>
					<div class="caption">
						<h3>Adjectives Quiz</h3>
					</div>
				</div>
			</div>
			
			<div class="col-sm-6 col-md-4">
				<div class="thumbnail">
					<a href="take_quiz.php?quiz_type=Adverbs"><img src="images/verb.jpg" alt="Adverb"></a>
					<div class="caption">
						<h3>Adverb Quiz</h3>
					</div>
				</div>
			</div>
			
			<div class="col-sm-6 col-md-4">
				<div class="thumbnail">
					<a href="take_quiz.php?quiz_type=Sentence"><img src="images/sen_structure.jpg" alt="Sentence Structure"></a>
					<div class="caption">
						<h3>Sentence Structure Quiz</h3>
					</div>
				</div>
			</div>
		</div>
		
		
		  <!-- FOOTER -->
		  <footer>
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


				


