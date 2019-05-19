<?php 
//includes the file process.php
include('process.php') ?>
<?php  
	 if(isset($_SESSION['username']))//session_start();								
		{
	 	 	header("location: heart.php");//checks sesison has value if no value redirects to login page.
		}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
   	<link rel="stylesheet" href="css/bootstrap-select.css">
  	<link rel="stylesheet" href="css/font-awesome.min.css">
   	<script type="text/javascript" src="js/jquery-1.11.3-jquery.min.js"></script>
   	<script type="text/javascript" src="js/jquery.min.js"></script>
	<link href="style4.css" type="text/css" rel="stylesheet">
	<link href="style1.css" type="text/css" rel="stylesheet">
</head>
<body>
	<div class="top">
		
	</div>
	
	<div class="logo">
		<div>
			<table>
				<tr>
					<td width="600px" style="font-size:50px;font-family:forte;"> <font color="#428bca">HeartRisk</font><font color="#000">Predictor</font> </td>
				</tr>
			</table>
		</div>
	</div>

	<div class="container">
		<img src="admin.png">
		<?php include("error.php") ?>
		<form action="" method="POST" onsubmit="return validation()">
			<p style="color: green">The username and password is admin, admin</p>
			<p>Username</p><input type="text" name="uname" placeholder="Enter username" id="username" autocomplete="off"><br><br>
			<span id="usern" style="color: red;font-size:15px;"></span>
			<p>Password</p><input type="password" name="pword" placeholder="Enter password" id="password" autocoplete="off"><br><br>
			<span id="pwd" style="color: red;font-size:15px;"></span>
			<input type="submit" name="btnlogin" value="login">
		</form>
	</div>
</div>
			
			<script type="text/javascript">
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