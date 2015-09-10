<html>
  <head>
    <title>Upload Video</title>

    <!-- Bootstrap core CSS -->
	<!-- Latest compiled and minified CSS -->
	
	 
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://bootsnipp.com/dist/bootsnipp.min.css">

	<style>
		
	</style>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="script/carousel_script.js"></script>
	<script>
		$(document).ready(function(){
			var res = $('#q_values').text();
			$('#add').click(function(e){
				e.preventdefault();
				var qn = $('#qn').text();
				var ca = $('#ca').text();
				var wa1 = $('#wa1').text();
				var wa2 = $('#wa2').text();
				var wa3 = $('#wa3').text();
				var wa4 = $('#wa4').text();
				
				res = res + ca + wa1 + wa2 + wa3 + wa4;
				
				$('#q_values').html(res);
				
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
					  <a class="navbar-brand" href="#" id='home'>
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
	  
    <div class="container" style="margin-top:25px">
        <nav class="navbar navbar-inverse navbar-static-top">
            <div class="container">
                <div class="navbar-header" >
					  <a class="navbar-brand" href="quiz.php" data='Quiz'>
						<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
						&nbsp;Make Video
					  </a>
					  
					  <a class="navbar-brand" href="performance.php" data='Perform'>
						<span class="glyphicon glyphicon-stats" aria-hidden="true"></span>
						&nbsp;Check Performance
					  </a>
					  
					  <a class="navbar-brand" href="announcement.php" data='Videos'>
						<span class="glyphicon glyphicon-bullhorn" aria-hidden="true"></span>
						&nbsp;Make Announcements
					  </a>
                </div>
				
				<button type="button" class = "btn btn-default btn-lg" id='log-out' style="padding-left:5px;padding-right:5px;padding-top:2px;padding-bottom:2px;position:relative;float:right;margin-right:20px;margin-top:10px;margin-bottom:10px;">
					<span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Log Out
				</button>
            </div>
        </nav>
	</div>
		
	<div class="container" style="margin-top:100px">
		<form style="margin-left:100px;margin-right:100px;" class='form-horizontal'>
		    <div>   
				<div class="form-group" >
					<label for="exampleInputEmail1">Quiz Type:</label>
					<select class="form-control" id="userType" name="usertype" required>
					  <option value="student" selected="Selected">A1</option>
					  <option value="teacher">A2</option>
					  <option value="parent">A3</option>
					</select>
				</div>
					  
				<div class="form-group">
					<label for="exampleInputPassword1">1. Question</label>
					<input type="text" class="form-control" id="qn" placeholder="Question 1">
				</div>
			  
				<div class="form-group">
					<label for="exampleInputPassword1">Correct Answer</label>
					<input type="text" class="form-control" id="ca" placeholder="Enter the Correct Answer">
				</div>
			  
				<div class="form-group">
					<label for="exampleInputPassword1">Wrong Answer 1</label>
					<input type="text" class="form-control" id="wa1" placeholder="Enter Wrong Answer 1">
				</div>
			  
				<div class="form-group">
					<label for="exampleInputPassword1">Wrong Answer 2</label>
					<input type="text" class="form-control" id="wa2" placeholder="Enter Wrong Answer 2">
				</div>
			  
				<div class="form-group">
					<label for="exampleInputPassword1">Wrong Answer 3</label>
					<input type="text" class="form-control" id="wa3" placeholder="Enter Wrong Answer 3">
				</div>
					  
				<div class="form-group">
					<label for="exampleInputPassword1">Wrong Answer 4</label>
					<input type="text" class="form-control" id="wa4" placeholder="Enter Wrong Answer 4">
				</div>
			</div>
		 
		    <div class="form-group">
				<button style="display:block" class="btn btn-primary" id='add'>Add Question</button>
		    </div>
		 
		    <div class="form-group">
				<button type="submit" style="display:block" class="btn btn-success">Upload Quiz</button>
		    </div>
			
			<div class="form-group">
				<p id='q_values'></p>
		    </div>
		 
		</form>
      </div>
		
	</body>
</html>
