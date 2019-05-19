<?php

		$errors = array(); 

		// connect to the database
		$db = mysqli_connect('localhost', 'root', '', 'project');


		// Add doctor
		if (isset($_POST['submit'])) {

			// receive all input values from the form
			$name = mysqli_real_escape_string($db, $_POST['dname']);
			$address = mysqli_real_escape_string($db, $_POST['daddress']);
			$mobilenumber = mysqli_real_escape_string($db, $_POST['dmobile']);
			$email = mysqli_real_escape_string($db, $_POST['demail']);
			$age = mysqli_real_escape_string($db, $_POST['dage']);
			$gender = mysqli_real_escape_string($db, $_POST['dgender']);
			$speciality = mysqli_real_escape_string($db, $_POST['dspecial']);

			
			// first check the database to make sure 
			// a user does not already exist with the same name and email
			$query = "SELECT * FROM doctor WHERE name LIKE '$name' AND email LIKE '$email' LIMIT 1";
			$result = mysqli_query($db, $query);

						
			 //checks user exists or not
			 if(mysqli_num_rows($result) > 0){

					 array_push($errors, "Name or Email already exists");
				}

						 
				// Finally, add doctor if there are no errors in the form
				if (count($errors) == 0) {    
					
					//insert a new row in the table
					$query1 = "INSERT INTO doctor (name,address,mobile_number,email,age,gender,speciality)
								VALUES('$name', '$address', '$mobilenumber','$email','$age','$gender','$speciality')";
					$result1=mysqli_query($db, $query1);

					}
			}

		mysqli_close($db);


?>