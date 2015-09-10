<?php
	session_start();
	include 'connect.php';

	//header('Location: index.php');

?>


<html>
  <head>
    <title>Make Quiz</title>

    <!-- Bootstrap core CSS -->
	<!-- Latest compiled and minified CSS -->
	
	 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <!-- Bootstrap core CSS -->
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    
    
	<script>
		$(document).ready(function(){
			var res = "s|";
			var ques_num = 0;
			
			$('#q_lbl').html(ques_num + 1 + '.Question');
			
			$('#add').click(function(e){
				e.preventDefault();
				
				collectFormValues();
				ques_num = ques_num + 1;
					if (ques_num <= 3) {
						$('#q_lbl').html(ques_num + 1 + '.Question');
						$('#q_info').html('Question ' + ques_num + ' is Recorded Successfully') ;
						$('#q_info').css('display','block');
						resetForm();
					}else {
						$('#q_info').html('Please Upload Quiz..') ;
						$('#q_info').css('display','block');
						$('#q_info').css('background-color','yellow');
					}
			});
			
			$('#quiz').on('submit',function(e){
				alert(ques_num + '');
				if(ques_num < 2){
					e.preventDefault();
					$('#q_info').html('Enter 3 Questions to make a Quiz') ;
					$('#q_info').css('display','block');
					$('#q_info').css('background-color','yellow');
					
					collectFormValues();
					ques_num = ques_num + 1;
					$('#q_lbl').html(ques_num + 1 + '.Question');
					resetForm();
				}
			});
			
			function resetForm(){
				$('#qn').val('');
				$('#op1').val('');
				$('#op2').val('');
				$('#op3').val('');
				$('#op4').val('');
				
				$('#val1').val('');
				$('#val2').val('');
				$('#val3').val('');
				$('#val4').val('');
			}
			
			function collectFormValues(){
				
				var q = $('#qn').val();
				var op_1 = $('#op1').val();
				var op_2 = $('#op2').val();
				var op_3 = $('#op3').val();
				var op_4 = $('#op4').val();
				
				var val_1 = $('#val1').val();
				var val_2 = $('#val2').val();
				var val_3 = $('#val3').val();
				var val_4 = $('#val4').val();
				
				res = res + q + ',' + op_1 + ',' + val_1 + ',' + op_2 + ',' + val_2 + ',' + op_3 + ',' + val_3 + ',' + op_4 + ',' + val_4 + '|';
				
				$('#quiz_data').val(res);
			}
			
		});
	</script>
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
		
	<div class="container">
		<h2 style="margin-left:30%;margin-right:30%;text-align:center">Quiz Template<h2>
		<h3 style='display:none' id='q_info'></h3>
		<form style="margin-left:100px;margin-right:100px;" class='form-horizontal' id='quiz' action="upload_quiz.php" method='post'>
		    
			<div class="form-group" >
				<label for="exampleInputEmail1">Quiz Type:</label>
				<select class="form-control" id="testType" name="testType" required>
				  <option value="Adjectives" selected="Selected">Adjectives</option>
				  <option value="Adverbs">Adverbs</option>
				  <option value="Articles">Articles</option>
				  <option value="Prepositions">Preposition</option>
				  <option value="Sentence Structure">Sentence Structure</option>
				</select>
			</div>
				  
			<div class="form-group">
				<label for="exampleInputPassword1" id='q_lbl'></label>
				<input type="text" class="form-control" id="qn" placeholder="Question 1">
			</div>
		  
			<div class="form-group">
				<label for="exampleInputPassword1">Option 1</label>
				<input type="text" class="form-control" id="op1" placeholder="Enter option 1">
			</div>
			
			<div class="form-group">
				<label for="exampleInputPassword1">Value 1</label>
				<input type="text" class="form-control" id="val1" placeholder="Enter True or False">
			</div>
		  
			<div class="form-group">
				<label for="exampleInputPassword1">Option 2</label>
				<input type="text" class="form-control" id="op2" placeholder="Enter option 2">
			</div>
			
			<div class="form-group">
				<label for="exampleInputPassword1">Value 2</label>
				<input type="text" class="form-control" id="val2" placeholder="Enter True or False">
			</div>
		  
			<div class="form-group">
				<label for="exampleInputPassword1">Option 3</label>
				<input type="text" class="form-control" id="op3" placeholder="Enter option 3">
			</div>
		  
			<div class="form-group">
				<label for="exampleInputPassword1">Value 3</label>
				<input type="text" class="form-control" id="val3" placeholder="Enter True or False">
			</div>
			
			<div class="form-group">
				<label for="exampleInputPassword1">Option 4</label>
				<input type="text" class="form-control" id="op4" placeholder="Enter option 4">
			</div>
		  
			<div class="form-group">
				<label for="exampleInputPassword1">Value 4</label>
				<input type="text" class="form-control" id="val4" placeholder="Enter True or False">
			</div>
			
			
			<input id="quiz_data" name ='q_data' style='display:none'>
			
			<div style='margin-left:200px;margin-right:200px;text-align:center'>
				<div style='display:inline'>
					<button class="btn btn-success" id='add'>Add Question</button>
				</div>
				
				<div style='display:inline'>
					<button type="submit"  class="btn btn-success" id='submit_quiz'>Upload Quiz</button>
				</div>
			</div>
		</form>
      </div>
		
	</body>
</html>
