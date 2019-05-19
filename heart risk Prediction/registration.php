<?php include('process.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration form</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
   <link rel="stylesheet" href="css/bootstrap-select.css">
   <link rel="stylesheet" href="css/font-awesome.min.css">
   <script type="text/javascript" src="js/jquery-1.11.3-jquery.min.js"></script>
   <script type="text/javascript" src="js/jquery.min.js"></script>
   <link rel="stylesheet" href="style4.css">
   	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="top">
		<div>
		 
		</div>
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
	
	<div class="row centered-form">
		<div class="col-lg-6 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h5 class="panel-title">Register Here</h5>
				</div>
				<div class="panel-body">
					<form role="form" method="post" action="" onsubmit="return validation()">
						<?php include('error.php'); ?>
						<div class="row">
							<div class="col-xs-6 col-sm-6 col-md-6">
								<div class="form-group">
									<input type="text" name="first_name" value = "<?php if(isset($_POST['first_name'])){ echo $_POST['first_name'];} ?>" class="form-control input-sm"  id="fname" placeholder="First Name" autocomplete="off">
									<span id="f_name" style="color: red;font-size:18px;"></span>
								</div>
							</div>
							<div class="col-xs-6 col-sm-6 col-md-6">
								<div class="form-group">
									<input type="text" name="last_name" value = "<?php if(isset($_POST['last_name'])){ echo $_POST['last_name'];} ?>"  class="form-control input-sm" id="lname" placeholder="Last Name" autocomplete="off">
									<span id="l_name" style="color: red;font-size:18px;"></span>
								</div>
							</div>
							
						</div>
						<div class="form-group">
							<input type="text" name="address" value = "<?php if(isset($_POST['address'])){ echo $_POST['address'];} ?>"  class="form-control input-sm" id="addr" placeholder="Address" autocomplete="off">
							<span id="add" style="color: red;font-size:18px;"></span>
						</div>
						<div class="form-group">
							<input type="email" name="email" value = "<?php if(isset($_POST['email'])){ echo $_POST['email'];} ?>" class="form-control input-sm" id="mail" placeholder="Email" autocomplete="off">
							<span id="eml" style="color: red;font-size:18px;"></span>
						</div>
						<div class="form-group">
							<input type="text" name="username" value = "<?php if(isset($_POST['username'])){ echo $_POST['username'];} ?>"  class="form-control input-sm" id="uname" placeholder=" Username" autocomplete="off">
							<span id="unme" style="color: red;font-size:18px;"></span>
						</div>
						<div class="row">
							<div class="col-xs-6 col-sm-6 col-md-6">
								<div class="form-group">
									<input type="password" name="password" class="form-control input-sm" id="pword" placeholder="Password">
									<span id="pwd" style="color: red;font-size:18px;"></span>
								</div>
							</div>
							<div class="col-xs-6 col-sm-6 col-md-6">
								<div class="form-group">
									<input type="password" name="cpassword" class="form-control input-sm" id="cpword" placeholder="Confirm Password">
									<span id="cpwd" style="color: red;font-size:18px;"></span>
								</div>
							</div>
						</div>
						<input type="submit" value="Register" name="submit" class="btn btn-info btn-block">
					</form>
				</div>
			</div>
		</div>
	</div>
<script type="text/javascript">
	function validation(){
	var firstname = document.getElementById("fname").value;
	var lastname=document.getElementById("lname").value;
	var address = document.getElementById("addr").value;
	var email = document.getElementById("mail").value;
	var user = document.getElementById("uname").value;
	var pass = document.getElementById("pword").value;
	var conpass=document.getElementById("cpword").value;

	if(firstname==""){
		document.getElementById("f_name").innerHTML="**Please enter  your first name";
		return false;
	}
	if(firstname.length<3 || firstname.length>20){
		document.getElementById("f_name").innerHTML="**length should be between 3 and 20";
		return false;
	}
	if(lastname==""){
		document.getElementById("l_name").innerHTML="**Please enter your last name";
		return false;
	}
	if(lastname.length<3 || lastname.length>20){
		document.getElementById("l_name").innerHTML="**length should be between 3 and 20";
		return false;
	}

	if(address==""){
		document.getElementById("add").innerHTML="**Please enter your address";
		return false;
	}

	if(email==""){
		document.getElementById("eml").innerHTML="**Please enter your email";
		return false;
	}

	if(user==""){
		document.getElementById("unme").innerHTML="**Please enter your username";
		return false;
	}
	if(user.length<3 || user.length>10){
		document.getElementById("unme").innerHTML="**length should be between 3 and 10";
		return false;
	}

	if(pass==""){
		document.getElementById("pwd").innerHTML="**Please enter your password";
		return false;
	}
	if(pass!=conpass){
		document.getElementById("cpwd").innerHTML="**Password does not match";
	}
}
</script>
</body>
</html>