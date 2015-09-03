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

		$q = mysql_query('SELECT video_caption,video_description,video_link,video_thumbnail FROM Lecture_Videos order By uploaded_date desc Limit 10'); 
		
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
			
			$('#home').click(function(){
				window.location.assign('student_home.php');
			});
			
			$('#log-out').click(function(){
				window.location.assign('log_out.php');
			});
			
			$(".i").click(function(){
				var w = 700;
				var h = 345;
				$("#player").attr("width",w);
				$("#player").attr("height",h);
				$("#player").attr("src",$(this).attr("alt"));
				$("#player").attr("style","margin-bottom:50px");
				$("#search").attr("style","margin-bottom:50px");	
			});
			
			$('#Search').click(function(){
				$("#player").attr("width",'0px');
				$("#player").attr("height",'0px');
				var vSearch = $('#VideoSearch').val();
					if(vSearch != '') {
						  $.ajax({
						  type: "GET",
						  url: 'search_videos.php?video_string=' + vSearch,
						  success: function(dat){
							 var obj = $.parseJSON(dat);
							 if(obj != null){
								$('.col-sm-6').each(function(){
									$(this).html('');
								});
								var str = "<div class='col-sm-6 col-md-4'>";
								$.each(obj,function() {
									str = str + "<img width = '242px' height='200px' src='" + this['video_thumbnail'] + "' alt = '" + this['video_link'] + "' class = 'i'>";
									str = str + "<div class='caption'>";
									str = str + "<h3>" + this['video_caption'] + "</h3>";
									str = str + "<p>"  + this['video_description'] + "</p>";
									str = str + "</div>";
									str = str + "</div>";
							    }); 
								$('.row').html(str);
								$(".i").click(function(){
									var w = 700;
									var h = 345;
									$("#player").attr("width",w);
									$("#player").attr("height",h);
									$("#player").attr("src",$(this).attr("alt"));
									$("#player").attr("style","margin-bottom:50px");
									$("#search").attr("style","margin-bottom:50px");	
								});
							 }else {
								 showError('No Videos Found');
							 }
						  }
						});
					}else {
						showError('Please Enter part of a Video Name');
					}
			});	
		});
		
		function showError(strmsg){
		 $('#error').css('margin-top','20px');
		 $('#error').css('display','block');
		 $('#errorText').text(strmsg);
		}
		
		
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
                  <a class="navbar-brand" href="quiz_menu.php" data='Quiz'>
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
	
	<div class="input-group" id="search">
	  <span class="input-group-addon" id="basic-addon1">
		<span id="Search" class="glyphicon glyphicon-search" aria-hidden="true"></span>
	  </span>
	  <input type="text" id="VideoSearch" class="form-control" placeholder="Search For Lecture Videos" aria-describedby="basic-addon1">
	  </br>
	</div>
	
	<div class="alert alert-danger" role="alert" style='display:none' id='error'>
	  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
	  <span id='errorText'></span>
	</div>
	
	<iframe width="0" height="0" src=""
			 id="player" align="center-left">
	</iframe>
	</br>
	
	<div class="row">
	  <?php
		while($row = mysql_fetch_array($q)){
		
			echo "<div class='col-sm-6 col-md-4'>";
			echo "<img width = '242px' height='200px' src='" . $row['video_thumbnail'] . "' alt='" . $row['video_link']  . "' class='i'>";
			echo "<div class='caption'>";
			echo "<h3>" .$row['video_caption']. "</h3>";
			echo "<p>".$row['video_description'] . "</p>";
			echo "</div>";
			echo "</div>";
		}
	  ?>
	</div>
	
      <!-- FOOTER -->
      <footer>
        <p class="pull-right"><a href="#">Back to top</a></p>
      </footer>

    </div><!-- /.container -->
	

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


				


