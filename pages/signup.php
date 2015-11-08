<?php
	
	session_start();
	if($_SESSION['username'] != ""){
		header("Location: ?p=dashboard");
	}
	
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		
		$user = strip_tags($_POST['username']);
		$pass = strip_tags($_POST['password']);
		$fname = strip_tags($_POST['first_name']);
		$lname = strip_tags($_POST['last_name']);
		$email = strip_tags($_POST['email']);
		
		include("backend/input_filter.php");
		$filter = new InputFilter();
		if($filter->isFilled(array($user, $pass, $fname, $lname, $email))){
			include("backend/mysqli_connection.php");
			
			$q = "INSERT INTO users (username, password, first_name, last_name, email) VALUES ('$user', '".md5($pass)."', '$fname', '$lname', '$email')";
			$r = @mysqli_query($dbc, $q);
			
			if($r){
				$GLOBALS['status'] = "<p class='success-msg'>Sign Up Successfull</p>";
			} else{
				$GLOBALS['status'] = "<p class='error-msg'>There Was a Problem Signing Up</p>";
			}
		}
		
	}
	
?>
	<a  name="login-form"></a>
	<div class="content-section-a">
	    <div class="container">
	   	<?php echo $GLOBALS['status']; ?>
	     <div class="row">
	      <div class="col-lg-5 col-sm-6">
	        <h2 class="section-heading">Sign Up</h2>
	        <form role="form" action="#" method="post">
	            <div class="form-group">
	               <label for="first_name">First Name:</label>
	             <input type="first_name" class="form-control" id="first_name" name="first_name">
	            </div>
	            <div class="form-group">
	               <label for="last_name">Last Name:</label>
	             <input type="last_name" class="form-control" id="last_name" name="last_name">
	            </div>
	            <div class="form-group">
	               <label for="email">Email:</label>
	             <input type="email" class="form-control" id="email" name="email">
	            </div>
	            <div class="form-group">
	                <label for="username">Username:</label>
	                <input type="username" class="form-control" id="username" name="username">
	            </div>
	            <div class="form-group">
	               <label for="password">Password:</label>
	             <input type="password" class="form-control" id="password" name="password">
	            </div>
	            <button type="submit" class="btn btn-default">Submit</button>
	        </form>
	      </div>
	     </div>
	    </div>
	</div>