<?php 
//checks the session is set or no if not set redirects to login
  session_start();
 if(!isset($_SESSION['username']))
 {
  header("location: heart.php");
 }
?>


<?php 
//sets empty message.
$message = '';

  //used to compute the posteriar probablity for discrete data, takes the user posted value($postvalue), entire excel data($rows), targets with 0($target_with_0) and targets with 1($target_with_1) and also the position($position) for the current dataset as parameters
  function count_posteriar($postvalue,$rows,$target_with_0,$target_with_1,$position)
  {
     $posteriar_count_0 = 0;
     $posteriar_count_1 = 0;
     //loops the rows, if userposted value is equl to the value in the row's value in the position, i.e if user psoted gender, the position is 1 and the value is compared there, male for male and female for female. male huda matra ganne
     //if the first condition is true calculate the number of targets with 0 and 1 in posteriar_count_1 and posteriar_count_0
     foreach ($rows as $key => $value) {
      if($postvalue == $value[$position])// condition for male huda matra ganne
      {
        if($value[13] == 1)/// if target is 1 increase posteriar_count_1
        {
          $posteriar_count_1++;
        }
        if($value[13] == 0)
        {
          $posteriar_count_0++; /// if target is 0 increase posteriar_count_0
        }
      }
    }
    $posteriar_probabilty1 = $posteriar_count_1/$target_with_1; //computes posteriar probablity with 1
    $posteriar_probabilty0 = $posteriar_count_0/$target_with_0; //computes posteriar probablity with 0

    return array('heartrisk' => $posteriar_probabilty1, 'heartnorisk'=>$posteriar_probabilty0); //returns an array with heartrisk and norisk.
  }

  function calculate_mean($ageall)
  {
    $average = array_sum($ageall)/count($ageall);
    return $average;
  }

  function calculate_variance($arr)
  {
    $num_of_elements = count($arr);

    $variance = 0.0;

                // calculating mean using array_sum() method
    $average = array_sum($arr)/$num_of_elements;

    foreach($arr as $i)
    {
            // sum of squares of differences between 
                        // all numbers and means.
      $variance += pow(($i - $average), 2);
    }
    
    return (float)$variance/($num_of_elements-1);
  }


  //calculates continous posteriar probablity, takes dataset without risk($ageall0) which can be anything not only age, and with risk($ageall1) which can be anything not only age age is just a array parameter, $age(value the users posts, not neccesarily only age) 
  function calculate_continous_posteriar($ageall0,$ageall1,$age)
  {
    //computes mean from the dataset for no risk
    $average0 = calculate_mean($ageall0);
    //computes variance from the dataset for no risk
    $variance0 = calculate_variance($ageall0);

    //calculation using the gaussian naivebayes formula using mean, variance and provided data by user for no risk 
    $firstblock = 1/(sqrt((44/7)*$variance0));
    $secondblocktop = -pow($age - $average0,2);
    $secondblockbottom = 2 * $variance0;
    $secondblockbeforeexp = $secondblocktop/$secondblockbottom;
    $secondblockafterexp = exp($secondblockbeforeexp);
    $whole_answer_no_risk = $firstblock * $secondblockafterexp;


//computes mean from the dataset for  risk
    $average0 = calculate_mean($ageall1);
    //computes variance from the dataset for  risk
    $variance0 = calculate_variance($ageall1);

 //calculation using the gaussian naivebayes formula using mean, variance and provided data by user for risk 
   
    $firstblock = 1/(sqrt((44/7)*$variance0));
    $secondblocktop = -pow($age - $average0,2);
    $secondblockbottom = 2 * $variance0;
    $secondblockbeforeexp = $secondblocktop/$secondblockbottom;
    $secondblockafterexp = exp($secondblockbeforeexp);
    $whole_answer_risk = $firstblock * $secondblockafterexp;

    //sends the probablities in associate array of hearrisk and heartnorisk as keys
    return array('heartrisk' => $whole_answer_risk, 'heartnorisk'=>$whole_answer_no_risk);
  }

if($_POST)
{
  //takes the 13 attributes in variables
  $age = $_POST['age'];
  $gender = $_POST['gender'];
  $cp = $_POST['cp'];
  $bp = $_POST['bp'];
  $chol = $_POST['chol'];
  $fbs = $_POST['fbs'];
  $ecg = $_POST['ecg'];
  $thalach = $_POST['thalach'];
  $exang = $_POST['exang'];
  $op = $_POST['op'];
  $slope = $_POST['slope'];
  $ca = $_POST['ca'];
  $thal = $_POST['thal'];

  //opens our csv file bigsample.csv
  $file = fopen('bigsample.csv', 'r');
 /* print_r($file);
  die;
*/
  //sets some empty array
  $rows = array();
  $target = array();

  //reads the rows of the excel as arary
  while (($line = fgetcsv($file)) !== FALSE) {
  //$line is an array of the csv elements
    //creates a multidimensional array with 1 row of excel as 1 inner array
    $rows[] = $line;
    // creates a array with values of target in a array
    $target[] = $line[13];
  }

  //sets some empty array
  $target_rows_0 = array();
  $target_rows_1 = array();

  foreach($rows as $value)
  {
    if($value[13] == 0)
    {
      //separates the dataset into target of 0 as array target_rows_0
      $target_rows_0[] = $value;
    }
    else
    {
      //separates the dataset into target of 1 as array target_rows_1
      $target_rows_1[] = $value;
    }
  }

  //creates some empty array
  $ageall0 = array();
  $ageall1 = array();
  foreach ($target_rows_0 as $tv) {
    //take separate sets of  columns(age, bp,cp,chol...) with target 0 from previously created target_rows_0 array
    $ageall0[] = $tv[0];
    $trestbps0[] = $tv[3];
    $chol0[] = $tv[4];
    $thalach0[] = $tv[7];
    $oldpeak0[] = $tv[9];
  }

  foreach ($target_rows_1 as $tv) {
    //take separate sets of columns(age, bp,cp,chol) with target 1 from previously created target_rows_1 array
    $ageall1[] = $tv[0];
    $trestbps1[] = $tv[3];
    $chol1[] = $tv[4];
    $thalach1[] = $tv[7];
    $oldpeak1[] = $tv[9];
  }

  //counts the target with 0 and 1 of target
  $counts = array_count_values($target);
  $target_with_0 = $counts[0];
  $target_with_1 = $counts[1];

  //counts all the items in target
  $total_target = count($target);

  //based on the counts of 0 and 1 , and total we find out the prior probablity
  $prior_probablity_0 = $target_with_0/$total_target;
  $prior_probablity_1 = $target_with_1/$total_target;
  

  //counts the posteriar probablity of continous data
  //calls calculate_continous_posteriar function
  $posteriar_probablity_age = calculate_continous_posteriar($ageall0,$ageall1,$age);
  $posteriar_trest_bps = calculate_continous_posteriar($trestbps0,$trestbps1,$bp);
  $posteriar_chol = calculate_continous_posteriar($chol0,$chol1,$chol);
  $posteriar_thalach = calculate_continous_posteriar($thalach0,$thalach1,$thalach);
  $posteriar_oldpeak = calculate_continous_posteriar($oldpeak0,$oldpeak1,$op);


  //counts the posteriar probablity of discrete data
  //calls count_posteriar function
  $posteriar_probablity_gender = count_posteriar($gender,$rows,$target_with_0,$target_with_1,1);
  $posteriar_probablity_fbs = count_posteriar($fbs,$rows,$target_with_0,$target_with_1,5);
  $posteriar_probablity_exang = count_posteriar($exang,$rows,$target_with_0,$target_with_1,8);
  $posteriar_probablity_cp = count_posteriar($cp,$rows,$target_with_0,$target_with_1,2);
  $posteriar_probablity_restecg = count_posteriar($ecg,$rows,$target_with_0,$target_with_1,6);
  $posteriar_probablity_slope = count_posteriar($slope,$rows,$target_with_0,$target_with_1,10);
  $posteriar_probablity_ca = count_posteriar($ca,$rows,$target_with_0,$target_with_1,11);
  $posteriar_probablity_thal = count_posteriar($thal,$rows,$target_with_0,$target_with_1,12);


  //multiplies the entire heartrisk probalblities and prior probablity with heart risk
  $heart_risk = $posteriar_probablity_thal['heartrisk']*$posteriar_probablity_ca['heartrisk']*$posteriar_probablity_slope['heartrisk']*$posteriar_probablity_restecg['heartrisk']*$posteriar_probablity_cp['heartrisk']*$posteriar_probablity_exang['heartrisk']*$posteriar_probablity_fbs['heartrisk']*$posteriar_probablity_gender['heartrisk']*$posteriar_oldpeak['heartrisk']*$posteriar_thalach['heartrisk']*$posteriar_chol['heartrisk']*$posteriar_trest_bps['heartrisk']*$posteriar_probablity_age['heartrisk']*$prior_probablity_1;

 //multiplies the entire heartnorisk probalblities and prior probablity with heartnorisk
  $heart_no_risk = $posteriar_probablity_thal['heartnorisk']*$posteriar_probablity_ca['heartnorisk']*$posteriar_probablity_slope['heartnorisk']*$posteriar_probablity_restecg['heartnorisk']*$posteriar_probablity_cp['heartnorisk']*$posteriar_probablity_exang['heartnorisk']*$posteriar_probablity_fbs['heartnorisk']*$posteriar_probablity_gender['heartnorisk']*$posteriar_oldpeak['heartnorisk']*$posteriar_thalach['heartnorisk']*$posteriar_chol['heartnorisk']*$posteriar_trest_bps['heartnorisk']*$posteriar_probablity_age['heartnorisk']*$prior_probablity_0;

//check which is greater and sets the message which is displayed in the html
  if($heart_no_risk>$heart_risk)
  {
    $message = 'You do not  have any risk of heart disease.';
  }
  else
  {
    $message = 'You have risk of heart disease.';
  }
}

?>
<!DOCTYPE html>
<html>
<head>
  <title>Heart analysis</title>
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
     Heart Disease Risk Prediction using Naive Bayes Algorithm 
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
  <div>
    <p>Provide the testing result to the system and press analyze</p>
    <p>Test using Test data</p>
    <p>The last attribute containing 1 is risk and 0 is no risk</p>
  </div>
  <div class="row centered-form">
    <div class="col-lg-6 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h5 class="panel-title">Analyze Heart</h5>
        </div>
        <div class="panel-body">
        <center><h3 style = 'color:red;'><?php echo $message; ?></h3></center>
        <!---  form submits to same page and method is post -->
          <form role="form" method="post" action = ''>
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
            <input type="submit" value="Analyze" class="btn btn-info btn-block">
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>