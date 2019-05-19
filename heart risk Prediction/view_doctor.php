<?php

// Create connection
$db = mysqli_connect('localhost', 'root', '', 'project');

// prepare and bind
$query = "SELECT id,name,address,mobile_number,email,age,gender,speciality FROM doctor";

// Execute the query, if there were variables, they could be bound within the brackets
$result = $db->query($query);


?>

<!DOCTYPE html>
<html>
<head>
	<title>View Doctor</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<script type="text/javascript" src="js/jquery-1.11.3-jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<link rel="stylesheet" href="css/style1.css">
	<link rel="stylesheet" href="css/style.css">
  <link href="style4.css" type="text/css" rel="stylesheet">
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
              <a href="heart.php">HEART ANALYSIS</a> 
              <a href="view_doctor.php">FIND DOCTORS</a>  
              <a href="feedback1.php">FEEDBACK</a>
              <a href="logout.php">LOGOUT</a>
            </font>
          </td>
        </tr>
      </table>
    </div>
  </div>
		
	<table class="table table-striped table-bordered table-hover"  >

    <thead >
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th> 
             <th scope="col">Address</th>
             <th scope="col">contact</th>
             <th scope="col">email</th>
             <th scope="col">Age</th>
             <th scope="col">Gender</th>
             <th scope="col">Speciality</th>                    
        </tr>
    </thead>
    
    <tbody>
        <!--Use a while loop to make a table row for every DB row-->
        <?php
        while($doctor= mysqli_fetch_assoc($result)){ 
            echo "<tr>";
              echo "<td>".$doctor['id']."</td> " ;
              echo "<td>".$doctor['name']."</td>";
              echo "<td>".$doctor['address']."</td>";
              echo "<td>".$doctor['mobile_number']."</td>";
              echo "<td>".$doctor['email']."</td>";
              echo "<td>".$doctor['age']."</td> " ;
              echo "<td>".$doctor['gender']."</td>";
              echo "<td>".$doctor['speciality']."</td>";
              echo "</tr>";?>
            <?php }?>
    </tbody>
</table>

<?php $db->close(); ?>
</body>
</html>

