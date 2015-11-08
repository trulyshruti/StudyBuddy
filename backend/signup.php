<?php
	
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		
		$user = strip_tags($_POST['username']);
		$pass = strip_tags($_POST['password']);
		$fname = strip_tags($_POST['first_name']);
		$lname = strip_tags($_POST['last_name']);
		$email = strip_tags($_POST['email']);
		
		include("input_filter.php");
		$filter = new InputFilter();
		if($filter->isFilled(array($user, $pass, $fname, $lname, $email))){
			include("mysqli_connection.php");
			
			$q = "INSERT INTO users (username, password, first_name, last_name, email) VALUES ('$user', '".md5($pass)."', '$fname', '$lname', '$email')";
			$r = @mysqli_query($dbc, $q);
			
			if($r){
				echo "Sign Up Successfull";
			} else{
				echo "There Was a Problem Signing Up";
			}
		}
		
	}
	
	
	
	
	
?>