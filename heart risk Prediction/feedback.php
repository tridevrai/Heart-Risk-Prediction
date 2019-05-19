<?php 
$db=mysqli_connect("localhost","root","","project");
$sql="SELECT * FROM user_feedback";
$records=mysqli_query($db,$sql);


?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title></title>
            <link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
<script type="text/javascript" src="js/jquery-1.11.3-jquery.min.js"></script>
<script type="text/javascript" src="js/validation.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
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
              <a href="heart.php">HOME</a> 
              <a href="doctor.php">DOCTORS</a>  
              <a href="feedback.php">FEEDBACK</a>
              <a href="logout.php">LOGOUT</a>
            </font>
          </td>
        </tr>
      </table>
    </div>
  </div>
	<div style="background-image:url('image.jpg');">
	</div>
<div class="container middle">
<br><br> 
<div id="form1">
<table width="550" border="1" cellpadding="1" cellspacing="1" >
<h1><i>Feedback from User</i></h1><hr> 
<tr>
<th>User_id</th>
<th>Username</th>
<th>Comment</th>
</tr>
<?php 
 while($user_feedback= mysqli_fetch_assoc($records)){
 	echo "<tr>";
 	echo "<td>".$user_feedback['user_id']."</td> " ;
 	echo "<td>".$user_feedback['username']."</td>";
 	echo "<td>".$user_feedback['comment']."</td>";
 	echo "</tr>";
 }
 ?>
	
</table>
</div>
</div>


</body>
</html>