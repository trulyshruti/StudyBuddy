<?php
	
	session_start();
	if($_SESSION['username'] != ""){
		header("Location: ?p=dashboard");
	}
	
	
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$user = strip_tags($_POST['username']);
		$pass = strip_tags($_POST['password']);
		
		
		include("backend/input_filter.php");
		$filter = new InputFilter();
		
		if($filter->isFilled(array($user, $pass))){
			
			include("backend/mysqli_connection.php");
	
			$q = "SELECT * FROM users WHERE username='$user' AND password='".md5($pass)."'";
			$r = @mysqli_query($dbc, $q);
	
			if(mysqli_num_rows($r) == 1){
				$row = mysqli_fetch_array($r);
				
				session_start();
				$_SESSION['id'] = $row['id'];
				$_SESSION['username'] = $row['username'];
				$_SESSION['fname'] = $row['first_name'];
				$_SESSION['lname'] = $row['last_name'];
				$_SESSION['p_image'] = $row['p_image'];
	
				header("Location: ?p=dashboard");
	
			} else{
				$GLOBALS['status'] = "<p class='error-msg'>Username or Password Incorrect</p>";
			}
	
		} else{
			$GLOBALS['status'] = "<p class='error-msg'>Please Fill All Fields</p>";
		}
		
	
	}

	
?>
	<a  name="login-form"></a>
	<div class="content-section-a">
	    <div class="container">
	    <?php echo $GLOBALS['status']; ?>
	     <div class="row">
	      <div class="col-lg-5 col-sm-6">
	        <h2 class="section-heading">Log In</h2>
	        <form role="form" action="#" method="post">
	            <div class="form-group">
	                <label for="username">Username:</label>
	                <input type="username" class="form-control" id="username" name="username" value="<?php echo strip_tags($_POST['username']); ?>">
	            </div>
	            <div class="form-group">
	               <label for="password">Password:</label>
	             <input type="password" class="form-control" id="password" name="password">
	            </div>
	            <div class="checkbox">
	                <label><input type="checkbox"> Remember me</label>
	           </div>
	            <button type="submit" class="btn btn-default">Submit</button>
	        </form>
	      </div>
	     </div>
	    </div>
	</div>
