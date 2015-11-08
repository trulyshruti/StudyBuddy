<?php
	
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$user = strip_tags($_POST['username']);
		$pass = strip_tags($_POST['password']);
		
		
		include("input_filter.php");
		$filter = new InputFilter();
		
		if($filter->isFilled(array($user, $pass))){
			
			include("mysqli_connection.php");
	
			$q = "SELECT * FROM users WHERE username='$user' AND password='".md5($pass)."'";
			$r = @mysqli_query($dbc, $q);
	
			if(mysqli_num_rows($r) == 1){
				$row = mysqli_fetch_array($r);
				
				session_start();
				$_SESSION['id'] = $row['id'];
				$_SESSION['username'] = $row['username'];
				$_SESSION['fname'] = $row['fname'];
				$_SESSION['lname'] = $row['lname'];
				$_SESSION['p_image'] = $row['p_image'];
	
				header("Location: ../dashboard.php");
	
			} else{
				echo "Username or Password Incorrect";
			}
	
		} else{
			echo "Please Fill All Fields";
		}
		
	
	}



?>