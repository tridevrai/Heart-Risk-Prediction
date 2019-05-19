<?php include('process.php');?>
<?php
// Create connection
$db = mysqli_connect('localhost', 'root', '', 'project');

// prepare and bind
$query = "SELECT id,rate,fname,email,comment FROM feedback";

// Execute the query, if there were variables, they could be bound within the brackets
$result = $db->query($query);
?>

<!DOCTYPE html>
<html>
<head>
	<title>View feedback</title>
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
  
		
	<table class="table table-striped table-hover table-bordered"  >

    <thead >
        <tr>
          <th>id</th>
            <th>Rate</th>
              <th>Name</th>
              <th>email</th>
              <th>Comment</th>                   
        </tr>
    </thead>
    
    <tbody>
        <!--Use a while loop to make a table row for every DB row-->
        <?php
        while($feedback= mysqli_fetch_assoc($result)){ 
            echo "<tr>";
              echo "<td>".$feedback['id']."</td> " ;
              echo "<td>".$feedback['rate']."</td>";
              echo "<td>".$feedback['fname']."</td>";
              echo "<td>".$feedback['email']."</td>";
              echo "<td>".$feedback['comment']."</td>";
              echo "</tr>";?>
        <?php } ?>
    </tbody>
</table>

<?php $db->close(); ?>
</body>
</html>