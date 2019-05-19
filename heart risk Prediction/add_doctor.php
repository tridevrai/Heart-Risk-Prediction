<?php include('process1.php') ?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Doctor</title>
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
					<td> <br> <br>
						<font size="4px"> 
							<a href="add_trainingdata.php">ADD DATA</a> 
							<a href="add_doctor.php">ADD DOCTOR</a>
							<a href="view_feedback.php">VIEW FEEDBACK</a>
							<a href="logout.php">LOGOUT</a>
						</font>
					</td>
				</tr>
			</table>
		</div>
	</div>
	
		<div class="row centered-form">
			<div class="col-lg-6 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
				<div class="panel panel-default">

					<div class="panel-heading">
						<h5 class="panel-title">Add Doctor</h5>
					</div>

					<div class="panel-body">

						<form role="form" method="post" action="">
							<?php include('error.php'); ?>

									<div class="form-group">
										<input type="text" name="dname" value = "<?php if(isset($_POST['dname'])){ echo $_POST['dname'];} ?>" class="form-control input-sm"  id="dname" placeholder="Doctor Name" autocomplete="off" required>
										<span id="d_name" style="color: red;font-size:18px;"></span>
									</div>
								
									<div class="form-group">
										<input type="text" name="daddress" value = "<?php if(isset($_POST['daddress'])){ echo $_POST['daddress'];} ?>"  class="form-control input-sm" id="daddress" placeholder="Address" autocomplete="off" requied>
										<span id="d_address" style="color: red;font-size:18px;"></span>
									</div>
							

									<div class="form-group">
										<input type="text" name="dmobile" value = "<?php if(isset($_POST['dmobile'])){ echo $_POST['dmobile'];} ?>"  class="form-control input-sm" id="dmobile" placeholder=" mobile number" autocomplete="off" required>
										<span id="d_mobile" style="color: red;font-size:18px;"></span>
									</div>

									<div class="form-group">
										<input type="email" name="demail" value = "<?php if(isset($_POST['demail'])){ echo $_POST['demail'];} ?>" class="form-control input-sm" id="dmail" placeholder="Email" autocomplete="off" required >
										<span id="d_mail" style="color: red;font-size:18px;"></span>
									</div>
														
									<div class="form-group">
										<input type="number" name="dage"  value = "<?php if(isset($_POST['dage'])){ echo $_POST['dage'];} ?>"class="form-control input-sm" id="dage" placeholder="Age" required>
										<span id="d_age" style="color: red;font-size:18px;"></span>
									</div>
								
									<div class="form-group">
					                  <label>Gender</label>
					                  <select class="form-control" name = 'dgender'>
					                    <option name="dgender" value="male">male</option>
					                    <option name="dgender" value="female">female</option>
					                  </select>
					                </div>

									<div class="form-group">
										<input type="text" name="dspecial" value = "<?php if(isset($_POST['dspecial'])){ echo $_POST['dspecial'];} ?>" class="form-control input-sm" id="dspecial" placeholder="Speciality" autocomplete="off" required>
										<span id="d_special" style="color: red;font-size:18px;"></span>
									</div>
							
							<input type="submit" value="submit" name="submit" class="btn btn-info btn-block" >
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- <script type="text/javascript">

		function validation(){

			var name = document.getElementById("dname").value;
			var address=document.getElementById("daddress").value;
			var mobilenumber = document.getElementById("dmobile").value;
			var email = document.getElementById("dmail").value;
			var age = document.getElementById("dage").value;
			var gender = document.getElementById("dgender").value;
			var Speciality=document.getElementById("dspecial").value;

			document.write("name");

			if(name==""){
				document.getElementById("d_name").innerHTML="**Please enter the name";
				return false;
			}
			
			if(name.length<3 || name.length>50){
				document.getElementById("d_name").innerHTML="**length should be between 3 and 50";
				return false;
			}
			if(address==""){
				document.getElementById("d_address").innerHTML="**Please enter your addresss";
				return false;
			}
			
			if(mobilenumber==""){
				document.getElementById("d_mobile").innerHTML="**Please enter mobile number";
				return false;
			}

			if(age==""){
				document.getElementById("d_age").innerHTML="**Please enter your age";
				return false;
			}

			
			if(Speciality==""){
				document.getElementById("d_special").innerHTML="**Please enter your Speciality";
				return false;
			}

		}

	</script>

		-->	
</body>
</html>