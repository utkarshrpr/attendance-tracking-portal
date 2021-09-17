<?php
	session_start();
if(!isset($_SESSION['id'])){
	header("Location:index.php");
}




	include("connection.php");
	$query="SELECT diary FROM  users WHERE id='".$_SESSION['id']."' LIMIT 1";
	$result=mysqli_query($link,$query);
	$row=mysqli_fetch_array($result);
	$diary=$row['diary'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Secret Diary</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<style>
		.navbar-brand {
			font-size:1.8em;
		}
		#topcontainer {
			background-image:url("desktop.jpg");
			width:100%;
			background-size:cover;
		}
		.container {
			background-size:cover;
		}
		#toprow {
			margin-top:80px;
			text-align:center;
		}
		#toprow h1 {
			font-size:300%;
		}
		.bold {
			font-weight:bold;
		}
		.margintop {
			margin-top:30px;
			
		}
		.center {
			text-align:center;
		}
		.title {
			margin-top:100px;
			font-size:300%;
		}
		#footer {
			background-color:#4C9ED9;
			padding-top:70px;
			width:100%;
		}
		.marginbottom {
			margin-bottom:30px;
		}
		.android {
			width:250px;
		}
		.am {
			background-color:#F8F8F8;
			border-radius:10px;
		}
		.an {
			margin-bottom:10px;
		}
	</style>
  </head>
	<div class="navbar navbar-default navbar-fixed-top">
	<div class="container">
		<div class="navbar-header pull-left">
			<a href="" class="navbar-brand">Secret Diary</a>
			
		</div>
		<div class="pull-right">
			<ul class="navbar-nav nav">
			<li><a href="index.php?logout=1">Log Out</a></li>
			</ul>
		</div>
	</div>
	</div>
	<div class="container contentcontainer" id="topcontainer">
		<class="row">
			<div class="col-md-6 col-md-offset-3 " id="toprow">
				<textarea class="form-control"><?php echo $diary;?></textarea>
				
			</div>
		</div>
	</div>
	

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="jquery-2.1.3.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	<script>
	
	$(".contentcontainer").css("min-height",$(window).height());
	$("textarea").css("height",$(window).height()-110);
	$("textarea").keyup(function(){
		//ajax shows reconnect error
		$.post("updatediary.php",{diary:$("textarea").val()});
	
	
	});
	
	
	</script>
  </body>
</html>