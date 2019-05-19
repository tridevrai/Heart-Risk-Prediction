<?php //include('process2.php')?>

<!DOCTYPE html>
<html>
<head>
  <title>Add Training Data</title>
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
					          <h5 class="panel-title">Add Training Data</h5>
					        </div>


        				<div class="panel-body">
       
        <!---  form submits to same page and method is post -->
          <form role="form" method="post" action = '' onsubmit="return confirmadd()">
                <div class="form-group">
                  <label>Age</label>
                  <input type="number" name="age" class="form-control input-sm"  id="ages"  autocomplete="off" required>
                  <span id="p_age" style="color: red;font-size:18px;"></span>
                </div>
                <div class="form-group">
                  <label>Sex</label>
                  <select class="form-control" name = 'gender' required>
                    <option name="gender" value="1">male(1)</option>
                    <option name="gender" value="0">female(0)</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Chest Pain Type</label>
                  <select class="form-control" name = 'cp' required>
                    <option name="cp" value="0">typical angina(0)</option>
                    <option name="cp" value="1">atypical angina(1)</option>
                    <option name="cp" value="2">non-angina pain(2)</option>
                    <option name="cp" value="3">asymptomatic(3)</option>
                  </select>
                </div>
            <div class="form-group">
              <label>Resting Blood Pressure</label>
              <input type="number" name="bp" class="form-control input-sm" id="bps" autocomplete="off" required>
              <span id="blood" style="color: red;font-size:18px;"></span>
            </div>
            <div class="form-group">
              <label>Cholestrol</label>
              <input type="number" name="chol" class="form-control input-sm" id="cho"  autocomplete="off" required>
              <span id="choles" style="color: red;font-size:18px;"></span>
            </div>
            <div class="form-group">
              <label>Fasting Blood Sugar(Is FBS higher than 120):</label>
              <select class="form-control" name = 'fbs' required>
                    <option name="fbs" value="1">yes(1)</option>
                    <option name="fbs" value="0">no(0)</option>
                  </select>
              <span id="fb" style="color: red;font-size:18px;"></span>
            </div>
            <div class="form-group">
                  <label>Rest ECG</label>
                  <select class="form-control" name = 'ecg' required>
                    <option name="ecg" value="0">normal(0)</option>
                    <option name="ecg" value="1">having ST-1 wave abnormality(1)</option>
                    <option name="ecg" value="2">Showing probable or defined left ventricular hypertropy(2)</option>
                  </select>
                </div>
            <div class="form-group">
              <label>Thalach</label>
              <input type="number" name="thalach" class="form-control input-sm" id="th"  autocomplete="off" required>
              <span id="tha" style="color: red;font-size:18px;"></span>
            </div>
            <div class="form-group">
              <label>Exercise induced Angenia(Exang):</label>
              <select class="form-control" name = 'exang' required>
                    <option name="exang" value="1">yes(1)</option>
                    <option name="exang" value="0">no(0)</option>
                  </select>
              <span id="exa" style="color: red;font-size:18px;"></span>
            </div>
            <div class="form-group">
              <label>Old Peak</label>
              <input type="number" step="0.1" name="op" class="form-control input-sm" id="old"  autocomplete="off" required>
              <span id="peak" style="color: red;font-size:18px;"></span>
            </div>
            <div class="form-group">
                  <label>Slope</label>
                  <select class="form-control" name = 'slope' required>
                    <option name="slope" value="0">up sloping(0)</option>
                    <option name="slope" value="1">flat(1)</option>
                    <option name="slope" value="2">down sloping(2)</option>
                  </select>
                </div>
               <div class="form-group">
              <label>Number of major vessels colored by fluoroscopy that range between 0 and 3:</label>
              <select class="form-control" name = 'ca' required>
                    <option name="ca" value="0">0</option>
                    <option name="ca" value="1">1</option>
                    <option name="ca" value="2">2</option>
                    <option name="ca" value="3">3</option>
                  </select>
              <span id="ac" style="color: red;font-size:18px;"></span>
            </div> 
            	<div class="form-group">
                  <label>Thal</label>
                  <select class="form-control" name = 'thal' required>
                    <option name="thal" value="1">normal(1)</option>
                    <option name="thal" value="2">fixed defect(2)</option>
                    <option name="thal" value="3">reversible defect(3)</option>
                  </select>
                </div>

                <div class="form-group">
              <label>Heart Risk(Target):</label>
              <select class="form-control" name = 'target' required>
                    <option name="target" value="1">yes heart risk(1)</option>
                    <option name="target" value="0">no heart risk(0)</option>
                  </select>
              <span id="tar" style="color: red;font-size:18px;"></span>
            </div>
            <input type="submit" value="submit" name="submit" class="btn btn-info btn-block">
          </form>
        </div>
      </div>
    </div>
  </div>
</div>


<script>
function confirmadd() {
    var txt;
    if (confirm("Is Training Data valid and do you want to add?!")) {
       <?php include('process2.php')?>
    } else {
        header("location: add_trainingdata.php");
    }
   }
</script>
</body>
</html>