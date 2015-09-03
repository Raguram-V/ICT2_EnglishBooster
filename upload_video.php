<html>
  <head>
    <title>Upload Video</title>

    <!-- Bootstrap core CSS -->
	<!-- Latest compiled and minified CSS -->
	
	 
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://bootsnipp.com/dist/bootsnipp.min.css">

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
                    &nbsp;Make Quiz
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
			<form style="margin-left:100px;margin-right:100px" class='form-horizontal'>
				  <div class="form-group" >
					<label for="exampleInputEmail1">Video Caption</label>
					<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Caption for the Lecture Video">
				  </div>
				  <div class="form-group">
					<label for="exampleInputPassword1">Video Description</label>
					<input type="text" class="form-control" id="exampleInputPassword1" placeholder="Description for the Video">
				  </div>
				  <div class="form-group">
					<label for="exampleInputPassword1">Video URL</label>
					<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Youtube URL of the Video">
				  </div>
				  <div class="form-group">
					<label for="exampleInputFile" style="display:inline;float:left">Video Image&nbsp;&nbsp;</label>
					<input type="file" id="exampleInputFile">
				  </div>
				  <div class="form-group">
					<button type="submit" style="display:block" class="btn btn-default">Upload Video</button>
				  </div>
			</form>
        </div>
		
	</body>
</html>