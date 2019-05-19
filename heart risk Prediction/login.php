<?php include('process.php') ?><!--includes the file process.php-->

<?php  
	 if(isset($_SESSION['username']))//session_start();								
		{
	 	 	header("location: heart.php");//checks sesison has value if no value redirects to login page.
		}
?>

<!DOCTYPE html>
<html>
<head>
	<title>login form</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
   	<link rel="stylesheet" href="css/bootstrap-select.css">
  	<link rel="stylesheet" href="css/font-awesome.min.css">
  	<script type="text/javascript" src="js/jquery-1.11.3-jquery.min.js"></script>
   	<script type="text/javascript" src="js/jquery.min.js"></script>
	<link rel="stylesheet" href="css/style.css">
	<link href="style4.css" type="text/css" rel="stylesheet">
</head>

<body>
	<div class="top"></div>	
	<div class="logo">
		<div>
			<table>
				<tr>
					<td width="600px" style="font-size:50px;font-family:forte;"> <font color="#428bca">HeartRisk</font><font color="#000">Predictor</font> </td>
				</tr>
			</table>
		</div>
	</div>
	
	<div class="imag">
		<div style="background-image:url('image.jpg');">
	</div>

	<div class="modal-dialog text-center">
		<div class="col-sm-9 main-section">
			<div class="modal-content">
				<div class="col-12 user-img">
					<img src="users.png">
				</div>

				<div class="col-12 form-input"><!--- form is posted to same page, and the method is post -->
					<form method="post" action= '' onsubmit="return validation()">
						<div class="form-group">
							<div style="color: #fff;"><?php include('error.php'); ?></div>
						</div>
						<br>
						
						<div class="form-group">
							<input type="text"  name="uname" id="username" placeholder="Enter Username" autocomplete="off">
							<span id="usern"  style="color: red;font-size:18px; "></span>
						</div>
						
						<div class="form-group" >
							<input type="password" name="pword" id="password" placeholder="Enter Password" autocomplete="off">
							<span id="pwd" style="color: red;font-size:18px;"></span>
						</div>

						<button type="submit" class="btn btn-success" name="login">Login</button>
					</form>
				</div>
				<div class="col-12 forget">
					<a href="registration.php">Register as new user</a>
				</div>

			</div>
		</div>
	</div>

			<script type="text/javascript">//client side validation for the form
				function validation(){
					var user = document.getElementById("username").value;
					var pass = document.getElementById("password").value;
					if(user==""){
						document.getElementById("usern").innerHTML="**Please enter your username";
						return false;
					}
					if(pass==""){
						document.getElementById("pwd").innerHTML="**Please enter your password";
						return false;
					}
				}
			</script>
</body>
</html>