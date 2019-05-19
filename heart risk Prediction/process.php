<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'project');

// REGISTER USER
if (isset($_POST['submit'])) {

  // receive all input values from the form
  $firstname = mysqli_real_escape_string($db, $_POST['first_name']);
  $lastname = mysqli_real_escape_string($db, $_POST['last_name']);
  $address = mysqli_real_escape_string($db, $_POST['address']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $confirmpassword = mysqli_real_escape_string($db, $_POST['cpassword']);
  $username = mysqli_real_escape_string($db, $_POST['username']);


  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $query = "SELECT * FROM registration WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $query);
  
  //confirm password = passowr or not
  if($password != $confirmpassword)
  {

      array_push($errors, "Password doesnot match confirm password.");
  }
 
//checks user exists or not
 if(mysqli_num_rows($result) > 0)
  {
     array_push($errors, "Username or Email already exists");
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    $password = md5($password);//encrypt the password before saving in the database

    //insert a new row in the table
    $query = "INSERT INTO registration (first_name,last_name,address,email,password,username) 
          VALUES('$firstname', '$lastname', '$address','$email','$password','$username')";
    mysqli_query($db, $query);
    $_SESSION['username'] = $username;
    header('location: heart.php');
  }
}

// USER LOGIN
// does not enter untill submission becoz post is not setup
//if post has login key in it
if (isset($_POST['login'])) {
  //username in a vriable , passoword in a varibale/
  $username = mysqli_real_escape_string($db, $_POST['uname']);
  $password = md5(mysqli_real_escape_string($db, $_POST['pword']));


  if (count($errors) == 0) {
    //select user value from registration table, where username and password match
    $query = "SELECT * FROM registration WHERE username='$username' AND password='$password'";
    $results = mysqli_query($db, $query);
    //mysqli_num_rows return the no of rows. if correct the value if 1 else 0. based on it session is set and redirects or . wrong username message is shown,
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['username'] = $username;
      header('location: heart.php');
    }else {
      array_push($errors, "Username or password invalid");
    }
  }
}
   
   //ADMIN LOGIN
   if (isset($_POST['btnlogin'])) {
      //username in a vriable , passoword in a varibale/
      $username = mysqli_real_escape_string($db, $_POST['uname']);
      $password = mysqli_real_escape_string($db, $_POST['pword']);

      if (count($errors) == 0) {
          //select user value from  table, where username and password match
          $query = "SELECT * FROM adminlogin WHERE username='$username' AND password='$password'";
          $results = mysqli_query($db, $query);
           if (mysqli_num_rows($results) == 1){
            header('location: add_trainingdata.php');
            }else {
              array_push($errors, "Username or password invalid");
              }
      }
    }

//feedback process
if (isset($_POST['send'])) {
    // receive all input values from the form
  $rate = mysqli_real_escape_string($db, $_POST['experience']);
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $comment = mysqli_real_escape_string($db, $_POST['comments']);
  
    // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {

    $query = "INSERT INTO feedback (rate, fname, email, comment) 
          VALUES('$rate', '$name','$email', '$comment')";
    mysqli_query($db, $query);
        echo"<script>alert('feedback has been sucessfully send')</script>";
}
}

?>